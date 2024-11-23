<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pendaftaran Jalur Afirmasi</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input,
        select {
            width: 50%;
            /* Mengatur lebar input field menjadi 90% */
            padding: 5px;
            margin-bottom: 5px;
        }

        button {
            background-color: #2c3e50;
            color: #fff;
            padding: 10px;
            border: none;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background-color: #1a252f;
        }

        .additional-section {
            display: none;
        }

        .image-preview-container img {
            display: none;
            width: 150px;
            height: 150px;
            margin-top: 10px;
            margin-bottom: 5px;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <h2>Form Pendaftaran Jalur Afirmasi</h2>
        <form action="" method="POST" enctype="multipart/form-data">
            @csrf <!-- Token keamanan -->

            <div style="display: flex; justify-content: space-between;">
                <!-- Kolom Kiri -->
                <div style="flex: 1; margin-right: 20px;">
                    <label>No Pendaftaran:</label>
                    <input type="text" name="pendaftaran_id" value="{{ $pendaftaran }}" maxlength="70"
                        style="width: 350px; font-size: 20px; margin-bottom: 5px" oninput="validateInput(this)"><br>

                        <label>Nama Siswa:</label>
                    <input type="text" name="nama" maxlength="70"
                        style="width: 350px; font-size: 20px; margin-bottom: 5px" oninput="validateInput(this)"><br>

                    <div style="display: flex; align-items: center;">
                        <div style="margin-right: 20px;">
                            <label>NISN:</label>
                            <input type="text" name="nisn" maxlength="10" style="width: 100px; margin-bottom: 5px"
                                oninput="validatenumber(this)"><br>
                        </div>
                        <div>
                            <label>Jenis Kelamin:</label>
                            <select name="jenis_kelamin" required style="width: 150px; margin-bottom: 5px;">
                                <option value="Tidak ada data">Tidak ada data</option>
                                <option value="laki-laki">Laki-laki</option>
                                <option value="perempuan">Perempuan</option>
                            </select><br>
                        </div>
                    </div><br>

                    <div style="display: flex; align-items: center;">
                        <div style="margin-right: 20px;">
                            <label>Tempat Lahir:</label>
                            <select id="tempat_lahir" name="tempat_lahir" required style="width: 150px;">
                                <option value="">--Pilih Kota--</option>
                            </select>
                        </div>
                        <div>
                            <label>Tanggal Lahir:</label>
                            <input type="date" name="tanggal_lahir" required
                                style="width: 150px; margin-bottom: 5px;"><br>
                        </div>
                    </div><br>


                    <label>Alamat Domisili:</label>
                    <input type="text" name="alamat_domisili" maxlength="150"
                        style="width: 350px; margin-bottom: 5px;"><br>

                    <div style="display: flex; align-items: center;">
                        <div style="margin-right: 10px;">
                            <label>RT:</label>
                            <input type="text" name="rt" maxlength="3" style="width: 50px; margin-bottom: 5px;"
                                oninput="validatenumber(this)">
                        </div>
                        <div style="margin-right: 10px;">
                            <label>RW:</label>
                            <input type="text" name="rw" maxlength="3" style="width: 50px; margin-bottom: 5px;"
                                oninput="validatenumber(this)">
                        </div>
                    </div><br>

                    <div style="display: flex; align-items: center;">
                        <div style="margin-right: 10px;">
                            <select id="provinsi" required style="width: 150px;">
                                <option value="">Pilih Provinsi</option>
                            </select>
                        </div>
                        <div style="margin-right: 10px;">
                            <select id="kota" disabled style="width: 200px;">
                                <option value="">Pilih Kota</option>
                            </select>
                        </div>
                    </div><br>
                    <div style="display: flex; align-items: center;">
                        <div style="margin-right: 10px;">
                            <select id="kecamatan" disabled style="width: 150px;">
                                <option value="">Pilih Kecamatan</option>
                            </select>
                        </div>
                        <div style="margin-right: 10px;">
                            <select id="kelurahan" disabled style="width: 150px;">
                                <option value="">Pilih Kelurahan</option>
                            </select>
                        </div>
                    </div><br>

                    <label>Telepon:</label>
                    <input type="text" name="telepon" maxlength="14" required
                        style="width: 150px; margin-bottom: 5px;" oninput="validatenumber(this)"><br>
                </div>

                <!-- Kolom Tengah -->
                <div style="flex: 1; margin-right: 20px;">
                    <label>Nama Orang Tua/Wali:</label>
                    <input type="text" name="nama_orang_tua" maxlength="70" style="width: 350px; margin-bottom: 5px;"
                        oninput="validateInput(this)"><br>

                    <label>Alamat Orang Tua/Wali:</label>
                    <input type="text" name="alamat_orang_tua" maxlength="150" required
                        style="width: 350px; margin-bottom: 5px;"><br>

                    <div style="display: flex; align-items: center;">
                        <div style="margin-right: 10px;">
                            <label>RT:</label>
                            <input type="number" name="rt_orang_tua" maxlength="3"
                                style="width: 30px; margin-bottom: 5px;" oninput="validatenumber(this)">
                        </div>
                        <div style="margin-right: 10px;">
                            <label>RW:</label>
                            <input type="number" name="rw_orang_tua" maxlength="3"
                                style="width: 30px; margin-bottom: 5px;" oninput="validatenumber(this)">
                        </div>
                    </div><br>

                    <div style="display: flex; align-items: center;">
                        <div style="margin-right: 10px;">
                            <label>Kelurahan:</label>
                            <input type="text" name="kelurahan_orang_tua" maxlength="50"
                                style="width: 150px; margin-bottom: 5px;" oninput="validateInput(this)"><br>
                        </div>
                        <div style="margin-right: 10px;">
                            <label>Kecamatan:</label>
                            <input type="text" name="kecamatan_orang_tua" maxlength="50"
                                style="width: 150px; margin-bottom: 5px;" oninput="validateInput(this)"><br>
                        </div>
                    </div><br>

                    <div style="display: flex; align-items: center;">
                        <div style="margin-right: 10px;">
                            <label>Kota:</label>
                            <input type="text" name="kota_orang_tua" maxlength="50"
                                style="width: 150px; margin-bottom: 5px;" oninput="validateInput(this)"><br>
                        </div>
                        <div style="margin-right: 10px;">
                            <label>Provinsi:</label>
                            <input type="text" name="provinsi_orang_tua" maxlength="50"
                                style="width: 150px; margin-bottom: 5px;" oninput="validateInput(this)"><br>

                        </div>
                    </div><br>
                    <label>No.Telp Orang tua/Wali:</label>
                    <input type="text" name="telepon_orang_tua" maxlength="14" required
                        style="width: 100px; margin-bottom: 5px;" oninput="validatenumber(this)"><br>
                </div>

                <script>
                    let regionsData = {};

                    // Load data JSON dari URL GitHub
                    $(document).ready(function() {
                        fetch(
                                'https://raw.githubusercontent.com/MuhammadSheva99/ppdb-reg/refs/heads/main/indonesia-region.min.json')
                            .then(response => response.json())
                            .then(data => {
                                regionsData = data;

                                // Populate dropdown provinsi
                                Object.keys(regionsData).forEach(provinsiId => {
                                    const provinsiName = regionsData[provinsiId].name;
                                    $('#provinsi').append(`<option value="${provinsiId}">${provinsiName}</option>`);
                                });
                            })
                            .catch(error => console.error('Error loading regions data:', error));
                    });

                    // Handle change provinsi
                    $('#provinsi').change(function() {
                        const provinsiId = $(this).val();
                        $('#kota').html('<option value="">Pilih Kota</option>').prop('disabled', true);
                        $('#kecamatan').html('<option value="">Pilih Kecamatan</option>').prop('disabled', true);
                        $('#kelurahan').html('<option value="">Pilih Kelurahan</option>').prop('disabled', true);

                        if (provinsiId) {
                            const cities = regionsData[provinsiId].regencies || {};
                            $('#kota').prop('disabled', false);

                            Object.keys(cities).forEach(kotaId => {
                                const kotaName = cities[kotaId].name;
                                $('#kota').append(`<option value="${kotaId}">${kotaName}</option>`);
                            });
                        }
                    });

                    // Handle change kota
                    $('#kota').change(function() {
                        const provinsiId = $('#provinsi').val();
                        const kotaId = $(this).val();
                        $('#kecamatan').html('<option value="">Pilih Kecamatan</option>').prop('disabled', true);
                        $('#kelurahan').html('<option value="">Pilih Kelurahan</option>').prop('disabled', true);

                        if (kotaId) {
                            const districts = regionsData[provinsiId].regencies[kotaId].districts || {};
                            $('#kecamatan').prop('disabled', false);

                            Object.keys(districts).forEach(kecamatanId => {
                                const kecamatanName = districts[kecamatanId].name;
                                $('#kecamatan').append(`<option value="${kecamatanId}">${kecamatanName}</option>`);
                            });
                        }
                    });

                    // Handle change kecamatan
                    $('#kecamatan').change(function() {
                        const provinsiId = $('#provinsi').val();
                        const kotaId = $('#kota').val();
                        const kecamatanId = $(this).val();
                        $('#kelurahan').html('<option value="">Pilih Kelurahan</option>').prop('disabled', true);

                        if (kecamatanId) {
                            const villages = regionsData[provinsiId].regencies[kotaId].districts[kecamatanId].villages || {};
                            $('#kelurahan').prop('disabled', false);

                            Object.keys(villages).forEach(kelurahanId => {
                                const kelurahanName = villages[kelurahanId].name;
                                $('#kelurahan').append(`<option value="${kelurahanId}">${kelurahanName}</option>`);
                            });
                        }
                    });
                </script>


                <script>
                    // Fungsi untuk memperbarui kota di jalur afirmasi
                    function updateCitiesAfirmasi() {
                        const countrySelect = document.getElementById("country-afirmasi");
                        const citySelect = document.getElementById("city-afirmasi");

                        // Menghapus opsi kota yang ada
                        citySelect.innerHTML = "";

                        // Mendapatkan negara yang dipilih
                        const selectedCountry = countrySelect.value;

                        // Menambahkan opsi kota yang sesuai dengan negara yang dipilih
                        if (selectedCountry) {
                            const cities = countryCityData[selectedCountry];
                            cities.forEach(city => {
                                const option = document.createElement("option");
                                option.value = city;
                                option.text = city;
                                citySelect.add(option);
                            });
                        }
                    }
                </script>

                <script>
                    function validateInput(input) {
                        // Hanya mengizinkan huruf, spasi, dan karakter tertentu seperti dash
                        input.value = input.value.replace(/[^a-zA-Z\s'-]/g, '');
                    }

                    function validatenumber(input) {
                        // Hanya mengizinkan angka (0-9)
                        input.value = input.value.replace(/[^0-9]/g, '');
                    }
                </script>

                <!-- Bagian Unggahan -->
                <div style="margin-top: 20px;">
                    <label>Unggah Foto Siswa (PDF/JPG/PNG):</label>
                    <input type="file" name="fs" accept="image/*"
                        onchange="previewImage(event, 'fsPreview', 'fsDelete', true)" id="fsInput">
                    <br>
                    <img id="fsPreview" style="display:none; width: 150px; height: 150px; margin-top: 10px;">
                    <br>
                    <button type="button" id="fsDelete" style="display:none;"
                        onclick="deleteImage('fsInput', 'fsPreview', 'fsDelete', true)">Hapus Gambar</button>
                    <br><br>

                    <label>Unggah Kartu Identitas Anak (PDF/JPG/PNG):</label>
                    <input type="file" name="kia" accept="image/*"
                        onchange="previewImage(event, 'kiaPreview', 'kiaDelete', false)" id="kiaInput">
                    <br>
                    <img id="kiaPreview" style="display:none; width: 150px; height: 150px; margin-top: 10px;">
                    <br>
                    <button type="button" id="kiaDelete" style="display:none;"
                        onclick="deleteImage('kiaInput', 'kiaPreview', 'kiaDelete', false)">Hapus Gambar</button>
                    <br><br>

                    <label>Unggah Kartu Keluarga (PDF/JPG/PNG):</label>
                    <input type="file" name="kk_perpindahan" accept="image/*"
                        onchange="previewImage(event, 'kkPreview', 'kkDelete', false)" id="kkInput">
                    <br>
                    <img id="kkPreview" style="display:none; width: 150px; height: 150px; margin-top: 10px;">
                    <br>
                    <button type="button" id="kkDelete" style="display:none;"
                        onclick="deleteImage('kkInput', 'kkPreview', 'kkDelete', false)">Hapus Gambar</button>
                    <br><br>

                    <label>Unggah Surat Keterangan Lulus (PDF/JPG/PNG):</label>
                    <input type="file" name="skl_perpindahan" accept="image/*"
                        onchange="previewImage(event, 'sklPreview', 'sklDelete', false)" id="sklInput">
                    <br>
                    <img id="sklPreview" style="display:none; width: 150px; height: 150px; margin-top: 10px;">
                    <br>
                    <button type="button" id="sklDelete" style="display:none;"
                        onclick="deleteImage('sklInput', 'sklPreview', 'sklDelete', false)">Hapus Gambar</button>
                    <br><br>

                    <label>Unggah Surat Perpindahan Orang Tua (KIP) (PDF/JPG/PNG):</label>
                    <input type="file" name="spot_perpindahan" accept="image/*"
                        onchange="previewImage(event, 'spotPreview', 'spotDelete', false)" id="spotInput">
                    <br>
                    <img id="spotPreview" style="display:none; width: 150px; height: 150px; margin-top: 10px;">
                    <br>
                    <button type="button" id="spotDelete" style="display:none;"
                        onclick="deleteImage('spotInput', 'spotPreview', 'spotDelete', false)">Hapus Gambar</button>
                    <br><br>
                </div>
                <script>
                    // Variabel untuk menyimpan URL foto siswa
                    let uploadedImageURL = ""; // URL Foto Siswa
                    let kkImageURL = ""; // URL Foto KK
                    let kiaImageURL = ""; // URL Foto KIA
                    let sklImageURL = ""; // URL Foto Surat Keterangan Lulus
                    let spotImageURL = ""; // URL Foto Surat Perpindahan Orang Tua
                    // Fungsi untuk mempreview gambar yang diunggah
                    function previewImage(event, previewId, deleteButtonId, isFotoSiswa) {
                        const input = event.target;
                        const reader = new FileReader();

                        reader.onload = function() {
                            if (isFotoSiswa) {
                                uploadedImageURL = reader.result;
                            } else if (previewId === 'kkPreview') {
                                kkImageURL = reader.result;
                            } else if (previewId === 'kiaPreview') {
                                kiaImageURL = reader.result;
                            } else if (previewId === 'sklPreview') {
                                sklImageURL = reader.result;
                            } else if (previewId === 'spotPreview') {
                                spotImageURL = reader.result;
                            }

                            const preview = document.getElementById(previewId);
                            preview.src = reader.result;
                            preview.style.display = 'block';

                            const deleteButton = document.getElementById(deleteButtonId);
                            deleteButton.style.display = 'inline';
                        };

                        reader.readAsDataURL(input.files[0]);
                    }

                    function deleteImage(inputId, previewId, deleteButtonId, isFotoSiswa) {
                        const input = document.getElementById(inputId);
                        const preview = document.getElementById(previewId);
                        const deleteButton = document.getElementById(deleteButtonId);

                        input.value = '';
                        preview.src = '';
                        preview.style.display = 'none';
                        deleteButton.style.display = 'none';

                        if (isFotoSiswa) uploadedImageURL = "";
                        if (previewId === 'kkPreview') kkImageURL = "";
                        if (previewId === 'kiaPreview') kiaImageURL = "";
                        if (previewId === 'sklPreview') sklImageURL = "";
                        if (previewId === 'spotPreview') spotImageURL = "";
                    }
                </script>
            </div>

            <!-- Pop-up Syarat dan Ketentuan -->
            <div id="termsPopup"
                style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.5);">
                <div
                    style="position: relative; top: 50%; left: 50%; transform: translate(-50%, -50%); background-color: white; padding: 20px; width: 80%; max-width: 600px; border-radius: 5px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
                    <h3 style="text-align: center;">Syarat dan Ketentuan PPDB</h3>

                    <!-- Syarat dan ketentuan dalam kolom bergulir -->
                    <div
                        style="max-height: 300px; overflow-y: auto; border: 1px solid #ddd; padding: 15px; border-radius: 5px; margin-bottom: 15px;">
                        <p>1. Calon peserta didik harus memenuhi semua persyaratan yang ditetapkan oleh sekolah.</p>
                        <p>2. Informasi yang diberikan harus benar dan sesuai dengan data asli yang dimiliki oleh calon
                            peserta didik.</p>
                        <p>3. Kelalaian atau kesalahan dalam pengisian data dapat mengakibatkan penolakan atau
                            pembatalan pendaftaran.</p>
                        <p>4. Semua dokumen yang diunggah harus dalam format yang sesuai (PDF, JPG, atau PNG) dan jelas.
                        </p>
                        <p>5. Jarak antara rumah dan sekolah akan dihitung berdasarkan data yang diberikan dan dapat
                            mempengaruhi penerimaan.</p>
                        <p>6. Dengan menyetujui, calon peserta didik atau wali murid menyatakan bahwa mereka bertanggung
                            jawab penuh atas informasi yang diberikan.</p>
                    </div>

                    <!-- Checkbox dan teks persetujuan -->
                    <div style="display: flex; align-items: center; justify-content: center; gap: 10px;">
                        <input type="checkbox" id="agreeCheckbox">
                        <label for="agreeCheckbox">Saya setuju dengan syarat dan ketentuan yang ada</label>
                    </div>

                    <!-- Tombol tutup -->
                    <button onclick="hideTermsPopup()"
                        style="margin-top: 15px; padding: 10px; width: 100%;">Tutup</button>
                </div>
            </div>

            <script>
                function hideTermsPopup() {
                    document.getElementById("termsPopup").style.display = "none";
                }
            </script>


            <!-- Checkbox Setuju -->
            <div style="display: flex; align-items: center;">
                <div style="margin-right: 10px;">
                    <div class="checkbox-container"></div>
                    <input type="checkbox" id="terms" name="terms" required onchange="toggleButton()">
                    <label for="terms">Saya setuju dengan syarat dan ketentuan.</label>
                </div>
            </div>

            <!-- Tambahkan Tombol Preview -->
            <button type="button" onclick="showPreview()"
                style="width: 250px; padding: 10px; font-size: 16px; margin-top: 10px;">Preview</button>

            <!-- Tombol Daftar -->
            <div style="margin-top: 10px;">
                <button id="submitButton" type="submit" style="width: 250px; padding: 10px; font-size: 16px;"
                    disabled>Daftar</button>
            </div>
        </form>
        <!-- Pop-up Pratinjau -->
        <div id="previewPopup"
            style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.5);">
            <div
                style="position: relative; top: 50%; left: 50%; transform: translate(-50%, -50%); background-color: white; padding: 20px; width: 80%; max-width: 600px; border-radius: 5px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
                <h3 style="text-align: center;">Preview Data Pendaftaran</h3>

                <div id="previewContent" style="text-align: left; font-size: 16px; margin-top: 15px;">
                    <!-- Tempat untuk menampilkan pratinjau data -->
                </div>

                <button onclick="hidePreview()" style="margin-top: 15px; padding: 10px; width: 100%;">Tutup</button>
            </div>
        </div>

        <script>
            function showPreview() {
                // Mengambil data dari form
                const nama = document.querySelector('input[name="nama"]').value || "Tidak ada data";
                const nisn = document.querySelector('input[name="nisn"]').value || "Tidak ada data";
                const jenisKelamin = document.querySelector('select[name="jenis_kelamin"]').value || "Tidak ada data";
                const tempatLahir = document.querySelector('select[name="tempat_lahir"]').value || "Tidak ada data";
                const tanggalLahir = document.querySelector('input[name="tanggal_lahir"]').value || "Tidak ada data";
                const alamatDomisili = document.querySelector('input[name="alamat_domisili"]').value || "Tidak ada data";
                const rt = document.querySelector('input[name="rt"]').value || "Tidak ada data";
                const rw = document.querySelector('input[name="rw"]').value || "Tidak ada data";
                const kelurahan = document.querySelector('input[name="kelurahan"]').value || "Tidak ada data";
                const kecamatan = document.querySelector('input[name="kecamatan"]').value || "Tidak ada data";
                const kota = document.querySelector('input[name="kota"]').value || "Tidak ada data";
                const provinsi = document.querySelector('input[name="provinsi"]').value || "Tidak ada data";
                const telepon = document.querySelector('input[name="telepon"]').value || "Tidak ada data";
                const orangTua = document.querySelector('input[name="nama_orang_tua"]').value || "Tidak ada data";
                const alamatOrangtua = document.querySelector('input[name="alamat_orang_tua"]').value || "Tidak ada data";
                const rtOrangtua = document.querySelector('input[name="rt_orang_tua"]').value || "Tidak ada data";
                const rwOrangtua = document.querySelector('input[name="rw_orang_tua"]').value || "Tidak ada data";
                const kelurahanOrangtua = document.querySelector('input[name="kelurahan_orang_tua"]').value || "Tidak ada data";
                const kecamatanOrangtua = document.querySelector('input[name="kecamatan_orang_tua"]').value || "Tidak ada data";
                const kotaOrangtua = document.querySelector('input[name="kota_orang_tua"]').value || "Tidak ada data";
                const provinsiOrangtua = document.querySelector('input[name="provinsi_orang_tua"]').value || "Tidak ada data";
                const teleponOrangtua = document.querySelector('input[name="telepon_orang_tua"]').value || "Tidak ada data";

                // Buat dokumen baru di tab atau jendela baru
                const newWindow = window.open("", "_blank", "width=800,height=600");

                // Isi dokumen baru dengan data yang diinputkan
                newWindow.document.write(`
               <!DOCTYPE html>
            <html>
            <head>
                <title>Preview Formulir</title>
                <style>
                    body {
                        font-family: Arial, sans-serif;
                    }
                    .header {
                        text-align: center;
                        margin-bottom: 20px;
                    }
                    .header-content {
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        gap: 20px; /* Jarak antar elemen */
                    }
                    .logo {
                        width: 50px;
                    }
                    .title {
                        text-align: center;
                    }
                    hr {
                        border: 2px solid black; /* Ubah 2px menjadi ketebalan yang diinginkan */
                    }
                    .container {
                        display: flex;
                        align-items: flex-start;
                        padding: 20px;
                    }
                    .foto {
                        flex: 0 0 150px;
                        margin-right: 20px;
                        width: 150px;
                        height: 150px;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        border: 2px solid #000;
                        font-size: 14px;
                        color: #666;
                        text-align: center;
                        background-color: #f0f0f0;
                    }
                    .foto img {
                        width: 100%;
                        height: 100%;
                        object-fit: cover;
                    }
                    .info {
                        flex: 1;
                        margin-left: 20px;
                    }
                    .info-row {
                        display: flex;
                    }
                    .info-row .label {
                        width: 250px; /* Lebar tetap untuk label */
                    }
                    .info-row .separator {
                        width: 50px; /* Lebar tetap untuk titik dua */
                    }
                    .info-row .value {
                        flex: 1;
                    }
                    .red-text {
                      color: red;
                    }

                     /* Styling untuk layout gambar dan keterangannya */
            .foto-container {
                display: flex;
                flex-wrap: wrap;
                justify-content: space-around;
                gap: 20px;
                margin-top: 20px;
            }
            .foto-item {
                text-align: center;
                width: 150px;
            }
            .foto-item p {
                margin-top: 5px;
                font-weight: bold;
            }
                        /* Sembunyikan tombol cetak saat mencetak */
                    @media print {
                        button {
                            display: none;
                        }
                    }
                </style>
            </head>
            <body>
                <div class="header">
                    <div class="header-content">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/b3/Lambang_Kemdikbud.png/800px-Lambang_Kemdikbud.png" alt="Logo" class="logo">
                        <div class="title">
                            <h2>SMA MULTIMEDIA</h2>
                            <p>PPDB</p>
                            <h3>Formulir Daftar Ulang Peserta Didik Baru Tahun 2024</h3>
                        </div>
                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/b3/Lambang_Kemdikbud.png/800px-Lambang_Kemdikbud.png" alt="Logo" class="logo">
                    </div>
                    <hr>
                </div> 
                <div class="container">
                    <div class="foto">
                        ${uploadedImageURL ? `<img src="${uploadedImageURL}" alt="Foto Siswa">` : '<p>Foto Siswa</p>'}
                    </div>
                     <div class="info">
                        <li><strong>Registrasi Peserta Didik</strong></li>
                        <div class="info-row"><div class="label">Nama Siswa</div><div class="separator">:</div><div class="value ${nama === 'Tidak ada data' ? 'red-text' : ''}">${nama}</div></div>
                        <div class="info-row"><div class="label">NISN</div><div class="separator">:</div><div class="value ${nisn === 'Tidak ada data' ? 'red-text' : ''}">${nisn}</div></div>
                        <div class="info-row"><div class="label">Jenis Kelamin</div><div class="separator">:</div><div class="value ${jenisKelamin === 'Tidak ada data' ? 'red-text' : ''}">${jenisKelamin}</div></div>
                        <div class="info-row"><div class="label">Tempat Lahir</div><div class="separator">:</div><div class="value ${tempatLahir === 'Tidak ada data' ? 'red-text' : ''}">${tempatLahir}</div></div>
                        <div class="info-row"><div class="label">Tanggal Lahir</div><div class="separator">:</div><div class="value ${tanggalLahir === 'Tidak ada data' ? 'red-text' : ''}">${tanggalLahir}</div></div>
                        <div class="info-row"><div class="label">Alamat Domisili</div><div class="separator">:</div><div class="value ${alamatDomisili === 'Tidak ada data' ? 'red-text' : ''}">${alamatDomisili}</div></div>
                        <div class="info-row"><div class="label">RT/RW</div><div class="separator">:</div><div class="value ${rt === 'Tidak ada data' ? 'red-text' : ''}">${rt}/${rw}</div></div>
                        <div class="info-row"><div class="label">Kelurahan</div><div class="separator">:</div><div class="value ${kelurahan === 'Tidak ada data' ? 'red-text' : ''}">${kelurahan}</div></div>
                        <div class="info-row"><div class="label">Kecamatan</div><div class="separator">:</div><div class="value ${kecamatan === 'Tidak ada data' ? 'red-text' : ''}">${kecamatan}</div></div>
                        <div class="info-row"><div class="label">Kota</div><div class="separator">:</div><div class="value ${kota === 'Tidak ada data' ? 'red-text' : ''}">${kota}</div></div>
                        <div class="info-row"><div class="label">Provinsi</div><div class="separator">:</div><div class="value ${provinsi === 'Tidak ada data' ? 'red-text' : ''}">${provinsi}</div></div>
                        <div class="info-row"><div class="label">Telepon</div><div class="separator">:</div><div class="value ${telepon === 'Tidak ada data' ? 'red-text' : ''}">${telepon}</div></div>
                       <br>
                        <li><strong>Biodata Orang Tua</strong></li>
                         <div class="info-row"><div class="label">Nama Orang Tua/Wali</div><div class="separator">:</div><div class="value  ${orangTua === 'Tidak ada data' ? 'red-text' : ''}">${orangTua}</div></div>
                        <div class="info-row"><div class="label">Alamat Orang Tua/Wali</div><div class="separator">:</div><div class="value ${alamatOrangtua === 'Tidak ada data' ? 'red-text' : ''}">${alamatOrangtua}</div></div>
                        <div class="info-row"><div class="label">RT/RW Orang Tua/Wali</div><div class="separator">:</div><div class="value ${rtOrangtua === 'Tidak ada data' ? 'red-text' : ''}">${rtOrangtua}/${rwOrangtua}</div></div>
                        <div class="info-row"><div class="label">Kelurahan Orang Tua/Wali</div><div class="separator">:</div><div class="value ${kelurahanOrangtua === 'Tidak ada data' ? 'red-text' : ''}">${kelurahanOrangtua}</div></div>
                        <div class="info-row"><div class="label">Kecamatan Orang Tua/Wali</div><div class="separator">:</div><div class="value ${kelurahanOrangtua === 'Tidak ada data' ? 'red-text' : ''}">${kecamatanOrangtua}</div></div>
                        <div class="info-row"><div class="label">Kota Orang Tua/Wali</div><div class="separator">:</div><div class="value ${kotaOrangtua === 'Tidak ada data' ? 'red-text' : ''}">${kotaOrangtua}</div></div>
                        <div class="info-row"><div class="label">Provinsi Orang Tua/Wali</div><div class="separator">:</div><div class="value ${provinsiOrangtua === 'Tidak ada data' ? 'red-text' : ''}">${provinsiOrangtua}</div></div>
                        <div class="info-row"><div class="label">Telepon Orang Tua/Wali</div><div class="separator">:</div><div class="value ${teleponOrangtua === 'Tidak ada data' ? 'red-text' : ''}">${teleponOrangtua}</div></div>
                        </div>
                </div>
                 <div class="foto-container">
            <div class="foto-item">
                <p>Kartu Keluarga</p>
                ${kkImageURL ? `<img src="${kkImageURL}" alt="Kartu Keluarga" class="foto">` : '<div class="foto">Kartu Keluarga</div>'}
            </div>
            <div class="foto-item">
                <p>Kartu Identitas Anak</p>
                ${kiaImageURL ? `<img src="${kiaImageURL}" alt="Kartu Identitas Anak" class="foto">` : '<div class="foto">Kartu Identitas Anak</div>'}
            </div>
            <div class="foto-item">
                <p>Surat Keterangan Lulus</p>
                ${sklImageURL ? `<img src="${sklImageURL}" alt="Surat Keterangan Lulus" class="foto">` : '<div class="foto">Surat Keterangan Lulus</div>'}
            </div>
            <div class="foto-item">
                <p>Surat Perpindahan Orang Tua</p>
                ${spotImageURL ? `<img src="${spotImageURL}" alt="Surat Perpindahan Orang Tua" class="foto">` : '<div class="foto">Surat Perpindahan Orang Tua</div>'}
            </div>
        </div>
                <button onclick="window.print()">Cetak</button>
            </body>
            </html>

        `);

                newWindow.document.close();
            }
        </script>

        <script>
            function toggleButton() {
                const checkbox = document.getElementById('terms');
                const submitButton = document.getElementById('submitButton');
                submitButton.disabled = !checkbox.checked; // Tombol akan aktif jika checkbox dicentang
            }
        </script>
    </div>
</body>

</html>
