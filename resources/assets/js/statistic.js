require('./bootstrap');
window.axios = require('axios');
require('chart.js');

new Vue({
    el: '#app',
    data: {
      chart: null
    },
    mounted: function(){
        this.chart = new Chart(document.getElementById("bar-chart"), {
            type: 'bar',
            data: {
                labels: [],
                datasets: [
                    {
                        label: "Ierakstu skaits",
                        backgroundColor: "#3e95cd",
                        data: []
                    },
                    {
                        label: "Komentāru skaits",
                        backgroundColor: "#c45850",
                        data: []
                    }
                ]
            },
            options: {
                legend: { display: true },
                title: {
                    display: true,
                    text: 'Ierakstu skaits pa mēnešiem'
                }
            }
        });
        this.updateChart();
    },
    methods: {
        updateChart: function () {
            var self = this;
            axios.get('/statistic/data').then(function (response) {
                let data = response.data;
                for (var key in data) {
                    if (data.hasOwnProperty(key)) {
                        self.chart.data.labels.push(key);
                        self.chart.data.datasets[0].data.push(data[key][0]);
                        self.chart.data.datasets[1].data.push(data[key][1]);
                    }
                }
                self.chart.update();
            });
        }
    }
});
