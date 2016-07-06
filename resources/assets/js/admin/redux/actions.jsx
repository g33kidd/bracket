import axios from 'axios';

// TODO: Move to own files and such...

// GAME ACTIONS
// =====================================================
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

// PLATFORM ACTIONS
// =====================================================
export const REQUEST_PLATFORMS = 'REQUEST_PLATFORMS';
export const RECEIVE_PLATFORMS = 'RECEIVE_PLATFORMS';
export const ADDING_PLATFORM = 'ADDING_PLATFORM';
export const ADDED_PLATFORM = 'ADDED_PLATFORM';

export function requestPlatforms() {
	return {
		type: REQUEST_PLATFORMS
	};
};

export function receivePlatforms(data) {
	return {
		type: RECEIVE_PLATFORMS,
		payload: data
	};
};

export function addingPlatform() {
	return {
		type: ADDING_PLATFORM
	};
};

export function addedPlatform(data) {
	return {
		type: ADDED_PLATFORM,
		payload: data
	};
};

export function fetchPlatforms() {
	return dispatch => {
		dispatch(requestPlatforms());
		axios.get('/api/platforms')
			.then((response) => dispatch(receivePlatforms(response.data)))
			.catch((err) => console.log("There was an error.", err));
	};
};

export function addPlatform(data) {
	return dispatch => {
		dispatch(addingPlatform());
		axios.post('/api/platforms', data)
			.then((respose) => dispatch(addedPlatform(response.data)))
			.catch((err) => console.log("There was an error.", err));
	};
};

