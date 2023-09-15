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
import axios from "axios";
import * as ChartGeo from 'chartjs-chart-geo'
import {
    ChoroplethChart,
    ChoroplethController,
    ColorLogarithmicScale,
    ColorScale,
    GeoFeature,
    ProjectionScale
} from 'chartjs-chart-geo'
import {
    devicesDonutChart,
    drawLineChart,
    drawMapChart,
    drawMostViewedPages,
    drawSessionSourcesChart,
    setAverageSessionTimeCard,
    setLiveUsersCount,
    setTodaysUsersCountCard,
    updateDoughnutChart
} from "./drawCharts";
import {appendLocale} from "./locale-prefix-parser";

const skeletons = document.querySelectorAll('[data-role="statistic-card-skeleton"]');
const chartCards = document.querySelectorAll('[data-role="statistic-card"]');


Chart.register(BarController, BarElement, PointElement, LinearScale, Title, CategoryScale, DoughnutController, ArcElement, ColorLogarithmicScale, ChartGeo, LineController, LineElement, PointElement, LinearScale, Title, CategoryScale, Tooltip, Filler, ChoroplethController, ChoroplethChart, ProjectionScale, ColorScale, GeoFeature);
Promise.all([
    axios.get(appendLocale() + 'analytics/batch'),
    axios.get(appendLocale() + 'analytics/real-time'),
    axios.get(appendLocale() + 'analytics/map')
]).then(
    axios.spread((firstResponse, liveAnalytics, mapResponse) => {
        const firstBatchResponse = firstResponse.data;
        drawLineChart(firstBatchResponse.traffic)
        drawSessionSourcesChart(firstBatchResponse.sessionSources)
        setTodaysUsersCountCard(firstBatchResponse.userDifferences)
        setAverageSessionTimeCard(firstBatchResponse.avgSessionDuration)
        drawMostViewedPages(firstBatchResponse.mostViewedPages)
        setLiveUsersCount(liveAnalytics.data)
        drawMapChart(mapResponse.data)
        hideSkeleton()
        showCharts()
        const doughnutChart = devicesDonutChart(liveAnalytics.data?.devices, liveAnalytics.data?.devicePercentages)
        setInterval(() => {
            const initialUsersCount = liveAnalytics.data?.activeUsers;
            axios.get(appendLocale() + 'analytics/real-time').then((response) => {
                setLiveUsersCount(response.data, initialUsersCount)
                updateDoughnutChart(doughnutChart, response.data?.devices, response.data.devicePercentages)
            })
        }, 10000)
    })
)

function hideSkeleton() {
    skeletons.forEach((item) => {
        item.classList.add('hidden')
    });
}

function showCharts() {
    chartCards.forEach((item) => {
        item.classList.remove('hidden')
    })
}
