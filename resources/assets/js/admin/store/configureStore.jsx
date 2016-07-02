import { createStore, applyMiddleware, compose } from 'redux'
import thunk from 'redux-thunk'
import createLogger from 'redux-logger'
import api from '../middleware/api.js'
import rootReducer from '../reducers/index.jsx'

const logger = createLogger()

export default function configureStore(initialState) {
	const store = createStore(
		rootReducer,
		initialState,
		applyMiddleware(
			thunk,
			logger
		)
	)

	return store
}