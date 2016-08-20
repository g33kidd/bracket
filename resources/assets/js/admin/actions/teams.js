import axios from 'axios';

export const REQUEST_TEAMS = 'REQUEST_GAMES';
export const RECEIVE_TEAMS = 'RECEIVE_GAMES';
export const ADDING_TEAM = 'ADDING_TEAM';
export const ADDED_TEAM = 'ADDED_TEAM';

export function requestTeams() {
	return {
		type: REQUEST_TEAMS
	};
};

export function receiveTeams(data) {
	return {
		type: RECEIVE_TEAMS,
		payload: data
	};
};

export function addingTeam() {
	return {
		type: ADDING_TEAM
	};
};

export function addedTeam(data) {
	return {
		type: ADDED_TEAM,
		payload: data
	};
};

export function fetchTeams() {
	return dispatch => {
		dispatch(requestTeams());
		axios.get('/api/teams')
			.then((response) => dispatch(receiveTeams(response.data)))
			.catch((err) => console.log("There was an error.", err));
	};
}

export function addTeam(data) {
	return dispatch => {
		dispatch(addingTeam());
		axios.post('/api/teams', data)
			.then((response) => dispatch(addedTeam(response.data)))
			.catch((err) => console.log("There was an error.", err));
	};
}