<?php session_start(); ?>
<?php 
    include '../koneksi.php';

    // SATUAN
    if(isset($_GET['satuan'])){
        $querySatuan = "SELECT * FROM tb_satuan;";
        $sqlSatuan = mysqli_query($conn,$querySatuan);
    }
    // KATEGORI
    elseif(isset($_GET['kategori'])){
        $queryKategori = "SELECT * FROM tb_kategori;";
        $sqlKategori = mysqli_query($conn,$queryKategori);
    }
    // METODE PEMBAYARAN
    elseif(isset($_GET['metode_pembayaran'])){
        $queryMP = "SELECT * FROM tb_metode_pembayaran;";
        $sqlMP = mysqli_query($conn,$queryMP);
    }
    // OPSI PEMBAYARAN
    elseif(isset($_GET['opsi_pembayaran'])){
        $queryOpsiPembayaran = "SELECT * FROM tb_opsi_pembayaran;";
        $sqlOpsiPembayaran = mysqli_query($conn,$queryOpsiPembayaran);
    }
    elseif(isset($_GET['tags_transaksi'])){
        $query = "SELECT * FROM tb_tags_transaksi;";
        $sql = mysqli_query($conn,$query);
    }

    

    $nomor = 0;
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
<body class="font-secondary overflow-x-hidden">
    <?php if($_SESSION['id_user'] == '3'): ?>
    <!-- Navbar mobile Start -->
    <nav class="bg-primary w-full md:hidden flex justify-between px-4 py-3 fixed top-0 z-10">
        <a href="../admin.php" class="font-primary text-xl text-white font-bold">Dashboard</a>
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
                        <form action="../pages/proses.php" method="post" class="flex justify-center">
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
                             <a href="../pages/penjualan.html"  class="flex items-center gap-3 w-full hover:bg-primary rounded-lg p-2">
                                <i class="fa-solid fa-money-bill-trend-up"></i>
                                <h4 class="font-semibold">Penjualan</h4>
                            </a>
                             <a href="../pages/pembelian.html"  class="flex items-center gap-3 w-full hover:bg-primary rounded-lg p-2">
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
                             <a href="../pages/pengaturan.php"  class="flex items-center gap-3 w-full hover:bg-primary rounded-lg p-2">
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
                    <div class="mt-14 sm:mt-16 md:mt-5 w-full max-w-[1200px] mx-auto min-h-[calc(100vh-4rem)] bg-gray-200/60 rounded-lg p-4">
                      <!-- HALAMAN SATUAN START -->
                       <?php 
                        if(isset($_GET['satuan'])){
                       ?>
                        <div class="flex flex-wrap gap-2 justify-between">
                        <a href="./kelola_action.php?satuan_action" class="text-white font-semibold text-[12px] bg-primary rounded-lg flex gap-1 w-full sm:w-[120px] items-center py-3 px-2"><i class="fa-solid fa-plus"></i>Tambah Data</a>
                        <!-- Search Input -->
                        <div class="w-full h-9 sm:w-48 flex items-center gap-2 border border-primary pl-1 rounded-md">
                            <i class="fa-solid fa-magnifying-glass text-primary"></i>
                            <input type="text" placeholder="Cari" class="search-input w-full h-full text-sm focus:outline-none bg-transparent">
                        </div>  
                      </div>

                      <div class="overflow-x-auto mt-4 rounded-lg shadow-[0_3px_4px_rgb(0,0,0,0.3)]">
                        <table class="w-full">
                            <thead class="text-[12px] font-normal bg-primary text-white">
                                <tr>
                                    <th class="p-2">NO</th>
                                    <th class="p-2">NAME</th>
                                    <th class="p-2">ACTION</th>
                                </tr>
                            </thead>
                            <tbody class="text-[12px] text-center">
                                <?php 
                                    while($resultSatuan = mysqli_fetch_assoc($sqlSatuan)){
                                ?>
                                <tr class="produk-item hover:bg-gray-300/55">
                                    <td class="p-2"><?php echo ++$nomor; ?></td>
                                    <td class="p-2"><h3><?php echo $resultSatuan['nama_satuan']; ?></h3></td>
                                    <td class="p-2 flex justify-center gap-2">
                                        <a href="./kelola_action.php?satuan_action=ubah_satuan&&ubah_satuan=<?php echo $resultSatuan['id_satuan']; ?>" class="bg-primary hover:bg-transparent hover:ring-1 hover:ring-primary rounded-lg flex items-center justify-center w-9 h-9 group transition-all duration-100"><i class="fa-solid fa-pen-to-square text-white group-hover:text-primary text-base"></i></a>
                                        <a href="#" data-href="../pages/proses.php?hapus_satuan=<?php echo $resultSatuan['id_satuan']; ?>" class="del-btn bg-red-600 hover:bg-transparent hover:ring-1 hover:ring-red-600 rounded-lg flex items-center justify-center w-9 h-9 group transition-all duration-100"><i class="fa-solid fa-trash text-white group-hover:text-red-600 text-base"></i></a>
                                    </td>
                                </tr>
                                <?php
                                 } 
                                ?>
                              
                            </tbody>
                        </table>
                      </div>
                      <!-- KONTEN HALAMAN SATUAN END -->

                      <!-- KONTEN HALAMAN KATEGORI START -->
                      <?php 
                        } elseif (isset($_GET['kategori'])) {
                      ?>
                        <div class="flex flex-wrap gap-2 justify-between">
                        <a href="./kelola_action.php?kategori_action" class="text-white font-semibold text-[12px] bg-primary rounded-lg flex gap-1 w-full sm:w-[120px] items-center py-3 px-2"><i class="fa-solid fa-plus"></i>Tambah Data</a>
                        <!-- Search Input -->
                        <div class="w-full h-9 sm:w-48 flex items-center gap-2 border border-primary pl-1 rounded-md">
                            <i class="fa-solid fa-magnifying-glass text-primary"></i>
                            <input type="text" placeholder="Cari" class="search-input w-full h-full text-sm focus:outline-none bg-transparent">
                        </div>  
                      </div>

                      <div class="overflow-x-auto mt-4 rounded-lg shadow-[0_3px_4px_rgb(0,0,0,0.3)]">
                        <table class="w-full">
                            <thead class="text-[12px] font-normal bg-primary text-white">
                                <tr>
                                    <th class="p-2">NO</th>
                                    <th class="p-2">NAME</th>
                                    <th class="p-2">ACTION</th>
                                </tr>
                            </thead>
                            <tbody class="text-[12px] text-center">
                                <?php 
                                    while($resultKategori = mysqli_fetch_assoc($sqlKategori)){
                                ?>
                                <tr class="hover:bg-gray-300/55 produk-item">
                                    <td class="p-2"><?php echo ++$nomor; ?></td>
                                    <td class="p-2"><h3><?php echo $resultKategori['nama_kategori']; ?></h3></td>
                                    <td class="p-2 flex justify-center gap-2">
                                        <a href="./kelola_action.php?kategori_action=ubah_kategori&&ubah_kategori=<?php echo $resultKategori['id_kategori']; ?>" class="bg-primary hover:bg-transparent hover:ring-1 hover:ring-primary rounded-lg flex items-center justify-center w-9 h-9 group transition-all duration-100"><i class="fa-solid fa-pen-to-square text-white group-hover:text-primary text-base"></i></a>
                                        <a href="#" data-href="../pages/proses.php?hapus_kategori=<?php echo $resultKategori['id_kategori']; ?>" class="del-btn bg-red-600 hover:bg-transparent hover:ring-1 hover:ring-red-600 rounded-lg flex items-center justify-center w-9 h-9 group transition-all duration-100"><i class="fa-solid fa-trash text-white group-hover:text-red-600 text-base"></i></a>
                                    </td>
                                </tr>
                                <?php
                                 } 
                                ?>
                               
                             
                              
                            </tbody>
                        </table>
                      </div>
                      <!-- KONTEN HALAMAN KATEGORI END -->

                       <!-- KONTEN HALAMAN METODE PEMBAYARAN START -->
                      <?php } elseif(isset($_GET['metode_pembayaran'])){
                        ?>
                        <div class="flex flex-wrap gap-2 justify-between">
                        <a href="./kelola_action.php?metode_pembayaran_action" class="text-white font-semibold text-[12px] bg-primary rounded-lg flex gap-1 w-full sm:w-[120px] items-center py-3 px-2"><i class="fa-solid fa-plus"></i>Tambah Data</a>
                        <!-- Search Input -->
                        <div class="w-full h-9 sm:w-48 flex items-center gap-2 border border-primary pl-1 rounded-md">
                            <i class="fa-solid fa-magnifying-glass text-primary"></i>
                            <input type="text" placeholder="Cari" class="search-input w-full h-full text-sm focus:outline-none bg-transparent">
                        </div>  
                      </div>

                      <div class="overflow-x-auto mt-4 rounded-lg shadow-[0_3px_4px_rgb(0,0,0,0.3)]">
                        <table class="w-full">
                            <thead class="text-[12px] font-normal bg-primary text-white">
                                <tr>
                                    <th class="p-2">NO</th>
                                    <th class="p-2">METODE PEMBAYARAN</th>
                                    <th class="p-2">ACTION</th>
                                </tr>
                            </thead>
                            <tbody class="text-[12px] text-center">
                                <?php
                                    while($resultMP = mysqli_fetch_assoc($sqlMP)){
                                 ?>
                                <tr class="hover:bg-gray-300/55 produk-item">
                                    <td class="p-2"><?php echo ++$nomor; ?></td>
                                    <td class="p-2"><h3><?php echo $resultMP['metode_pembayaran']; ?></h3></td>
                                    <td class="p-2 flex justify-center gap-2">
                                        <a href="./kelola_action.php?metode_pembayaran_action=ubah_MP&&ubah_MP=<?php echo $resultMP['id_metode_pembayaran']; ?>" class="bg-primary hover:bg-transparent hover:ring-1 hover:ring-primary rounded-lg flex items-center justify-center w-9 h-9 group transition-all duration-100"><i class="fa-solid fa-pen-to-square text-white group-hover:text-primary text-base"></i></a>
                                        <a href="#" data-href="../pages/proses.php?hapus_MP=<?php echo $resultMP['id_metode_pembayaran']; ?>" class="del-btn bg-red-600 hover:bg-transparent hover:ring-1 hover:ring-red-600 rounded-lg flex items-center justify-center w-9 h-9 group transition-all duration-100"><i class="fa-solid fa-trash text-white group-hover:text-red-600 text-base"></i></a>
                                    </td>
                                </tr>
                               <?php } ?>
                               
                             
                              
                            </tbody>
                        </table>
                      </div>
                        <!-- KONTEN HALAMAN METODE PEMBAYARAN END -->

                        <!-- KONTEN HALAMAN OPSI PEMBAYARAN START -->
                      <?php } elseif(isset($_GET['opsi_pembayaran'])){
                        ?>
                        <div class="flex flex-wrap gap-2 justify-between">
                        <a href="./kelola_action.php?opsi_pembayaran_action" class="text-white font-semibold text-[12px] bg-primary rounded-lg flex gap-1 w-full sm:w-[120px] items-center py-3 px-2"><i class="fa-solid fa-plus"></i>Tambah Data</a>
                        <!-- Search Input -->
                        <div class="w-full h-9 sm:w-48 flex items-center gap-2 border border-primary pl-1 rounded-md">
                            <i class="fa-solid fa-magnifying-glass text-primary"></i>
                            <input type="text" placeholder="Cari" class="search-input w-full h-full text-sm focus:outline-none bg-transparent">
                        </div>  
                      </div>

                      <div class="overflow-x-auto mt-4 rounded-lg shadow-[0_3px_4px_rgb(0,0,0,0.3)]">
                        <table class="w-full">
                            <thead class="text-[12px] font-normal bg-primary text-white">
                                <tr>
                                    <th class="p-2">NO</th>
                                    <th class="p-2">TEMPO PEMBAYARAN</th>
                                    <th class="p-2">LAMA WAKTU</th>
                                    <th class="p-2">ACTION</th>
                                </tr>
                            </thead>
                            <tbody class="text-[12px] text-center">
                                <?php
                                    while($resultOpsiPembayaran = mysqli_fetch_assoc($sqlOpsiPembayaran)){
                                ?>
                                <tr class="hover:bg-gray-300/55 produk-item">
                                    <td class="p-2"><?php echo ++$nomor; ?></td>
                                    <td class="p-2"><h3><?php echo $resultOpsiPembayaran['tempo_pembayaran']; ?></h3></td>
                                    <td class="p-2"><?php echo $resultOpsiPembayaran['lama_waktu']; ?> Hari</td>
                                    <td class="p-2 flex justify-center gap-2">
                                        <a href="./kelola_action.php?opsi_pembayaran_action=ubah_OP&&ubah_OP=<?php echo  $resultOpsiPembayaran['id_opsi_pembayaran'];?>" class="bg-primary hover:bg-transparent hover:ring-1 hover:ring-primary rounded-lg flex items-center justify-center w-9 h-9 group transition-all duration-100"><i class="fa-solid fa-pen-to-square text-white group-hover:text-primary text-base"></i></a>
                                        <a href="#" data-href="../pages/proses.php?hapus_opsi_pembayaran=<?php echo $resultOpsiPembayaran['id_opsi_pembayaran']; ?>" class="del-btn bg-red-600 hover:bg-transparent hover:ring-1 hover:ring-red-600 rounded-lg flex items-center justify-center w-9 h-9 group transition-all duration-100"><i class="fa-solid fa-trash text-white group-hover:text-red-600 text-base"></i></a>
                                    </td>
                                </tr>
                                <?php 
                                } 
                                ?>
                            </tbody>
                        </table>
                      </div>
                        <!-- KONTEN HALAMAN OPSI PEMBAYARAN END -->

                        <!-- KONTEN HALAMAN TAGS TRANSAKSI START -->
                      <?php } elseif(isset($_GET['tags_transaksi'])){
                        ?>
                        <div class="flex flex-wrap gap-2 justify-between">
                        <a href="./kelola_action.php?tags_transaksi_action" class="text-white font-semibold text-[12px] bg-primary rounded-lg flex gap-1 w-full sm:w-[120px] items-center py-3 px-2"><i class="fa-solid fa-plus"></i>Tambah Data</a>
                        <!-- Search Input -->
                        <div class="w-full h-9 sm:w-48 flex items-center gap-2 border border-primary pl-1 rounded-md">
                            <i class="fa-solid fa-magnifying-glass text-primary"></i>
                            <input type="text" placeholder="Cari" class="search-input w-full h-full text-sm focus:outline-none bg-transparent">
                        </div>  
                      </div>

                      <div class="overflow-x-auto mt-4 rounded-lg shadow-[0_3px_4px_rgb(0,0,0,0.3)]">
                        <table class="w-full">
                            <thead class="text-[12px] font-normal bg-primary text-white">
                                <tr>
                                    <th class="p-2">NO</th>
                                    <th class="p-2">TAGS TRANSAKSI</th>
                                    <th class="p-2">ACTION</th>
                                </tr>
                            </thead>
                            <tbody class="text-[12px] text-center">
                                <?php
                                    while($result = mysqli_fetch_assoc($sql)){
                                ?>
                                    <tr class="hover:bg-gray-300/55 produk-item">
                                        <td class="p-2"><?php echo ++$nomor; ?></td>
                                        <td class="p-2"><h3><?php echo $result['tags_transaksi'] ?></h3></td>
                                        <td class="p-2 flex justify-center gap-2">
                                            <a href="./kelola_action.php?tags_transaksi_action=ubah_tags&&ubah_tags=<?php echo $result['id_tags_transaksi']; ?>" class="bg-primary hover:bg-transparent hover:ring-1 hover:ring-primary rounded-lg flex items-center justify-center w-9 h-9 group transition-all duration-100"><i class="fa-solid fa-pen-to-square text-white group-hover:text-primary text-base"></i></a>
                                            <a href="#" data-href="../pages/proses.php?hapus_tags=<?php echo $result['id_tags_transaksi']; ?>" class="del-btn bg-red-600 hover:bg-transparent hover:ring-1 hover:ring-red-600 rounded-lg flex items-center justify-center w-9 h-9 group transition-all duration-100"><i class="fa-solid fa-trash text-white group-hover:text-red-600 text-base"></i></a>
                                        </td>
                                    </tr>
                                <?php 
                                    } 
                                ?>
                                        
                             
                              
                            </tbody>
                        </table>
                      </div>
                     <?php } ?>
                        <!-- KONTEN HALAMAN TAGS TRANSAKSI END -->
                    </div>
                </div>
            </div>
        </section>
    </main>
    <?php endif; ?>
    <!-- Script CDN Flowbite -->
     <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
    <script src="../js/search.js"></script>
    <script>
        function imagePopup(imageName){
        const imgName = imageName;
        const imgUrl = `${window.location.origin}/crud_php/assets/img/${imgName}`;
        return imgUrl;
     }
        //POP UP TOMBOL HAPUS
        addEventListener('click', function(e){
            const btn = e.target.closest('.del-btn');
            if (!btn) return;

            const url = btn.dataset.href;
            
            Swal.fire({
                title: "Yakin Mau Hapus?",
                imageUrl: imagePopup('tokai-teio-2.gif'),
                imageWidth: 150,
                text: "Data ini akan dihapus permanen!",
                showCancelButton: true,
                confirmButtonColor: "#9333ea",
                cancelButtonColor: "#E53935",
                confirmButtonText: "Ya, hapus!",
                cancelButtonText: "Batal",
                iconColor: "#FB8C00"
            }).then((result) => {
                if(result.isConfirmed){
                    Swal.fire({
                        title: "Yay, terhapus!",
                        text: "Data berhasil dihapus permanen",
                        imageUrl: imagePopup('agnes-tachyon-2.gif'),
                        imageWidth: 200,
                        showConfirmButton: true,
                        confirmButtonText: "Cihuyy",
                        confirmButtonColor: "#9333ea"
                    }).then((result) => {
                        if(result.isConfirmed){
                            window.location.href = url;
                        }
                    });
                }
            });
        })

    </script>
    <?php if((int)$_SESSION['id_user'] !== 3): ?>
    <script>
        window.location.href = '../pages/login.php';
    </script>
    <?php unset($_SESSION['id_user']);endif; ?>
</body>
</html>