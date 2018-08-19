<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Escape;

class FeaturedEscapesComposer
{

    protected $escape;

    /**
     * Create a new profile composer.
     *
     * @param  UserRepository  $users
     * @return void
     */
    public function __construct(Escape $escape)
    {
        // Dependencies automatically resolved by service container...
        $this->escape = $escape;
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $featuredEscapes = $this->escape->valid()->sorted()->get()->take(3);
        $view->with('featured_escapes', $featuredEscapes);
    }
}
