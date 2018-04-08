<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Reviews;

use Image;

use Redirect;

class ReviewsController extends Controller
{
    public function create()
    {
        return view('reviews.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, array(
            'name'=>'required',
            'review'=>'required'
        ));
        $reviews = new Reviews();

        $reviews->users_name = strip_tags($request->name);
        $reviews->review = strip_tags($request->review);
        $reviews->occupation = strip_tags($request->occupation);
        $reviews->stars = strip_tags($request->stars);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename=time().'.'.$image->getClientOriginalExtension();
            $location=public_path('reviews/'.$filename);
            Image::make($image)->save($location);

            $reviews->user_image = $filename;
        }

        $reviews->save();

        return Redirect('/')->withSuccess('Review Posted Successfully');
    }

    public function index()
    {
        $reviews = Reviews::paginate(10);

        return view('admin.crud.reviews.index', compact('reviews'));
    }

    public function edit($id)
    {
        $reviews = Reviews::find($id);

        return view('admin.crud.reviews.edit', compact('reviews'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, array(
            'name'=>'required',
            'review'=>'required'
        ));

        $reviews = Reviews::find($id);

        $reviews->users_name = strip_tags($request->name);
        $reviews->review = strip_tags($request->review);
        $reviews->occupation = strip_tags($request->occupation);
        $reviews->stars = $request->stars;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename=time().'.'.$image->getClientOriginalExtension();
            $location=public_path('reviews/'.$filename);
            Image::make($image)->save($location);

            $reviews->user_image = $filename;
        }

        $reviews->save();

        return Redirect('/admin/reviews');
    }

    public function destroy($id)
    {
        $reviews = Reviews::find($id);

        $reviews->delete();

        return Redirect('/admin/reviews');
    }
}
