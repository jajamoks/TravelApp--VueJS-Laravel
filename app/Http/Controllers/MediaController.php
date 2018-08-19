<?php

namespace App\Http\Controllers;

use Illuminate\Http\File;
use Illuminate\Http\Request;
use App\Media;

class MediaController extends Controller
{
    public function __construct(Media $media)
    {
        $this->media = $media;
    }

    public function store(Request $request)
    {
        \Log::info(print_r($request->all(),true));
        if ($request->get('local')) {
            return $this->media->storeLocal($request);
        }
        return $this->media->createFromFiles($request->file());
    }
}
