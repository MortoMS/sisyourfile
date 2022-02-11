import Vue from 'vue';
import App from './App.vue';
import router from './plugins/router';
import store from './plugins/vuex';

import './plugins/mdi-icons';
import './plugins/art-design';

Vue.config.productionTip = false;

new Vue({
  router,
  store: store,
  render: h => h(App),
}).$mount('#app');
