import { createStore, applyMiddleware, compose } from 'redux'
import thunk from 'redux-thunk'
import createLogger from 'redux-logger'
import api from '../middleware/api.js'
import rootReducer from '../reducers/index.jsx'

export default function configureStore(preloadedState) {
	const store = createStore(
		rootReducer,
		preloadedState
	)

	return store
}