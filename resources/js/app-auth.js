import '../css/app-auth.css'
import * as vue from 'vue'
import axios from 'axios'

window['vue'] = vue
window['axios'] = axios
window['app'] = vue.createApp({}).mount('#app-evo-auth')

