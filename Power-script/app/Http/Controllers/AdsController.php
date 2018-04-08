<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Ads;

use Redirect;

class AdsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ads = Ads::paginate(10);
        return view('admin.crud.ads.index', compact('ads'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.crud.ads.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ads = new Ads();

        $ads->top = $request->top;
        $ads->left = $request->left;
        $ads->right = $request->right;
        $ads->center = $request->center;
        $ads->footer = $request->footer;
        $ads->save();
        return Redirect::back()->withSuccess('Advertisement Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ads = Ads::find($id);
        return view('admin.crud.ads.edit', compact('ads'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $ads = Ads::find($id);

        $ads->top = $request->top;
        $ads->left = $request->left;
        $ads->right = $request->right;
        $ads->center = $request->center;
        $ads->footer = $request->footer;
        $ads->save();
        return Redirect::back()->withSuccess('Advertisement Added Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ads = Ads::find($id);
        $ads->delete();
        return Redirect::back()->withDelete('Advertisement Deleted Successfully');
    }
}
