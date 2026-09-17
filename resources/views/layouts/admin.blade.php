<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <!-- BOXICONS -->
    <link
        href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css"
        rel="stylesheet"
    >

    <!-- BOOTSTRAP ICONS -->
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
    >

    <!-- REMIX ICON -->
    <link
        href="https://cdn.jsdelivr.net/npm/remixicon@4.6.0/fonts/remixicon.css"
        rel="stylesheet"
    >

    <!-- FONT AWESOME -->
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
    >

    <title>@yield('title', 'Admin Panel')</title>


    <style>

        /* =========================================================
           GLOBAL
        ========================================================= */

        * {
            box-sizing: border-box;
        }

        html,
        body {
            margin: 0;
            padding: 0;

            font-family: Arial, Helvetica, sans-serif;

            background: #ffffff;
            color: #111111;

            /*
             * Scrollbar tetap dihitung oleh browser.
             * Jadi saat modal muncul halaman TIDAK bergeser.
             */
            scrollbar-gutter: stable;
        }

        body {
            min-height: 100vh;
        }


        /* =========================================================
           LAYOUT
        ========================================================= */

        .admin-layout {

            display: flex;

            min-height: 100vh;
        }


        /* =========================================================
           SIDEBAR
        ========================================================= */

        .admin-sidebar {

            width: 230px;
            min-width: 230px;
            min-height: 100vh;

            background: #16418f;
            color: white;

            display: flex;
            flex-direction: column;

            padding: 22px 8px 18px;
        }


        /* =========================================================
           LOGO
        ========================================================= */

        .sidebar-logo {

            display: flex;
            align-items: center;

            gap: 10px;

            padding: 0 22px;

            margin-bottom: 48px;

            white-space: nowrap;
        }

        .sidebar-logo img {

            width: 52px;
            height: 62px;

            object-fit: contain;

            flex-shrink: 0;
        }

        .sidebar-logo-text {

            font-size: 16px;
            line-height: 1.15;

            font-weight: 700;

            text-transform: uppercase;

            white-space: nowrap;
        }


        /* =========================================================
           SIDEBAR MENU
        ========================================================= */

        .sidebar-menu {

            display: flex;
            flex-direction: column;

            gap: 8px;

            position: relative;
        }


        /* =========================================================
           MENU ITEM
        ========================================================= */

        .sidebar-menu a {

            height: 62px;

            display: flex;
            align-items: center;

            gap: 18px;

            padding: 0 28px;

            color: white;

            text-decoration: none;

            border-radius: 7px;

            font-size: 16px;
            font-weight: 700;

            line-height: 1;

            position: relative;

            z-index: 2;

            background: transparent;
        }

        .sidebar-menu a.active {

            background: transparent;
        }

        .sidebar-menu a:hover {

            background: transparent;
        }


        /* =========================================================
           SIDEBAR ICON
        ========================================================= */

        .sidebar-menu a i,
        .sidebar-menu a svg {

            width: 24px;
            height: 24px;

            min-width: 24px;
            min-height: 24px;

            display: flex;

            align-items: center;
            justify-content: center;

            color: white;

            flex-shrink: 0;

            line-height: 1;
        }


        /* =========================================================
           FONT AWESOME
        ========================================================= */

        .sidebar-menu a i.fa-solid {

            width: 24px;
            height: 24px;

            font-size: 22px;

            line-height: 24px;
        }


        /* =========================================================
           BOXICONS
        ========================================================= */

        .sidebar-menu a i.bx {

            width: 24px;
            height: 24px;

            font-size: 23px;

            line-height: 24px;
        }


        /* =========================================================
           SVG
        ========================================================= */

        .sidebar-menu a svg {

            width: 24px;
            height: 24px;

            stroke-width: 2;
        }


        /* =========================================================
           TEXT MENU
        ========================================================= */

        .sidebar-menu a span {

            line-height: 1;

            font-size: 16px;
            font-weight: 700;
        }


        /* =========================================================
           ACTIVE HIGHLIGHT
        ========================================================= */

        .sidebar-highlight {

            position: absolute;

            left: 0;
            right: 0;

            height: 62px;

            background: #0e57d8;

            border-radius: 7px;

            z-index: 1;

            pointer-events: none;

            transition:
                top 0.45s cubic-bezier(.4, 0, .2, 1);
        }


        /* =========================================================
           LOGOUT
        ========================================================= */

        .sidebar-logout {

            margin-top: auto;

            padding-top: 20px;
        }

        .sidebar-logout form {

            margin: 0;
        }

        .sidebar-logout button {

            width: 100%;
            height: 62px;

            display: flex;
            align-items: center;

            gap: 18px;

            padding: 0 28px;

            background: transparent;

            border: 0;

            color: white;

            font-family: Arial, Helvetica, sans-serif;

            font-size: 16px;
            font-weight: 700;

            line-height: 1;

            cursor: pointer;

            border-radius: 7px;

            text-align: left;
        }

        .sidebar-logout button:hover {

            background: #1156d0;
        }


        /* =========================================================
           ICON LOGOUT
        ========================================================= */

        .sidebar-logout button i {

            width: 24px;
            height: 24px;

            min-width: 24px;
            min-height: 24px;

            display: flex;

            align-items: center;
            justify-content: center;

            font-size: 22px;

            line-height: 24px;

            color: white;

            flex-shrink: 0;
        }


        /* =========================================================
           TEXT LOGOUT
        ========================================================= */

        .sidebar-logout button span {

            line-height: 1;

            font-size: 16px;
            font-weight: 700;
        }


        /* =========================================================
           MAIN
        ========================================================= */

        .admin-main {

            flex: 1;

            min-width: 0;

            background: #ffffff;

            padding: 28px 32px 20px;
        }

        .admin-content {

            max-width: 900px;

            margin: 0 auto;
        }


        /* =========================================================
           FOOTER
        ========================================================= */

        .admin-footer {

            text-align: center;

            color: #999999;

            font-size: 11px;

            margin-top: 24px;

            padding-bottom: 4px;
        }


        /* =========================================================
           ADMIN PROFILE TOP RIGHT
        ========================================================= */

        .admin-topbar {

            width: 100%;

            display: flex;
            justify-content: flex-end;
            align-items: center;

            margin-bottom: 22px;
        }

        .admin-profile {

            display: flex;
            align-items: center;

            gap: 10px;

            padding: 6px 10px;

            background: #ffffff;

            border: 1px solid #e2e8f0;

            border-radius: 8px;

            color: #222222;

            text-decoration: none;

            cursor: pointer;
        }

        .admin-profile-avatar {

            width: 34px;
            height: 34px;

            display: flex;
            align-items: center;
            justify-content: center;

            overflow: hidden;

            background: #eaf2ff;
            color: #16418f;

            border-radius: 50%;

            font-size: 16px;
            font-weight: 700;

            flex-shrink: 0;
        }

        .admin-profile-avatar img {

            width: 100%;
            height: 100%;

            object-fit: cover;
        }

        .admin-profile-info {

            display: flex;
            flex-direction: column;

            gap: 2px;

            line-height: 1.2;
        }

        .admin-profile-name {

            color: #222222;

            font-size: 14px;
            font-weight: 700;
        }

        .admin-profile-role {

            color: #999999;

            font-size: 11px;
            font-weight: 500;
        }

        .admin-profile-arrow {

            color: #777777;

            font-size: 13px;

            margin-left: 2px;
        }


        /* =========================================================
           LOGOUT MODAL OVERLAY
        ========================================================= */

        .logout-modal-overlay {

            position: fixed;

            inset: 0;

            /*
             * Lapisan transparan + blur.
             * Dashboard di belakang tetap di tempatnya.
             */
            background: rgba(255, 255, 255, 0.25);

            backdrop-filter: blur(4px);
            -webkit-backdrop-filter: blur(4px);

            display: none;

            align-items: center;
            justify-content: center;

            padding: 20px;

            /*
             * Harus di atas seluruh dashboard.
             */
            z-index: 9999;
        }

        .logout-modal-overlay.show {

            display: flex;
        }


        /* =========================================================
           MODAL BOX
        ========================================================= */

        .logout-modal {

            width: 100%;

            /*
             * Tidak terlalu besar.
             * Ukuran standar untuk modal website.
             */
            max-width: 420px;

            background: #ffffff;

            border-radius: 10px;

            padding: 28px 30px 25px;

            text-align: center;

            box-shadow:
                0 18px 45px rgba(0, 0, 0, 0.18);

            animation: logoutModalShow 0.2s ease;
        }


        /* =========================================================
           MODAL ANIMATION
        ========================================================= */

        @keyframes logoutModalShow {

            from {

                opacity: 0;

                transform:
                    translateY(8px)
                    scale(0.98);
            }

            to {

                opacity: 1;

                transform:
                    translateY(0)
                    scale(1);
            }
        }


        /* =========================================================
           MODAL ICON
        ========================================================= */

        .logout-modal-icon {

            width: 68px;
            height: 68px;

            margin: 0 auto 16px;

            border-radius: 50%;

            background: #eaf2ff;

            color: #0759d1;

            display: flex;

            align-items: center;
            justify-content: center;
        }

        .logout-modal-icon i {

            font-size: 30px;
        }


        /* =========================================================
           MODAL TITLE
        ========================================================= */

        .logout-modal-title {

            margin: 0 0 8px;

            color: #111111;

            font-size: 23px;

            font-weight: 700;
        }


        /* =========================================================
           MODAL TEXT
        ========================================================= */

        .logout-modal-text {

            max-width: 320px;

            margin: 0 auto 24px;

            color: #777777;

            font-size: 14px;

            line-height: 1.5;
        }


        /* =========================================================
           MODAL BUTTON AREA
        ========================================================= */

        .logout-modal-actions {

            display: flex;

            justify-content: center;

            gap: 10px;
        }


        /* =========================================================
           MODAL BUTTON
        ========================================================= */

        .logout-modal-button {

            min-width: 120px;

            height: 42px;

            padding: 0 18px;

            border-radius: 7px;

            font-family: Arial, Helvetica, sans-serif;

            font-size: 14px;

            font-weight: 700;

            cursor: pointer;

            transition:
                background 0.2s ease,
                border-color 0.2s ease,
                transform 0.1s ease;
        }

        .logout-modal-button:active {

            transform: scale(0.98);
        }


        /* =========================================================
           BATAL
        ========================================================= */

        .logout-modal-cancel {

            border: 1.5px solid #d8d8d8;

            background: #ffffff;

            color: #555555;
        }

        .logout-modal-cancel:hover {

            background: #f5f5f5;
        }


        /* =========================================================
           YA LOGOUT
        ========================================================= */

        .logout-modal-confirm {

            border: 1px solid #d65f27;

            background: #d96a32;

            color: #ffffff;
        }

        .logout-modal-confirm:hover {

            background: #c85b26;
        }


        /* =========================================================
           RESPONSIVE
        ========================================================= */

        @media (max-width: 900px) {

            .admin-sidebar {

                width: 190px;
                min-width: 190px;
            }

            .sidebar-logo {

                padding: 0 18px;
            }

            .sidebar-logo-text {

                font-size: 14px;
            }

            .sidebar-menu a,
            .sidebar-logout button {

                font-size: 15px;
            }

            .sidebar-menu a span,
            .sidebar-logout button span {

                font-size: 15px;
            }

            .admin-main {

                padding: 22px;
            }
        }


        @media (max-width: 500px) {

            .logout-modal {

                max-width: 100%;

                padding: 24px 20px 22px;
            }

            .logout-modal-title {

                font-size: 21px;
            }

            .logout-modal-actions {

                flex-direction: column;
            }

            .logout-modal-button {

                width: 100%;
            }
        }

    </style>

    @stack('styles')

