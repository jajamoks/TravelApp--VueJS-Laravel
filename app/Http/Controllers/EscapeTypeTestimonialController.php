<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EscapeType;
use App\Testimonial;

class EscapeTypeTestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $model = EscapeType::findOrFail($id);
        return $model->escape_testimonials;
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
            'name' => 'required',
            'date' => 'required',
            'content' => 'required'
        ]);

        $model = EscapeType::findOrFail($id);
        $testimonial = new Testimonial($request->all());
        $model->testimonials()->save($testimonial);
        return $model->escape_testimonials;
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
        $type = EscapeType::findOrFail($typeId);
        Testimonial::destroy($id);
        return $type->escape_testimonials;
    }

    public function bulkUpdate(Request $request, $typeId)
    {
        $model = EscapeType::findOrFail($typeId);
        $model->testimonials()->sync([$request->get('id')]);
        return $model->escape_testimonials;
    }
}
