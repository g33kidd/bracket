import React, { Component, PropTypes } from 'react'
import { connect } from 'react-redux'
import { browserHistory, Link } from 'react-router'

class App extends Component {

	constructor(props) {
		super(props)
	}

	render() {
		const { children } = this.props
		return (
			<div>
				<p>This is an app.... Okay.</p>
				<Link to={`/admin/games`}>Games</Link>
				<Link to={`/admin/platforms`}>Platforms</Link>
				{children}
			</div>
		)
	}

}

App.propTypes = {
	children: PropTypes.node
}

export default App