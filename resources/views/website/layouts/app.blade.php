<!DOCTYPE html>
<html lang="en">

{{--Start Head--}}
<x-website-head />
{{--End Head--}}

<body class="home">

<div class="page-wrapper">

    <!-- Start Header -->
    <x-website-header  />
    <!-- End Header -->

    <!-- Start Main -->
        {{$slot}}
    <!-- End of Main -->

    <!-- Start Footer -->
        <x-website-footer />
    <!-- End Footer -->
</div>


<!-- Start Foot -->
<x-website-foot />
<!-- End Foot -->

</body>

</html>
