import React from 'react'
import { Route } from 'react-router'
import App from './containers/App.jsx'
import GamesPage from './containers/GamesPage.jsx'
import PlatformsPage from './containers/PlatformsPage.jsx'

export default (
	<Route path="/admin" component={App}>
		<Route path="games" component={GamesPage} />
		<Route path="platforms" component={PlatformsPage} />
	</Route>
)