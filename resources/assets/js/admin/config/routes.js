import React from 'react'
import { Route, IndexRoute } from 'react-router'

// Containers
import App from '../containers/App';
import Settings from '../containers/Settings';
import Overview from '../containers/Overview';
import Games from '../containers/Games';
import Platforms from '../containers/Platforms';
import Dashboard from '../containers/Dashboard';
import Posts from '../containers/Posts';

// Components that go inside the containers
import AddPost from '../components/posts/AddPost';

export default (
	<Route path="admin" component={App}>

		<IndexRoute component={Dashboard} />
		<Route path="overview" component={Overview} />

		<Route path="settings" component={Settings}>
			<Route path="games" component={Games} />
			<Route path="platforms" component={Platforms} />
		</Route>

		<Route path="posts" component={Posts}>
			<Route path="add" component={AddPost} />
		</Route>

	</Route>
)