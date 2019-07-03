@include('layout.header')
@include('layout.navbar')
@include('layout.rigthsidebar')


<div class="ui container">
  @yield('content')
</div>

@yield('modal_content')

@yield('script')
@yield('simpleScript')



@include('layout.footer')