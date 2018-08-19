<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use MetaTag;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
        // Defaults
       MetaTag::set('description', 'Expertly curated vacations combining yoga + fitness + culture + healthy/delicious cuisine.');
       MetaTag::set('image', 'https://res.cloudinary.com/escapetoshape/image/upload/v1497400303/YogaLakeAtitlan51.jpg');
    }
}
