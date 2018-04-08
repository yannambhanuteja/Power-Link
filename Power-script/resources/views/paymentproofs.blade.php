@extends('layouts.master')
@section('title','Payment Proofs')
@section('content')

<div class="center-align">

    <table class="card z-depth-2 bordered striped centered">
        <thead class="green white-text">
            <tr>
                <th>Payment ID</th>
                <th>UserName</th>
                <th>Amount</th>
                <th>Payment Mode</th>
                <th>Time</th>
            </tr>
        </thead>

        <tbody>
            @foreach($payments as $payment)
            <tr>
                <td>{{$payment->id}}</td>
                <td>{{App\User::find($payment->user_id)->name}}</td>
                <td>{{($payment->amount)}} $</td>
                <td>{{$payment->mode}} </td>
                <td>{{$payment->updated_at->diffForHumans()}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>
<div class="center-align">

    {{ $payments->links('vendor.pagination.simple-default') }}

</div>
<style>
    table {
        padding: 2%;
    }
    
    table,
    th,
    td {
        border: 0.5px solid black;
    }
</style>
@endsection