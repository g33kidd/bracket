Vue.component('authorized-clients', require('./components/passport/AuthorizedClients.vue'));
Vue.component('personal-access-tokens', require('./components/passport/PersonalAccessTokens.vue'));
Vue.component('passport-clients', require('./components/passport/Clients.vue'));
Vue.component('auth', require('./components/Auth.vue'));

const app = new Vue({
	el: 'body'
});