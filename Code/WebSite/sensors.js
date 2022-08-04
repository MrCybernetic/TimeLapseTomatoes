d3.csv('moisture.csv').then(makeChart0);
d3.csv('moisture.csv').then(makeBattery0);

function makeChart0(csv_data) {
    Chart.defaults.color = '#f4f5f6';
    let chartlabels = csv_data.map(function (d) { return new Date(d.time) });
    let moisture_data = csv_data.map(function (d) { return (map(d.moisture, 832, 530, 0, 100)) });
    let temperature_data = csv_data.map(function (d) { return map(d.temperature, 294, 305, 22, 28) });
    const moisture_color = '#2190AD';
    const temperature_color = '#ad3e21';
    return new Chart("myChart", {
        type: "line",
        data: {
            labels: chartlabels,
            datasets: [{
                yAxisID: 'yAxis1',
                label: "Moisture",
                data: moisture_data,
                borderColor: moisture_color,
                cubicInterpolationMode: 'monotone'
            },
            {
                label: "Temperature",
                yAxisID: 'yAxis2',
                data: temperature_data,
                borderColor: temperature_color,
                cubicInterpolationMode: 'monotone'
            }]
        },
        options: {
            scales: {
                x: {
                    type: 'time',
                    time: {
                        unit: 'day',
                        displayFormats: {
                            day: 'dd/MM - HH:mm',
                        },
                        tooltipFormat: 'dd/MM - HH:mm'
                    }
                },
                yAxis1: {
                    title: {
                        text: 'Moisture (in %)',
                        display: true,
                        color: moisture_color,
                    },
                    type: 'linear',
                    position: 'left',
                    ticks: {
                        color: moisture_color,

                    }
                },
                yAxis2: {
                    title: {
                        text: 'Temperature (in °C)',
                        display: true,
                        color: temperature_color

                    },
                    type: 'linear',
                    position: 'right',
                    ticks: {
                        color: temperature_color
                    }
                }
            }
        }
    })
}

function makeBattery0(csv_data) {
    let battery_data = csv_data.map(function (d) { return map(d.battery * 2 * 3.3 / 1024.0, 3.3, 4.3, 0, 100) });
    document.getElementById("battery_charge").style.width = battery_data[battery_data.length - 1].toString() + "%";
    document.getElementById("battery_charge").style.backgroundColor = "rgb(" + map(battery_data[battery_data.length - 1], 0, 100, 255, 0).toString() + "," + map(battery_data[battery_data.length - 1], 100, 0, 255, 0).toString() + ",75)";
}

function map(x, in_min, in_max, out_min, out_max) {
    return (x - in_min) * (out_max - out_min) / (in_max - in_min) + out_min;
}