const location = window.location.href;
function extractLastNumberFromUrl(url) {
    const segments = url.split('/');
    return parseInt(segments[segments.length - 1], 10);
}
const serial = extractLastNumberFromUrl(location);

function getTempDataFromAPI(url) {
    return fetch(url)
        .then(response => response.json())
        .then(data => data['0']);
}

function drawTempChart(data) {
    const timeLabels = data.map(item => item.time);
    const temp1Data = data.map(item => item.temp_1 ? parseFloat(item.temp_1) : null);
    const temp2Data = data.map(item => item.temp_2 ? parseFloat(item.temp_2) : null);
    const temp3Data = data.map(item => item.temp_3 ? parseFloat(item.temp_3) : null);
    const temp4Data = data.map(item => item.temp_4 ? parseFloat(item.temp_4) : null);
    const ctx = document.getElementById('temperatureChart').getContext('2d');
    const chart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: timeLabels,
            datasets: [{
                    label: 'دما 1',
                    data: temp1Data,
                    borderColor: 'red',
                    fill: false
                },
                {
                    label: 'دما 2',
                    data: temp2Data,
                    borderColor: 'blue',
                    fill: false
                },
                {
                    label: 'دما 3',
                    data: temp3Data,
                    borderColor: 'green',
                    fill: false
                },
                {
                    label: 'دما 4',
                    data: temp4Data,
                    borderColor: 'orange',
                    fill: false
                }
            ]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: false
                }
            }
        }
    });
}

const tempApiUrl = 'http://127.0.0.1:8000/panel/getDeviceTemps/' + serial;
const humApiUrl = 'http://127.0.0.1:8000/panel/getDeviceHums/' + serial;
getTempDataFromAPI(tempApiUrl)
    .then(data => drawTempChart(data));