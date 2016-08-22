require('bootstrap/dist/js/bootstrap.js');

// VueJS Stuff
window.Vue = require('vue');
require('vue-resource');

// Set the CSRF token on all Vue requests
Vue.http.interceptors.push((request, next) => {
    request.headers['X-CSRF-TOKEN'] = Laravel.csrfToken;
    next();
});
window.VueRouter = require('vue-router');

Vue.use(VueRouter);

var App = Vue.extend({});
var router = new VueRouter({
	history: true,
	root: '/admin',
	transitionOnLoad: true
});

router.map({
	'/games': {
		component: Games
	}
});

router.start(App, 'body');