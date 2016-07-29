import React from 'react';
import { createStore, applyMiddleware, composer } from 'redux';
import thunk from 'redux-thunk';
import createLogger from 'redux-logger';

export default function initStore(reducer, initState={}) {
	const logger = createLogger();
	const middleware = applyMiddleware(thunk, logger);
	return createStore(reducer, initState, middleware);
};