<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\PostCategory;
use App\Post;
use Carbon\Carbon;

class BlogSidebarComposer
{

    protected $posts;
    protected $post_categories;

    /**
     * Create a new profile composer.
     *
     * @param  UserRepository  $users
     * @return void
     */
    public function __construct(Post $posts, PostCategory $post_categories)
    {
        // Dependencies automatically resolved by service container...
        $this->post_categories = $post_categories;
        $this->posts = $posts;
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('latest_posts', $this->posts->published()->orderBy('published_date', 'desc')->take(3)->get());
        $view->with('categories', $this->post_categories->get());
        $view->with('tags', $this->posts->allTags());
        $view->with('archive_dates', $this->posts->all()->map(function ($p) {
            return Carbon::parse($p->published_date);
        })->unique(function ($v) {
            return $v->format('m y');
        })->sortByDesc(function ($d) {
            return $d;
        })->values()->all());
    }
}
