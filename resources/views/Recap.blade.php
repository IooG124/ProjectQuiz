<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz</title>
    {{-- <link rel="stylesheet" href="output.css"> --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
        @vite('resources/css/app.css')
</head>
<body class="bg-teal-700 font-inter">
    <div class="navbar bg-teal-700 p-6 fixed top-0 left-0 w-full z-10 h-24 shadow-lg">
        <div class="container mx-auto flex items-center justify-between ">
            <div class="flex items-center flex-1">
                <button id="back" class="bg-teal-500 hover:bg-teal-600 text-white font-bold py-2 px-4 text-xl mx-10 rounded inline-flex items-center">
                    <svg class="h-8 w-8 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                    Kembali
                </button>
                <h1 class="text-2xl font-bold ml-4 text-white">Quiz Belum Berjudul</h1>
            </div>
            <div class="flex items-center">
                {{-- <button class="bg-teal-500 hover:bg-teal-600 text-white font-bold py-2 px-4 rounded mr-4">
                    <img src="/src/asset/icon/settings.png" alt="">
                </button>
                <button class="bg-teal-500 hover:bg-teal-600 text-white font-bold py-2 px-4 rounded">
                    <img src="/src/asset/icon/play.png" alt="">
                </button> --}}
                <button class="bg-teal-500 hover:bg-teal-600 text-white font-bold py-2 px-4 rounded ml-4">Simpan Soal</button>
            </div>
        </div>  
    </div>
    <div class="container mx-auto mt-40 flex">
        <div class="w-full lg:w-2/3 pr-4">
            <div class="bg-white rounded-lg shadow-md p-6">
                <div class="mt-3" id="soal-container">
                    <!-- Soal akan ditampilkan disini -->
                </div>
                <div class="mt-6">
                    <button class="bg-teal-500 hover:bg-teal-600 text-white font-bold py-2 px-4 rounded" id="tambah-soal">
                        <svg class="h-6 w-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg>
                        Tambah Soal
                    </button>
                </div>
            </div>
        </div>
        <div class="w-full lg:w-1/3 mt-6 lg:mt-0 pl-4">
            <div class="bg-white rounded-lg shadow-md p-6">
                <div class="flex justify-between items-center">
                    <h2 class="text-xl font-bold mb-4">Opsi</h2>
                </div>
                <div class="grid grid-cols-1 gap-4">
                    <div class="bg-gray-100 rounded-lg shadow-md p-4">
                        <h3 class="text-lg font-bold mb-2">Jenis Soal</h3>
                        <select id="jenis-soal" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" disabled>
                            <option value="Pilihan Ganda" selected>Pilihan Ganda</option>
                            <!-- Other options are commented out -->
                            <!--<option value="Esai">Esai</option>
                            <option value="Isian Singkat">Isian Singkat</option>-->
                        </select>
                    </div>
                    <div class="bg-gray-100 rounded-lg shadow-md p-4">
                        <h3 class="text-lg font-bold mb-2">Durasi</h3>
                        <div class="flex items-center">
                            <select id="durasi-soal" class="shadow appearance-none border rounded w-20 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                <option value="10">10</option>
                                <option value="20">20</option>
                                <option value="30" selected>30</option>
                            </select>
                            <span class="ml-2">Detik</span>
                        </div>
                    </div>
                    <div class="bg-gray-100 rounded-lg shadow-md p-4">
                        <h3 class="text-lg font-bold mb-2">Point</h3>
                        <div class="flex items-center">
                            <select id="poin-soal" class="shadow appearance-none border rounded w-20 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                <option value="1" selected>1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                            </select>
                            <span class="ml-2">Point</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const soalContainer = document.getElementById('soal-container');
            const tambahSoalButton = document.getElementById('tambah-soal');

            // Fungsi untuk mengambil data soal dari database
            function fetchSoal() {
                return fetch('api/soal') // Ganti 'api/soal' dengan endpoint API Anda
                    .then(response => response.json())
                    .catch(error => console.error('Error fetching data:', error));
            }

            // Fungsi untuk menampilkan soal di halaman
            function renderSoal(soalData) {
                soalContainer.innerHTML = ''; // Bersihkan konten sebelumnya
                soalData.forEach((soal, index) => {
                    const soalElement = document.createElement('div');
                    soalElement.classList.add('bg-gray-200', 'rounded-lg', 'shadow-md', 'p-4', 'mt-4');
                    soalElement.innerHTML = `
                        <div class="flex items-center mb-4">
                            <select id="jenis-${index}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" disabled>
                                <option value="Pilihan Ganda" selected>Pilihan Ganda</option>
                            </select>
                            <select id="durasi-${index}" class="shadow appearance-none border rounded w-20 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline ml-4">
                                <option value="10" ${soal.durasi === 10 ? 'selected' : ''}>10</option>
                                <option value="20" ${soal.durasi === 20 ? 'selected' : ''}>20</option>
                                <option value="30" ${soal.durasi === 30 ? 'selected' : ''}>30</option>
                            </select>
                            <span class="ml-2">Detik</span>
                            <select id="poin-${index}" class="shadow appearance-none border rounded w-20 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline ml-4">
                                <option value="1" ${soal.poin === 1 ? 'selected' : ''}>1</option>
                                <option value="2" ${soal.poin === 2 ? 'selected' : ''}>2</option>
                                <option value="3" ${soal.poin === 3 ? 'selected' : ''}>3</option>
                            </select>
                            <span class="ml-2">Point</span>
                        </div>
                        <textarea id="pertanyaan-${index}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline h-32" placeholder="Pertanyaan">${soal.pertanyaan}</textarea>
                        <div class="mt-4">
                            <h3 class="text-lg font-bold mb-2">Pilihan Jawaban</h3>
                            <div class="flex justify-between items-center">
                                <label for="jawaban1-${index}" class="flex items-center">
                                    <input type="radio" id="jawaban1-${index}" name="jawaban-${index}" class="mr-2" ${soal.jawaban[0].benar ? 'checked' : ''}>
                                    <span>${soal.jawaban[0].jawaban}</span>
                                </label>
                                <label for="jawaban2-${index}" class="flex items-center">
                                    <input type="radio" id="jawaban2-${index}" name="jawaban-${index}" class="mr-2" ${soal.jawaban[1].benar ? 'checked' : ''}>
                                    <span>${soal.jawaban[1].jawaban}</span>
                                </label>
                            </div>
                            <div class="flex justify-between items-center mt-2">
                                <label for="jawaban3-${index}" class="flex items-center">
                                    <input type="radio" id="jawaban3-${index}" name="jawaban-${index}" class="mr-2" ${soal.jawaban[2].benar ? 'checked' : ''}>
                                    <span>${soal.jawaban[2].jawaban}</span>
                                </label>
                                <label for="jawaban4-${index}" class="flex items-center">
                                    <input type="radio" id="jawaban4-${index}" name="jawaban-${index}" class="mr-2" ${soal.jawaban[3].benar ? 'checked' : ''}>
                                    <span>${soal.jawaban[3].jawaban}</span>
                                </label>
                            </div>
                        </div>
                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-4" onclick="editSoal(${index})">
                            Edit
                        </button>
                        <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded mt-4 ml-4" onclick="deleteSoal(${index})">
                            Delete
                        </button>
                    `;
                    soalContainer.appendChild(soalElement);
                });
            }

            // Fungsi untuk mengedit soal (akan mengarahkan ke halaman lain)
            function editSoal(index) {
                // Gunakan index untuk mengidentifikasi soal yang akan diedit
                window.location.href = `edit-soal.html?index=${index}`; // Ganti 'edit-soal.html' dengan URL halaman edit soal
            }

            // Fungsi untuk menghapus soal
            function deleteSoal(index) {
                // Gunakan index untuk mengidentifikasi soal yang akan dihapus
                if (confirm("Apakah Anda yakin ingin menghapus soal ini?")) {
                    // Kirim permintaan DELETE ke API untuk menghapus soal
                    fetch(`api/soal/${index}`, { method: 'DELETE' })
                        .then(response => {
                            if (response.ok) {
                                // Jika penghapusan berhasil, refresh halaman
                                fetchSoal()
                                    .then(renderSoal);
                            } else {
                                console.error('Error deleting soal:', response.status);
                            }
                        })
                        .catch(error => console.error('Error deleting soal:', error));
                }
            }

            // Panggil fungsi fetchSoal dan renderSoal saat halaman dimuat
            fetchSoal()
                .then(renderSoal);

            // Tambahkan event listener untuk tombol tambah soal
            tambahSoalButton.addEventListener('click', function() {
                // Tambahkan soal baru ke database (misalnya menggunakan AJAX)
                window.location.href = 'tambah-soal.html'; // Ganti 'tambah-soal.html' dengan URL halaman tambah soal
            });
        });
    </script>
</body>
</html>