import '../css/app.css'
import * as vue from 'vue'
import axios from 'axios'
import _ from 'lodash'
import router from './router.js'
import App from './components/App/App.vue'

window[/*(_*/'_'/*_)*/] = _

window['axios'] = axios
window['axios'].defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest'

window['vue'] = vue
window['app'] = vue.createApp(App, {
  data: window['__DATA__']
}).use(router).mount('body')
