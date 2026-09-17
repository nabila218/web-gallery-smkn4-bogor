<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login Admin — SMK Negeri 4 Bogor</title>

    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
    >

    <style>

        * {
            box-sizing: border-box;
        }

        html,
        body {
            margin: 0;
            padding: 0;
            width: 100%;
            height: 100%;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            overflow: hidden;
        }


        /* =====================================================
           HALAMAN LOGIN
        ===================================================== */

        .login-page {
            width: 100%;
            height: 100vh;

            position: relative;

            background-image:
                linear-gradient(
                    90deg,
                    rgba(10, 65, 155, 0.90) 0%,
                    rgba(20, 81, 170, 0.78) 32%,
                    rgba(20, 81, 170, 0.38) 60%,
                    rgba(20, 81, 170, 0.05) 100%
                ),
                url("{{ asset('storage/banner/banner-home.JPEG') }}");

            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }


        /* =====================================================
           LOGO SEKOLAH KIRI ATAS
        ===================================================== */

        .school-brand {
            position: absolute;

            top: 18px;
            left: 7.5%;

            display: flex;
            align-items: center;

            z-index: 2;
        }

        .school-brand img {
            width: 58px;
            height: 58px;

            object-fit: contain;
        }

        .school-brand-text {
            margin-left: 9px;

            color: white;

            font-size: 18px;
            font-weight: 700;

            line-height: 1.05;

            text-transform: uppercase;
        }


        /* =====================================================
           KONTEN KIRI
        ===================================================== */

        .login-left {
            position: absolute;

            left: 8%;

            top: 50%;
            transform: translateY(-43%);

            width: 39%;

            color: white;
        }


        .welcome-small {
            margin: 0 0 8px 0;

            font-size: 28px;
            font-weight: 700;

            line-height: 1.1;
        }


        .welcome-title {
            margin: 0;

            font-size: 52px;
            font-weight: 800;

            line-height: 1.02;
        }


        .welcome-school {
            margin-top: 4px;

            font-size: 43px;
            font-weight: 800;

            line-height: 1.05;

            color: #55a8ff;
        }


        /* =====================================================
           GARIS KUNING
        ===================================================== */

        .yellow-line {
            width: 90px;
            height: 3px;

            background: #f6c400;

            margin-top: 24px;
        }


        /* =====================================================
           TEKS PENJELASAN
        ===================================================== */

        .login-description {
            margin-top: 29px;

            font-size: 16px;
            font-weight: 600;

            line-height: 2.05;

            color: rgba(255,255,255,0.76);
        }


        /* =====================================================
           GARIS PEMISAH
        ===================================================== */

        .quote-line {
            width: 390px;
            max-width: 100%;

            height: 2px;

            margin-top: 27px;

            background: rgba(255,255,255,0.35);
        }


        /* =====================================================
           QUOTE
        ===================================================== */

        .quote {
            margin-top: 21px;

            display: flex;
            align-items: flex-start;

            gap: 12px;
        }

        .quote-mark {
            font-size: 38px;

            line-height: 0.8;

            color: #54a9ff;
        }

        .quote-text {
            font-size: 15px;

            font-weight: 600;

            line-height: 1.25;

            color: #55a8ff;
        }


        /* =====================================================
           INFO BAWAH
        ===================================================== */

        .security-info {
            margin-top: 27px;

            display: flex;
            align-items: center;

            gap: 14px;
        }

        .security-icon {
            width: 40px;
            height: 40px;

            border: 1px solid rgba(255,255,255,0.65);

            border-radius: 50%;

            display: flex;
            align-items: center;
            justify-content: center;

            color: white;

            font-size: 15px;

            flex-shrink: 0;
        }

        .security-text {
            font-size: 14px;

            font-weight: 700;

            line-height: 1.25;

            color: white;
        }


        /* =====================================================
           CARD LOGIN
        ===================================================== */

        .login-card {
            position: absolute;

            right: 8%;

            top: 50%;
            transform: translateY(-50%);

            width: 425px;

            padding: 34px 42px 27px;

            background: white;

            border: 2px solid #17479c;

            border-radius: 8px;

            box-shadow: none;
        }


        /* =====================================================
           LOGO LOGIN
        ===================================================== */

        .login-logo {
            width: 60px;
            height: 60px;

            object-fit: contain;

            display: block;

            margin: 0 auto 10px;
        }


        /* =====================================================
           JUDUL LOGIN
        ===================================================== */

        .login-title {
            margin: 0;

            text-align: center;

            color: #123f8f;

            font-size: 27px;
            font-weight: 700;
        }

        .login-subtitle {
            margin-top: 5px;

            text-align: center;

            color: #888;

            font-size: 15px;
            font-weight: 600;
        }


        /* =====================================================
           GARIS LOGIN
        ===================================================== */

        .login-divider {
            position: relative;

            width: 100%;

            height: 1px;

            background: #e5e5e5;

            margin: 15px 0;
        }

        .login-divider::after {
            content: "";

            position: absolute;

            left: 50%;
            top: 50%;

            transform: translate(-50%, -50%);

            width: 8px;
            height: 8px;

            background: #eeeeee;

            border-radius: 50%;
        }


        /* =====================================================
           FORM
        ===================================================== */

        .form-group {
            margin-bottom: 20px;
        }

        .form-label {
            display: block;

            margin-bottom: 7px;

            color: #111;

            font-size: 14px;
            font-weight: 700;
        }

        .input-wrapper {
            position: relative;
        }

        .input-wrapper > i {
            position: absolute;

            left: 12px;
            top: 50%;

            transform: translateY(-50%);

            color: #8b8b8b;

            font-size: 18px;

            pointer-events: none;
        }

        .form-input {
            width: 100%;

            height: 47px;

            padding: 0 42px;

            border: 2px solid #999;

            border-radius: 7px;

            outline: none;

            font-size: 14px;

            color: #111;

            background: white;
        }

        .form-input:focus {
            border-color: #17479c;
        }

        .password-toggle {
            position: absolute;

            right: 12px;
            top: 50%;

            transform: translateY(-50%);

            border: none;

            background: transparent;

            color: #888;

            cursor: pointer;

            font-size: 17px;
        }


        /* =====================================================
           REMEMBER + LUPA PASSWORD
        ===================================================== */

        .form-options {
            display: flex;

            align-items: center;
            justify-content: space-between;

            margin-top: -3px;
            margin-bottom: 23px;

            font-size: 13px;
        }

        .remember {
            display: flex;

            align-items: center;

            gap: 6px;

            font-weight: 700;
        }

        .remember input {
            width: 14px;
            height: 14px;
        }

        .forgot-password {
            color: #155eef;

            text-decoration: none;

            font-weight: 700;
        }


        /* =====================================================
           TOMBOL LOGIN
        ===================================================== */

        .login-button {
            width: 100%;

            height: 47px;

            border: none;

            border-radius: 6px;

            background: #17479c;

            color: white;

            font-size: 15px;
            font-weight: 700;

            cursor: pointer;
        }

        .login-button:hover {
            background: #123d89;
        }


        /* =====================================================
           FOOTER
        ===================================================== */

        .login-footer {
            margin-top: 45px;

            text-align: center;

            color: #888;

            font-size: 13px;
        }


        /* =====================================================
           RESPONSIVE
        ===================================================== */

        @media (max-width: 1000px) {

            .login-left {
                left: 5%;
                width: 43%;
            }

            .welcome-small {
                font-size: 25px;
            }

            .welcome-title {
                font-size: 44px;
            }

            .welcome-school {
                font-size: 37px;
            }

            .login-card {
                right: 5%;
                width: 390px;
            }
        }


        @media (max-width: 800px) {

            body {
                overflow: auto;
            }

            .login-page {
                min-height: 100vh;
                height: auto;

                padding: 30px 20px;
            }

            .school-brand {
                position: relative;

                top: auto;
                left: auto;

                margin-bottom: 35px;
            }

            .login-left {
                position: relative;

                top: auto;
                left: auto;

                transform: none;

                width: 100%;

                margin-bottom: 35px;
            }

            .login-card {
                position: relative;

                top: auto;
                right: auto;

                transform: none;

                width: 100%;

                max-width: 425px;

                margin: 0 auto;
            }
        }

    </style>
