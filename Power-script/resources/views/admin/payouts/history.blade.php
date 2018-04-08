@extends('layouts.admin') @section('content')

<div class="content table-responsive table-full-width">
    <table class="table table-striped">
        <thead>
            <th>ID</th>
            <th>Name</th>
            <th>Amount</th>
            <th>Mode</th>
            <th>Time</th>
            <th>Action</th>
        </thead>
        <tbody>
            @foreach($requests as $request)
            <tr>
                <td>{{$request->id}}</td>
                <td>{{$name = App\User::find($request->user_id)->name}}</td>
                <td>${{$request->amount}}</td>
                <td>{{$request->mode}}</td>
                <td>{{$request->created_at->diffForHumans()}}</td>
                <td>{{$request->updated_at->diffForHumans()}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>

</div>

@endsection