import React, { Component } from 'react';
import ReactDOM from 'react-dom';
var BarChart = require("react-chartjs").Bar;

class Bldom extends Component {
    constructor(props) {
        super();

        this.state = {
            loading: true,
            chartOptions: {},
            chartData: {
                'labels': [],
                'datasets': [{
                    'data': []
                }]
            }
        }
    }

    componentDidMount() {
        fetch('/api/chart-bldom')
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
                alert("Error: Can't load bar chart data");
            });
    }

    render() {
        if (this.state.loading) {
            return (<div>Loading...</div>);
        } else {
            return (<BarChart data={this.state.chartData} options={this.state.chartOptions} width="800" height="400" />);
        }
    }
}

export default Bldom;

if (document.getElementById('bldom')) {
    ReactDOM.render(<Bldom />, document.getElementById('bldom'));
}
