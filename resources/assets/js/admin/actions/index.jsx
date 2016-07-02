import fetch from 'isomorphic-fetch'

// game actions
export const REQUEST_GAMES = 'REQUEST_GAMES'
export const RECEIVE_GAMES = 'RECEIVE_GAMES'
export const ADD_GAME = 'ADD_GAME'
export const UPDATE_GAME = 'UPDATE_GAME'
export const REMOVE_GAME = 'REMOVE_GAME'

// platform actions
export const REQUEST_PLATFORMS = 'REQUEST_PLATFORMS'
export const RECEIVE_PLATFORMS = 'RECEIVE_PLATFORMS'
export const ADD_PLATFORM = 'ADD_PLATFORM'
export const UPDATE_PLATFORM = 'UPDATE_PLATFORM'
export const REMOVE_PLATFORM = 'REMOVE_PLATFORM'

// some test "actions"

export function requestGames() {
	return {
		type: REQUEST_GAMES
	}
}

export function requestPlatforms() {
	return {
		type: REQUEST_PLATFORMS
	}
}

export function receiveGames(json) {
	console.log(json)
	return {
		type: RECEIVE_GAMES,
		games: json.data.children.map(child => child.data),
		receivedAt: Date.now()
	}
}

export function receivePlatforms(json) {
	return {
		type: RECEIVE_PLATFORMS,
		platforms: json.data.children.map(child => child.data)
	}
}

export function fetchGames() {
	return dispatch => {
		dispatch(requestGames())
		return fetch(`bracket.dev/api/games`)
			.then(response => console.log(response))
			.then(response => reponse.json())
			.then(json => dispatch(receiveGames(json)))
	}
}

export function fetchPlatforms() {
	return dispatch => {
		dispatch(requestPlatforms())
		return fetch(`bracket.dev/api/platforms`)
			.then(response => response.json())
			.then(json => dispatch(receivePlatforms(json)))
	}
}