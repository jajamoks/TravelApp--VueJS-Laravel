<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EscapeType;
use App\TeamMember;

class EscapeTypeTeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $model = EscapeType::findOrFail($id);
        return $model->teachers;
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
    public function store(Request $request, $id)
    {
        $model = EscapeType::findOrFail($id);
        $teacher = TeamMember::findOrFail($request->get('id'));
        $model->teachers()->save(
            $teacher,
            ['order' => $request->get('order')]
        );
        return $model->teachers;
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, $teacherId)
    {
        $model = EscapeType::findOrFail($id);
        $model->teachers()->detach($teacherId);
        return $model->teachers;
    }

    public function bulkUpdate(Request $request, $id)
    {
        $model = EscapeType::findOrFail($id);
        $teachers = $model->teachers;
        $updates = collect($request->all());
        $teachers->each(function ($teacher) use ($updates, $model) {
            $update = $updates->first(function ($u) use ($teacher, $model) {
                return $teacher->id === $u['id'];
            });
            if ($update) {
                $order = isset($update['pivot'])
                            ? $update['pivot']['order']
                            : $update['order'];
                $model->teachers()->updateExistingPivot($update['id'], [
                    'order' => $order
                ]);
            }
        });
        return $model->fresh()->teachers;
    }
}
