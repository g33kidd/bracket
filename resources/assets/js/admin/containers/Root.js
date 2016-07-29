import React, { Component, PropTypes } from 'react'
import { Provider } from 'react-redux'
import { Router } from 'react-router'
import routes from '../routes'

const Root = (props) => {
	return (
		<Provider store={props.store}>
			<div className="content">
				<Router history={props.history} routes={routes} />
			</div>
		</Provider>
	);
};

export default Root