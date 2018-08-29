var line = $('#myChart');
var pie = $('#myChartPie');
$.ajax({
    method: 'GET',
    url: $('.get-chart').attr('data-url'),
    success: function(data) {
        var data = data;
        var myChart = new Chart(line, {
            type: 'line',
            data: {
                labels: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12],
                type: 'line',
                defaultFontFamily: 'Montserrat',
                datasets: [{
                    data: data.line,
                    label: 'Sản phẩm',
                    backgroundColor: '#ff660059',
                    borderColor: '#f60',
                    borderWidth: 3.5,
                    pointStyle: 'circle',
                    pointRadius: 5,
                    pointBorderColor: 'transparent',
                    pointBackgroundColor: '#f60',
                }, ]
            },
            options: {
                responsive: true,
                tooltips: {
                    mode: 'index',
                    titleFontSize: 12,
                    titleFontColor: '#000',
                    bodyFontColor: '#000',
                    backgroundColor: '#fff',
                    titleFontFamily: 'Montserrat',
                    bodyFontFamily: 'Montserrat',
                    cornerRadius: 3,
                    intersect: false,
                },
                legend: {
                    display: false,
                    position: 'top',
                    labels: {
                        usePointStyle: true,
                        fontFamily: 'Montserrat',
                    },
                },
                scales: {
                    xAxes: [{
                        display: true,
                        gridLines: {
                            display: false,
                            drawBorder: false
                        },
                        scaleLabel: {
                            display: true,
                            labelString: line.attr('x-label')
                        }
                    }],
                    yAxes: [{
                        display: true,
                        gridLines: {
                            display: false,
                            drawBorder: false
                        },
                        scaleLabel: {
                            display: true,
                            labelString: line.attr('y-label')
                        }
                    }]
                },
                title: {
                    display: false,
                }
            }
        });
        function random() {
            var colors = [];
            for (var i = 0; i < data.pie.numbers.length; i++) {
                colors.push(getRandomColorHex());
            }

            return colors;
        }
        var myChart = new Chart(pie, {
            type: 'doughnut',
            data: {
                datasets: [{
                    data: data.pie.numbers,
                    backgroundColor: random(),
                    hoverBackgroundColor: random()
                }],
                labels: data.pie.categories
            },
            options: {
                responsive: true
            }
        });
    }
});
function getRandomColorHex() {
    var hex = '0123456789ABCDEF',
    color = '#';
    for (var i = 1; i <= 6; i++) {
        color += hex[Math.floor(Math.random() * 16)];
    }

    return color;
}
