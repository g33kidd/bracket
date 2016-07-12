import React, { Component, PropTypes } from 'react';

const AddGame = (props) => { 
  const addPlatformSubmit = (event) => {
    event.preventDefault();
    props.addPlatform({
      name: event.target.platformName.value,
      short_name: event.target.shortName.value,
      slug: event.target.slug.value
    });
  }

  return (
    <div className="card">
      <div className="card-header">Add New Game</div>
      <div className="card-block">
        <form onSubmit={addPlatformSubmit}>

          <div className="form-group">
            <label className="form-control-label">Name</label>
            <input type="text" placeholder="Platform Name" name="platformName" className="form-control" />
          </div>

          <div className="form-group">
            <label className="form-control-label">Short Name</label>
            <input type="text" placeholder="Short Name" name="shortName" className="form-control" />
          </div>

          <div className="form-group">
            <label className="form-control-label">URL Slug</label>
            <input type="text" placeholder="URL Slug" name="slug" className="form-control" />
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