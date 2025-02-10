<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[WebReinvent](https://webreinvent.com/)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Jump24](https://jump24.co.uk)**
- **[Redberry](https://redberry.international/laravel/)**
- **[Active Logic](https://activelogic.com)**
- **[byte5](https://byte5.de)**
- **[OP.GG](https://op.gg)**

## LKS 2023 Practice Problem

This project is a practice problem for the LKS (Lomba Kompetensi Siswa) 2023. It is designed to help students prepare for the competition by working on a real-world application using the Laravel framework.

## Latihan Soal LKS 2023

Proyek ini adalah latihan soal LKS Jatim 2023 untuk persiapan LKS saya

## Deskripsi Proyek dan Tugas

Kita semua tahu bahwa saat ini banyak lulusan yang menganggur. Oleh karena itu, pemerintah menunjuk Anda sebagai orang yang kompeten untuk membuat platform pencari kerja. Tujuan dari platform ini adalah agar masyarakat dapat menemukan pekerjaan di platform tanpa harus datang langsung ke lokasi perusahaan dan juga dapat melihat kapan dan di mana masyarakat dapat datang ke lokasi perusahaan.

### Deskripsi Proyek dan Tugas

Pendaftaran melibatkan platform masyarakat (mendaftar ke platform dan melamar pekerjaan), platform perusahaan (memberikan pekerjaan, melihat dan menerima/menolak pendaftaran dari masyarakat), dan platform petugas (memperbarui data perusahaan, memeriksa validitas data masyarakat). Namun, ruang lingkup pekerjaan Anda pada modul ini hanya untuk membuat platform masyarakat. Tugas Anda adalah membuat REST API aplikasi pekerjaan masyarakat menggunakan salah satu kerangka kerja PHP yang disediakan (Laravel).

## Dokumentasi API

### Autentikasi

#### Login
- **Endpoint:** `POST /api/v1/auth/login`
- **Deskripsi:** Melakukan login pengguna.
- **Parameter:**
  - `email` (string, required)
  - `password` (string, required)

#### Logout
- **Endpoint:** `POST /api/v1/auth/logout`
- **Deskripsi:** Melakukan logout pengguna.
- **Middleware:** `VerifyToken`

### Validasi

#### Buat Validasi
- **Endpoint:** `POST /api/v1/validations`
- **Deskripsi:** Membuat validasi baru.
- **Middleware:** `VerifyToken`

#### Dapatkan Validasi
- **Endpoint:** `GET /api/v1/validations`
- **Deskripsi:** Mendapatkan daftar validasi.
- **Middleware:** `VerifyToken`

### Lowongan Pekerjaan

#### Dapatkan Lowongan
- **Endpoint:** `GET /api/v1/job_vacancies`
- **Deskripsi:** Mendapatkan daftar lowongan pekerjaan.
- **Middleware:** `VerifyToken`

#### Dapatkan Detail Lowongan
- **Endpoint:** `GET /api/v1/job_vacancies/{id}`
- **Deskripsi:** Mendapatkan detail lowongan pekerjaan berdasarkan ID.
- **Middleware:** `VerifyToken`

### Aplikasi

#### Ajukan Lamaran
- **Endpoint:** `POST /api/v1/applications`
- **Deskripsi:** Mengajukan lamaran pekerjaan.
- **Middleware:** `VerifyToken`

#### Dapatkan Semua Lamaran
- **Endpoint:** `GET /api/v1/applications`
- **Deskripsi:** Mendapatkan semua lamaran pekerjaan yang diajukan.
- **Middleware:** `VerifyToken`

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
