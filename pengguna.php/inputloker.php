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

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data and escape special characters
    $full_name = mysqli_real_escape_string($conn, $_POST['full_name']);
    $current_location = mysqli_real_escape_string($conn, $_POST['current_location']);
    $phone_number = mysqli_real_escape_string($conn, $_POST['phone_number']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);

    // Insert data into the database
    $sql = "INSERT INTO applications (full_name, current_location, phone_number, email) VALUES ('$full_name', '$current_location', '$phone_number', '$email')";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Application submitted successfully!');</script>";
    } else {
        echo "<script>alert('Error: " . mysqli_error($conn) . "');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Job Application</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
</head>

<body class="bg-gray-100">
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

    <main class="container mx-auto mt-10 max-w-3xl bg-white p-6 rounded-lg shadow-md">
        <div class="text-center">
            <img src="../asset/img/kredivo.jpg" alt="Gojek Logo" class="mx-auto" width="100" height="100" />
            <h1 class="text-2xl font-semibold mt-4 text-gray-800">Melamar untuk</h1>
            <h2 class="text-xl font-semibold text-gray-800">Field Collector</h2>
            <p class="text-gray-600">Kredivo Group</p>
        </div>

        <!-- Progress Bar -->
        <div class="flex justify-center mt-6 items-center">
            <div class="text-center">
                <div class="w-8 h-8 bg-blue-500 rounded-full inline-block"></div>
                <p class="mt-2 text-gray-400">Mengisi Data</p>
            </div>
            <div class="flex-grow border-t-2 border-blue-200 mx-2"></div>

            <div class="text-center">
                <div class="w-8 h-8 bg-gray-300 rounded-full inline-block"></div>
                <p class="mt-2 text-gray-400">Mengunggah CV dan Portofolio</p>
            </div>
            <div class="flex-grow border-t-2 border-gray-300 mx-2"></div>

            <div class="text-center">
                <div class="w-8 ```php
                <h8 class="bg-gray-300 rounded-full inline-block"></div>
                <p class="mt-2 text-gray-400">Terkirim</p>
            </div>
        </div>

        <!-- Form Section -->
        <div class="bg-gray-50 p-6 rounded-lg shadow-md mt-10">
            <h3 class="text-xl font-semibold mb-6 text-gray-800 text-center">Informasi Pribadi</h3>
            <form action="inputcv.php" method="POST">
                <!-- Full Name -->
                <div class="mb-4">
                    <label class="block text-gray-700 font-medium mb-1">Nama Lengkap</label>
                    <input name="full_name" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Nama Lengkap" type="text" required />
                </div>

                <!-- Current Location -->
                <div class="mb-4">
                    <label class="block text-gray-700 font-medium mb-1">Lokasi Saat Ini</label>
                    <input name="current_location" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Lokasi Saat Ini" type="text" required />
                </div>

                <!-- Phone Number -->
                <div class="mb-4">
                    <label class="block text-gray-700 font-medium mb-1">No. Telepon Aktif</label>
                    <input name="phone_number" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="No. Telepon Aktif" type="text" required />
                </div>

                <!-- Email -->
                <div class="mb-4">
                    <label class="block text-gray-700 font-medium mb-1">Alamat Email</label>
                    <input name="email" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Alamat Email" type="email" required />
                </div>

                <!-- Save Button -->
                <div class="text-center">
                    <button class="bg-blue-500 text-white px-6 py-2 rounded-lg font-semibold hover:bg-blue-600 transition duration-300" type="submit">Simpan</button>
                </div>
            </form>
        </div>
    </main>

    <footer class="bg-gradient-to-r from-blue-500 via-blue-400 to-blue-600 text-white py-4 mt-10">
        <div class="container mx-auto text-center">
            <p class="text-white">© 2024 Workify. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>