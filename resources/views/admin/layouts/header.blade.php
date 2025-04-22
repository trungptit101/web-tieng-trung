<style>
    div.notice_content {
        max-height: 500px !important;
        overflow-y: scroll;
    }
</style>
<nav class="main-header navbar navbar-expand navbar-dark navbar-info">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>
    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
        {{-- <li class="nav-item dropdown display-notifiaction">
            <a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="false">
                <i class="far fa-bell"></i>
                <span class="badge badge-warning navbar-badge">1</span>
            </a>
        </li> --}}
        <li class="nav-item dropdown display-notifiaction">
            <a class="nav-link" data-toggle="dropdown" href="#">
                {{ Auth::user()->name ?? '' }}
                <i class="fa fa-angle-down" aria-hidden="true"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <a href="#" class="dropdown-item">
                    <!-- Message Start -->
                    <div class="text-center">
                        <p>{{ Auth::user()->email ?? ''    }}</p>
                    </div>
                    <!-- Message End -->
                </a>

                <div class="dropdown-divider"></div>
                <div style="padding: .25rem 1rem;">
                    <!-- <a href="" class="btn btn-primary btn-sm mt-1 mb-1"
                        style="width: 100%;"> <i class="fas fa-sign-out-alt"></i> Cài đặt</a><br> -->
                    <a href="{{ route('logout') }}" class="btn btn-danger btn-sm mt-1 mb-1" style="width: 100%;" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> <i class="fas fa-sign-out-alt"></i> Đăng xuất</a><br>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </div>
        </li>
        </li>
    </ul>
</nav>