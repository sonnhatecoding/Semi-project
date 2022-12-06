
        <div class="row">
          <div class="col-lg-7">
            <div class="float-left">
              <p>Phone: +84 888 888 888</p>
              <p>email: dmshuongnoi@gmail.com</p>
            </div>
          </div>
          <div class="col-lg-5">
            <div class="float-right">
              <ul class="right_side">
                <li>
                  <a href="cart.html">
                    gift card
                  </a>
                </li>
                <li>
                  <a href="tracking.html">
                    track order
                  </a>
                </li>
                <li>
                  <a href="contact.html">
                    Contact Us
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="main_menu">
      <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light w-100">
          <!-- Brand and toggle get grouped for better mobile display -->
          <a class="navbar-brand logo_h" href="{{route('index')}}">
            <img src="img/logo.png" alt="" />
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse offset w-100" id="navbarSupportedContent">
            <div class="row w-100 mr-0">
              <div class="col-lg-7 pr-0">
                <ul class="nav navbar-nav center_nav pull-right">
                  <li class="nav-item active">
                    <a class="nav-link" href="{{route('index')}}">Home</a>
                  </li>
                  <li class="nav-item submenu dropdown">
                    <a href="" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                      aria-expanded="false">Smartphones</a>
                    <ul class="dropdown-menu">
                      <li class="nav-item">
                        <a class="nav-link" href="{{route('category')}}">Product</a>
                      </li>
                      
                      <li class="nav-item">
                        <a class="nav-link" href="{{route('cart')}}">Shopping Cart</a>
                      </li>
                    </ul>
                  </li>
                  <li class="nav-item submenu dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                      aria-expanded="false">Blog</a>
                    <ul class="dropdown-menu">
                      <li class="nav-item">
                        <a class="nav-link" href="blog.html">Blog</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="single-blog.html">Blog Details</a>
                      </li>
                    </ul>
                  </li>
                  <li class="nav-item submenu dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                      aria-expanded="false">Pages</a>
                    <ul class="dropdown-menu">
                      <li class="nav-item">
                        <a class="nav-link" href="tracking.html">Tracking</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="elements.html">Elements</a>
                      </li>
                    </ul>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{route('admin.index')}}">Admin</a>
                  </li>
                </ul>
              </div>

              <div class="col-lg-5 pr-0">
                <ul class="nav navbar-nav navbar-right right_nav pull-right">
                  <li class="nav-item">
                      <form role="search" method="get"  action="{{asset('search/')}}" style="margin-top: 7%" > 
                          <div class="input-group">
                              <input type="text" name="key" class="form-control" name="" placeholder="Search for products">
                              <div class="input-group-append">
                                  <button type="submit" class="input-group-text bg-transparent text-primary">
                                      <i class="fa fa-search"></i>   
                                  </button>
                              </div>
                          </div>
                      </form>
                  </li>

                  <li class="nav-item">
                    <a href="{{route('cart')}}" class="icons">
                      <i class="ti-shopping-cart"></i>
                    </a>
                  </li>

                  <li class="nav-item">
                    <div class="btn-group">
                      <button type="button" class="btn btn-sm btn-light dropdown-toggle" data-toggle="dropdown">
                        <a href="#" class="icons">
                          <i class="ti-user" aria-hidden="true"></i>
                        </a>
                      </button>
                      <div class="dropdown-menu dropdown-menu-right">
                          <a href="signin" style="text-decoration: none"><button class="dropdown-item" type="button">Sign in</button></a>
                          <a href="signup" style="text-decoration: none"><button class="dropdown-item" type="button">Sign up</button></a>
                      </div>
                  </div>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </nav>
      </div>
    </div>
  </header>