export function setTodaysUsersCountCard(usersResponse) {
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
