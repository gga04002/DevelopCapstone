<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>WaiStand</title>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@0.7.0"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <!-- <script src="{{ URL::asset('js\jquery-3.2.1.min.js') }}"></script> -->
  {{--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">--}}
  <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" >
  <script src="{{ asset('js/app.js') }}"></script>

</head>
<body>
  <div class="container-fluid">
    <div class="header">
      <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #04D976;">
        <a class="navbar-brand" href="/">
          <img src="/sources/logo_white.png" width="200" height="auto" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto" style="font-weight: 700;">
            <li class="nav-item active">
              <a class="nav-link" href="#">제품구매</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="/stats">통계</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="#">허리건강/스트레칭정보</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="/challenge">챌린지</a>
            </li>
          </ul>

        </div>
      </nav>
    </div>
  </div>

  <div class="main">
    @yield('main')
  </div>
</body>
</html>