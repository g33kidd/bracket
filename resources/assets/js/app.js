window._ = require('lodash');
window.$ = window.jQuery = require('jquery');
window.Vue = require('vue');
window.Tether = require('tether');
require('vue-resource');
require('bootstrap/dist/js/bootstrap.js');

Vue.http.interceptors.push((request, next) => {
    request.headers['X-CSRF-TOKEN'] = Laravel.csrfToken;
    next();
});

Vue.component('authorized-clients', require('./components/passport/AuthorizedClients.vue'));
Vue.component('personal-access-tokens', require('./components/passport/PersonalAccessTokens.vue'));
Vue.component('passport-clients', require('./components/passport/Clients.vue'));
Vue.component('games', require('./components/Games.vue'));

const app = new Vue({
	el: 'body'
});