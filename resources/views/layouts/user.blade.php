@INCLUDE('users.blocks.head')
<!--================Header Menu Area =================-->
    <header class="header_area">
        <div class="top_menu">
            <div class="container">
                @INCLUDE('users.blocks.navbar')
            </div>
        </div>
    </header>

         @yield('content')
        
    @INCLUDE('users.blocks.footer')
@INCLUDE('users.blocks.js')