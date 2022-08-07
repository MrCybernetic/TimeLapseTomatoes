d3.csv('moisture.csv').then(makeCharts);
d3.csv('moisture.csv').then(makeBatteries);

function makeCharts(csv_data) {
    Chart.defaults.color = '#f4f5f6';
    Chart.defaults.borderColor = '#322e45';
    let sensor_no = csv_data.map(function (d) { return d.sensorno });
    let chartlabels = csv_data.map(function (d) { return new Date(d.time) });
    let moisture_data = csv_data.map(function (d) { return (d.moisture) });
    let temperature_data = csv_data.map(function (d) { return d.temperature });
    const moisture_color = '#2190AD';
    const temperature_color = '#ad3e21';
    let temperature_data_0 = [];
    let moisture_data_0 = [];
    let temperature_data_1 = [];
    let chartlabels0 = [];
    let chartlabels1 = [];
    let moisture_data_1 = [];
    for (let index = 0; index < sensor_no.length; index++) {
        if (sensor_no[index] == 0) {
            temperature_data_0.push(Math.round(map(temperature_data[index], 294, 305, 22, 28)));
            moisture_data_0.push(map(moisture_data[index], 832, 530, 0, 100));
            chartlabels0.push(chartlabels[index]);
        }
        else if (sensor_no[index] == 1) {
            temperature_data_1.push(Math.round(map(temperature_data[index], 302, 310, 23.5, 24.5)));
            moisture_data_1.push(map(moisture_data[index], 832, 530, 0, 100));
            chartlabels1.push(chartlabels[index]);
        }
    }

    new Chart("myChart0", {
        type: "line",
        data: {
            labels: chartlabels0,
            datasets: [{
                yAxisID: 'yAxis1',
                label: "Moisture",
                data: moisture_data_0,
                borderColor: moisture_color,
                cubicInterpolationMode: 'monotone'
            },
            {
                label: "Temperature",
                yAxisID: 'yAxis2',
                data: temperature_data_0,
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
                    position: 'right',
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
            },
            plugins: {
                legend: {
                    display: false
                }
            }
        }
    })

    new Chart("myChart1", {
        type: "line",
        data: {
            labels: chartlabels1,
            datasets: [{
                yAxisID: 'yAxis1',
                label: "Moisture",
                data: moisture_data_1,
                borderColor: moisture_color,
                cubicInterpolationMode: 'monotone'
            },
            {
                label: "Temperature",
                yAxisID: 'yAxis2',
                data: temperature_data_1,
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
                    position: 'right',
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
            },
            plugins: {
                legend: {
                    display: false
                }
            }
        }
    })
}

function makeBatteries(csv_data) {
    let battery_data = csv_data.map(function (d) { return d.battery * 2 * 3.3 / 1024.0 }); //map(, 3.3, 4.3, 0, 100)
    let sensor_no = csv_data.map(function (d) { return d.sensorno });

    let min_value = 3.3;
    let max_value = 4.3;

    let battery_data_0 = [];
    let battery_data_1 = [];

    for (let index = 0; index < sensor_no.length; index++) {
        if (sensor_no[index] == 0) {
            battery_data_0.push(battery_data[index]);
        }
        else if (sensor_no[index] == 1) {
            battery_data_1.push(battery_data[index]);
        }
    }

    let last_value_0 = battery_data_0[battery_data_0.length - 1];
    let last_value_1 = battery_data_1[battery_data_1.length - 1];

    document.getElementById("battery_charge0").style.height = map(last_value_0, min_value, max_value, 0, 100).toString() + "%";
    document.getElementById("battery_charge0").style.backgroundColor = "rgb(" + map(last_value_0, min_value, max_value, 255, 0).toString() + "," + map(last_value_0, min_value, max_value, 0, 255).toString() + ",75)";
    document.getElementById("battery_voltage0").innerText = last_value_0.toFixed(2).toString() + "V";

    document.getElementById("battery_charge1").style.height = map(last_value_1, min_value, max_value, 0, 100).toString() + "%";
    document.getElementById("battery_charge1").style.backgroundColor = "rgb(" + map(last_value_1, min_value, max_value, 255, 0).toString() + "," + map(last_value_1, min_value, max_value, 0, 255).toString() + ",75)";
    document.getElementById("battery_voltage1").innerText = last_value_1.toFixed(2).toString() + "V";
}

function map(x, in_min, in_max, out_min, out_max) {
    return (x - in_min) * (out_max - out_min) / (in_max - in_min) + out_min;
}