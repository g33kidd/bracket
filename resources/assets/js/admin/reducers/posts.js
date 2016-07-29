import { 
	REQUEST_POSTS, 
	RECEIVE_POSTS,
	ADDING_POST,
	ADDED_POST
} from '../actions/posts';

const POSTS_INIT_STATE = {
	isFetching: false,
	isAddingPost: false,
	items: []
};

export default function posts(state=POSTS_INIT_STATE, action) {
	switch(action.type) {
		case REQUEST_POSTS:
			return { ...state, isFetching: true };
		case RECEIVE_POSTS:
			return { ...state, isFetching: false, items: action.payload };
		case ADDING_POST:
			return { ...state, isAddingPost: true };
		case ADDED_POST:
			return { 
				...state, 
				isAddingPost: false, 
				items: state.items.concat(action.payload)
			};
		default:
			return state;
	}
}