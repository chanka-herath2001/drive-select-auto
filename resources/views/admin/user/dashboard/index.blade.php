@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 grid-margin">

                @if (session('message'))
                    <h6 class="alert alert-success">{{ session('message') }}</h6>
                @endif
                <div class="me-md-3 me-xl-5">
                    <h2 class="font-weight-bold mb-0 analytics-header">Analytics Dashboard</h2>
                    <p class="mb-md-0 analytics-sub-header">Basic Overview</p>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="card card-body bg-primary text-white mb-3">
                            <label>Total Ads</label>
                            <h1>{{ $totalAds }}</h1>
                            {{-- <a href="#" class="text-white">View</a> --}}
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card card-body bg-success text-white mb-3">
                            <label>Ads today</label>
                            <h1>{{ $todayAds }}</h1>
                            {{-- <a href="#" class="text-white">View</a> --}}
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card card-body bg-warning text-white mb-3">
                            <label>Ads this month</label>
                            <h1>{{ $thisMonthAds }}</h1>
                            {{-- <a href="#" class="text-white">View</a> --}}
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card card-body bg-danger text-white mb-3">
                            <label>Ads this year</label>
                            <h1>{{ $thisYearAds }}</h1>
                            {{-- <a href="#" class="text-white">View</a> --}}
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card card-body bg-info text-white mb-3">
                            <label>Total Users</label>
                            <h1>{{ $totalUsers }}</h1>
                            {{-- <a href="#" class="text-white">View</a> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
