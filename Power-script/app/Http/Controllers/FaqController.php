<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Faq;

use Redirect;

class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $faqs = Faq::all();
        return view('admin.crud.faq.index', compact('faqs'));
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
            'question'=>'required',
            'answer'=>'required'
        ));

        $faq = new Faq();
        $faq->answer = $request->answer;
        $faq->question = $request->question;
        $faq->save();

        return Redirect('/admin/faq')->with('success', 'Faq Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $faqs = Faq::all();
        return view('faqs',compact('faqs'));
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
            'question'=>'required',
            'answer'=>'required'
        ));

        $faq = Faq::find($id);
        $faq->answer = $request->answer;
        $faq->question = $request->question;
        $faq->save();

        return Redirect('/admin/faq')->with('success', 'Faq Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $faq = Faq::find($id);

        $faq->delete();

        return Redirect('/admin/faq')->with('delete', 'Faq Deleted Successfully');
    }
}
