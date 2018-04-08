@extends('layouts.admin')


@section('content')



<div class="content table-responsive table-full-width">
    <table class="table table-striped">

        <thead>
            <th>ID</th>
            <th>Question</th>
            <th>Answer</th>
            <th>Edit</th>
            <th>Delete</th>
        </thead>
        <tbody>

            @foreach($faqs as $faq)
            <tr>
                <td>{{$faq->id}} </td>
                <td>{{$faq->question}} </td>
                <td>{{$faq->answer}} </td>
                

                <td><a class="btn btn-info" data-toggle="modal" data-target="#edit_{{$faq->id}}">Edit</a>

                <div class="modal fade" id="edit_{{$faq->id}}" tabindex="-1"  aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="false">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Edit faq</h4>
      </div>
      <div class="modal-body">
        
          
         {!! Form::model($faq,['route'=>['faq.update',$faq->id],'method'=>'PUT']) !!}

        {{csrf_field()}}
           <label for="question">Enter Question </label>
        <input type="text" name="question" class="form-control" id="question" value="{{$faq->question}}">
        <br>
        <textarea class="form-control" name="answer" placeholder="Enter Faq answer" rows="4">{{$faq->answer}} </textarea>
        <br>
          
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

        <button type="submit" class="btn btn-primary">Update faq</button>
      </div>
    </div><!-- /.modal-content -->
{!!Form::close()!!}
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
</div> 



                </td>
                <td>
<a class="btn btn-danger" data-toggle="modal" data-target="#delete_{{$faq->id}}">Delete</a>


 <div class="modal fade" id="delete_{{$faq->id}}" tabindex="-1"  aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="false">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Delete faq</h4>
      </div>
      <div class="modal-body">
        
          
         {!! Form::open(['route'=>['faq.destroy',$faq->id],'method'=>'DELETE']) !!}

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

<a class="btn btn-success" data-toggle="modal" data-target="#create">
 Create New faq</a>



<!--Create A new faq Modal -->
<div class="modal fade" id="create" tabindex="-1"  aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="false">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Create A New faq</h4>
      </div>
      <div class="modal-body">
        
          
         <form action="/admin/faq" method="POST" enctype="multipart/form-data">

        {{csrf_field()}}
          <label>A New faq</label>
          <label for="question">Enter Question </label>
        <input type="text" name="question" class="form-control" id="question" placeholder="enter Question">
        <br>
        <textarea class="form-control" name="answer" placeholder="Enter Faq answer" rows="4"></textarea>
        <br>
          
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Add Faq</button>
      </div>
    </div><!-- /.modal-content -->
</form>
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
</div>



@endsection