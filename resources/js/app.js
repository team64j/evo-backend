import '../css/app.css'
import * as vue from 'vue'
import axios from 'axios'
import router from './router'
import GlobalTabs from './components/GlobalTabs/GlobalTabs.vue'
import MainMenu from './components/MainMenu/MainMenu.vue'
import Tree from './components/Tree/Tree.vue'

window['vue'] = vue
window['axios'] = axios
//window['axios'].defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest'

window['app'] = vue.createApp({
  components: { GlobalTabs, Tree, MainMenu },
  props: {
    data: Object
  },
  created () {
    /**
     * @see https://dennisreimann.de/articles/delegating-html-links-to-vue-router.html
     */
    window.addEventListener('click', event => {
      // ensure we use the link, in case the click has been received by a sub element
      let { target } = event
      while (target && target.tagName !== 'A') target = target.parentNode
      // handle only links that do not reference external resources
      if (target && target.matches('a:not([href*=\'://\'])') && target.href) {
        // some sanity checks taken from vue-router:
        // https://github.com/vuejs/vue-router/blob/dev/src/components/link.js#L106
        const { altKey, ctrlKey, metaKey, shiftKey, button, defaultPrevented } = event
        // don't handle with control keys
        if (metaKey || altKey || ctrlKey || shiftKey) return
        // don't handle when preventDefault called
        if (defaultPrevented) return
        // don't handle right clicks
        if (button !== undefined && button !== 0) return
        // don't handle if `target="_blank"`
        if (target && target.getAttribute) {
          const linkTarget = target.getAttribute('target')
          if (/\b_blank\b/i.test(linkTarget)) return
        }
        // don't handle same page links/anchors
        const url = new URL(target.href)
        const to = url.pathname.replace(document.baseURI.replace(/\/$/g, '').replace(location.origin, '') + '/', '/')
        if (window.location.pathname !== to && event.preventDefault) {
          event.preventDefault()
          router.to(to).then(r => {})
        }
      }
    })
  },
  template: `
    <div class="d-flex flex-column h-100 overflow-hidden">
      <div class="app-main-menu">
        <MainMenu :data="data['menu']"/>
      </div>
      <div class="flex-grow-1 d-flex">
        <Tree/>
        <div class="app-resizer"/>
        <GlobalTabs/>
      </div>
    </div>`
}, {
  data: JSON.parse(document.getElementById('__DATA__').textContent)
}).use(router).mount('#app-evo')
