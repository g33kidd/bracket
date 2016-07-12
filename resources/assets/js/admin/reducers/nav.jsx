import { combineReducers } from 'redux';
import { PRIMARY_NAV_CHANGED } from '../actions/navigation.jsx';
import _ from 'lodash';

const INIT_NAV_STATE = {
	primary: {
		dashboard: {
			id: 'dashboard',
			location: '/admin'
		},
		overview: {
			id: 'overview',
			location: '/admin/overview',
			title: 'Overview',
			subLinks: {
				stats: {
					location: '/admin/overview/games',
					title: 'Stats'
				}
			}
		},
		settings: {
			id: 'settings',
			location: '/admin/settings',
			title: 'Settings',
			subLinks: {
				games: {
					id: 'games',
					location: '/admin/settings/games',
					title: "Games"
				},
				platforms: {
					id: 'platforms',
					location: '/admin/settings/platforms',
					title: "Platforms"
				},
				tournaments: {
					id: 'tournaments',
					location: '/admin/settings/platforms',
					title: "Tournaments"
				}
			}
		}
	},
	secondary: null
};

export function nav(state=INIT_NAV_STATE, action) {
	switch(action.type) {
		case "@@router/LOCATION_CHANGE":
			let path = action.payload.pathname;
			let parentId = path.split('/')[2];
			let parent = _.find(state.primary, (link) => { return link.location === path; });
			let secondary = _.find(state.primary, (link) => {
				return link.location.split('/')[2] === parentId;
			});
			
			if(secondary) {
				return { ...state, secondary: secondary.subLinks };
			}else{
				return state;
			}
		default:
			return state;
	}
}