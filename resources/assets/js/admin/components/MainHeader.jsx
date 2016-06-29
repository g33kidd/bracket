import React, { Component, PropTypes } from 'react'
import { Link } from 'react-router'

export default class MainHeader extends Component {

	render() {
		// Make the nav items customizable in the future
		return (
			<nav className="navbar navbar-full navbar-dark bg-inverse">
				<div className="container">
					<a className="navbar-brand">Bracket</a>
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
		)
	}

}