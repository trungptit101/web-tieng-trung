<aside class="main-sidebar sidebar-dark-info elevation-4">
    <a href="/" class="brand-link" style="text-align: center">
        <img src="{{ asset('/logo.jpg') }}" style="width: 100%; max-width: 60px; border-radius: 50%">
        HUA HUA
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column nav-flat" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('courses.index') }}" class="nav-link {{ Route::is('courses.*')? 'active' : '' }}">
                        <i class="nav-icon far fa-file-alt"></i>
                        <p>
                            Quản Lý Khoá Học
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('documents.index') }}" class="nav-link {{ Route::is('documents.*')? 'active' : '' }}">
                        <i class="nav-icon far fa-file-pdf"></i>
                        <p>
                            Quản Lý Tài Liệu
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('register.index') }}" class="nav-link {{ Route::is('register.*')? 'active' : '' }}">
                        <i class="nav-icon fa fa-registered"></i>
                        <p>
                            Đăng Ký Tư Vấn
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('banners.index') }}" class="nav-link {{ Route::is('banners.*')? 'active' : '' }}">
                        <i class="nav-icon fas fa-image"></i>
                        <p>
                            Quản Lý Banner
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('pages.introduce.detail') }}" class="nav-link {{ Route::is('pages.*')? 'active' : '' }}">
                        <i class="nav-icon fas fa-newspaper"></i>
                        <p>
                            Trang Giới Thiệu HUA HUA
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('teachers.index') }}" class="nav-link {{ Route::is('teachers.*')? 'active' : '' }}">
                        <i class="nav-icon fas fa-person-booth"></i>
                        <p>
                            Quản Lý Giáo Viên
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('videos.student.index') }}" class="nav-link {{ Route::is('videos.student.*')? 'active' : '' }}">
                        <i class="nav-icon fas fa-play"></i>
                        <p>
                            Quản Lý Video Học Viên
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('contact.detail') }}" class="nav-link {{ Route::is('contact.*')? 'active' : '' }}">
                        <i class="nav-icon fas fa-phone"></i>
                        <p>
                            Quản Lý Liên Hệ
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