</head>


<body>

<div class="login-page">


    {{-- =====================================================
         LOGO SEKOLAH
    ====================================================== --}}

    <div class="school-brand">

        <img
            src="{{ asset('images/logo.png') }}"
            alt="Logo SMK Negeri 4 Bogor"
        >

        <div class="school-brand-text">
            SMK NEGERI 4<br>
            BOGOR
        </div>

    </div>


    {{-- =====================================================
         BAGIAN KIRI
    ====================================================== --}}

    <div class="login-left">

        <div class="welcome-small">
            Selamat Datang di
        </div>

        <h1 class="welcome-title">
            Admin Panel
        </h1>

        <div class="welcome-school">
            SMKN 4 Bogor
        </div>

        <div class="yellow-line"></div>


        <div class="login-description">
            Silahkan login untuk mengakses dashboard<br>
            dan mengelola konten website sekolah.
        </div>


        <div class="quote-line"></div>


        <div class="quote">

            <div class="quote-mark">
                “
            </div>

            <div class="quote-text">
                Bersama Membangun Generasi Unggul,<br>
                Berkarakter dan Berkompeten.
            </div>

        </div>


        <div class="security-info">

            <div class="security-icon">
                <i class="fa-solid fa-chevron-down"></i>
            </div>

            <div class="security-text">
                Sistem aman dan hanya bisa diakses oleh<br>
                administrator yang berwenang.
            </div>

        </div>

    </div>


    {{-- =====================================================
         CARD LOGIN
    ====================================================== --}}

    <div class="login-card">

        <img
            src="{{ asset('images/logo.png') }}"
            alt="Logo SMK Negeri 4 Bogor"
            class="login-logo"
        >


        <h2 class="login-title">
            Login Admin
        </h2>

        <div class="login-subtitle">
            SMKN 4 BOGOR
        </div>


        <div class="login-divider"></div>


        <form
            method="POST"
            action="{{ route('login') }}"
            autocomplete="off"
        >

            @csrf


            {{-- EMAIL --}}

            <div class="form-group">

                <label class="form-label">
                    Email
                </label>

                <div class="input-wrapper">

                    <i class="fa-regular fa-envelope"></i>

                    <input
                        type="email"
                        name="email"
                        class="form-input"
                        autocomplete="off"
                        value=""
                        required
                    >

                </div>

            </div>


            {{-- PASSWORD --}}

            <div class="form-group">

                <label class="form-label">
                    Password
                </label>

                <div class="input-wrapper">

                    <i class="fa-solid fa-lock"></i>

                    <input
                        type="password"
                        name="password"
                        id="password"
                        class="form-input"
                        autocomplete="new-password"
                        required
                    >

                    <button
                        type="button"
                        class="password-toggle"
                        onclick="togglePassword()"
                    >
                        <i
                            class="fa-regular fa-eye-slash"
                            id="eyeIcon"
                        ></i>
                    </button>

                </div>

            </div>


            {{-- OPTIONS --}}

            <div class="form-options">

                <label class="remember">

                    <input
                        type="checkbox"
                        name="remember"
                    >

                    <span>
                        Ingat saya
                    </span>

                </label>


                <a
                    href="{{ route('password.request') }}"
                    class="forgot-password"
                >
                    Lupa password?
                </a>

            </div>


            {{-- LOGIN --}}

            <button
                type="submit"
                class="login-button"
            >
                Login
            </button>

        </form>


        <div class="login-footer">
            @2026 SMK Negeri 4 Bogor
        </div>

    </div>

</div>


<script>

function togglePassword() {

    const password =
        document.getElementById('password');

    const icon =
        document.getElementById('eyeIcon');


    if (password.type === 'password') {

        password.type = 'text';

        icon.classList.remove(
            'fa-eye-slash'
        );

        icon.classList.add(
            'fa-eye'
        );

    } else {

        password.type = 'password';

        icon.classList.remove(
            'fa-eye'
        );

        icon.classList.add(
            'fa-eye-slash'
        );

    }

}

</script>

</body>
</html>