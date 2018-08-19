<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Carbon\Carbon;
use App\Press;
use App\Media;
use MetaTag;

class PressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Press::sorted()->paginate(6);
    }


    public function showIndex()
    {
        $press = Press::sorted()->get();
        return view('pages.press.index', [
            'press' => $press
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
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'title' => 'required',
            'date' => 'required',
        ]);
        $data = $request->all();

        $model = Press::create($data);
        //save media to press if it exists
        $media = $request->get('media');
        if (isset($media) && !empty($media)) {
            $model->saveImage($media);
        }
        $attachment = $request->get('attach');
        if (isset($attachment) && !empty($attachment)) {
            $model->saveAttachment($attachment);
        }
        if (isset($data['tags']) && count($data['tags']) > 0) {
            $model->retag($data['tags']);
        }
        return $model;

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Press::findOrFail($id)->load('tags');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // do something
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'date' => 'required'
        ]);
        $model = Press::findOrFail($id);
        $data = $request->all();

        if ($data['title'] != $model['title']) {
            $model->slug = null;
        }

        $model->update($data);
        //save media to press if it exists
        $media = $request->get('media');
        if (isset($media) && !empty($media)) {
            $model->saveImage($media);
        }
        $attachment = $request->get('attach');
        if (isset($attachment) && !empty($attachment)) {
            $model->saveAttachment($attachment);
        }
        if (isset($data['tags'])) {
            if (count($data['tags']) > 0) {
                $model->retag($data['tags']);
            } else {
                $model->detag();
            }
        }
        return $model;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $press = Press::find($id);
        $press->detag();    // detag press tags then remove the tag
        return $press->destroy($id);
    }

    /*
     * show a press content by slug
     * @param  int  $slug
     * @return \Illuminate\Http\Response
     *
     * */
    public function showPress($slug)
    {

        $press = Press::where('slug', $slug)
            ->orderBy('date', 'desc')
            ->firstOrFail();
        /* media tag setup for SEO */
        MetaTag::set('title', $press->title);
        if($press->image){
            MetaTag::set('image', $press->image->fullSize);
        }
        MetaTag::set('description', $press->summary);

        return view('pages.press.press', ['press' => $press]);
    }

    /*
     * show a press content by tag
     * @param  $tag
     * @return \Illuminate\Http\Response
     *
     * */
    public function showPressByTag($tag)
    {

        $press = Press::withAnyTags($tag)
            ->orderBy('date', 'desc')
            ->simplePaginate(10);
        if ($press->count() === 0) {
            throw new ModelNotFoundException;
        }
        return view('pages.press.index', [
            'title' => ucwords($tag),
            'category' => ucwords($tag),
            'press' => $press
        ]);
    }

    /**
     * Search the press contents
     *
     * @return Response
     */
    public function PressSearch()
    {
        $term = trim(request()->input('search'));
        $press = Press::where('title', 'like', '%' . $term . '%')
            ->orWhere('content', 'like', '%' . $term . '%')
            ->orderBy('date', 'desc')
            ->get();

        return view('pages.press.index', [
            'title' => 'Search',
            'press' => $press
        ]);
    }
}
