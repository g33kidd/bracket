import { 
	REQUEST_TEAMS, 
	RECEIVE_TEAMS,
	ADDING_TEAM,
	ADDED_TEAM
} from 'actions/teams';

const TEAMS_INIT_STATE = {
	isFetching: false,
	isAddingTeam: false,
	items: []
};

export default function teams(state=TEAMS_INIT_STATE, action) {
	switch(action.type) {
		case REQUEST_TEAMS:
			return { ...state, isFetching: true};
		case RECEIVE_TEAMS:
			return { ...state, isFetching: false, items: action.payload };
		case ADDING_TEAM:
			return { ...state, isAddingTeam: true };
		case ADDED_TEAM:
			return { ...state, items: state.items.concat(action.payload) };
		default:
			return state;
	};
};