<?php
    session_start();
    include '../koneksi.php';
?>

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
    <!-- Navbar mobile Start -->
        <?php include '../components/navbar.php';?>
    <!--Navbar Mobile End-->

    <!-- Main content-->
    <main class="bg-[url('../assets/img/bg-dashboard.png')] bg-cover min-h-screen">
        <section class="flex flex-col min-h-screen">
            <div class="flex flex-1">
                <!-- Sidebar Start -->
                 <?php include '../components/sidebar.php';?>
                <!--Sidebar End-->

                <!-- Konten utama Start-->
                <div class="w-full md:ml-16 px-4 sm:px-6 py-2 sm:py-4">
                    <!-- Container utama  -->
                    <div class="mt-16 md:mt-0 w-full max-w-[1200px] mx-auto min-h-[calc(100vh-4rem)] flex flex-col bg-gray-100/50 rounded-lg p-5">
                        <div class=" flex gap-1">
                            <i class="fa-solid fa-address-book text-2xl text-primary mt-2"></i>
                            <h1 class="text-3xl font-bold text-primary mb-4">Kontak</h1>
                        </div>
                        <div class="w-full h-1 mb-4 bg-primary"></div>
                        <!-- list card start -->
                         <div class="grid grid-cols-1 sm:grid-cols-3 gap-5">
                            <!-- card 1 -->
                             <div class="flex gap-4 bg-gray-100/60 p-4 rounded-lg border-r border-b-2 border-gray-400 hover:-translate-y-1 hover:-translate-x-1 transition-all duration-150">
                                <div class="bg-green-600 flex items-center justify-center text-white w-12 h-12 rounded-sm">
                                    <i class="fa-solid fa-users"></i>
                                </div>
                                <div class="text-gray-800/70">
                                    <h1>Jumlah Kontak</h1>
                                    <h3 class="text-xl">2</h3>
                                </div>
                            </div>
                            <!-- card 2 -->
                             <div class="flex gap-4 bg-gray-100/60 p-4 rounded-lg border-r border-b-2 border-gray-400 hover:-translate-y-1 hover:-translate-x-1 transition-all duration-150">
                                <div class="bg-yellow-400 flex items-center justify-center text-white w-12 h-12 rounded-sm">
                                    <i class="fa-solid fa-user"></i>
                                </div>
                                <div class="text-gray-800/70">
                                    <h1>Kontak Active</h1>
                                    <h3 class="text-xl">2</h3>
                                </div>
                             </div>
                             <!-- card 3 -->
                             <div class="flex gap-4 bg-gray-100/60 p-4 rounded-lg border-r border-b-2 border-gray-400 hover:-translate-y-1 hover:-translate-x-1 transition-all duration-150">
                                <div class="bg-red-500 flex items-center justify-center text-white w-12 h-12 rounded-sm">
                                    <i class="fa-solid fa-user-xmark"></i>
                                </div>
                                <div class="text-gray-800/70">
                                    <h1>Kontak Non Active</h1>
                                    <h3 class="text-xl">0</h3>
                                </div>
                             </div>
                         </div>
                        <!-- list card end -->
                        <!-- tabel start -->
                         <!-- Tabel section-->
                        <div class="bg-gray-100/50 rounded-lg p-4 sm:p-6 mt-4 sm:mt-6 border-b-2 border-r border-purple-500 flex flex-col">
                            <div class="w-full mb-3 sm:mb-5 flex flex-col sm:flex-row gap-2 sm:gap-0 sm:justify-between">
                                <!-- Tombol Tambah Data-->
                                <a href="#" class="p-2 sm:p-3 bg-primary text-white rounded-lg text-xs font-semibold flex items-center justify-center sm:w-auto">
                                    <i class="fa-solid fa-square-plus mr-1"></i>
                                    Tambah Data
                                </a>
                                
                                <!-- Search bar yang responsif -->
                                <div class="flex w-full sm:w-64">
                                    <div class="flex w-full rounded-lg bg-transparent border border-primary gap-2 px-2">
                                        <svg viewBox="0 0 24 24" class="w-4 sm:w-5 text-primary" fill="none">
                                            <path d="M15.7955 15.8111L21 21M18 10.5C18 14.6421 14.6421 18 10.5 18C6.35786 18 3 14.6421 3 10.5C3 6.35786 6.35786 3 10.5 3C14.6421 3 18 6.35786 18 10.5Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                        <input type="text" class="w-full bg-transparent py-2 text-xs sm:text-sm focus:outline-none" placeholder="Cari Karyawan">
                                    </div>
                                </div>
                            </div>

                            <!-- Filter form -->
                            <form class="flex flex-col sm:flex-row gap-2 sm:gap-3 text-gray-900/75 mb-3 sm:mb-5">
                                <!-- Filter jabatan -->
                                <select class="bg-transparent border border-gray-500 w-full sm:w-28 p-2 text-xs rounded-lg focus:border-primary">
                                    <option value="">ALL Data..</option>
                                    <option value="">corporate</option>
                                    <option value="">goverment</option>
                                    <option value="">karyawan</option>
                                    <option value="">suplier</option>
                                    <option value="">mitra</option>
                                    <option value="">tefa</option>
                                    <option value="">lainnya</option>
                                </select>
                                <!-- Filter status -->
                                <select class="bg-transparent border border-gray-500 w-full sm:w-28 p-2 text-xs rounded-lg focus:border-primary">
                                    <option value="">ALL Status</option>
                                    <option value="">Active</option>
                                    <option value="">Non Active</option>
                                </select>
                                
                            </form>

                            <!-- Tabel Data Start -->
                            <div class="overflow-x-auto -mx-4 sm:mx-0">
                                <div class="min-w-[640px] px-4 py-2">
                                    <table class="w-full">
                                        <thead class="text-left">
                                            <tr>
                                                <th class="px-2 py-2 text-[11px] sm:text-xs font-medium">NO</th>
                                                <th class="px-2 py-2 text-[11px] sm:text-xs font-medium">CODE</th>
                                                <th class="px-2 py-2 text-[11px] sm:text-xs font-medium">NAME</th>
                                                <th class="px-2 py-2 text-[11px] sm:text-xs font-medium">PIC</th>
                                                <th class="px-2 py-2 text-[11px] sm:text-xs font-medium">PHONE</th>
                                                <th class="px-2 py-2 text-[11px] sm:text-xs font-medium">EMAIL</th>
                                                <th class="px-2 py-2 text-[11px] sm:text-xs font-medium">TYPE</th>
                                                <th class="px-2 py-2 text-[11px] sm:text-xs font-medium">STATUS</th>
                                                <th class="px-2 py-2 text-[11px] sm:text-xs font-medium">PIUTANG</th>
                                                <th class="px-2 py-2 text-[11px] sm:text-xs font-medium">HUTANG</th>
                                            </tr>
                                        </thead>
                                        <tbody class="divide-y divide-gray-200">
                                            <tr class="hover:bg-gray-100/60">
                                                <td class="px-2 py-2 text-[11px] sm:text-xs">1</td>
                                                <td class="px-2 py-2 text-[11px] sm:text-xs">test</td>
                                                <td class="px-2 py-2 text-[11px] sm:text-xs">test</td>
                                                <td class="px-2 py-2 text-[11px] sm:text-xs">test</td>
                                                <td class="px-2 py-2 text-[11px] sm:text-xs">test</td>
                                                <td class="px-2 py-2 text-[11px] sm:text-xs">test</td>
                                                <td class="px-2 py-2 text-[11px] sm:text-xs">test</td>
                                                <td class="px-2 py-2 text-[11px] sm:text-xs">test</td>
                                                <td class="px-2 py-2 text-[11px] sm:text-xs">test</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!--  tabel data End -->
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- Script CDN Flowbite -->
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
</body>
</html>