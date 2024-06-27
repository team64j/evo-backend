import '../css/app.css'
import * as vue from 'vue'
import axios from 'axios'
import router from './router'
import App from './components/App/App.vue'

window['vue'] = vue
window['axios'] = axios
//window['axios'].defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest'

window['app'] = vue.createApp(App, {
  data: JSON.parse(document.getElementById('__DATA__').textContent)
}).use(router).mount('#app-evo')
