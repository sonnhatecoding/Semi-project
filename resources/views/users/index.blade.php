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
{{-- <h1>ha cong minh lam</h1> --}}
      <form action="" method="GET" class="mb-3" >
      <div class="flex-w flex-sb-m p-b-52">
        <div class="flex-w flex-l-m filter-tope-group m-tb-10">
            @if (!empty(getAllBrands()))
              @foreach(getAllBrands() as $item)
                <button type="submit" class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".loai-{{ $item->brand_id }}">
                  <img src="images/brand/{{$item->brand_logo}}" style ="width: 90px; height:30px ">
                </button>
              @endforeach
            @endif
        </div>
      </div>
      <br>

        <div class="row">
            <div class="col-1" >
                <select class="form-control" name="brands">
                    <option value="0">Brands</option>
                    @if (!empty(getAllBrands()))
                        @foreach (getAllBrands() as $item)
                            <option value="{{$item->brand_id}}" {{request()->brands == $item->brand_id ? 'selected' : false}} {{request()->brand_id == 'active' ? 'selected' : false}}> {{$item->brand_name}}</option>
                        @endforeach
                    @endif
                </select>
            </div>

            <div class="col-1">
                <select class="form-control" name="colors">
                    <option value="0">Colors</option>
                    @if (!empty(getAllColors()))
                        @foreach (getAllColors() as $item)
                            <option value="{{$item->color_id}}" {{request()->colors == $item->color_id ? 'selected' : false}} {{request()->color_id == 'active' ? 'selected' : false}}> {{$item->color_name}}</option>
                        @endforeach
                    @endif
                </select>
            </div>

            <div class="col-1">
                <select class="form-control" name="rams">
                    <option value="0">Rams</option>
                    <option value="2" {{request()->rams =='2' ? 'selected' : false}}>2 GB</option>
                    <option value="4" {{request()->rams =='4' ? 'selected' : false}}>4 GB</option>
                    <option value="6" {{request()->rams =='6' ? 'selected' : false}}>6 GB</option>
                    <option value="8" {{request()->rams =='8' ? 'selected' : false}}>8 GB</option>
                </select>
            </div>

            <div class="col-2">
                <select class="form-control" name="internal_memory">
                    <option value="0">Internal Memory</option>
                    <option value="32"   {{request()->internal_memory =='32'   ? 'selected' : false}}> 32 GB  </option>
                    <option value="64"   {{request()->internal_memory =='64'   ? 'selected' : false}}> 64 GB  </option>
                    <option value="128"  {{request()->internal_memory =='128'  ? 'selected' : false}}> 128 GB </option>
                    <option value="256"  {{request()->internal_memory =='256'  ? 'selected' : false}}> 256 GB </option>
                    <option value="512"  {{request()->internal_memory =='512'  ? 'selected' : false}}> 512 GB </option>
                    <option value="1024" {{request()->internal_memory =='1024' ? 'selected' : false}}> 1024 GB</option>
                </select>
            </div>

            <div class="col-2">
                <select class="form-control" name="operating_system">
                    <option value="0">Operating system</option>
                    <option value="Android" {{request()->operating_system =='Android' ? 'selected' : false}}> Android  </option>
                    <option value="IOS" {{request()->operating_system =='IOS' ? 'selected' : false}}> IOS </option>
                    <option value="Windows Phone" {{request()->operating_system =='Windows Phone' ? 'selected' : false}}> Windows Phone </option>
                    <option value="Symbian" {{request()->operating_system =='Symbian' ? 'selected' : false}}> Symbian </option>
                    <option value="BlackBerry OS" {{request()->operating_system =='BlackBerry OS' ? 'selected' : false}}> BlackBerry OS </option>
                    <option value="Bada" {{request()->operating_system =='Bada' ? 'selected' : false}}> Bada</option>
                </select>
            </div>

            <div class="col-2">
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
    </form>
    <br>

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
                        <span class="mr-4">${{$item ->pro_reducedPrice}}</span>
                        <del>${{$item ->pro_price}}</del>
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