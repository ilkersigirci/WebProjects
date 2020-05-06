import React, { Component } from 'react'
import PropTypes from 'prop-types';


export class TodoItem extends Component {

  getStyle = () => {
    return {
      background: '#f4f4f4',
      margin: '40px',
      padding: '10px',
      textDecoration: this.props.todo.completed ? 'line-through' : 'none'
    }
  }

  render() {
    const {id, title} = this.props.todo;
    return (
      <div style={this.getStyle()}>
        <p>
          <input type="checkbox" onChange={
            this.props.markComplete.bind(this, id)}
          /> {' '}
          {title}
          <button style={buttonStyling}
            onClick={this.props.deleteTodo.bind(this,id)}>x</button>
        </p>
      </div>
    )
  }
}

TodoItem.propTypes = {
  todo: PropTypes.object.isRequired
}

const buttonStyling = {
  background: '#ff0000',
  color: 'fff',
  border: 'none',
  padding: '5px 9px',
  borderRadius: '50%',
  cursor: 'pointer',
  float: 'right'
}



export default TodoItem;
