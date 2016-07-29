export const NAV_CHANGE = 'NAV_CHANGE';
export const NAV_INIT = 'NAV_INIT';

// updates the secondary nav based on the current route's container component.
export function updateNav(data) {
	return {
		type: NAV_CHANGE,
		payload: data
	};
};

// Initializes the primary nav bar.
export function initNav() {
	return {
		type: NAV_INIT
	};
};