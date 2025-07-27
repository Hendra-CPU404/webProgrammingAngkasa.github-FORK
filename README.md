# StyleHub - Fashion Web App

Platform fashion modern untuk mengekspresikan gaya unik - dari skena underground hingga streetwear premium. Aplikasi web yang dapat di-update secara dinamis dengan sistem content management yang mudah digunakan.

## 🌟 Fitur Utama

### Frontend
- **Modern UI/UX**: Design yang menarik dengan animasi smooth dan responsive
- **Fashion Categories**: Skena, Casual, Streetwear, Vintage, Minimalist, dan lainnya
- **Dynamic Filtering**: Filter konten berdasarkan kategori fashion
- **Interactive Elements**: Hover effects, smooth scrolling, dan animasi loading
- **Real-time Updates**: Data ter-update otomatis tanpa refresh manual

### Backend & Admin
- **REST API**: Backend PHP dengan endpoint CRUD lengkap
- **Admin Panel**: Interface modern untuk mengelola konten
- **Content Management**: Tambah, edit, hapus styles, lookbook, dan trends
- **Statistics Dashboard**: Overview data dengan visualisasi menarik
- **Data Persistence**: Penyimpanan data dalam format JSON

## 🚀 Teknologi yang Digunakan

- **Frontend**: HTML5, CSS3, JavaScript (ES6+)
- **Backend**: PHP 7.4+
- **Database**: JSON file (dapat diupgrade ke MySQL/PostgreSQL)
- **Styling**: Custom CSS dengan Flexbox & Grid
- **Icons**: Font Awesome 6
- **Fonts**: Google Fonts (Inter, Playfair Display)

## 📁 Struktur File

```
fashion-project/
├── fashion_app.html              # Halaman utama (static version)
├── fashion_app_dynamic.html      # Halaman utama (dynamic version)
├── admin.html                    # Panel admin untuk content management
├── fashion_api.php               # REST API backend
├── fashion_data.json             # Database file (auto-generated)
├── README.md                     # Dokumentasi project
└── img/                          # Folder untuk gambar (optional)
```

## 🛠️ Instalasi & Setup

### Persyaratan Sistem
- Web server dengan PHP 7.4+ (Apache/Nginx)
- Browser modern (Chrome, Firefox, Safari, Edge)

### Langkah Instalasi

1. **Clone atau Download Project**
   ```bash
   # Jika menggunakan git
   git clone [repository-url]
   cd fashion-project
   
   # Atau download dan extract file
   ```

2. **Setup Web Server**
   - Letakkan semua file di dalam folder web server (htdocs/www)
   - Pastikan PHP dapat menulis file (untuk fashion_data.json)
   - Aktifkan mod_rewrite jika menggunakan Apache

3. **Akses Aplikasi**
   - Buka browser dan akses: `http://localhost/fashion-project/fashion_app_dynamic.html`
   - Untuk admin panel: `http://localhost/fashion-project/admin.html`

## 📖 Cara Penggunaan

### Untuk User/Pengunjung

1. **Explore Styles**
   - Kunjungi halaman utama
   - Browse berbagai kategori fashion
   - Gunakan filter untuk mencari style tertentu
   - Klik pada card untuk melihat detail

2. **View Trends**
   - Scroll ke bagian trends
   - Lihat popularity score setiap trend
   - Trends diurutkan berdasarkan popularitas

### Untuk Admin/Content Manager

1. **Akses Admin Panel**
   - Buka `admin.html`
   - Dashboard menampilkan statistik konten

2. **Mengelola Styles**
   - Klik tab "Styles"
   - Tambah style baru dengan tombol "Add Style"
   - Edit atau hapus style yang sudah ada
   - Isi form dengan detail lengkap:
     - Nama style
     - Kategori
     - Deskripsi
     - Tags (pisahkan dengan koma)

3. **Mengelola Lookbook**
   - Klik tab "Lookbook"
   - Tambah inspirasi outfit baru
   - Kategorikan berdasarkan style

4. **Mengelola Trends**
   - Klik tab "Trends"
   - Tambah trend fashion terbaru
   - Set popularity score (1-100)

## 🎨 Kategori Fashion yang Tersedia

### Skena (🖤)
Style underground dengan nuansa dark dan mysterious. Perfect untuk yang suka tampil beda dan ekspresif.

### Casual (👕)
Kombinasi comfort dan style untuk daily wear. Cocok untuk hangout, kuliah, atau aktivitas santai.

### Streetwear (👟)
High-end streetwear dengan brand premium. Menggabungkan luxury dengan street culture.

### Vintage (🕰️)
Fashion retro dengan sentuhan klasik yang timeless.

