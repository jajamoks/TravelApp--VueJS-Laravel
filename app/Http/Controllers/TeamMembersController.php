<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TeamMember;
use App\Media;

class TeamMembersController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->get('all')) {
            return TeamMember::all();
        }
        return TeamMember::paginate(10);
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
        $this->validate($request, [
            'name' => 'required',
            'bio' => 'required',
            'media' => 'required'
        ]);

        $data = $request->all();
        $teamMember = TeamMember::create($data);
        $teamMember->media()->sync([$data['media']['id']]);

        return $teamMember;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return TeamMember::findOrFail($id);
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
        $this->validate($request, [
            'name' => 'required',
            'bio' => 'required',
            'media' => 'required'
        ]);
        $data = $request->all();
        $teamMember = TeamMember::findOrFail($id);
        $teamMember->update($data);
        $teamMember->media()->sync([$data['media']['id']]);
        return $teamMember;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        TeamMember::findOrFail($id)->delete();
        return;
    }
}
