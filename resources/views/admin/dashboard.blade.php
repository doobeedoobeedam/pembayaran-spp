@extends('../template/dashboard')
@section('main')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Dashboard</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
            <a href="/spp" class="btn btn-sm btn-primary">Lihat Data SPP</a>
        </div>
        {{-- <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
            <span data-feather="calendar"></span>
            This week
        </button> --}}
    </div>
</div>
<canvas class="my-4 w-100" id="canvas" width="900" height="380"></canvas>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
<script>
    var month = <?php echo $month; ?>;
    var data = <?php echo $data; ?>;
    var barChartData = {
        labels: month,
        datasets: [{
            label: 'Nominal',
            backgroundColor: "#82b4ff",
            data: data
        }]
    };

    window.onload = function() {
        var ctx = document.getElementById("canvas").getContext("2d");
        window.myBar = new Chart(ctx, {
            type: 'bar',
            data: barChartData,
            options: {
                elements: {
                    rectangle: {
                        borderWidth: 2,
                        borderColor: '#c1c1c1',
                        borderSkipped: 'bottom'
                    }
                },
                responsive: true,
                title: {
                    display: true,
                    text: 'Pemasukkan SPP'
                }
            }
        });
    };
</script>
@endsection