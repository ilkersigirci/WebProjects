import React from "react";
import { calcTime, convertMoney } from "../../../helpers";
import FontAwsome from "react-fontawesome";
import "./MovieInfoBar.css";
export default function MovieInfoBar(props) {
  return (
    <div className="rmdb-movieinfobar">
      <div className="rmdb-movieinfobar-content">
        <div className="rmdb-movieinfobar-content-col">
          <FontAwsome className="fa-time" name="clock-o" size="2x" />
          <span className="rmdb-movieinfobar-info">
            Running Time:{calcTime(props.time)}
          </span>
        </div>
        <div className="rmdb-movieinfobar-content-col">
          <FontAwsome className="fa-budget" name="money" size="2x" />
          <span className="rmdb-movieinfobar-info">
            Budget: {convertMoney(props.budget)}
          </span>
        </div>
        <div className="rmdb-movieinfobar-content-col">
          <FontAwsome className="fa-revenue" name="ticket" size="2x" />
          <span className="rmdb-movieinfobar-info">
            Revenue: {convertMoney(props.revenue)}
          </span>
        </div>
      </div>
    </div>
  );
}
