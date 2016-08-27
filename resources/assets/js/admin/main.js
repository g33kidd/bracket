// TODO: Figure out how to clean up this file...
// it's just a bit messy at this point.
// window.Tether = require('tether');
// require('bootstrap/dist/js/bootstrap.js');

import { sync } from 'vuex-router-sync';

import Vue from 'vue';
import Router from 'vue-router';
import NProgress from 'nprogress';
import VueMoment from 'vue-moment';

// Vue.use(Router);
// Vue.use(Resource);
// Vue.use(VueMoment);

const router = new Router({
	saveScrollPosition: false,
	transitionOnLoad: true,
	history: true,
	root: '/admin',
});

// var Vue 	  = require('vue');
// var Router 	  = require('vue-router');
// var Resource  = require('vue-resource');
// var NProgress = require('nprogress');
// var VueMoment = require('vue-moment');

// var vm = new Vue({});

// Vue.use(Resource);
// Vue.use(Router);
// Vue.use(VueMoment);

// NProgress.start();
// NProgress.inc(0.2);

// Vue.transition('fade', {
// 	enterClass: 'fadeIn',
// 	leaveClass: 'fadeOut'
// });

// const router = new Router({
// 	saveScrollPosition: false,
// 	transitionOnLoad: true,
// 	root: '/admin',
// 	history: true
// });

// Vue.http.interceptors.push((request, next) => {
// 	NProgress.inc(0.2);
// 	request.headers['X-CSRF-TOKEN'] = Laravel.csrfToken;
// 	next((response) => {
// 		NProgress.done();
// 		return response;
// 	});
// });

// router.beforeEach(({next}) => {
// 	// Close any and all bootstrap modals.
// 	$('.modal').modal('hide');
// 	// Start the progress bar..
// 	NProgress.start();
// 	next();
// });

// router.afterEach(() => {
// 	NProgress.done();
// });

// var App = Vue.extend({});

// router.redirect({ '*': '/dashboard' });
// router.start(App, '#app');
