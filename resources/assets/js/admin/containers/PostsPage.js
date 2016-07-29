import React, { Component } from 'react';
import { connect } from 'react-redux';
import { fetchPosts, addPost } from '../actions/posts';

class PostsPage extends Component {
	constructor(props) {
		super(props);
	}

	componentWillMount() {
		this.props.dispatchGetPosts();
	}

	render() {
		const children = React.Children.map(this.props.children, (child) => React.cloneElement(child, {
			addPost: this.props.dispatchAddPost
		}));

		return (
			<div className="row">
				{children}
			</div>
		);
	}
};

function mapStateToProps(state) {
	return {
		posts: state.posts
	};
};

function mapDispatchToProps(dispatch, componentProps) {
	return {
		dispatchGetPosts: () => {
			dispatch(fetchPosts());
		},
		dispatchAddPost: (data) => {
			dispatch(addPost(data));
		}
	};
};

export default connect(mapStateToProps, mapDispatchToProps)(PostsPage);