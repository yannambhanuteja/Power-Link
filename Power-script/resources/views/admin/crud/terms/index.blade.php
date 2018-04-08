@extends('layouts.admin')


@section('content')



<div class="content table-responsive table-full-width">
    <table class="table table-striped">

        <thead>
            <th>ID</th>
            <th>Term</th>
            <th>Edit</th>
            <th>Delete</th>
        </thead>
        <tbody>

            @foreach($terms as $term)
            <tr>
                <td>{{$term->id}} </td>
                <td>{{$term->terms_cond}} </td>
                

                <td><a class="btn btn-info" data-toggle="modal" data-target="#edit_{{$term->id}}">Edit</a>

                <div class="modal fade" id="edit_{{$term->id}}" tabindex="-1"  aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="false">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Edit Term</h4>
      </div>
      <div class="modal-body">
        
          
         {!! Form::model($term,['route'=>['terms.update',$term->id],'method'=>'PUT']) !!}

        {{csrf_field()}}
          <label>{{$term->terms_cond}} </label>

        <textarea class="form-control" name="term" rows="4"> {{$term->terms_cond}}  </textarea>
        <br>
          
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

        <button type="submit" class="btn btn-primary">Update Term</button>
      </div>
    </div><!-- /.modal-content -->
{!!Form::close()!!}
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
</div> 



                </td>
                <td>
<a class="btn btn-danger" data-toggle="modal" data-target="#delete_{{$term->id}}">Delete</a>


 <div class="modal fade" id="delete_{{$term->id}}" tabindex="-1"  aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="false">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Edit Term</h4>
      </div>
      <div class="modal-body">
        
          
         {!! Form::open(['route'=>['terms.destroy',$term->id],'method'=>'DELETE']) !!}

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
<a class="btn btn-success" data-toggle="modal" data-target="#create">
 Create New Term</a>



<!--Create A new Term Modal -->
<div class="modal fade" id="create" tabindex="-1"  aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="false">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Create A New Term</h4>
      </div>
      <div class="modal-body">
        
          
         <form action="/admin/terms" method="POST" enctype="multipart/form-data">

        {{csrf_field()}}
          <label>A New Term</label>

        <textarea class="form-control" name="term" placeholder="terms & Conditions" rows="4"></textarea>
        <br>
          
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Add Term</button>
      </div>
    </div><!-- /.modal-content -->
</form>
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
</div>
@endsection