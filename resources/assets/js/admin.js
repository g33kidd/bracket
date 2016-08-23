// 
window.Tether 		= require('tether');
require('bootstrap/dist/js/bootstrap.js');

var Vue 	  = require('vue');
var Router 	  = require('vue-router');
var Resource  = require('vue-resource');
var NProgress = require('nprogress');

Vue.use(Resource);
Vue.use(Router);

NProgress.start();
NProgress.inc(0.2);

Vue.transition('fade', {
	enterClass: 'fadeIn',
	leaveClass: 'fadeOut'
});

const router = new Router({
	saveScrollPosition: true,
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
	NProgress.start();
	next();
});

router.afterEach(() => {
	NProgress.done();
});

const view = (path) => {
	return (resolve) => {
		require([`${path}.vue`], resolve);
	};
};

var App = Vue.extend({});

Vue.component('admin-header', require('./components/admin/Header.vue'));

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
	}
});
router.start(App, 'body');