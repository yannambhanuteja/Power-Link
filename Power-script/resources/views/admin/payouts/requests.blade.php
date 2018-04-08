@extends('layouts.admin')


@section('content')


<div class="content table-responsive table-full-width">
    <table class="table table-striped">
        <thead>
            <th>ID</th>
            <th>Name</th>
            <th>Amount</th>
            <th>Mode</th>
            <th>Time</th>
            <th>Success</th>
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
                <td> <a class="btn btn-success" href="/admin/dashboard/payment_made/{{$request->id}}"> <i class="fa fa-check" aria-hidden="true"></i> </td>
                <td><a class="btn btn-success"  href="{{route('makePayment',["id"=>$request->id,"email"=>App\User::find($request->user_id)->paypal_email,"amount"=>$request->amount])}}" > Pay Now</a></td>
            </tr>
           @endforeach 
        </tbody>
    </table>

</div>


</div>

    <div class="pagination-center-align"> 
          {!! $requests->links();!!}
          </div>
</div>
<style>
  .pagination-center-align{

    display: block;
    align-items: center;
    margin-left: 40%;
  }
</style>
@endsection