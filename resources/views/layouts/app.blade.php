<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{-- FONT AWESOME --}}
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
    >

    <title>
        @yield('title', 'SMK Negeri 4 Bogor')
    </title>


    <style>

        /* =====================================================
           GLOBAL
        ===================================================== */

        * {
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
            scroll-padding-top: 56px;
        }

        body {
            margin: 0;
            padding: 0;

            font-family: Arial, Helvetica, sans-serif;

            color: #111827;

            background: #ffffff;
        }

        main {
            width: 100%;
        }


        /* =====================================================
           NAVBAR
        ===================================================== */

        .navbar {
            width: 100%;
            height: 56px;
            background: #ffffff;

            display: flex;
            align-items: center;

            padding: 0 45px;

            position: sticky;
            top: 0;

            z-index: 1000;
        }


        /* =====================================================
           LOGO + NAMA SEKOLAH
        ===================================================== */

        .navbar-brand {
            height: 100%;

            display: flex;
            align-items: center;

            flex-shrink: 0;

            text-decoration: none;

            transform: translateY(2px);
        }


        .navbar-logo {
            width: 54px;
            height: 54px;

            object-fit: contain;

            display: block;

            margin-right: 10px;
        }


        .navbar-school-name {
            width: 145px;

            color: #0645c0;

            font-size: 15px;

            font-weight: 700;

            line-height: 1.08;

            text-transform: uppercase;

            white-space: nowrap;
        }


        /* =====================================================
           MENU NAVBAR
        ===================================================== */

        .navbar-menu {
            height: 56px;

            margin-left: auto;

            display: flex;

            align-items: center;

            gap: 0;

            position: relative;
        }


        .navbar-menu a {
            position: relative;

            height: 56px;

            display: flex;

            align-items: center;

            justify-content: center;

            padding: 0 17px;

            color: #000000;

            text-decoration: none;

            font-size: 13px;

            font-weight: 700;

            white-space: nowrap;

            transition: color 0.15s ease;
        }


        /* =====================================================
           MENU AKTIF
        ===================================================== */

        .navbar-menu a.active {
            color: #155eef;
        }


        /* =====================================================
           GARIS BIRU BERGERAK
        ===================================================== */

        .navbar-indicator {
            position: absolute;

            left: 0;
            bottom: 0;

            height: 3px;

            background: #155eef;

            width: 0;

            pointer-events: none;

            transition:
                left 0.18s ease,
                width 0.18s ease;
        }


        .navbar-menu a:hover {
            color: #155eef;
        }


        /* =====================================================
           LOGIN
        ===================================================== */

        .navbar-login {
            display: inline-flex;

            align-items: center;
            justify-content: center;

            margin-left: 8px;

            padding: 7px 14px;

            background: #0645c0;

            color: #ffffff;

            border-radius: 6px;

            text-decoration: none;

            font-size: 13px;

            font-weight: 700;

            white-space: nowrap;

            transition: background 0.15s ease;
        }


        .navbar-login:hover {
            background: #053a9f;

            color: #ffffff;
        }


        /* =====================================================
           RESPONSIVE — 1200px
        ===================================================== */

        @media (max-width: 1200px) {

            .navbar {

                padding: 0 40px;
            }


            .navbar-logo {

                width: 55px;

                height: 60px;
            }


            .navbar-school-name {

                width: 145px;

                font-size: 16px;
            }


            .navbar-menu a {

                padding: 0 15px;

                font-size: 14px;
            }


            .navbar-login {

                margin-left: 8px;

                padding: 7px 14px;

                font-size: 14px;
            }

        }


        /* =====================================================
           RESPONSIVE — 900px
        ===================================================== */

        @media (max-width: 900px) {

            .navbar {

                height: auto;

                min-height: 62px;

                padding: 8px 25px;

                flex-wrap: wrap;
            }


            .navbar-logo {

                width: 50px;

                height: 55px;
            }


            .navbar-school-name {

                width: auto;

                font-size: 15px;
            }


            .navbar-menu {

                width: 100%;

                height: 50px;

                overflow-x: auto;

                margin-top: 8px;
            }


            .navbar-menu a {

                height: 50px;

                padding: 0 14px;

                font-size: 14px;
            }


            .navbar-login {

                margin-left: 10px;

                margin-top: 8px;

                margin-bottom: 8px;
            }

        }


        /* =====================================================
           RESPONSIVE — 600px
        ===================================================== */

        @media (max-width: 600px) {

            .navbar {

                padding: 8px 18px;
            }


            .navbar-logo {

                width: 45px;

                height: 50px;

                margin-right: 9px;
            }


            .navbar-school-name {

                font-size: 14px;
            }


            .navbar-menu {

                height: 46px;

                margin-top: 7px;
            }


            .navbar-menu a {

                height: 46px;

                padding: 0 12px;

                font-size: 13px;
            }


            .navbar-login {

                padding: 7px 13px;

                font-size: 13px;
            }

        }

        /* =========================================================
       FOOTER
    ========================================================= */

    .site-footer {
        width: 100%;
        background: #123b82;
        color: #ffffff;
    }

    .footer-inner {
        width: 100%;
        max-width: 1200px;
        margin: 0 auto;
        padding: 40px 40px 0;
    }

    /* =========================
       FOOTER MAIN
    ========================= */

    .footer-main {
        display: grid;
        grid-template-columns: 1.5fr 1fr 0.8fr;
        gap: 65px;
        padding-bottom: 34px;
    }

    /* =========================
       IDENTITAS SEKOLAH
    ========================= */

    .footer-brand {
        display: flex;
        align-items: flex-start;
        gap: 14px;
    }

    .footer-logo {
        width: 58px;
        height: 58px;
        object-fit: contain;
        display: block;
        flex-shrink: 0;
    }

    .footer-brand-text {
        padding-top: 2px;
    }

    .footer-school-name {
        margin: 0;
        font-size: 17px;
        line-height: 1.25;
        font-weight: 700;
        letter-spacing: 0.2px;
    }

    .footer-school-description {
        margin: 15px 0 0;
        max-width: 320px;
        font-size: 13px;
        line-height: 1.6;
        font-weight: 400;
        color: rgba(255, 255, 255, 0.78);
    }

    /* =========================
       JUDUL KOLOM
    ========================= */

    .footer-column-title {
    margin: 2px 0 17px;
    font-size: 14px;
    line-height: 1.3;
    font-weight: 700;
    letter-spacing: 0.3px;
    text-transform: uppercase;
}

