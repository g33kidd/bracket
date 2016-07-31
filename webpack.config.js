var path = require('path');
var webpack = require('webpack');

module.exports = {

	resolve: {
		modules: [
			path.resolve('./resources/assets/js/admin'),
			'node_modules'
		]
	},

	plugins: [
		new webpack.ProvidePlugin({
			'React': 'react'
		})
	]

};