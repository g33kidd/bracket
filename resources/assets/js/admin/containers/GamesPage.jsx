import React, { Component, PropTypes } from 'react'
import { connect } from 'react-redux'
import { fetchGames } from '../actions/index.jsx'

// import individual components here
import GameListCard from '../components/GameListCard.jsx'

class GamesPage extends Component {
	constructor(props) {
		super(props)
	}

	render() {
		return (
			<div>
				<p>A list of supported games.</p>
			</div>
		)
	}
}

export default GamesPage