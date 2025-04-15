@extends('client.layouts.master')
@section('title', 'Trang chủ')

@section('main')
<!-- Location Section -->
<section class="location">
  <div class="location-info">
    <h3>Địa điểm dạy Remix - Nhạc Việt Hoa</h3>
    <p>154 đường Remix - Nhạc Việt Hoa, Giữa văn tại trung...</p>
    <h3>Địa điểm dạy Remix - Nhạc Việt Hoa</h3>
    <p>Hinh Ngọc Phú Hoa</p>
  </div>
  <div class="contact">
    <h3>Hướng dẫn viên - Cộng bảo thiên ưu mức</h3>
    <p>Hotline: 0397 487 899</p>
  </div>
</section>

<!-- Instructors Section -->
<section class="instructors">
  <h2>20+ Giáo viên tại năng tỉnh Huế</h2>
  <div class="instructor-grid">
    <div class="instructor">
      <img src="instructor1.jpg" alt="Instructor 1">
      <h4>Benice Abdul</h4>
      <ul>
        <li>Chỉ mời ngay dạy...</li>
        <li>Chứng chỉ...</li>
        <li>10 năm kinh nghiệm...</li>
      </ul>
    </div>
    <div class="instructor">
      <img src="instructor2.jpg" alt="Instructor 2">
      <h4>Richard Appiah</h4>
      <ul>
        <li>Chỉ mời ngay dạy...</li>
        <li>Chứng chỉ...</li>
        <li>10 năm kinh nghiệm...</li>
      </ul>
    </div>
    <div class="instructor">
      <img src="instructor3.jpg" alt="Instructor 3">
      <h4>Boseh Bernard</h4>
      <ul>
        <li>Chỉ mời ngay dạy...</li>
        <li>Chứng chỉ...</li>
        <li>10 năm kinh nghiệm...</li>
      </ul>
    </div>
    <div class="instructor">
      <img src="instructor4.jpg" alt="Instructor 4">
      <h4>Lyton Nakabugo</h4>
      <ul>
        <li>Chỉ mời ngay dạy...</li>
        <li>Chứng chỉ...</li>
        <li>10 năm kinh nghiệm...</li>
      </ul>
    </div>
  </div>
</section>

<!-- Course Images Section -->
<section class="course-images">
  <h2>Hơn 100.000+ học viên từng lựa chọn</h2>
  <div class="image-grid">
    <img src="course1.jpg" alt="Course 1">
    <img src="course2.jpg" alt="Course 2">
    <img src="course3.jpg" alt="Course 3">
    <img src="course4.jpg" alt="Course 4">
  </div>
</section>

<!-- Study Options Section -->
<section class="study-options">
  <h2>Học tiếng Trung theo nhu cầu của bạn</h2>
  <div class="options-grid">
    <div class="option">
      <img src="option1.jpg" alt="Option 1">
      <h4>Du học/Lịch</h4>
    </div>
    <div class="option">
      <img src="option2.jpg" alt="Option 2">
      <h4>Ngôn ngữ #2</h4>
    </div>
    <div class="option">
      <img src="option3.jpg" alt="Option 3">
      <h4>Công việc/Kinh doanh</h4>
    </div>
  </div>
  <h3>Cách viết chữ Hán</h3>
</section>

<!-- Search Section -->
<section class="search">
  <div class="search-bar">
    <img src="logo.png" alt="Logo">
    <input type="text" placeholder="Thư ký tuyển dụng của #">
    <button>Search</button>
  </div>
</section>
@endsection
