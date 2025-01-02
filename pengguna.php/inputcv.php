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

    // Check if files are uploaded
    if (isset($_FILES['cv_file']) && isset($_FILES['portfolio_file'])) {
        // Handle file uploads
        $cv_file = $_FILES['cv_file']['name'];
        $portfolio_file = $_FILES['portfolio_file']['name'];

        // Specify the directory to save uploaded files
        $target_dir = "uploads/";
        $cv_target_file = $target_dir . basename($cv_file);
        $portfolio_target_file = $target_dir . basename($portfolio_file);

        // Move uploaded files to the target directory
        if (move_uploaded_file($_FILES['cv_file']['tmp_name'], $cv_target_file) && 
            move_uploaded_file($_FILES['portfolio_file']['tmp_name'], $portfolio_target_file)) {
            
            // Insert data into the database
            $sql = "INSERT INTO applications (full_name, current_location, phone_number, email, cv_file, portfolio_file) 
                    VALUES ('$full_name', '$current_location', '$phone_number', '$email', '$cv_file', '$portfolio_file')";

            if (mysqli_query($conn, $sql)) {
                echo "<script>alert('Application submitted successfully!');</script>";
            } else {
                echo "<script>alert('Error: " . mysqli_error($conn) . "');</script>";
            }
        } else {
            echo "<script>alert('Error uploading files.');</script>";
        }
    } else {
        echo "<script>alert('No files uploaded.');</script>";
    }
}

// Close the database connection
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Upload CV dan Portofolio</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
</head>

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
            <a href="beranda.html" class="text-yellow-300 font-medium hover:text-yellow-300 transition">Cari
                Lowongan</a>
            <a href="template.html" class="text-white font-medium hover:text-yellow-300 transition">Template CV</a>

            <!-- Action Buttons -->
            <div class="flex items-center space-x-4">
                <!-- Notification Icon -->
                <a href="notif.html" class="hover:scale-110 transition">
                    <svg class="w-6 h-6 text-white" fill="none" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            d="M12 5.365V3m0 2.365a5.338 5.338 0 0 1 5.133 5.368v1.8c0 2.386 1.867 2.982 1.867 4.175 0 .593 0 1.193-.538 1.193H5.538c-.538 0-.538-.6-.538-1.193 0-1.193 1.867-1.789 1.867-4.175v-1.8A5.338 5.338 0 0 1 12 5.365Z" />
                    </svg>
                </a>
                <!-- Chat Icon -->
                <a href="chat.html" class="hover:scale-110 transition">
                    <svg class="w-6 h-6 text-white" fill="none" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            d="M9 17h6l3 3v-3h2V9h-2M4 4h11v8H9l-3 3v-3H4V4Z" />
                    </svg>
                </a>

                <div class="relative">
                    <!-- Profile Button with Elongated Border -->
                    <button id="profile-toggle"
                        class="flex items-center space-x-3 focus:outline-none px-4 py-2 rounded-full border-2 border-blue-600">
                        <!-- Avatar -->
                        <div
                            class="w-10 h-10 rounded-full bg-gradient-to-r from-blue-400 to-blue-600 flex items-center justify-center shadow-md">
                            <img src="../asset/img/lisa.jpg" alt="Profile"
                                class="w-10 h-10 rounded-full border-2 border-white">
                        </div>
                        <!-- Username and Icon -->
                        <span class="text-lg font-semibold text-white flex items-center space-x-1">
                            <span>DELL</span>
                            <!-- Small Icon next to the username -->
                            <svg id="dropdown-icon"
                                class="w-4 h-4 text-white transform transition-transform duration-300"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 12l7-7 7 7" />
                            </svg>
                        </span>
                    </button>

                    <!-- Dropdown Menu -->
                    <div id="profile-dropdown"
                        class="hidden absolute right-0 mt-3 w-56 bg-white rounded-lg shadow-lg ring-1 ring-black ring-opacity-5 transition-all duration-200">
                        <div class="flex flex-col">
                            <a href="lihatprofil.html"
                                class="flex items-center px-4 py-3 text-gray-700 hover:bg-gradient-to-r from-blue-500 to-blue-400 hover:text-white transition">
                                <i class="fas fa-user mr-3 text-blue-500 group-hover:text-white"></i> Profil Saya
                            </a>
                            <a href="lamaransaya.html"
                                class="flex items-center px-4 py-3 text-gray-700 hover:bg-gradient-to-r from-blue-500 to-blue-400 hover:text-white transition">
                                <i class="fas fa-file-alt mr-3 text-blue-500 group-hover:text-white"></i> Lamaran Saya
                            </a>
                            <a href="logout.html"
                                class="flex items-center px-4 py-3 text-gray-700 hover:bg-red-500 hover:text-white transition">
                                <i class="fas fa-power-off mr-3 text-red-500 group-hover:text-white"></i> Keluar
                            </a>
                        </div>
                    </div>
                </div>
        </nav>
