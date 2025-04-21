<header>
    <div class="logo">
        <img src="{{ asset('/theme_client/images/logo.jpg') }}" >
    </div>
    <nav>
        <a href="#">Trang chủ</a>
        <a href="#">Profile giáo viên</a>
        <a href="#">Học viên khóa học</a>
        <a href="#">Dịch vụ</a>
        <a href="#">Việt - Chào</a>
        <a href="#">Liên hệ</a>
    </nav>
</header>

<div class="carousel-container">
    <div class="carousel-track">
        <div class="carousel-slide">
            <img
                src="https://scontent.fhan5-9.fna.fbcdn.net/v/t39.30808-6/434283029_122195628014001934_616319980032949590_n.png?stp=dst-png_s960x960&_nc_cat=110&ccb=1-7&_nc_sid=cc71e4&_nc_ohc=dAb1TdwB9pgQ7kNvwGtDrGI&_nc_oc=Adn4BGK60J2gSNFLVwbfgK0Cce0gtECdW7j33zFOBf84fCuYTgLtpeVsrsnzMonuyeY&_nc_zt=23&_nc_ht=scontent.fhan5-9.fna&_nc_gid=GjmYgmTJGvA5d_Ktlf4UNQ&oh=00_AfHqosnUL-og1ZwMrnLheFUL9lbyJYJyUpu-IrCeTiwbkA&oe=68045376">
        </div>
        <div class="carousel-slide">
            <img
                src="https://scontent.fhan5-9.fna.fbcdn.net/v/t39.30808-6/434283029_122195628014001934_616319980032949590_n.png?stp=dst-png_s960x960&_nc_cat=110&ccb=1-7&_nc_sid=cc71e4&_nc_ohc=dAb1TdwB9pgQ7kNvwGtDrGI&_nc_oc=Adn4BGK60J2gSNFLVwbfgK0Cce0gtECdW7j33zFOBf84fCuYTgLtpeVsrsnzMonuyeY&_nc_zt=23&_nc_ht=scontent.fhan5-9.fna&_nc_gid=GjmYgmTJGvA5d_Ktlf4UNQ&oh=00_AfHqosnUL-og1ZwMrnLheFUL9lbyJYJyUpu-IrCeTiwbkA&oe=68045376">
        </div>
        <div class="carousel-slide">
            <img
                src="https://scontent.fhan5-9.fna.fbcdn.net/v/t39.30808-6/434283029_122195628014001934_616319980032949590_n.png?stp=dst-png_s960x960&_nc_cat=110&ccb=1-7&_nc_sid=cc71e4&_nc_ohc=dAb1TdwB9pgQ7kNvwGtDrGI&_nc_oc=Adn4BGK60J2gSNFLVwbfgK0Cce0gtECdW7j33zFOBf84fCuYTgLtpeVsrsnzMonuyeY&_nc_zt=23&_nc_ht=scontent.fhan5-9.fna&_nc_gid=GjmYgmTJGvA5d_Ktlf4UNQ&oh=00_AfHqosnUL-og1ZwMrnLheFUL9lbyJYJyUpu-IrCeTiwbkA&oe=68045376">
        </div>
        <div class="carousel-slide">
            <img
                src="https://scontent.fhan5-9.fna.fbcdn.net/v/t39.30808-6/434283029_122195628014001934_616319980032949590_n.png?stp=dst-png_s960x960&_nc_cat=110&ccb=1-7&_nc_sid=cc71e4&_nc_ohc=dAb1TdwB9pgQ7kNvwGtDrGI&_nc_oc=Adn4BGK60J2gSNFLVwbfgK0Cce0gtECdW7j33zFOBf84fCuYTgLtpeVsrsnzMonuyeY&_nc_zt=23&_nc_ht=scontent.fhan5-9.fna&_nc_gid=GjmYgmTJGvA5d_Ktlf4UNQ&oh=00_AfHqosnUL-og1ZwMrnLheFUL9lbyJYJyUpu-IrCeTiwbkA&oe=68045376">
        </div>
    </div>
</div>

<style>
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
        autoSlideInterval = setInterval(autoSlide, 300000);
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
