import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import { TagCloud } from "react-tagcloud";

class AnchorText extends Component {
    constructor(props) {
        super();

        this.state = {
            loading: true,
            chartData: []
        }
    }

    componentDidMount() {
        fetch('/api/chart-anchor-text')
            .then(response => {
                return response.json();
            })
            .then(chartData => {
                this.setState({
                    loading: false,
                    chartData: chartData
                });
            })
            .catch(function() {
                alert("Error: Can't load tag clud chart data");
            });
    }

    render() {
        if (this.state.loading) {
            return (<div>Loading...</div>);
        } else {
            return (<TagCloud tags={this.state.chartData} minSize={12} maxSize={35} />);
        }
    }
}

export default AnchorText;

if (document.getElementById('anchor-text')) {
    ReactDOM.render(<AnchorText />, document.getElementById('anchor-text'));
}
