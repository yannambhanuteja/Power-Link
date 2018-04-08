<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Terms;

use Redirect;

class TermsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $terms = Terms::all();
        return view('admin.crud.terms.index', compact('terms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, array(
            'term'=>'required'
        ));
        $term = new Terms();
        $term->terms_cond = $request->term;
        $term->save();

        return Redirect('/admin/terms')->with('success', 'Term Added Successfully');
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
        //
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
        $this->validate($request, array(
            'term'=>'required'
        ));

        $term =  Terms::find($id);
        $term->terms_cond = $request->term;
        $term->save();

        return Redirect('/admin/terms')->with('success', 'Term updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $term =  Terms::find($id);
        $term->delete();


        return Redirect('/admin/terms')->with('delete', 'Term Deleted Successfully');
    }
}