</head>


<body>


<div class="admin-layout">


    <!-- =========================================================
         SIDEBAR
    ========================================================== -->

    <aside class="admin-sidebar">


        <!-- LOGO -->

        <div class="sidebar-logo">

            <img
                src="{{ asset('images/logo.png') }}"
                alt="Logo SMK Negeri 4 Bogor"
            >

            <div class="sidebar-logo-text">

                SMK NEGERI 4<br>
                BOGOR

            </div>

        </div>


        <!-- MENU -->

        <nav class="sidebar-menu">


            <!-- ACTIVE HIGHLIGHT -->

            <div class="sidebar-highlight"></div>


            <!-- DASHBOARD -->

            <a
                href="{{ route('admin.dashboard') }}"
                class="sidebar-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}"
                data-menu="dashboard"
            >

                <i class="fa-solid fa-house"></i>

                <span>
                    Dashboard
                </span>

            </a>


            <!-- ARTIKEL -->

            <a
                href="{{ route('admin.articles.index') }}"
                class="sidebar-item {{ request()->routeIs('admin.articles.*') ? 'active' : '' }}"
                data-menu="articles"
            >

                <svg
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="2"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                >

                    <rect
                        x="5"
                        y="3"
                        width="14"
                        height="18"
                        rx="2"
                    ></rect>

                    <line
                        x1="8"
                        y1="8"
                        x2="16"
                        y2="8"
                    ></line>

                    <line
                        x1="8"
                        y1="12"
                        x2="16"
                        y2="12"
                    ></line>

                    <line
                        x1="8"
                        y1="16"
                        x2="13"
                        y2="16"
                    ></line>

                </svg>

                <span>
                    Artikel
                </span>

            </a>


            <!-- GALERI -->

            <a
                href="{{ route('admin.photos.index') }}"
                class="sidebar-item {{ request()->routeIs('admin.photos.*') ? 'active' : '' }}"
                data-menu="photos"
            >

                <svg
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="2"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                >

                    <rect
                        x="3"
                        y="4"
                        width="18"
                        height="16"
                        rx="2"
                    ></rect>

                    <circle
                        cx="8.5"
                        cy="9"
                        r="1.5"
                    ></circle>

                    <path
                        d="M21 15l-5-5L5 20"
                    ></path>

                </svg>

                <span>
                    Galeri
                </span>

            </a>


            <!-- KATEGORI -->

            <a
                href="{{ route('admin.categories.index') }}"
                class="sidebar-item {{ request()->routeIs('admin.categories.*') ? 'active' : '' }}"
                data-menu="categories"
            >

                <svg
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="2"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                >

                    <rect
                        x="4"
                        y="4"
                        width="6"
                        height="6"
                        rx="1"
                    ></rect>

                    <rect
                        x="14"
                        y="4"
                        width="6"
                        height="6"
                        rx="1"
                    ></rect>

                    <rect
                        x="4"
                        y="14"
                        width="6"
                        height="6"
                        rx="1"
                    ></rect>

                    <rect
                        x="14"
                        y="14"
                        width="6"
                        height="6"
                        rx="1"
                    ></rect>

                </svg>

                <span>
                    Kategori
                </span>

            </a>


            <!-- KONTAK -->

            <a
                href="{{ route('admin.contacts.index') }}"
                class="sidebar-item {{ request()->routeIs('admin.contacts.*') ? 'active' : '' }}"
                data-menu="contact"
            >

                <i class="bx bxs-contact"></i>

                <span>
                    Kontak
                </span>

            </a>


            <!-- PENGATURAN -->

            <a
                href="{{ route('admin.settings') }}"
                class="sidebar-item {{ request()->routeIs('admin.settings*') ? 'active' : '' }}"
                data-menu="settings"
            >

                <i class="fa-solid fa-gear"></i>

                <span>
                    Pengaturan
                </span>

            </a>


        </nav>


        <!-- =========================================================
             LOGOUT
        ========================================================== -->

        <div class="sidebar-logout">

            <form
                method="POST"
                action="{{ route('logout') }}"
                id="logoutForm"
            >

                @csrf

                <button
                    type="button"
                    onclick="openLogoutModal()"
                >

                    <i class="fa-solid fa-right-from-bracket"></i>

                    <span>
                        Logout
                    </span>

                </button>

            </form>

        </div>


    </aside>


    <!-- =========================================================
         MAIN CONTENT
    ========================================================== -->

    <main class="admin-main">

        <div class="admin-content">

            @yield('content')

            <div class="admin-footer">

                @2026 SMK Negeri 4 Bogor

            </div>

        </div>

    </main>


