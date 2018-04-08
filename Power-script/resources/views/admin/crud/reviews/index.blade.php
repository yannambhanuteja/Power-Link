@extends('layouts.admin') @section('content')

<div class="content table-responsive table-full-width">
    <table class="table table-striped">

        <thead>
            <th>ID</th>
            <th>USER NAME</th>
            <th>REVIEW</th>
            <th>IMAGE</th>
            <th>OCCUPATION</th>
            <th>STARS</th>

            <th>Edit</th>
            <th>Delete</th>
        </thead>
        <tbody>

            @foreach($reviews as $review)
            <tr>
                <td>{{$review->id}} </td>
                <td>{{$review->users_name}} </td>
                <td>{{$review->review}}</td>
                <td> <img src="/reviews/{{$review->user_image}}" style="width: 100px; "> </td>
                <td>{{$review->occupation}}</td>
                <td>{{$review->stars}} </td>

                <td><a href="{{route('reviews.edit',[" id "=>$review->id])}}" class="btn btn-info" type="submit">Edit</a></td>
                <td>

                    {!! Form::open(['route'=>['reviews.destroy',$review->id],'method'=>'DELETE']) !!}
                    <button class="btn btn-danger" type="submit">Delete</button>
                    {!! Form::close()!!}
                </td>
                <tr>

                    @endforeach
        </tbody>
    </table>
    <div class="pagination-center-align">
        {!! $reviews->links();!!}
    </div>
</div>
<style>
    .pagination-center-align {
        display: block;
        align-items: center;
        margin-left: 40%;
    }
</style>
<a class="btn btn-success" href="/users/review/create/write">Create New Review</a>
</div>
@endsection