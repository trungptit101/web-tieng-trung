<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <link href="{{ asset('/theme_admin/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <link rel="icon" href="https://sanpay.vn/images/logo-mini.png" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('/theme_admin/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/theme_admin/css/toastr.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/theme_admin/css/jquery-ui.css') }}">
    <link rel="stylesheet" href="{{ asset('/theme_admin/css/jquery.datetimepicker.css') }}">
    <script src="{{ asset('/theme_admin/vendor/ckeditor/ckeditor.js') }}"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <meta name="description" content="sanpay.vn">

    <!-- Google / Search Engine Tags -->
    <meta itemprop="name" content="Trang chủ">
    <meta itemprop="description" content="sanpay.vn">
    <meta itemprop="image" content="https://sanpay.vn/images/logo-mini.png">

    <!-- Facebook Meta Tags -->
    <meta property="og:url" content="https://sanpay.vn/">
    <meta property="og:type" content="sanpay.vn">
    <meta property="og:title" content="Trang chủ">
    <meta property="og:description" content="sanpay.vn">
    <meta property="og:image" content="https://sanpay.vn/images/logo-mini.png">

    <!-- Twitter Meta Tags -->
    <meta name="twitter:card" content="sanpay.vn">
    <meta name="twitter:title" content="Trang chủ">
    <meta name="twitter:description" content="sanpay.vn">
    <link rel="icon" type="image/png" href="https://sanpay.vn/images/logo-mini.png">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="opensearch" rel="search" title="Tìm kiếm trên sanpay.vn" type="application/opensearchdescription+xml">
    @yield('css')
    <style>
        .main-sidebar {
            background-color: #0e0e0e;
        }
        .content-wrapper table td {
            vertical-align: middle;
        }

        .laravel-embed__responsive-wrapper {
            padding-bottom: 0px !important;
        }

        input[type="file"] {
            border: none;
            padding: 0;
        }
    </style>
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        @include('admin.layouts.header')
        @include('admin.layouts.nav')
        @yield('content')
        <footer class="main-footer">
            <div class="float-right d-none d-sm-inline">
            </div>
            <strong>Copyright &copy; {{ date('Y') }}</strong>
        </footer>
    </div>
    <!-- Messenger Plugin chat Code -->
    <div id="fb-root"></div>

    <!-- Your Plugin chat code -->
    <div id="fb-customer-chat" class="fb-customerchat">
    </div>

    <script>
        var chatbox = document.getElementById('fb-customer-chat');
        chatbox.setAttribute("page_id", "106678125539321");
        chatbox.setAttribute("attribution", "biz_inbox");
    </script>

    <!-- Your SDK code -->
    <!-- <script>
        window.fbAsyncInit = function() {
            FB.init({
                xfbml: true,
                version: 'v15.0'
            });
        };

        (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s);
            js.id = id;
            js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js';
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script> -->
    <!-- jQuery -->
    <script src="{{ asset('/theme_admin/vendor/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('/theme_admin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('/theme_admin/js/toastr.min.js') }}"></script>
    <script src="{{ asset('/theme_admin/js/adminlte.min.js') }}"></script>
    <script src="{{ asset('/theme_admin/js/jquery.validate.min.js') }}"></script>
    <script !src="">
        $.extend($.validator.messages, {
            required: "Trường này không được trống!",
            remote: "Hãy sửa cho đúng.",
            email: "Địa chỉ email không hợp lệ!",
            url: "Địa chỉ không hợp lệ!",
            date: "Thời gian không hợp lệ!",
            dateISO: "Hãy nhập ngày (ISO).",
            number: "Hãy nhập số.",
            digits: "Hãy nhập chữ số.",
            creditcard: "Hãy nhập số thẻ tín dụng.",
            equalTo: "Giá trị nhập vào không đúng!",
            extension: "Phần mở rộng không đúng.",
            maxlength: $.validator.format("Hãy nhập từ {0} kí tự trở xuống."),
            minlength: $.validator.format("Hãy nhập từ {0} kí tự trở lên."),
            rangelength: $.validator.format("Hãy nhập từ {0} đến {1} kí tự."),
            range: $.validator.format("Hãy nhập từ {0} đến {1}."),
            max: $.validator.format("Hãy nhập từ {0} trở xuống."),
            min: $.validator.format("Hãy nhập từ {0} trở lên.")
        });

        $.validator.setDefaults({
            submitHandler: function(form) {
                form.submit();
            }
        });

        $.validator.addMethod("greaterThanDate",
            function(value, element, params) {
                if (!/Invalid|NaN/.test(new Date(value))) {
                    return new Date(value) > new Date($(params).val());
                }
                return isNaN(value) && isNaN($(params).val()) ||
                    (Number(value) > Number($(params).val()));
            }, 'Hãy nhập từ {0} trở lên!');

        $.validator.addMethod("notEqual", function(value, element, param) {
            return this.optional(element) || value != $(param).val();
        }, "Giá trị nhập vào đã bị trùng!");

        var errorHighLight = {
            onfocusout: function(element) {
                $(element).valid()
            },
            onkeyup: function(element) {
                $(element).valid()
            },
            onclick: false,
            errorElement: 'span',
            errorPlacement: function(error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group div').append(error);
            },
            highlight: function(element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            }
        };

        //delete notice;
        $('.btn-delete-notice').click(function() {
            $(this).parent().parent().parent().attr("href", "javascript:void(0)");
            var deleteNoticeForm = $(this).closest('form');
            deleteNoticeForm.submit();
        });

        function markNotificationAsRead(commentId) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('li.display-notifiaction').click(function() {
                $.ajax({
                    url: `/notice/mark-as-read`,
                    method: "POST",
                    async: false,
                    success: function(data) {},
                    error: function() {}
                });
            });
        }
        markNotificationAsRead();
    </script>
    @include('admin.layouts.notification')
    @yield('js')

    <!-- Load Facebook SDK for JavaScript -->
    <div id="fb-root"></div>
    <!-- <script>
        window.fbAsyncInit = function() {
            FB.init({
                xfbml: true,
                version: 'v9.0'
            });
        };

        (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s);
            js.id = id;
            js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script> -->

    <!-- Your Chat Plugin code -->
    <!-- <div class="fb-customerchat" attribution=setup_tool page_id="104817021560916" logged_in_greeting="Xin chào ! Tôi có thể giúp gì cho bạn" logged_out_greeting="Xin chào ! Tôi có thể giúp gì cho bạn">

    </div> -->
</body>

</html>
