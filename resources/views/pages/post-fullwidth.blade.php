@extends('layouts.public')

@section('content')
  <div id="page-content" class="container">
      <!-- post full-width -->
      <section id="blog">
          <div class="row">
              <!-- post content area -->
              <div class="col-xs-12">
                  <div class="blog block post-content-area">
                      <img src="images/blog-post.jpg" alt="">
                      <div class="post-info-box">
                          <h3>FULLWIDTH POST</h3>
                          <p class="post-meta">Posted by <a href="#">Admin</a> in <a href="#">Blog</a> on <a href="#">Dec. 18, 2016</a></p>
                          <p>Pellentesque pretium at justo iaculis vehicula. Aenean vestibulum purus a nulla sollicitudin molestie. Maecenas bibendum erat in erat maximus, vel imperdiet leo mattis. Integer vitae pellentesque massa. Fusce ac suscipit neque. Etiam justo risus, tristique id feugiat a, venenatis sed justo. Mauris aliquam venenatis nulla, et tincidunt enim fermentum ut. Aliquam mattis molestie est id condimentum.</p>
                          <blockquote>Nam porta lectus nec magna ullamcorper egestas eget at ex. In sit amet dolor vitae felis condimentum rutrum eget ut neque. Curabitur sagittis quam sodales, consequat urna sit amet, porta mi.</blockquote>
                          <p>Etiam pharetra pellentesque odio, id porttitor augue varius vel. Phasellus ut dui sit amet justo ullamcorper volutpat non at diam. Nunc a sapien et dui convallis pulvinar. Aenean nec molestie tortor, ut porttitor arcu. Cras eu lectus ultrices, tristique nisi ac, viverra diam. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. In sit amet dictum nibh. Duis sem purus, mollis nec dictum eget, pellentesque at quam. Donec metus mi, ornare eu consequat sit amet, hendrerit tincidunt lacus.</p>
                          <div class="media">
                              <div class="media-left">
                                  <a href="#">
                                      <img class="media-object" src="images/content-img-small.jpg" alt="">
                                  </a>
                              </div><!-- media-alignment -->
                              <div class="media-body">
                                  <h4 class="media-heading">IMAGE ALIGNED LEFT</h4>
                                  <p>Etiam pharetra pellentesque odio, id porttitor augue varius vel. Phasellus ut dui sit amet justo ullamcorper volutpat non at diam. Nunc a sapien et dui convallis pulvinar. Aenean nec molestie tortor, ut porttitor arcu. Cras eu lectus ultrices, tristique nisi ac, viverra diam. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. In sit amet dictum nibh. Duis sem purus, mollis nec dictum eget, pellentesque at quam. Donec metus mi, ornare eu consequat sit amet, hendrerit tincidunt lacus. Donec dignissim dolor lorem, a gravida enim convallis vitae. Donec orci metus, sodales a diam ut, maximus posuere odio.</p>
                              </div><!-- / media-body -->
                          </div><!-- / media -->

                          <div class="media">
                              <div class="media-right">
                                  <a href="#">
                                      <img class="media-object" src="images/content-img-small.jpg" alt="">
                                  </a>
                              </div><!-- media-alignment -->
                              <div class="media-body">
                                  <h4 class="media-heading">IMAGE ALIGNED RIGHT</h4>
                                  <p>Etiam pharetra pellentesque odio, id porttitor augue varius vel. Phasellus ut dui sit amet justo ullamcorper volutpat non at diam. Nunc a sapien et dui convallis pulvinar. Aenean nec molestie tortor, ut porttitor arcu. Cras eu lectus ultrices, tristique nisi ac, viverra diam. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. In sit amet dictum nibh. Duis sem purus, mollis nec dictum eget, pellentesque at quam. Donec metus mi, ornare eu consequat sit amet, hendrerit tincidunt lacus. Donec dignissim dolor lorem, a gravida enim convallis vitae. Donec orci metus, sodales a diam ut, maximus posuere odio.</p>
                              </div><!-- / media-body -->
                          </div><!-- / media -->

                      </div><!-- / post-info-box -->
                  </div><!-- / blog-block -->

                  <div class="comments">
                      <h4>COMMENTS (4)</h4>
                      <ul class="media-list">
                          <li class="media">
                              <div class="media-left">
                                  <a href="#">
                                      <img class="media-object" alt="" src="images/user-img.jpg">
                                  </a>
                              </div>
                              <div class="media-body">
                                  <div class="comment-info">
                                      <div class="comment-date">Nov. 19, 2016</div>
                                      <div class="comment-author"><a href="#">John Doe</a></div>
                                  </div><!-- / comment-info -->
                                  <div class="comment">
                                      <p>Duis arcu ipsum, lacinia nec diam euismod, sagittis fringilla nisl. Ut ultricies eu velit sit amet mollis. Aliquam maximus justo vestibulum felis posuere. Sed a sagittis metus, sit amet sodales.</p>
                                      <a href="#" class="comment-log-in">Log In to Reply</a>
                                  </div><!-- / comment -->

                                  <!-- nested media objects -->
                                  <div class="media">
                                      <div class="media-left">
                                          <a href="#">
                                              <img class="media-object" alt="" src="images/user-img.jpg">
                                          </a>
                                      </div>
                                      <div class="media-body">
                                          <div class="comment-info">
                                              <div class="comment-date">Nov. 19, 2016</div>
                                              <div class="comment-author"><a href="#">James Doe</a></div>
                                          </div><!-- / comment-info -->
                                          <div class="comment">
                                              <p>Aliquam auctor vestibulum risus sed dignissim. Suspendisse potenti. Duis nec ante a dui euismod finibus non in magna. Aliquam neque arcu, eleifend vitae cursus eget, vulputate vel leo.</p>
                                              <a href="#" class="comment-log-in">Log In to Reply</a>
                                          </div><!-- / comment -->


                                          <!-- nested media object -->
                                          <div class="media">
                                              <div class="media-left">
                                                  <a href="#">
                                                      <img class="media-object" alt="" src="images/user-img.jpg">
                                                  </a>
                                              </div>
                                              <div class="media-body">
                                                  <div class="comment-info">
                                                      <div class="comment-date">Nov. 19, 2016</div>
                                                      <div class="comment-author"><a href="#">Admin</a></div>
                                                  </div><!-- / comment-info -->
                                                  <div class="comment">
                                                      <p>Donec tristique dui et luctus pulvinar. Nullam auctor pulvinar dui. Vestibulum ac eleifend risus. Proin ultricies odio eros, ac varius mauris tincidunt et.</p>
                                                      <a href="#" class="comment-log-in">Log In to Reply</a>
                                                  </div><!-- / comment -->
                                              </div><!-- / media-body -->
                                          </div><!-- / nested media object -->
                                      </div><!-- / nested media objects media-body -->
                                  </div><!-- / nested media objects media -->

                                  <!-- nested media object -->
                                  <div class="media">
                                      <div class="media-left">
                                          <a href="#">
                                              <img class="media-object" alt="" src="images/user-img.jpg">
                                          </a>
                                      </div><!-- / media-object -->
                                      <div class="media-body">
                                          <div class="comment-info">
                                              <div class="comment-date">Nov. 19, 2016</div>
                                              <div class="comment-author"><a href="#">Johanna Doe</a></div>
                                          </div><!-- / comment-info -->
                                          <div class="comment">
                                              <p>Phasellus suscipit vehicula augue semper tristique. Cras scelerisque congue lorem et tristique. Nunc sit amet nulla non turpis semper maximus ut quis ex.</p>
                                              <a href="#" class="comment-log-in">Log In to Reply</a>
                                          </div><!-- / comment -->
                                      </div><!-- / media-body -->
                                  </div><!-- / nested media object -->

                              </div><!-- / parent media-body -->
                          </li><!-- / media -->
                      </ul><!-- / media-list -->

                      <!-- comment form -->
                      <div id="comment-form">
                          <form id="commentForm" data-toggle="validator">
                              <h4 class="space-left space-bottom-2x">LEAVE A COMMENT</h4>
                              <div class="row">
                                  <div class="col-sm-6">
                                      <div class="form-group">
                                          <input type="text" class="form-control" id="name" placeholder="NAME" required>
                                      </div>
                                      <div class="form-group">
                                          <input type="email" class="form-control" id="email" placeholder="EMAIL" required>
                                      </div>
                                      <div class="form-group">
                                          <input type="text" class="form-control" id="website" placeholder="WEBSITE">
                                      </div>
                                  </div>
                                  <div class="col-sm-6">
                                      <div class="form-group">
                                          <textarea id="message" class="form-control" rows="5" placeholder="MESSAGE" required></textarea>
                                      </div>
                                      <button type="submit" id="form-submit" class="btn btn-md btn-primary-filled btn-form-submit"><strong>POST COMMENT</strong></button>
                                  </div>
                              </div><!-- / row -->
                          </form>
                      </div>
                      <!-- / comment form -->
                  </div><!-- / comments -->

              </div><!-- / col-sm-8 col-md-9 -->
              <!-- / post content area -->


          </div><!-- / row -->
      </section>
      <!-- / post full-width -->

  </div><!-- / container -->
@endsection
