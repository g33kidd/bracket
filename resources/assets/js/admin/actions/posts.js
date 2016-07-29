import axios from 'axios';

export const REQUEST_POSTS = 'REQUEST_POSTS';
export const RECEIVE_POSTS = 'RECEIVE_POSTS';
export const ADDING_POST = 'ADDING_POST';
export const ADDED_POST = 'ADDED_POST';
export const PUBLISH_POST = 'PUBLISH_POST';
export const PUBLISHING_POST = 'PUBLISHING_POST';

export function requestPosts() {
	return {
		type: REQUEST_POSTS
	};
};

export function receivePosts(data) {
	return {
		type: RECEIVE_POSTS,
		payload: data
	};
};

export function addingPost() {
	return {
		type: ADDING_POST
	};
};

export function addedPost(data) {
	return {
		type: ADDED_POST,
		payload: data
	};
};

export function fetchPosts() {
	return dispatch => {
		dispatch(requestPosts());
		axios.get('/api/posts')
			.then((response) => dispatch(receivePosts(response.data)))
			.catch((err) => console.log("There was an error.", err));
	};
};

export function addPost(data) {
	return dispatch => {
		dispatch(addingPost());
		axios.post('/api/posts', data)
			.then((response) => dispatch(addedPost(response.data)))
			.catch((err) => console.log("There was an error adding post.", err));
	};
};