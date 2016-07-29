import React from 'react';

const GamesCard = (props) => {
  const gamesList = props.games.items.map(function(game) {
    return (
      <a className="list-group-item" href="1" key={game.id}>
        { game.name }  
      </a>
    );
  });

  return (
    <div className="card">
      <div className="card-block">
        <h5 className="card-title">Games</h5>
        <p className="card-text">Games supported by your community.</p>
      </div>
      <div className="list-group list-group-flush">
        { gamesList }
      </div>
      <div className="card-block">
        <a href="#" className="card-link">Manage Games</a>
      </div>
    </div>
  );
};

export default GamesCard;