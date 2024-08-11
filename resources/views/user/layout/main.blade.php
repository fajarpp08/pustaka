<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Perpustakaan MTsN 4 Kota Padang</title>
    <link rel="icon" href="{{ asset('assets-user/img/logo-sekolah.png') }}" type="image/png">

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('assets-user/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets-user/css/splide.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets-user/css/slimselect.css') }}">
    <link rel="stylesheet" href="{{ asset('assets-user/css/main.css') }}">

    <!-- Favicons -->
    <link rel="icon" type="image/png" href="{{ asset('icon/favicon-32x32.png') }}" sizes="32x32">
    <link rel="apple-touch-icon" href="{{ asset('icon/favicon-32x32.png') }}">

    <meta name="description" content="Car rental HTML Template">
    <meta name="keywords" content="">
    <meta name="author" content="Dmitry Volkov">

</head>

<body onload="startClock()">
    <!-- header -->
    @include('user.layout.header')
    <!-- end header -->

    <!-- main content -->
    @yield('content')
    <!-- end main content -->

    <!-- footer -->
    @include('user.layout.footer')
    <!-- end footer -->

    <!-- JS -->
    <script src="{{ asset('assets-user/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets-user/js/splide.min.js') }}"></script>
    <script src="{{ asset('assets-user/js/slimselect.min.js') }}"></script>
    <script src="{{ asset('assets-user/js/smooth-scrollbar.js') }}"></script>
    <script src="{{ asset('assets-user/js/main.js') }}"></script>
    <script>
        // JavaScript untuk memperbarui jam
        function updateClock() {
            var now = new Date();
            var hours = now.getHours().toString().padStart(2, '0');
            var minutes = now.getMinutes().toString().padStart(2, '0');
            var seconds = now.getSeconds().toString().padStart(2, '0');
            var formattedTime = hours + ':' + minutes + ':' + seconds;
            document.getElementById('realtime-clock').innerText = formattedTime;
        }

        // JavaScript untuk memperbarui tanggal
        function updateDate() {
            var now = new Date();
            var day = now.getDate().toString().padStart(2, '0');
            var month = (now.getMonth() + 1).toString().padStart(2, '0');
            var year = now.getFullYear();
            var formattedDate = day + '-' + month + '-' + year;
            document.getElementById('realtime-date').innerText = formattedDate;
        }

        // JavaScript untuk memperbarui hari
        function updateDay() {
            var now = new Date();
            var days = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
            var dayName = days[now.getDay()];
            document.getElementById('realtime-day').innerText = dayName;
        }

        // Memperbarui jam, tanggal, dan hari setiap detik
        function startClock() {
            updateClock();
            updateDate();
            updateDay();
            setInterval(updateClock, 1000);
            setInterval(updateDate, 1000);
            setInterval(updateDay, 1000);
        }
    </script>
    <script>
        // Setelah 3 detik, sembunyikan pesan error
        setTimeout(function() {
            document.getElementById('error-alert').style.display = 'none';
        }, 3000);
    </script>
</body>

</html>
