@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Subscription Plans</h1>

        <a href="{{ route('subscription-plans.create') }}" class="btn btn-primary">Create New Plan</a>

        <table class="table mt-3">
            <thead>
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
                        <td>{{ $plan->price }}</td>
                        <td>
                            <a href="{{ route('subscription-plans.edit', ['plan' => $plan->id]) }}"
                                class="btn btn-primary">Edit</a>



                            <a href="{{ route('subscription-plans.show', $plan->id) }}" class="btn btn-info">View</a>


                            <form action="{{ route('subscription-plans.destroy', $plan->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
