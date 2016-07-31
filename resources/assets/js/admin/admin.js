import { render } from 'react-dom';
import { syncHistoryWithStore } from 'react-router-redux';
import { browserHistory } from 'react-router';

import routes from 'config/routes';
import initStore from 'config/store';
import rootReducer from 'reducers/index';
import Root from 'containers/Root';

// Creates the store for the application.
const store = initStore(rootReducer, {});
const history = syncHistoryWithStore(browserHistory, store);

render(
	<Root history={history} store={store} routes={routes} />,
	document.getElementById('root')
);