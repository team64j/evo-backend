import '../css/app-auth.css'
import * as Vue from 'vue'
import * as Axios from 'axios'

window['Axios'] = Axios
window['Vue'] = Vue
window['Evo'] = Vue.createApp({}).mount('#app-evo-auth')

