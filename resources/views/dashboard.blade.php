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
    <div class="navbar bg-teal-700 p-6 top-0 left-0 w-full z-10 shadow-lg">
        <div class="container flex">
            <h1 class="text-4xl font-bold ml-10 text-white align-center items-center py-2">Quizi</h1>
            <img src="{{ asset('storage/images/Frog_logo.png') }}" alt="" class="size-16 object-cover aspect-square align-center items-center py-2">
        </div>
    </div>
    <div class="container mx-auto p-4 rounded-lg mt-10 ">
        <div class="flex flex-row w-full">
            <div class="  w-3/4">
                <div class="p-6 mx-5 rounded-lg shadow-sm h-auto bg-white">
                    <h1 class="text-3xl text-black font-bold">Selamat Datang di Quizi</h1>
                </div>

                <div class="p-6 mx-5 rounded-lg shadow-sm bg-white mt-5">
                    <h1 class="text-xl font-semibold mb-5">Quiz terbaru</h1>

                    <div class="flex flex-col flex-wrap justify-around p-3">
                        {{-- @forEach() --}}
                        <a href="" class="rounded-lg bg-white border border-solid border-gray-400 flex flex-col max-w-64">
                            <img src="{{ asset('storage/images/cover_test.jpg') }}" alt="" class="w-full aspect-video max-h-36 object-cover rounded-t-lg">
                            <div class="w-full p-3.5">
                                <div class="flex flex-row w-full justify-between ">
                                    <span class="border rounded-full text-xs px-2">Pengetahuan Umum</span>
                                    <span class="rounded-full border text-xs px-2">EN</span>
                                </div>
                                    <h2 class="text-lg font-semibold my-2">Judul</h2>
                                <div class="text-sm text-gray-400">Mata Pelajaran</div>
                                    
                            </div>
                        </a>
                        {{-- @endForEach --}}
                    </div>
                    
                    <div class="w-full flex">
                        <a href="" class="text-sm italic text-gray-400 ml-auto mr-7 hover:underline">more quiz &raquo;</a>
                    </div>
                </div>
            </div>
            <div class=" w-1/4">
                <div class="flex bg-white p-6 rounded-lg shadow-sm flex-col justify-center align-middle">
                    <h1 class="text-5xl font-bold max-w-24 text-center">Halo Teman!</h1>
                    <img src="{{ asset('storage/images/Frog_logo.png') }}" alt="" class="block size-40 aspect-auto object-cover mx-auto">
                </div>
                <div class="rounded-lg mt-5 w-full flex justify-center">
                    <a href="" class="block rounded-lg p-3 w-3/4 h-full text-center font-bold text-xl bg-white text-green-500 shadow-sm border-4 border-green-500 hover:bg-green-500 hover:text-white transition-all duration-250 ease-in">
                        Buat Quiz Baru!</a>
                </div>
            </div>
        </div>
    </div>

    {{-- <script>
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
    </script> --}}
</body>
</html>