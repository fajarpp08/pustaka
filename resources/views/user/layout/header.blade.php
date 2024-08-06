<header class="header">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="header__content">
                    <div class="header__logo">
                        <a href="/dashboarduser">
                            <img src="../assets-user/img/logo.png" alt="">
                        </a>
                    </div>

                    <div class="header__menu">
                        <ul class="header__nav">
                            <li class="header__nav-item">
                                <a class="header__nav-link" href="/dashboarduser">Home
                                </a>
                            </li>

                            <li class="header__nav-item">
                                <a class="header__nav-link" href="/buku">Buku
                                </a>

                            </li>

                            {{-- Peminjaman --}}
                            <li class="header__nav-item">
                                <a href="/pinjaman" class="header__nav-link">Peminjaman</a>
                            </li>

                            {{-- Pengumuman --}}
                            <li class="header__nav-item">
                                <a href="/informasi" class="header__nav-link">Informasi</a>
                            </li>
                        </ul>
                    </div>

                    {{-- Clock --}}
                    <div class="d-flex flex-nowrap">
                        <div class="d-flex">
                            {{-- <img src="img/weather-icon.png" class="img-fluid w-100 me-2" alt=""> --}}
                            <div class="d-flex align-items-center">
                                <strong id="realtime-clock" class="fs-4 text-secondary">{{ date('H:i:s') }}</strong>
                                <div class="d-flex flex-column ms-2" style="width: 100%;">
                                    <span id="realtime-day" class="text-body">{{ date('l') }}</span>
                                    <small id="realtime-date"> {{ date('d-m-Y') }}</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- End Clock --}}


                    {{-- notification --}}
                    <div class="header__action">
                        <a class="header__profile-btn" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960"
                                width="24px" fill="#5f6368">
                                <path
                                    d="M160-200v-80h80v-280q0-83 50-147.5T420-792v-28q0-25 17.5-42.5T480-880q25 0 42.5 17.5T540-820v28q80 20 130 84.5T720-560v280h80v80H160Zm320-300Zm0 420q-33 0-56.5-23.5T400-160h160q0 33-23.5 56.5T480-80ZM320-280h320v-280q0-66-47-113t-113-47q-66 0-113 47t-47 113v280Z" />
                            </svg>
                        </a>
                        <ul class="dropdown-menu header__profile-notif" id="notif">
                            <li>
                                <a id="showNotification">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960"
                                        width="24px" fill="#05d34e">
                                        <path
                                            d="M480-200q-117 0-198.5-81.5T200-480q0-117 81.5-198.5T480-760q117 0 198.5 81.5T760-480q0 117-81.5 198.5T480-200Z" />
                                    </svg>
                                    <span>
                                        Notifikasi
                                    </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    {{-- end notification --}}



                    <div class="header__action">
                        <a class="header__profile-btn" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path
                                    d="M15.71,12.71a6,6,0,1,0-7.42,0,10,10,0,0,0-6.22,8.18,1,1,0,0,0,2,.22,8,8,0,0,1,15.9,0,1,1,0,0,0,1,.89h.11a1,1,0,0,0,.88-1.1A10,10,0,0,0,15.71,12.71ZM12,12a4,4,0,1,1,4-4A4,4,0,0,1,12,12Z" />
                            </svg>
                        </a>

                        <ul class="dropdown-menu header__profile-menu">
                            <li>
                                <a href="/account"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                        <path
                                            d="M15.71,12.71a6,6,0,1,0-7.42,0,10,10,0,0,0-6.22,8.18,1,1,0,0,0,2,.22,8,8,0,0,1,15.9,0,1,1,0,0,0,1,.89h.11a1,1,0,0,0,.88-1.1A10,10,0,0,0,15.71,12.71ZM12,12a4,4,0,1,1,4-4A4,4,0,0,1,12,12Z" />
                                    </svg> <span>My account</span></a>
                            </li>
                            <li>
                                <a href="/pinjaman"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                        <path
                                            d="M9,12H7a1,1,0,0,0,0,2H9a1,1,0,0,0,0-2ZM8,10h4a1,1,0,0,0,0-2H8a1,1,0,0,0,0,2Zm1,6H7a1,1,0,0,0,0,2H9a1,1,0,0,0,0-2Zm12-4H18V3a1,1,0,0,0-.5-.87,1,1,0,0,0-1,0l-3,1.72-3-1.72a1,1,0,0,0-1,0l-3,1.72-3-1.72a1,1,0,0,0-1,0A1,1,0,0,0,2,3V19a3,3,0,0,0,3,3H19a3,3,0,0,0,3-3V13A1,1,0,0,0,21,12ZM5,20a1,1,0,0,1-1-1V4.73L6,5.87a1.08,1.08,0,0,0,1,0l3-1.72,3,1.72a1.08,1.08,0,0,0,1,0l2-1.14V19a3,3,0,0,0,.18,1Zm15-1a1,1,0,0,1-2,0V14h2Zm-6.44-2.83a.76.76,0,0,0-.18-.09.6.6,0,0,0-.19-.06,1,1,0,0,0-.9.27A1.05,1.05,0,0,0,12,17a1,1,0,0,0,.07.38,1.19,1.19,0,0,0,.22.33,1.15,1.15,0,0,0,.33.21.94.94,0,0,0,.76,0,1.15,1.15,0,0,0,.33-.21A1,1,0,0,0,14,17a1.05,1.05,0,0,0-.29-.71A1.58,1.58,0,0,0,13.56,16.17Zm.14-3.88a1,1,0,0,0-1.62.33A1,1,0,0,0,13,14a1,1,0,0,0,1-1,1,1,0,0,0-.08-.38A.91.91,0,0,0,13.7,12.29Z" />
                                    </svg> <span>Peminjaman</span></a>
                            </li>

                            <li>
                                <a href="/logout"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                        <path
                                            d="M4,12a1,1,0,0,0,1,1h7.59l-2.3,2.29a1,1,0,0,0,0,1.42,1,1,0,0,0,1.42,0l4-4a1,1,0,0,0,.21-.33,1,1,0,0,0,0-.76,1,1,0,0,0-.21-.33l-4-4a1,1,0,1,0-1.42,1.42L12.59,11H5A1,1,0,0,0,4,12ZM17,2H7A3,3,0,0,0,4,5V8A1,1,0,0,0,6,8V5A1,1,0,0,1,7,4H17a1,1,0,0,1,1,1V19a1,1,0,0,1-1,1H7a1,1,0,0,1-1-1V16a1,1,0,0,0-2,0v3a3,3,0,0,0,3,3H17a3,3,0,0,0,3-3V5A3,3,0,0,0,17,2Z" />
                                    </svg> <span>Log out</span></a>
                            </li>
                        </ul>
                    </div>

                    <button class="header__btn" type="button">
                        <span>asda</span>
                        <span></span>
                        <span></span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</header>

