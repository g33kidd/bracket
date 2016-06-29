import React, { Component, PropTypes } from 'react'
import { connect } from 'react-redux'
import { browserHistory, Link } from 'react-router'
import MainHeader from '../components/MainHeader.jsx'
// import SecondaryHeader from '../components/SecondaryHeader.jsx'

class App extends Component {

	constructor(props) {
		super(props)
	}

	render() {
		const { children } = this.props
		return (
			<div>
				<MainHeader />
				<div className="container m-t-2">
					{children}
				</div>
			</div>
		)
	}

}

App.propTypes = {
	children: PropTypes.node
}

export default App