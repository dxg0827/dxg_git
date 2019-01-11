// The Vue build version to load with the `import` command
// (runtime-only or standalone) has been set in webpack.base.conf with an alias.
import Vue from 'vue'
import moment from 'moment/moment'
import App from './App'
import router from './router'
import {formatDate} from './assets/js/date'
import VueResource from 'vue-resource';
import './assets/js/jquery-1.11.3'
import $ from 'jquery'

Vue.use(VueResource);

Vue.filter('moment', function (value, formatString) {
  formatString = formatString || 'YYYY-MM-DD hh:00';
  // return moment(value).format(formatString); // value可以是普通日期 20170723
  return moment.unix(value).format(formatString); // 这是时间戳转时间
});

import './assets/js/main'

// Main.main();
// Main.navText(text);
// Main.dateFormat(time);
// Main.cartUpdate(uid);

Vue.config.productionTip = false

/* eslint-disable no-new */
new Vue({
  el: '#app',
  router,
  components: { App },
  template: '<App/>'//指定模版为app
})
