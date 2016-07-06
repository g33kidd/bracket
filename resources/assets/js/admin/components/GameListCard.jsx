import React, { Component, PropTypes } from 'react';

const GameListCard = (props) => {
  return (
    <div className="card">
      <div className="card-block">
        <h5 className="card-title">Games</h5>
        <p className="card-text">Games supported by your community.</p>
      </div>
      <div className="list-group list-group-flush">
        <a className="list-group-item" href="1">
          <span className="label label-default label-pill pull-xs-right">1</span>
          Rocket League  
        </a>
      </div>
      <div className="card-block">
        <a href="#" className="card-link">Manage Games</a>
      </div>
    </div>
  );
};

export default GameListCard;