@extends('layouts.master') 
@section('title','Analytics') 
@section('content')

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.js" integrity="sha384-RsTtQayjvyOqxP/8U+OVDp9fpGyykb6xz2AZOstb+HKX0okor4M/IN3SePU3XgYE" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.js" integrity="sha384-cYEXSCwjZh758LOfFjMvLByJGmtiEvNIzgz00Dlw15y5RS6yJrNyj7bM8R+XpTQE" crossorigin="anonymous"></script>

<table class="highlight centered bordered">
    <thead>
        <tr>
            <th>Link Url</th>
            <th>Redirect</th>
            <th>Total Hits</th>
            <th>Total Income </th>
        </tr>
    </thead>

    <tbody>
        <tr>
            <td>{{url('')}}/{{$link->link}}</td>
            <td>{{$link->url}}</td>
            <td>@include('partials._single_link_hits')</td>
            <td>@include('partials._single_link_income') </td>
        </tr>
    </tbody>
</table>

<br>
<hr>

<div class="center-align row">
    <div class="col s12 m6 l6 ">
        <h6 class="center-align"><b> Unique Desktop Visits <b>( @include('partials.analytics._unique_desktop_hits') hits)  </h6>
        <br>
        <div id="piechart" class="center-align" style="width:60%;">
            {!! $chartjs->render() !!}
        </div>

        @include('partials.analytics._unique_desktop_income') $

    </div>

    <div class="col s12 m6 l6">
        <h6 class="center-align"><b> Repeted Desktop Visits <b> ( @include('partials.analytics.rep_desktop_hits') hits)  </h6>
        <br>
        <div id="piechart" class="center-align" style="width:60%;">

            {!! $DR_chartjs->render() !!}
        </div>

        @include('partials.analytics.rep_desktop_income') $
    </div>

</div>

<div class="center-align row">
    <div class="col s12 m6 l6 ">
        <h6 class="center-align"><b>Unique Mobile Visits <b> (@include('partials.analytics._unique_mobile_hits')) </h6>
        <br>
        <div id="piechart" class="center-align" style="width:60%;">
            {!! $m_chartjs->render() !!}
        </div>
        @include('partials.analytics._unique_mobile_income') $
    </div>

    <div class="col s12 m6 l6">
        <h6 class="center-align"><b> Repeted Mobile Visits <b> (@include('partials.analytics.rep_mobile_hits')) </h6>
        <br>
        <div id="piechart" class="center-align" style="width:60%;">
            {!! $mr_chartjs->render() !!}
        </div>
        @include('partials.analytics.rep_mobile_income') $

    </div>

</div>

<script>
    Chart.defaults.global.legend.display = false;
</script>

<style>
    #piechart {
        margin-left: 15%;
        margin-right: 2%;
    }
</style>

@endsection