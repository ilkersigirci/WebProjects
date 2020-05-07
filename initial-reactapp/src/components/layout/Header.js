import React from 'react'

function Header() {
  return (
    <header>
      <h1 style={headerStyling}>Todo List</h1>
    </header>
  )
}

const headerStyling = {
  background: '#333',
  color: '#fff',
  textAlign: 'center',
  padding: '10px'
}

export default Header
