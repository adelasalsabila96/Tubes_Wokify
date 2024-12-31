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
