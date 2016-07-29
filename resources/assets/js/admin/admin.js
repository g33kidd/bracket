import React from 'react';
import { render } from 'react-dom';
import { syncHistoryWithStore } from 'react-router-redux';
import { browserHistory } from 'react-router';

import initStore from './config/store';
import rootReducer from './reducers/index.jsx';
import Root from './containers/Root.jsx';

// Creates the store for the application.
const store = initStore(rootReducer, {});
const history = syncHistoryWithStore(browserHistory, store);

render(
	<Root history={history} store={store} />,
	document.getElementById('root')
);