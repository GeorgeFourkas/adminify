import axios from "axios";
import {drawLineChart} from "./charts/modules/traffic.js";
import {drawSessionSourcesChart} from "./charts/modules/session-sources.js";
import {Chart} from "chart.js";
import flatpickr from "flatpickr";
import 'flatpickr/dist/flatpickr.css';
import rangePlugin from "flatpickr/dist/plugins/rangePlugin";

flatpickr("#start-source-chart-date-picker", {
    "plugins": [new rangePlugin({input: "#end-source-chart-date-picker"})],
    mode: "range",
    maxDate: new Date(),
    altInputClass: 'text-blue-300',
    dateFormat: "d-m-Y",
});

flatpickr("#start-traffic-chart-date-picker", {
    "plugins": [new rangePlugin({input: "#end-traffic-chart-date-picker"})],
    mode: "range",
    maxDate: new Date(),
    dateFormat: "d-m-Y",
})

drawChartsOnCustomDate(
    document.getElementById('start-source-chart-date-picker'),
    document.getElementById('end-source-chart-date-picker'),
    '/analytics/sources',
    'chart-bars',
    drawSessionSourcesChart,
    document.getElementById('sources-chart-loader'),
    document.getElementById('chart-sources')
)
drawChartsOnCustomDate(
    document.getElementById('start-traffic-chart-date-picker'),
    document.getElementById('end-traffic-chart-date-picker'),
    '/analytics/traffic',
    'chart-line',
    drawLineChart,
    document.getElementById('line-chart-loader'),
    document.getElementById('line-chart-container')
)

function drawChartsOnCustomDate(firstDate, secondDate, endpoint, chartId, closure, skeleton = null, container = null) {
    firstDate.addEventListener('change', () => {
        if (secondDate.value !== '') {
            const showLoading = (skeleton !== null && container !== null);

            if (showLoading) {
                skeleton.classList.remove('hidden')
                container.classList.add('hidden')
            }
            axios.get(endpoint, {
                params: {
                    start: firstDate.value,
                    end: secondDate.value
                }
            }).then((response) => {
                Chart.getChart(chartId).destroy();
                if (showLoading) {
                    skeleton.classList.add('hidden')
                    container.classList.remove('hidden')
                }
                closure(response.data)
            })
        }
    })
}
