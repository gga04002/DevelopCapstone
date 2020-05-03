<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChallengesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $challenges = \App\Challenge::get();
        return view('challenge.index', [
          'challenges'=>$challenges,
          'menuName'=>'챌린지'
          ]);
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
      if($request->has('entry_fee')){
        $join_challenge = \App\Join_challenge::create([
          'challenge_id' => $request->challenge_id,
          'user_id' => $request->user_id,
          'start_date' => $request->start_date,
          'end_date' => $request->end_date,
          'entry_fee' => $request->entry_fee,
        ]);
      }else {
        $join_challenge = \App\Join_challenge::create([
          'challenge_id' => $request->challenge_id,
          'user_id' => $request->user_id,
          'start_date' => $request->start_date,
          'end_date' => $request->end_date,
        ]);
      }

      return redirect()->route('joinedChallenge', ['join_challenge', $join_challenge]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $challenge = \App\Challenge::where('id', '=', $id)->first();

        return view('challenge.show', [
          'challenge'=>$challenge,
          'menuName' => '챌린지'
        ]);
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
        //
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
