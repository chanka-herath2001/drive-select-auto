@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Home') }}</div>

                    <div class="card-body">

                        @livewire('counter-button')

                        @livewire('todo-list')



                        {{-- <div x-data="{
                            name: 'John Doe'
                        }" class="mt-5">

                            <h1>JS Version</h1>

                            <input type="text" class="form-control" x-model="name" />

                            <h5 x-text="name">
                                </h1>

                        </div> --}}
                    </div>

                <div style="height: 700px"></div>

                </div>
            </div>
        </div>
    </div>
@endsection
