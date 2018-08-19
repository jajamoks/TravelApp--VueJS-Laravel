<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Media;

class PostController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return [
            'count' => Post::all()->count(),
            'posts' => Post::sorted()->paginate(10)->load('tags'),
            'perPage' => 10
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
            'title' => 'required|unique:posts',
            'content' => 'required',
            'user_id' => 'required',
            'post_category_id' => 'required',
            'featured_image' => 'required'
        ]);
        $data = $request->all();
        $post = Post::create($data);
        //save media to post if it exists
        if (isset($data['media']) && !empty($data['media'])) {
            $media = Media::findOrFail($data['media']);
            $post->media()->sync([$media->id]);
        }
        if (isset($data['tags']) && count($data['tags']) > 0) {
            $post->retag($data['tags']);
        }
        return $post;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Post::findOrFail($id)->load('tags');
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
            'title' => 'required|unique:posts,title,'.$id,
            'content' => 'required',
            'user_id' => 'required',
            'post_category_id' => 'required',
            'featured_image' => 'required'
        ]);
        $data = $request->all();
        $post = Post::find($id);
        $post->update($data);
        //save media to post if it exists
        if (isset($data['media']) && !empty($data['media'])) {
            $media = Media::findOrFail($data['media']);
            $post->media()->sync([$media->id]);
        }
        if (isset($data['tags'])) {
            if (count($data['tags']) > 0) {
                $post->retag($data['tags']);
            } else {
                $post->detag();
            }
        }
        return $post;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
    */
    public function destroy($id)
    {
        $posts = Post::findOrFail($id);
        $posts->delete();
        return $posts->fresh();
    }
}
