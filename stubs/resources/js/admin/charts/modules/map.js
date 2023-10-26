import * as ChartGeo from "chartjs-chart-geo";
import {Chart} from "chart.js";

export function drawMapChart(response) {
    const analyticsData = response;
    fetch('https://unpkg.com/world-atlas/countries-50m.json').then((r) => r.json()).then((data) => {
        const countries = ChartGeo.topojson.feature(data, data.objects.countries).features;
        let finalData = [];
        countries.map((d) => {
            const obj = analyticsData.find((obj) => {
                return d.id === obj?.numeric
            });
            if (obj) {
                finalData.push({feature: d, value: Number(obj.totalUsers),})
            } else {
                finalData.push({feature: d, value: 0})
            }
        });
        const maxUsers = Math.max(...finalData.map(item => item.value), 0)
        document.getElementById('map-loader').remove();
        new Chart(document.getElementById("map-chart"), {
            type: 'choropleth',
            IColorScaleOptions: {
                display: false
            },
            data: {
                labels: countries.map((d) => d.properties.name),
                datasets: [{
                    label: 'Countries',
                    data: finalData,
                    borderColor: 'rgb(229,231,235)',
                    backgroundColor: finalData.map((item) => {
                        if (item.value > 0 && Number(item.value / maxUsers).toFixed(1) < 0.05) {
                            return 'rgb(191,61,171,0.05)'
                        }
                        return 'rgb(191,61,171,' + Number(item.value / maxUsers).toFixed(1) + ')'
                    })
                }]
            },
            options: {
                showOutline: false,
                showGraticule: false,
                scales: {
                    projection: {
                        axis: 'x',
                        projection: 'equalEarth',
                    },
                    color: {
                        display: false,
                        axis: 'x',
                    }
                },
            }
        });
    });
}
