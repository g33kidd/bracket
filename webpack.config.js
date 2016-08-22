var webpack = require('webpack');
var path	= require('path');

module.exports = {

	resolve: {
		modules: [
			path.resolve('./resources/assets/js'),
			'node_modules'
		]
	},

	plugins: [
		new webpack.ProvidePlugin({
			jQuery: 'jquery',
			$: 'jquery',
			_: 'lodash',
			Vue: 'vue',
			VueRouter: 'vue-router'
		})
	]

};