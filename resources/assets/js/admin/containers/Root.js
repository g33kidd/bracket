import React, { Component, PropTypes } from 'react'
import { Provider } from 'react-redux'
import { Router } from 'react-router'

const Root = (props) => {
	return (
		<Provider store={props.store}>
			<div className="content">
				<Router history={props.history} routes={props.routes} />
			</div>
		</Provider>
	);
};

export default Root