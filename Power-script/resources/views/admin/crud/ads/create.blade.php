@extends('layouts.admin')
 @section('content')

<form action="{{route('ads.store')}}" method="POST">
    {{csrf_field()}}

    <div class="form-group">

        <br>
        <label>Top Advert space</label>

        <textarea class="form-control" name="top" placeholder="Insert Top Advert Space" rows="4"></textarea>
        <br>

        <br>
        <label>Left Sidebar Advert space</label>

        <textarea class="form-control" name="left" placeholder="Left Sidebar Advert Space" rows="4"></textarea>
        <br>

        <br>
        <label>Right Sidebar Advert space</label>

        <textarea class="form-control" name="right" placeholder="Right Sidebar Advert Space" rows="4"></textarea>
        <br>

        <br>
        <label>Center Advert space</label>

        <textarea class="form-control" name="center" placeholder="Center Advert Space" rows="4"></textarea>
        <br>

        <br>
        <label>Footer Advert space</label>

        <textarea class="form-control" name="footer" placeholder="Footer Text" rows="4"></textarea>
        <br>
        <button type="submit" class="btn btn-success">Create Advert</button>

    </div>
    <img src="/Advert_layout.png" class="img-thumbnail"> 
@endsection