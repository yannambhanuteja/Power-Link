@extends('layouts.admin')


  @section('content')





<div class="content table-responsive table-full-width">
    <table class="table table-striped">

        <thead>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Mobile</th>
            <th>Message </th>
            <th>Show</th>
           
            <th>Delete</th>
        </thead>
        <tbody>

            @foreach($contacts as $contact)
            <tr>
                <td>{{$contact->id}} </td>
                <td>{{$contact->name}} </td>
                <td>{{$contact->email}} </td>
                 <td>{{$contact->number}}</td>
                <td>{{ substr(strip_tags($contact->message),0,15) }} {{strlen($contact->message)>15?"...":""}}
                
               
                <td><a class="btn btn-info" data-toggle="modal" data-target="#show_{{$contact->id}}">Show</a>

                <div class="modal fade" id="show_{{$contact->id}}" tabindex="-1"  aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="false">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">New Message</h4>
      </div>
      <div class="modal-body">
        
          
         <label><b> Name: </b> </label> <br>
          <label>{{$contact->name}} </label> <br>
          <label><b> Email: </b> </label> <br>
          <label> {{$contact->email}} </label>  <br>
          <label><b> Contact Number </b> </label>  <br>
          <label>{{$contact->number}} </label>  <br>
          <label><b> Message: </b></label>  <br>

        <textarea class="form-control" name="term" rows="4">{{$contact->message}}  </textarea>
        <br>
          
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

       
      </div>
    </div><!-- /.modal-content -->

  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
</div> 



                </td>
                <td>
<a class="btn btn-danger" data-toggle="modal" data-target="#delete_{{$contact->id}}">Delete</a>


 <div class="modal fade" id="delete_{{$contact->id}}" tabindex="-1"  aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="false">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Delete Conformation</h4>
      </div>
      <div class="modal-body">
        
          
         {!! Form::open(['route'=>['contact.delete',$contact->id],'method'=>'DELETE']) !!}

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