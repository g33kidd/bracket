require('./boot');
window.VueRouter = require('vue-router');

Vue.use(VueRouter);

var Games = Vue.component('game-manager', require('./components/admin/GamesManager.vue'));
var Header = Vue.component('admin-header', require('./components/admin/Header.vue'));

var App = Vue.extend({});
var router = new VueRouter({
	history: true,
	root: '/admin',
	
});

router.map({
	'/games': {
		component: Games
	}
});

router.start(App, 'body');

// const app = new Vue({
// 	el: 'body'
// });