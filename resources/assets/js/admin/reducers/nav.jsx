import { combineReducers } from 'redux';
import { PRIMARY_NAV_CHANGED } from '../actions/navigation.jsx';
import _ from 'underscore';

const INIT_NAV_STATE = {
	primary: {
		overview: {
			id: 'overview',
			location: '/admin/overview',
			title: 'Overview',
			subLinks: {
				stats: {
					location: '/admin/games',
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
					location: '/admin/games',
					title: "Games"
				},
				platforms: {
					id: 'platforms',
					location: '/admin/platforms',
					title: "Platforms"
				},
				tournaments: {
					id: 'tournaments',
					location: '/admin/platforms',
					title: "Tournaments"
				}
			}
		}
	},
	secondary: null
};

// set initial state primary/secondary
// click link -> run action -> go to reducer
// -> find link obj with pathname from router
// -> update the secondary nav object with the sublinks of that obj
// -> re-render I suppose


export function nav(state=INIT_NAV_STATE, action) {
	switch(action.type) {
		case "@@router/LOCATION_CHANGE":
			const newSecondary = _.find(state.primary, (link) => {
				return link.location === action.payload.pathname;
			});
			
			if(newSecondary) {
				return Object.assign({}, state, {
					secondary: newSecondary.subLinks
				});
			}else{
				return state;
			}
		default:
			return state;
	}
}