<!DOCTYPE html>
<html lang="en">
@include('website.partials._head')
<body>
@include('website.partials._header')
<!-- end site-header -->

@yield('content')

<!-- end content -->

@include('website.partials._footer')
<!-- end footer-main -->
<a href="#" class="scrollup" style="display: none;">Scroll</a>
<!-- ALL JS FILES -->
<script src="{{asset('/assets/js/all.js')}}"></script>
<script src="{{asset('/assets/js/bootstrap.min.js')}}"></script>
<!-- ALL PLUGINS -->
<script src="{{asset('/assets/js/custom.js')}}"></script>

@yield('scripts')
</body>
</html>
