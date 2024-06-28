import '../css/app-page.css'
import * as vue from 'vue'
import axios from 'axios'
import * as boostrap from 'bootstrap'

window['vue'] = vue
window['axios'] = axios
window['app'] = vue.createApp({
  components: { boostrap },
  created () {
    /**
     * @see https://dennisreimann.de/articles/delegating-html-links-to-vue-router.html
     */
    window.addEventListener('click', event => {
      // ensure we use the link, in case the click has been received by a sub element
      let { target } = event
      while (target && target.tagName !== 'A') target = target.parentNode
      // handle only links that do not reference external resources
      if (target/* && target.matches('a:not([href*=\'://\'])')*/ && target.href && window.frameElement) {
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
          top.postMessage({
            routeTo: to + url.search
          }, '*')
        }
      }
    })
  },
  mounted () {
    window.addEventListener('message', function (event) {
      if (event.data?.['dark'] !== undefined) {
        document.documentElement.classList.toggle('dark', event.data['dark'])
      }
    })

    window?.frameElement?.contentWindow?.parent?.postMessage({
      title: document.body.querySelector('h1')?.innerText,
      icon: document.body.querySelector('h1 > i:first-of-type')?.className
    }, '*')
  },
  methods: {
    actionSave () {
      document.forms[0].submit()
    },
    actionCancel () {
      top.postMessage({
        closeTab: true
      }, '*')
    },
    actionNew (data) {
      if (data.to) {
        top.postMessage({
          routeTo: data.to
        }, '*')
      }
    },
    routeTo (to) {
      top.postMessage({
        routeTo: to
      }, '*')
    }
  }
}).mount('#app-evo-page')

