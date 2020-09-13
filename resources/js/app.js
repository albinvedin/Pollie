/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

require('moment/moment');

require('./plugins/bootstrap-datepicker');

require('./plugins/bootstrap-switch');

require('./plugins/nouislider.min');

require('./paper-kit');

require('./field-populator');

require('./fingerprint');

require('chart.js');

require('vue-chartjs');

require('./toast');

require('./copyable');

window.Vue = require('vue');

import VueSpinners from 'vue-spinners';

Vue.use(VueSpinners);

Vue.component('vote-charts', require('./components/VoteCharts.vue').default);

const app = new Vue({
    el: '#app'
});

require('./expander');
