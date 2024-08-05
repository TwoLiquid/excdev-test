@extends('templates.dashboard')

@section('content')
    <form>
        <label>Order date: </label>
        <select id="order">
            <option value="desc">Desc</option>
            <option value="asc">Asc</option>
        </select>

        <input type="text" id="search" placeholder="Search...">
        <input type="submit" id="historyFilterButton">
    </form>

    <hr>
    <h3>Operations:</h3>
    <div class="table-responsive">
        <table id="historyTable" class="table table-striped table-sm">
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
