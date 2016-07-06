import React, { Component, PropTypes } from 'react';

const AddGame = (props) => { 
  const addPlatformSubmit = (event) => {
    event.preventDefault();
    props.addPlatform({});
  }

  return (
    <div className="card">
      <div className="card-header">Add New Game</div>
      <div className="card-block">
        <form onSubmit={addPlatformSubmit}>

          <div className="form-group">
            <label className="form-control-label">Name</label>
            <input type="text" placeholder="Game Name" name="gameName" className="form-control" />
          </div>
          
          <div className="form-group ">
            <button type="submit" className="btn btn-secondary">Add Game</button>
          </div>
        </form>
      </div>
    </div>
  );
};

export default AddGame;