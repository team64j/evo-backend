import '../css/app-page.css'
import * as vue from 'vue'
import axios from 'axios'
import * as boostrap from 'bootstrap'

window['vue'] = vue
window['axios'] = axios
window['app'] = vue.createApp({
  components: { boostrap },
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
    routeTo (to) {
      top.postMessage({
        routeTo: to
      }, '*')
    }
  }
}).mount('#app-evo-page')

