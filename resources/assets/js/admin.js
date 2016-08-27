// TODO: Figure out how to clean up this file...
// it's just a bit messy at this point.
window.Tether 		= require('tether');
require('bootstrap/dist/js/bootstrap.js');

var Vue 	  	= require('vue');
var Router 	  = require('vue-router');
var Resource  = require('vue-resource');
var NProgress = require('nprogress');
var VueMoment = require('vue-moment');

var vm = new Vue({});

Vue.use(Resource);
Vue.use(Router);
Vue.use(VueMoment);

NProgress.start();
NProgress.inc(0.2);

Vue.transition('fade', {
	enterClass: 'fadeIn',
	leaveClass: 'fadeOut'
});

const router = new Router({
	saveScrollPosition: false,
	transitionOnLoad: true,
	root: '/admin',
	history: true
});

Vue.http.interceptors.push((request, next) => {
	NProgress.inc(0.2);
	request.headers['X-CSRF-TOKEN'] = Laravel.csrfToken;
	next((response) => {
		NProgress.done();
		return response;
	});
});

router.beforeEach(({next}) => {
	// Close any and all bootstrap modals.
	$('.modal').modal('hide');
	// Start the progress bar..
	NProgress.start();
	next();
});

router.afterEach(() => {
	NProgress.done();
});

// This doesn't work for some reason...
const view = (path) => {
	return (resolve) => {
		require([`${path}.vue`], resolve);
	};
};

Vue.component('admin-header', require('./components/admin/Header.vue'));
Vue.component('authorized-clients', require('./components/passport/AuthorizedClients.vue'));
Vue.component('personal-access-tokens', require('./components/passport/PersonalAccessTokens.vue'));
Vue.component('passport-clients', require('./components/passport/Clients.vue'));

var App = Vue.extend({});

router.map({
	'/': {
		name: 'dashboard',
		navbar: "Dashboard",
		component: require('./components/admin/Dashboard.vue')
	},
	'/games': {
		name: 'games',
		navbar: 'Games',
		component: require('./components/admin/GamesManager.vue')
	},
	'/platforms': {
		name: 'platforms',
		navbar: 'Platforms',
		component: require('./components/admin/PlatformsManager.vue')
	},
	'/users': {
		name: 'users',
		navbar: 'Manage Users',
		component: require('./components/admin/UsersManager.vue')
	},
	'/oauth': {
		name: 'oauth-settings',
		navbar: 'OAuth Settings',
		component: require('./components/admin/OauthSettings.vue')
	}
});

router.redirect({ '*': '/dashboard' });
router.start(App, 'app');
