<script>
import './MainMenu.css'
import { h } from 'vue'
import MainMenuItem from './MainMenuItem.vue'

export default {
  name: 'MainMenu',
  props: {
    data: Array
  },
  created () {
    document.addEventListener('click', event => {
      if (!event.target.closest('li')) {
        this.show(false)
      }
    })

    window.addEventListener('message', event => {
      if (event.data?.eventClick) {
        this.show(false)
      }
    })
  },
  setup (props) {
    return function () {
      return h('div', { class: 'app-main-menu' },
          h('ul', h(MainMenuItem, { data: props.data, onAction: this.action }))
      )
    }
  },
  methods: {
    action () {
      if (typeof this[arguments[0]] === 'function') {
        this[arguments[0]](...Array.from(arguments).splice(1))
      } else {
        this.$emit('action', ...arguments)
      }
    },
    show (value = true) {
      this.$el.classList.toggle('app-main-menu--active', value)
    },
    onToggleClick (event, data) {

    },
    onClick (event, data) {
      if (data?.values) {
        this.show(false)
        event.stopPropagation()
        return
      }

      if (data.to) {
        this.show(false)
        event.stopPropagation()
        return
      }

      this.show(!this.$el.classList.contains('app-main-menu--active'))
      event.stopPropagation()
    },
    onEnter (event) {
      this.$el.querySelectorAll('.app-main-menu__hover').forEach(i => i.classList.remove('app-main-menu__hover'))

      let el = event.target

      while (true) {
        el.classList.add('app-main-menu__hover')
        el = el.parentElement.closest('li')

        if (!el) {
          break
        }
      }
    },
    onOut (event) {
      event.currentTarget.classList.add('app-main-menu__hover')
    }
  }
}
</script>
