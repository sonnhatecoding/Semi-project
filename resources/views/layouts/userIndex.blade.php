@INCLUDE('users.blocks.head')
<!--================Header Menu Area =================-->
    <header class="header_area">
        <div class="top_menu">
            <div class="container">
                @INCLUDE('users.blocks.navbar')
            </div>
        </div>
    </header>
    <!--================Home Banner Area =================-->
    <section class="home_banner_area mb-40">
        <div class="banner_inner d-flex align-items-center">
            <div class="container">
                @INCLUDE('users.blocks.banner')
            </div>
        </div>
    </section>

         @yield('content')
        
    @INCLUDE('users.blocks.footer')
@INCLUDE('users.blocks.js')