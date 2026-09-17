@extends('layouts.app')

@section('title', 'Beranda')

@section('content')

<style>
    /* =========================================================
       HOME
    ========================================================= */

    .home-page {
        width: 100%;
        overflow: hidden;
    }

    .home-section {
        width: 100%;
        padding: 60px 56px;
    }

    .home-inner {
        width: 100%;
        max-width: 1100px;
        margin: 0 auto;
    }

    .section-heading {
        margin-bottom: 32px;
    }

    .section-heading h2 {
        margin: 0 0 10px;
        color: #0645c0;
        font-size: 30px;
        line-height: 1.2;
        font-weight: 700;
    }

    .section-heading p {
        max-width: 680px;
        margin: 0;
        color: #64748b;
        font-size: 15px;
        line-height: 1.6;
    }


/* =========================================================
   BANNER / HERO
========================================================= */

.hero-section {
    position: relative;
    width: 100%;
    height: 500px;
    overflow: hidden;
}

.hero-image {
    position: absolute;
    inset: 0;
    width: 100%;
    height: 100%;
    object-fit: cover;
}

/* Overlay biru hanya kuat di sebelah kiri */
.hero-overlay {
    position: absolute;
    inset: 0;
    background: linear-gradient(
        to right,
        rgba(6, 69, 192, 0.72) 0%,
        rgba(6, 69, 192, 0.48) 25%,
        rgba(6, 69, 192, 0.18) 50%,
        rgba(6, 69, 192, 0) 75%
    );
}

/* Isi banner */
.hero-content {
    position: relative;
    z-index: 2;
    max-width: 1100px;
    height: 100%;
    margin: 0 auto;

    display: flex;
    align-items: center;

    padding: 0 56px;
}

/* Teks */
.hero-text {
    max-width: 480px;
    margin-top: -10px;
}

.hero-text h1 {
    margin: 0 0 15px;

    color: #ffffff;
    font-size: 44px;
    line-height: 1.1;
    font-weight: 700;
}

.hero-text p {
    margin: 0 0 20px;

    color: #ffffff;
    font-size: 16px;
    line-height: 1.5;
}

.hero-button {
    display: inline-flex;
    align-items: center;
    justify-content: center;

    padding: 10px 16px;

    background: #0645c0;
    color: #ffffff;

    border-radius: 5px;

    font-size: 14px;
    font-weight: 600;
    text-decoration: none;

    transition: 0.2s ease;
}

.hero-button:hover {
    background: #053a9f;
}


/* =========================================================
   STATISTIK
========================================================= */

.stats {
    width: 100%;
    background: #ffffff;
    padding: 18px 0 16px;
}


.stats-grid {
    width: calc(100% - 160px);
    max-width: 960px;
    min-height: 100px;

    margin: 0 auto;

    display: grid;
    grid-template-columns: repeat(4, 1fr);
    align-items: center;

    background: #eef4ff;

    border: 2px solid #6d8fcf;
    border-radius: 7px;

    padding: 10px 12px;
    box-sizing: border-box;
}


.stat {
    min-height: 70px;

    padding: 0 14px;

    display: flex;
    align-items: center;
    justify-content: center;

    text-align: left;
    gap: 12px;
}


.stat + .stat {
    border-left: 2px solid #6d8fcf;
}


.stat-icon {
    width: 48px;
    height: 48px;

    flex: 0 0 48px;

    display: flex;
    align-items: center;
    justify-content: center;

    border-radius: 50%;

    background: #16418f;
}


.stat-icon i {
    color: #ffffff;
    font-size: 22px;
}


.stat-info {
    display: flex;
    flex-direction: column;
    justify-content: center;
}


.stat-number {
    margin-bottom: 4px;

    color: #0645c0;

    font-size: 24px;
    line-height: 1;

    font-weight: 700;
}


.stat-label {
    color: #111827;

    font-size: 12px;
    line-height: 1.3;

    font-weight: 600;
}


/* =========================================================
   RESPONSIVE STATISTIK
========================================================= */

@media (max-width: 1000px) {

    .stats-grid {
        width: calc(100% - 50px);
    }

    .stat {
        padding: 0 10px;
        gap: 9px;
    }

    .stat-icon {
        width: 45px;
        height: 45px;
        flex-basis: 45px;
    }

    .stat-icon svg {
        width: 25px;
        height: 25px;
    }

    .stat-number {
        font-size: 22px;
    }
}


@media (max-width: 700px) {

    .stats {
        padding: 16px;
    }

    .stats-grid {
        width: 100%;
        grid-template-columns: 1fr 1fr;
        gap: 10px;
        padding: 14px;
    }

    .stat {
        min-height: 72px;
        padding: 7px;
    }

    .stat:nth-child(3) {
        border-left: none;
    }

    .stat-icon {
        width: 44px;
        height: 44px;
        flex-basis: 44px;
    }
}


