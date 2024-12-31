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

// Query to fetch data
$query = "SELECT id, title, company, job_type, created_at FROM jobs";
$result = mysqli_query($conn, $query);

if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Lamaran Saya</title>
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

    <main class="bg-gray-100 flex flex-col min-h-screen">
        <div class="container mx-auto p-4 flex-grow">
            <div class="flex">
                <!-- Sidebar -->
                <div class="w-1/4 pr-4 border-r border-gray-300">
                    <h2 class="text-2xl font-bold mb-4">Lamaran Saya</h2>
                    <ul class="space-y-6">
                        <li>
                            <a class="text-blue-600 font-semibold block py-2 hover:bg-blue-100 rounded"
                                href="#">SEMUA</a>
                        </li>
                        <li>
                            <a class="text-gray-600 block py-2 hover:bg-gray-100 rounded" href="#">DILAMAR / CHAT
                                DIMULAI</a>
                        </li>
                        <li>
                            <a class="text-gray-600 block py-2 hover:bg-gray-100 rounded" href="#">DALAM REVIEW / SEDANG
                                KOMUNIKASI</a>
                        </li>
                        <li>
                            <a class="text-gray-600 block py-2 hover:bg-gray-100 rounded" href="#">WAWANCARA</a>
                        </li>
                        <li>
                            <a class="text-gray-600 block py-2 hover:bg-gray-100 rounded" href="#">DIREKRUT</a>
                        </li>
                        <li>
                            <a class="text-gray-600 block py-2 hover:bg-gray-100 rounded" href="#">TIDAK SESUAI / BELUM
                                SESUAI</a>
                        </li>
                    </ul>
                </div>
                <!-- Main Content -->
                <div class="w-3/4 pl-8">
                    <h2 class="text-xl font-bold mb-4">Lamaran Saya</h2>
                    <?php if (mysqli_num_rows($result) > 0): ?>
                        <?php while ($row = mysqli_fetch_assoc($result)): ?>
                            <div class="bg-white p-4 rounded-lg shadow mb-4">
                                <div class="flex items-center">
                                    <img alt="Company Logo" class="w-12 h-12 rounded-full mr-4" src="../asset/img/kredivo.jpg" />
                                    <div>
                                        <a href="lamaran.php?id=<?php echo $row['id']; ?>">
                                            <h3 class="text-lg font-semibold"><?php echo htmlspecialchars($row['title']); ?> 
                                                (<?php echo htmlspecialchars($row['job_type']); ?>)
                                            </h3>
                                            <p class="text-gray-600"><?php echo htmlspecialchars($row['company']); ?></p>
                                            <p class="text-gray-600 flex items-center">
                                                <i class="far fa-calendar-alt mr-2"></i>
                                                Dikirim pada <?php echo date('F j, Y, g:i a', strtotime($row['created_at'])); ?>
                                            </p>
                                        </a>
                                    </div>
                                    <div class="ml-auto">
                                        <!-- Assuming 'status' field exists, otherwise remove this part -->
                                        <button class="bg-blue-100 text-blue-600 px-4 py-2 rounded-full">
                                            <?php echo htmlspecialchars($row['status'] ?? 'No Status'); ?>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <p class="text-gray-600">Belum ada lamaran yang diajukan.</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </main>

    <footer class="bg-gradient-to-r from-blue-500 via-blue-400 to-blue-600 text-white py-6">
        <div class="container mx-auto text-center">
            <p>&copy; 2024 WORKIFY. All Rights Reserved.</p>
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

<?php
// Close the database connection
mysqli_close($conn);
?>
