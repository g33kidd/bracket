import { combineReducers } from 'redux';
import { routerReducer as routing } from 'react-router-redux';

// Reducers 
import games from '../reducers/games';
import platforms from '../reducers/platforms';
import nav from '../reducers/nav';
import posts from '../reducers/posts';

const rootReducer = combineReducers({
	nav,
	games,
	platforms,
	routing,
	posts
});

export default rootReducer;