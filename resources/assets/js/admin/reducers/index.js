import { combineReducers } from 'redux';
import { routerReducer as routing } from 'react-router-redux';
import games from '../reducers/games';
import platforms from '../reducers/platforms';
import { nav } from '../reducers/nav';

const rootReducer = combineReducers({
	games,
	platforms,
	nav,
	routing
});

export default rootReducer;