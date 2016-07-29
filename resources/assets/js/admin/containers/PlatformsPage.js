import React, { Component, PropTypes } from 'react'
import { connect } from 'react-redux'
import { fetchPlatforms, addPlatform } from '../actions/platforms.jsx';

// import individual components here
import AddPlatform from '../components/platforms/AddPlatform.jsx';
import PlatformsTable from '../components/platforms/PlatformsTable.jsx';

class PlatformsPage extends Component {
	constructor(props) {
		super(props)
	}

	componentWillMount() {
		this.props.dispatchGetPlatforms();
	}

	render() {
		return (
			<div className="row">
				<div className="col-md-3">
					<AddPlatform addPlatform={this.props.dispatchAddPlatform} />
				</div>
				<div className="col-md-9">
					<PlatformsTable platforms={this.props.platforms} />
				</div>
			</div>
		)
	}
}

function mapStateToProps(state) {
	return {
		platforms: state.platforms
	};
};

function mapDispatchToProps(dispatch, componentProps) {
	return {
		dispatchAddPlatform: (data) => {
			dispatch(addPlatform(data));
		},
		dispatchGetPlatforms: () => {
			dispatch(fetchPlatforms());
		}
	};
};

export default connect(mapStateToProps, mapDispatchToProps)(PlatformsPage);