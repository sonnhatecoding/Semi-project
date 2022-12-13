@extends('layouts.user')

@section('content')
<!--================Home Banner Area =================-->
<section class="banner_area">
    <div class="banner_inner d-flex align-items-center">
      <div class="container">
        <div class="banner_content d-md-flex justify-content-between align-items-center">
          <div class="mb-3 mb-md-0">
            <h2>Shop Category</h2>
            <p>Very us move be blessed multiply night</p>
          </div>
          <div class="page_link">
            <a href="{{Route('index')}}">Home</a>
            <a href="{{Route('category')}}">Shop</a>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--================End Home Banner Area =================-->

  <!--================Category Product Area =================-->
  <section class="cat_product_area section_gap">
    <div class="container">
      <div class="row flex-row-reverse">
        <div class="col-lg-9">
          <form action="" method="GET" class="mb-3" >
          <div class="product_top_bar">
            <div class="left_dorp">
                <div class="row" >
                  <div class="col-1.5" >
                    <select class="form-control" name="brands">
                        <option value="0">Brands</option>
                        @if (!empty(getAllBrands()))
                            @foreach (getAllBrands() as $item)
                                <option value="{{$item->brand_id}}" {{request()->brands == $item->brand_id ? 'selected' : false}} {{request()->brand_id == 'active' ? 'selected' : false}}> {{$item->brand_name}}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
    
                <div class="col-1.5">
                    <select class="form-control" name="colors">
                        <option value="0">Colors</option>
                        @if (!empty(getAllColors()))
                            @foreach (getAllColors() as $item)
                                <option value="{{$item->color_id}}" {{request()->colors == $item->color_id ? 'selected' : false}} {{request()->color_id == 'active' ? 'selected' : false}}> {{$item->color_name}}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
                  <div class="col-1.5">
                      <select class="form-control" name="rams">
                          <option value="0">Rams</option>
                          <option value="2" {{request()->rams =='2' ? 'selected' : false}}>2 GB</option>
                          <option value="4" {{request()->rams =='4' ? 'selected' : false}}>4 GB</option>
                          <option value="6" {{request()->rams =='6' ? 'selected' : false}}>6 GB</option>
                          <option value="8" {{request()->rams =='8' ? 'selected' : false}}>8 GB</option>
                      </select>
                  </div>

                  <div class="col-1.5">
                      <select class="form-control" name="internal_memory" >
                          <option value="0">Internal Memory</option>
                          <option value="32"   {{request()->internal_memory =='32'   ? 'selected' : false}}> 32 GB  </option>
                          <option value="64"   {{request()->internal_memory =='64'   ? 'selected' : false}}> 64 GB  </option>
                          <option value="128"  {{request()->internal_memory =='128'  ? 'selected' : false}}> 128 GB </option>
                          <option value="256"  {{request()->internal_memory =='256'  ? 'selected' : false}}> 256 GB </option>
                          <option value="512"  {{request()->internal_memory =='512'  ? 'selected' : false}}> 512 GB </option>
                          <option value="1024" {{request()->internal_memory =='1024' ? 'selected' : false}}> 1024 GB</option>
                      </select>
                  </div>

                  <div class="col-1.5">
                      <select class="form-control" name="operating_system">
                          <option value="0">OS</option>
                          <option value="Android" {{request()->operating_system =='Android' ? 'selected' : false}}> Android  </option>
                          <option value="IOS" {{request()->operating_system =='IOS' ? 'selected' : false}}> IOS </option>
                          <option value="Windows Phone" {{request()->operating_system =='Windows Phone' ? 'selected' : false}}> Windows Phone </option>
                          <option value="Symbian" {{request()->operating_system =='Symbian' ? 'selected' : false}}> Symbian </option>
                          <option value="BlackBerry OS" {{request()->operating_system =='BlackBerry OS' ? 'selected' : false}}> BlackBerry OS </option>
                          <option value="Bada" {{request()->operating_system =='Bada' ? 'selected' : false}}> Bada</option>
                      </select>
                  </div>
                  <div class="col-1.5">
                      <select class="form-control" name="warranty_period">
                          <option value="0">Warranty Period</option>
                          <option value="6"  {{request()->warranty_period =='6'  ? 'selected' : false}}> 6 months  </option>
                          <option value="8"  {{request()->warranty_period =='8'  ? 'selected' : false}}> 8 months  </option>
                          <option value="12" {{request()->warranty_period =='12' ? 'selected' : false}}> 12 months </option>
                          <option value="18" {{request()->warranty_period =='18' ? 'selected' : false}}> 18 months </option>
                          <option value="24" {{request()->warranty_period =='24' ? 'selected' : false}}> 24 months </option>
                          <option value="36" {{request()->warranty_period =='36' ? 'selected' : false}}> 36 months </option>
                      </select>
                  </div>
                  
                  <div class="col-2">
                      <input type="search" class="form-control" name="keywords" placeholder="Search keyword..." value="{{request()->keywords}}">
                  </div>

                  <div class="input-group-append">
                      <button class="btn btn-primary" type="submit">
                          <i class="fa fa-search fa-sm"></i>
                      </button>
                  </div>
                  </div>
            </div>
          </div>
        </form>
          
          <div class="latest_product_inner">
            <div class="row">
              @if (!empty($productList))
                @foreach ($productList as $item)
                  <div class="col-lg-4 col-md-6">
                    <div class="single-product">
                      <div class="product-img">
                        <img class="img-fluid w-100" src="images/product/{{$item->pro_image}}" alt="" />
                        <div class="p_icon">
                          <a href="{{route('detail', ['id' => $item->pro_id])}}">
                            <i class="ti-eye"></i>
                          </a>
                          <a href="{{asset('cart/add-to-cart/'.$item->pro_id)}}">
                            <i class="ti-shopping-cart"></i>
                          </a>
                        </div>
                      </div>
                      <div class="product-btm">
                        <a href="#" class="d-block">
                          <h4>{{$item ->pro_name}}</h4>
                        </a>
                        <div class="mt-3">
                          <span class="mr-4">${{$item ->pro_reducedPrice}}</span>
                          <del>${{$item ->pro_price}}</del>
                        </div>
                      </div>
                    </div>
                  </div>
                @endforeach
              @endif
            </div>
            <div class="d-flex justify-content-center">
              {{$productList->links()}}
          </div>
          </div>
        </div>

        <div class="col-lg-3">
          <div class="left_sidebar_area">
            {{-- <form action="" method="GET" class="mb-3" > --}}
              <aside class="left_widgets p_filter_widgets">
                <div class="l_w_title">
                  <h3>Product Brand</h3>
                </div>
                <div class="widgets_inner">
                  <ul class="list">
                    @if (!empty($allBrands))
                      @foreach($allBrands as $item)
                        <li>
                          <button  class="btn btn-outline-dark btn-sm" value="{{$item->brand_id}}"><img src="images/brand/{{$item->brand_logo}}" style ="width: 70px; height:15px "></button>
                        </li>
                      @endforeach
                    @endif
                  </ul>
                </div>
              </aside>

              <aside class="left_widgets p_filter_widgets">
                <div class="l_w_title">
                  <h3>Color Filter</h3>
                </div>
                <div class="widgets_inner">
                  <ul class="list">
                    @if (!empty($allColors))
                      @foreach($allColors as $item)
                        <li>
                          <button type="submit" class="btn btn-outline-dark btn-sm" style ="width: 90px; height:30px " value="{{$item->color_id}}">{{$item->color_name}}</button>
                        </li>
                      @endforeach
                    @endif
                  </ul>
                </div>
              </aside>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--================End Category Product Area =================-->
@endsection