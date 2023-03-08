
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Adi-EXPO</title>
        @include('backend.head')
    </head>

<body class="g-sidenav-show  bg-gray-100">

  @include('backend.leftbar')

<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
  @include('backend.navbar')


  @yield('content_admin')



<!-- footer -->
@include('backend.footer')
<!-- footer -->

<style>
  #loading-container {
display: flex;
justify-content: center;
align-items: center;
position: fixed;
top: 50%;
left: 50%;
transform: translate(-50%, -50%);
z-index: 9999;
}

#loading-spinner {
width: 50px;
height: 50px;
border-radius: 50%;
border: 5px solid #757575;
border-top-color: #18054d;
animation: spin 0.70s linear infinite;
}

@keyframes spin {
0% { transform: rotate(0deg); }
100% { transform: rotate(360deg); }
}

#blur-background {
position: fixed;
top: 0;
left: 0;
width: 100%;
height: 100%;
background-color: rgba(0, 0, 0, 0.322);
backdrop-filter: blur(10px);
z-index: 9998;
}

</style>
<div id="loading-container">
  <div id="loading-spinner"></div>
</div>
<div id="blur-background"></div>

<script>
  window.onload = function() {
var loadingContainer = document.getElementById('loading-container');
var blurBackground = document.getElementById('blur-background');

loadingContainer.style.display = 'none';
blurBackground.style.display = 'none';
};

window.onbeforeunload = function() {
var loadingContainer = document.getElementById('loading-container');
var blurBackground = document.getElementById('blur-background');

loadingContainer.style.display = 'flex';
blurBackground.style.display = 'block';
};

</script>

</body>
</html>