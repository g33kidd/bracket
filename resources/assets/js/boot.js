// Lodash and jQuery
window._ = require('lodash');
window.$ = window.jQuery = require('jquery');

// Require the bootstrap JS files
// and import Tether as it's required by bootstrap now.
window.Tether = require('tether');
require('bootstrap/dist/js/bootstrap.js');

// VueJS Stuff
window.Vue = require('vue');
require('vue-resource');

// Set the CSRF token on all Vue requests
Vue.http.interceptors.push((request, next) => {
    request.headers['X-CSRF-TOKEN'] = Laravel.csrfToken;
    next();
});