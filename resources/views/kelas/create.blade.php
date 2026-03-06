<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <title>Tambah Kelas</title>
    <style>
        /* CSS SEDERHANA UNTUK CREATE */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }
        
        body {
            background: #f8f9fa;
            padding: 20px;
        }
        
        .container {
            max-width: 800px;
            margin: 0 auto;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        
        /* Header */
        .header {
            text-align: center;
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 1px solid #eee;
        }
        
        .header h1 {
            color: #333;
            font-size: 24px;
            margin-bottom: 10px;
        }
        
        .header i {
            color: #4CAF50;
            font-size: 36px;
            margin-bottom: 15px;
            display: block;
        }
        
        /* Form */
        .form-group {
            margin-bottom: 20px;
        }
        
        label {
            display: block;
            margin-bottom: 8px;
            color: #333;
            font-weight: bold;
        }
        
        .required {
            color: #f44336;
        }
        
        input[type="text"],
        input[type="number"],
        input[type="file"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 16px;
        }
        
        input[type="text"]:focus,
        input[type="number"]:focus {
            outline: none;
            border-color: #4CAF50;
        }
        
        /* Error Messages */
        .error-box {
            background: #f8d7da;
            color: #721c24;
            padding: 15px;
            border-radius: 4px;
            margin-bottom: 20px;
            border: 1px solid #f5c6cb;
        }
        
        .success-box {
            background: #d4edda;
            color: #155724;
            padding: 15px;
            border-radius: 4px;
            margin-bottom: 20px;
            border: 1px solid #c3e6cb;
        }
        
        /* Grid untuk Kursi dan Meja */
        .grid-2 {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
        }
        
        /* Image Preview */
        .image-preview {
            margin-top: 10px;
        }
        
        .preview-img {
            max-width: 300px;
            max-height: 200px;
            border: 1px solid #ddd;
            border-radius: 4px;
            padding: 5px;
            margin-top: 10px;
        }
        
        .remove-btn {
            background: #f44336;
            color: white;
            border: none;
            padding: 5px 10px;
            border-radius: 4px;
            cursor: pointer;
            margin-top: 10px;
        }
        
        .remove-btn:hover {
            background: #d32f2f;
        }
        
        /* Action Buttons */
        .action-buttons {
            display: flex;
            gap: 10px;
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #eee;
        }
        
        .btn {
            flex: 1;
            padding: 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            text-decoration: none;
            text-align: center;
        }
        
        .btn-submit {
            background: #4CAF50;
            color: white;
        }
        
        .btn-submit:hover {
            background: #45a049;
        }
        
        .btn-back {
            background: #f0f0f0;
            color: #333;
            border: 1px solid #ddd;
        }
        
        .btn-back:hover {
            background: #e0e0e0;
        }
        
        /* Footer Note */
        .footer-note {
            text-align: center;
            color: #666;
            margin-top: 20px;
            font-size: 14px;
        }
        
        /* Responsif */
        @media (max-width: 768px) {
            .grid-2 {
                grid-template-columns: 1fr;
            }
            
            .action-buttons {
                flex-direction: column;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <!-- Header -->
        <div class="header">
            <i class="fas fa-chalkboard-teacher"></i>
            <h1>Tambah Kelas Baru</h1>
            <p>Isi formulir untuk menambahkan data kelas baru</p>
        </div>

        <!-- Form -->
        <form action="{{ route('kelas.store') }}" method="POST" enctype="multipart/form-data" id="formKelas">
            @csrf

            <!-- Error Messages -->
            @if ($errors->any())
                <div class="error-box">
                    <h3><i class="fas fa-exclamation-triangle"></i> Perbaiki kesalahan berikut:</h3>
                    <ul style="margin-left: 20px; margin-top: 10px;">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Success Message -->
            @if (session('success'))
                <div class="success-box">
                    <i class="fas fa-check-circle"></i> {{ session('success') }}
                </div>
            @endif

            <!-- Nama Kelas -->
            <div class="form-group">
                <label for="nama_kelas">
                    <i class="fas fa-school"></i> Nama Kelas <span class="required">*</span>
                </label>
                <input type="text" id="nama_kelas" name="nama_kelas" 
                       placeholder="Contoh: XII IPA 1" 
                       value="{{ old('nama_kelas') }}" 
                       required>
            </div>

            <!-- Wali Kelas -->
            <div class="form-group">
                <label for="wali_kelas">
                    <i class="fas fa-user-tie"></i> Wali Kelas <span class="required">*</span>
                </label>
                <input type="text" id="wali_kelas" name="wali_kelas" 
                       placeholder="Contoh: Bu Siti Nurhaliza" 
                       value="{{ old('wali_kelas') }}" 
                       required>
            </div>

            <!-- Ketua Kelas -->
            <div class="form-group">
                <label for="ketua_kelas">
                    <i class="fas fa-crown"></i> Ketua Kelas
                </label>
                <input type="text" id="ketua_kelas" name="ketua_kelas" 
                       placeholder="Contoh: Andi Wijaya" 
                       value="{{ old('ketua_kelas') }}">
            </div>

            <!-- Kursi dan Meja -->
            <div class="grid-2">
                <div class="form-group">
                    <label for="kursi">
                        <i class="fas fa-chair"></i> Jumlah Kursi <span class="required">*</span>
                    </label>
                    <input type="number" id="kursi" name="kursi" 
                           placeholder="0" 
                           min="0" 
                           value="{{ old('kursi') }}" 
                           required>
                </div>

                <div class="form-group">
                    <label for="meja">
                        <i class="fas fa-table"></i> Jumlah Meja <span class="required">*</span>
                    </label>
                    <input type="number" id="meja" name="meja" 
                           placeholder="0" 
                           min="0" 
                           value="{{ old('meja') }}" 
                           required>
                </div>
            </div>

            <!-- Gambar Kelas -->
            <div class="form-group">
                <label for="gambar_kelas">
                    <i class="fas fa-image"></i> Gambar Kelas
                </label>
                <p style="color: #666; margin-bottom: 10px; font-size: 14px;">
                    Unggah foto ruang kelas (format: JPG, PNG, maksimal 2MB)
                </p>
                <input type="file" id="gambar_kelas" name="gambar_kelas" 
                       accept="image/*" 
                       onchange="previewImage(event)">
                
                <!-- Image Preview -->
                <div id="imagePreviewContainer" class="image-preview" style="display: none;">
                    <p><strong>Preview Gambar:</strong></p>
                    <img id="imagePreview" class="preview-img">
                    <div>
                        <p id="imageName" style="margin-top: 5px;"></p>
                        <p id="imageSize" style="color: #666; font-size: 14px;"></p>
                        <button type="button" onclick="removeImage()" class="remove-btn">
                            <i class="fas fa-times"></i> Hapus Gambar
                        </button>
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="action-buttons">
                <button type="submit" class="btn btn-submit">
                    <i class="fas fa-save"></i> Simpan Data Kelas
                </button>
                <a href="/kelas" class="btn btn-back">
                    <i class="fas fa-arrow-left"></i> Kembali ke Daftar
                </a>
            </div>
        </form>

        <!-- Footer Note -->
        <div class="footer-note">
            <p><i class="fas fa-info-circle"></i> Pastikan semua data diisi dengan benar dan lengkap</p>
            <p style="margin-top: 5px;"><i class="fas fa-star"></i> Data yang sudah disimpan dapat diedit kapan saja</p>
        </div>
    </div>

    <script>
        function previewImage(event) {
            const input = event.target;
            const previewContainer = document.getElementById('imagePreviewContainer');
            const preview = document.getElementById('imagePreview');
            const imageName = document.getElementById('imageName');
            const imageSize = document.getElementById('imageSize');

            if (input.files && input.files[0]) {
                const file = input.files[0];
                const reader = new FileReader();

                // Validasi ukuran file (maksimal 2MB)
                const maxSize = 2 * 1024 * 1024;
                if (file.size > maxSize) {
                    alert('Ukuran file terlalu besar! Maksimal 2MB.');
                    input.value = '';
                    return;
                }

                // Validasi tipe file
                const validTypes = ['image/jpeg', 'image/png', 'image/jpg'];
                if (!validTypes.includes(file.type)) {
                    alert('Format file tidak didukung! Gunakan JPG atau PNG.');
                    input.value = '';
                    return;
                }

                reader.onload = function(e) {
                    preview.src = e.target.result;
                    previewContainer.style.display = 'block';
                    imageName.textContent = 'Nama file: ' + file.name;
                    imageSize.textContent = 'Ukuran: ' + (file.size / 1024).toFixed(2) + ' KB';
                }

                reader.readAsDataURL(file);
            }
        }

        function removeImage() {
            const input = document.getElementById('gambar_kelas');
            const previewContainer = document.getElementById('imagePreviewContainer');

            input.value = '';
            previewContainer.style.display = 'none';
        }
    </script>
</body>
</html>