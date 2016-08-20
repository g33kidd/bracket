import React, { Component, PropTypes } from 'react'
import { connect } from 'react-redux'
import { browserHistory, Link } from 'react-router'
import { initNav, updateNav } from 'actions/nav';
import MainHeader from 'components/header/MainHeader'
import SecondaryHeader from 'components/header/SecondaryHeader';

class App extends Component {

	constructor(props) {
		super(props);
	}

	componentWillMount() {
		this.props.dispatchInitNav();
	}

	render() {
		const children = React.Children.map(this.props.children, (child) => React.cloneElement(child, {
			updateNav: this.props.dispatchUpdateNav
		}));

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
		);
	}
};

function mapStateToProps(state) {
	return {
		nav: state.nav
	};
};

function mapDispatchToProps(dispatch, componentProps) {
	return {
		dispatchInitNav: () => {
			dispatch(initNav());
		},
		dispatchUpdateNav: (data) => {
			dispatch(updateNav(data));
		}
	};
};

export default connect(mapStateToProps, mapDispatchToProps)(App);