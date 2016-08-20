import { combineReducers } from 'redux';
import { routerReducer as routing } from 'react-router-redux';

// Reducers 
import games from 'reducers/games';
import platforms from 'reducers/platforms';
import nav from 'reducers/nav';
import posts from 'reducers/posts';
import teams from 'reducers/teams';

const rootReducer = combineReducers({
	nav,
	games,
	platforms,
	teams,
	routing,
	posts
});

export default rootReducer;