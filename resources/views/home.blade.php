@extends('layouts/appAdmin')
@section('content_admin')
<canvas id="chart"></canvas>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
<script>
    $(document).ready(function() {
        $.ajax({
            url: "{{ url('/dataRegis') }}",
            type: "GET",
            dataType: "json",
            success: function(data) {
                var dates = [];
                var counts = [];

                $.each(data, function(key, value) {
                    dates.push(value.date);
                    counts.push(value.count);
                });

                var ctx = document.getElementById('chart').getContext('2d');
                var chart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: dates,
                        datasets: [{
                            label: 'Registrations',
                            data: counts,
                            backgroundColor: 'rgba(0, 119, 204, 0.3)',
                            borderColor: 'rgba(0, 119, 204, 0.8)',
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                }
                            }]
                        }
                    }
                });
            }
        });
    });
</script>
 
@endsection