@media (max-width: 500px) {

    .stats-grid {
        grid-template-columns: 1fr;
    }

    .stat,
    .stat:nth-child(3) {
        border-left: none;
    }
}

/* =========================================================
   SAMBUTAN
========================================================= */

.welcome {
    background: #ffffff;
}

.welcome-grid {
    display: grid;

    grid-template-columns: 290px 1fr;

    gap: 45px;

    align-items: center;
}

.principal-photo {
    width: 100%;
    height: 340px;

    display: flex;
    align-items: center;
    justify-content: center;

    overflow: hidden;

    border-radius: 8px;

    background: #e8f0ff;
    color: #64748b;

    text-align: center;
    font-size: 14px;
}

.principal-photo img {
    width: 100%;
    height: 100%;

    object-fit: cover;

    display: block;
}

.welcome-text h2 {
    margin: 0 0 16px;

    color: #0645c0;

    font-size: 24px;
    line-height: 1.2;
}

.welcome-text p {
    margin: 0 0 14px;

    color: #475569;

    font-size: 15px;
    line-height: 1.75;
}

.text-link {
    display: inline-block;

    margin-top: 6px;

    color: #0645c0;

    font-size: 14px;
    font-weight: 700;
}


/* =========================================================
   PROFIL / TENTANG SEKOLAH
========================================================= */

.profile {
    background: #f6f9ff;
}

.profile-grid {
    width: 100%;
}

/* JUDUL DI TENGAH ATAS */
.profile-title {
    margin: 0 0 28px;

    color: #0645c0;
    font-size: 24px;
    line-height: 1.2;
    font-weight: 700;

    text-align: center;
}

/* FOTO + TEKS UTAMA */
.profile-main {
    display: grid;

    grid-template-columns: 1fr 1fr;

    gap: 32px;

    align-items: start;
}

/* FOTO */
.profile-image {
    width: 100%;
    height: 340px;

    overflow: hidden;

    border-radius: 8px;

    background: #dbeafe;
}

.profile-image img {
    width: 100%;
    height: 100%;

    display: block;

    object-fit: cover;
}

/* TEKS SEBELAH FOTO */
.profile-text {
    padding-top: 0;
}

.profile-text h3 {
    margin: 0 0 15px;

    color: #111827;

    font-size: 14px;
    line-height: 1.35;

    font-weight: 400;
}

.profile-text p {
    margin: 0 0 15px;

    color: #111827;

    font-size: 14px;
    line-height: 1.65;

    font-weight: 400;
}

/* SUBJUDUL */
.profile-text h4 {
    margin: 24px 0 13px;

    color: #1e3a8a;

    font-size: 14px;
    line-height: 1.4;

    font-weight: 400;
}

/* LIST */
.profile-list {
    list-style: none;

    padding: 0;
    margin: 16px 0 0;
}

.profile-list li {
    position: relative;

    padding-left: 24px;
    margin-bottom: 10px;

    color: #111827;

    font-size: 14px;
    line-height: 1.55;

    font-weight: 400;
}

.profile-list li::before {
    content: "✓";

    position: absolute;

    left: 0;
    top: 0;

    color: #155eef;

    font-weight: 400;
}

/* PARAGRAF BAWAH */
.profile-bottom {
    margin-top: 28px;

    color: #111827;

    font-size: 14px;
    line-height: 1.65;

    font-weight: 400;
}

/* SELENGKAPNYA */
.profile-more {
    display: flex;

    justify-content: flex-end;

    margin-top: 18px;
}

.profile-more a {
    color: #0645c0;

    font-size: 14px;
    font-weight: 400;

    text-decoration: none;
}

.profile-more a:hover {
    text-decoration: underline;
}


/* =========================================================
   RESPONSIVE
========================================================= */

@media (max-width: 900px) {

    .profile-main {
        grid-template-columns: 1fr;

        gap: 25px;
    }

    .profile-image {
        height: 320px;
    }
}


@media (max-width: 600px) {

    .profile-title {
        font-size: 24px;
    }

    .profile-image {
        height: 260px;
    }

    .profile-text h3,
    .profile-text p,
    .profile-text h4,
    .profile-list li,
    .profile-bottom,
    .profile-more a {
        font-size: 14px;
    }
}


/* =========================================================
   PROGRAM KEAHLIAN
========================================================= */

.program {
    width: 100%;
    background: #ffffff;
}


/* =========================
   PROGRAM GRID
========================= */

.program-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 22px;
    width: 100%;
}


/* =========================
   PROGRAM CARD
========================= */

.program-card {
    position: relative;

    width: 100%;
    min-height: 245px;

    padding: 28px 22px 25px;

    background: #eef4ff;

    border: 1px solid #d8e4f7;
    border-radius: 8px;

    text-align: center;

    cursor: pointer;

    transition:
        transform 0.25s ease,
        box-shadow 0.25s ease,
        border-color 0.25s ease;
}


/* =========================
   HOVER
========================= */

