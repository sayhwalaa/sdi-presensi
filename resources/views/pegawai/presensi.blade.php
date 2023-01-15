<!DOCTYPE html>
<html lang="en">
@include('template.head')

<body class="g-sidenav-show bg-gray-100">
    <div class="min-height-300 bg-primary position-absolute w-100"></div>
    {{-- sidebar --}}
    @include('template.sidebar')
    {{-- end sidebar --}}
    <main class="main-content position-relative border-radius-lg ">
        <!-- Navbar -->
        @include('template.navbar')
        {{-- end navbar --}}
        <style>
            .container {
                display: flex;
                justify-content: space-evenly;
                align-items: center;
                margin-top: 100px;
            }
            #start-camera {
                height: 40px;
            }
            #click-photo {
                height: 40px;
            }
            .start {
                display: flex;
                flex-direction: column;
                margin: 0 20px;
                gap: 20px;
            }
            .click {
                display: flex;
                flex-direction: column;
                gap: 20px;
            }
            .bt {
                display: flex;
                gap: 10px;
                justify-content: center
            }
            video {
                border-radius: 20px;
            }
        </style>
        <div class="container">
            <div class="start">
                <video id="video" width="320" height="240" autoplay></video>
                <div class="bt">
                <button class="btn" style="background-color: #384464; color:white;" id="start-camera">Start Camera</button>
                <button class="btn btn-info" id="click-photo">Click Photo</button>
                </div>
            </div>
            <div class="click">
                <canvas id="canvas" width="320" height="240"></canvas>
                <button class="btn btn-success" id="click-photo">Presensi</button>
            </div>
        <script src="script.js"></script>
        </div>
        <!--end container-->
        {{-- footer --}}
        @include('template.footer')
        {{-- end footer --}}
    </main>
     <!--   Core JS Files   -->
     @include('template.script')
</body>
</html>
