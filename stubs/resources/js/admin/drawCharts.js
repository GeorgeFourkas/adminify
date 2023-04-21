import {
    ArcElement,
    BarController,
    BarElement,
    CategoryScale,
    Chart,
    DoughnutController,
    Filler,
    LinearScale,
    LineController,
    LineElement,
    PointElement,
    Title,
    Tooltip,
} from "chart.js";
import * as ChartGeo from 'chartjs-chart-geo'
import {
    ChoroplethChart,
    ChoroplethController,
    ColorLogarithmicScale,
    ColorScale,
    GeoFeature,
    ProjectionScale
} from 'chartjs-chart-geo'

Chart.register(BarController, BarElement, PointElement, LinearScale, Title, CategoryScale, DoughnutController, ArcElement, ColorLogarithmicScale, ChartGeo, LineController, LineElement, PointElement, LinearScale, Title, CategoryScale, Tooltip, Filler, ChoroplethController, ChoroplethChart, ProjectionScale, ColorScale, GeoFeature);

function devicesDonutChart(devices, percentages) {

    const chartCanvas = document.getElementById('devices-donut');
    const noDataPlaceholder = document.getElementById('no-users-placeholder')
    if ((devices.mobile || devices.tablet || devices.desktop) && (devices?.mobile !== 0 || devices.desktop !== 0 || devices.tablet !== 0)) {
        noDataPlaceholder.classList.add('hidden')
        const chart = new Chart(chartCanvas, {
            type: 'doughnut',
            options: {
                cutout: '80%',
                maintainAspectRatio: false,
            },
            data: {
                labels: [
                    'Desktop',
                    'Mobile',
                    'Tablet'
                ],
                datasets: [
                    {
                        label: 'Device Lists',
                        data: [devices.desktop, devices.mobile, devices.tablet],
                        backgroundColor: [
                            '#cb0c9f',
                            '#443f75',
                            '#7928ca',
                        ],
                        borderWidth: 1,
                        hoverOffset: 4
                    }
                ],
            },
        })
        chartCanvas.classList.remove('hidden')
        drawDevicesStatistic(percentages)
        return chart;
    }
}

function updateDoughnutChart(chart, devices, percentages) {
    if (!devices.tablet && !devices.mobile && !devices.desktop) {
        document.getElementById('no-users-placeholder').classList.remove('hidden')
    }
    if (chart) {
        chart.data.datasets[0].data = [devices.desktop ?? 0, devices.mobile ?? 0, devices.tablet ?? 0];
        chart.update()
        drawDevicesStatistic(percentages)
    } else {
        document.getElementById('no-users-placeholder').classList.remove('hidden')
        devicesDonutChart(devices)
    }
    if (devices.length === 0 && chart) {
        chart.destroy();
    }
}

function drawDevicesStatistic(percentages) {
    const backgroundColor = [
        '#cb0c9f',
        '#443f75',
        '#7928ca',
    ];
    const container = document.getElementById('device-percentages');
    container.innerHTML = ''
    percentages?.forEach((item, index) => {
        if (item.percent === 0) {
            return;
        }
        container.insertAdjacentHTML('beforeend', `
        <div class="flex w-1/3 cursor-pointer flex-col items-center justify-center rounded-lg py-3 transition duration-200 hover:shadow-soft-2xl">
            <div class="flex items-center justify-center space-x-2">
                <div class="h-2 w-2 rounded-full" style="background-color: ${backgroundColor[index]}">
                </div>
                    <div>
                        <p class="capitalize text-slate-700">${item.type}</p>
                    </div>
                </div>
            <div>
                <p class="text-center">${item.percent}%</p>
            </div>
        </div>
    `);
    })

}

