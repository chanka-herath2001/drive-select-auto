@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Home') }}</div>

                    <div class="card-body">

                        <div x-data="{
                            name: 'John Doe'
                        }">

                            <input type="text" class="form-control" x-model="name" />

                            <h1 x-text="name"></h1>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
