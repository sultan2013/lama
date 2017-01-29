@include('layouts.head')

@include('layouts.page_loader')

     @yield('top_bar')

@include('layouts.sidebar')

@include('layouts.right_sidebar')
     @yield('dashboard')

@include('layouts.footer')