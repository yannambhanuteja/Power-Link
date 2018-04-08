@extends('layouts.admin')


@section('content')


<div class="content table-responsive table-full-width">
    <table class="table table-striped">
   
        <thead>
            <th>ID</th>
        	<th>Top </th>
        	<th>Right</th>
        	<th>Left</th>
            <th>Center</th>
            <th>Footer</th>
            
        	<th>Edit</th>
        	<th>Delete</th>
        </thead>
        <tbody>

        @foreach($ads as $ad)
<tr>
         <td>{{$ad->id}} </td>
         <td>{{$ad->top}} </td>
         <td>{{$ad->right}}</td>
         <td>{{$ad->left}}</td>
         <td>{{$ad->center}}</td>
         <td>{{$ad->footer}} </td>
        
         <td><a href="{{route('ads.edit',["id"=>$ad->id])}}" class="btn btn-info" type="submit">Edit</a></td>
         <td>

 {!! Form::open(['route'=>['ads.destroy',$ad->id],'method'=>'DELETE']) !!}
         <button class="btn btn-danger" type="submit">Delete</button>  
{!! Form::close()!!}
         </td>  
<tr>

@endforeach
         </tbody>
    </table>
        <div class="pagination-center-align"> 
          {!! $ads->links();!!}
          </div>
</div>
<style>
  .pagination-center-align{

    display: block;
    align-items: center;
    margin-left: 40%;
  }
</style>
<a class="btn btn-success" href="/admin/ads/create">Create New Advert</a>           
</div>
@endsection