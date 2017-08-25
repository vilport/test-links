import React, { Component } from 'react';
import ReactDOM from 'react-dom';

class Title extends Component {
    render() {
        return (
            <h1>{ window.title }</h1>
        );
    }
}

export default Title;

if (document.getElementById('title')) {
    ReactDOM.render(<Title />, document.getElementById('title'));
}
