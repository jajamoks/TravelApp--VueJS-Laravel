<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function boot()
    {
        // Using class based composers...
        View::composer(
            'pages.blog.sidebar',
            'App\Http\ViewComposers\BlogSidebarComposer'
        );
        View::composer(
            'pages.press.sidebar',
            'App\Http\ViewComposers\PressSidebarComposer'
        );
        View::composer(
            'partials.header',
            'App\Http\ViewComposers\HeaderComposer'
        );
        View::composer(
            'partials.featured-escapes',
            'App\Http\ViewComposers\FeaturedEscapesComposer'
        );
        View::composer(
            'partials.sidemenu-full',
            'App\Http\ViewComposers\SideMenuComposer'
        );
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
