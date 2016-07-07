import { combineReducers } from 'redux';
import { routerReducer as routing } from 'react-router-redux';
import games from '../reducers/games.jsx';
import platforms from '../reducers/platforms.jsx';
import { nav } from '../reducers/nav.jsx';

const rootReducer = combineReducers({
	games,
	platforms,
	nav,
	routing
});

export default rootReducer;