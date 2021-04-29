<div class="card">
    <div class="card-header">
        <h4>{{ $title }}</h4>
    </div>
    <div class="card-body">
        <canvas id="visitors-chart"></canvas>
    </div>
</div>

<script src="//cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js"></script>

<script>
    var visitorsChart = new Chart($('#visitors-chart'), {
        data: {
            labels: ['18th', '20th', '22nd', '24th', '26th', '28th', '30th'],
            datasets: [{
                type: 'line',
                data: [100, 120, 170, 167, 180, 177, 160],
                backgroundColor: 'transparent',
                borderColor: '#007bff',
                pointBorderColor: '#007bff',
                pointBackgroundColor: '#007bff',
                fill: false
            },
                {
                    type: 'line',
                    data: [60, 80, 70, 67, 80, 77, 100],
                    backgroundColor: 'tansparent',
                    borderColor: '#ced4da',
                    pointBorderColor: '#ced4da',
                    pointBackgroundColor: '#ced4da',
                    fill: false
                }]
        },
        options: {
            maintainAspectRatio: false,
            legend: {
                display: false
            },
            scales: {
                yAxes: [{}],
                xAxes: [{}]
            }
        }
    });
</script>

<style>
    #visitors-chart {
        height: 200px;
    }
</style>
