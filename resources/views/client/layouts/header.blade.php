<header>
    <div class="container header-client">
        <div class="logo">
            <a href="/">
                <img src="{{ asset('/theme_client/images/logo.jpg') }}">
            </a>
        </div>
        <nav>
            <a class="{{ Route::is('home') ? 'link-active' : '' }}" href="/">Trang chủ</a>
            <a class="{{ Route::is('list-teachers') ? 'link-active' : '' }}" href="{{ route('list-teachers') }}">Giáo viên</a>
            <a class="{{ Route::is('studentTalkAbout') ? 'link-active' : '' }}" href="{{ route('studentTalkAbout') }}">Học viên</a>
            <a class="{{ Route::is('courses') ? 'link-active' : '' }}" href="{{ route('courses') }}">Khóa học</a>
            <a class="{{ Route::is('write-words') ? 'link-active' : '' }}" href="{{ route('write-words') }}">Cách viết chữ Hán</a>
            <a class="{{ Route::is('contact-client') ? 'link-active' : '' }}" href="{{ route('contact-client') }}">Liên hệ</a>
            @if (Auth::check())
            <a href="{{ route('courses.index') }}">Quản Trị</a>
            @else
            <a class="{{ Route::is('user.loginClient') ? 'link-active' : '' }}" href="{{ route('user.loginClient') }}">Đăng Nhập</a>
            @endif
        </nav>
    </div>
</header>

<div class="carousel-container">
    <div class="carousel-track">
        @foreach ($banners as $banner)
        <div class="carousel-slide">
            <img
                src="{{ $banner->image }}">
        </div>
        @endforeach
    </div>
</div>

<style>
    header {
        position: sticky;
        top: 0px;
        background: white;
        z-index: 999;
    }

    .carousel-container {
        width: 100%;
        margin: 0px auto;
        overflow: hidden;
    }

    .carousel-track {
        display: flex;
        transition: transform 0.5s ease-in-out;
    }

    .carousel-slide {
        min-width: 100%;
        user-select: none;
    }

    .carousel-slide img {
        width: 100%;
        display: block;
    }
</style>

<script>
    function scrollWriter() {
        document.getElementById('write-words').scrollIntoView({
            behavior: 'smooth' // mượt
        });
    }
</script>
@section('script')
<script>
    const track = document.querySelector('.carousel-track');
    const slides = Array.from(track.children);
    let index = 0;
    let startX = 0;
    let currentTranslate = 0;
    let prevTranslate = 0;
    let isDragging = false;
    let animationID;
    let autoSlideInterval;

    // === FUNCTIONS ===

    function setPositionByIndex() {
        currentTranslate = -index * track.offsetWidth;
        prevTranslate = currentTranslate;
        setSliderPosition();
    }

    function setSliderPosition() {
        track.style.transform = `translateX(${currentTranslate}px)`;
    }

    function autoSlide() {
        index = (index + 1) % slides.length;
        setPositionByIndex();
    }

    function startAutoSlide() {
        autoSlideInterval = setInterval(autoSlide, 3000);
    }

    function stopAutoSlide() {
        clearInterval(autoSlideInterval);
    }

    function animation() {
        setSliderPosition();
        if (isDragging) requestAnimationFrame(animation);
    }

    // === TOUCH EVENTS ===
    slides.forEach((slide, i) => {
        const slideImage = slide.querySelector('img');

        // Disable default drag behavior
        slideImage.addEventListener('dragstart', e => e.preventDefault());

        // Touch
        slide.addEventListener('touchstart', touchStart(i));
        slide.addEventListener('touchmove', touchMove);
        slide.addEventListener('touchend', touchEnd);

        // Mouse
        slide.addEventListener('mousedown', touchStart(i));
        slide.addEventListener('mousemove', touchMove);
        slide.addEventListener('mouseup', touchEnd);
        slide.addEventListener('mouseleave', () => {
            if (isDragging) touchEnd();
        });
    });

    function touchStart(i) {
        return function(event) {
            stopAutoSlide();
            index = i;
            startX = event.type.includes('mouse') ? event.pageX : event.touches[0].clientX;
            isDragging = true;
            animationID = requestAnimationFrame(animation);
        };
    }

    function touchMove(event) {
        if (!isDragging) return;
        const currentX = event.type.includes('mouse') ? event.pageX : event.touches[0].clientX;
        const deltaX = currentX - startX;
        currentTranslate = prevTranslate + deltaX;
    }

    function touchEnd() {
        cancelAnimationFrame(animationID);
        isDragging = false;

        const movedBy = currentTranslate - prevTranslate;

        if (movedBy < -100 && index < slides.length - 1) index++;
        if (movedBy > 100 && index > 0) index--;

        setPositionByIndex();
        startAutoSlide();
    }

    // === INIT ===
    window.addEventListener('resize', setPositionByIndex);
    setPositionByIndex();
    startAutoSlide();
</script>
@endsection
