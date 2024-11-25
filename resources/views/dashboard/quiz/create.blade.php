<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- <link rel="stylesheet" href="output.css"> --}}
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.11.0/dist/sweetalert2.min.css" rel="stylesheet">
    @vite('resources/css/app.css')
    <title>Quizz</title>
</head>
<body class="bg-teal-700">
    
    <x-navbar>
        <a href="{{ route('dashboard') }}">
        <div class="container flex">
            <h1 class="text-4xl font-bold ml-10 text-white align-center items-center py-2 pr-2"></h1>
            <img src="{{ asset('storage/images/Frog_logo.png') }}" alt="" class="size-16 object-cover aspect-square align-center items-center py-2">
        </div>
    </a>
</x-navbar>

    <div class="container mx-auto p-4 rounded-lg mt-10 ">
        <div class="flex flex-row w-full">
            <div class="w-3/4">
                <div class="p-6 mx-5 rounded-lg shadow-sm h-auto bg-white">
                    <h1 class="text-3xl text-black font-bold">Selamat Datang di Quiz</h1>
                </div>

                <div class="p-4 xl:p-6">
                    <div class="">
                        <div class="bg-white p-6 xl:px-8 border-2 border-gray-300 rounded-lg">
                            <div class="flex justify-between items-center mb-4 xl:mb-8">
                                <h1 class="font-semibold text-lg">Lihat Quiz</h1>
                            </div>
                            <div class="jantuk">
                                <form action="/{{ $quiz->id }}/quiz" method="post" class="">
                                    @csrf
                                    <div class="w-full flex flex-wrap justify-between">
                                        <div class="w-[48.5%] mb-5">
                                            <label for="nama_soal" class="font-semibold text-base mb-4 block">Soal</label>
                                            <input type="text" name="nama_soal" id="nama_soal"  value="{{ old('nama_soal') }}" class="text-sm p-3 rounded-md w-full border-[1.5px] font-medium border-black border-opacity-[16%]" placeholder="Masukkan Nama" required/>
                                            @error('nama_soal')
                                                <div class="text-red-500 text-sm">
                                                {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="w-[48.5%] mb-5">
                                            <label for="jawaban" class="font-semibold text-base mb-4 block">Jawaban</label>
                                            <div class="flex items-center gap-2">
                                                <input type="radio" name="jawaban" value="A" required />
                                                <label class="text-sm block">A.</label>
                                            </div>
                                            <input type="text" name="pilihan[A]" id="jawaban_a" value="{{ old('pilihan.A') }}" class="text-sm p-3 mb-8 rounded-md w-full border-[1.5px] font-medium border-black border-opacity-[16%]" placeholder="Masukkan Jawaban" required />
                                            
                                            <div class="flex items-center gap-2">
                                                <input type="radio" name="jawaban" value="B" required />
                                                <label class="text-sm block">B.</label>
                                            </div>
                                            <input type="text" name="pilihan[B]" id="jawaban_b" value="{{ old('pilihan.B') }}" class="text-sm p-3 mb-8 rounded-md w-full border-[1.5px] font-medium border-black border-opacity-[16%]" placeholder="Masukkan Jawaban" required />
                                            
                                            <div class="flex items-center gap-2">
                                                <input type="radio" name="jawaban" value="C" required />
                                                <label class="text-sm block">C.</label>
                                            </div>
                                            <input type="text" name="pilihan[C]" id="jawaban_c" value="{{ old('pilihan.C') }}" class="text-sm p-3 mb-8 rounded-md w-full border-[1.5px] font-medium border-black border-opacity-[16%]" placeholder="Masukkan Jawaban" required />
                                            
                                            <div class="flex items-center gap-2">
                                                <input type="radio" name="jawaban" value="D" required />
                                                <label class="text-sm block">D.</label>
                                            </div>
                                            <input type="text" name="pilihan[D]" id="jawaban_d" value="{{ old('pilihan.D') }}" class="text-sm p-3 mb-8 rounded-md w-full border-[1.5px] font-medium border-black border-opacity-[16%]" placeholder="Masukkan Jawaban" required />
                                            

                                            
                                            @error('jawaban')
                                                <div class="text-red-500 text-sm">
                                                {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        
                                    </div>
                                    <a href="/" class="p-3 inline-block text-sm rounded-lg bg-gray-500 text-white font-medium">kembali</a>
                                    <button id="submitButton" type="submit" class="bg-teal-400 hover:bg-teal-500 text-white font-bold py-2 px-4 rounded">
                                        Simpan
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
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


    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.11.0/dist/sweetalert2.all.min.js"></script>
    @if (session('createSchedule'))
        <script>
            Swal.fire({
                title: 'Success!',
                text: '{{ session('createSchedule') }}',
                icon: 'success',
                confirmButtonText: 'Ok'
            });
        </script>
    @elseif (session('updateSchedule'))
    <script>
        Swal.fire({
            title: 'Success!',
            text: '{{ session('updateSchedule') }}',
            icon: 'success',
            confirmButtonText: 'Ok'
        });
    </script>    
    @elseif (session('deleteCategoryQuiz'))
    <script>
        Swal.fire({
            title: "Deleted!",
            text: '{{ session('eleteCategoryQuiz') }}',
            icon: 'success',
            confirmButtonText: 'Ok'
        });
    </script>    
    @endif

    <script>
        function confirmDelete(id) {
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!"
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('delete-form-' + id).submit();
                
            }
        });
        }
    </script>

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