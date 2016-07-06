import { combineReducers } from 'redux';
import { routerReducer as routing } from 'react-router-redux';
import { 
	REQUEST_GAMES, 
	RECEIVE_GAMES,
	REQUEST_PLATFORMS,
	RECEIVE_PLATFORMS,
	ADDING_GAME,
	ADDED_GAME,
	ADDING_PLATFORM,
	ADDED_PLATFORM
} from './actions.jsx';

const GAMES_INIT_STATE = {
	isFetching: false,
	isAddingGame: false,
	items: []
};

const PLATFORMS_INIT_STATE = {
	isFetching: false,
	isAddingPlatform: false,
	items: []
};

function games(state=GAMES_INIT_STATE, action) {
	switch(action.type) {
		case REQUEST_GAMES:
			return Object.assign({}, state, {
				isFetching: true
			});
		case RECEIVE_GAMES:
			return Object.assign({}, state, {
				isFetching: false,
				items: action.payload
			});
		case ADDING_GAME:
			return Object.assign({}, state, {
				isAddingGame: true
			});
		case ADDED_GAME:
			return Object.assign({}, state, {
				items: state.items.concat(action.payload)
			});
		default:
			return state;
	}
}

function platforms(state=PLATFORMS_INIT_STATE, action) {
	switch(action.type) {
		case REQUEST_PLATFORMS:
			return Object.assign({}, state, {
				isFetching: true
			});
		case RECEIVE_PLATFORMS:
			return Object.assign({}, state, {
				isFetching: false,
				items: action.payload
			});
		case ADDING_PLATFORM:
			return Object.assign({}, state, {
				isAddingPlatform: true
			});
		case ADDED_PLATFORM:
			return Object.assign({}, state, {
				isAddingPlatform: false,
				items: state.items.concat(action.payload)
			});
		default:
			return state;
	}
}

const rootReducer = combineReducers({
	games,
	platforms,
	routing
});

export default rootReducer;