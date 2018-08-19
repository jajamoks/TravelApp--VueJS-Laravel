<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Testimonial;

class SideMenuComposer
{

    protected $escape;

    /**
     * Create a new profile composer.
     *
     * @param  UserRepository  $users
     * @return void
     */
    public function __construct(Testimonial $testimonial)
    {
        // Dependencies automatically resolved by service container...
        $this->testimonial = $testimonial;
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
            'testimonial',
            $this->testimonial->approved()->inRandomOrder()->first()
        );
    }
}
