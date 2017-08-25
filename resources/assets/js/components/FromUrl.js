import React, { Component } from 'react';
import ReactDOM from 'react-dom';
var PieChart = require("react-chartjs").Pie;

class FromUrl extends Component {
    constructor(props) {
        super();

        this.state = {
            loading: true,
            chartOptions: {
                segmentShowStroke : false
            },
            chartData: {}
        }
    }

    componentDidMount() {
        fetch('/api/chart-from-url')
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
                alert("Error: Can't load pie chart data");
            });
    }

    render() {
        if (this.state.loading) {
            return (<div>Loading...</div>);
        } else {
            return (<PieChart data={this.state.chartData} options={this.state.chartOptions} width="400" height="400" />);
        }
    }
}

export default FromUrl;

if (document.getElementById('from-url')) {
    ReactDOM.render(<FromUrl />, document.getElementById('from-url'));
}
