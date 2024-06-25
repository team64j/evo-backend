import '../css/app.css'
import axios from 'axios'
import * as vue from 'vue'
import App from './components/App/App.vue'
import router from './router.js'

window['axios'] = axios
window['axios'].defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest'

window['vue'] = vue
window['app'] = vue.createApp(App, {
  data: window['__DATA__']
}).use(router).mount('body')
