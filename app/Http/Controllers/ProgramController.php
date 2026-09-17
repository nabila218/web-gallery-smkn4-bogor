<?php

namespace App\Http\Controllers;

class ProgramController extends Controller
{
    public function show($slug)
    {
        $programs = [

            'pplg' => [

                'title' => 'Pengembangan Perangkat Lunak dan Gim',
                'short_title' => 'PPLG',

                'logo' => 'storage/jurusan/pplg.PNG',

                'banner' => 'storage/program/lab pplg.JPG',

                'description' =>
                    'Program Keahlian Pengembangan Perangkat Lunak dan Gim (PPLG) membekali peserta didik dengan kemampuan merancang, membuat, mengembangkan, dan menguji perangkat lunak berbasis web, desktop, maupun mobile. Selain mempelajari bahasa pemrograman dan basis data, peserta didik juga dikenalkan dengan UI/UX, pengembangan gim, serta teknologi yang sesuai dengan kebutuhan dunia industri. Lulusan PPLG dipersiapkan menjadi tenaga profesional di bidang teknologi informasi maupun melanjutkan pendidikan ke jenjang yang lebih tinggi.',

                'materials' => [
                    'Dasar Pemrograman',
                    'Pemrograman Web',
                    'Pemrograman Mobile',
                    'Basis Data',
                    'UI/UX Design',
                    'Laravel',
                    'Flutter',
                    'Git & GitHub',
                ],

                'careers' => [
                    'Web Developer',
                    'Mobile Developer',
                    'Software Engineer',
                    'Game Developer',
                    'UI/UX Designer',
                    'Database Administrator',
                ],

                'instagram' => '@kr4bat_pplg',
                'instagram_url' => 'https://www.instagram.com/kr4bat_pplg',
            ],


            'tjkt' => [

                'title' => 'Teknik Jaringan Komputer dan Telekomunikasi',
                'short_title' => 'TJKT',

                'logo' => 'storage/jurusan/tjkt.PNG',

                'banner' => 'storage/program/lab tjkt.JPG',

                'description' =>
                    'Program Keahlian Teknik Jaringan Komputer dan Telekomunikasi (TJKT) berfokus pada pembelajaran instalasi, konfigurasi, dan pemeliharaan jaringan komputer serta perangkat telekomunikasi. Peserta didik akan mempelajari administrasi server, keamanan jaringan, hingga teknologi berbasis internet yang digunakan di dunia kerja. Dengan pembelajaran berbasis praktik, lulusan TJKT diharapkan mampu bersaing sebagai tenaga profesional di bidang jaringan dan teknologi informasi.',

                'materials' => [
                    'Jaringan Komputer',
                    'Mikrotik',
                    'Cisco',
                    'Fiber Optik',
                    'Linux Server',
                    'Cloud Computing',
                    'Internet of Things (IoT)',
                ],

                'careers' => [
                    'Network Engineer',
                    'Network Administrator',
                    'IT Support',
                    'System Administrator',
                    'Teknisi Fiber Optik',
                ],

                'instagram' => '@official.tkjsmkn4bogor',
                'instagram_url' => 'https://www.instagram.com/official.tkjsmkn4bogor',
            ],


            'tpfl' => [

                'title' => 'Teknik Pengelasan dan Fabrikasi Logam',
                'short_title' => 'TPFL',

                'logo' => 'storage/jurusan/tpfl.PNG',

                'banner' => 'storage/program/bengkel tpfl.JPG',

                'description' =>
                    'Program Keahlian Teknik Pengelasan dan Fabrikasi Logam (TPFL) membekali peserta didik dengan keterampilan dalam proses pengelasan, fabrikasi logam, serta membaca gambar teknik sesuai standar industri. Pembelajaran didukung dengan praktik menggunakan peralatan yang memadai sehingga peserta didik memiliki pengalaman kerja yang relevan. Lulusan TPFL siap bekerja di berbagai sektor industri manufaktur, konstruksi, maupun berwirausaha di bidang pengelasan.',

                'materials' => [
                    'SMAW',
                    'GMAW (MIG)',
                    'GTAW (TIG)',
                    'Fabrikasi Logam',
                    'Gambar Teknik',
                    'Keselamatan Kerja (K3)',
                ],

                'careers' => [
                    'Welder',
                    'Fabricator',
                    'Quality Control',
                    'Supervisor Produksi',
                    'Wirausaha Pengelasan',
                ],

                'instagram' => '@kr4bat_welding',
                'instagram_url' => 'https://www.instagram.com/kr4bat_welding',
            ],


            'tkro' => [

                'title' => 'Teknik Otomotif',
                'short_title' => 'TO',

                'logo' => 'storage/jurusan/tkro.PNG',

                'banner' => 'storage/program/bengkel tkro.JPG',

                'description' =>
                    'Program Keahlian Teknik Otomotif (TO) mempelajari perawatan, perbaikan, dan diagnosis kendaraan bermotor dengan mengutamakan keterampilan praktik serta penerapan teknologi otomotif terkini. Peserta didik dibekali kompetensi di bidang mesin, kelistrikan, dan sistem kendaraan sehingga mampu menghadapi kebutuhan dunia kerja. Lulusan Teknik Otomotif dipersiapkan menjadi tenaga kerja yang kompeten di industri otomotif maupun membuka usaha sendiri.',

                'materials' => [
                    'Engine',
                    'Chassis',
                    'Kelistrikan Kendaraan',
                    'Tune Up',
                    'Sistem Injeksi',
                    'Servis Berkala',
                ],

                'careers' => [
                    'Mekanik',
                    'Service Advisor',
                    'Teknisi Dealer',
                    'Teknisi Kendaraan',
                    'Wirausaha Bengkel',
                ],

                'instagram' => '@kr4bat_otomotif',
                'instagram_url' => 'https://www.instagram.com/kr4bat_otomotif',
            ],

        ];


        if (!isset($programs[$slug])) {
            abort(404);
        }


        $program = $programs[$slug];


        return view('programs.show', compact('program'));
    }
}