/* =========================
   NAVIGASI
========================= */

.footer-column:nth-child(2) {
    transform: translateX(-35px);
}

.footer-column:nth-child(2) .footer-column-title {
    margin: 2px 0 17px;
    text-align: center;
    transform: translateX(-70px);
}

.footer-nav {
    display: grid;
    grid-template-columns: max-content max-content;
    column-gap: 48px;
    row-gap: 11px;

    width: 285px;
    margin: 0;
}

.footer-nav a {
    color: rgba(255, 255, 255, 0.78);
    text-decoration: none;
    font-size: 13px;
    line-height: 1.4;
    font-weight: 400;
    white-space: nowrap;
    transition: color 0.2s ease;
}

.footer-nav a:hover {
    color: #ffffff;
}

    /* =========================
   PROGRAM KEAHLIAN
========================= */

.footer-program {
    display: flex;
    flex-direction: column;
    gap: 11px;
    margin-top: 2px;
}

.footer-program a {
    color: rgba(255, 255, 255, 0.78);
    text-decoration: none;
    font-size: 13px;
    line-height: 1.4;
    font-weight: 400;
    transition: color 0.2s ease;
}

.footer-program a:hover {
    color: #ffffff;
}

    /* =========================
       SOSIAL MEDIA
    ========================= */

    .footer-social {
        display: flex;
        align-items: center;
        flex-wrap: wrap;
        gap: 10px;
        margin-top: 2px;
    }

    .footer-social a {
        width: 34px;
        height: 34px;
        border: 1px solid rgba(255, 255, 255, 0.35);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #ffffff;
        text-decoration: none;
        transition:
            background 0.2s ease,
            border-color 0.2s ease,
            transform 0.2s ease;
    }

    .footer-social a:hover {
        background: rgba(255, 255, 255, 0.12);
        border-color: rgba(255, 255, 255, 0.7);
        transform: translateY(-2px);
    }

    .footer-social i {
        font-size: 15px;
        line-height: 1;
    }

    /* =========================
       FOOTER BOTTOM
    ========================= */

    .footer-bottom {
        border-top: 1px solid rgba(255, 255, 255, 0.18);
        padding: 17px 0;
        text-align: center;
    }

    .footer-copyright {
        margin: 0;
        font-size: 12px;
        line-height: 1.4;
        font-weight: 400;
        color: rgba(255, 255, 255, 0.65);
    }

    /* =========================
       RESPONSIVE
    ========================= */

    @media (max-width: 900px) {

        .footer-inner {
            padding: 36px 30px 0;
        }

        .footer-main {
            grid-template-columns: 1fr 1fr;
            gap: 35px;
        }

        .footer-brand {
            grid-column: 1 / -1;
        }

        .footer-school-description {
            max-width: 420px;
        }
    }

    @media (max-width: 600px) {

        .footer-inner {
            padding: 32px 22px 0;
        }

        .footer-main {
            grid-template-columns: 1fr;
            gap: 28px;
        }

        .footer-brand {
            grid-column: auto;
        }

        .footer-logo {
            width: 52px;
            height: 52px;
        }

        .footer-school-name {
            font-size: 16px;
        }

        .footer-school-description {
            max-width: 280px;
            font-size: 12px;
        }

        .footer-column-title {
            font-size: 13px;
            margin-bottom: 13px;
        }

        .footer-nav {
            max-width: 250px;
        }

        .footer-nav a {
            font-size: 12px;
        }

        .footer-bottom {
            padding: 15px 0;
        }

        .footer-copyright {
            font-size: 11px;
        }
    }

    </style>


    @yield('head')

