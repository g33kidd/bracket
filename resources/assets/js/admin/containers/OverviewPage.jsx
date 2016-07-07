import React, { Component, PropTypes } from 'react'
import { connect } from 'react-redux'
import { fetchPlatforms } from '../actions/platforms.jsx';
import { fetchGames } from '../actions/games.jsx';

import GamesCard from '../components/games/GamesCard.jsx';
import PlatformsCard from '../components/platforms/PlatformsCard.jsx';

class OverviewPage extends Component {
	constructor(props) {
		super(props)
	}

	componentDidMount() {
		this.props.dispatchGames();
		this.props.dispatchPlatforms();
	}

	render() {
		return (
			<div className="row">
				<div className="col-md-3">
					<GamesCard games={this.props.games} />
					<PlatformsCard platforms={this.props.platforms} />
				</div>
				<div className="col-md-9">
					<h1>Wat?</h1>
				</div>
			</div>
		);
	}
}

function mapStateToProps(state) {
	return {
		platforms: state.platforms,
		games: state.games
	};
}

function mapDispatchToProps(dispatch, componentProps) {
	return {
		dispatchPlatforms: () => {
			dispatch(fetchPlatforms());
		},
		dispatchGames: () => {
			dispatch(fetchGames());
		}
	}
}

export default connect(mapStateToProps, mapDispatchToProps)(OverviewPage);