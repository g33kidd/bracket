import React, { Component, PropTypes } from 'react';
import { Link } from 'react-router'

const MainHeader = (props) => {
	return (
		<nav className="navbar navbar-full navbar-dark bg-inverse">
			<div className="container">
				<Link to={`/admin`} className="navbar-brand">Bracket</Link>
				<ul className="nav navbar-nav">
					<li className="nav-item">
						<Link to={`/admin/games`} className="nav-link">Games</Link>
					</li>
					<li className="nav-item">
						<Link to={`/admin/platforms`} className="nav-link">Platforms</Link>
					</li>
				</ul>
			</div>
		</nav>
	);
};

export default MainHeader;