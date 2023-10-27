import {Chart} from "chart.js";

export function drawSessionSourcesChart(response) {
    const sources = response.result.map(source => source.sessionSource)
    const values = response.result.map(value => value.totalUsers)
    const ctx = document.getElementById("chart-bars").getContext("2d");
    document.getElementById('session-source-facebook').textContent = response.facebook;
    document.getElementById('session-source-instagram').textContent = response.instagram;
    document.getElementById('session-source-google').textContent = response.google;
    document.getElementById('session-source-bing').textContent = response.bing;

    new Chart(ctx, {
        type: "bar",
        data: {
            labels: sources,
            datasets: [
                {
                    label: "Source: ",
                    tension: 0.4,
                    borderWidth: 0,
                    borderRadius: 4,
                    borderSkipped: false,
                    backgroundColor: "#fff",
                    data: values,
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
            interaction: {
                intersect: false,
                mode: "index",
            },
            scales: {
                y: {
                    type: 'linear',
                    grace: '5%',
                    grid: {
                        drawBorder: false,
                        display: false,
                        drawOnChartArea: false,
                        drawTicks: false,
                    },
                    ticks: {
                        suggestedMin: 0,
                        suggestedMax: 600,
                        beginAtZero: true,
                        padding: 15,
                        font: {
                            size: 14,
                            family: "Open Sans",
                            style: "normal",
                            lineHeight: 2,
                        },
                        color: "#fff",
                    },
                },
                x: {
                    grid: {
                        drawBorder: false,
                        display: false,
                        drawOnChartArea: false,
                        drawTicks: false,
                    },
                    ticks: {
                        display: false,
                    },
                },
            },
        },
    })
}
