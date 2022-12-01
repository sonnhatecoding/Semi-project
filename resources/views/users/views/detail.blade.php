@extends('layouts.user')

@section('content')
<!--================Home Banner Area =================-->
<section class="banner_area">
    <div class="banner_inner d-flex align-items-center">
      <div class="container">
        <div
          class="banner_content d-md-flex justify-content-between align-items-center"
        >
          <div class="mb-3 mb-md-0">
            <h2>Product Details</h2>
            <p>Very us move be blessed multiply night</p>
          </div>
          <div class="page_link">
            <a href="{{Route('index')}}">Home</a>
            <a >Product Details</a>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--================End Home Banner Area =================-->

  <!--================Single Product Area =================-->
  <div class="product_image_area">
    <div class="container">
      <div class="row s_product_inner">
        <div class="col-lg-6">
          <div class="s_product_img">
            <div
              id="carouselExampleIndicators"
              class="carousel slide"
              data-ride="carousel"
            >
              <ol class="carousel-indicators">
                <li
                  data-target="#carouselExampleIndicators"
                  data-slide-to="1"
                >
                  <img
                    src="images/product/{{$productDetail->pro_image}}"
                    alt="" style ="width: 60px; height:60 "
                  />
                </li>
                <li
                  data-target="#carouselExampleIndicators"
                  data-slide-to="2"
                >
                  <img
                    src="images/product/{{$productDetail->pro_image1}}"
                    alt="" style ="width: 60px; height:60 "
                  />
                </li>
                <li
                  data-target="#carouselExampleIndicators"
                  data-slide-to="3"
                >
                  <img
                    src="images/product/{{$productDetail->pro_image2}}"
                    alt="" style ="width: 60px; height:60 "
                  />
                </li>
                <li
                  data-target="#carouselExampleIndicators"
                  data-slide-to="4"
                >
                  <img
                    src="images/product/{{$productDetail->pro_image3}}"
                    alt="" style ="width: 60px; height:60 "
                  />
                </li>
                <li
                  data-target="#carouselExampleIndicators"
                  data-slide-to="5"
                >
                  <img
                    src="images/product/{{$productDetail->pro_image4}}"
                    alt="" style ="width: 60px; height:60 "
                  />
                </li>
              </ol>

              <div class="carousel-inner">
                <div class="carousel-item active">
                  <img
                    class="d-block w-100"
                    src="images/product/{{$productDetail->pro_image}}"
                    alt="First slide"
                  />
                </div>
                <div class="carousel-item">
                  <img
                    class="d-block w-100"
                    src="images/product/{{$productDetail->pro_image1}}"
                    alt="Second slide"
                  />
                </div>
                <div class="carousel-item">
                  <img
                    class="d-block w-100"
                    src="images/product/{{$productDetail->pro_image2}}"
                    alt="Third slide"
                  />
                </div>
                <div class="carousel-item">
                  <img
                    class="d-block w-100"
                    src="images/product/{{$productDetail->pro_image3}}"
                    alt="Third slide"
                  />
                </div>
                <div class="carousel-item">
                  <img
                    class="d-block w-100"
                    src="images/product/{{$productDetail->pro_image4}}"
                    alt="Third slide"
                  />
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-5 offset-lg-1">
          <div class="s_product_text">
            <h3 >{{$productDetail->pro_name}}</h3>
            <h2>${{$productDetail->pro_reducedPrice}}</h2>
            <ul class="list">
              <li>
                <a> <span>Brand</span> : {{$productDetail->brand_name}}</a
                >
              </li>
              <li>
                <a> <span>Color</span> : {{$productDetail->color_name}}</a>
              </li>
              <li>
                <a> <span>Ram</span> : {{$productDetail->color_id}} GB</a>
              </li>
              <li>
                <a> <span>Internal memory</span> : {{$productDetail->pro_iMemory}} GB</a>
              </li>
              <li>
                <a> <span>Operating system</span> : {{$productDetail->pro_oSystem}}</a>
              </li>
              <li>
                <a> <span>Warranty period</span> : {{$productDetail->pro_warrantyPeriod}} Month </a>
              </li>
              <li>
                <a> <span>Origin</span> : {{$productDetail->pro_origin}}</a>
              </li>
              <li>
                <a> <span>Launch Date</span> : {{$productDetail->pro_launchDate}}</a>
              </li>
            <p>
              {{$productDetail->pro_description}}
            </p>
            
            <div class="product_count">
              <label for="qty">Quantity:</label>
              <input
                type="text"
                name="qty"
                id="sst"
                maxlength="12"
                value="1"
                title="Quantity:"
                class="input-text qty"
              />
              <button
                onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst )) result.value++;return false;"
                class="increase items-count"
                type="button"
              >
                <i class="lnr lnr-chevron-up"></i>
              </button>
              <button
                onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst ) &amp;&amp; sst > 0 ) result.value--;return false;"
                class="reduced items-count"
                type="button"
              >
                <i class="lnr lnr-chevron-down"></i>
              </button>
            </div>
            <div class="card_area">
              <a class="main_btn" href="#">Add to Cart</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--================End Single Product Area =================-->
  <br>

@endsection