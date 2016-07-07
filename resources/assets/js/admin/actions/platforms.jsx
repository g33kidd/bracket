import axios from 'axios';

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
