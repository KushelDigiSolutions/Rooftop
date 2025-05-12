@extends('admin.layouts.app') 

@section('content')
<div class="info-tabs">
    @if(auth()->user()->hasRole('Data Entry Operator'))
        <a href="/products">
            <div class="card info-card">
                <img src="{{ url('admin/images/tab_products.svg') }}" alt="">
                <h2 class="fw-bold m-0 mb-1">{{ count($product) }}</h2>
                <p class="m-0 small">Total number of Products</p>
            </div>
        </a>
    @elseif(auth()->user()->hasRole('Fulfillment Desk'))
        <a href="/orders">
            <div class="card info-card">
                <img src="{{ url('admin/images/tab_franchise.svg') }}" alt="">
                <h2 class="fw-bold m-0 mb-1">{{ $totalOrders }}</h2>
                <p class="m-0 small">Total number of Orders</p>
            </div>
        </a>
    @elseif (Auth::user()->hasRole('Franchise'))
        <a href="/appointments_list">
            <div class="card info-card">
                <img src="{{ url('admin/images/tab_franchise.svg') }}" alt="">
                <h2 class="fw-bold m-0 mb-1">{{$appointmentCount}}</h2>
                <p class="m-0 small">Total number of Appointments</p>
            </div>
        </a>
        <a href="/quotations">
            <div class="card info-card">
                <img src="{{ url('admin/images/tab_products.svg') }}" alt="">
                <h2 class="fw-bold m-0 mb-1">{{$quotationCount}}</h2>
                <p class="m-0 small">Total number of Quotations</p>
            </div>
        </a>
    @elseif (Auth::user()->hasRole('Super Admin') || Auth::user()->hasRole('Admin'))
        <a href="{{ route('franchise.temp.index') }}">
            <div class="card info-card">
                <img src="{{ url('admin/images/tab_franchise.svg') }}" alt="">
                <h2 class="fw-bold m-0 mb-1">{{ count($appointment) }}</h2>
                <p class="m-0 small">Total number of Leads</p>
            </div>
        </a>
        <a href="/products">
            <div class="card info-card">
                <img src="{{ url('admin/images/tab_products.svg') }}" alt="">
                <h2 class="fw-bold m-0 mb-1">{{ count($totalCustomer) }}</h2>
                <p class="m-0 small">Total number of Customer</p>
            </div>
        </a>
        <a href="/user_list">
            <div class="card info-card">
                <img src="{{ url('admin/images/tab_users.svg') }}" alt="">
                <h2 class="fw-bold m-0 mb-1">0</h2>
                <p class="m-0 small">Total number of Contractor</p>
            </div>
        </a>
    @elseif (Auth::user()->hasRole('Help Desk'))
        <a href="/orders">
            <div class="card info-card">
                <img src="{{ url('admin/images/tab_franchise.svg') }}" alt="">
                <h2 class="fw-bold m-0 mb-1">{{ count($franchise) }}</h2>
                <p class="m-0 small">Total number of Orders</p>
            </div>
        </a>
        <a href="/appointments_list">
            <div class="card info-card">
                <img src="{{ url('admin/images/tab_franchise.svg') }}" alt="">
                <h2 class="fw-bold m-0 mb-1">{{$appointmentCount}}</h2>
                <p class="m-0 small">Total number of Appointments</p>
            </div>
        </a>
        <a href="/quotations">
            <div class="card info-card">
                <img src="{{ url('admin/images/tab_products.svg') }}" alt="">
                <h2 class="fw-bold m-0 mb-1">{{$quotationCount}}</h2>
                <p class="m-0 small">Total number of Quotations</p>
            </div>
        </a>
    @endif
</div>

@if(Auth::user()->hasRole('Super Admin') || Auth::user()->hasRole('Admin') || Auth::user()->hasRole('Help Desk') || Auth::user()->hasRole('Franchise'))

 <div class="container">
    <div class="card mt-4">
        <div class="card-header">
            <h4 class="fw-bold">Graphs & Charts for Sales</h4>
        </div>
        <div class="card-body">
            <canvas id="salesChart" height="100"></canvas>
        </div>
    </div>
    </div>
@endif

@endsection

@section('script') 
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
   // Sales Chart Data
   const salesLabels = @json($salesLabels); // e.g. ['Jan', 'Feb', 'Mar']
    const salesData = @json($salesData);     // e.g. [1200, 1500, 1100]

    const ctx = document.getElementById('salesChart').getContext('2d');

    const salesChart = new Chart(ctx, {
        type: 'line', // You can also try 'bar'
        data: {
            labels: salesLabels,
            datasets: [{
                label: 'Sales Amount (₹)',
                data: salesData,
                fill: true,
                borderColor: 'rgba(75, 192, 192, 1)',
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                tension: 0.3
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'top',
                },
                title: {
                    display: false,
                }
            },
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>

@endsection
