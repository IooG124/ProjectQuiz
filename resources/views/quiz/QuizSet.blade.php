<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="output.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <title>Quizz</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-teal-700 font-inter">
    <x-navbar>
        <div class="container mx-auto flex  items-center">
            <div class="flex items-center">
                <h1 class="text-2xl font-bold ml-7 mr-2 text-white">{{ $title }}</h1>
                <img src="{{ asset('storage/images/Frog_logo.png') }}" alt="" class="size-16 object-cover aspect-square align-center items-center py-2">
              </div>
        </div>
    </x-navbar>
    <div class="container w-1/2  mx-auto p-8 rounded-lg shadow-lg bg-white mt-10 mb-20 ">
      <div class="mx-auto">
        <a href="{{ route('dashboard') }}" class="bg-teal-500 hover:bg-teal-600 text-white font-bold py-2 px-4 mb-5 text-xl rounded inline-flex items-center">
          <svg class="h-8 w-8 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
          Kembali
        </a>
        <div class="p-2 bg-white rounded-lg w-3xl ">
          <h2 class="text-4xl font-bold mb-4">Atur Detail Quizz</h2>
          <form id="quizzForm" method="POST" action="{{ route('create.quiz.question') }}" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label for="nama" class="block text-gray-700 font-bold mb-2">Nama Quizz</label>
                <input type="text" id="nama" name="nama_quizz" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ old('nama_quizz') }}" placeholder="Quizz belum berjudul. . .">
                  @error('nama_quizz')
                    <span class="text-red-600 text-sm italic">Nama quiz wajib di isi</span>
                  @enderror
            </div>
            <div class="mb-4">
                <label for="mataPelajaran" class="block text-gray-700 font-bold mb-2">Mata Pelajaran</label>
                <select id="mataPelajaran" name="mata_pelajaran" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                  <option value="">Pilih Mata Pelajaran</option>
                  <option value="Matematika" {{ old('mata_pelajaran') == 'Matematika' ? 'selected' : '' }}>Matematika</option>
                  <option value="Bahasa Indonesia" {{ old('mata_pelajaran') == 'Bahasa Indonesia' ? 'selected' : '' }}>Bahasa Indonesia</option>
                  <option value="IPA" {{ old('mata_pelajaran') == 'IPA' ? 'selected' : '' }}>IPA</option>
                  <option value="Pengetahuan Umum" {{ old('mata_pelajaran') == 'Pengetahuan Umum' ? 'selected' : '' }}>Pengetahuan Umum</option>
              </select>
              
                @error('mata_pelajaran')
                    <span class="text-red-600 text-sm italic">Pilih mata pelajaran</span>
                @enderror
            </div>
            <div class="mb-4">
                <label for="kelas" class="block text-gray-700 font-bold mb-2">Kelas</label>
                <select id="kelas" name="kelas" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 bg-inherit leading-tight focus:outline-none focus:shadow-outline">
                  <option value="">Pilih Kelas</option>
                  <option value="VII" {{ old('kelas') == 'VII' ? 'selected' : '' }}>Kelas VII</option>
                  <option value="VIII" {{ old('kelas') == 'VIII' ? 'selected' : '' }}>Kelas VIII</option>
                  <option value="IX" {{ old('kelas') == 'IX' ? 'selected' : '' }}>Kelas IX</option>
                </select>
                @error('kelas')
                    <span class="text-red-600 text-sm italic">Pilih tingkatan kelas</span>
                @enderror
            </div>
            <div class="mb-4">
                <label for="bahasa" class="block text-gray-700 font-bold mb-2">Bahasa</label>
                <select id="bahasa" name="bahasa" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 bg-inherit leading-tight focus:outline-none focus:shadow-outline">
                  <option value="">Pilih Bahasa</option>
                  <option value="Indonesia" {{ old('bahasa') == 'Indonesia' ? 'selected' : '' }}>Indonesia</option>
                  <option value="English" {{ old('bahasa') == 'English' ? 'selected' : '' }}>English</option>
              </select>              
                @error('bahasa')
                    <span class="text-red-600 text-sm italic">Pilih bahasa</span>
                @enderror
            </div>
            
            <div class="p-4 bg-white rounded-lg shadow-lg col-span-1 md:col-span-1 cols-end ">
                <div class="mb-2">
                    <label for="imageInput" class="block text-gray-700 font-bold mb-5 ">Gambar Profil</label>
                    <div class="flex flex-col items-center justify-center relative w-full h-80 border border-gray-300 rounded-lg">
                        <img src="./asset/white.png" alt="Gambar Profil" id="previewImage" class=" w-full h-full object-cover aspect-video" style="display: none;">
                        <input type="file" name="gambar_profil" id="imageInput" accept="image/*" class="hidden" >
                    </div>
                    <span class="text-xs block mt-2 text-gray-400">*maksimal ukuran file 5 Mb (png, jpg, jpeg, svg)</span>
                  @error('gambar_profil')
                    <span class="text-red-600 text-sm italic">{{ $message }}</span>
                  @enderror
                </div>
            </div>
            <div class="mt-8 justify-end flex">
              <button id="uploadButton" type="button" class="bg-teal-400 hover:bg-teal-500 text-white font-bold py-2 px-4 rounded mr-4">
                  Upload Gambar
              </button>
              <button id="submitButton" type="submit" class="bg-teal-400 hover:bg-teal-500 text-white font-bold py-2 px-4 rounded">
                  Simpan
              </button>
          </div>
        </form>
      </div>
      </div>
      </div>
    </div>
    <script>
      document.getElementById('uploadButton').addEventListener('click', function () {
          document.getElementById('imageInput').click();
      });
  
      document.getElementById('imageInput').addEventListener('change', function () {
          const file = this.files[0];
          if (file) {
              document.getElementById('previewImage').src = URL.createObjectURL(file);
              document.getElementById('previewImage').style.display = 'block';
              document.getElementById('imageError').classList.add('hidden');
          } else {
              document.getElementById('imageError').classList.remove('hidden');
          }
      });
  </script>
    {{-- <script>
      const quizzForm = document.getElementById('quizzForm');
      const submitButton = document.getElementById("submitButton");
      const previewImage = document.getElementById("previewImage");
      const imageInput = document.getElementById("imageInput");
      const uploadOverlay = document.getElementById("uploadOverlay");
      const namaInput = document.getElementById("nama");
      const mataPelajaranSelect = document.getElementById("mataPelajaran");
      const kelasSelect = document.getElementById("kelas");
      const bahasaSelect = document.getElementById("bahasa");
      const visibilitasSelect = document.getElementById("visibilitas");
      const errorContainer = document.querySelector('.error-container');

      let isValid = false;

      // Event listeners for input fields
      namaInput.addEventListener("input", () => {
        if (namaInput.value !== "") {
          isValid = true;
          checkFormValidity();
        } else {
          isValid = false;
          checkFormValidity();
        }
      });

      mataPelajaranSelect.addEventListener("change", () => {
        if (mataPelajaranSelect.value !== "") {
          isValid = true;
          checkFormValidity();
        } else {
          isValid = false;
          checkFormValidity();
        }
      });

      kelasSelect.addEventListener("change", () => {
        if (kelasSelect.value !== "") {
          isValid = true;
          checkFormValidity();
        } else {
          isValid = false;
          checkFormValidity();
        }
      });

      bahasaSelect.addEventListener("change", () => {
        if (bahasaSelect.value !== "") {
          isValid = true;
          checkFormValidity();
        } else {
          isValid = false;
          checkFormValidity();
        }
      });

      visibilitasSelect.addEventListener("change", () => {
        if (visibilitasSelect.value !== "") {
          isValid = true;
          checkFormValidity();
        } else {
          isValid = false;
          checkFormValidity();
        }
      });

      // Event listener for image upload button
      uploadButton.addEventListener("click", () => {
        imageInput.click();
      });

      imageInput.addEventListener("change", (event) => {
        const file = event.target.files[0];
        if (file) {
          const reader = new FileReader();
          reader.onload = (e) => {
            const img = new Image();
            img.src = e.target.result;
            img.onload = () => {
              const maxWidth = 500; // set the maximum width of the preview image
              const maxHeight = 500; // set the maximum height of the preview image
              const width = img.width;
              const height = img.height;
              if (width > maxWidth || height > maxHeight) {
                const scale = Math.min(maxWidth / width, maxHeight / height);
                const newWidth = width * scale;
                const newHeight = height * scale;
                previewImage.style.width = `${newWidth}px`;
                previewImage.style.height = `${newHeight}px`;
              } else {
                previewImage.style.width = `${width}px`;
                previewImage.style.height = `${height}px`;
              }
              previewImage.src = img.src;
              previewImage.style.display = "block"; /* show the preview image */
            }
          }
          reader.readAsDataURL(file);
          isValid = true;
          checkFormValidity();
        } else {
          previewImage.src = ""; /* reset the preview image */
          previewImage.style.display = "none"; /* hide the preview image */
          isValid = false;
          checkFormValidity();
        }
      });

      // Function to check if the form is valid
      function checkFormValidity() {
        const isNamaValid = namaInput.value !== "";
        const isMataPelajaranValid = mataPelajaranSelect.value !== "";
        const isKelasValid = kelasSelect.value !== "";
        const isBahasaValid = bahasaSelect.value !== "";
        const isVisibilitasValid = visibilitasSelect.value !== "";
        const isImageValid = imageInput.value !== "";

        if (isNamaValid && isMataPelajaranValid && isKelasValid && isBahasaValid && isVisibilitasValid && isImageValid) {
          submitButton.disabled = false;
        } else {
          submitButton.disabled = true;
        }
      }

      // Submit button click handler
      submitButton.addEventListener("click", (event) => {
        event.preventDefault();
        if (isValid) {
          const formData = new FormData(quizzForm);
          formData.append("image", imageInput.files[0]);
          fetch('/upload', {
            method: 'POST',
            body: formData
          })
          .then(response => response.json())
          .then(data => {
            window.location.href = "index.html";
          })
          .catch(error => {
            console.error(error);
            errorContainer.innerHTML = '<p class="text-red-500">Terjadi kesalahan saat mengunggah. Silakan coba lagi.</p>';
            errorContainer.style.display = "block";
          });
        } else {
          errorContainer.innerHTML = '<p class="text-red-500">Harap isi semua data yang diperlukan!</p>';
          errorContainer.style.display = "block";
        }
      });
    </script> --}}
  </body>
</html>