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
    
    <x-navbar>
        <a href="{{ route('dashboard') }}">
        <div class="container flex">
            <h1 class="text-4xl font-bold ml-10 text-white align-center items-center py-2 pr-2">{{ $title }}</h1>
            <img src="{{ asset('storage/images/Frog_logo.png') }}" alt="" class="size-16 object-cover aspect-square align-center items-center py-2">
        </div>
    </a>
</x-navbar>

    <div class="container mx-auto p-4 rounded-lg mt-10 ">
        <div class="flex flex-row w-full">
            <div class="w-3/4">
                <div class="p-6 mx-5 rounded-lg shadow-sm h-auto bg-white">
                    <h1 class="text-3xl text-black font-bold">Selamat Datang di Quizi</h1>
                </div>

                <table class="table-auto w-full">
                    <thead>
                        <tr>
                            <th class="px-4 py-2 bg-gray-200">No</th>
                            <th class="px-4 py-2 bg-gray-200">Gambar</th>
                            <th class="px-4 py-2 bg-gray-200">Nama Quiz</th>
                            <th class="px-4 py-2 bg-gray-200">Mapel</th>
                            <th class="px-4 py-2 bg-gray-200">Kelas</th>
                            <th class="px-4 py-2 bg-gray-200">Masuk</th>
                            <th class="px-4 py-2 bg-gray-200">Ubah</th>
                            <th class="px-4 py-2 bg-gray-200">Hapus</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- @dump($quizzes) --}}
                        @foreach ($quizzes as $quiz)
                        <tr class="bg-gray-100 hover:bg-gray-200">
                            <td class="border px-4 py-2">{{ $loop->iteration }}</td>
                            <td class="border px-4 py-2">
                                <img src="{{ asset('storage/' . $quiz->gambar_profil) }}" alt="" class="w-20 h-20 rounded-md">
                            </td>
                            <td class="border px-4 py-2">{{ $quiz->nama_quizz }}</td>
                            <td class="border px-4 py-2">{{ $quiz->mata_pelajaran }}</td>
                            <td class="border px-4 py-2">{{ $quiz->kelas }}</td>
                            <td class="border px-4 py-2">
                                <a href="{{ $quiz->id }}" class="text-yellow-500">Masuk</a>
                            </td>
                            <td class="border px-4 py-2">
                                <a href="{{ $quiz->id }}/edit" class="text-blue-500">Ubah</a>
                            </td>
                            <td class="border px-4 py-2">
                                <form action="{{ $quiz->id }}" method="post" class="inline deleteForm">
                                    @method('delete')
                                    @csrf
                                    <button type="button" class="text-red-500 hover:underline show_confirm">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class=" w-1/4">
                <div class="flex bg-white p-6 rounded-lg shadow-sm flex-col justify-center align-middle">
                    <h1 class="text-5xl font-bold max-w-24 text-center">Halo Teman!</h1>
                    <img src="{{ asset('storage/images/Frog_logo.png') }}" alt="" class="block size-40 aspect-auto object-cover mx-auto">
                </div>
                <div class="rounded-lg mt-5 w-full flex justify-center">
                    <a href="{{ route('create.quiz') }}" class="block rounded-lg p-3 w-3/4 h-full text-center font-bold text-xl bg-white text-green-500 shadow-sm border-4 border-green-500 hover:bg-green-500 hover:text-white transition-all duration-250 ease-in">
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