</head>


<body>


    {{-- =====================================================
         NAVBAR
    ===================================================== --}}

    <header class="navbar">


        {{-- LOGO + NAMA SEKOLAH --}}

        <a href="/" class="navbar-brand">

            <img
                src="{{ asset('images/logo.png') }}"
                alt="Logo SMK Negeri 4 Bogor"
                class="navbar-logo"
            >


            <div class="navbar-school-name">

                SMK NEGERI 4<br>

                BOGOR

            </div>

        </a>



        {{-- =================================================
            MENU
        ================================================== --}}

            <nav class="navbar-menu">

                <span class="navbar-indicator"></span>


                {{-- BERANDA --}}

                <a
                    href="{{ route('home') }}#beranda"
                    class="nav-link"
                    data-section="beranda"
                >
                    BERANDA
                </a>


                {{-- SAMBUTAN --}}

                <a
                    href="{{ request()->routeIs('home')
                        ? '#sambutan'
                        : route('page.show', 'sambutan-kepala-sekolah') }}"
                    class="nav-link"
                    data-section="sambutan"
                >
                    SAMBUTAN
                </a>


                {{-- PROFIL --}}

                <a
                    href="{{ request()->routeIs('home')
                        ? '#profil'
                        : route('page.show', 'tentang-sekolah') }}"
                    class="nav-link"
                    data-section="profil"
                >
                    PROFIL
                </a>


                {{-- PROGRAM --}}

                <a
                    href="{{ request()->routeIs('home')
                        ? '#program'
                        : route('program.show', 'pplg') }}"
                    class="nav-link"
                    data-section="program"
                >
                    PROGRAM
                </a>


                {{-- ARTIKEL --}}

                <a
                    href="{{ request()->routeIs('home')
                        ? '#artikel'
                        : route('articles.index') }}"
                    class="nav-link"
                    data-section="artikel"
                >
                    ARTIKEL
                </a>


                {{-- GALERI --}}

                <a
                    href="{{ request()->routeIs('home')
                        ? '#galeri'
                        : route('gallery.index') }}"
                    class="nav-link"
                    data-section="galeri"
                >
                    GALERI
                </a>


                {{-- KONTAK --}}

                <a
                    href="{{ request()->routeIs('home')
                        ? '#kontak'
                        : route('home') . '#kontak' }}"
                    class="nav-link"
                    data-section="kontak"
                >
                    KONTAK
                </a>

            </nav>
        {{-- =================================================
               LOGIN
        ================================================== --}}


        <a href="{{ route('login') }}" class="navbar-login">
         LOGIN
        </a>

    </header>




    {{-- =====================================================
         CONTENT
    ===================================================== --}}

   <main>

    @yield('content')

