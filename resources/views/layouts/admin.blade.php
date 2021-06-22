@section('title', 'Dashboard')
@include('layouts.header')



<body class="alt-menu sidebar-noneoverflow">
    <!-- BEGIN LOADER -->
    <div id="load_screen"> <div class="loader"> <div class="loader-content">
        <div class="spinner-grow align-self-center"></div>
    </div></div></div>
    <!--  END LOADER -->

@include('layouts.navbar')
    <!--  END NAVBAR  -->

    <!--  BEGIN MAIN CONTAINER  -->
    {{-- <div class="main-container" id="container">

        <div class="overlay"></div>
        <div class="search-overlay"></div> --}}

        <!--  BEGIN TOPBAR  -->
@include('layouts.topbar')
        <!--  END TOPBAR  -->

       @yield('content')

            {{-- </div>
        </div> --}}


        <!--  END CONTENT PART  -->

    {{-- </div> --}}
    <!-- END MAIN CONTAINER -->
    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
      @include('layouts.scripts')
    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->

</body>
</html>