function drawSessionSourcesChart(response) {
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

function setLiveUsersCount(response, previous = null) {
    const content = document.getElementById('statistic-card-value-3');
    const percentageElement = document.getElementById('statistic-card-percentage-3')
    const container = document.getElementById('live-users-container');
    if (previous) {
        const previousAmountOfUsers = Number(previous);
        const currentAmountOfUsers = Number(response.activeUsers)
        if (previousAmountOfUsers === 0) {
            percentageElement.textContent = '0%'
            percentageElement.classList.add('text-lime-500')
            percentageElement.classList.add('bg-lime-50')
            return;
        } else {
            let newPercentage = ((currentAmountOfUsers - previousAmountOfUsers) / previousAmountOfUsers) * 100;
            newPercentage = newPercentage.toFixed(2)
            percentageElement.textContent = newPercentage.toString() + '%';
            if (newPercentage >= 0) {
                percentageElement.classList.add('text-lime-500')
                percentageElement.classList.add('bg-lime-50')
            } else {
                percentageElement.classList.remove('text-lime-500')
                percentageElement.classList.remove('bg-lime-50')
                percentageElement.classList.add('text-red-600')
                percentageElement.classList.add('bg-red-200')
            }
        }
    }

    if (Number(content.textContent) !== response.activeUsers) {
        container.classList.add('bg-yellow-100');
        setTimeout(() => {
            container.classList.remove('bg-yellow-100');
        }, 1000);
    }
    content.textContent = response.activeUsers;
}

function drawLineChart(response) {
    const traffic = response
    const ctx2 = document.getElementById("chart-line").getContext("2d");
    const gradientStroke1 = ctx2.createLinearGradient(0, 230, 0, 50);
    gradientStroke1.addColorStop(1, "rgba(203,12,159,0.2)");
    gradientStroke1.addColorStop(0.2, "rgba(72,72,176,0.0)");
    gradientStroke1.addColorStop(0, "rgba(203,12,159,0)"); //purple colors
    const gradientStroke2 = ctx2.createLinearGradient(0, 230, 0, 50);
    gradientStroke2.addColorStop(1, "rgba(20,23,39,0.2)");
    gradientStroke2.addColorStop(0.2, "rgba(72,72,176,0.0)");
    gradientStroke2.addColorStop(0, "rgba(20,23,39,0)"); //purple colors
    new Chart(ctx2, {
        type: "line",
        data: {
            labels: traffic.map((item) => {
                return item.date
            }),
            datasets: [
                {
                    tension: 0.4,
                    // borderWidth: 0,
                    pointRadius: 0,
                    borderColor: "#cb0c9f",
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
}

function setTodaysUsersCountCard(usersResponse) {
    document.getElementById('statistic-card-value-1').textContent += usersResponse.today.toString()
    const percent = document.getElementById('statistic-card-percentage-1');
    percent.textContent = usersResponse.percentage.toString() + '%';
    if (usersResponse.percentage >= 0) {
        percent.classList.toggle('text-lime-500')
        percent.classList.toggle('bg-lime-50')
    } else {
        percent.classList.toggle('text-red-600')
        percent.classList.toggle('bg-red-200')
    }
}

function setAverageSessionTimeCard(avgSessionResponse) {
    const value2 = document.getElementById('statistic-card-value-2');
    const seconds = avgSessionResponse.new
    value2.textContent += seconds;

    const percentage2 = document.getElementById('statistic-card-percentage-2');
    percentage2.textContent = avgSessionResponse.percentage.toString() + '%';
    if (avgSessionResponse.percentage >= 0) {
        percentage2.classList.toggle('text-lime-500')
        percentage2.classList.toggle('bg-lime-50')
    } else {
        percentage2.classList.toggle('text-red-600')
        percentage2.classList.toggle('bg-red-200')
    }
}


function drawMostViewedPages(pages) {
    const timelineContainer = document.getElementById('timeline-container');
    pages.forEach((page, index) => {
        if (page?.pageTitle === '(not set)') {
            return
        }
        timelineContainer.insertAdjacentHTML('beforeend', `
                <div class="relative mb-4 after:clear-both after:table after:content-['']" id="timeline-row">
                         <span class="absolute left-4 z-10 inline-flex -translate-x-1/2 items-center justify-center rounded-full bg-white text-center text-base font-semibold w-6.5 h-6.5">
                             <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 event-${index}">
                                <path d="M7.5 3.375c0-1.036.84-1.875 1.875-1.875h.375a3.75 3.75 0 013.75 3.75v1.875C13.5 8.161 14.34 9 15.375 9h1.875A3.75 3.75 0 0121 12.75v3.375C21 17.16 20.16 18 19.125 18h-9.75A1.875 1.875 0 017.5 16.125V3.375z" />
                                <path d="M15 5.25a5.23 5.23 0 00-1.279-3.434 9.768 9.768 0 016.963 6.963A5.23 5.23 0 0017.25 7.5h-1.875A.375.375 0 0115 7.125V5.25zM4.875 6H6v10.125A3.375 3.375 0 009.375 19.5H16.5v1.125c0 1.035-.84 1.875-1.875 1.875h-9.75A1.875 1.875 0 013 20.625V7.875C3 6.839 3.84 6 4.875 6z" />
                             </svg>
                        </span>
                        <div class="relative w-auto ml-[2.813rem] pt-1.5 -top-1.5 lg:max-w-120">
                            <a href=" https://${page.fullPageUrl}" target="_blank" class="mb-0 text-sm font-semibold leading-normal text-slate-700 hover:text-pink-500">
                               ${page.pageTitle}
                            </a>
                            <p class="mt-1 mb-0 text-xs font-semibold capitalize leading-tight text-slate-400">
                                page views: ${page.totalUsers}
                            </p>
                    </div>
                </div>
        `)
    })
}

function drawMapChart(response) {
    const analyticsData = response;
    fetch('https://unpkg.com/world-atlas/countries-50m.json').then((r) => r.json()).then((data) => {
        const countries = ChartGeo.topojson.feature(data, data.objects.countries).features;
        let finalData = [];
        countries.map((d) => {
            const obj = analyticsData.find((obj) => {
                return d.properties.name.toLowerCase() === obj.country.toLowerCase()
            });
            if (obj) {
                finalData.push({feature: d, value: Number(obj.totalUsers),})
            } else {
                finalData.push({feature: d, value: 0})
            }
        });
        const maxUsers = Math.max(...finalData.map(item => item.value), 0)
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
                },
            }
        });
    });
}

export {
    drawSessionSourcesChart,
    drawLineChart,
    devicesDonutChart,
    updateDoughnutChart,
    setLiveUsersCount,
    setTodaysUsersCountCard,
    setAverageSessionTimeCard,
    drawMostViewedPages,
    drawMapChart
}
