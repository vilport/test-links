import React, { Component } from 'react';
import ReactDOM from 'react-dom';
var DoughnutChart = require("react-chartjs").Doughnut;

class LinkStatus extends Component {
    constructor(props) {
        super();

        this.state = {
            loading: true,
            chartOptions: {
                segmentShowStroke : true
            },
            chartData: {}
        }
    }

    componentDidMount() {
        fetch('/api/chart-link-status')
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
                alert("Error: Can't load doughnut chart data");
            });
    }

    render() {
        if (this.state.loading) {
            return (<div>Loading...</div>);
        } else {
            return (<DoughnutChart data={this.state.chartData} options={this.state.chartOptions} width="400" height="400" />);
        }
    }
}

export default LinkStatus;

if (document.getElementById('link-status')) {
    ReactDOM.render(<LinkStatus />, document.getElementById('link-status'));
}
