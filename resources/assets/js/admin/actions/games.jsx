import axios from 'axios';

export const REQUEST_GAMES = 'REQUEST_GAMES';
export const RECEIVE_GAMES = 'RECEIVE_GAMES';
export const ADDING_GAME = 'ADDING_GAME';
export const ADDED_GAME = 'ADDED_GAME';

export function requestGames() {
	return {
		type: REQUEST_GAMES
	};
};

export function receiveGames(data) {
	return {
		type: RECEIVE_GAMES,
		payload: data
	};
};

export function addedGame(data) {
	return {
		type: ADDED_GAME,
		payload: data
	};
};

export function addingGame() {
	return {
		type: ADDING_GAME
	};
};

export function fetchGames() {
	return dispatch => {
		dispatch(requestGames());
		axios.get('/api/games')
			.then((response) => dispatch(receiveGames(response.data)))
			.catch((err) => console.log("There was an error.", err));
	};
};

export function addGame(data) {
	return dispatch => {
		dispatch(addingGame());
		axios.post('/api/games', data)
			.then((response) => dispatch(addedGame(response.data)))
			.catch((err) => console.log("There was an error.", err));
	};
};