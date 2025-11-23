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
<body class="selection:text-white selection:bg-primary font-secondary overflow-x-hidden">
    <?php if($_SESSION['id_user'] == '3'): ?>
    <!-- Navbar mobile Start -->
    <?php include '../components/navbar.php';?>
    <!--Navbar Mobile End-->

    <!-- Main content-->
    <main class="bg-[url('../assets/img/bg-dashboard.png')] bg-cover min-h-screen">
        <section class="flex flex-col min-h-screen">
            <div class="flex flex-1">

                <!-- Sidebar start -->
                <?php include '../components/sidebar.php'; ?>
                <!--Sidebar End-->

                <!-- Konten utama Start-->
                <div class="w-full md:ml-16 px-4 sm:px-6 py-2 sm:py-4">
                    <!-- Container utama  -->
                    <div class="mt-14 sm:mt-16 md:mt-5 w-full max-w-[1200px] mx-auto min-h-[calc(100vh-4rem)] flex flex-col">
                        <!-- Item 1 -->
                        <div class="flex items-center bg-gray-100/50 py-3 hover:-translate-y-1 transition-all px-8 rounded-sm gap-6 mb-2 text-primary hover:bg-gray-300/40">
                            <i class="fa-solid fa-file text-slate-600"></i>
                            <div>
                                <a href="#" class="font-primary hover:text-purple-800">Jurnal</a>
                                <p class="text-gray-800/50 text-[12px]  ">Daftar semua jurnal per transaksi yang terjadi dalam periode waktu. Hal ini berguna untuk melacak di mana transaksi Anda masuk ke masing-masing rekening.</p>
                            </div>
                        </div>
                        <!-- Item 2 -->
                        <div class="flex items-center hover:-translate-y-1 transition-all bg-gray-100/50 py-3 px-8 rounded-sm gap-6 mb-2 text-primary hover:bg-gray-300/40">
                            <i class="fa-solid fa-file text-slate-600"></i>
                            <div>
                                <a href="kelola_1.php?kategori" class="font-primary hover:text-purple-800">Buku Besar</a>
                                <p class="text-gray-800/50 text-[12px]  ">Laporan ini menampilkan semua transaksi yang telah dilakukan untuk suatu periode menampilkan daftar kronologis untuk semua transaksi yang telah dilakukan oleh perusahaan Anda.</p>
                            </div>
                        </div>
                        <!-- Item 3 -->
                        <div class="flex items-center hover:-translate-y-1 transition-all bg-gray-100/50 py-3 px-8 rounded-sm gap-6 mb-2 text-primary hover:bg-gray-300/40">
                            <i class="fa-solid fa-file text-slate-600"></i>
                            <div>
                                <a href="kelola_1.php?metode_pembayaran" class="font-primary hover:text-purple-800">Laba-Rugi</a>
                                <p class="text-gray-800/50 text-[12px]  ">Menampilkan setiap tipe transaksi dan jumlah total untuk pendapatan dan pengeluaran anda.</p>
                            </div>
                        </div>
                        <!-- Item 4 -->
                        <div class="flex items-center hover:-translate-y-1 transition-all bg-gray-100/50 py-3 px-8 rounded-sm gap-6 mb-2 text-primary hover:bg-gray-300/40">
                            <i class="fa-solid fa-file text-slate-600"></i>
                            <div>
                                <a href="kelola_1.php?opsi_pembayaran" class="font-primary hover:text-purple-800">Neraca</a>
                                <p class="text-gray-800/50 text-[12px]  ">Menampilan apa yang anda miliki (aset), apa yang anda hutang (liabilitas), dan apa yang anda sudah investasikan pada perusahaan anda (ekuitas).</p>
                            </div>
                        </div>
                        <!-- Item 5 -->
                        <div class="flex items-center hover:-translate-y-1 transition-all bg-gray-100/50 py-3 px-8 rounded-sm gap-6 mb-2 text-primary hover:bg-gray-300/40">
                            <i class="fa-solid fa-file text-slate-600"></i>
                            <div>
                                <a href="kelola_1.php?tags_transaksi" class="font-primary hover:text-purple-800">Piutang</a>
                                <p class="text-gray-800/50 text-[12px] ">Menu ini menampilkan list transaksi piutang yang masih belum terbayarkan</p>
                            </div>
                        </div>
                        <!-- Item 6 -->
                        <div class="flex items-center hover:-translate-y-1 transition-all bg-gray-100/50 py-3 px-8 rounded-sm gap-6 mb-2 text-primary hover:bg-gray-300/40">
                            <i class="fa-solid fa-file text-slate-600"></i>
                            <div>
                                <a href="kelola_action.php?setpajak" class="font-primary hover:text-purple-800">Hutang</a>
                                <p class="text-gray-800/50 text-[12px]  ">Menu ini menampilkan list transaksi hutang yang masih belum terbayarkan</p>
                            </div>
                        </div>
                        <!-- Item 7 -->
                        <div class="flex items-center hover:-translate-y-1 transition-all bg-gray-100/50 py-3 px-8 rounded-sm gap-6 mb-2 text-primary hover:bg-gray-300/40">
                            <i class="fa-solid fa-file text-slate-600"></i>
                            <div>
                                <a href="kelola_action.php?setpajak" class="font-primary hover:text-purple-800">Trial Balance</a>
                                <p class="text-gray-800/50 text-[12px]  ">Menu ini menampilkan pergerakan nominal transaksi berdasarkan tanggal transaksi</p>
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