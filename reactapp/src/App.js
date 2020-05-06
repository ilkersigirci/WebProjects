import React, {Component} from 'react';
import Todos from './components/Todos';
import Header from './components/layout/Header'
import AddTodo from './components/AddTodo'
import {v4 as uuidv4} from 'uuid'

import './App.css';

class App extends Component {

  state = {
    todos: [
      {
        id: uuidv4(),
        title: 'Test1',
        completed: false
      },
      {
        id: uuidv4(),
        title: 'Test2',
        completed: true
      },
      {
        id: uuidv4(),
        title: 'Test3',
        completed: false
      },
    ]
  }

  markComplete = (id) => {
    this.setState({
      todos: this.state.todos.map(todo => {
        if(todo.id === id) {
          todo.completed = !todo.completed
        }
        return todo;
      })
    })
  }

  deleteTodo = (id) => {
    this.setState({
      //todos: [...this.state.todos.filter(todo => todo.id !== id)]
      todos: this.state.todos.filter(todo => todo.id !== id)
    })
  }

  addTodo = (title) => {
    const newTodo = {
      id: uuidv4(),
      title,
      completed: false
    }
    this.setState({      
      todos: [...this.state.todos, newTodo]
    })
  }

  render() {
    return (
      <div className="App">
        <div className="container">
          <Header />
          <AddTodo addTodo={this.addTodo}/>
          <Todos
            todos= {this.state.todos}
            markComplete={this.markComplete}
            deleteTodo={this.deleteTodo}
          />

        </div>
      </div>
    );
  }
}

export default App;
