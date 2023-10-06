@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="my-4">Subscription Plans</h1>

        <a href="{{ route('subscription-plans.create') }}" class="btn btn-primary my-2">Create New Plan</a>

        <table class="table table-bordered table-striped table-hover table-dark">
            <thead class="thead-dark">
                <tr>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($plans as $plan)
                    <tr>
                        <td>{{ $plan->name }}</td>
                        <td>${{ $plan->price }}</td>
                        <td>
                            <div class="btn-group" role="group">
                                <a href="{{ route('subscription-plans.edit', ['plan' => $plan->id]) }}"
                                    class="btn btn-sm btn-primary">Edit</a>

                                <a href="{{ route('subscription-plans.show', $plan->id) }}"
                                    class="btn btn-sm btn-info">View</a>

                                <form action="{{ route('subscription-plans.destroy', $plan->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger"
                                        onclick="return confirm('Are you sure you want to delete this plan?')">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
