<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <title>Edit Kelas</title>
    <style>
        /* CSS SEDERHANA UNTUK EDIT */
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
            color: #FF9800;
            font-size: 36px;
            margin-bottom: 15px;
            display: block;
        }
        
        .class-name {
            color: #4CAF50;
            font-weight: bold;
            font-size: 20px;
            margin-top: 10px;
        }
        
        /* Form */
        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        .full-width {
            grid-column: 1 / -1;
        }
        
        label {
            display: block;
            margin-bottom: 8px;
            color: #333;
            font-weight: bold;
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
        
        /* Image Preview */
        .current-image {
            margin-bottom: 20px;
        }
        
        .preview-img {
            max-width: 400px;
            max-height: 250px;
            border: 1px solid #ddd;
            border-radius: 4px;
            padding: 5px;
            margin-top: 10px;
            cursor: pointer;
        }
        
        .image-info {
            background: #f9f9f9;
            padding: 10px;
            border-radius: 4px;
            margin-top: 10px;
            font-size: 14px;
        }
        
        .image-link {
            color: #2196F3;
            text-decoration: none;
            margin-top: 5px;
            display: inline-block;
        }
        
        .image-link:hover {
            text-decoration: underline;
        }
        
        .remove-btn {
            background: #f44336;
            color: white;
            border: none;
            padding: 8px 15px;
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
        
        .btn-cancel {
            background: #f0f0f0;
            color: #333;
            border: 1px solid #ddd;
        }
        
        .btn-cancel:hover {
            background: #e0e0e0;
        }
        
        /* Footer Note */
        .footer-note {
            text-align: center;
            color: #666;
            margin-top: 20px;
            font-size: 14px;
        }
        
        /* Modal */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.8);
            z-index: 1000;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }
        
        .modal img {
            max-width: 90%;
            max-height: 90%;
            border-radius: 4px;
        }
        
        .modal-close {
            position: absolute;
            top: 20px;
            right: 20px;
            color: white;
            font-size: 30px;
            cursor: pointer;
            background: none;
            border: none;
        }
        
        /* Responsif */
        @media (max-width: 768px) {
            .form-grid {
                grid-template-columns: 1fr;
            }
            
            .action-buttons {
                flex-direction: column;
            }
            
            .preview-img {
                max-width: 100%;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <!-- Header -->
        <div class="header">
            <i class="fas fa-edit"></i>
            <h1>Edit Data Kelas</h1>
            <p>Perbarui informasi kelas dengan data yang terbaru</p>
            <div class="class-name">{{ $kelas->namaKelas }}</div>
        </div>

        <!-- Form -->
        <form action="{{ route('kelas.update', $kelas) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-grid">
                <!-- Nama Kelas -->
                <div class="form-group">
                    <label for="nama_kelas">
                        <i class="fas fa-school"></i> Nama Kelas
                    </label>
                    <input type="text" id="nama_kelas" name="nama_kelas" 
                           value="{{ old('nama_kelas', $kelas->namaKelas) }}" 
                           required>
                </div>

                <!-- Wali Kelas -->
                <div class="form-group">
                    <label for="wali_kelas">
                        <i class="fas fa-user-tie"></i> Wali Kelas
                    </label>
                    <input type="text" id="wali_kelas" name="wali_kelas" 
                           value="{{ old('wali_kelas', $kelas->waliKelas) }}" 
                           required>
                </div>

                <!-- Ketua Kelas -->
                <div class="form-group">
                    <label for="ketua_kelas">
                        <i class="fas fa-crown"></i> Ketua Kelas
                    </label>
                    <input type="text" id="ketua_kelas" name="ketua_kelas" 
                           value="{{ old('ketua_kelas', $kelas->ketuaKelas) }}">
                </div>

                <!-- Jumlah Kursi -->
                <div class="form-group">
                    <label for="kursi">
                        <i class="fas fa-chair"></i> Jumlah Kursi
                    </label>
                    <input type="number" id="kursi" name="kursi" 
                           value="{{ old('kursi', $kelas->kursi) }}" 
                           min="0">
                </div>

                <!-- Jumlah Meja -->
                <div class="form-group">
                    <label for="meja">
                        <i class="fas fa-table"></i> Jumlah Meja
                    </label>
                    <input type="number" id="meja" name="meja" 
                           value="{{ old('meja', $kelas->meja) }}" 
                           min="0">
                </div>

                <!-- Gambar Kelas -->
                <div class="form-group full-width">
                    <label>
                        <i class="fas fa-image"></i> Gambar Kelas
                    </label>
                    
                    <!-- Gambar Saat Ini -->
                    @if ($kelas->gambar_kelas)
                        <div class="current-image">
                            <p><strong>Gambar Saat Ini:</strong></p>
                            <img src="{{ asset('upload_gambar/' . $kelas->gambar_kelas) }}" 
                                 class="preview-img"
                                 onclick="openImageModal('{{ asset('upload_gambar/' . $kelas->gambar_kelas) }}')"
                                 alt="{{ $kelas->namaKelas }}">
                            <div class="image-info">
                                <p>Nama file: {{ $kelas->gambar_kelas }}</p>
                                <a href="{{ asset('upload_gambar/' . $kelas->gambar_kelas) }}" target="_blank" class="image-link">
                                    <i class="fas fa-external-link-alt"></i> Buka di Tab Baru
                                </a>
                            </div>
                        </div>
                    @endif

                    <!-- Input File Baru -->
                    <p style="margin-top: 15px; color: #666; font-size: 14px;">
                        <i class="fas fa-info-circle"></i> Unggah file baru untuk mengubah gambar (kosongkan jika tidak ingin mengubah)
                    </p>
                    <input type="file" name="gambar_kelas" 
                           accept="image/*" 
                           onchange="previewNewImage(event)">
                    
                    <!-- Preview Gambar Baru -->
                    <div id="newImagePreviewContainer" style="display: none; margin-top: 15px;">
                        <p><strong>Preview Gambar Baru:</strong></p>
                        <img id="newImagePreview" class="preview-img">
                        <button type="button" onclick="removeNewImage()" class="remove-btn">
                            <i class="fas fa-times"></i> Hapus Gambar Baru
                        </button>
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="action-buttons">
                <button type="submit" class="btn btn-submit">
                    <i class="fas fa-check-circle"></i> Perbarui Data
                </button>
                <a href="{{ route('kelas.index') }}" class="btn btn-cancel">
                    <i class="fas fa-times"></i> Batal
                </a>
            </div>
        </form>

        <!-- Footer Note -->
        <div class="footer-note">
            <p><i class="fas fa-exclamation-circle"></i> Data akan diperbarui secara permanen setelah disimpan</p>
        </div>
    </div>

    <!-- Modal untuk Preview Gambar -->
    <div id="imageModal" class="modal">
        <button onclick="closeImageModal()" class="modal-close">&times;</button>
        <img id="modalImage">
    </div>

    <script>
        // Modal functions
        function openImageModal(imageSrc) {
            document.getElementById('modalImage').src = imageSrc;
            document.getElementById('imageModal').style.display = 'flex';
            document.body.style.overflow = 'hidden';
        }

        function closeImageModal() {
            document.getElementById('imageModal').style.display = 'none';
            document.body.style.overflow = 'auto';
        }

        // Preview gambar baru
        function previewNewImage(event) {
            const input = event.target;
            const previewContainer = document.getElementById('newImagePreviewContainer');
            const preview = document.getElementById('newImagePreview');

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
                }

                reader.readAsDataURL(file);
            }
        }

        function removeNewImage() {
            const input = document.querySelector('input[name="gambar_kelas"]');
            const previewContainer = document.getElementById('newImagePreviewContainer');

            input.value = '';
            previewContainer.style.display = 'none';
        }

        // Tutup modal dengan klik di luar
        window.onclick = function(event) {
            if (event.target.id === 'imageModal') {
                closeImageModal();
            }
        }

        // Tutup modal dengan ESC
        document.addEventListener('keydown', function(event) {
            if (event.key === 'Escape') {
                closeImageModal();
            }
        });
    </script>
</body>
</html>