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
<body class="bg-teal-700 font-inter flex flex-col justify-center items-center min-h-screen">
    <div class="w-2/4 rounded-lg p-4 bg-gray-100 shadow-md mt-10">
        <div class="flex items-center">
        <img src="./asset/Frog.png" alt="Frog" class="h-18">
        <div class="ml-10">
            <h2 class="text-xl font-bold">Hello,</h2>
            <h3 id="userName" class="text-lg"></h3> 
            <button class="bg-gray-300 px-2 py-1 rounded mt-2" id="userButton">You</button>
        </div>
        </div>
    </div>
    <div class="w-2/4 rounded-lg p-4 bg-gray-100 shadow-md  mt-10">
      <div class="flex justify-between items-center mb-4">
        <div>
          <span class="text-gray-500">Start</span>
        </div>
        <div>
          <span class="text-gray-500">End</span>
        </div>
      </div>
      <div class="relative w-full h-4 rounded-md bg-gray-300 overflow-hidden">
        <div class="absolute top-0 left-0 h-full bg-green-500 rounded-md" id="progressBar" style="width: 0%;"></div>
      </div>
      <div class="text-center mt-4">
        <span class="font-bold text-gray-600">Question Remaining</span>
      </div>
      <div class="flex justify-center mt-4 gap-4">
        <button class="bg-teal-700 hover:bg-teal-600 text-white font-bold py-2 px-4 rounded-md focus:outline-none focus:shadow-outline" onclick="nextQuestion()">
          Lanjutkan
        </button>
        <button class="border-2 border-teal-700 hover:border-teal-600 text-black font-bold py-2 px-4 rounded-md focus:outline-none focus:shadow-outline" onclick="saveAndExit()">
          Simpan & Keluar
        </button>
      </div>
    </div>

    <h2 class="text-xl font-bold mb-4 mx-auto w-2/4 mt-10 text-white">Settings</h2>
    <div class="w-2/4 rounded-lg p-4 bg-gray-100 shadow-md ">
      <div class="flex items-center justify-between mb-2">
        <span>Music</span>
        <label class="relative inline-flex items-center cursor-pointer">
          <input type="checkbox" value="" class="sr-only peer" id="music-toggle">
          <div class="w-11 h-6 bg-gray-200 rounded-full peer focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-green-500 peer-checked:bg-green-500 peer-checked:shadow-lg  peer-focus:ring-green-500 dark:peer-checked:bg-green-600 dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all after:duration-300 after:ease-in-out"></div>
        </label>
      </div>
      <div class="flex items-center justify-between">
        <span>Sounds Effects</span>
        <label class="relative inline-flex items-center cursor-pointer">
          <input type="checkbox" value="" class="sr-only peer" id="sound-effects-toggle">
          <div class="w-11 h-6 bg-gray-200 rounded-full peer focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-green-500 peer-checked:bg-green-500 peer-checked:shadow-lg  peer-focus:ring-green-500 dark:peer-checked:bg-green-600 dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all after:duration-300 after:ease-in-out"></div>
        </label>
      </div>
    </div>
    <script>
      // Replace this with your actual database interaction
      const userName = 'Anonim'; // Get the username from the database
    
      const musicToggleBtn = document.getElementById("music-toggle");
      const soundEffectsToggleBtn = document.getElementById("sound-effects-toggle");
    
      let musicEnabled = true;
      let soundEffectsEnabled = true;
    
      document.getElementById('userName').textContent = userName;
    
      const userButton = document.getElementById('userButton');
      userButton.addEventListener('click', () => {
        // Handle the button click event
        // Example: Redirect to user profile or logout
        console.log('User button clicked!');
      });
    
      musicToggleBtn.addEventListener("click", () => {
        musicEnabled = !musicEnabled;
        if (musicEnabled) {
          // Play music (add your music logic here)
          const music = new Audio('your_music_file.mp3'); // Replace with your music file
          music.play();
        } else {
          // Stop music (add your music logic here)
          const music = document.querySelector('audio');
          if (music) {
            music.pause();
          }
        }
      });
    
      soundEffectsToggleBtn.addEventListener("click", () => {
        soundEffectsEnabled = !soundEffectsEnabled;
        if (soundEffectsEnabled) {
          // Enable sound effects (add your sound effects logic here)
          console.log('Sound effects enabled!');
        } else {
          // Disable sound effects (add your sound effects logic here)
          console.log('Sound effects disabled!');
        }
      });
    
      // Set the API endpoint URL
      const apiUrl = '/api/temporary-data';
    
      // Set the progress variables
      let correctAnswers = 0;
      let wrongAnswers = 0;
      let totalAnswers = 0;
      let remainingAnswers = 0;
    
      // Function to get the temporary data
      function getTemporaryData() {
        // Make an AJAX request to the API to get the temporary data
        fetch(apiUrl)
          .then(response => response.json())
          .then(data => {
            // Update the progress variables
            correctAnswers = data.correct_answers;
            wrongAnswers = data.wrong_answers;
            totalAnswers = data.total_answers;
            remainingAnswers = data.remaining_answers;
    
            // Update the progress bar
            updateProgressBar();
          })
          .catch(error => console.error(error));
      }
    
      // Function to update the progress bar
      function updateProgressBar() {
        // Calculate the percentage of completed questions
        let progressPercentage = ((correctAnswers + wrongAnswers) / totalAnswers) * 100;
    
        // Update the progress bar
        document.getElementById("progressBar").style.width = progressPercentage + "%";
    
        // Update the progress text
        document.getElementById("progressText").textContent = `Correct: ${correctAnswers}, Wrong: ${wrongAnswers}, Remaining: ${remainingAnswers}`;
      }
    
      // Function to pause the quiz
      function pauseQuiz() {
        // Make an AJAX request to the API to save the progress
        fetch(`${apiUrl}/save`, {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json'
          },
          body: JSON.stringify({
            correct_answers: correctAnswers,
            wrong_answers: wrongAnswers,
            total_answers: totalAnswers,
            remaining_answers: remainingAnswers
          })
        })
          .then(response => response.json())
          .then(data => {
            // Redirect to the pause page
            window.location.href = '/pause';
          })
          .catch(error => console.error(error));
      }
    
      // Function to resume the quiz
      function resumeQuiz() {
        // Make an AJAX request to the API to retrieve the saved progress
        fetch(`${apiUrl}/resume`)
          .then(response => response.json())
          .then(data => {
            // Update the progress variables
            correctAnswers = data.correct_answers;
            wrongAnswers = data.wrong_answers;
            totalAnswers = data.total_answers;
            remainingAnswers = data.remaining_answers;
    
            // Update the progress bar
            updateProgressBar();
    
            // Redirect to the quiz page
            window.location.href = '/quiz';
          })
          .catch(error => console.error(error));
      }
    
      // Function to handle the next question
      function nextQuestion() {
        // ... (Code to update answeredQuestions and progressPercentage)
    
        // Example: Update the progress bar
        let progressPercentage = ((correctAnswers + wrongAnswers) / totalAnswers) * 100;
        document.getElementById("progressBar").style.width = progressPercentage + "%";
      }
    
      // Function to save and exit
      function saveAndExit() {
        // ... (Code to save progress)
      }
    
      // Initialize the quiz
      getTemporaryData();
    </script>
</body>
</html>