</main>


<footer class="site-footer">

    <div class="footer-inner">

        <div class="footer-main">

            {{-- =================================================
                 IDENTITAS SEKOLAH
            ================================================== --}}
            <div class="footer-brand">

                <img
                    src="{{ asset('storage/logo/logo-sekolah.PNG') }}"
                    alt="Logo SMK Negeri 4 Bogor"
                    class="footer-logo"
                >

                <div class="footer-brand-text">

                    <p class="footer-school-name">
                        SMK NEGERI 4<br>
                        BOGOR
                    </p>

                    <p class="footer-school-description">
                        Mewujudkan generasi unggul, berkarakter,
                        dan kompeten di bidang teknologi dan kejuruan.
                    </p>

                </div>

            </div>


            {{-- =================================================
                 NAVIGASI
            ================================================== --}}
            <div class="footer-column">

                <h3 class="footer-column-title">
                    Navigasi
                </h3>

                <nav class="footer-nav">

                <a href="{{ route('home') }}#beranda">
                    Beranda
                </a>

                <a href="{{ route('articles.index') }}">
                    Artikel
                </a>

                <a href="{{ route('page.show', 'sambutan-kepala-sekolah') }}">
                    Sambutan
                </a>

                <a href="{{ route('gallery.index') }}">
                    Galeri
                </a>

                <a href="{{ route('page.show', 'tentang-sekolah') }}">
                    Profil
                </a>

                <a href="{{ route('home') }}#kontak">
                    Kontak
                </a>

                <a href="{{ route('program.show', 'pplg') }}">
                    Program Keahlian
                </a>

            </nav>

            </div>


            {{-- =================================================
                 SOSIAL MEDIA
            ================================================== --}}
            <div class="footer-column">
    <h3 class="footer-column-title">Program Keahlian</h3>

    <div class="footer-program">
    <a href="{{ url('/program/pplg') }}">PPLG</a>
    <a href="{{ url('/program/tjkt') }}">TJKT</a>
    <a href="{{ url('/program/tpfl') }}">TPFL</a>
    <a href="{{ url('/program/tkro') }}">TKRO</a>
</div>
</div>

        </div>


        <div class="footer-bottom">

            <p class="footer-copyright">
                © 2026 SMK Negeri 4 Bogor. All rights reserved.
            </p>

        </div>

    </div>

</footer>



    {{-- =====================================================
         ACTIVE NAVBAR
    ===================================================== --}}

<script>

