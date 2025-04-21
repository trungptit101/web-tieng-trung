<style>
    .footer {
        background-color: #f05a22;
        color: #fff;
    }

    .footer-container {
        margin: 0 auto;
        padding: 20px;
        display: flex;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 20px;
    }

    .footer-column {
        flex: 1;
        min-width: 300px;
    }

    .footer-column h3 {
        font-size: 1.2rem;
        margin-bottom: 10px;
        text-transform: uppercase;

    }

    .footer-column ul {
        list-style: disc;
        margin-left: 20px;
        font-size: 0.9rem;
        line-height: 1.5;
    }

    .footer-column ul li {
        margin-bottom: 5px;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .footer {
            flex-direction: column;
            align-items: center;
        }

        .footer-column {
            width: 100%;
            max-width: 400px;
        }

        .footer-column h3 {
            font-size: 1rem;
        }
    }

    @media (max-width: 480px) {
        .footer {
            padding: 10px;
        }

        .footer-column ul {
            font-size: 0.8rem;
        }
    }

    .social-network-title {
        display: flex;
        align-items: center;
    }

    .fanpage-facebook {
        width: 100%;
    }
</style>
<div class="footer">
    <div class="footer-container container">
        <div class="footer-column">
            <h3>EIA CENTER TRÊN FACEBOOK</h3>
            <div>
                <iframe
                    class="fanpage-facebook"
                    src="https://www.facebook.com/plugins/page.php?href=https://www.facebook.com/hannguhuahualmh"
                    style="border:none;overflow:hidden"
                    scrolling="no" frameborder="0" allowfullscreen="true"
                    allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share">
                </iframe>
            </div>
        </div>
        <div class="footer-column">
            <div class="social-network-title">
                <img style="width: 100px; border-radius: 50%" src="{{ asset('/theme_client/images/logo.jpg') }}">
                <h3>SOCIAL NETWORKS</h3>
            </div>
        </div>
        <div class="footer-column">
            <h3>EIA CENTER</h3>
            <div>
                Trung tâm tiếng Trung Hua Hua tự hào là địa chỉ uy tín dành cho những ai đang theo đuổi hành trình chinh phục tiếng Trung.
                Với đội ngũ giáo viên bản ngữ và Việt Nam giàu kinh nghiệm, phương pháp giảng dạy trực quan, sinh động, chúng tôi mang đến môi trường học tập chất lượng – hiệu quả – truyền cảm hứng.
            </div>
        </div>
        <div class="footer-column">
            <h3>Tiếng Anh giao tiếp EIA Center</h3>
            <ul>
                <li>CS1: Số 19, Đường Phạm Hùng Văn, Thị trấn Đông Hưng, Thái Bình</li>
                <li>Hotline: 094 123 52 82</li>
                <li>CS2: Số 28, Đường Agribank Tiền Hưng, Đông Hưng, Thái Bình</li>
                <li>Hotline: 094 123 52 82</li>
            </ul>
        </div>
        <div class="footer-column">
            <h3>Tiếng Anh trẻ em EIA Center</h3>
            <ul>
                <li>CS1: Số 19, Đường Phạm Hùng Văn, Thị trấn Đông Hưng, Thái Bình</li>
                <li>Hotline: 094 123 52 82</li>
                <li>CS2: Số 28, Đường Agribank Tiền Hưng, Đông Hưng, Thái Bình</li>
                <li>Hotline: 094 123 52 82</li>
            </ul>
        </div>
        <div class="footer-column">
            <h3>Hệ thống luyện thi IELTS EIA</h3>
            <ul>
                <li>CS1: Số 19, Đường Phạm Hùng Văn, Thị trấn Đông Hưng, Thái Bình</li>
                <li>Hotline: 094 123 52 82</li>
                <li>CS2: Số 28, Đường Agribank Tiền Hưng, Đông Hưng, Thái Bình</li>
                <li>Hotline: 094 123 52 82</li>
            </ul>
        </div>
    </div>
</div>
