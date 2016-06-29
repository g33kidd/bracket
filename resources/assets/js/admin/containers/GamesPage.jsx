import React, { Component, PropTypes } from 'react'
import { connect } from 'react-redux'
// Load the actions here
// import { loadGames } from '../actions.jsx'

// import individual components here

class GamesPage extends Component {
	constructor(props) {
		super(props)
	}

	// componentWillMount() {}
	// componentWillReceiveProps() {}

	render() {
		return (
			<div>
				<p>A list of supported games.</p>
			</div>
		)
	}
}

export default GamesPage