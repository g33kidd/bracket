import React from 'react';

const PlatformsCard = (props) => {
  // console.log(props.games);
  const platformsList = props.platforms.items.map(function(platform) {
    return (
      <a className="list-group-item" href="1" key={platform.id}>
        { platform.name }  
      </a>
    );
  });

  return (
    <div className="card">
      <div className="card-block">
        <h5 className="card-title">Platforms</h5>
        <p className="card-text">Platforms supported by your community.</p>
      </div>
      <div className="list-group list-group-flush">
        { platformsList }
      </div>
      <div className="card-block">
        <a href="#" className="card-link">Manage Platforms</a>
      </div>
    </div>
  );
};

export default PlatformsCard;