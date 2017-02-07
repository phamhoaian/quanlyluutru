<!DOCTYPE html>
<html lang="vi">
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        <h2>Khôi phục mật khẩu tài khoản khai báo lưu trú trực tuyến</h2>
        <p>
            Bạn đã gửi một yêu cầu khôi phục lại mật khẩu.
        </p>
        <p>
            Vui lòng sử dụng thông tin tài khoản bên dưới để đăng nhập vào hệ thống {{ URL::to('/') }}.
        </p>
        <p>
            Email: {{ $email }}
        </p>
        <p>
            Mật khẩu: {{ $password }}
        </p>
    </body>
</html>