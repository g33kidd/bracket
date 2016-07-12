import { 
	REQUEST_GAMES, 
	RECEIVE_GAMES,
	ADDING_GAME,
	ADDED_GAME
} from '../actions/games.jsx';

const GAMES_INIT_STATE = {
	isFetching: false,
	isAddingGame: false,
	items: []
};

export default function games(state=GAMES_INIT_STATE, action) {
	switch(action.type) {
		case REQUEST_GAMES:
			return { ...state, isFetching: true};
		case RECEIVE_GAMES:
			return { ...state, isFetching: false, items: action.payload };
		case ADDING_GAME:
			return { ...state, isAddingGame: true };
		case ADDED_GAME:
			return { ...state, items: state.items.concat(action.payload) };
		default:
			return state;
	}
}