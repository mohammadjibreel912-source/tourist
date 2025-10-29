@extends('admim.layouts.app')
@section('content')

        @include('admim.layouts.sidebar')

            <div class="content-wrapper">
                <div class="container-xxl flex-grow-1 container-p-y">

                    <!-- Dashboard Cards -->
                    <div class="row g-4 mb-4">
                        <!-- Total Spots -->
                        <div class="col-md-3">
                            <div class="card shadow-sm border-0 h-100 text-center hover-shadow">
                                <div class="card-body">
                                    <i class="bx bx-map fs-1 text-primary mb-2"></i>
                                    <h6 class="text-muted mb-1">Total Spots</h6>
                                    <h3 class="fw-bold">{{ $totalSpots }}</h3>
                                </div>
                            </div>
                        </div>

                        <!-- Total Tickets -->
                        <div class="col-md-3">
                            <div class="card shadow-sm border-0 h-100 text-center hover-shadow">
                                <div class="card-body">
                                    <i class="bx bx-ticket fs-1 text-success mb-2"></i>
                                    <h6 class="text-muted mb-1">Total Tickets</h6>
                                    <h3 class="fw-bold">{{ $totalTickets }}</h3>
                                </div>
                            </div>
                        </div>

                        <!-- Total Users -->
                        <div class="col-md-3">
                            <div class="card shadow-sm border-0 h-100 text-center hover-shadow">
                                <div class="card-body">
                                    <i class="bx bx-user fs-1 text-warning mb-2"></i>
                                    <h6 class="text-muted mb-1">Total Users</h6>
                                    <h3 class="fw-bold">{{ $totalUsers }}</h3>
                                </div>
                            </div>
                        </div>

                        <!-- Revenue -->
                        <div class="col-md-3">
                            <div class="card shadow-sm border-0 h-100 text-center hover-shadow">
                                <div class="card-body">
                                    <i class="bx bx-dollar fs-1 text-danger mb-2"></i>
                                    <h6 class="text-muted mb-1">Revenue (This Month)</h6>
                                    <h3 class="fw-bold">${{ number_format($monthlyRevenue, 2) }}</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Dashboard Cards -->

                    <!-- Revenue Chart -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card shadow-sm border-0">
                                <div class="card-header bg-primary text-white">
                                    <h5 class="mb-0">Monthly Revenue ({{ now()->year }})</h5>
                                </div>
                                <div class="card-body">
                                    <canvas id="monthlyRevenueChart" height="120"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Revenue Chart -->

                </div>

                <!-- Footer -->
                <footer class="content-footer footer bg-footer-theme mt-4">
                    <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
                        <div class="mb-2 mb-md-0">
                            © {{ date('Y') }}, made with ❤️ by
                            <a href="https://Explore360°.com" target="_blank" class="footer-link fw-bolder">Explore360°</a>
                        </div>
                        <div>


                        </div>
                    </div>
                </footer>
                <!-- /Footer -->

            </div>

<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
const ctx = document.getElementById('monthlyRevenueChart').getContext('2d');
new Chart(ctx, {
    type: 'line',
    data: {
        labels: {!! json_encode($monthlyRevenueChart->keys()) !!},
        datasets: [{
            label: 'Revenue',
            data: {!! json_encode($monthlyRevenueChart->values()) !!},
            backgroundColor: 'rgba(105,108,255,0.2)',
            borderColor: 'rgba(105,108,255,1)',
            borderWidth: 2,
            tension: 0.4,
            fill: true,
            pointBackgroundColor: 'rgba(105,108,255,1)',
            pointRadius: 5
        }]
    },
    options: {
        responsive: true,
        plugins: {
            legend: { display: true }
        },
        scales: {
            y: { beginAtZero: true }
        }
    }
});
</script>

<!-- Custom CSS -->
<style>
.hover-shadow:hover {
    transform: translateY(-5px);
    transition: all 0.3s ease;
    box-shadow: 0 8px 20px rgba(0,0,0,0.1);
}
</style>
@endsection
