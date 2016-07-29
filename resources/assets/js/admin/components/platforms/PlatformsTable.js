import React from 'react';

const PlatformsTable = (props) => {
  const platformsList = props.platforms.items.map(function(platform) {
    return (
      <tr key={platform.id}>
        <th scope="row">{platform.id}</th>
        <td>{platform.name}</td>
        <td>{platform.slug}</td>
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
        { platformsList }
      </tbody>
    </table>
  );
};

export default PlatformsTable;
