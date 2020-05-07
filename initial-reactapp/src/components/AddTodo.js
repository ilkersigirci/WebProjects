import React, { Component } from 'react'

export class AddTodo extends Component {
  
  state = {
    title: ''
  }

  onChange = data => {
    //console.log(data)
    this.setState({
      title: data.target.value
    })
  }

  onSubmit = e => {
    e.preventDefault()
    this.props.addTodo(this.state.title) // FIXME: neden bind calismiyor
  }
  
  render() {
    return (
      <form
        style={{ display: 'flex'}}
        onSubmit={this.onSubmit}
      >
        <input
          type="text"
          style={{flex:'6', padding: '5px'}}
          placeholder="Add Todos..."
          onChange={this.onChange}
        />
        <input
          type="submit"
          value="Submit"
          className="btn"
          style={{flex:'1'}}
        />
      </form>
    )
  }
}

export default AddTodo
