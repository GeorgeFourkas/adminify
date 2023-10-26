import axios from "axios";
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
import {devicesDonutChart, setLiveUsersCount, updateDoughnutChart} from "./modules/live-users.js";
import {drawLineChart} from "./modules/traffic.js";
import {drawMapChart} from "./modules/map.js";
import {drawMostViewedPages} from "./modules/top-pages.js";
import {drawSessionSourcesChart} from "./modules/session-sources.js";
import {setAverageSessionTimeCard} from "./modules/cards/average-session-time.js";
import {setTodaysUsersCountCard} from "./modules/cards/users-today.js";

Chart.register(BarController, BarElement, PointElement, LinearScale, Title, CategoryScale, DoughnutController, ArcElement, ColorLogarithmicScale, ChartGeo, LineController, LineElement, PointElement, LinearScale, Title, CategoryScale, Tooltip, Filler, ChoroplethController, ChoroplethChart, ProjectionScale, ColorScale, GeoFeature);

const skeletons = document.querySelectorAll('[data-role="statistic-card-skeleton"]');
const chartCards = document.querySelectorAll('[data-role="statistic-card"]');


Promise.all([
    axios.get('/analytics/batch'),
    axios.get('/analytics/real-time'),
    axios.get('/analytics/map')
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
            axios.get('/analytics/real-time').then((response) => {
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
