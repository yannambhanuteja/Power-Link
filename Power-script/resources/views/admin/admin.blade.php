@extends('layouts.admin') 
@section('content')

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.js" integrity="sha384-RsTtQayjvyOqxP/8U+OVDp9fpGyykb6xz2AZOstb+HKX0okor4M/IN3SePU3XgYE" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.js" integrity="sha384-cYEXSCwjZh758LOfFjMvLByJGmtiEvNIzgz00Dlw15y5RS6yJrNyj7bM8R+XpTQE" crossorigin="anonymous"></script>
<div class="holder">
<h2 class="text-center">Unique Desktop Visits</h2>
<div id="piechart" style="width:100%; height:100%;">
    {!! $chartjs->render() !!}
</div>
<h2 class="text-center">Repeted Desktop Visits </h2>
<div id="piechart" style="width:100%;">
    {!! $DR_chartjs->render() !!}
</div>
<h2 class="text-center">Unique Mobile Visits</h2>
<div id="piechart" style="width:100%;">
    {!! $m_chartjs->render() !!}
</div>
<h2 class="text-center">Repeted Mobile Visits</h2>
<div id="piechart" style="width:100%;">
    {!! $mr_chartjs->render() !!}
</div>
</div>
<script>
Chart.defaults.global.defaultFontFamily = "'Roboto', 'Helvetica Neue', 'Helvetica', 'Arial', sans-serif";
Chart.defaults.global.legend.position = 'bottom';
Chart.defaults.global.legend.labels.usePointStyle = true;
Chart.defaults.global.legend.labels.boxWidth = 15;
Chart.defaults.global.tooltips.backgroundColor = '#000';
</script>
<style>
    #piechart {
        height:100%;
    }

</style>




@endsection