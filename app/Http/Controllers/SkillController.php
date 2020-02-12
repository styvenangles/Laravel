<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Skill;
use App\User;

class SkillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $skills = Skill::all();
        
        return view('skills.index', compact ('skills'));
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
        $request->validate([
          'name'=>'required',
          'description'=>'required',
          'logo'=>'required'
        ]);
        
        $skill = new Skill([
          'name' => $request->get('name'),
          'description' => $request->get('description'),
          'logo' => $request->get('logo')
        ]);
        
        $skill->save();
        
        return redirect('/skills');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $skill = Skill::find($id);
        
        return view('skills.edit', compact ('skill'));
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
        $request->validate([
          'name'=>'required',
          'description'=>'required',
          'logo'=>'required'
        ]);
        
        $skill = Skill::find($id);
        $skill->name = $request->get('name');
        $skill->description = $request->get('description');
        $skill->logo = $request->get('logo');
        $skill->save();
        
        return redirect('/skills/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $removeskill = Skill::find($id);
        $removeskill->delete();
        
        return redirect('/skills/');
    }
}
