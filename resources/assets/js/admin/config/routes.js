import React from 'react'
import { Route, IndexRoute } from 'react-router'

import App from './containers/App'
import SettingsPage from './containers/SettingsPage';
import OverviewPage from './containers/OverviewPage';
import GamesPage from './containers/GamesPage'
import PlatformsPage from './containers/PlatformsPage'
import DashboardPage from './containers/DashboardPage'
import PostsPage from './containers/PostsPage';

import AddPost from './components/posts/AddPost';

export default (
	<Route path="admin" component={App}>
		<IndexRoute component={DashboardPage} />
		
		<Route path="settings" component={SettingsPage} />
		<Route path="settings/games" component={GamesPage} />
		<Route path="settings/platforms" component={PlatformsPage} />

		<Route path="overview" component={OverviewPage} />

		<Route path="posts" component={PostsPage}>
			<Route path="add" component={AddPost} />
		</Route>
	</Route>
)