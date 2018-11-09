import Vue from 'vue'
import App from './App.vue'
import router from './router'
import axios from 'axios'
import CancelToken from 'axios'
import i18n from './lang/lang'
import store from './store'

import ElementUI from 'element-ui'
import locale from 'element-ui/lib/locale/lang/en'
Vue.use(ElementUI, { locale })
import 'element-ui/lib/theme-chalk/index.css'
require('@/assets/css/style.css')



Vue.config.productionTip = false

new Vue({
	store,
  	i18n,
  	axios,
  	router,
  	render: h => h(App)
}).$mount('#app')
