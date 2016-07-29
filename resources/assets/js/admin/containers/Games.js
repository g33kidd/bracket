import React, { Component, PropTypes } from 'react'
import { connect } from 'react-redux'
import { fetchGames, addGame } from '../actions/games';
import AddGame from '../components/games/AddGame';
import GamesTable from '../components/games/GamesTable';

class Games extends Component {
	constructor(props) {
		super(props)
	}

	componentWillMount() {
		this.props.dispatchGetGames();
	}

	render() {
		return (
			<div className="row">
				<div className="col-md-3">
					<AddGame addGame={this.props.dispatchAddGame} />
				</div>
				<div className="col-md-9">
					<GamesTable games={this.props.games} />
				</div>
			</div>
		)
	}
}

function mapStateToProps(state) {
	return {
		games: state.games
	};
}

function mapDispatchToProps(dispatch, componentProps) {
	return {
		dispatchAddGame: (data) => {
			dispatch(addGame(data));
		},
		dispatchGetGames: () => {
			dispatch(fetchGames());
		}
	};
}

export default connect(mapStateToProps, mapDispatchToProps)(Games);