import React, { Component, PropTypes } from 'react'
import { connect } from 'react-redux'
import { fetchPlatforms } from '../actions/platforms';
import { fetchGames } from '../actions/games';

import GamesCard from '../components/games/GamesCard';
import PlatformsCard from '../components/platforms/PlatformsCard';

class Settings extends Component {
	constructor(props) {
		super(props);
	}

	componentWillMount() {
		this.props.updateNav([
			{ title: 'Games', location: 'settings/games' },
			{ title: 'Platforms', location: 'settings/platforms' }
		]);
		this.props.dispatchGames();
		this.props.dispatchPlatforms();
	}

	render() {
		return (
			<div className="settings">
				{this.props.children}
			</div>
		);
	}
};

function mapStateToProps(state) {
	return {
		platforms: state.platforms,
		games: state.games
	};
};

function mapDispatchToProps(dispatch, componentProps) {
	return {
		dispatchPlatforms: () => {
			dispatch(fetchPlatforms());
		},
		dispatchGames: () => {
			dispatch(fetchGames());
		}
	};
};

export default connect(mapStateToProps, mapDispatchToProps)(Settings);