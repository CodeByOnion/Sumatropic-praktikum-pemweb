<div align="center">
  <img src="assets/image/Logo.png" alt="Logo Sumatropic" width="200">

  # SUMATROPIC
  **Hutan Sumatra, Warisan yang Harus Dijaga**

  ![PHP](https://img.shields.io/badge/Backend-PHP%20Native-777BB4?style=for-the-badge&logo=php&logoColor=white)
  ![MySQL](https://img.shields.io/badge/Database-MySQL-4479A1?style=for-the-badge&logo=mysql&logoColor=white)
  ![Figma](https://img.shields.io/badge/Design-Figma-F24E1E?style=for-the-badge&logo=figma&logoColor=white)
  ![CSS3](https://img.shields.io/badge/Frontend-CSS3-1572B6?style=for-the-badge&logo=css3&logoColor=white)
  ![JavaScript](https://img.shields.io/badge/Frontend-JavaScript-F7DF1E?style=for-the-badge&logo=javascript&logoColor=black)

  <p align="center">
    <a href="#-tentang-project">Tentang</a> •
    <a href="#-fitur-unggulan">Fitur</a> •
    <a href="#-identitas-desain-uiux">Desain</a> •
    <a href="#-instalasi--cara-menjalankan">Instalasi</a> •
    <a href="#-tim-developer">Tim</a>
  </p>
</div>

---

## Tentang Project

**SUMATROPIC** adalah platform edukasi dan konservasi berbasis web yang didedikasikan untuk mengangkat keanekaragaman hayati endemik Pulau Sumatera. Di tengah ancaman deforestasi dan kepunahan satwa, website ini hadir dengan misi *"Small action matters"*—membangun kesadaran publik bahwa tindakan kecil dapat membawa dampak besar.

Melalui platform ini, user bisa menjelajahi informasi mengenai flora dan fauna unik Sumatra, mendapatkan berita konservasi terkini, serta berkontribusi nyata melalui fitur donasi dan *volunteer*.

> **Project:** Dibuat untuk memenuhi Responsi 2 Praktikum Pemrograman Web (Semester 3).

## Fitur

### Publik Access
* **Landing Page:** Menampilkan *Hero section*, Informasi umum Sumatra  ("Introducing Sumatra"), fakta unik (*Funfact*), highlight flora & fauna, events (volunteer dan donasi), serta berita terbaru terkait flora, fauna, konservasi, dan isu lingkungan.
* **Flora & Fauna:** Database spesies endemik (seperti Harimau Sumatera, Rafflesia Arnoldii) dilengkapi status konservasi (Extinct, Extinct in the Wild, Critically Endangered, Endangered, Vulnerable, Least Concern).
* **Berita:** Berita dan update terkini seputar flora, fauna, konservasi, dan isu lingkungan.

### User Access
* **Landing Page:** Menampilkan *Hero section*, Informasi umum Sumatra, fakta unik (*Funfact*), highlight flora & fauna, events (volunteer dan donasi), serta berita terbaru terkait flora, fauna, konservasi, dan isu lingkungan.
* **Flora & Fauna:** Database spesies endemik (seperti Harimau Sumatera, Rafflesia Arnoldii) dilengkapi status konservasi (Extinct, Extinct in the Wild, Critically Endangered, Endangered, Vulnerable, Least Concern).
* **Berita:** Berita dan update terkini seputar flora, fauna, konservasi, dan isu lingkungan.
* **Events:** Menampilkan events yang hanya bisa diikuti oleh user 
    * **Volunteer:** Informasi kegiatan volunteer dengan link eksternal organisasi konservasi nyata.
    * **Donasi:** Simulasi fitur donasi untuk mendukung kebutuhan pakan, medis, dan perawatan satwa.

### Sistem
* **Multi-level Login:** Akses terpisah untuk **Admin** dan **User Biasa**.
* **Registrasi Akun:** Pendaftaran pengguna baru dengan password.

### Dashboard Admin
* **Kelola Konten (CRUD):** Admin bisa CRUD (Create, Read, Update, Delete) data:
    * Data Flora
    * Data Fauna
    * Data Berita
    * Data Donasi 
* **Kelola User:** Mengelola data user terdaftar.

## Tech Stack

Project ini dibangun menggunakan teknologi *native*:

* **Backend:** PHP (native/tanpa framework)
* **Frontend:** HTML, CSS, JavaScript
* **Database:** MySQL 
* **Tools:** VS Code, Figma, XAMPP/Laragon, GitHub

## Desain (UI/UX)

Mengambil konsep **"Nature"**, desain UI dibuat untuk memberikan kesan *Fresh, Organic, and Calming*.

### Tipografi
* **Judul (Headings):** `Crimson Text` (Serif)
* **Isi (Body):** `Inter` (Sans-serif)

### Color Palette
| Warna | Hex Code | Penggunaan |
| :--- | :--- | :--- |
| **Leuser Green 1** | `#325118` | Warna untuk navbar, teks dan judul dengan background terang|
| **Leuser Green 2** | `#1D320D` | Warna untuk footer |
| **Tiger Gold** | `#E66D07` | Warna untuk hal-hal yang perlu aksi dari user (tombol CTA), highlight hal yang cukup penting |
| **Rafflesia Red** | `#E70000` | Warna untuk alert, status konservasi, hapus data, tombol logout/keluar akun |
| **Misty White** | `#FDFBE4` | Warna untuk background halaman |

## Instalasi & Cara Menjalankan

Ikuti langkah-langkah ini untuk menjalankan project di localhost:

1.  **Clone Repository**
    Buka terminal/git bash dan jalankan perintah:
    ```bash
    git clone [https://github.com/CodeByOnion/Sumatropic-praktikum-pemweb.git](https://github.com/CodeByOnion/Sumatropic-praktikum-pemweb.git)
    ```

2.  **Gunakan localhost**
    * Pindahkan folder project hasil clone ke dalam direktori server:
        * **XAMPP:** `Drive C/D bergantung tempat penyimpanan masing-masing:\xampp\htdocs\Sumatropic-praktikum-pemweb`
        * **Laragon:** `Drive C/D bergantung tempat penyimpanan masing-masing:\laragon\www\Sumatropic-praktikum-pemweb`
    * Nyalakan **Apache** dan **MySQL**.

3.  **Setup Database**
    * Buka browser dan akses `http://localhost/phpmyadmin`.
    * Buat database baru dengan nama: **`sumatropic_db`**
    * Pilih tab **Import**, lalu upload file database (`.sql`) yang ada di folder project (`database.sql`).

4.  **Jalankan Website**
    * Buka browser dan akses: `http://localhost/Sumatropic-praktikum-pemweb`.

## ERD

Gambaran singkat struktur tabel utama dalam database:

* `users`: Menyimpan data akun admin & user (id, username, email, password, role, tanggal login)
* `florafauna`: Data flora/tanaman dan fauna/hewan endemik (id, nama lokal, nama ilmiah, kategori, status konservasi, deskripsi, gambar, dan tanggal input)
* `news`: Menyimpan data berita (id, judul, deskripsi singkat, url sumber, gambar, tanggal tayang, dan tanggal input)
* `donasi`: (SOON AKAN SEGERA DIBUAT, TAPI GAMBARANNYA GINI) Mencatat riwayat donasi pengguna (id, username, nominal, pesan, tanggal)

## Tim Developer

Project ini dikembangkan oleh Kelompok Sumatropic:

* **Yustinus Ergi Owen Sinaga (H1D024072)** - Ketua: Frontend
* **Raihan Dwi Ananda Harvian (H1D024091)** - Anggota: Backend
* **Latifanika Nurafwi (H1D024099)** - Anggota: UI/UX

---
<p align="center">Sumatropic. Made with 💚 for Sumatra's Wildlife</p>