.program-card:hover {
    transform: translateY(-7px);

    border-color: #16418f;

    box-shadow:
        0 10px 25px rgba(22, 65, 143, 0.13);
}


/* =========================
   LOGO
========================= */

.program-logo {
    width: 72px;
    height: 72px;

    margin: 0 auto 17px;

    display: flex;
    align-items: center;
    justify-content: center;
}


.program-logo img {
    width: 100%;
    height: 100%;

    object-fit: contain;

    display: block;
}


/* =========================
   JUDUL
========================= */

.program-card h3 {
    margin: 0 0 10px;

    color: #16418f;

    font-size: 18px;
    line-height: 1.3;

    font-weight: 700;
}


/* =========================
   DESKRIPSI
========================= */

.program-card p {
    margin: 0;

    color: #555555;

    font-size: 13px;
    line-height: 1.6;

    font-weight: 400;
}


/* =========================
   PROGRAM CONTENT
========================= */

.program-content {
    width: 100%;
}


/* =========================
   RESPONSIVE
========================= */

@media (max-width: 1000px) {

    .program-grid {
        grid-template-columns: repeat(2, 1fr);
        gap: 20px;
    }

}


@media (max-width: 600px) {

    .program-grid {
        grid-template-columns: 1fr;
        gap: 18px;
    }

    .program-card {
        min-height: auto;
        padding: 25px 20px;
    }

    .program-logo {
        width: 65px;
        height: 65px;
        margin-bottom: 15px;
    }

    .program-card h3 {
        font-size: 17px;
    }

    .program-card p {
        font-size: 13px;
    }

}

/* =========================================================
   ARTIKEL
========================================================= */

.articles {
    background: #f6f9ff;
}


/* =====================================================
   ARTIKEL TERBARU
===================================================== */
.section-heading h2 {
    margin: 0 0 12px;
    color: #0645c0;
    font-size: 24px;
    line-height: 1.2;
    font-weight: 700;
}
.article-grid {
    display: grid;

    grid-template-columns: repeat(3, 1fr);

    gap: 20px;

    width: 100%;
}

.article-card {
    background: #ffffff;

    border-radius: 8px;

    overflow: hidden;

    border: 1px solid #e5e7eb;

    display: flex;

    flex-direction: column;

    transition:
        transform 0.2s ease,
        box-shadow 0.2s ease;
}

.article-card:hover {
    transform: translateY(-4px);

    box-shadow: 0 12px 28px rgba(15, 23, 42, 0.10);
}


/* =====================================================
   FOTO ARTIKEL
===================================================== */

.article-image {
    width: 100%;

    height: 175px;

    background: #dbeafe;

    overflow: hidden;

    display: block;
}

.article-image img {
    width: 100%;

    height: 100%;

    display: block;

    object-fit: cover;
}


/* =====================================================
   ISI ARTIKEL
===================================================== */

.article-content {
    padding: 17px;
}

.article-date {
    margin-bottom: 7px;

    color: #64748b;

    font-size: 12px;

    line-height: 1.4;
}

.article-content h3 {
    margin: 0 0 8px;

    color: #1e3a8a;

    font-size: 17px;

    line-height: 1.35;

    font-weight: 700;
}

.article-content p {
    margin: 0 0 13px;

    color: #64748b;

    font-size: 13px;

    line-height: 1.6;
}

.article-content .text-link {
    display: inline-block;

    color: #155eef;

    font-size: 13px;

    font-weight: 600;

    text-decoration: none;
}

.article-content .text-link:hover {
    text-decoration: underline;
}


/* =========================================================
   LIHAT SELENGKAPNYA ARTIKEL
========================================================= */

.article-more {
    width: 100%;
    display: flex;
    justify-content: flex-end;
    margin-top: 20px;
}

.article-more a {
    color: #0645c0;
    text-decoration: none;
    font-size: 14px;
    line-height: 1.4;
    font-weight: 600;
}

.article-more a:hover {
    text-decoration: underline;
}

/* =========================================================
   GALERI
========================================================= */

.gallery {
    background: #ffffff;
}

.gallery-heading {
    margin-bottom: 28px;
    text-align: center;
}

.gallery-heading h2 {
    margin: 0;
    color: #0645c0;
    font-size: 24px;
    line-height: 1.2;
    font-weight: 700;
}


/* =========================================================
   BARIS FOTO GALERI
========================================================= */

.gallery-row {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 15px;
    width: 100%;
}


/* =========================================================
   BARIS 1 — 4 FOTO
========================================================= */

.gallery-row-top {
    grid-template-columns: repeat(4, 1fr);
}


/* =========================================================
   BARIS 2 — 3 FOTO DI TENGAH
========================================================= */

.gallery-row-bottom {
    display:flex;
    justify-content:center;
    gap:15px;
    margin-top:15px;
}

.gallery-row-bottom .gallery-card {
    width:calc((100% - 45px) / 4);
    transform:none;
}


