<script>
import router from '../../router.js'

export default {
  name: 'GlobalTabs',
  watch: {
    '$route' (route) {
      this.addTab(route)
    }
  },
  data () {
    return {
      tabs: [],
      keys: []
    }
  },
  created () {
    this.init()
  },
  methods: {
    action () {
      if (typeof this[arguments[0]] === 'function') {
        this[arguments[0]](...Array.from(arguments).splice(1))
      } else {
        this.$emit('action', ...arguments)
      }
    },
    init () {
      router.getRoutes().filter(i => i?.meta?.fixed).map(i => this.addTab(router.parse(i)))
    },
    addTab (data) {
      if (!data) {
        return
      }

      data = router.parse(data)

      let is = false

      this.tabs.map(i => {
        i.active = router.key(i, data)

        if (i.active) {
          is = true
          data.meta = i.meta
          Object.assign(i, data)
        }
      })

      if (!is && !data.meta['hidden']) {
        data.active = true
        this.tabs.push(data)
      }

      this.keys = this.tabs.map(i => router.key(i))
    },
    setTab (data) {
      this.$store.dispatch('set', { tabsLoading: data.loading })

      if (data.key) {
        const index = this.keys.indexOf(data.key)
        index > -1 && window._.mergeWith(this.tabs[index], data)
      } else {
        this.tabs.map(i => i.active && window._.mergeWith(i, data))
      }
    },
    closeTab (callback) {
      let route = typeof callback === 'object' ? callback : router.currentRoute.value
      const index = this.keys.indexOf(router.key(route))
      const tab = this.tabs[index]

      if (tab?.changed && !confirm(this.$store.getters.get('lang.warning_not_saved'))) {
        return
      }

      if (tab?.meta['fixed']) {
        return
      }

      index > -1 && this.tabs.splice(index, 1) && this.keys.splice(index, 1)

      if (tab.active && index > 0 && this.tabs[index - 1]) {
        router.to(this.tabs[index - 1])
      }

      if (typeof callback === 'function') {
        callback()
      }

      return index
    },
    toTab (data) {
      const tab = this.find(router.currentRoute.value)
      if (tab?.changed && !confirm(this.$store.getters.get('lang.warning_not_saved'))) {
        return
      }
      this.closeTab(router.currentRoute.value)
      router.to(data)
    },
    clickTab (tab) {
      router.to(tab)
    },
    dblClickTab (data) {
      const key = router.key(data)
      const index = this.keys.indexOf(key)
      index > -1 && this.keys.splice(index, 1)
      this.$nextTick(() => this.keys.push(key))
    },
    find (data) {
      return this.tabs.filter(i => router.key(i, data))[0] || null
    }
  }
}
</script>

<template>
  <div class="app-global-tabs">
    <div class="app-global-tabs__tabs">
      <button v-for="i in tabs"
              :class="[i.active ? 'btn-primary' : 'btn-dark' ]"
              @mousedown="clickTab(i)"
              @dblclick="dblClickTab(i)"
              class="btn btn-sm"
              type="button">
        <i v-if="i.meta.icon" :class="i.meta.icon"/>
        <span v-if="i.path" class="app-global-tabs__title">{{ i.path }}</span>
        <span v-if="!i.meta.fixed" class="app-global-tabs__close" @mousedown.stop="closeTab(i)">✕</span>
      </button>
    </div>
    <div class="app-global-tabs__frames">
      <template v-for="{ path } in tabs" :key="path">
        <iframe v-if="keys.includes(path)" v-show="$route.path === path" :src="path"/>
      </template>
    </div>
  </div>
</template>

<style>
.app-global-tabs {
  flex-grow: 1;
  display: flex;
  flex-direction: column;
  overflow: hidden;
}
.app-global-tabs__tabs {
  flex-grow: 0;
  overflow: auto;
  display: flex;
  flex-wrap: nowrap;
  background-color: var(--bs-gray-900);
}
.app-global-tabs__tabs button {
  padding: 0.125rem 0.75rem;
  border-radius: 0;
  white-space: nowrap;
  display: inline-flex;
  justify-content: space-between;
  align-items: center;
  text-align: left;
}
.app-global-tabs__title {
  width: 7rem;
  overflow: hidden;
  text-overflow: ellipsis;
}
.app-global-tabs__tabs button i ~ .app-global-tabs__title {
  margin-left: 0.5rem;
}
.app-global-tabs__close {
  margin: -0.125rem -0.75rem -0.125rem 0.5rem;
  padding: 0.125rem 0.5rem;
  opacity: 60%;
}
.app-global-tabs__close:hover {
  color: var(--bs-red);
  opacity: 100%;
}
.app-global-tabs__tabs a:hover {
  background-color: var(--bs-gray-800);
  color: var(--bs-light);
}
.app-global-tabs__frames {
  flex-grow: 1;
  overflow: hidden;
}
.app-global-tabs__frames iframe {
  width: 100%;
  height: 100%;
  border: none;
  overflow: auto;
}
</style>
