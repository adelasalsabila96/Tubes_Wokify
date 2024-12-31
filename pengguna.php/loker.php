<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "workify_baru";

// Create connection
$conn = mysqli_connect($host, $user, $pass, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Fetch job listings from the database
$sql = "SELECT * FROM jobs";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Job Listing</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
</head>

<header class="bg-gradient-to-r from-blue-500 via-blue-400 to-blue-600 shadow-lg">
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
            <a href="zoom.html" class="text-white font-medium hover:text-yellow-300 transition">Zoom</a>
        </nav>
    </div>
</header>

<body>
    <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-4">
        <?php if (mysqli_num_rows($result) > 0): ?>
            <?php while ($row = mysqli_fetch_assoc($result)): ?>
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <div class="flex items-start">
                        <img alt="Company logo" class="w-12 h-12 rounded-full mr-4"
                            src="https://storage.googleapis.com/a1aa/image/TkfhkyQHwTxIdau3IIahDSEmqBCqtFcAm6heBcApN8zCjL6TA.jpg" />
                        <div>
                            <h1 class="text-xl font-bold"><?php echo htmlspecialchars($row['title']); ?></h1>
                            <p class="text-sm text-gray-600"><?php echo htmlspecialchars($row['company']); ?></p>
                            <p class="text-sm text-gray-600 mt-1">
                                Bonus IDR. 1.000.000 - 10.000.000
                                <br />
                                <span class="font-bold"><?php echo htmlspecialchars($row['salary']); ?></span>
                            </p>
                            <p class="text-sm text-gray-600 mt-1">
                                <i class="fas fa-briefcase"></i> <?php echo htmlspecialchars($row['experience']); ?>
                                <br />
                                <i class="fas fa-home"></i> <?php echo htmlspecialchars($row['job_type']); ?>
                                <br />
                                <i class="fas fa-graduation-cap"></i> <?php echo htmlspecialchars($row['education']); ?>
                            </p>
                            <div class="flex items-center mt-2">
                                <span class="bg-green-500 text-white text-xs font-bold px-2 py-1 rounded">AKTIF MEMBUKA</span>
                            </div>
                            <p class="text-xs text-gray-500 mt-1">Tayang Kemarin - Diperbarui Kemarin</p>
                            <div class="flex mt-4">
                                <a href="inputloker.php">
                                    <button class="bg-blue-500 text-white px-4 py-2 rounded mr-2">LAMAR CEPAT</button>
                                </a> <button class="bg-gray-200 text-gray-700 px-4 py-2 rounded">BAGIKAN</button>
                            </div>
                        </div>
                    </div>

                    <hr class="my-6" />

                    <div ```php <div>
                        <h2 class="text-lg font-bold">Persyaratan</h2>
                        <div class="flex flex-wrap mt-2">
                            <span class="bg-gray-200 text-gray-700 text-xs font-bold px-2 py-1 rounded mr-2 mb-2">Full
                                Time</span>
                            <span class="bg-gray-200 text-gray-700 text-xs font-bold px-2 py-1 rounded mr-2 mb-2">Pengalaman
                                kurang dari 1 tahun</span>
                            <span class="bg-gray-200 text-gray-700 text-xs font-bold px-2 py-1 rounded mr-2 mb-2">Minimal
                                SMA/SMK</span>
                            <span class="bg-gray-200 text-gray-700 text-xs font-bold px-2 py-1 rounded mr-2 mb-2">20-40
                                tahun</span>
                            <span class="bg-gray-200 text-gray-700 text-xs font-bold px-2 py-1 rounded mb-2">Lokasi saja</span>
                        </div>
                    </div>

                    <div class="mt-6">
                        <h2 class="text-lg font-bold">Skills</h2>
                        <div class="flex flex-wrap mt-2">
                            <span class="bg-gray-200 text-gray-700 text-xs font-bold px-2 py-1 rounded mr-2 mb-2">Coba ketat
                                minimal - 1 dari 3 dimiliki</span>
                            <span
                                class="bg-gray-200 text-gray-700 text-xs font-bold px-2 py-1 rounded mr-2 mb-2">Teamwork</span>
                            <span class="bg-gray-200 text-gray-700 text-xs font-bold px-2 py-1 rounded mb-2">Strong
                                Communication Skills</span>
                        </div>
                    </div>

                    <div class="mt-6">
                        <h2 class="text-lg font-bold">Loker ini dikelola oleh</h2>
                        <div class="flex items-center mt-2">
                            <img alt="Recruiter logo" class="w-8 h-8 rounded-full mr-2"
                                src="https://storage.googleapis.com/a1aa/image/iD8csYKFZaZzBlImkNzl0yVNF4LILZroO7mlUfA8PRrhxF9JA.jpg" />
                            <div>
                                <p class="text-sm font-bold">Kredivo Group Recruiter</p>
                                <p class="text-xs text-gray-500">Online 2 jam yang lalu</p>
                            </div>
                        </div>
                    </div>

                    <div class="mt-6">
                        <h2 class="text-lg font-bold">Deskripsi pekerjaan <?php echo htmlspecialchars($row['title']); ?>
                            <?php echo htmlspecialchars($row['company']); ?></h2>
                        <p class="text-sm text-gray-700 mt-2">
                            Persyaratan:
                            <br />
                            - Usia 18 - 40 tahun
                            <br />
                            - Dibuktikan memiliki pengalaman minimal 2 tahun sebagai collector/collector
                            <br />
                            - Memiliki kendaraan roda dua dan SIM C yang masih berlaku...
                        </p>
                    </div>

                    <div class="mt-6 bg-white bg-opacity-50 p-4 rounded-lg border border-gray-300 shadow-md">
                        <h2 class="text-lg font-bold">Tentang Perusahaan</h2>
                        <div class="flex items-start mt-2">
                            <img alt="Company logo" class="w-12 h-12 rounded-full mr-4"
                                src="https://storage.googleapis.com/a1aa/image/TkfhkyQHwTxIdau3IIahDSEmqBCqtFcAm6heBcApN8zCjL6TA.jpg" />
                            <div>
                                <p class="text-sm font-bold"><?php echo htmlspecialchars($row['company']); ?></p>
                                <p class="text-xs text-gray-500">Financial Services · 1001 - 5000 karyawan</p>
                            </div>
                        </div>
                        <p class="text-sm text-gray-700 mt-2">
                            Kredivo is the leading digital credit platform in Indonesia and Vietnam that gives
                            customers instant credit financing for ecommerce and offline purchases, and personal loans,
                            based on real-time decisioning. Kredivo users can buy now and pay later with the lowest
                            interest rate among all digital credit providers in the country. Kredivo is operated by
                            FinAccel, a financial technology company backed by leading investors such as Square Peg
                            Capital, MDI Ventures, and Jungle Ventures.
                        </p>
                        ```php
                        <div class="mt-6">
                            <h2 class="text-lg font-bold">Alamat kantor</h2>
                            <p class="text-sm text-gray-700 mt-2">
                                Jl. Laksda Adisucipto Kav. 52-53, RT.7/RW.7, Rawamangun,
                                Pulo Gadung, Kota Jakarta Timur, Daerah Khusus Ibukota Jakarta 13220
                            </p>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <p class="text-center text-gray-600">No job listings available.</p>
        <?php endif; ?>
    </div>

    <!-- Footer Section -->
    <footer class="bg-gradient-to-r from-blue-500 via-blue-400 to-blue-600 text-white py-6 mt-auto">
        <div class="container mx-auto text-center">
            <p>&copy; 2024 WORKIFY. All Rights Reserved.</p>
            <div class="mt-2">
                <a href="privacy.html" class="text-white hover:text-yellow-300 mx-2">Privacy Policy</a>
                <a href="terms.html" class="text-white hover:text-yellow-300 mx-2">Terms of Service</a>
                <a href="contact.html" class="text-white hover:text-yellow-300 mx-2">Contact Us</a>
            </div>
        </div>
    </footer>

    <script>
        // JavaScript for dropdowns and other interactive elements can be added here
    </script>

</body>

</html>

<?php
// Close the database connection
mysqli_close($conn);
?>