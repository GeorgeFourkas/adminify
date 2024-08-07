import {Chart} from "chart.js";
import {chartConfigs} from "../chart-colors.config";

export function drawLineChart(response) {
    const traffic = response
    const ctx2 = document.getElementById("chart-line").getContext("2d");
    const gradientStroke1 = ctx2.createLinearGradient(0, 300, 0, 150);
    const lineConfig = chartConfigs().traffic;
    lineConfig.gradient.forEach((config) => {
        gradientStroke1.addColorStop(config.offset, config.color)
    })
    const chart = new Chart(ctx2, {
        type: "line",
        data: {
            labels: traffic.map((item) => {
                return item.date
            }),
            datasets: [
                {
                    tension: 0.4,
                    pointRadius: 0,
                    borderColor: lineConfig.border,
                    borderWidth: 3,
                    fill: true,
                    backgroundColor: gradientStroke1,
                    data: traffic.map((item) => item.totalUsers),
                    maxBarThickness: 6,
                },
            ],
        },
        options: {
            responsive: true,
            maintainAspectRatio: true,

            plugins: {
                legend: {
                    display: false,
                },
            },
            tooltips: {
                callbacks: {
                    label: function (tooltipItem, data) {
                        let label = data.datasets[tooltipItem.datasetIndex].label || '';
                        if (label) {
                            label += ': ';
                        }
                        label += Math.round(tooltipItem.yLabel * 100) / 100;
                        return label;
                    }
                }
            },
            interaction: {
                intersect: false,
                mode: "index",
            },
            scales: {
                y: {
                    type: 'linear',
                    grace: '10%',
                    grid: {
                        drawBorder: false,
                        display: true,
                        drawOnChartArea: true,
                        drawTicks: false,
                        borderDash: [5, 5],
                    },
                    ticks: {
                        display: true,
                        padding: 10,
                        color: "#b2b9bf",
                        font: {
                            size: 11,
                            family: "Open Sans",
                            style: "normal",
                            lineHeight: 2,
                        },
                    },
                },
                x: {
                    grid: {
                        drawBorder: false,
                        display: false,
                        drawOnChartArea: false,
                        drawTicks: false,
                        borderDash: [5, 5],
                    },
                    ticks: {
                        display: true,
                        color: "#b2b9bf",
                        padding: 20,
                        font: {
                            size: 11,
                            family: "Open Sans",
                            style: "normal",
                            lineHeight: 2,
                        },
                    },
                },
            },
        }
    })
    chart.options.scales['y'].border.dash = [5, 5]
}
