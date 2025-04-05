<!DOCTYPE html>
<html lang="en">
@include('website.partials.head')

<body>
    <div class="bg-white p-0">
        <!-- Spinner Start -->
        {{-- <div id="spinner"
            class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div> --}}
        <!-- Spinner End -->


        <!-- Navbar & Hero Start -->
        @include('website.partials.navbar')
        <!-- Navbar & Hero End -->


        <!-- Service Start -->
        @include('website.partials.service')

        <!-- Service End -->


        <!-- About Start -->
        @include('website.partials.about')

        <!-- About End -->


        <!-- Menu Start -->
        @include('website.partials.menu')

        <!-- Menu End -->


        <!-- Reservation Start -->
        @include('website.partials.resservation')

        <!-- Reservation Start -->


        <!-- Team Start -->
        @include('website.partials.team')

        <!-- Team End -->


        <!-- Testimonial Start -->
        @include('website.partials.testemonial')

        <!-- Testimonial End -->


        <!-- Footer Start -->
        @include('website.partials.footer')

        <!-- Footer End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>


    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('webAssets/lib/wow/wow.min.js')}}"></script>
    <script src="{{ asset('webAssets/lib/easing/easing.min.js')}}"></script>
    <script src="{{ asset('webAssets/lib/waypoints/waypoints.min.js')}}"></script>
    <script src="{{ asset('webAssets/lib/counterup/counterup.min.js')}}"></script>
    <script src="{{ asset('webAssets/lib/owlcarousel/owl.carousel.min.js')}}"></script>
    <script src="{{ asset('webAssets/lib/tempusdominus/js/moment.min.js')}}"></script>
    <script src="{{ asset('webAssets/lib/tempusdominus/js/moment-timezone.min.js')}}"></script>
    <script src="{{ asset('webAssets/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js')}}"></script>
    <script src="{{ asset('webAssets/js/main.js')}}"></script>
</body>

</html>