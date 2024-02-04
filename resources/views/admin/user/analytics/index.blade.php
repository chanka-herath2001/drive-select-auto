@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Analytics Section</h2>
        @livewire('admin.analytics-chart')
    </div>
    <script src="{{ asset('vendor/livewire/livewire.js') }}"></script>
@endsection
