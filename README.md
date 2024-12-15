# responsi
WEBGIS Persebaran Fasilitas Kesehatan di Kabupaten Lingga, Riau
Peta Sehati - Website GIS Persebaran Fasilitas Kesehatan Kabupaten Lingga

## Nama Produk
PETA SEHATI yang merupakan WEBSITE GIS untuk Persebaran Fasilitas Kesehatan Kabupaten Lingga

## Deskripsi Produk
Peta Sehati adalah website berbasis GIS yang menyediakan peta interaktif untuk menampilkan persebaran fasilitas kesehatan di Kabupaten Lingga. Informasi yang ditampilkan meliputi lokasi fasilitas kesehatan, jenis layanan yang tersedia, serta detail tambahan seperti alamat dan kontak. Website ini bertujuan memudahkan masyarakat dalam mengakses informasi terkait fasilitas kesehatan serta membantu pengambilan kebijakan berbasis spasial.

## Fitur utama dari PETA SEHATI ini yaitu
1.	Landing page yang berisi tampilan utama ketiga mengunjungi website
2.	Di dalam Landing page terdapat fitur pencarian fasilitas yang kemudian diarahkan ke informasi detail informasi fasilitas Kesehatan Kabupaten Lingga yang terdata di database kami, seperti nama, kontak, Alamat, layanan, dan gambar dari faskes yang ditampilkan.
3.	Fitur navigasi ke database yang menggunakan fungsi CRUD (Create, Read, Update, Delete) untuk mengelola informasi data faskes di Kabupaten Lingga
4.	Fitur Create untuk menambahkan data, Read untuk menampilkan data, Update untuk mengedit data, Delete untuk menghapus data.
5.	Fitur pembuatan statistik dari hasil database yang dimiliki
6.	About yang menjelaskan latar belakang, kritik dan saran, serta informasi pembuat
7.	Kritik dan saran untuk memberikan kesempatan kepada pengguna memberikan kritik dan saran atas website yang diunggah
8.	Fitur modal yang berisi informasi pembuat website
9.	Peta yang menampilkan persebaran faskes Kabupaten Lingga yang di dalamnya terdapat beberapa fitur zoom in, zoom out, zoom extent, search, pembuatan data vektor (titik, garis, polygon, circle, pengeditan, dan penghapusan), geolocation, control layer (basemaps dan overlaymaps), pop up, tool tip
10.	Tampilan respontif terhadap pengguna

## Komponen Pembangun Produk dengan menggunakan 
Frontend:
   - HTML dan CSS: Untuk struktur dasar dan tampilan website.
   - Bootstrap: Untuk desain responsif dan antarmuka modern.
   - JavaScript: Untuk interaktivitas peta.
   - Leaflet.js: Library utama untuk menampilkan peta interaktif.
   - Google API: opsi tambahan untuk peta, geocoding, dan sumber data spasial

Backend:
   - PHP: Untuk manajemen data dan koneksi server.
   - MySQL: Basis data penyimpanan informasi fasilitas kesehatan.

Geospatial Components:
   - GeoJSON: Format data spasial yang digunakan untuk lokasi fasilitas.

Framework Tambahan:
   - Leaflet-GeoJSON: Untuk menampilkan data dalam format GeoJSON di peta.

## Sumber Data
Data yang digunakan dalam proyek ini meliputi:
1. Data persebaran Fasilitas Kesehatan, Jalan, dan Administrasi dari Badan Informasi Geospasial (BIG) atau Inageoportal dalam bentuk shapefile kemudian dikonversi menjadi GeoJSON.
2. Peta Dasar yang dijadikan untuk basemap dari OpenStreetMap (OSM), Stamen Toner, CartoDB Positron, Esri Worls Imagery, OpenTopoMap, Thunderforest Outdoors dalam format Tile Layer
3. Icon/gambar yang digunakan untuk memvisualisasikan beberapa tombol dan data dalam format png, jpg, jpeg, html didapatkan dari freepik, fontawesome

## Tangkapan Layar Komponen Penting Produk PETA SEHATI
1. Landing Page
 ![image](https://github.com/user-attachments/assets/6d2c5245-96fc-4eb3-913d-48f4a3f80f73)

2. Elemen Database
![image](https://github.com/user-attachments/assets/1d9f3817-0489-43c3-8d8b-48837b654092)
 
3. WEBGIS
![image](https://github.com/user-attachments/assets/d01d3da5-ab44-405f-a992-ff21d311485d)

4. Popup fasilitas Kesehatan
![image](https://github.com/user-attachments/assets/64ec5104-f730-4f64-b914-be2e2c20da31)

5. Statistik
![image](https://github.com/user-attachments/assets/c5b8fb02-f6ab-4299-a76f-8e7f3e71e84b)

7. Modal informasi pembuat
![image](https://github.com/user-attachments/assets/54520b0b-3151-4b4b-957d-499521831ab9)

9. Detail Informasi Fasilitas Kesehatan
![image](https://github.com/user-attachments/assets/eac5f64a-1703-46f1-8967-a61f2ac937b2)
 

## Kontak Pengembang
Jika ada pertanyaan atau masukan terkait proyek ini, silakan menghubungi:
- Nama : Shelamita Amanah Wibowo
- Email : shelamitaamanah@gmail.com
- Linkedin : https://id.linkedin.com/in/shelamita-amanah-0398a0294

Terima kasih telah menggunakan PETA SEHATI!


