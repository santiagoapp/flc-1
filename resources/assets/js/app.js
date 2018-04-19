
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */



 window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
// require('./../talvbansal/media-manager/js/media-manager');

Vue.component('cargo', require('./components/Cargo.vue'));
Vue.component('roles', require('./components/Roles.vue'));
Vue.component('users', require('./components/User.vue'));
Vue.component('zonas', require('./components/Zona.vue'));

const app = new Vue({
	el: '#app'
});