document.addEventListener('DOMContentLoaded', function () {

    const navMenu =
        document.querySelector('.navbar-menu');

    const navLinks =
        document.querySelectorAll('.nav-link');

    const indicator =
        document.querySelector('.navbar-indicator');


    const isHome =
        {{ request()->routeIs('home') ? 'true' : 'false' }};


    /* =================================================
       GERAKKAN GARIS BIRU
    ================================================= */

    function moveIndicator(link) {

        if (!link || !indicator || !navMenu) {
            return;
        }

        const linkRect =
            link.getBoundingClientRect();

        const menuRect =
            navMenu.getBoundingClientRect();


        indicator.style.left =
            (linkRect.left - menuRect.left) + 'px';


        indicator.style.width =
            linkRect.width + 'px';

    }


    /* =================================================
       AKTIFKAN MENU
    ================================================= */

    function setActive(link) {

        if (!link) {
            return;
        }


        navLinks.forEach(function (item) {

            item.classList.remove('active');

        });


        link.classList.add('active');


        moveIndicator(link);

    }


    /* =================================================
       KHUSUS HOME
       KLIK MENU = SCROLL
    ================================================= */

    if (isHome) {

        const sections = [

            document.getElementById('beranda'),

            document.getElementById('sambutan'),

            document.getElementById('profil'),

            document.getElementById('program'),

            document.getElementById('artikel'),

            document.getElementById('galeri'),

            document.getElementById('kontak')

        ].filter(Boolean);


        navLinks.forEach(function (link) {

            link.addEventListener('click', function (e) {

                const href =
                    this.getAttribute('href');


                /*
                 * Kalau link berupa #section,
                 * lakukan smooth scroll.
                 */

                if (href && href.startsWith('#')) {

                    e.preventDefault();


                    const targetId =
                        href.substring(1);


                    const target =
                        document.getElementById(targetId);


                    if (!target) {
                        return;
                    }


                    setActive(this);


                    const navbarHeight =
                        document
                            .querySelector('.navbar')
                            .offsetHeight;


                    const targetPosition =
                        target.getBoundingClientRect().top +
                        window.scrollY -
                        navbarHeight;


                    window.scrollTo({

                        top: targetPosition,

                        behavior: 'smooth'

                    });

                }

            });

        });


        /* =================================================
           AKTIF SAAT SCROLL DI HOME
        ================================================= */

        function updateActiveSection() {

            const navbarHeight =
                document
                    .querySelector('.navbar')
                    .offsetHeight;


            const scrollPosition =
                window.scrollY +
                navbarHeight +
                80;


            let currentSection =
                sections[0];


            sections.forEach(function (section) {

                if (
                    section.offsetTop
                    <= scrollPosition
                ) {

                    currentSection =
                        section;

                }

            });


            if (currentSection) {

                const activeLink =
                    document.querySelector(
                        '[data-section="' +
                        currentSection.id +
                        '"]'
                    );


                setActive(activeLink);

            }

        }


        window.addEventListener(
            'scroll',
            updateActiveSection,
            {
                passive: true
            }
        );


        /*
         * Pertama kali buka HOME
         */

        updateActiveSection();

    }


    /* =================================================
       HALAMAN SELAIN HOME
    ================================================= */

    else {

        let activeSection = null;


        const path =
            window.location.pathname;


        /*
         * GALERI
         */

        if (
            path === '/galeri' ||
            path.startsWith('/galeri/')
        ) {

            activeSection = 'galeri';

        }


        /*
         * ARTIKEL
         */

        else if (
            path === '/artikel' ||
            path.startsWith('/artikel/')
        ) {

            activeSection = 'artikel';

        }


        /*
         * SAMBUTAN
         */

        else if (
            path.includes('sambutan-kepala-sekolah')
        ) {

            activeSection = 'sambutan';

        }


        /*
         * PROFIL
         */

        else if (
            path.includes('tentang-sekolah')
        ) {

            activeSection = 'profil';

        }


        /*
         * PROGRAM
         */

        else if (
            path.startsWith('/program/')
        ) {

            activeSection = 'program';

        }


        /*
         * AKTIFKAN GARIS
         */

        if (activeSection) {

            const activeLink =
                document.querySelector(
                    '[data-section="' +
                    activeSection +
                    '"]'
                );


            setActive(activeLink);

        }

    }


    /* =================================================
       RESIZE
    ================================================= */

    window.addEventListener(
        'resize',
        function () {

            const activeLink =
                document.querySelector(
                    '.nav-link.active'
                );


            if (activeLink) {

                moveIndicator(activeLink);

            }

        }
    );

});

</script>
    @yield('scripts')


</body>

</html>