</div>


<!-- =============================================================
     LOGOUT MODAL
============================================================== -->

<div
    class="logout-modal-overlay"
    id="logoutModal"
>


    <div
        class="logout-modal"
        role="dialog"
        aria-modal="true"
        aria-labelledby="logoutModalTitle"
    >


        <!-- ICON -->

        <div class="logout-modal-icon">

            <i class="fa-solid fa-right-from-bracket"></i>

        </div>


        <!-- TITLE -->

        <h2
            class="logout-modal-title"
            id="logoutModalTitle"
        >
            Logout
        </h2>


        <!-- TEXT -->

        <p class="logout-modal-text">

            Apakah anda yakin ingin keluar
            dari sistem?

        </p>


        <!-- BUTTON -->

        <div class="logout-modal-actions">


            <!-- BATAL -->

            <button
                type="button"
                class="logout-modal-button logout-modal-cancel"
                onclick="closeLogoutModal()"
            >

                Batal

            </button>


            <!-- YA LOGOUT -->

            <button
                type="button"
                class="logout-modal-button logout-modal-confirm"
                onclick="confirmLogout()"
            >

                Ya, Logout

            </button>


        </div>


    </div>

</div>


@stack('scripts')


<!-- =============================================================
     SIDEBAR ACTIVE HIGHLIGHT
