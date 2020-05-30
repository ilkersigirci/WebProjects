import React, { Component } from "react";
import { Link } from "react-router-dom";
import "./Navigation.css";
class Navigation extends Component {
  render() {
    return (
      <div className="rmdb-navigation">
        <div className="rmdb-navigation-content">
          <Link to="/">
            <p>Home</p>
          </Link>
          <p>/</p>
          <p>{this.props.movie}</p>
        </div>
      </div>
    );
  }
}
export default Navigation;
