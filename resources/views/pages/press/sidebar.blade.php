<!--<div class="card card-primary animated fadeInDown animation-delay-4">
    <div class="card-header">
        <h3 class="card-title">
            <i class="zmdi zmdi-apps"></i> Search</h3>
    </div>
    <div class="card-block">

    </div>
</div> -->
<style>
    #blog .blog-post-small.first-post{overflow: hidden; padding: 10px 0;}

</style>


<div class="col-sm-4 col-md-3 blog-sidebar escape-sticky-sidebar">
    <div class="blog block about-sidebar-widget">
        <h4>SEARCH</h4>
        <form action="/press/search" method="post">
            {{ csrf_field() }}
            <div class="input-group">
                <input type="text" placeholder="Search..." class="form-control" name="search">
                <span class="input-group-btn">
						<button class="btn btn-primary-filled e2s-input-grp-btn" type="submit" id="searchSubmit" name="submit">
							<i class="fa fa-search no-margin-right"></i>
						</button>
					</span>
            </div>
        </form>
    </div>

    <div class="blog block blog-posts-widget margin-top">
        <div class="widget-title">
            <h4>RECENT PRESS</h4>
        </div>
        <div class="blog-posts-small">
            @foreach($latest_posts as $latest)
                <div class="blog-post-small first-post">
                    <img src="{{ $latest->getImage(120) }}" alt="{{ $latest->title }}" />
                    <a href="/press/{{ $latest->slug }}">{{ $latest->title }}</a>
                    <p>Posted on <a href="#" class="post-date">{{ $latest->display_date }}</a></p>
                </div>
            @endforeach
        </div>
    </div>
    <div class="blog block tags-sidebar-widget margin-top">
        <div class="widget-title">
            <h4>TAGS</h4>
        </div>
        <p>
            @foreach($tags as $tag)
                @if($tag)
                <a href="/press/tags/{{ $tag }}" class="btn btn-xs btn-primary-filled">{{ $tag }}</a>
                @endif
            @endforeach
        </p>
    </div>
</div>