============================================================== -->

<script>

document.addEventListener('DOMContentLoaded', function () {

    const menu =
        document.querySelector('.sidebar-menu');

    const highlight =
        document.querySelector('.sidebar-highlight');

    const items =
        document.querySelectorAll('.sidebar-menu a');


    if (!menu || !highlight || !items.length) {

        return;
    }


    const activeItem =
        document.querySelector(
            '.sidebar-menu a.active'
        );


    if (!activeItem) {

        return;
    }


    const currentMenu =
        activeItem.dataset.menu;


    const previousMenu =
        localStorage.getItem(
            'admin_active_menu'
        );


    const currentTop =
        activeItem.offsetTop;


    /* =========================================================
       PERTAMA KALI
    ========================================================= */

    if (!previousMenu) {

        highlight.style.transition = 'none';

        highlight.style.top =
            currentTop + 'px';


        requestAnimationFrame(() => {

            highlight.style.transition =
                'top 0.45s cubic-bezier(.4, 0, .2, 1)';

        });

    }


    /* =========================================================
       PINDAH MENU
    ========================================================= */

    else {

        const previousItem =
            document.querySelector(
                `.sidebar-menu a[data-menu="${previousMenu}"]`
            );


        if (previousItem) {

            const previousTop =
                previousItem.offsetTop;


            highlight.style.transition = 'none';

            highlight.style.top =
                previousTop + 'px';


            highlight.offsetHeight;


            requestAnimationFrame(() => {

                highlight.style.transition =
                    'top 0.45s cubic-bezier(.4, 0, .2, 1)';

                highlight.style.top =
                    currentTop + 'px';

            });

        }

        else {

            highlight.style.top =
                currentTop + 'px';

        }

    }


    /* =========================================================
       SIMPAN MENU AKTIF
    ========================================================= */

    localStorage.setItem(
        'admin_active_menu',
        currentMenu
    );

});


/* =============================================================
   LOGOUT MODAL
============================================================= */

function openLogoutModal()
{

    const modal =
        document.getElementById(
            'logoutModal'
        );


    if (!modal) {

        return;
    }


    modal.classList.add('show');

}


function closeLogoutModal()
{

    const modal =
        document.getElementById(
            'logoutModal'
        );


    if (!modal) {

        return;
    }


    modal.classList.remove('show');

}


function confirmLogout()
{

    const form =
        document.getElementById(
            'logoutForm'
        );


    if (!form) {

        return;
    }


    form.submit();

}


/* =============================================================
   KLIK AREA LUAR MODAL
============================================================= */

document.addEventListener(
    'click',
    function (event)
    {

        const modal =
            document.getElementById(
                'logoutModal'
            );


        if (!modal) {

            return;
        }


        if (event.target === modal) {

            closeLogoutModal();

        }

    }
);


/* =============================================================
   ESCAPE
============================================================= */

document.addEventListener(
    'keydown',
    function (event)
    {

        if (event.key === 'Escape') {

            closeLogoutModal();

        }

    }
);

</script>


</body>

</html>