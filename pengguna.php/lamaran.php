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

// Fetch application details based on the job ID passed in the URL
$job_id = isset($_GET['id']) ? intval($_GET['id']) : 0; // Ensure the ID is an integer

// If job ID is not provided, exit the script
if ($job_id == 0) {
    die("Job ID not provided.");
}

// Use prepared statements to prevent SQL injection
$stmt = $conn->prepare("SELECT * FROM applications WHERE id = ?");
$stmt->bind_param("i", $job_id);
$stmt->execute();
$result = $stmt->get_result();

// Check if the application exists
if ($result->num_rows > 0) {
    $application = $result->fetch_assoc();
} else {
    // Handle the case where no application is found
    die("No application found with the provided ID.");
}

$stmt->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Job Application Status</title>
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
                <a href="beranda.php" class="text-white font-medium hover:text-yellow-300 transition">Cari Lowongan</a>
                <a href="template.html" class="text-white font-medium hover:text-yellow-300 transition">Template CV</a>
            </nav>
        </div>
    </header>

    <div class="flex flex-col min-h-screen">
        <!-- Main Content -->
        <div class="container mx-auto bg-white p-8 rounded-lg">
            <a href="lamaransaya.php" class="text-blue-500 text-sm mb-4 inline-block">
                ← Kembali ke Lamaran
            </a>
            <div class="flex justify-between items-start">
                <div class="flex items-start">
                    <img alt="Company logo" class="w-12 h-12 rounded-full mr-4" src="../asset/img/kredivo.jpg" />
                    <div>
                        <h2 class="text-xl font-semibold">
                            <?php echo htmlspecialchars($application['position'] ?? 'Position not available'); ?>
                            (<?php echo htmlspecialchars($application['location'] ?? 'Location not available'); ?>)</h2>
                        <p class="text-blue-500">
                            <a class="hover:underline"
                                href="#"><?php echo htmlspecialchars($application['company'] ?? 'Company not available'); ?></a>
                            •
                            <span class="text-gray-500">Bisa kerja remote</span>
                        </p>
                        <button class="mt-2 px-4 py-2 bg-blue-100 text-blue-500 rounded-full">Chat Dimulai</button>
                    </div>
                </div>
                <div class="text-sm">
                    <h3 class="font-semibold mb-2">Rincian Pekerjaan</h3>
                    <p class="mb-1"><i class="fas fa-money-bill-wave"></i> IDR
                        <?php echo htmlspecialchars($application['salary'] ?? 'N/A'); ?>/Bulan</p>
                    <p class="text-gray-500 mb-1">Bonus IDR
                        <?php echo htmlspecialchars($application['bonus'] ?? 'N/A'); ?></p>
                    <p class="mb-1"><i class="fas fa-briefcase"></i> <a class="text-blue-500 hover:underline"
                            href="#"><?php echo htmlspecialchars($application['field'] ?? 'N/A'); ?></a></p>
                    <p class="mb-1"><i class="fas fa-file-contract"></i>
                        <?php echo htmlspecialchars($application['contract'] ?? 'N/A'); ?></p>
                    <p class="mb-1"><i class="fas fa-graduation-cap"></i> Minimal
                        <?php echo htmlspecialchars($application['education'] ?? 'N/A'); ?></p>
                    <p class="mb-1"><i class="fas fa-briefcase"></i> Pengalaman
                        <?php echo htmlspecialchars($application['experience'] ?? 'N/A'); ?></p>
                    <a class="text-blue-500 hover:underline" href="#">Lihat detail pekerjaan</a>
                </div>
            </div>
            <div class="mt-6">
                <h3 class="font-semibold mb-2">Tracking Status Lamaran</h3>
                <p class="text-sm text-gray-500">
                <p class="text-sm text-gray-500">
                    <i class="fas fa-calendar-alt"></i>
                    <?php
                    // Check if 'submitted_at' key exists in the array
                    if (isset($application['submitted_at'])) {
                        echo date('d M Y H:i', strtotime($application['submitted_at']));
                    } else {
                        echo "Tanggal pengiriman tidak tersedia"; // Default message if 'submitted_at' is not available
                    }
                    ?> • HRD sudah menerima lamaranmu
                </p>

            </div>
        </div>
        <!-- Footer -->
        <footer class="bg-gradient-to-r from-blue-500 via-blue-400 to-blue-600 text-white py-6 mt-auto">
            <div class="container mx-auto text-center">
                <p>&copy; 2024 WORKIFY. All Rights Reserved.</p>
            </div>
        </footer>
    </div>
</body>

</html>

<?php
// Close the database connection
mysqli_close($conn);
?>