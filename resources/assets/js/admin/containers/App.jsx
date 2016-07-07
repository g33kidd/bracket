import React, { Component, PropTypes } from 'react'
import { connect } from 'react-redux'
import { browserHistory, Link } from 'react-router'
import { changeNav } from '../actions/navigation.jsx';
import MainHeader from '../components/header/MainHeader.jsx'
import SecondaryHeader from '../components/header/SecondaryHeader.jsx';

class App extends Component {

	constructor(props) {
		super(props)
	}

	componentDidMount() {
		this.props.dispatchNav();
	}

	render() {
		const { children } = this.props
		return (
			<div>
				<header>
					<MainHeader nav={this.props.nav} />
					<SecondaryHeader nav={this.props.nav} />
				</header>
				<div className="container m-t-2">
					{children}
				</div>
			</div>
		)
	}

}

function mapStateToProps(state) {
	return {
		nav: state.nav
	};
}

function mapDispatchToProps(dispatch, componentProps) {
	return {
		dispatchNav: () => {
			dispatch(changeNav());
		}
	}
}

export default connect(mapStateToProps, mapDispatchToProps)(App);