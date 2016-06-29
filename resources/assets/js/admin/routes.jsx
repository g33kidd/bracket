import React from 'react'
import { Route, IndexRoute } from 'react-router'
import App from './containers/App.jsx'
import GamesPage from './containers/GamesPage.jsx'
import PlatformsPage from './containers/PlatformsPage.jsx'
import DashboardPage from './containers/DashboardPage.jsx'

export default (
	<Route path="/admin" component={App}>
		<IndexRoute component={DashboardPage} />
		<Route path="games" component={GamesPage} />
		<Route path="platforms" component={PlatformsPage} />
	</Route>
)