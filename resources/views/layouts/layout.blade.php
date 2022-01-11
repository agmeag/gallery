<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Miguel Avilés</title>
    <link rel="icon" type="image/png" sizes="48x48" href="/assets/img/profile-circle.png">
    <!-- <link rel="stylesheet" href="/assets/css/normalize.css"> -->
    <link rel="stylesheet" href="/assets/css/boxicons/css/boxicons.min.css">
    <script src="/assets/js/boxicons.js"></script>
    <script src="/assets/js/jquery-3.6.0.js"></script>
    <link rel="stylesheet" href="assets/css/flex.css">
    <link rel="stylesheet" href="assets/css/app.css">
    <link rel="stylesheet" href="assets/css/misc.css">
    <link rel="stylesheet" href="/assets/css/layout/layout-menu.css">
    @yield('head')
</head>

<body>
    <div class="sections">
        <div class="section-1" id="sidebar-menu">
            <div class="sb-width menu scroll-width-thin">
                <div class="links">
                    <a class="option" href="/photo_viewer">
                        <i class='option-icon bx bxs-photo-album'></i>Photo Viewer</a>
                </div>
            </div>
        </div>
        <div class="section-2">
            <div class="content">
                @yield('content')
            </div>
        </div>
        <div id="fullscreenOn" class="fullscreen-btn" onclick="fullScreen()">
            <i class='bx bx-fullscreen' id="fullscreen-icon"></i>
        </div>
        @include('layouts.bottom-navigation')
    </div>
    @yield('scripts')
    <i class='bx bx-exit-fullscreen'></i>
    <script>
        /* Get the documentElement (<html>) to display the page in fullscreen */
        var elem = document.documentElement;
        /* View in fullscreen */
        var bool = false;
        function fullScreen() {
            let fullscreen_icon = document.getElementById('fullscreen-icon');
            if (!bool) {
                openFullscreen();
                fullscreen_icon.classList.replace("bx-fullscreen", "bx-exit-fullscreen");
            } else {
                closeFullscreen();
                fullscreen_icon.classList.replace("bx-exit-fullscreen", "bx-fullscreen");
            }
            bool = !bool;
        }
        function openFullscreen() {
            if (elem.requestFullscreen) {
                elem.requestFullscreen();
            } else if (elem.webkitRequestFullscreen) { /* Safari */
                elem.webkitRequestFullscreen();
            } else if (elem.msRequestFullscreen) { /* IE11 */
                elem.msRequestFullscreen();
            }

        }

        /* Close fullscreen */
        function closeFullscreen() {
            if (document.exitFullscreen) {
                document.exitFullscreen();
            } else if (document.webkitExitFullscreen) { /* Safari */
                document.webkitExitFullscreen();
            } else if (document.msExitFullscreen) { /* IE11 */
                document.msExitFullscreen();
            }
        }
    </script>
</body>

</html>