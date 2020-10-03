@include('admin.layouts.header')
@include('admin.layouts.sidebar')
<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
        @yield('content')
    </div>
</div>

@include('admin.layouts.footer')
