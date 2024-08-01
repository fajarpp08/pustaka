<div class="container-fluid g-0">
    <div class="row">
        <div class="col-lg-12 p-0">
            <div class="header_iner d-flex justify-content-between align-items-center">
                <div class="sidebar_icon d-lg-none">
                    <i class="ti-menu"></i>
                </div>
                <div>
                    <a class="header-text">
                        SISTEM INFORMASI PERPUSTAKAAN MTSN 4 KOTA PADANG
                    </a>
                </div>
                <div class="header_right d-flex justify-content-between align-items-center">
                    {{-- <div class="header_notification_warp d-flex align-items-center">
                        <li>
                            <a href="#"> <img src="../assets-admin/img/icon/bell.svg" alt> </a>
                        </li>
                        <li>
                            <a href="#"> <img src="../assets-admin/img/icon/msg.svg" alt> </a>
                        </li>
                    </div> --}}
                    <div class="profile_info">
                        <img src="../assets-admin/img/profile_user.png" alt="#">
                        <div class="profile_info_iner">
                            <p>Level - {{ auth()->user()->role }}</p>
                            <h5>{{ auth()->user()->nama }}</h5>
                            <div class="profile_info_details">
                                <a href="/data-user">My Profile <i class="ti-user"></i></a>
                                <a href="/logout">Log Out <i class="ti-shift-left"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
