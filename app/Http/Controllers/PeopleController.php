<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Post;
use App\People;
Use Session;

class PeopleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $peoples = People::all();

        return view('people.index')->withPeoples($peoples);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('people.create');
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
          'name' => 'required|min:3|max:255',
          'surname' => 'required|min:3|max:255',
          'id_no' => 'required|min:13|max:13',
          'mobile' => 'required|min:10|max:10',
          'birth_date' => 'required',
          'language' => 'required',
          'interest' => 'interest',
        ));

        $people = new People;

        $people->name = $request->name;
        $people->surname = $request->surname;
        $people->id_no = $request->id_no;
        $people->mobile = $request->mobile;
        $people->birth_date = $request->birth_date;
        $people->language = $request->language;
        $people->interest = $request->interest;

        $people->save();

        Session::flash('success', 'The person was successfully added');

        return redirect()->route('people.show', $people->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $people = People::find($id);
        return view('people.show')->withPeople($people);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $people = People::find($id);
        return view('people.edit')->withPeople($people);
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
        'name' => 'required|min:3|max:255',
        'surname' => 'required|min:3|max:255',
        'id_no' => 'required|min:13|max:13',
        'mobile' => 'required|min:10|max:10',
        'birth_date' => 'required',
        'language' => 'required',
        'interest' => 'interest',
      ));

      $people = People::find($id);

      $people->name = $request->input('name');
      $people->surname = $request->input('surname');
      $people->id_no = $request->input('id_no');
      $people->mobile = $request->input('mobile');
      $people->birth_date = $request->input('birth_date');
      $people->language = $request->input('language');
      $people->interest = $request->input('interest');

      $people->save();

      Session::flash('success', 'The person was successfully updated');

      return redirect()->route('people.show', $people->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $people = People::find($id);

        $people->delete();

        Session::flash('success', 'The person was successfully deleted');

        return redirect()->route('people.index');
    }
}
