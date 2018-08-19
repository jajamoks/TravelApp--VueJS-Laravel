<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EscapeType;

class EscapeTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->get('all') === 'true') {
            return EscapeType::all();
        }
        return [
            'total' => EscapeType::all()->count(),
            'data' => EscapeType::paginate(6)->load('tags'),
            'per_page' => 6
        ];
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
            'name' => 'required|unique:escape_types',
            'description' => 'required',
            'accomodations' => 'required',
            'country' => 'required',
            'region' => 'required'
        ]);
        $model = new EscapeType($request->all());
        $model->save();
        return $model;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return EscapeType::findOrFail($id)->load('tags');
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
        $model = EscapeType::findOrFail($id);
        $featured_image = $request->get('featured_image');
        $model->saveImages(
            $request->get('featured_image'),
            $request->get('gallery')
        );
        $tags = $request->get('tags');
        if (isset($tags) && count($tags) > 0) {
            $model->retag($tags);
        } else {
            $model->detag();
        }
        $model->update($request->all());
        return $model;
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

    public function deleteGalleryImage($id, $media)
    {
        $type = EscapeType::findOrFail($id);
        $type->media()->detach($media);
        return $type->fresh();

    }
}