### Minimalist (⚪)
Less is more - style yang clean, simple, tapi tetap stylish.

### Grunge (🎸)
Rebellious style dengan attitude yang kuat.

### Kawaii (🌸)
Cute fashion dengan sentuhan Japanese culture.

### Punk (⚡)
Bold dan edgy dengan statement yang kuat.

### Bohemian (🌙)
Free-spirited style dengan nuansa artistik.

### Preppy (📚)
Clean-cut dan sophisticated untuk look yang polished.

## 🔧 API Endpoints

### Styles
- `GET /fashion_api.php/styles` - Get semua styles
- `GET /fashion_api.php/styles/{id}` - Get style by ID
- `POST /fashion_api.php/styles` - Tambah style baru
- `PUT /fashion_api.php/styles/{id}` - Update style
- `DELETE /fashion_api.php/styles/{id}` - Hapus style

### Lookbook
- `GET /fashion_api.php/lookbook` - Get semua lookbook
- `POST /fashion_api.php/lookbook` - Tambah lookbook baru
- `DELETE /fashion_api.php/lookbook/{id}` - Hapus lookbook

### Trends
- `GET /fashion_api.php/trends` - Get semua trends
- `POST /fashion_api.php/trends` - Tambah trend baru
- `DELETE /fashion_api.php/trends/{id}` - Hapus trend

### Utility
- `GET /fashion_api.php/categories` - Get daftar kategori
- `GET /fashion_api.php` - Get semua data

## 🎯 Fitur Unggulan

### 1. Real-time Content Management
- Update konten langsung dari admin panel
- Perubahan langsung terlihat di website utama
- Tidak perlu restart server atau refresh manual

### 2. Responsive Design
- Optimal di desktop, tablet, dan mobile
- Touch-friendly interface
- Adaptive layout yang menyesuaikan screen size

### 3. Modern Animations
- Smooth transitions dan hover effects
- Loading animations yang menarik
- Scroll-based animations untuk engagement

### 4. SEO Friendly
- Semantic HTML structure
- Meta tags yang proper
- Fast loading time

### 5. Extensible Architecture
- Mudah menambah kategori baru
- API yang dapat diperluas
- Modular code structure

## 🚀 Development & Customization

### Menambah Kategori Baru

1. **Update PHP API** (`fashion_api.php`):
   ```php
   function getCategoryIcon($category) {
       $icons = [
           // ... existing icons
           'new_category' => '🆕',
       ];
       return $icons[$category] ?? '✨';
   }
   ```

2. **Update Admin Form** (`admin.html`):
   ```html
   <option value="new_category">New Category</option>
   ```

### Customizing Styles

1. **Warna Theme**: Edit CSS variables di bagian `:root`
2. **Fonts**: Ganti Google Fonts import dan CSS font-family
3. **Layout**: Modify grid dan flexbox properties
4. **Animations**: Customize keyframes dan transition

### Database Migration

Untuk production, ganti JSON dengan database:

```php
// Ganti file operations dengan database queries
function loadData() {
    // Connect to MySQL/PostgreSQL
    // Return data from database
}

function saveData($data) {
    // Save to database instead of JSON file
}
```

## 🐛 Troubleshooting

### API Tidak Berfungsi
- Pastikan PHP version 7.4+
- Check file permissions untuk write access
- Verify mod_rewrite enabled

### Data Tidak Muncul
- Check browser console untuk JavaScript errors
- Verify API endpoint accessible
- Check fashion_data.json file exists dan readable

### Styling Issues
- Clear browser cache
- Check CSS file loading properly
- Verify font imports dari Google Fonts

## 📈 Future Enhancements

### Planned Features
- [ ] User authentication & profiles
- [ ] Image upload untuk styles
- [ ] Social sharing integration
- [ ] Advanced search & filters
- [ ] Mobile app version
- [ ] E-commerce integration
- [ ] Community features (comments, ratings)
- [ ] Multi-language support

### Technical Improvements
- [ ] Database migration (MySQL/PostgreSQL)
- [ ] Caching implementation
- [ ] Performance optimization
- [ ] Unit testing
- [ ] Docker containerization
- [ ] CI/CD pipeline

## 🤝 Contributing

Kontribusi sangat welcome! Silakan:

1. Fork repository
2. Create feature branch
3. Commit changes
4. Push ke branch
5. Create Pull Request

## 📄 License

MIT License - feel free to use untuk project personal atau komersial.

## 👨‍💻 Developer

Dibuat dengan ❤️ untuk fashion enthusiasts yang ingin mengekspresikan style unik mereka.

---

**StyleHub** - Express Your Vibe! 🌟