@extends('layouts.public')

@section('content')
  <div id="page-content" class="container">
      <!-- blog content + sidebar -->
      <section id="blog">
          <div class="row">
              <!-- blog content area -->
              <div class="col-sm-8 col-md-9">


                  <div class="space-50">&nbsp;</div>

                  <div class="blog block post-content-area">
                      <div id="blog-carousel" class="carousel slide" data-ride="carousel">
                          <!-- wrapper for slides -->
                          <div class="carousel-inner" role="listbox">
                              <div class="item active">
                                  <img src="images/blog-post.jpg" alt="">
                              </div>
                              <div class="item">
                                  <img src="images/blog-post.jpg" alt="">
                              </div>
                              <div class="item">
                                  <img src="images/blog-post.jpg" alt="">
                              </div>
                          </div>
                          <!-- / wrapper for slides -->

                          <!-- controls -->
                          <a class="left carousel-control" href="#blog-carousel" role="button" data-slide="prev">
                              <span class="lnr lnr-chevron-left" aria-hidden="true"></span>
                          </a>
                          <a class="right carousel-control" href="#blog-carousel" role="button" data-slide="next">
                              <span class="lnr lnr-chevron-right" aria-hidden="true"></span>
                          </a>
                          <!-- / controls -->

                      </div><!-- / blog-carousel -->
                      <div class="post-info-box">
                          <h3>SLIDER POST</h3>
                          <p class="post-meta">Posted by <a href="#">Admin</a> in <a href="#">Design</a> on <a href="#">Nov. 16, 2016</a></p>
                          <p>Pellentesque pretium at justo iaculis vehicula. Aenean vestibulum purus a nulla sollicitudin molestie. Maecenas bibendum erat in erat maximus, vel imperdiet leo mattis. Integer vitae pellentesque massa. Fusce ac suscipit neque. Etiam justo risus, tristique id feugiat a, venenatis sed justo. Mauris aliquam venenatis nulla, et tincidunt enim fermentum ut. Aliquam mattis molestie est id condimentum.</p>
                          <p>Nam porta lectus nec magna ullamcorper egestas eget at ex. In sit amet dolor vitae felis condimentum rutrum eget ut neque. Curabitur sagittis quam sodales, consequat urna sit amet, porta mi.</p>
                          <p class="blog-post-footer">
                              <a href="single-post.html" class="btn btn-primary-filled"><span>Read More</span><i class="fa fa-long-arrow-right"></i></a>
                              <span class="post-icons pull-right">
                                  <a href="#x"><i class="lnr lnr-thumbs-up"></i></a>
                                  <a href="#x"><i class="lnr lnr-bubble"></i></a>
                              </span>
                          </p><!-- / blog-post-footer -->
                      </div><!-- / post-info-box -->
                  </div><!-- / blog-block -->

                  <div class="space-50">&nbsp;</div>

                  <div class="blog block post-content-area">
                      <div class="embed-responsive embed-responsive-16by9">
                          <iframe src="https://player.vimeo.com/video/47845783" allowfullscreen></iframe>
                      </div>
                      <div class="post-info-box">
                          <h3>VIDEO POST</h3>
                          <p class="post-meta">Posted by <a href="#">Admin</a> in <a href="#">Videography</a> on <a href="#">Nov. 15, 2016</a></p>
                          <p>Pellentesque pretium at justo iaculis vehicula. Aenean vestibulum purus a nulla sollicitudin molestie. Maecenas bibendum erat in erat maximus, vel imperdiet leo mattis. Integer vitae pellentesque massa. Fusce ac suscipit neque. Etiam justo risus, tristique id feugiat a, venenatis sed justo. Mauris aliquam venenatis nulla, et tincidunt enim fermentum ut. Aliquam mattis molestie est id condimentum.</p>
                          <p>Nam porta lectus nec magna ullamcorper egestas eget at ex. In sit amet dolor vitae felis condimentum rutrum eget ut neque. Curabitur sagittis quam sodales, consequat urna sit amet, porta mi.</p>
                          <p class="blog-post-footer">
                              <a href="single-post.html" class="btn btn-primary-filled"><span>Read More</span><i class="fa fa-long-arrow-right"></i></a>
                              <span class="post-icons pull-right">
                                  <a href="#x"><i class="lnr lnr-thumbs-up"></i></a>
                                  <a href="#x"><i class="lnr lnr-bubble"></i></a>
                              </span>
                          </p><!-- / blog-post-footer -->
                      </div><!-- / post-info-box -->
                  </div><!-- / blog-block -->

              </div><!-- / col-sm-8 col-md-9 -->
              <!-- / blog content area -->

              <!-- blog sidebar area -->
              <div class="col-sm-4 col-md-3 blog-sidebar">
                  <div class="blog block about-sidebar-widget">
                      <img src="images/author.jpg" alt="">
                      <h4>AUTHOR</h4>
                      <p>Aenean vestibulum purus a nulla sollicitudin molestie. Maecenas bibendum erat in erat maximus.</p>
                  </div><!-- about-sidebar-widget -->

                  <div class="space-50">&nbsp;</div>

                  <div class="blog block categories-sidebar-widget">
                      <h4>CATEGORIES</h4>
                      <div class="post-category">
                          <a href="#">Blog <span class="pull-right">(3)</span></a>
                      </div><!-- / post-category -->

                      <div class="post-category">
                          <a href="#">Photography <span class="pull-right">(7)</span></a>
                      </div><!-- / post-category -->

                      <div class="post-category">
                          <a href="#">Travel <span class="pull-right">(2)</span></a>
                      </div><!-- / post-category -->

                      <div class="post-category">
                          <a href="#">Videography <span class="pull-right">(3)</span></a>
                      </div><!-- / post-category -->
                  </div><!-- / categories-sidebar-widget -->

                  <div class="space-50">&nbsp;</div>

                  <div class="blog block blog-posts-widget">
                      <div class="widget-title">
                          <h4>RECENT POSTS</h4>
                      </div>
                      <div class="blog-posts-small">
                          <div class="blog-post-small first-post">
                              <img src="images/post-small.jpg" alt="">
                              <a href="#">Post #1</a>
                              <p>Posted on <a href="#" class="post-date">Nov. 17, 2016</a></p>
                          </div>
                          <div class="blog-post-small last-post">
                              <img src="images/post-small.jpg" alt="">
                              <a href="#">Post #2</a>
                              <p>Posted on <a href="#" class="post-date">Nov. 01, 2016</a></p>
                          </div>
                      </div>
                  </div><!-- / blog-posts-widget -->

                  <div class="space-50">&nbsp;</div>

                  <div class="blog block tags-sidebar-widget">
                      <div class="widget-title">
                          <h4>TAGS CLOUD</h4>
                      </div>
                      <p>
                          <a href="#" class="btn btn-xs btn-primary-filled">Blog</a>
                          <a href="#" class="btn btn-xs btn-primary-filled">Travel</a>
                          <a href="#" class="btn btn-xs btn-primary-filled">Design</a>
                          <a href="#" class="btn btn-xs btn-primary-filled">Videography</a>
                          <a href="#" class="btn btn-xs btn-primary-filled">Tutorials</a>
                      </p>
                  </div><!-- about-sidebar-widget -->

              </div><!-- / col-sm-4 col-md-3 -->
              <!-- / blog sidebar area -->
          </div><!-- / row -->
      </section>
      <!-- / blog content + sidebar -->

      <!-- pagination -->
      <div class="pagination">
          <a href="#x" class="btn btn-direction btn-default-filled"><i class="fa fa-long-arrow-left"></i><span>Previous Page</span></a>
          <a href="#x" class="btn btn-direction btn-default-filled pull-right"><span>Next Page</span><i class="fa fa-long-arrow-right"></i></a>
      </div><!-- / pagination -->

  </div><!-- / container -->
@endsection
