import React from 'react'
import { Route, IndexRoute } from 'react-router'

import App from './containers/App.jsx'
import SettingsPage from './containers/SettingsPage.jsx';
import OverviewPage from './containers/OverviewPage.jsx';
import GamesPage from './containers/GamesPage.jsx'
import PlatformsPage from './containers/PlatformsPage.jsx'
import DashboardPage from './containers/DashboardPage.jsx'

export default (
	<Route path="/admin" component={App}>
		<IndexRoute component={DashboardPage} />
		
		<Route path="settings" component={SettingsPage} />
		<Route path="settings/games" component={GamesPage} />
		<Route path="settings/platforms" component={PlatformsPage} />

		<Route path="overview" component={OverviewPage} />
	</Route>
)