<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Press;
use Carbon\Carbon;

class PressSidebarComposer
{

    protected $press;
    protected $post_categories;

    /**
     * Create a new profile composer.
     *
     * @param  UserRepository  $users
     * @return void
     */
    public function __construct(Press $press)
    {
        // Dependencies automatically resolved by service container...
        $this->press = $press;
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('latest_posts', $this->press->orderBy('date', 'desc')->take(3)->get());
        $view->with('tags', $this->press->allTags());
        $view->with('archive_dates', $this->press->all()->map(function ($p) {
            return Carbon::parse($p->date);
        })->unique(function ($v) {
            return $v->format('m y');
        })->sortByDesc(function ($d) {
            return $d;
        })->values()->all());
    }
}
