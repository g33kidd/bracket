import * as ActionTypes from '../actions/index.jsx'
import { routerReducer as routing } from 'react-router-redux'
import { combineReducers } from 'redux'

function errorMessage(state = null, action) {
	const { type, error } = action

	if(type === ActionTypes.ERROR_MESSAGE) {
		return null
	}else if(error) {
		return action.error
	}

	return state
}

const rootReducer = combineReducers({
	errorMessage,
	routing
})

export default rootReducer