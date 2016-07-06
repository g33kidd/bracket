import React from 'react'
import { render } from 'react-dom';
import { syncHistoryWithStore } from 'react-router-redux';
import { browserHistory } from 'react-router';
import { createStore, applyMiddleware, compose } from 'redux';
import thunk from 'redux-thunk';
import createLogger from 'redux-logger';
import rootReducer from './redux/reducers.jsx';
import Root from './containers/Root.jsx';

const logger = createLogger();
const store = createStore(
	rootReducer,
	{},
	applyMiddleware(thunk, logger)
);

const history = syncHistoryWithStore(browserHistory, store);

render(
	<Root history={history} store={store} />,
	document.getElementById('root')
);