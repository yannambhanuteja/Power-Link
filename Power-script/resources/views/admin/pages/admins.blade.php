@extends('layouts.admin')


  @section('content')





<div class="content table-responsive table-full-width">
    <table class="table table-striped">

        <thead>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Created At</th>
            
           
            <th>Delete</th>
        </thead>
        <tbody>

            @foreach($admins as $admin)
            <tr>
                <td>{{$admin->id}} </td>
                <td>{{$admin->name}} </td>
                <td>{{$admin->email}} </td>
                 <td>{{$admin->created_at->diffforHumans()}}</td>
                
                <td>
<a class="btn btn-danger @if(Auth::user()->id== $admin->id)  data-toggle="tooltip"  title="You cant delete yourself" disabled @else" data-toggle="modal" data-target="#delete_{{$admin->id}}" @endif>Delete</a>


 <div class="modal fade" id="delete_{{$admin->id}}" tabindex="-1"  aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="false">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Delete Conformation</h4>
      </div>
      <div class="modal-body">
        
          
         {!! Form::open(['route'=>['admin.delete',$admin->id],'method'=>'DELETE']) !!}

        {{csrf_field()}}
          <label>Are You Sure you want to delete ?</label>

        
          
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

        <button class="btn btn-danger" type="submit">Delete</button>
      </div>
    </div><!-- /.modal-content -->
                   
                    
         {!! Form::close()!!}
                </td>
                <tr>

                    @endforeach
        </tbody>
    </table>
  
</div>
<style>
    .pagination-center-align {
        display: block;
        align-items: center;
        margin-left: 40%;
    }
</style>






@endsection