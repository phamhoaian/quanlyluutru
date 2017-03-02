<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="description" content="Hệ thống khai báo lưu trú trực tuyến, công an phường An Phú" />
        <meta name="keywords" content="cong an phuong an phu, khai bao luu tru truc tuyen" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Đăng nhập - Hệ thống khai báo lưu trú trực tuyến</title>
        <link href="http://fonts.googleapis.com/css?family=Roboto+Condensed:300&amp;subset=vietnamese,latin-ext" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="{{ asset('public/assets/plugins/bootstrap/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('public/assets/plugins/font-awesome/css/font-awesome.min.css') }}">
        <link rel="stylesheet" href="{{ asset('public/assets/css/login.css') }}">
        <link rel="shortcut icon" href="{{ asset('public/favicon.ico') }}" /> 
        <meta name="csrf-token" content="{{ csrf_token() }}">
    </head>
    <body>
        <div id="header">
                <ul class="logo">
                    <li class="title">Công An Phường An Phú</li>
                    <li class="image">
                        <img src="{{ asset('public/assets/img/logo.png') }}" alt="Công An Phường An Phú">
                    </li>
                    <li class="title">Thị Xã Thuận An, Bình Dương</li>
                </ul>
            </div>
        <div id="login">
            <div id="content">
                <div class="title">
                    <div class="bg"></div>
                    <div class="text">
                        <h2>Hệ thống</h2>
                        <h1>Khai báo lưu trú trực tuyến</h1>
                    </div>
                </div>
                <div class="wrapper">
                    <form class="login-form" action="{{ url('/dang-nhap') }}" method="POST">
                        {{ csrf_field() }}
                        <div class="form-title">Đăng nhập</div>
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <input type="text" class="form-control" autocomplete="off" placeholder="Email" name="email" value="{{ old('email') }}">
                            @if ($errors->has('email'))
                                <span class="help-block help-block-error">
                                    {{ $errors->first('email') }}
                                </span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <input type="password" class="form-control" autocomplete="off" placeholder="Mật khẩu" name="password">
                            @if ($errors->has('password'))
                                <span class="help-block help-block-error">
                                    {{ $errors->first('password') }}
                                </span>
                            @endif
                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn">Đăng nhập</button>
                            <a href="{{ route('user.resetPassword') }}">Quên mật khẩu?</a>
                        </div>
                    </form>
                    <div class="clear"></div>
                </div>
            </div>
        </div>
        <div id="footer">
            <div class="wrapper">
                <div class="left">
                    <h3 class="support-phone">
                        <i class="fa fa-phone"></i>&nbsp;
                        <span>Liên hệ hỗ trợ:&nbsp;</span>
                        <strong>06503 711 113</strong>
                    </h3>
                </div>
                <div class="right">
                    <p class="copyright"><?php echo date('Y'); ?> &copy; Công An Phường An Phú</p>
                </div>
            </div>
            </div>
        <script src="{{ asset('public/assets/scripts/jquery.min.js') }}"></script>
        <script src="{{ asset('public/assets/plugins/jquery-validation/js/jquery.validate.min.js') }}"></script>
        <script src="{{ asset('public/assets/scripts/login.js') }}"></script>
    </body>
</html>