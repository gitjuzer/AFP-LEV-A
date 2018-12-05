import Vue from 'vue'
import App from './App.vue'
import router from './router'
import axios from 'axios'
import CancelToken from 'axios'
import i18n from './lang/lang'
import store from './store'
import { library } from '@fortawesome/fontawesome-svg-core'
import { faFile, faProjectDiagram, faCopy, faUpload, faCog, faTasks, faTable, faUsers, faSitemap, faPlusCircle, faUser, faPlus, faChevronLeft, faEdit, faBan, faCode, faChalkboard, faLaptopCode, faSync, faUserPlus, faKey, faPlayCircle, faStopCircle, faRedo } from '@fortawesome/free-solid-svg-icons'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'

library.add(faFile, faProjectDiagram, faCopy, faUpload, faCog, faTasks, faTable, faUsers, faSitemap, faPlusCircle, faUser, faPlus, faChevronLeft, faEdit, faBan, faCode, faChalkboard, faLaptopCode, faSync, faUserPlus, faKey, faPlayCircle, faStopCircle, faRedo)
Vue.component('font-awesome-icon', FontAwesomeIcon)

import ElementUI from 'element-ui'
import locale from 'element-ui/lib/locale/lang/en'
Vue.use(ElementUI, { locale })
import 'element-ui/lib/theme-chalk/index.css'
require('@/assets/css/style.css')

var baseServerUrl = 'https://nyusz.eu/afpleva/public/';
Vue.prototype.$baseServerUrl = baseServerUrl;


export const globalStore = new Vue({
  data: {
    test: 'global hello world',
    user:{},
    loggedIn: false,
    token: null,
  }
})
Vue.prototype.$globals = globalStore;


Vue.use(axios);
Vue.use(CancelToken);
Vue.prototype.$http = axios.create({
  baseURL: baseServerUrl,
  timeout: 3000,
  responseType: 'json',
  headers:{
    "Authorization": 'Bearer ' + localStorage.getItem('token'),
    "Content-Type": 'application/json',
    //"Accept-Language": 'en-EN,en;',
  }
});
Vue.prototype.$httpBase = axios.create({
  baseURL: baseServerUrl,
  timeout: 3000,
 /* headers:{
    "Accept-Language": 'en-EN,en;'
  }*/
});

Vue.config.productionTip = false

new Vue({
	store,
  	i18n,
  	axios,
  	router,
  	render: h => h(App)
}).$mount('#app')
