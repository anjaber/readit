<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Readit - Free Bootstrap 4 Template by Colorlib</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('css/open-iconic-bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/animate.css')}}">
    <link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('css/aos.css')}}">
    <link rel="stylesheet" href="{{asset('css/ionicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/flaticon.css')}}">
    <link rel="stylesheet" href="{{asset('css/icomoon.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
  </head>
  <body>
  @if(session('message'))
    <span class="alert alert-danger" style="color: salmon;"> {{session('message')}}</span>
    @endif
    
	  <nav class="navbar px-md-0 navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="/">Read<i>it</i>.</a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
              <li class="nav-item"><a href="/" class="nav-link">Home</a></li>
                <li class="nav-item active"><a href="/posts/views" class="nav-link">posts</a></li>
                <li class="nav-item"><a href="/about" class="nav-link">about Us</a></li>
                <li class="nav-item"><a href="/contact" class="nav-link">contact Us</a></li>
                <li class="nav-item"><a href="/login" class="nav-link">Login</a></li>
	        </ul>
	      </div>
	    </div>
	  </nav>
    <!-- END nav -->
    
    <section class="hero-wrap hero-wrap-2 js-fullheight" data-stellar-background-ratio="0.5" 
    style="background-image:url('{{asset('storage/'.$post->image)}}');" >

      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-center">
          <div class="col-md-9 ftco-animate pb-5 text-center">
            <h1 class="mb-3 bread">{{$post->title}}</h1>
            <p class="breadcrumbs"><span class="mr-2"><a href="/">Home <i class="ion-ios-arrow-forward"></i></a></span> <span class="mr-2"><a href="/posts/views">posts <i class="ion-ios-arrow-forward"></i></a></span> <span>Blog Single <i class="ion-ios-arrow-forward"></i></span></p>
          </div>
        </div>
      </div>
    </section>

   <section class="ftco-section ftco-degree-bg">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 ftco-animate">
          	<p class="mb-5">
              <img  src="{{ asset('storage/'.$post->image)  }}" alt="" class="img-fluid">
            </p>
           <p> 
                <h6>content</h6>
                {{$post->content}}
           </p>
           
            <div class="tag-widget post-tag-container mb-5 mt-5">
              <div class="tagcloud">
                @foreach($post->tags as $tags)
                <a href="#" class="tag-cloud-link">{{ $tags->name}}</a>
                @endforeach
              </div>
            </div>
          


            <div class="pt-5 mt-5">
              <h3 class="mb-5">@if($comment->count() > 0) {{$comment->count()}}Comments</h3>
                   
              @foreach($comment as $comm)
              <ul class="comment-list">
                <li class="comment">
                  <div class="comment-body">
                    <h3>  {{ 'Name  :'. $comm->name}}</h3>
                    <div class="meta mb-3">  {{ 'Email   :' . $comm->email}}</div>
                    <p>   {{ 'message  :' . $comm->message}}</p>
                   <!-- <p><a href="#" class="reply">Reply</a></p> -->
                  </div>
                </li>

              </ul>
              @endforeach
              @else
              {{'no comments'}}
              {{$comment->count()}}
              @endif
              <!-- END comment-list -->
              
              <div class="comment-form-wrap pt-5">
                <h3 class="mb-5">Leave a comment</h3>
                <form action="/posts/{{$post->id}}/comment" method="POST" class="p-5 bg-light">
                  @csrf 
                  <div class="form-group">
                    <label for="name">Name *</label>
                    <input name='name' type="text" class="form-control" >
                  </div>
                  <div class="form-group">
                    <label for="email">Email *</label>
                    <input  name='email' type="email" class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="website">Website</label>
                    <input  name='website' type="url" class="form-control" >
                  </div>

                  <div class="form-group">
                    <label for="message">Message</label>
                    <textarea name="message" id="message" cols="30" rows="10" class="form-control"></textarea>
                  </div>
                  <div class="form-group"> 

                  <label for="message">sure</label>
                  <input type="radio"  name="post_id" value="{{$post->id}}" required >
                  </div>

                  <div class="form-group">
                    <input type="submit" value="Post Comment" class="btn py-3 px-4 btn-primary">
                  </div>


                </form>
              </div>
            </div>

          </div> <!-- .col-md-8 -->
          <div class="col-lg-4 sidebar pl-lg-5 ftco-animate">
            <div class="sidebar-box">
              <form action="#" class="search-form">
                <div class="form-group">
                  <span class="icon icon-search"></span>
                  <input type="text" class="form-control" placeholder="Type a keyword and hit enter">
                </div>
              </form>
            </div>
            <div class="sidebar-box ftco-animate">
              <div class="categories">
                <h3>Categories</h3>
                @foreach($category as $category)
                <li><a href="/Categories/{{$category->id}}/view">{{$category->name}} 
                <span class="badge badge-light  btn btn-primary ml-2" > {{$category->posts->count() }}</span>
                <span class="ion-ios-arrow-forward"></span></a></li>
               
                @endforeach
              </div>
            </div>

          

         

            <div class="sidebar-box ftco-animate">
              <h3>Paragraph</h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus itaque, autem necessitatibus voluptate quod mollitia delectus aut, sunt placeat nam vero culpa sapiente consectetur similique, inventore eos fugit cupiditate numquam!</p>
            </div>
          </div>

        </div>
      </div>
    </section> <!-- .section -->

    <footer class="ftco-footer ftco-bg-dark ftco-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
              <h2 class="logo"><a href="/">Read<span>it</span>.</a></h2>
              <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
              <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
             <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">latest News</h2>
              <div class="block-21 mb-4 d-flex">
	              <a class="img mr-4 rounded" >
                <img class="img mr-4 rounded"  src="{{ asset('storage/'.$post->image)  }}" width="100" height="50"  > 

                </a>
	              <div class="text">
	                <h3 class="heading"><a href="/posts/{{$post->id}}/show">{{$post->title}}</a></h3>
	                <div class="meta">
	                  <div><a href="/posts/{{$post->id}}/show"></span> {{$post->created_at}}</a></div>
	                  <div><a href="/posts/{{$post->id}}/show"></span> {{$post->useronly}}</a></div>
	                
	                </div>
	              </div>
	            </div>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4 ml-md-5">
              <h2 class="ftco-heading-2">Information</h2>
              <ul class="list-unstyled">
                      <li class="nav-item"><a href="/" class="nav-link">Home</a></li>
                    <li class="nav-item active"><a href="/posts/views" class="nav-link">posts</a></li>
                    <li class="nav-item"><a href="/about" class="nav-link">about Us</a></li>
                    <li class="nav-item"><a href="/contact" class="nav-link">contact Us</a></li>
                    <li class="nav-item"><a href="/login" class="nav-link">Login</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
            	<h2 class="ftco-heading-2">Have a Questions?</h2>
            	<div class="block-23 mb-3">
	              <ul>
	                <li><span class="icon icon-map-marker"></span><span class="text">203 Fake St. Mountain View, San Francisco, California, USA</span></li>
	                <li><a href="#"><span class="icon icon-phone"></span><span class="text">+2 392 3929 210</span></a></li>
	                <li><a href="#"><span class="icon icon-envelope"></span><span class="text">info@yourdomain.com</span></a></li>
	              </ul>
	            </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 text-center">

            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart color-danger" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
          </div>
        </div>
      </div>
    </footer>
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="{{asset('js/jquery.min.js')}}"></script>
  <script src="{{asset('js/jquery-migrate-3.0.1.min.js')}}"></script>
  <script src="{{asset('js/popper.min.js')}}"></script>
  <script src="{{asset('js/bootstrap.min.js')}}"></script>
  <script src="{{asset('js/jquery.easing.1.3.js')}}"></script>
  <script src="{{asset('js/jquery.waypoints.min.js')}}"></script>
  <script src="{{asset('js/jquery.stellar.min.js')}}"></script>
  <script src="{{asset('js/owl.carousel.min.js')}}"></script>
  <script src="{{asset('js/jquery.magnific-popup.min.js')}}"></script>
  <script src="{{asset('js/aos.js')}}"></script>
  <script src="{{asset('js/jquery.animateNumber.min.js')}}"></script>
  <script src="{{asset('js/scrollax.min.js')}}"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="{{asset('js/google-map.js')}}"></script>
  <script src="{{asset('js/main.js')}}"></script>
    
  </body>
</html>