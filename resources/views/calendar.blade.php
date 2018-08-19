<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }
            .card {
              border: 1px solid;
              min-height: 300px;
              display: flex;
              flex-direction: column;
            }
            .card > * {
              display: flex;
              flex-flow: column wrap;
              justify-content: center;
              flex: 1 1 50%;
              width: 33.33%;
              text-align: center;
            }
            div[class^="event"]{
              margin:auto;
              width: 100%;
            }
            .event-1 {
              background: rgba(124, 187, 145, .4)
            }
            .event-2 {
              background: rgba(81, 94, 145, .4)
            }
            .header {
              display:flex;
              flex-direction: row;
              justify-content: center;
              align-items: center;
            }
            .header > * {
              width: 33%;
            }
            .search-by {
              width: 25%;
              border: 1px solid #333;
              margin: 15px;
              height: 40px;
              display: flex;
              justify-content: center;
              align-items: center;
            }
            .search-by .glyphicon {
              left: 50px;
            }
            .location-filter {
              align-self: flex-start;
            }
          #map {
            height: 300px;
            width: 100vw;
          }
          html, body {
            height: 100%;
            margin: 0;
            padding: 0;
          }

        </style>
        <link rel="stylesheet" href="{{mix('css/app.css')}}" />
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @if (Auth::check())
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ url('/login') }}">Login</a>
                        <a href="{{ url('/Call to Action') }}">Call to Action</a>
                    @endif
                </div>
            @endif

            <div class="content">
              <div id="map"></div>
              <div class="">
                <div class="header">
                  <div class="search-by location-filter">
                    Filter By Location
                    <span class="glyphicon glyphicon-chevron-down pull-right"></span>
                  </div>
                  <div>
                    <h1>Calendar</h1>
                  </div>
                  <div class="search-by date-filter">
                    Filter By Upcoming Date
                    <span class="glyphicon glyphicon-chevron-down pull-right"></span>
                  </div>
                </div>

                <div class="container-fluid">
                  <div class="row">
                    <div class="col-md-3">
                      <h3>April 2017</h3>
                      <div class="card">
                        <div class="event-1">
                          <div class="row">
                            <div class="col-md-6">
                              <h4>Trip 1</h4>
                              <h5>Location</h5>
                              <h5>Exact Date</h5>
                            </div>
                            <div class="col-md-6">
                              <button class="btn btn-sm btn-default">
                                Call to Action
                              </button>
                            </div>
                          </div>
                        </div>
                        <div class="event-2">
                          <div class="row">
                            <div class="col-md-6">
                              <h4>Trip 2</h4>
                              <h5>Location</h5>
                              <h5>Exact Date</h5>
                            </div>
                            <div class="col-md-6">
                              <button class="btn btn-sm btn-default">
                                Call to Action
                              </button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <h3>May 2017</h3>
                      <div class="card">
                        <div class="event-1">
                          <div class="row">
                            <div class="col-md-6">
                              <h4>Trip 1</h4>
                              <h5>Location</h5>
                              <h5>Exact Date</h5>
                            </div>
                            <div class="col-md-6">
                              <button class="btn btn-sm btn-default">
                                Call to Action
                              </button>
                            </div>
                          </div>
                        </div>
                        <div class="event-2">
                          <div class="row">
                            <div class="col-md-6">
                              <h4>Trip 2</h4>
                              <h5>Location</h5>
                              <h5>Exact Date</h5>
                            </div>
                            <div class="col-md-6">
                              <button class="btn btn-sm btn-default">
                                Call to Action
                              </button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <h3>June 2017</h3>
                      <div class="card">
                        <div class="event-1">
                          <div class="row">
                            <div class="col-md-6">
                              <h4>Trip 1</h4>
                              <h5>Location</h5>
                              <h5>Exact Date</h5>
                            </div>
                            <div class="col-md-6">
                              <button class="btn btn-sm btn-default">
                                Call to Action
                              </button>
                            </div>
                          </div>
                        </div>
                        <div class="event-2">
                          <div class="row">
                            <div class="col-md-6">
                              <h4>Trip 2</h4>
                              <h5>Location</h5>
                              <h5>Exact Date</h5>
                            </div>
                            <div class="col-md-6">
                              <button class="btn btn-sm btn-default">
                                Call to Action
                              </button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <h3>July 2017</h3>
                      <div class="card">
                        <div class="event-1">
                          <div class="row">
                            <div class="col-md-6">
                              <h4>Trip 1</h4>
                              <h5>Location</h5>
                              <h5>Exact Date</h5>
                            </div>
                            <div class="col-md-6">
                              <button class="btn btn-sm btn-default">
                                Call to Action
                              </button>
                            </div>
                          </div>
                        </div>
                        <div class="event-2">
                          <div class="row">
                            <div class="col-md-6">
                              <h4>Trip 2</h4>
                              <h5>Location</h5>
                              <h5>Exact Date</h5>
                            </div>
                            <div class="col-md-6">
                              <button class="btn btn-sm btn-default">
                                Call to Action
                              </button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-3">
                      <h3>August 2017</h3>
                      <div class="card">
                        <div class="event-1">
                          <div class="row">
                            <div class="col-md-6">
                              <h4>Trip 1</h4>
                              <h5>Location</h5>
                              <h5>Exact Date</h5>
                            </div>
                            <div class="col-md-6">
                              <button class="btn btn-sm btn-default">
                                Call to Action
                              </button>
                            </div>
                          </div>
                        </div>
                        <div class="event-2">
                          <div class="row">
                            <div class="col-md-6">
                              <h4>Trip 2</h4>
                              <h5>Location</h5>
                              <h5>Exact Date</h5>
                            </div>
                            <div class="col-md-6">
                              <button class="btn btn-sm btn-default">
                                Call to Action
                              </button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <h3>September 2017</h3>
                      <div class="card">
                        <div class="event-1">
                          <div class="row">
                            <div class="col-md-6">
                              <h4>Trip 1</h4>
                              <h5>Location</h5>
                              <h5>Exact Date</h5>
                            </div>
                            <div class="col-md-6">
                              <button class="btn btn-sm btn-default">
                                Call to Action
                              </button>
                            </div>
                          </div>
                        </div>
                        <div class="event-2">
                          <div class="row">
                            <div class="col-md-6">
                              <h4>Trip 2</h4>
                              <h5>Location</h5>
                              <h5>Exact Date</h5>
                            </div>
                            <div class="col-md-6">
                              <button class="btn btn-sm btn-default">
                                Call to Action
                              </button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <h3>October 2017</h3>
                      <div class="card">
                        <div class="event-1">
                          <div class="row">
                            <div class="col-md-6">
                              <h4>Trip 1</h4>
                              <h5>Location</h5>
                              <h5>Exact Date</h5>
                            </div>
                            <div class="col-md-6">
                              <button class="btn btn-sm btn-default">
                                Call to Action
                              </button>
                            </div>
                          </div>
                        </div>
                        <div class="event-2">
                          <div class="row">
                            <div class="col-md-6">
                              <h4>Trip 2</h4>
                              <h5>Location</h5>
                              <h5>Exact Date</h5>
                            </div>
                            <div class="col-md-6">
                              <button class="btn btn-sm btn-default">
                                Call to Action
                              </button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <h3>November 2017</h3>
                      <div class="card">
                        <div class="event-1">
                          <div class="row">
                            <div class="col-md-6">
                              <h4>Trip 1</h4>
                              <h5>Location</h5>
                              <h5>Exact Date</h5>
                            </div>
                            <div class="col-md-6">
                              <button class="btn btn-sm btn-default">
                                Call to Action
                              </button>
                            </div>
                          </div>
                        </div>
                        <div class="event-2">
                          <div class="row">
                            <div class="col-md-6">
                              <h4>Trip 2</h4>
                              <h5>Location</h5>
                              <h5>Exact Date</h5>
                            </div>
                            <div class="col-md-6">
                              <button class="btn btn-sm btn-default">
                                Call to Action
                              </button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
    </body>
    <script>
      var map;
      function initMap() {
         var styledMapType = new google.maps.StyledMapType( [{"featureType":"all","elementType":"geometry.fill","stylers":[{"weight":"2.00"}]},{"featureType":"all","elementType":"geometry.stroke","stylers":[{"color":"#9c9c9c"}]},{"featureType":"all","elementType":"labels.text","stylers":[{"visibility":"on"}]},{"featureType":"landscape","elementType":"all","stylers":[{"color":"#f2f2f2"}]},{"featureType":"landscape","elementType":"geometry.fill","stylers":[{"color":"#ffffff"}]},{"featureType":"landscape.man_made","elementType":"geometry.fill","stylers":[{"color":"#ffffff"}]},{"featureType":"poi","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"road","elementType":"all","stylers":[{"saturation":-100},{"lightness":45}]},{"featureType":"road","elementType":"geometry.fill","stylers":[{"color":"#eeeeee"}]},{"featureType":"road","elementType":"labels.text.fill","stylers":[{"color":"#7b7b7b"}]},{"featureType":"road","elementType":"labels.text.stroke","stylers":[{"color":"#ffffff"}]},{"featureType":"road.highway","elementType":"all","stylers":[{"visibility":"simplified"}]},{"featureType":"road.arterial","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"water","elementType":"all","stylers":[{"color":"#46bcec"},{"visibility":"on"}]},{"featureType":"water","elementType":"geometry.fill","stylers":[{"color":"#c8d7d4"}]},{"featureType":"water","elementType":"labels.text.fill","stylers":[{"color":"#070707"}]},{"featureType":"water","elementType":"labels.text.stroke","stylers":[{"color":"#ffffff"}]}]);
        map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: 50, lng: 0},
          zoom: 3,
        });
        map.mapTypes.set('styled_map', styledMapType);
        map.setMapTypeId('styled_map');
      }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD1M641lo9pBwM5PBV7jZcRrUBj-fDH4lM&callback=initMap"
    async defer></script>
    <script src="{{mix('js/app.js')}}"></script>
</html>
