<!DOCTYPE html>
<html class="no-js" lang="en">

@include('frontend.template_one.partials.style_link')

<body>

    <!-- Header -->
    @include('frontend.template_one.partials.header')
    <!-- Header end /-->

    <!-- Main -->
    <main class="main--wrapper">

        @yield('index_template_one')

    </main>
    <!-- Main End -->

    <!-- Footer -->
    @include('frontend.template_one.partials.footer')
    <!-- Footer End -->

    <!-- JS here -->
    @include('frontend.template_one.partials.js_link')
    <!-- JS here -->

</body>

</html>