</header>

<!-- JavaScript to Toggle the Dropdown -->
<script>
    // Toggle the Profile Dropdown
    document.getElementById('profile-toggle').addEventListener('click', function (event) {
        const dropdown = document.getElementById('profile-dropdown');
        dropdown.classList.toggle('hidden');

        // Stop the event from propagating to the document level
        event.stopPropagation();
    });

    // Get the dropdown icon element
    const icon = document.getElementById('dropdown-icon');

    // Toggle icon rotation on click
    icon.addEventListener('click', function () {
        icon.classList.toggle('rotate-180'); // This will rotate the icon by 180 degrees
    });
</script>

<body class="bg-gray-50">

    <main class="container mx-auto mt-10 max-w-3xl bg-white p-6 rounded-lg shadow-md">
        <h1 class="text-2xl font-bold text-center text-gray-800 mb-6">Unggah CV dan Portofolio</h1>

        <!-- Form -->
        <form action="selesai.php" method="POST" enctype="multipart/form-data" class="space-y-6">
            <!-- CV Upload -->
            <div class="bg-gray-100 p-6 rounded-lg shadow-md flex flex-col items-center">
                <h2 class="text-lg font-semibold text-gray-800 mb-4">Upload CV</h2>
                <label for="cv-upload" class="relative w-64 h-40 border-dashed border-2 border-gray-300 rounded-lg flex items-center justify-center cursor-pointer">
                    <input id="cv-upload" type="file" name="cv_file" accept=".pdf,.doc,.docx" class="absolute inset-0 opacity-0 cursor-pointer" required>
                    <div class="flex flex-col items-center space-y-2 text-gray-400">
                        <i class="fas fa-upload text-4xl"></i>
                        <span class="text-sm">Klik atau seret file ke sini</span>
                    </div>
                </label>
            </div>

            <!-- Portfolio Upload -->
            <div class="bg-gray-100 p-6 rounded-lg shadow-md flex flex-col items-center">
                <h2 class="text-lg font-semibold text-gray-800 mb-4">Upload Portofolio</h2>
                <label for="portfolio-upload" class="relative w-64 h-40 border-dashed border-2 border-gray-300 rounded-lg flex items-center justify-center cursor-pointer">
                    <input id="portfolio-upload" type="file" name="portfolio_file" accept=".pdf,.doc,.docx" class="absolute inset-0 opacity-0 cursor-pointer" required>
                    <div class="flex flex-col items-center space-y-2 text-gray-400">
                        <i class="fas fa-upload text-4xl"></i>
                        <span class="text-sm">Klik atau seret file ke sini</span>
                    </div>
                </label>
            </div>

            <!-- Submit Button -->
            <div class="text-center">
                <button type="submit" class="bg-blue-500 text-white py-2 px-6 rounded-lg font-semibold hover:bg-blue-700">
                    Simpan
                </button>
            </div>
        </form>
    </main>

    <footer class="bg-blue-500 text-white py-4 mt-10 text-center">
        <p>&copy; 2024 Workify. All rights reserved.</p>
    </footer>

</body>

</html>
