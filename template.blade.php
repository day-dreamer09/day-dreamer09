<!DOCTYPE html>
<html lang="en">
@include('dashboard.partials.head')

<body>
    <div class="wrapper">
       @include('dashboard.partials.sidebar')

        <div class="main">
           @include('dashboard.partials.navbar')

            <main class="content">
                <div class="container-fluid p-0">

                    @yield('dashboard-content')

                </div>
            </main>
      @include('dashboard.partials.footer')
           
        </div>
    </div>

    <script src="{{ asset('assets/js/app.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
 