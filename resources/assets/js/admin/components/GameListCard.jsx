import React, { Component, PropTypes } from 'react'

export default class GameListCard extends Component {

  render() {
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
    )
  }

}

// TODO: I really don't even know...
// 
// GameListCard.propTypes = {
//   games: PropTypes.array.isRequired
// }