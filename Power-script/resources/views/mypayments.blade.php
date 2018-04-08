@extends('layouts.master') 
@section('title','Payments') 
@section('content')

<div class="row">
    <ul class="z-depth-4 hoverable tabs">
        <li class="orange tab col s6"><a class="white-text active" href="#process">Under Process</a></li>
        <li class="green tab col s6"><a class="white-text active" href="#success">Successfull</a></li>
        <li class="red indicator"> </li>

    </ul>
    <div class="center-align">
        <br>
        <div id="process" class="col s12">
            <table class="bordered striped centered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Amount</th>
                        <th>Requested Time</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($payment_process as $payment_process)
                    <tr>
                        <td>{{$payment_process->id}}</td>
                        <td>{{$payment_process->amount}}$</td>
                        <td>{{$payment_process->created_at->diffForHumans()}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
        <div id="success" class="col s12">

            <table class="bordered striped centered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Amount</th>
                        <th>Request Time</th>
                        <th>Completed Time</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($payment_success as $payment_success)
                    <tr>
                        <td>{{$payment_success->id}}</td>
                        <td>{{$payment_success->amount}}$</td>
                        <td>{{$payment_success->created_at->diffForHumans()}}</td>
                        <td>{{$payment_success->updated_at->diffForHumans()}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<style type="text/css">
    .red.indicator {
        height: 5px;
    }
</style>
@endsection