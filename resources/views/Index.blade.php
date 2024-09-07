<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- <link rel="stylesheet" href="output.css"> --}}
    @vite('resources/css/app.css')
    <title>Quizz</title>
</head>
<body class="bg-teal-700">
    <div class="navbar bg-teal-700 p-6 fixed top-0 left-0 w-full z-10 h-24 shadow-lg">
        <div class="container mx-auto flex  items-center">
            <button id="back" class="bg-teal-500 hover:bg-teal-600 text-white font-bold py-2 px-4 text-xl rounded inline-flex items-center">
                <svg class="h-8 w-8 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                Kembali
            </button>
            <h1 class="text-3xl font-bold mx-10 text-white">Buat Quizz Baru</h1>
        </div>
    </div>
    <div class="container mx-auto p-4 rounded-lg shadow-md bg-white mt-40">
        <div class="grid grid-cols-2 gap-4">
            <div class="bg-gray-200 rounded-lg shadow-xl p-4">
                <h2 class="text-lg font-bold mb-2">Pilih jenis pertanyaan untuk menambahkan pertanyaan</h2>
                <div class="flex items-center mb-4 mt-10">
                    <input type="radio" id="pilihan-ganda" name="question-type" class="mr-2 w-6 h-6" value="pilihan-ganda">
                    <label for="pilihan-ganda" class="font-medium text-lg">Pilihan Ganda</label>
                </div>
                <div class="flex items-center mb-4">
                    <input type="radio" id="esai" name="question-type" class="mr-2 w-6 h-6" value="esai">
                    <label for="esai" class="font-medium text-lg">Esai</label>
                </div>
                <div class="flex items-center mb-4">
                    <input type="radio" id="isian-singkat" name="question-type" class="mr-2 w-6 h-6" value="isian-singkat">
                    <label for="isian-singkat" class="font-medium text-lg">Isian Singkat</label>
                </div>
                <div class="flex items-center mb-4">
                    <input type="radio" id="analisis" name="question-type" class="mr-2 w-6 h-6" value="analisis">
                    <label for="analisis" class="font-medium text-lg">Analisis</label>
                </div>
                <button class="bg-teal-500 hover:bg-teal-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline mt-80" id="next-button">Next</button>
            </div>
            <div class="bg-gray-200 rounded-lg shadow-xl p-4">
                <img src="./asset/Guru.jpg" alt="Classroom" class="rounded-lg">
                <h2 id="title" class="text-lg font-bold mt-4">Pilihan Ganda</h2>
                <p id="description" class="mt-2">Pilihan Ganda adalah bentuk soal yang menyediakan beberapa jawaban yang sudah ditentukan sebelumnya, dan peserta harus memilih satu jawaban yang benar. Format ini sering digunakan dalam ujian karena memungkinkan penilaian yang cepat dan objektif.</p>
            </div>
        </div>
    </div>

    <script>
        const questionTypes = document.querySelectorAll('input[name="question-type"]');
        const title = document.getElementById('title');
        const description = document.getElementById('description');
        const nextButton = document.getElementById('next-button');

        questionTypes.forEach(type => {
            type.addEventListener('change', () => {
                if (type.value === 'pilihan-ganda') {
                    title.textContent = 'Pilihan Ganda';
                    description.textContent = 'Pilihan Ganda adalah bentuk soal yang menyediakan beberapa jawaban yang sudah ditentukan sebelumnya, dan peserta harus memilih satu jawaban yang benar. Format ini sering digunakan dalam ujian karena memungkinkan penilaian yang cepat dan objektif.';
                } else if (type.value === 'esai') {
                    title.textContent = 'Esai';
                    description.textContent = 'Esai adalah bentuk soal yang meminta peserta untuk menulis jawaban panjang dan mendalam tentang topik tertentu. Jawaban esai memungkinkan peserta menunjukkan pemahaman mendalam, analisis kritis, dan kemampuan menulis mereka.';
                } else if (type.value === 'isian-singkat') {
                    title.textContent = 'Isian Singkat';
                    description.textContent = 'Isian Singkat adalah bentuk soal yang meminta peserta untuk mengisi bagian yang kosong dalam kalimat atau menjawab dengan kata atau frasa pendek. Format ini menguji pemahaman dasar dan kemampuan mengingat informasi dengan cepat.';
                } else if (type.value === 'analisis') {
                    title.textContent = 'Analisis';
                    description.textContent = 'Analisis adalah bentuk soal yang meminta peserta untuk memeriksa dan memecahkan suatu masalah atau teks secara mendalam. Peserta harus menjelaskan, mengevaluasi, dan menarik kesimpulan berdasarkan bukti dan logika yang disajikan.';
                    }
                });
        });

        nextButton.addEventListener('click', () => {
            const selectedType = document.querySelector('input[name="question-type"]:checked');
            if (selectedType) {
                const questionType = selectedType.value;
                if (questionType === 'pilihan-ganda') {
                    window.location.href = 'Pilgancreate.html'; 
                } else if (questionType === 'esai') {
                    window.location.href = 'Esai.html'; 
                } else if (questionType === 'isian-singkat') {
                    window.location.href = 'Isian.html'; 
                } else if (questionType === 'analisis') {
                    window.location.href = 'analisis.html'; 
                }
            }
        });
    </script>
</body>
</html>