/* =========================================================
   FOTO GALERI
========================================================= */

.gallery-card {
    width: 100%;
    overflow: hidden;
    border-radius: 8px;
}

.gallery-card img {
    width: 100%;
    height: 140px;
    object-fit: cover;
    display: block;
    border-radius: 8px;
}


/* =========================================================
   TOMBOL GALERI
========================================================= */

.gallery-button {
    display: flex;
    justify-content: center;
    margin-top: 30px;
}

.gallery-more {
    display: inline-flex;
    align-items: center;
    justify-content: center;

    padding: 10px 16px;

    border-radius: 6px;

    background: #0645c0;
    color: #ffffff;

    font-size: 14px;
    font-weight: 700;

    text-decoration: none;
    white-space: nowrap;
}

.gallery-more:hover {
    background: #05399c;
}


/* =========================================================
   RESPONSIVE
========================================================= */

@media (max-width: 1100px) {

    .gallery-row {
        grid-template-columns: repeat(2, 1fr);
    }

    .gallery-row-bottom .gallery-card:nth-child(1),
    .gallery-row-bottom .gallery-card:nth-child(2),
    .gallery-row-bottom .gallery-card:nth-child(3) {
        grid-column: auto;
        transform: none;
    }
}


@media (max-width: 600px) {

    .gallery-row {
        grid-template-columns: 1fr;
    }

    .gallery-row-bottom .gallery-card:nth-child(1),
    .gallery-row-bottom .gallery-card:nth-child(2),
    .gallery-row-bottom .gallery-card:nth-child(3) {
        grid-column: auto;
        transform: none;
    }

    .gallery-heading {
        display: block;
    }

    .gallery-more {
        display: inline-block;
        margin-top: 15px;
    }

    .gallery-heading h2 {
        font-size: 26px;
    }
}


/* =========================================================
   KONTAK
========================================================= */

.contact-section {
    width: 100%;
    background: #ffffff;
    padding: 70px 40px 75px;
}

.contact-container {
    width: 100%;
    max-width: 1100px;
    margin: 0 auto;
}


/* =========================
   HEADING
========================= */

.contact-heading {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 16px;
    margin-bottom: 10px;
}

.contact-heading h2 {
    margin: 0;
    color: #0645c0;
    font-size: 24px;
    line-height: 1.2;
    font-weight: 700;
}

.contact-heading .section-line {
    width: 42px;
    height: 2px;
    background: #0645c0;
    display: block;
}

.contact-subtitle {
    margin: 0 auto 38px;
    max-width: 550px;
    text-align: center;
    font-size: 14px;
    line-height: 1.6;
    font-weight: 400;
    color: #666666;
}


/* =========================
   CONTENT
========================= */

.contact-content {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 38px;
    align-items: stretch;
}


/* =========================
   CONTACT INFO + MAP
========================= */

.contact-info,
.contact-map {
    width: 100%;
    min-width: 0;

    padding: 28px 30px;

    background: #ffffff;

    border: 1px solid #dbe7f7;
    border-radius: 8px;

    box-sizing: border-box;
}

.contact-info h3,
.contact-map h3 {
    margin: 0 0 24px;

    color: #123d91;

    font-size: 18px;
    line-height: 1.3;
    font-weight: 700;
}


/* =========================
   CONTACT ITEM
========================= */

.contact-item {
    display: flex;
    align-items: flex-start;
    gap: 14px;

    margin-bottom: 20px;
}

.contact-icon {
    width: 34px;
    height: 34px;

    flex-shrink: 0;

    display: flex;
    align-items: center;
    justify-content: center;

    background: #eaf2ff;
    color: #16418f;

    border-radius: 7px;
}

.contact-icon i {
    font-size: 14px;
}

.contact-item-text {
    min-width: 0;
    padding-top: 1px;
}

.contact-item-text h4 {
    margin: 0 0 5px;

    color: #222222;

    font-size: 14px;
    line-height: 1.3;
    font-weight: 700;
}

.contact-item-text p {
    margin: 0;

    color: #666666;

    font-size: 13px;
    line-height: 1.55;
    font-weight: 400;

    word-break: break-word;
}


/* =========================
   SOCIAL MEDIA
========================= */

.contact-social {
    margin-top: 25px;
    padding-top: 20px;

    border-top: 1px solid #e4eaf3;
}

.contact-social h4 {
    margin: 0 0 12px;

    color: #222222;

    font-size: 14px;
    line-height: 1.3;
    font-weight: 700;
}

.contact-social-list {
    display: flex;
    align-items: center;
    gap: 9px;
}

.contact-social-list a {
    width: 34px;
    height: 34px;

    display: flex;
    align-items: center;
    justify-content: center;

    background: #ffffff;

    border: 1px solid #d8e2f0;
    border-radius: 50%;

    color: #16418f;
    text-decoration: none;

    transition:
        background 0.2s ease,
        color 0.2s ease,
        border-color 0.2s ease,
        transform 0.2s ease;
}

