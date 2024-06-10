<!DOCTYPE html>
<html lang="en">
@include('layouts.head')
<body>

 @include('layouts.side')

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>{{$title}}</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">{{Auth::user()->role}}</a></li>
          <li class="breadcrumb-item active">{{$title}}</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

   @yield('main')

  </main><!-- End #main -->

 @include('layouts.foot')

</body>

</html>