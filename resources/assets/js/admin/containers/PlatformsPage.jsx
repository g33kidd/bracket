import React, { Component, PropTypes } from 'react'
import { connect } from 'react-redux'
// Load the actions here
// import { loadPlatforms } from '../actions/index.jsx'

// import individual components here

class PlatformsPage extends Component {
	constructor(props) {
		super(props)
	}

	// componentWillMount() {}
	// componentWillReceiveProps() {}

	render() {
		return (
			<div>
				<p>Some list of platforms.</p>
			</div>
		)
	}
}

export default PlatformsPage