<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EscapeType;
use App\EscapeFeature;

class EscapeTypeFeatureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $id)
    {
        $model = EscapeType::findOrFail($id);
        return $model->escape_features;
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
        $this->validate($request, [
            'content' => 'required',
            'order' => 'required'
        ]);
        $model = EscapeType::findOrFail($id);
        $feature = new EscapeFeature($request->all());
        $model->features()->save($feature);
        return $model->escape_features;
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
    public function destroy($typeId, $id)
    {
        $model = EscapeType::findOrFail($typeId);
        EscapeFeature::destroy($id);
        return $model->features;
    }

    public function bulkUpdate(Request $request, $id)
    {
        $model = EscapeType::findOrFail($id);
        $data = $request->all();
        if (!isset($data['id'])) {
            $data = collect($data);
            $model->features->each(function ($item) use ($data) {
                $update = $data->first(function ($update) use ($item) {
                    return $update['id'] === $item->id;
                });
                $item->update($update);
            });
            return $model->fresh()->escape_features;
        } else {
            $modelToUpdate = $model->features->first(function ($item) use ($data) {
                return $item->id === $data['id'];
            });
            $modelToUpdate->update($data);
            return $model->fresh()->escape_features;
        }
    }
}
