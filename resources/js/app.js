require('./bootstrap');

require('alpinejs');

window.Vue = require('vue');

Vue.component('user-notification', require('./components/UserNotification.vue').default);

const app = new Vue({
    el: '#app',
});
