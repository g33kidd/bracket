import { 
	REQUEST_PLATFORMS, 
	RECEIVE_PLATFORMS,
	ADDING_PLATFORM,
	ADDED_PLATFORM
} from 'actions/platforms';

const PLATFORMS_INIT_STATE = {
	isFetching: false,
	isAddingPlatform: false,
	items: []
};

export default function platforms(state=PLATFORMS_INIT_STATE, action) {
	switch(action.type) {
		case REQUEST_PLATFORMS:
			return { ...state, isFetching: true };
		case RECEIVE_PLATFORMS:
			return { ...state, isFetching: false, items: action.payload };
		case ADDING_PLATFORM:
			return { ...state, isAddingPlatform: true };
		case ADDED_PLATFORM:
			return { 
				...state, 
				isAddingPlatform: false, 
				items: state.items.concat(action.payload)
			};
		default:
			return state;
	};
};

