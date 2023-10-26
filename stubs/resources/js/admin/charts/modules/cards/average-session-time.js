export function setAverageSessionTimeCard(avgSessionResponse) {
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
