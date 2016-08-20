import React from 'react';

const AddTeam = (props) => { 
  const addTeamSubmit = (event) => {
    event.preventDefault();
    props.addTeam({
      name: event.target.name.value,
      description: event.target.description.value,
      owner_id: event.target.ownerid.value
    });
  };

  return (
    <div className="card">
      <div className="card-header">Add New Team</div>
      <div className="card-block">
        <form onSubmit={addTeamSubmit}>

          <div className="form-group">
            <label className="form-control-label">Name</label>
            <input type="text" placeholder="Team Name" name="name" className="form-control" />
          </div>

          <div className="form-group">
            <label className="form-control-label">Description</label>
            <input type="text" placeholder="Short blurb about the team" name="description" className="form-control" />
          </div>

          <div className="form-group">
            <label className="form-control-label">Owner ID</label>
            <input type="text" placeholder="No" name="ownerid" className="form-control" />
          </div>
          
          <div className="form-group">
            <button type="submit" className="btn btn-secondary">Create Team</button>
          </div>
        </form>
      </div>
    </div>
  );
};

export default AddTeam;