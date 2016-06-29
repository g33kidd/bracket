import { createStore, applyMiddleware, compose } from 'redux'
import rootReducer from '../reducers/index.jsx'

export default function configureStore(preloadedState) {
	const store = createStore(
		rootReducer,
		preloadedState
	)

	return store
}