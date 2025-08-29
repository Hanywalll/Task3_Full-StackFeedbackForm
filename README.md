# Full-Stack Feedback Form

## 📌 Deskripsi
Project ini adalah aplikasi full-stack sederhana yang memungkinkan pengguna untuk mengirimkan feedback terkait sebuah produk.  
Aplikasi ini terdiri dari **backend** menggunakan PHP (API) dan **frontend** menggunakan HTML + JavaScript.

---

## ⚙️ Fitur
- Pengguna dapat mengirim feedback berupa:
  - Nama
  - Email
  - Komentar
- Validasi input dilakukan pada **client-side (JavaScript)** dan **server-side (PHP)**.
- Feedback yang dikirim akan tersimpan dan ditampilkan secara dinamis di bawah form.
- Frontend melakukan **fetch API** untuk menampilkan data feedback tanpa reload halaman.

---

## 🏗️ Teknologi
- **Backend**: PHP (API untuk submit & retrieve feedback)
- **Frontend**: HTML, CSS, JavaScript (AJAX / Fetch API)
- **Database**: MySQL (opsional, untuk menyimpan feedback)


## 🗄️ Database

Proyek ini terhubung dengan **MySQL** untuk menyimpan umpan balik pengguna.

- **Nama Database:** `user_auth`  
- **Nama Tabel:** `feedback.sql`

👉 Skrip SQL untuk membuat tabel tersedia secara terpisah dalam repositori.

---
