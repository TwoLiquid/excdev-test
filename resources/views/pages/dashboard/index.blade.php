@extends('templates.dashboard')

@section('content')
    <h3>Balance - {{ $balance }}</h3>
    <hr>
    <h3>Last operations:</h3>
    <div class="table-responsive">
        <table id="dashboardTable" class="table table-striped table-sm">
            <thead>
            <tr>
                <th scope="col">Date</th>
                <th scope="col">Amount</th>
                <th scope="col">Total</th>
                <th scope="col">Description</th>
            </tr>
            </thead>
            <tbody>
            @foreach($operations as $operation)
                <tr>
                    <td>{{ $operation->created_at }}</td>
                    <td>{{ $operation->amount }}</td>
                    <td>{{ $operation->total }}</td>
                    <td>{{ $operation->description }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