@php
    use App\Models\Peminjaman;

    $user = Auth::user();
    $books = Peminjaman::leftJoin('bukus', 'peminjamans.buku_id', 'bukus.id')
        ->where('user_id', $user->id)
        ->get();
@endphp
<script>
    document.addEventListener('DOMContentLoaded', function() {

        const test = @json($books)

        checkBookReturnDates(test);
    });

    function checkBookReturnDates(books) {
        const today = new Date();

        const ul = document.getElementById('notif')


        books.forEach(book => {
            console.log(book)
            const startDate = new Date(book.tgl_mulai);
            const endDate = new Date(book.tgl_akhir);
            const daysLeft = (endDate - today) / (1000 * 60 * 60 * 24);
            console.log(startDate.toLocaleDateString('id-ID', 'DD MMMM YYYY'))
            console.log(today.toLocaleDateString('id-ID', 'DD MMMM YYYY'))
            console.log(daysLeft)

            if (daysLeft < 7 && book.status_kembali == false) {
                const notif =
                    `<li>
                                    <a id="showNotification">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                            <path
                                                d="M9,12H7a1,1,0,0,0,0,2H9a1,1,0,0,0,0-2ZM8,10h4a1,1,0,0,0,0-2H8a1,1,0,0,0,0,2Zm1,6H7a1,1,0,0,0,0,2H9a1,1,0,0,0,0-2Zm12-4H18V3a1,1,0,0,0-.5-.87,1,1,0,0,0-1,0l-3,1.72-3-1.72a1,1,0,0,0-1,0l-3,1.72-3-1.72a1,1,0,0,0-1,0A1,1,0,0,0,2,3V19a3,3,0,0,0,3,3H19a3,3,0,0,0,3-3V13A1,1,0,0,0,21,12ZM5,20a1,1,0,0,1-1-1V4.73L6,5.87a1.08,1.08,0,0,0,1,0l3-1.72,3,1.72a1.08,1.08,0,0,0,1,0l2-1.14V19a3,3,0,0,0,.18,1Zm15-1a1,1,0,0,1-2,0V14h2Zm-6.44-2.83a.76.76,0,0,0-.18-.09.6.6,0,0,0-.19-.06,1,1,0,0,0-.9.27A1.05,1.05,0,0,0,12,17a1,1,0,0,0,.07.38,1.19,1.19,0,0,0,.22.33,1.15,1.15,0,0,0,.33.21.94.94,0,0,0,.76,0,1.15,1.15,0,0,0,.33-.21A1,1,0,0,0,14,17a1.05,1.05,0,0,0-.29-.71A1.58,1.58,0,0,0,13.56,16.17Zm.14-3.88a1,1,0,0,0-1.62.33A1,1,0,0,0,13,14a1,1,0,0,0,1-1,1,1,0,0,0-.08-.38A.91.91,0,0,0,13.7,12.29Z" />
                                        </svg> <span>
                                        ${book.judul} 
                                        <br>
                                        Waktu Pengembalian buku tersisa ${daysLeft.toFixed()} hari. <br>
                                        Berakhir pada tanggal                                     
                                        ${endDate.toLocaleDateString('id-ID', 'DD MMMM YYYY')}
                                        </span>
                                    </a>
                                </li>`

                ul.innerHTML += notif
            } else if (daysLeft == 0 && book.status_kembali == true) {
                const notif =
                    `<li>
                                Tidak Ada Notifikasi
                            </li>`
                ul.innerHTML = notif
            }


        });
    }

</script>
