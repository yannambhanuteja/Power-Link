@extends('layouts.admin') @section('content') {!! Form::model($ads,['route'=>['ads.update',$ads->id],'method'=>'PUT']) !!} {{csrf_field()}}

<div class="form-group">

    <br>
    <label>Top Advert space</label>

    <textarea class="form-control" name="top" placeholder="Insert Top Advert Space" rows="6">
        {{$ads->top}}
    </textarea>
    <br>

    <br>
    <label>Left Sidebar Advert space</label>

    <textarea class="form-control" name="left" placeholder="Left Sidebar Advert Space" rows="6">
        {{$ads->left}}
    </textarea>
    <br>

    <br>
    <label>Right Sidebar Advert space</label>

    <textarea class="form-control" name="right" placeholder="Right Sidebar Advert Space" rows="6">

        {{$ads->right}}
    </textarea>
    <br>

    <br>
    <label>Center Advert space</label>

    <textarea class="form-control" name="center" placeholder="Center Advert Space" rows="6">
        {{$ads->center}}
    </textarea>
    <br>

    <br>
    <label>Footer Advert space</label>

    <textarea class="form-control" name="footer" placeholder="Footer Text" rows="6">
        {{$ads->footer}}
    </textarea>
    <br>
    <button type="submit" class="btn btn-success">update Advert</button>

</div>
{!!Form::close()!!}

</div>
<img src="/Advert_layout.png" class="img-thumbnail"> @endsection