.contact-social-list a:hover {
    background: #16418f;
    color: #ffffff;
    border-color: #16418f;
    transform: translateY(-2px);
}

.contact-social-list i {
    font-size: 15px;
}


/* =========================
   MAP
========================= */

.map-wrapper {
    width: 100%;
    max-width: 100%;

    overflow: hidden;

    border: 1px solid #d8e2f0;
    border-radius: 7px;

    box-sizing: border-box;
}

.map-wrapper iframe {
    width: 100%;
    max-width: 100%;
    height: 395px;

    display: block;

    border: 0;

    box-sizing: border-box;
}


/* =========================
   MAP PLACEHOLDER
========================= */

.map-placeholder {
    width: 100%;
    min-height: 395px;

    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;

    text-align: center;

    background: #f5f8fc;

    box-sizing: border-box;
}

.map-placeholder i {
    margin-bottom: 12px;

    color: #16418f;

    font-size: 34px;
}

.map-placeholder p {
    margin: 0 0 12px;

    color: #444444;

    font-size: 14px;
    line-height: 1.4;
    font-weight: 600;
}

.map-placeholder a {
    color: #16418f;

    font-size: 13px;
    font-weight: 600;

    text-decoration: none;
}

.map-placeholder a:hover {
    text-decoration: underline;
}


/* =========================
   RESPONSIVE
========================= */

@media (max-width: 800px) {

    .contact-section {
        padding: 55px 25px 60px;
    }

    .contact-content {
        grid-template-columns: 1fr;
        gap: 25px;
    }

    .contact-info,
    .contact-map {
        width: 100%;
    }

    .map-wrapper iframe {
        height: 350px;
    }

    .map-placeholder {
        min-height: 350px;
    }
}


