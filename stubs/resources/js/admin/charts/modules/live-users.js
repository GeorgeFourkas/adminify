import {Chart} from "chart.js";

export function devicesDonutChart(devices, percentages) {

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


export function updateDoughnutChart(chart, devices, percentages) {
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

export function drawDevicesStatistic(percentages) {
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
export
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
