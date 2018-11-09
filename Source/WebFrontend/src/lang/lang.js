import Vue from 'vue'
import VueI18n from 'vue-i18n'

import en from './en.json'
import hu from './hu.json'

Vue.use(VueI18n)

const locale = 'en'

const messages = {
  en,
  hu
}

const i18n = new VueI18n({
  locale,
  messages
})

export default i18n
