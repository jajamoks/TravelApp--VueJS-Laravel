<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\PostCategory;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Carbon\Carbon;
use MetaTag;

class BlogController extends Controller
{
    /**
     * Show the home page.
     *
     * @return Response
     */
    public function showIndex()
    {
        $posts = Post::published()
                    ->with('user', 'post_category')
                    ->orderBy('published_date', 'desc')
                    ->paginate(10);

        return view('pages.blog.index', [
            'title' => 'Blog',
            'posts' => $posts
        ]);
    }

    /**
     * Show the posts
     *
     * @return Response
     */
    public function showPosts()
    {
        $categorySlug = request()->route()->parameter('category');
        if ($categorySlug) {
            $category = PostCategory::where('slug', $categorySlug)->firstOrFail();

            $posts = Post::published()
                        ->where('post_category_id', $category->id)
                        ->with('user', 'post_category')
                        ->orderBy('published_date', 'desc')
                        ->paginate(10);

            return view('pages.blog.index', [
                'title' => "Blog - $category->title",
                'category' => $category->title,
                'posts' => $posts
            ]);
        } else {
            return $this->showIndex();
        }
    }

    /**
     * Show the posts
     * @param string
     * @return Response
     */
    public function showPostsByTag($tag)
    {
        $posts = Post::published()
                    ->withAnyTags($tag)
                    ->orderBy('published_date', 'desc')
                    ->simplePaginate(10);

        if ($posts->count() === 0) {
            throw new ModelNotFoundException;
        }
        return view('pages.blog.index', [
            'title' => ucwords($tag),
            'category' => ucwords($tag),
            'posts' => $posts
        ]);
    }

    /**
     * Show archive posts
     *
     * @return Response
     */
    public function showArchivePosts($year, $month)
    {
        $posts = Post::published()
                    ->whereMonth('published_date', $month)
                    ->whereYear('published_date', $year)
                    ->orderBy('published_date', 'desc')
                    ->paginate(10);

        if ($posts->count() === 0) {
            throw new ModelNotFoundException;
        }

        return view('pages.blog.index', [
            'title' => Carbon::create($year, $month)->format('F Y'),
            'category' => Carbon::create($year, $month)->format('F Y'),
            'posts' => $posts
        ]);
    }

    /**
     * Show the posts
     *
     * @return Response
     */
    public function showPost($slug)
    {
        $post = Post::published()
                    ->where('slug', $slug)
                    ->with('user', 'post_category')
                    ->orderBy('published_date', 'desc')
                    ->firstOrFail();
        MetaTag::set('title', $post->title);
        MetaTag::set('image', $post->featured_image);
        MetaTag::set('description', $post->summary);
        return view('pages.blog.post', [
            'title' => $post->title,
            'category' => $post->post_category->title,
            'post' => $post
        ]);
    }

    /**
     * Search the posts
     *
     * @return Response
     */
    public function search()
    {
        $term = trim(request()->input('search'));
        $posts = Post::published()
                    ->searchByKeyword($term)
                    ->orderBy('published_date', 'desc')
                    ->get();

        return view('pages.blog.index', [
            'title' => 'Search',
            'category' => "Search: ". $this->trimSearchTermForDisplay($term),
            'posts' => $posts
        ]);
    }

    /**
     * Trims long search terms
     *
     * @param $term string
     * @return string
     */

    private function trimSearchTermForDisplay(String $term)
    {
        if (strlen($term) <  25) {
            return $term;
        }
        return substr($term, 0, 25) . "...";
    }

}
