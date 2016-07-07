import React, { Component, PropTypes } from 'react';
import { Link } from 'react-router'
import _ from 'underscore';

const MainHeader = (props) => {
	console.log(props.nav.primary);
	const links = _.map(props.nav.primary, function(link) {
		return (
			<li className="nav-item" key={link.id}>
				<Link to={link.location} onClick={props.updateNav} className="nav-link">{link.title}</Link>
			</li>
		)
	});

	return (
		<nav className="navbar navbar-full navbar-dark bg-inverse primary">
			<div className="container">
				<Link to={`/admin`} className="navbar-brand">Bracket</Link>
				<ul className="nav navbar-nav">
					{links}
				</ul>
			</div>
		</nav>
	);
};

export default MainHeader;