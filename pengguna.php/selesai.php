<?php
// Database connection parameters
$host = "localhost"; // Database host
$user = "root"; // Database username
$pass = ""; // Database password
$dbname = "workify_baru"; // Database name

// Create connection
$conn = mysqli_connect($host, $user, $pass, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Handle form submission if needed
// You can add your form handling logic here if this page is meant to handle form submissions

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Workify</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
</head>

<body class="bg-white">
    <header class="bg-gradient-to-r from-blue-500 via-blue-400 to-blue-600 shadow-lg sticky top-0 z-50">
        <div class="container mx-auto flex justify-between items-center px-6 py-4">
            <!-- Logo -->
            <div class="flex items-left space-x-4">
                <img src="../asset/img/logo.png" alt="Workify Logo" class="h-10">
                <div>
                    <h1 class="text-2xl font-extrabold text-white tracking-tight">WORKIFY</h1>
                    <p class="text-sm text-blue-200">Find Your Dream Job</p>
                </div>
            </div>

            <!-- Navigation Menu -->
            <nav class="hidden md:flex items-center space-x-6">
                <a href="beranda.php" class="text-yellow-300 font-medium hover:text-yellow-300 transition">Cari Lowongan</a>
                <a href="template.html" class="text-white font-medium hover:text-yellow-300 transition">Template CV</a>
            </nav>
        </div>
    </header>

    <main class="container mx-auto mt-10 max-w-4xl bg-white p-8 rounded-lg shadow-lg relative">
        <!-- Kembali ke Lamaran Link -->
        <div class="absolute top-4 left-4">
            <a href="lamaransaya.php" class="text-blue-500 text-sm inline-block">
                ← Lihat lamaran anda
            </a>
        </div>

        <!-- Header -->
        <div class="text-center">
            <img src="../asset/img/kredivo.jpg" alt="Gojek Logo" class="mx-auto" width="100" height="100" />
            <h1 class="text-2xl font-semibold mt-4 text-gray-800">Melamar untuk</h1>
            <h2 class="text-xl font-semibold text-gray-800">Field Collector</h2>
            <p class="text-gray-600">Kredivo Group</p>
        </div>

        <!-- Progress Bar -->
        <div class="flex justify-center mt-8 items-center">
            <div class="text-center relative">
                <div class="w-8 h-8 bg-blue-500 rounded-full inline-block"></div>
                <p class="mt-2 text-gray-800">Mengisi Data</p>
            </div>
            <div class="flex-grow border-t-2 border-blue-200 mx-2"></div>
            <div class="text-center relative">
                <div class="w-8 h-8 bg-blue-500 rounded-full inline-block"></div>
                <p class="mt-2 text-gray-800">Mengunggah CV dan Portofolio</p>
            </div>
            <div class="flex-grow border-t-2 border-blue-200 mx-2"></div>
            <div class="text-center relative">
                <div class="w-8 h-8 bg-gray-300 rounded-full inline-block"></div>
                <p class="mt-2 text-gray-400">Terkirim</p>
            </div>
        </div>

        <!-- Confirmation Message -->
        <div class="mt-16 text-center">
            <div class="border border-gray-300 p-8 rounded-lg inline-block">
                <h2 class="text-2xl font-bold">Terima kasih</h2 <div class="mt-4">
                    <i class="fas fa-check-circle text-4xl text-blue-700"></i>
                </div>
                <p class="mt-4 text-gray-600">Semoga diterima di tempat kerja yang Anda inginkan</p>
            </div>
        </div>
    </main>

    <footer class="bg-gradient-to-r from-blue-500 via-blue-400 to-blue-600 text-white py-4 mt-10">
        <div class="container mx-auto text-center">
            <p class="text-white">© 2024 Workify. All rights reserved.</p>
        </div>
    </footer>

    <script>
        // JavaScript to toggle the profile dropdown
        document.getElementById('profile-toggle').addEventListener('click', function (event) {
            const dropdown = document.getElementById('profile-dropdown');
            dropdown.classList.toggle('hidden');
            event.stopPropagation();
        });

        const icon = document.getElementById('dropdown-icon');
        icon.addEventListener('click', function () {
            icon.classList.toggle('rotate-180');
        });
    </script>
</body>

</html>