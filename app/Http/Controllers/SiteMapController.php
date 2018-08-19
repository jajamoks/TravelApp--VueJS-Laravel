<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Carbon\Carbon;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;
use Route;
use App\{
    Escape,
    Post,
    PostCategory,
    Press
};

class SiteMapController extends Controller
{
    public function index()
    {
        $namedRoutes = collect(Route::getRoutes()->getIterator())->filter(function($r) {
            $name = $r->getName();
            if(!$name) return false;
            return strpos($name, 'public') !== false && strpos($r->uri(), '{') === false;
        });
        $sitemap = Sitemap::create();
        $namedRoutes->each(function($route) use ($sitemap) {
            $item = $this->createLink(
                secure_url($route->uri()),
                Carbon::now(),
                '1.0',
                'always'
            );
           $sitemap->add($item);
        });
        $this->generateBlogMap()->each(function($item) use ($sitemap) {
            $sitemap->add($item);
        });
        $this->generateEscapesMap()->each(function($item) use ($sitemap) {
            $sitemap->add($item);
        });
        $this->generatePressMap()->each(function($item) use ($sitemap){
            $sitemap->add($item);
        });
        return response($sitemap->render())->header('Content-Type', 'text/xml');
    }

    private function generateBlogMap()
    {
        $posts = Post::published()->orderBy('published_date', 'desc')->get();
        $categories = PostCategory::all();
        $tags = Post::allTags();
        $dates = $posts->map(function ($p) {
            return Carbon::parse($p->published_date);
        })->unique(function ($v) {
            return $v->format('m y');
        })->sortByDesc(function ($d) {
            return $d;
        });
        $postMap = $posts->map(function($p) {
            return $this->createLink(
                secure_url('/blog/'. $p->slug),
                $p->updated_at,
                .8,
                'always'
            );
        });
        $tagsMap = collect($tags)->map(function($t) {
            return $this->createLink(
                secure_url('/blog/tags/'. $t),
                Carbon::now(),
                .63,
                'always'
            );
        });
        $categoriesMap = $categories->map(function($c) {
            return $this->createLink(
                secure_url('/blog/category/'. $c->slug),
                Carbon::now(),
                .63,
                'always'
            );
        });
        $archiveMap = $dates->map(function($date) {
            return $this->createLink(
                secure_url('/blog/archive/'. $date->format('Y/m')),
                Carbon::now(),
                .63,
                'always'
            );
        });
        return $postMap->concat($tagsMap)->concat($categoriesMap)->concat($archiveMap);
    }


    private function generateEscapesMap()
    {
        $escapes = Escape::sorted()->valid()->Get();
        return $escapes->map(function($e) {
            return $this->createLink(
                secure_url('/escapes/'. $e->slug),
                $e->updated_at,
                1,
                'always'
            );
        });
    }

    private function generatePressMap()
    {
        $press = Press::sorted()->get();
        return $press->map(function($e) {
            return $this->createLink(
                secure_url('/press/'. $e->slug),
                $e->updated_at,
                .8,
                'always'
            );
        });
    }

    private function createLink($url, $lastmod, $priority, $freq)
    {
        return Url::create($url)
        ->setLastModificationDate($lastmod)
        ->setChangeFrequency($freq)
        ->setPriority($priority);
    }
}
