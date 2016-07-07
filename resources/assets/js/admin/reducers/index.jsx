import { combineReducers } from 'redux';
import { routerReducer as routing } from 'react-router-redux';
import games from '../reducers/games.jsx';
import platforms from '../reducers/platforms.jsx';

const rootReducer = combineReducers({
	games,
	platforms,
	routing
});

export default rootReducer;