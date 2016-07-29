import React from 'react';
import { Link } from 'react-router'
import _ from 'underscore';

const SecondaryHeader = (props) => {
	const links = _.map(props.nav.secondary, function(link) {
		return (
			<li className="nav-item" key={link.location}>
				<Link to={`/admin/` + link.location} className="nav-link">{link.title}</Link>
			</li>
		);
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