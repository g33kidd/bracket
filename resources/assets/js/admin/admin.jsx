import React from 'react'
import { render } from 'react-dom'
import { browserHistory } from 'react-router'
import { syncHistoryWithStore } from 'react-router-redux'
import Root from './containers/Root.jsx'
import configureStore from './store/configureStore.jsx'

const store = configureStore()
const history = syncHistoryWithStore(browserHistory, store)

render(
	<Root history={history} store={store} />, 
	document.getElementById('root')
)