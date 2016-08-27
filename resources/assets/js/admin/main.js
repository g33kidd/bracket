// TODO: Figure out how to clean up this file...
// it's just a bit messy at this point.
window.Tether = require('tether');
require('bootstrap/dist/js/bootstrap.js');

import Vue from 'vue';
import Router from 'vue-router';
import Resource from 'vue-resource';
import NProgress from 'nprogress';
import VueMoment from 'vue-moment';

import App from './components/App.vue';

Vue.use(Router);
Vue.use(Resource);
Vue.use(VueMoment);

NProgress.start();
NProgress.inc(0.2);

Vue.transition('fade', {
	enterClass: 'fadeIn',
	leaveClass: 'fadeOut'
});

let router = new Router({
	saveScrollPosition: false,
	transitionOnLoad: true,
	history: true,
	root: '/admin'
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

router.map({
	'/': {
		name: 'dashboard',
		navbar: "Dashboard",
		component: require('./components/Dashboard.vue')
	},
	'/games': {
		name: 'games',
		navbar: 'Games',
		component: require('./components/GamesManager.vue')
	},
	'/platforms': {
		name: 'platforms',
		navbar: 'Platforms',
		component: require('./components/PlatformsManager.vue')
	},
	'/users': {
		name: 'users',
		navbar: 'Manage Users',
		component: require('./components/UsersManager.vue')
	},
	'/oauth': {
		name: 'oauth-settings',
		navbar: 'OAuth Settings',
		component: require('./components/OauthSettings.vue')
	}
});

router.redirect({ '*': '/' });
router.start(App, '#app');
