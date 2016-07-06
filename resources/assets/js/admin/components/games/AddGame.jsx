import React, { Component, PropTypes } from 'react';

const AddGame = (props) => { 
  const addGameSubmit = (event) => {
    event.preventDefault();
    props.addGame({
      name: event.target.gameName.value,
      short_name: event.target.shortName.value,
      slug: event.target.slug.value,
      platform_id: event.target.platformId.value
    });
  }

  return (
    <div className="card">
      <div className="card-header">Add New Game</div>
      <div className="card-block">
        <form onSubmit={addGameSubmit}>

          <div className="form-group">
            <label className="form-control-label">Name</label>
            <input type="text" placeholder="Game Name" name="gameName" className="form-control" />
          </div>

          <div className="form-group">
            <label className="form-control-label">Short Name</label>
            <input type="text" placeholder="Short Name" name="shortName" className="form-control" />
          </div>

          <div className="form-group">
            <label className="form-control-label">URL Slug</label>
            <input type="text" placeholder="Slug" name="slug" className="form-control" />
          </div>

          <div className="form-group">
            <label className="form-control-label">Platform ID</label>
            <input type="text" placeholder="Platform ID" name="platformId" className="form-control" />
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