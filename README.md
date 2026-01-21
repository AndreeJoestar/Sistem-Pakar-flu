# 🩺 Sistem Pakar Diagnosis Penyakit Flu  
**Metode Forward Chaining | PHP & MySQL**

---

## 📌 Deskripsi Proyek
Sistem Pakar Diagnosis Penyakit Flu adalah aplikasi berbasis web yang berfungsi untuk membantu melakukan **diagnosis awal penyakit flu** berdasarkan **gejala yang dialami pasien**.

Sistem ini menerapkan **metode Forward Chaining**, yaitu metode penalaran dalam sistem pakar yang bekerja dari **fakta awal (gejala)** menuju **kesimpulan (hasil diagnosis)** berdasarkan aturan (rule) yang telah ditentukan.

Proyek ini dibuat untuk memenuhi **tugas mata kuliah Sistem Pakar**.

---

## 🧠 Metode Sistem Pakar
### Forward Chaining
Forward Chaining adalah teknik inferensi yang:
1. Memulai penalaran dari fakta (input gejala)
2. Mencocokkan fakta dengan aturan (IF–THEN)
3. Menghasilkan kesimpulan (diagnosis)

### Contoh Aturan:
- Jika demam, batuk, pilek → Flu Ringan  
- Jika demam ≥ 3 hari dan nyeri otot → Flu Sedang  
- Jika disertai sesak napas → Flu Berat  

---

---

## 📂 Struktur Folder Proyek

```text
Sistem-Pakar-flu/
│
├── admin.php          # Halaman admin (data diagnosis pasien)
├── home.php           # Halaman awal (menu Pasien & Admin)
├── index.php          # Form input diagnosis pasien
├── proses.php         # Proses forward chaining
├── hasil.php          # Hasil diagnosis
├── edit.php           # Edit data diagnosis
├── update.php         # Update data diagnosis
├── delete.php         # Hapus data diagnosis
├── koneksi.php        # Koneksi database
│
├── database/
│   └── diagnosis.sql  # Struktur tabel & data database
│
└── README.md
```

---

## 🚀 Cara Menjalankan Aplikasi

### 1️⃣ Clone Repository
```bash
git clone https://github.com/AndreeJoestar/Sistem-Pakar-flu.git

