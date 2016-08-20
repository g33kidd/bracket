import React, { Component, PropTypes } from 'react'
import { connect } from 'react-redux'
import { fetchTeams, addTeam } from 'actions/teams';

// import individual components here
import AddTeam from 'components/teams/AddTeam';
import TeamsTable from 'components/teams/TeamsTable';

class Teams extends Component {
	constructor(props) {
		super(props);
	}

	componentWillMount() {
		this.props.dispatchGetTeams();
	}

	render() {
		return (
			<div className="row">
				<div className="col-md-3">
					<AddTeam addTeam={this.props.dispatchAddTeam} />
				</div>
				<div className="col-md-9">
					<TeamsTable teams={this.props.teams} />
				</div>
			</div>
		)
	}
};

function mapStateToProps(state) {
	return {
		teams: state.teams
	};
};

function mapDispatchToProps(dispatch, componentProps) {
	return {
		dispatchAddTeam: (data) => {
			dispatch(addTeam(data));
		},
		dispatchGetTeams: () => {
			dispatch(fetchTeams());
		}
	};
};

export default connect(mapStateToProps, mapDispatchToProps)(Teams);