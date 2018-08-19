<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Testimonial;
use MetaTag;

class TestimonialsController extends Controller
{

    public function showPage()
    {
        MetaTag::set('title', 'Escape To Shape - Reviews');
        $testimonials = Testimonial::approved()->orderBy('date','desc')->get();
        return view('pages.reviews', compact('testimonials'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        \Log::info($request->status);
        if( $request->status ==  1 ){
            return ['testimonial' => Testimonial::where('approved', '=', '1')->paginate(10),
                'count' => Testimonial::where('approved', '=', '1')->count(),
                'perPage' => 10,
                'approveTestimonialCount' => Testimonial::where('approved', '=', '1')->count(),
                'notApproveTestimonialCount' => Testimonial::where('approved', '=', '0')->count()
            ];
        }elseif( $request->status == 2 ){
            return ['testimonial' => Testimonial::where('approved', '=', '0')->paginate(10),
                'count' => Testimonial::where('approved', '=', '0')->count(),
                'perPage' => 10,
                'approveTestimonialCount' => Testimonial::where('approved', '=', '1')->count(),
                'notApproveTestimonialCount' => Testimonial::where('approved', '=', '0')->count()
            ];
        }elseif($request->status === 'undefined'){
            return ['testimonial' => Testimonial::where('approved', '=', '1')->paginate(10),
                'count' => Testimonial::where('approved', '=', '1')->count(),
                'perPage' => 10,
                'approveTestimonialCount' => Testimonial::where('approved', '=', '1')->count(),
                'notApproveTestimonialCount' => Testimonial::where('approved', '=', '0')->count()
            ];
        }
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
            'content' => 'required',
            'date' => 'required',
        ]);
        $model = new Testimonial($request->all());
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
        return Testimonial::findOrFail($id);
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
        $model = Testimonial::findOrFail($id);
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
}
