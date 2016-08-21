require('./boot');

Vue.component('game-manager', require('./components/admin/GamesManager.vue'));
Vue.component('admin-header', require('./components/admin/Header.vue'));

const app = new Vue({
	el: 'body'
});