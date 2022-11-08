@extends('layouts.userIndex')

@section('content')
    <!--================ Feature Product Area =================-->
  <section class="feature_product_area section_gap_bottom_custom">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-12">
          <div class="main_title">
            <h2><span>Smartphones</span></h2>
            <p>The world of promax</p>
          </div>
        </div>
      </div>

      <div class="row">
        @if (!empty(getProductsUser()))
            @foreach (getProductsUser() as $item)
                <div class="col-lg-4 col-md-6">
                  <div class="single-product">
                    <div class="product-img">
                      <img class="img-fluid w-100" src="images/product/{{$item->pro_image}}" alt="" />
                      <div class="p_icon">
                        <a href="detail">
                          <i class="ti-eye"></i>
                        </a>
                        <a href="#">
                          <i class="ti-heart"></i>
                        </a>
                        <a href="cart">
                          <i class="ti-shopping-cart"></i>
                        </a>
                      </div>
                    </div>
                    <div class="product-btm">
                      <a href="#" class="d-block">
                        <h4>{{$item ->pro_name}}</h4>
                      </a>
                      <div class="mt-3">
                        <span class="mr-4">{{$item ->pro_reducedPrice}}</span>
                        <del>{{$item ->pro_price}}</del>
                      </div>
                    </div>
                  </div>
                </div>
          @endforeach
        @endif
      </div>
    </div>
  </section>
@endsection