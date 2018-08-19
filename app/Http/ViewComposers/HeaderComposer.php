<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Escape;

class HeaderComposer
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
        $view->with(
            'escapes',
            $this->escape->has('type.media')->valid()->sorted()->take(3)->get()
        );
    }
}
