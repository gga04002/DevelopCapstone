<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>WaiStand</title>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
  <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"> -->
  <link rel="stylesheet" href="/css/menu.css">

</head>
<body>
  <div class="header">
    <div class="topnav">
      <ul id="topnav-list">
        <a id="top-logo" href="/"><li><img src="/sources/logo_green.png" alt="logo"></li></a>
        <a href=""><li>제품구매</li></a>
        <a href="/stats"><li>통계</li></a>
        <a href=""><li>건강정보</li></a>
        <a href=""><li>챌린지</li></a>
        <a href=""><li>QnA</li></a>
        <a id="top-box" href=""><li><div></div></li></a>
      </ul>
    </div>
    <div id="topMenu">
      <h1><?= isset($menuName) ? "{$menuName}" : 'menu' ?></h1>
    </div>
  </div>

  <div class="main">
    @yield('main')
  </div>
</body>
</html>