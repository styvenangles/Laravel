<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Skilluser;
use App\Skill;
use App\User;

class Ranksuser extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ranksuser = User::all();
        
        /*return view('skills.index', compact ('skills'));*/
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
        /*$request->validate([
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
        
        return redirect('/skills');*/
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        $user->skills = $user->skills()->get();
        return view('/skillsusers')->with('user', $user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $rank = User::find($id);
        
        return view('ranksuser.edit', compact ('rank'));
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
        $rank = User::find($id);
        $rank->rank = $request->get('rank');
        $rank->save();
        
        return redirect('/admin');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
