import { combineReducers } from 'redux'
import { routerReducer as routing } from 'react-router-redux'

import { combineReducers } from 'redux'
import { routerReducer as routing } from 'react-router-redux'
import {
	REQUEST_GAMES, REQUEST_PLATFORMS,
	RECEIVE_GAMES, RECEIVE_PLATFORMS
} from '../actions/index.jsx'

// Fetch the games from the API
function games(state = {
	isFetching: false,
	games: []
}, action) {
	switch(action.type) {
		case REQUEST_GAMES:
			return Object.assign({}, state, {
				isFetching: true
			})
		case RECEIVE_GAMES:
			return Object.assign({}, state, {
				isFetching: false,
				games: action.games,
				lastUpdated: action.receivedAt
			})
		default:
			return state
	}
}

// Fetch the platforms from the API
function platforms(state = {
	isFetching: false,
	platforms: []
}, action) {
	switch(action.type) {
		case REQUEST_PLATFORMS:
			return Object.assign({}, state, {
				isFetching: true
			})
		case RECEIVE_PLATFORMS:
			return Object.assign({}, state, {
				isFetching: false,
				platforms: action.platforms,
				lastUpdated: action.receivedAt
			})
		default:
			return state
	}
}

// All the reducer functions combined.
const rootReducer = combineReducers({
	games,
	platforms,
	routing
})

export default rootReducer