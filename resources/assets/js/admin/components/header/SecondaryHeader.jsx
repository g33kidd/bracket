import React, { Component, PropTypes } from 'react';
import { Link } from 'react-router'
import _ from 'underscore';

const SecondaryHeader = (props) => {
	console.log(props.nav.secondary);
	const links = _.map(props.nav.secondary, function(link) {
		return (
			<li className="nav-item" key={link.id}>
				<Link to={link.location} className="nav-link">{link.title}</Link>
			</li>
		)
	});

	return (
		<nav className="navbar navbar-full navbar-dark bg-primary secondary">
			<div className="container">
				<ul className="nav navbar-nav">
					{links}
				</ul>
			</div>
		</nav>
	);
};

export default SecondaryHeader;