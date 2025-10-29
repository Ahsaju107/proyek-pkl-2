<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta tag untuk responsivitas -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../css/output.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Flowbite untuk komponen UI -->
    <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />
</head>
<body class="font-secondary overflow-x-hidden">
    <?php if($_SESSION['id_user'] == '3'): ?>
    <!-- Navbar mobile Start -->
    <nav class="bg-primary w-full md:hidden flex justify-between px-4 py-3 fixed top-0 z-10">
        <h1 class="font-primary text-xl text-white font-bold">Dashboard</h1>
        <!-- Tombol untuk membuka sidebar -->
        <button data-drawer-target="default-sidebar" data-drawer-toggle="default-sidebar" aria-controls="default-sidebar" type="button">
            <i class="fa-solid fa-bars-staggered text-white"></i>
        </button>
    </nav>
    <!--Navbar Mobile End-->

    <!-- Main content-->
    <main class="bg-[url('../assets/img/bg-dashboard.png')] bg-cover min-h-screen">
        <section class="flex flex-col min-h-screen">
            <div class="flex flex-1">
                <div class="bg-primary/70 w-16 md:h-screen md:translate-x-0 -translate-x-full fixed top-0 left-0 bottom-0 py-5">
                    <!-- Tombol untuk membuka sidebar -->
                     <div class="flex flex-col justify-between h-full ">
                       <button data-drawer-target="default-sidebar" data-drawer-toggle="default-sidebar" aria-controls="default-sidebar" type="button">
                            <i class="fa-solid fa-dashboard text-white text-2xl"></i>
                        </button>
                        <form action="./proses.php" method="post" class="flex justify-center">
                            <button type="submit" name="keluar"><i class="fa-solid fa-right-from-bracket text-white text-2xl"></i></butt>
                        </form>
                     </div>
                </div>
                             <!-- Sidebar Start -->
                 <aside id="default-sidebar" aria-label="Sidebar"
                    class="bg-purple-700 w-64 md:h-screen fixed bottom-0 top-0 left-0 z-40  overflow-y-auto transition-transform -translate-x-full text-white">
                    <div class="bg-primary w-full h-48 flex flex-col gap-3 justify-center items-center">
                        <div class="rounded-full bg-purple-900 w-20 overflow-hidden">
                            <img src="../assets/img/icon.png" alt="" class="w-20">
                        </div>
                        <h1 class="text-xl font-semibold font-primary"><?php echo $_SESSION['session_username']; ?></h1>
                    </div>
                    <!-- Konten Utama Sidebar -->
                    <div class="konten-sidebar">

                        <!-- Konten Group 1 -->
                        <div class="p-4">
                            <h3 class="font-primary text-white/55">Group 1</h3>
                             <a href="#"  class="flex items-center gap-3 w-full hover:bg-primary rounded-lg p-2">
                                <i class="fa-solid fa-file"></i>
                                <h4 class="font-semibold">Laporan</h4>
                            </a>
                           
                        </div>
                        <!-- Konten Group 2 -->
                        <div class="p-4">
                            <h3 class="font-primary text-white/55">Group 2</h3>
                             <a href="penjualan.html"  class="flex items-center gap-3 w-full hover:bg-primary rounded-lg p-2">
                                <i class="fa-solid fa-money-bill-trend-up"></i>
                                <h4 class="font-semibold">Penjualan</h4>
                            </a>
                             <a href="#"  class="flex items-center gap-3 w-full hover:bg-primary rounded-lg p-2">
                                <i class="fa-solid fa-money-bill-transfer"></i>
                                <h4 class="font-semibold">Pembelian</h4>
                            </a>
                             <a href="#"  class="flex items-center gap-3 w-full hover:bg-primary rounded-lg p-2">
                                <i class="fa-solid fa-money-bill-wave"></i>
                                <h4 class="font-semibold">Biaya</h4>
                            </a>
                        </div>
                        <!-- Konten Group 3 -->
                        <div class="p-4">
                            <h3 class="font-primary text-white/55">Group 3</h3>
                             <a href="#"  class="flex items-center gap-3 w-full hover:bg-primary rounded-lg p-2">
                                <i class="fa-solid fa-address-book"></i>
                                <h4 class="font-semibold">Kontak</h4>
                            </a>
                             <a href="../admin.php"  class="flex items-center gap-3 w-full hover:bg-primary rounded-lg p-2">
                                <i class="fa-solid fa-truck"></i>
                                <h4 class="font-semibold">Produk</h4>
                            </a>
                        </div>
                        <!-- Konten Group 4 -->
                        <div class="p-4">
                            <h3 class="font-primary text-white/55">Group 4</h3>
                             <a href="#"  class="flex items-center gap-3 w-full hover:bg-primary rounded-lg p-2">
                                <i class="fa-solid fa-book"></i>
                                <h4 class="font-semibold">Akun [COA]</h4>
                            </a>
                             <a href="#"  class="flex items-center gap-3 w-full hover:bg-primary rounded-lg p-2">
                                <i class="fa-solid fa-book"></i>
                                <h4 class="font-semibold">Akun [kategori]</h4>
                            </a>
                        </div>
                        <!-- Konten Group 5-->
                        <div class="p-4">
                            <h3 class="font-primary text-white/55">Group 5</h3>
                             <a href="pengaturan.php"  class="flex items-center gap-3 w-full hover:bg-primary rounded-lg p-2">
                                <i class="fa-solid fa-bars"></i>
                                <h4 class="font-semibold">Pengaturan</h4>
                            </a>
                        </div>

                    </div>
                </aside> 
                
                <!--Sidebar End-->

                <!-- Konten utama Start-->
                <div class="w-full md:ml-16 px-4 sm:px-6 py-2 sm:py-4">
                    <!-- Container utama  -->
                    <div class="mt-14 sm:mt-16 md:mt-5 w-full max-w-[1200px] mx-auto min-h-[calc(100vh-4rem)] flex flex-col">
                        <!-- Item 1 -->
                        <div class="flex items-center bg-gray-100/50 py-3 px-8 rounded-sm gap-6 mb-2 text-primary hover:bg-gray-300/40">
                            <i class="fa-solid fa-signs-post text-slate-600"></i>
                            <div>
                                <a href="../views/kelola_1.php?satuan" class="font-primary hover:text-purple-800">Satuan</a>
                                <p class="text-gray-800/50 text-[12px]  ">Menu ini digunakan untuk menambahkan satuan barang/waktu/service dan lain-lain</p>
                            </div>
                        </div>
                        <!-- Item 2 -->
                        <div class="flex items-center bg-gray-100/50 py-3 px-8 rounded-sm gap-6 mb-2 text-primary hover:bg-gray-300/40">
                            <i class="fa-solid fa-list-alt text-slate-600"></i>
                            <div>
                                <a href="../views/kelola_1.php?kategori" class="font-primary hover:text-purple-800">Kategori</a>
                                <p class="text-gray-800/50 text-[12px]  ">Menu ini digunakan untuk menambahkan kategori untuk product</p>
                            </div>
                        </div>
                        <!-- Item 3 -->
                        <div class="flex items-center bg-gray-100/50 py-3 px-8 rounded-sm gap-6 mb-2 text-primary hover:bg-gray-300/40">
                            <i class="fa-solid fa-calculator text-slate-600"></i>
                            <div>
                                <a href="../views/kelola_1.php?metode_pembayaran" class="font-primary hover:text-purple-800">Metode Pembayaran</a>
                                <p class="text-gray-800/50 text-[12px]  ">Menu ini digunakan untuk menambahkan methode pembayaran yang digunakan</p>
                            </div>
                        </div>
                        <!-- Item 4 -->
                        <div class="flex items-center bg-gray-100/50 py-3 px-8 rounded-sm gap-6 mb-2 text-primary hover:bg-gray-300/40">
                            <i class="fa-solid fa-clock text-slate-600"></i>
                            <div>
                                <a href="../views/kelola_1.php?opsi_pembayaran" class="font-primary hover:text-purple-800">Opsi Pembayaran</a>
                                <p class="text-gray-800/50 text-[12px]  ">Menu ini digunakan untuk menyeting berapa lama waktu tempo yang akan di terapkan</p>
                            </div>
                        </div>
                        <!-- Item 5 -->
                        <div class="flex items-center bg-gray-100/50 py-3 px-8 rounded-sm gap-6 mb-2 text-primary hover:bg-gray-300/40">
                            <i class="fa-solid fa-tags text-slate-600"></i>
                            <div>
                                <a href="../views/kelola_1.php?tags_transaksi" class="font-primary hover:text-purple-800">Tags Transaksi</a>
                                <p class="text-gray-800/50 text-[12px] ">Menu ini digunakan untuk menandakan / mengkategorikan transaksi</p>
                            </div>
                        </div>
                        <!-- Item 6 -->
                        <div class="flex items-center bg-gray-100/50 py-3 px-8 rounded-sm gap-6 mb-2 text-primary hover:bg-gray-300/40">
                            <i class="fa-solid fa-key text-slate-600"></i>
                            <div>
                                <a href="../views/kelola_action.php?setpajak" class="font-primary hover:text-purple-800">Setting Pajak</a>
                                <p class="text-gray-800/50 text-[12px]  ">Menu ini digunakan untuk menyeting nilai pajak</p>
                            </div>
                        </div>
                      
                    </div>
                </div>
            </div>
        </section>
    </main>
        <?php endif; ?>
    <!-- Script CDN Flowbite -->
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
    <?php if((int)$_SESSION['id_user'] !== 3): ?>
    <script>
        window.location.href = '../pages/login.php';
    </script>
    <?php unset($_SESSION['id_user']);endif; ?>
    
</body>
</html>