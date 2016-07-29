import React from 'react';

const GamesTable = (props) => {
  const gamesList = props.games.items.map(function(game) {
    return (
      <tr key={game.id}>
        <th scope="row">{game.id}</th>
        <td>{game.name}</td>
        <td>{game.slug}</td>
      </tr>
    );
  });

  return (
    <table className="table table-sm">
      <thead>
        <tr>
          <th>id</th>
          <th>Game</th>
          <th>Slug</th>
        </tr>
      </thead>
      <tbody>
        { gamesList }
      </tbody>
    </table>
  );
};

export default GamesTable;