@media (max-width: 500px) {

    .contact-section {
        padding: 45px 18px 50px;
    }

    .contact-heading {
        gap: 10px;
    }

    .contact-heading h2 {
        font-size: 22px;
    }

    .contact-heading .section-line {
        width: 28px;
    }

    .contact-subtitle {
        font-size: 13px;
        margin-bottom: 28px;
    }

    .contact-info,
    .contact-map {
        padding: 21px;
    }

    .contact-info h3,
    .contact-map h3 {
        font-size: 17px;
    }

    .contact-item-text p {
        font-size: 12px;
    }

    .map-wrapper iframe {
        height: 280px;
    }

    .map-placeholder {
        min-height: 280px;
    }

    .contact-social-list a {
        width: 32px;
        height: 32px;
    }

    .contact-social-list i {
        font-size: 14px;
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


{{-- =========================================================
     BERANDA / HERO
========================================================== --}}

<section class="hero-section" id="beranda">

    <img
        src="{{ asset('storage/banner/banner-home.JPEG') }}"
        alt="SMK Negeri 4 Bogor"
        class="hero-image"
    >

    <div class="hero-overlay"></div>

    <div class="hero-content">
        <div class="hero-text">

            <h1>
                SMK NEGERI 4<br>
                BOGOR
            </h1>

            <p>
                Selamat Datang di SMK NEGERI 4 BOGOR
            </p>
                
            <a href="{{ route('page.show', 'tentang-sekolah') }}" class="hero-button">
                Baca Selengkapnya →
            </a>

        </div>
    </div>

</section>


{{-- =========================================================
     Statistik
========================================================== --}}

<section class="stats">

    <div class="stats-grid">

        {{-- SISWA --}}
<div class="stat">

    <div class="stat-icon">
        <i class="fa-solid fa-user-graduate"></i>
    </div>

    <div class="stat-info">
        <div class="stat-number">{{ $setting?->student_count }}</div>
        <div class="stat-label">Siswa Aktif</div>
    </div>

</div>


{{-- JURUSAN --}}
<div class="stat">

    <div class="stat-icon">
        <i class="fa-solid fa-graduation-cap"></i>
    </div>

    <div class="stat-info">
        <div class="stat-number">4</div>
        <div class="stat-label">Jurusan</div>
    </div>

</div>


{{-- GURU --}}
<div class="stat">

    <div class="stat-icon">
        <i class="fa-solid fa-person"></i>
    </div>

    <div class="stat-info">
        <div class="stat-number">{{ $setting?->teacher_count }}</div>
        <div class="stat-label">
            Guru & Tenaga<br>
            Pendidik
        </div>
    </div>

</div>


{{-- AKREDITASI --}}
<div class="stat">

    <div class="stat-icon">
        <i class="fa-solid fa-award"></i>
    </div>

    <div class="stat-info">
        <div class="stat-number">{{ $setting?->accreditation }}</div>
        <div class="stat-label">Akreditasi</div>
    </div>

</div>
    </div>

</section>


{{-- =========================================================
     SAMBUTAN KEPALA SEKOLAH
========================================================== --}}

<section class="home-section welcome" id="sambutan">

    <div class="home-inner">

        <div class="welcome-grid">

            <div class="principal-photo">

                <img
                    src="{{ asset('storage/profile/kepala-sekolah.PNG') }}"
                    alt="Kepala Sekolah SMK Negeri 4 Bogor"
                >

            </div>


            <div class="welcome-text">

                <h2>
                    Sambutan Kepala Sekolah
                </h2>

                <p>
                    Selamat datang di website resmi
                    SMK Negeri 4 Bogor.
                </p>

                <p>
                    Puji syukur ke hadirat Allah SWT atas
                    segala rahmat dan karunia-Nya sehingga
                    website ini dapat hadir sebagai media
                    informasi, komunikasi, dan publikasi
                    bagi seluruh warga sekolah maupun
                    masyarakat.
                </p>

                <p>
                    Melalui website ini, kami berharap
                    informasi mengenai kegiatan, program
                    keahlian, prestasi, serta berbagai
                    aktivitas sekolah dapat diakses dengan
                    mudah.
                </p>

                <a href="{{ route('page.show', 'sambutan-kepala-sekolah') }}" class="text-link">
                    Selengkapnya →
                </a>

            </div>

        </div>

    </div>

</section>


{{-- =========================================================
     PROFIL / TENTANG SEKOLAH
========================================================== --}}

<section class="home-section profile" id="profil">

    <div class="home-inner">

        <div class="profile-grid">

            {{-- JUDUL --}}
            <h2 class="profile-title">
                Tentang Sekolah
            </h2>


            {{-- FOTO + TEKS --}}
            <div class="profile-main">

                {{-- FOTO --}}
                <div class="profile-image">

                    <img
                        src="{{ asset('storage/profile/sekolah.jpg') }}"
                        alt="SMK Negeri 4 Bogor"
                    >

                </div>


                {{-- TEKS --}}
                <div class="profile-text">

                    <h3>
                        SMKN 4 Bogor - Sekolah Menengah Kejuruan
                        Berkualitas di Kota Bogor
                    </h3>


                    <p>
                        SMKN 4 Bogor adalah salah satu sekolah
                        menengah kejuruan unggulan yang berlokasi
                        di Jl. Raya Tajur No.141, Kota Bogor.
                        Dengan motto “HEBAT” (Handal, Energik,
                        Berkarakter, Aktif, dan Terampil), kami
                        berkomitmen menghasilkan lulusan yang
                        kompeten.
                    </p>


                    <ul class="profile-list">

                        <li>
                            Memiliki 4 program keahlian unggulan:
                            PPLG, TJKT, TPFL, dan TKRO yang
                            terakreditasi A.
                        </li>

                        <li>
                            Dilengkapi fasilitas modern dan bengkel
                            praktik berstandar industri.
                        </li>

                        <li>
                            Menjalin kerjasama dengan berbagai
                            perusahaan untuk program prakerin
                            dan rekrutmen lulusan.
                        </li>

                    </ul>

                </div>

            </div>


            {{-- PARAGRAF BAWAH --}}
            <div class="profile-bottom">

                SMKN 4 Bogor terus berinovasi dalam mengembangkan
                program pembelajaran yang selaras dengan kebutuhan
                industri. Dengan pengajar yang berpengalaman dan
                fasilitas yang memadai, kami mempersiapkan siswa
                untuk menjadi tenaga kerja profesional yang siap
                bersaing di dunia kerja.

            </div>


            {{-- TOMBOL --}}
            <div class="profile-more">

                <a href="{{ route('page.show', 'tentang-sekolah') }}" class="text-link">
                    Selengkapnya →
                </a>

            </div>

        </div>

    </div>

</section>


{{-- =========================================================
     PROGRAM KEAHLIAN
========================================================== --}}

<section class="home-section program" id="program">

    <div class="home-inner">

        <div class="section-heading">

            <h2>
                Program Keahlian
            </h2>

            <p>
                Pilihan program keahlian yang tersedia
                di SMK Negeri 4 Bogor.
            </p>

        </div>


        <div class="program-grid">


            {{-- =================================================
                 PPLG
            ================================================== --}}

            <div
                class="program-card"
                onclick="window.location.href='{{ route('program.show', 'pplg') }}'"
            >

                <div class="program-logo">

                    <img
                        src="{{ asset('storage/jurusan/pplg.PNG') }}"
                        alt="Logo PPLG"
                    >

                </div>

                <h3>
                    PPLG
                </h3>

                <p>
                    Keahlian program yang fokus pada pengembangan aplikasi,
                    website, dan game.
                </p>

            </div>


            {{-- =================================================
                 TJKT
            ================================================== --}}

            <div
                class="program-card"
                onclick="window.location.href='{{ route('program.show', 'tjkt') }}'"
            >

                <div class="program-logo">

                    <img
                        src="{{ asset('storage/jurusan/tjkt.PNG') }}"
                        alt="TJKT"
                    >

                </div>

                <div class="program-content">

                    <h3>
                        TJKT
                    </h3>

                    <p>
                        Program keahlian yang berfokus
                        pada jaringan komputer dan sistem
                        telekomunikasi.
                    </p>

                </div>

            </div>


            {{-- =================================================
                 TPFL
            ================================================== --}}

            <div
                class="program-card"
                onclick="window.location.href='{{ route('program.show', 'tpfl') }}'"
            >

                <div class="program-logo">

                    <img
                        src="{{ asset('storage/jurusan/tpfl.PNG') }}"
                        alt="TPFL"
                    >

                </div>

                <div class="program-content">

                    <h3>
                        TPFL
                    </h3>

                    <p>
                        Program keahlian yang berfokus
                        pada teknik pengelasan dan
                        pengolahan logam.
                    </p>

                </div>

            </div>


            {{-- =================================================
                 TKRO
            ================================================== --}}

            <div
                class="program-card"
                onclick="window.location.href='{{ route('program.show', 'tkro') }}'"
            >

                <div class="program-logo">

                    <img
                        src="{{ asset('storage/jurusan/tkro.PNG') }}"
                        alt="Logo TKRO"
                    >

                </div>

                <h3>
                    TKRO
                </h3>

                <p>
                    Program keahlian yang berfokus
                    pada perawatan dan perbaikan
                    kendaraan bermotor.
                </p>

            </div>


        </div>

    </div>

</section>

{{-- =========================================================
     ARTIKEL TERBARU
========================================================== --}}

<section class="home-section articles" id="artikel">

    <div class="home-inner">

        <div class="section-heading">

            <h2>
                Artikel Terbaru
            </h2>

            <p>
                Informasi dan berita terbaru dari
                SMK Negeri 4 Bogor.
            </p>

        </div>


        <div class="article-grid">

    @foreach($articles as $article)

        <article class="article-card">

            <div class="article-image">

                @if($article->image)
                    <img
                        src="{{ asset('storage/' . $article->image) }}"
                        alt="{{ $article->title }}"
                    >
                @else
                    <div style="
                        width:100%;
                        height:100%;
                        display:flex;
                        align-items:center;
                        justify-content:center;
                        color:#64748b;
                        font-size:13px;
                    ">
                        Tidak ada gambar
                    </div>
                @endif

            </div>


            <div class="article-content">

                <div class="article-date">
                    {{ $article->created_at->format('d F Y') }}
                </div>

                <h3>
                    {{ $article->title }}
                </h3>

                <p>
                    {{ \Illuminate\Support\Str::limit(strip_tags($article->content), 120) }}
                </p>

                <a
                    href="{{ route('articles.show', $article->slug) }}"
                    class="text-link"
                >
                    Baca Selengkapnya →
                </a>

            </div>

        </article>

    @endforeach

</div>

</div>

    <div class="article-more">

    <a href="{{ route('articles.index') }}">
        Lihat Selengkapnya →
    </a>

        </div>

    </div>

</section>


{{-- =========================================================
     GALERI
========================================================== --}}

<section class="home-section gallery" id="galeri">

    <div class="home-inner">

        <div class="gallery-heading">

            <h2>
                Galeri Kegiatan
            </h2>

        </div>


        @php
    $galleryPhotos = $galleryCategories->map(function ($category) {
        return $category->photos->first();
    })->filter();
@endphp

{{-- BARIS 1 --}}
<div class="gallery-row gallery-row-top">
    @foreach($galleryPhotos->take(4) as $photo)
        <div class="gallery-card">
            <img
                src="{{ asset('storage/' . $photo->image) }}"
                alt="{{ $photo->title ?? 'Galeri' }}"
            >
        </div>
    @endforeach
</div>

{{-- BARIS 2 --}}
<div class="gallery-row gallery-row-bottom">
    @foreach($galleryPhotos->slice(4, 3) as $photo)
        <div class="gallery-card">
            <img
                src="{{ asset('storage/' . $photo->image) }}"
                alt="{{ $photo->title ?? 'Galeri' }}"
            >
        </div>
    @endforeach
</div>

<div class="gallery-button">
    <a href="{{ route('gallery.index') }}" class="gallery-more">
        Lihat Selengkapnya →
    </a>
</div>

</div>

</section>

{{-- =========================================================
     KONTAK
========================================================= --}}

<section id="kontak" class="contact-section">

    <div class="contact-container">

        {{-- =========================
             SECTION HEADING
        ========================== --}}
        <div class="section-heading contact-heading">

            <h2>Kontak</h2>

        </div>

        <p class="contact-subtitle">
            Hubungi kami untuk mendapatkan informasi lebih lanjut
            mengenai SMK Negeri 4 Bogor.
        </p>


        {{-- =========================
             CONTACT CONTENT
        ========================== --}}
        <div class="contact-content">

            {{-- =========================
                 CONTACT INFORMATION
            ========================== --}}
            <div class="contact-info">

                <h3>
                    Hubungi Kami
                </h3>


                {{-- ALAMAT --}}
                <div class="contact-item">

                    <div class="contact-icon">
                        <i class="fa-solid fa-location-dot"></i>
                    </div>

                    <div class="contact-item-text">

                        <h4>Alamat</h4>

                        <p>
                            {{ $contact->address ?? 'Jl. Raya Tajur No. 141, Muarasari, Kec. Bogor Selatan, Kota Bogor, Jawa Barat 16134' }}
                        </p>

                    </div>

                </div>


                {{-- TELEPON --}}
                <div class="contact-item">

                    <div class="contact-icon">
                        <i class="fa-solid fa-phone"></i>
                    </div>

                    <div class="contact-item-text">

                        <h4>Telepon</h4>

                        <p>
                            {{ $contact->phone ?? '(0251) 8242411' }}
                        </p>

                    </div>

                </div>


                {{-- EMAIL --}}
                <div class="contact-item">

                    <div class="contact-icon">
                        <i class="fa-solid fa-envelope"></i>
                    </div>

                    <div class="contact-item-text">

                        <h4>Email</h4>

                        <p>
                            {{ $contact->email ?? 'info@smkn4bogor.sch.id' }}
                        </p>

                    </div>

                </div>


                {{-- WHATSAPP --}}
                <div class="contact-item">

                    <div class="contact-icon">
                        <i class="fa-brands fa-whatsapp"></i>
                    </div>

                    <div class="contact-item-text">

                        <h4>WhatsApp</h4>

                        <p>
                            {{ $contact->whatsapp ?? '-' }}
                        </p>

                    </div>

                </div>


                {{-- JAM OPERASIONAL --}}
                <div class="contact-item">

                    <div class="contact-icon">
                        <i class="fa-regular fa-clock"></i>
                    </div>

                    <div class="contact-item-text">

                        <h4>Jam Operasional</h4>

                        <p>
                            {{ $contact->operational_days ?? 'Senin - Jumat' }}:
                            {{ $contact->opening_time ?? '07.00' }} -
                            {{ $contact->closing_time ?? '16.00' }}
                        </p>

                    </div>

                </div>


                {{-- =========================
                     SOSIAL MEDIA
                ========================== --}}
                <div class="contact-social">

    <h4>
        Ikuti Kami
    </h4>

    <div class="contact-social-list">

        <a href="{{ !empty($contact->twitter)
            ? (str_starts_with($contact->twitter, 'http://') || str_starts_with($contact->twitter, 'https://')
                ? $contact->twitter
                : 'https://' . ltrim($contact->twitter, '/'))
            : '#' }}"
           target="_blank"
           rel="noopener noreferrer"
           aria-label="X / Twitter">

            <i class="fa-brands fa-x-twitter"></i>

        </a>

        <a href="{{ !empty($contact->facebook)
            ? (str_starts_with($contact->facebook, 'http://') || str_starts_with($contact->facebook, 'https://')
                ? $contact->facebook
                : 'https://' . ltrim($contact->facebook, '/'))
            : '#' }}"
           target="_blank"
           rel="noopener noreferrer"
           aria-label="Facebook">

            <i class="fa-brands fa-facebook-f"></i>

        </a>

        <a href="{{ !empty($contact->instagram)
            ? (str_starts_with($contact->instagram, 'http://') || str_starts_with($contact->instagram, 'https://')
                ? $contact->instagram
                : 'https://' . ltrim($contact->instagram, '/'))
            : '#' }}"
           target="_blank"
           rel="noopener noreferrer"
           aria-label="Instagram">

            <i class="fa-brands fa-instagram"></i>

        </a>

        <a href="{{ !empty($contact->youtube)
            ? (str_starts_with($contact->youtube, 'http://') || str_starts_with($contact->youtube, 'https://')
                ? $contact->youtube
                : 'https://' . ltrim($contact->youtube, '/'))
            : '#' }}"
           target="_blank"
           rel="noopener noreferrer"
           aria-label="YouTube">

            <i class="fa-brands fa-youtube"></i>

        </a>

    </div>

</div>

</div>

            {{-- =========================
                 GOOGLE MAPS
            ========================== --}}
            <div class="contact-map">

                <h3>
                    Lokasi Kami
                </h3>

                <div class="map-wrapper">

                    @if(!empty($contact->google_maps))

                        <iframe
                    src="{{ $contact->google_maps }}"
                    loading="lazy"
                    allowfullscreen
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>

                    @else

                        <div class="map-placeholder">

                            <i class="fa-solid fa-location-dot"></i>

                            <p>
                                Lokasi SMK Negeri 4 Bogor
                            </p>

                            <a
                                href="https://maps.app.goo.gl/QhuzBfoueBW5eM139"
                                target="_blank">
                                Lihat di Google Maps
                            </a>

                        </div>

                    @endif

                </div>

            </div>

        </div>

    </div>

</section>

@endsection