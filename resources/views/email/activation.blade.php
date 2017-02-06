<!DOCTYPE html>
<html lang="vi">
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        <h2>Kích hoạt tài khoản khai báo lưu trú trực tuyến</h2>
        <p>
            Hãy nhấn vào liên kết dưới đây để kích hoạt tài khoản của bạn
            {{ URL::to('tai-khoan/kich-hoat/' . $active_key) }}.<br/>
        </p>
        <p>
            Vui lòng sử dụng thông tin tài khoản bên dưới để đăng nhập vào hệ thống sau khi đã kích hoạt tài khoản
        </p>
        <p>
            Email: {{ $email }}
        </p>
        <p>
            Mật khẩu: {{ $password }}
        </p>
    </body>
</html>