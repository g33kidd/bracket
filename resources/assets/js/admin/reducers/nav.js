import { combineReducers } from 'redux';
import { NAV_INIT, NAV_CHANGE } from '../actions/nav';

const INIT_NAV_STATE = {
	primary: [
		{ title: 'Overview', location: 'overview' },
		{ title: 'Posts', location: 'posts' },
		{ title: 'Users', location: 'users' },
		{ title: 'Teams', location: 'teams' },
		{ title: 'Settings', location: 'settings' },
	],
	secondary: null
};

export default function nav(state=INIT_NAV_STATE, action) {
	switch(action.type) {
		case NAV_INIT:
			return state;
		case NAV_CHANGE:
			return { ...state, secondary: action.payload };
		default:
			return state;
	};
};