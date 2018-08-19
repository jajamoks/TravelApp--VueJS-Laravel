@extends('layouts.public')

@section('content')
  <section id="blog-masonry">
      <div class="container">
          <div id="grid" class="row">

              <!-- post-block -->
              <div class="col-sm-4">
                  <div class="post-block">
                      <a href="single-post.html"><img src="images/post-img.jpg" alt=""></a>
                      <div class="small-post-text">
                          <h5><a href="single-post.html">SINGLE POST</a></h5>
                          <p class="small-post-meta">AUG 16, 2016</p>
                          <p class="space-bottom">Suspendisse in mattis neque, sed accumsan erat. Maecenas eget metus dui. Vestibulum accumsan massa quam...</p>
                          <p class="small-post-footer">
                              <a href="single-post.html">READ MORE</a>
                              <span class="post-icons pull-right">
                                  <a href="#x"><i class="lnr lnr-thumbs-up"></i></a>
                                  <a href="#x"><i class="lnr lnr-bubble"></i></a>
                              </span>
                          </p>
                      </div><!-- / small-post-text -->
                  </div><!-- / post-block -->
              </div><!-- / col-md-4 -->
              <!-- / post-block -->

              <!-- post-block -->
              <div class="col-sm-4">
                  <div class="post-block">
                      <div class="embed-responsive embed-responsive-16by9">
                          <iframe src="https://player.vimeo.com/video/47845783" allowfullscreen></iframe>
                      </div>
                      <div class="small-post-text">
                          <h5><a href="single-post-full.html">VIDEO POST</a></h5>
                          <p class="small-post-meta">AUG 16, 2016</p>
                          <p class="space-bottom">Suspendisse in mattis neque, sed accumsan erat. Maecenas eget metus dui. Vestibulum accumsan massa quam. Donec in erat lacinia, vehicula eros eget, auctor turpis. Phasellus eu nibh fringilla consectetur sit amet quis dolor...</p>
                          <p class="small-post-footer">
                              <a href="single-post-full.html">READ MORE</a>
                              <span class="post-icons pull-right">
                                  <a href="#x"><i class="lnr lnr-thumbs-up"></i></a>
                                  <a href="#x"><i class="lnr lnr-bubble"></i></a>
                              </span>
                          </p>
                      </div><!-- / small-post-text -->
                  </div><!-- / post-block -->
              </div><!-- / col-md-4 -->
              <!-- / post-block -->

              <!-- post-block -->
              <div class="col-sm-4">
                  <div class="post-block">
                      <a href="single-post.html"><img src="images/post-img.jpg" alt=""></a>
                      <div class="small-post-text">
                          <h5><a href="single-post.html">POST WITH SIDEBAR</a></h5>
                          <p class="small-post-meta">AUG 16, 2016</p>
                          <p class="space-bottom">Suspendisse in mattis neque, sed accumsan erat. Maecenas eget metus dui. Vestibulum accumsan massa quam...</p>
                          <p class="small-post-footer">
                              <a href="single-post.html">READ MORE</a>
                              <span class="post-icons pull-right">
                                  <a href="#x"><i class="lnr lnr-thumbs-up"></i></a>
                                  <a href="#x"><i class="lnr lnr-bubble"></i></a>
                              </span>
                          </p>
                      </div><!-- / small-post-text -->
                  </div><!-- / post-block -->
              </div><!-- / col-md-4 -->
              <!-- / post-block -->

              <!-- post-block -->
              <div class="col-sm-4">
                  <div class="post-block slider">
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
                      <div class="small-post-text">
                          <h5><a href="single-post.html">SLIDER POST</a></h5>
                          <p class="small-post-meta">AUG 16, 2016</p>
                          <p class="space-bottom">Suspendisse in mattis neque, sed accumsan erat. Maecenas eget metus dui. Vestibulum accumsan massa quam...</p>
                          <p class="small-post-footer">
                              <a href="single-post.html">READ MORE</a>
                              <span class="post-icons pull-right">
                                  <a href="#x"><i class="lnr lnr-thumbs-up"></i></a>
                                  <a href="#x"><i class="lnr lnr-bubble"></i></a>
                              </span>
                          </p>
                      </div><!-- / small-post-text -->
                  </div><!-- / post-block -->
              </div><!-- / col-md-4 -->
              <!-- / post-block -->

              <!-- post-block -->
              <div class="col-sm-4">
                  <div class="post-block">
                      <a href="single-post-full.html"><img src="images/post-img.jpg" alt=""></a>
                      <div class="small-post-text">
                          <h5><a href="single-post-full.html">FULLWIDTH POST</a></h5>
                          <p class="small-post-meta">AUG 16, 2016</p>
                          <p class="space-bottom">Suspendisse in mattis neque, sed accumsan erat. Maecenas eget metus dui. Vestibulum accumsan massa quam...</p>
                          <p class="small-post-footer">
                              <a href="single-post-full.html">READ MORE</a>
                              <span class="post-icons pull-right">
                                  <a href="#x"><i class="lnr lnr-thumbs-up"></i></a>
                                  <a href="#x"><i class="lnr lnr-bubble"></i></a>
                              </span>
                          </p>
                      </div><!-- / small-post-text -->
                  </div><!-- / post-block -->
              </div><!-- / col-md-4 -->
              <!-- / post-block -->

              <!-- post-block -->
              <div class="col-sm-4">
                  <div class="post-block">
                      <a href="single-post.html"><img src="images/post-img.jpg" alt=""></a>
                      <div class="small-post-text">
                          <h5><a href="single-post.html">SINGLE POST 2</a></h5>
                          <p class="small-post-meta">AUG 16, 2016</p>
                          <p class="space-bottom">Suspendisse in mattis neque, sed accumsan erat. Maecenas eget metus dui. Vestibulum accumsan massa quam...</p>
                          <p class="small-post-footer">
                              <a href="single-post.html">READ MORE</a>
                              <span class="post-icons pull-right">
                                  <a href="#x"><i class="lnr lnr-thumbs-up"></i></a>
                                  <a href="#x"><i class="lnr lnr-bubble"></i></a>
                              </span>
                          </p>
                      </div><!-- / small-post-text -->
                  </div><!-- / post-block -->
              </div><!-- / col-md-4 -->
              <!-- / post-block -->

              <!-- post-block -->
              <div class="col-sm-4">
                  <div class="post-block slider">
                      <a href="single-post.html"><img src="images/post-img.jpg" alt=""></a>
                      <div class="small-post-text">
                          <h5><a href="single-post.html">SINGLE POST 3</a></h5>
                          <p class="small-post-meta">AUG 16, 2016</p>
                          <p class="space-bottom">Suspendisse in mattis neque, sed accumsan erat. Maecenas eget metus dui. Vestibulum accumsan massa quam...</p>
                          <p class="small-post-footer">
                              <a href="single-post.html">READ MORE</a>
                              <span class="post-icons pull-right">
                                  <a href="#x"><i class="lnr lnr-thumbs-up"></i></a>
                                  <a href="#x"><i class="lnr lnr-bubble"></i></a>
                              </span>
                          </p>
                      </div><!-- / small-post-text -->
                  </div><!-- / post-block -->
              </div><!-- / col-md-4 -->
              <!-- / post-block -->

              <!-- post-block -->
              <div class="col-sm-4">
                  <div class="post-block slider">
                      <div class="embed-responsive embed-responsive-16by9">
                          <iframe src="https://player.vimeo.com/video/78245147?&title=0&byline=0" allowfullscreen></iframe>
                      </div>
                      <div class="small-post-text">
                          <h5><a href="single-post.html">VIDEO POST 2</a></h5>
                          <p class="small-post-meta">AUG 16, 2016</p>
                          <p class="space-bottom">Suspendisse in mattis neque, sed accumsan erat. Maecenas eget metus dui. Vestibulum accumsan massa quam...</p>
                          <p class="small-post-footer">
                              <a href="single-post.html">READ MORE</a>
                              <span class="post-icons pull-right">
                                  <a href="#x"><i class="lnr lnr-thumbs-up"></i></a>
                                  <a href="#x"><i class="lnr lnr-bubble"></i></a>
                              </span>
                          </p>
                      </div><!-- / small-post-text -->
                  </div><!-- / post-block -->
              </div><!-- / col-md-4 -->
              <!-- / post-block -->

              <!-- post-block -->
              <div class="col-sm-4">
                  <div class="post-block slider">
                      <div id="blog-carousel-2" class="carousel slide" data-ride="carousel">
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
                          <a class="left carousel-control" href="#blog-carousel-2" role="button" data-slide="prev">
                              <span class="lnr lnr-chevron-left" aria-hidden="true"></span>
                          </a>
                          <a class="right carousel-control" href="#blog-carousel-2" role="button" data-slide="next">
                              <span class="lnr lnr-chevron-right" aria-hidden="true"></span>
                          </a>
                          <!-- / controls -->

                      </div><!-- / blog-carousel -->
                      <div class="small-post-text">
                          <h5><a href="single-post.html">SLIDER POST 2</a></h5>
                          <p class="small-post-meta">AUG 16, 2016</p>
                          <p class="space-bottom">Suspendisse in mattis neque, sed accumsan erat. Maecenas eget metus dui. Vestibulum accumsan massa quam...</p>
                          <p class="small-post-footer">
                              <a href="single-post.html">READ MORE</a>
                              <span class="post-icons pull-right">
                                  <a href="#x"><i class="lnr lnr-thumbs-up"></i></a>
                                  <a href="#x"><i class="lnr lnr-bubble"></i></a>
                              </span>
                          </p>
                      </div><!-- / small-post-text -->
                  </div><!-- / post-block -->
              </div><!-- / col-md-4 -->
              <!-- / post-block -->

          </div><!-- / row -->
      </div><!-- / container -->
  </section>
@endsection
