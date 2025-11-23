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
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <style>
        /* Hover item pada dropdown Select2 */
        .select2-results__option--highlighted {
            background-color: #9333ea !important;
            color: white !important;
        }

        /* List option saat dipilih */
        .select2-results__option[aria-selected="true"] {
            background-color: #c084fc !important;
            color: white !important;
        }
        .select2-search__field:focus{
            outline: 2px solid #9333ea !important;
        }
        .select2-selection {
            background-color: transparent !important;
            width:100% !important;
            height: 100% !important;
            border: 1px solid #9333ea !important;
            backdrop-filter: blur(4px) !important;
        }
        
</style>
</head>
<body class="font-secondary selection:bg-primary selection:text-white overflow-x-hidden">
    <?php if($_SESSION['id_user'] == '3'): ?>
        
    <!-- Navbar mobile Start -->
    <?php include '../components/navbar.php';?>
    <!--Navbar Mobile End-->

    <!-- Main content-->
    <main class="bg-[url('../assets/img/bg-dashboard.png')] bg-cover min-h-screen">
        <section class="flex flex-col min-h-screen">
            <div class="flex flex-1">

                <!-- sidebar start -->
                <?php include '../components/sidebar.php';?>
                <!-- sidebar end -->

                <!-- Konten utama Start-->
                <div class="w-full md:ml-16 px-4 sm:px-6 py-2 sm:py-4">
                    <!-- Container utama  -->
                    <div class="mt-14 sm:mt-16 md:mt-5 w-full max-w-[1200px] mx-auto min-h-[calc(100vh-4rem)] bg-gray-200/60 rounded-lg p-4">
                      <!-- HALAMAN SATUAN START -->
                       <?php 
                        if(isset($_GET['satuan'])){
                       ?>
                        <div class="flex gap-1">
                            <i class="fa-solid fa-signs-post text-primary mt-2 text-2xl"></i>
                            <h1 class="text-3xl font-bold text-primary mb-4">Satuan</h1>
                        </div>
                        <div class="w-full h-1 mb-4 bg-primary"></div>
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
                      <div class="flex gap-1">
                            <i class="fa-solid fa-list-alt text-primary mt-2 text-2xl"></i>
                            <h1 class="text-3xl font-bold text-primary mb-4">Kategori</h1>
                        </div>
                        <div class="w-full h-1 mb-4 bg-primary"></div>
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
                        <div class="flex gap-1">
                            <i class="fa-solid fa-calculator text-primary text-2xl mt-2"></i>
                            <h1 class="text-3xl font-bold text-primary mb-4">Metode Pembayaran</h1>
                        </div>
                        <div class="w-full h-1 mb-4 bg-primary"></div>
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
                        <div class="flex gap-1 ">
                            <i class="fa-solid fa-clock text-primary text-2xl mt-2"></i>
                            <h1 class="text-3xl font-bold text-primary mb-4">Opsi Pembayaran</h1>
                        </div>
                        <div class="w-full h-1 mb-4 bg-primary"></div>
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
                        <div class="flex gap-1 items-center">
                            <i class="fa-solid fa-tags text-primary text-2xl"></i>
                            <h1 class="text-3xl font-bold text-primary mb-4">Tags</h1>
                        </div>
                        <div class="w-full h-1 mb-4 bg-primary"></div>
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
                      <!-- KONTEN HALAMAN TAGS TRANSAKSI END -->
                     <?php }elseif(isset($_GET['buat_penjualan'])){ ?>
                        <div class="flex gap-2 w-full text-primary items-center text-3xl font-bold mb-3">
                            <i class="fa-solid fa-plus"></i>
                            <h1>Buat Transaksi Penjualan</h1>
                        </div>
                        <div class="bg-primary h-1 w-full"></div>
                        <div class="h-5 w-5 bg-red-500 sm:bg-green-400 md:bg-blue-500 lg:bg-primary"></div>
                        <form action="" class="w-full p-4">
                            <!-- grid list form -->
                            <div class="flex w-full flex-wrap gap-3">
                                <!-- grid 1 -->
                                <div class="w-full flex flex-wrap gap-4">
                                    <!-- grid 1 item 1 -->
                                    <div class="w-full lg:w-64 flex flex-wrap">
                                        <label for="" class="font-semibold text-gray-800/70 w-full">Pelanggan</label>
                                        <select name="pelanggan" id="pelanggan" class="w-full">
                                            <option value="">Pilih...</option>
                                            <option value="">ID00000000012#</option>
                                            <option value="">ID00000000012#629997757</option>
                                        </select>
                                    </div>
                                    <!-- grid 1 item 2 -->
                                    <div class="w-full lg:w-40">
                                        <label for="" class="font-semibold text-gray-800/70">Email</label>
                                        <input type="email" name="" id="" class="w-full p-1 rounded border border-primary bg-transparent backdrop-blur-sm focus:outline-none text-sm">
                                    </div>
                                    <!-- grid 1 item 3 -->
                                    <div class="w-full lg:w-40">
                                        <label for="" class="font-semibold text-gray-800/70">Akun Piutang</label>
                                        <input type="text" name="" id="" class="w-full p-1 rounded border border-primary bg-transparent backdrop-blur-sm focus:outline-none text-sm">
                                    </div>
                                    <!-- grid 1 item 4 -->
                                    <div class="w-full lg:w-40">
                                        <label for="" class="font-semibold text-gray-800/70">Akun Pendapatan</label>
                                        <input type="text" name="" id="" class="w-full p-1 rounded border border-primary bg-transparent backdrop-blur-sm focus:outline-none text-sm">
                                    </div>
                                    <!-- grid 1 item 5 -->
                                    <div class="w-full lg:w-40 md:ml-auto">
                                        <label for="" class="font-semibold text-gray-800/70">No Transaksi</label>
                                        <input type="text" class="w-full p-1 rounded border border-primary bg-transparent backdrop-blur-sm focus:outline-none text-sm">
                                    </div>
                                </div>
                                <!-- grid 1 end -->
                                <!-- grid 2 start -->
                                <div class="w-full flex flex-wrap gap-4">
                                    <!-- grid 2 item 1 -->
                                    <div class="flex flex-wrap w-full lg:w-64">
                                        <label for="" class="font-semibold text-gray-800/70">Alamat</label>
                                        <textarea name="" id="" class="w-full h-32 p-2 text-xs focus:outline-none focus:ring-2 focus:ring-primary/50 border border-primary backdrop-blur-sm rounded bg-transparent"></textarea>
                                    </div>
                                    <!-- grid 2 item 2 -->
                                    <div class="w-full lg:w-40">
                                        <label for="" class="font-semibold text-gray-800/70">Syarat Bayar</label>
                                        <select name="" id="" class="w-full p-1 rounded border border-primary bg-transparent backdrop-blur-sm focus:outline-none text-sm">
                                            <option value="">Custom</option>
                                            <option value="">Net Payment 3 Hari</option>
                                            <option value="">Net Payment 7 Hari</option>
                                            <option value="">Net Payment 14 Hari</option>
                                        </select>
                                    </div>
                                    <!-- grid 2 item 3 -->
                                    <div class="w-full gap-3 flex flex-wrap lg:w-40">
                                        <!-- Tanggal Transaksi -->
                                        <div class="w-full">
                                            <label for="" class="font-semibold text-gray-800/70">Tanggal Transaksi</label>
                                            <input type="date" name="" id="" class="w-full p-1 rounded border border-primary bg-transparent backdrop-blur-sm focus:outline-none text-sm">
                                        </div>
                                        <!-- Jatuh Tempo -->
                                        <div class="w-full">
                                            <label for="" class="font-semibold text-gray-800/70">Jatuh Tempo</label>
                                            <input type="date" name="" id="" class="w-full p-1 rounded border border-primary bg-transparent backdrop-blur-sm focus:outline-none text-sm">
                                        </div>
                                    </div>
                                    <!-- grid 2 item 4 -->
                                     <div class="w-full lg:w-40 ml-auto">
                                        <label for="" class="font-semibold text-gray-800/70">Tags</label>
                                        <select name="" id="" class="w-full p-1 rounded border border-primary bg-transparent backdrop-blur-sm focus:outline-none text-sm">
                                            <option value="">Pilih..</option>
                                            <option value="">Makan</option>
                                            <option value="">Minum</option>
                                            <option value="">Atk</option>
                                            <option value="">Kebersihan</option>
                                        </select>
                                     </div>
                                </div>
                                <!-- grid 2 end -->
                            </div>
                            <!-- button tambah data -->
                            <button type="submit" class="flex items-center justify-center text-xs bg-primary py-2 rounded w-32 text-white hover:text-primary hover:ring-1 hover:ring-primary hover:bg-transparent mt-4"><i class="fa-solid fa-plus"></i>Tambah Data</button>
                        </form>
                        <form class="w-full overflow-x-auto text-xs text-gray-800/70">
                            <table class="w-full table-fixed border-separate border-spacing-y-2">
                                <thead class="text-left">
                                    <th class="p-2 w-52">PRODUCT</th>
                                    <th class="p-2 w-52">DESKRIPSI</th>
                                    <th class="p-2 w-16">QTY</th>
                                    <th class="p-2 w-[100px]">SATUAN</th>
                                    <th class="p-2 w-40">HARGA</th>
                                    <th class="p-2 w-24">PAJAK</th>
                                    <th class="p-2 w-40">JUMLAH</th>
                                    <th class="p-2 w-14 text-center">#</th>
                                </thead>
                                <tbody class="bg-white/50">
                                    <tr class="hover:bg-slate-300/50 mb-4">
                                        <td class="p-2">
                                            <select name="" class="w-full select-product">
                                                <option value="">Pilih...</option>
                                                <option value="">Nasi Goreng</option>
                                                <option value="">Ayam Bakar</option>
                                            </select>
                                        </td>
                                        <td class="p-2">
                                            <input type="text" class="w-full p-2 focus:outline-none border border-primary rounded h-8 bg-transparent backdrop-blur-sm">
                                        </td>
                                        <td class="p-2">
                                            <input type="text" name="" id="" class="w-full text-center bg-transparent backdrop-blur-sm border border-primary rounded h-8 focus:outline-none p-1">
                                        </td>
                                        <td class="p-2">
                                            <input type="text" name="" id="" class="w-full bg-slate-100 backdrop-blur-sm border border-primary rounded h-8 focus:outline-none p-1">
                                        </td>
                                        <td class="p-2">
                                            <input type="text" name="" id="" class="w-full bg-transparent backdrop-blur-sm border border-primary rounded h-8 focus:outline-none p-1">
                                        </td>
                                        <td class="p-2">
                                            <select name="" id="" class="w-full bg-transparent backdrop-blur-sm border border-primary rounded h-8 focus:outline-none p-1">
                                                <option value="">Pilih ...</option>
                                                <option value="">PPN</option>
                                            </select>
                                        </td>
                                        <td class="p-2">
                                            <input type="text" name="" id="" class="w-full bg-transparent backdrop-blur-sm border border-primary rounded h-8 focus:outline-none p-1">
                                        </td>
                                        <td class="p-2">
                                            <button class="bg-red-500 text-white rounded flex items-center justify-center h-8 w-8 mx-auto hover:bg-primary"><i class="fa-solid fa-circle-minus font-bold"></i></button>
                                        </td>
                                    </tr>
                                    <tr class="hover:bg-slate-300/50 mb-4">
                                        <td class="p-2">
                                            <select name="" class="w-full select-product">
                                                <option value="">Pilih...</option>
                                                <option value="">Nasi Goreng</option>
                                                <option value="">Ayam Bakar</option>
                                            </select>
                                        </td>
                                        <td class="p-2">
                                            <input type="text" class="w-full p-2 focus:outline-none border border-primary rounded h-8 bg-transparent backdrop-blur-sm">
                                        </td>
                                        <td class="p-2">
                                            <input type="text" name="" id="" class="w-full bg-transparent backdrop-blur-sm border border-primary rounded h-8 focus:outline-none p-1">
                                        </td>
                                        <td class="p-2">
                                            <input type="text" name="" id="" class="w-full bg-slate-100 backdrop-blur-sm border border-primary rounded h-8 focus:outline-none p-1">
                                        </td>
                                        <td class="p-2">
                                            <input type="text" name="" id="" class="w-full bg-transparent backdrop-blur-sm border border-primary rounded h-8 focus:outline-none p-1">
                                        </td>
                                        <td class="p-2">
                                            <select name="" id="" class="w-full bg-transparent backdrop-blur-sm border border-primary rounded h-8 focus:outline-none p-1">
                                                <option value="">Pilih ...</option>
                                                <option value="">PPN</option>
                                            </select>
                                        </td>
                                        <td class="p-2">
                                            <input type="text" name="" id="" class="w-full bg-transparent backdrop-blur-sm border border-primary rounded h-8 focus:outline-none p-1">
                                        </td>
                                        <td class="p-2">
                                            <button class="bg-red-500 text-white rounded flex items-center justify-center h-8 w-8 mx-auto hover:bg-primary"><i class="fa-solid fa-circle-minus font-bold"></i></button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </form>
                        <form action="" class="grid grid-cols-1 lg:grid-cols-2 gap-5 mt-4 w-full">
                            <!-- konten 1 -->
                            <div class="flex flex-wrap gap-2 w-full ">
                                <!-- Note -->
                                <div class="w-full lg:w-64">
                                    <div class="w-full flex flex-wrap gap-2">
                                        <label for="" class="text-xs font-semibold text-gray-800/70">Note</label>
                                        <textarea name="" id="" class="w-full text-xs p-3 bg-transparent border border-primary rounded backdrop-blur-sm h-48 focus:outline-none focus:ring-2 focus:ring-primary/50"></textarea>
                                    </div>
                                </div>
                                <div class="w-full lg:w-64">
                                    <!-- Lampiran -->
                                    <div class="w-full flex flex-wrap gap-2">
                                        <p class="text-xs font-semibold text-gray-800/70">Lampiran</p>
                                        <label id="drop-area" for="input-file" class="relative overflow-hidden w-full h-48 border border-primary rounded text-primary backdrop-blur-lg hover:bg-primary hover:text-white duration-100 transition-all text-sm flex flex-col gap-3 items-center justify-center">
                                            <input type="file" name="" id="input-file" accept="image/*" hidden>
                                              <img id="img-view"
                                                src=""
                                                class="absolute inset-0 w-full h-full object-contain hidden">
                                                
                                            <div id="overlay" class="absolute inset-0 gap-3 flex flex-col justify-center items-center">
                                                <i class="fa-solid fa-upload text-4xl"></i>
                                                <span>
                                                    Drag and drop a file here or click
                                                </span>
                                            </div>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <!-- konten 2 -->
                            <div class="w-full lg:pl-8">
                                <!-- Sub-Total -->
                                 <div class="w-full flex justify-between mb-4">
                                    <label for="" class="font-semibold text-gray-800/70 text-sm">Sub-Total</label>
                                    <input type="text" class="w-60 text-xs p-3 h-8 border border-primary rounded bg-transparent backdrop-blur-sm focus:ring-2 focus:ring-primary/50 focus:outline-none">
                                 </div>
                                <!-- PPN -->
                                 <div class="w-full flex justify-between mb-4">
                                    <label for="" class="font-semibold text-gray-800/70 text-sm">PPN</label>
                                    <input type="text" class="w-60 text-xs p-3 h-8 border border-primary rounded bg-transparent backdrop-blur-sm focus:ring-2 focus:ring-primary/50 focus:outline-none">
                                 </div>
                                <!-- Total -->
                                 <div class="w-full flex justify-between mb-4">
                                    <label for="" class="font-semibold text-gray-800/70 text-sm">Total</label>
                                    <input type="text" class="w-60 text-xs p-3 h-8 border border-primary rounded bg-transparent backdrop-blur-sm focus:ring-2 focus:ring-primary/50 focus:outline-none">
                                 </div>
                                 <!-- Potongan -->
                                 <div class="w-full flex justify-between mb-4">
                                     <label for="" class="font-semibold text-gray-800/70 text-sm">Potongan</label>
                                     <a href="#" class="text-primary text-xs hover:text-blue-500"><i class="fa-solid fa-rotate text-xs"></i>with ppn</a>
                                    <select id="select-potongan" class="w-60 text-xs p-3 h-8 border border-primary rounded bg-transparent backdrop-blur-sm focus:ring-2 focus:ring-primary/50 focus:outline-none">
                                        <option>Pilih...</option>
                                        <option>Kas MidTrans</option>
                                    </select>
                                 </div>
                                 <!-- i don't know? -->
                                <div class="w-full flex justify-between mb-4">
                                    <div class="flex gap-2 lg:gap-3">
                                        <input type="text" class="w-20 md:w-24 h-8 p-3 text-xs rounded bg-transparent border border-primary backdrop-blur-sm focus:outline-none focus:ring-2 focus:ring-primary/50" />
                                        <button type="button" class="h-8 w-10 text-xs rounded bg-primary text-white hover:bg-purple-700 focus:ring-2 focus:ring-primary/50">Rp</button>
                                        <button type="button" class="h-8 w-10 text-xs rounded bg-primary text-white hover:bg-purple-700 focus:ring-2 focus:ring-primary/50">%</button>
                                    </div>
                                    <input type="text" name="" id="" class="w-60 p-3 h-8 rounded bg-transparent border border-primary focus:outline-none text-xs focus:ring-2 focus:ring-primary/50 backdrop-blur-sm" />
                                </div>
                                <!-- Grand-Total -->
                                <div class="w-full flex justify-between mb-4">
                                    <label for="" class="font-semibold text-gray-800/70 text-sm">Grand-Total</label>
                                    <input type="text" class="w-60 text-xs p-3 h-8 border border-primary rounded bg-transparent backdrop-blur-sm focus:ring-2 focus:ring-primary/50 focus:outline-none">
                                </div>
                                <!-- submit button simpan data -->
                                 <div class="w-full flex mb-4 justify-end gap-2 items-center">
                                    <a href="./penjualan.php" class="text-xs text-primary hover:text-blue-500">Kembali</a>
                                    <button type="submit" class="flex items-center justify-center w-32 h-8 bg-primary rounded text-xs text-white hover:bg-transparent border border-primary hover:text-primary"><i class="fa-solid fa-plus"></i>Simpan Data</button>
                                 </div>
                            </div>
                        </form>
                      <!-- KONTEN HALAMAN TAGS TRANSAKSI PEMBELIAN END -->
                     <?php }elseif(isset($_GET['buat_pembelian'])){ ?>
                        <div class="flex gap-2 w-full text-primary items-center text-3xl font-bold mb-3">
                            <i class="fa-solid fa-plus"></i>
                            <h1>Buat Transaksi Pembelian</h1>
                        </div>
                        <div class="bg-primary h-1 w-full"></div>
                        <div class="h-5 w-5 bg-red-500 sm:bg-green-400 md:bg-blue-500 lg:bg-primary"></div>
                        <form action="" class="w-full p-4">
                            <!-- grid list form -->
                            <div class="flex w-full flex-wrap gap-3">
                                <!-- grid 1 -->
                                <div class="w-full flex flex-wrap gap-4">
                                    <!-- grid 1 item 1 -->
                                    <div class="w-full lg:w-64 flex flex-wrap">
                                        <label for="" class="font-semibold text-gray-800/70 w-full">Suplier</label>
                                        <select name="pelanggan" id="pelanggan" class="w-full">
                                            <option value="">Pilih...</option>
                                            <option value="">ID00000000012#</option>
                                            <option value="">ID00000000012#629997757</option>
                                        </select>
                                    </div>
                                    <!-- grid 1 item 2 -->
                                    <div class="w-full lg:w-40">
                                        <label for="" class="font-semibold text-gray-800/70">Email</label>
                                        <input type="email" name="" id="" class="w-full p-1 rounded border border-primary bg-transparent backdrop-blur-sm focus:outline-none text-sm">
                                    </div>
                                    <!-- grid 1 item 3 -->
                                    <div class="w-full lg:w-40">
                                        <label for="" class="font-semibold text-gray-800/70">Akun Piutang</label>
                                        <input type="text" name="" id="" class="w-full p-1 rounded border border-primary bg-transparent backdrop-blur-sm focus:outline-none text-sm">
                                    </div>
                                    <!-- grid 1 item 4 -->
                                    <div class="w-full lg:w-40">
                                        <label for="" class="font-semibold text-gray-800/70">Akun Pendapatan</label>
                                        <input type="text" name="" id="" class="w-full p-1 rounded border border-primary bg-transparent backdrop-blur-sm focus:outline-none text-sm">
                                    </div>
                                    <!-- grid 1 item 5 -->
                                    <div class="w-full lg:w-40 md:ml-auto">
                                        <label for="" class="font-semibold text-gray-800/70">No Transaksi</label>
                                        <input type="text" class="w-full p-1 rounded border border-primary bg-transparent backdrop-blur-sm focus:outline-none text-sm">
                                    </div>
                                </div>
                                <!-- grid 1 end -->
                                <!-- grid 2 start -->
                                <div class="w-full flex flex-wrap gap-4">
                                    <!-- grid 2 item 1 -->
                                    <div class="flex flex-wrap w-full lg:w-64">
                                        <label for="" class="font-semibold text-gray-800/70">Alamat</label>
                                        <textarea name="" id="" class="w-full h-32 p-2 text-xs focus:outline-none focus:ring-2 focus:ring-primary/50 border border-primary backdrop-blur-sm rounded bg-transparent"></textarea>
                                    </div>
                                    <!-- grid 2 item 2 -->
                                    <div class="w-full lg:w-40">
                                        <label for="" class="font-semibold text-gray-800/70">Syarat Bayar</label>
                                        <select name="" id="" class="w-full p-1 rounded border border-primary bg-transparent backdrop-blur-sm focus:outline-none text-sm">
                                            <option value="">Custom</option>
                                            <option value="">Net Payment 3 Hari</option>
                                            <option value="">Net Payment 7 Hari</option>
                                            <option value="">Net Payment 14 Hari</option>
                                        </select>
                                    </div>
                                    <!-- grid 2 item 3 -->
                                    <div class="w-full gap-3 flex flex-wrap lg:w-40">
                                        <!-- Tanggal Transaksi -->
                                        <div class="w-full">
                                            <label for="" class="font-semibold text-gray-800/70">Tanggal Transaksi</label>
                                            <input type="date" name="" id="" class="w-full p-1 rounded border border-primary bg-transparent backdrop-blur-sm focus:outline-none text-sm">
                                        </div>
                                        <!-- Jatuh Tempo -->
                                        <div class="w-full">
                                            <label for="" class="font-semibold text-gray-800/70">Jatuh Tempo</label>
                                            <input type="date" name="" id="" class="w-full p-1 rounded border border-primary bg-transparent backdrop-blur-sm focus:outline-none text-sm">
                                        </div>
                                    </div>
                                    <!-- grid 2 item 4 -->
                                     <div class="w-full lg:w-40 ml-auto">
                                        <label for="" class="font-semibold text-gray-800/70">Tags</label>
                                        <select name="" id="" class="w-full p-1 rounded border border-primary bg-transparent backdrop-blur-sm focus:outline-none text-sm">
                                            <option value="">Pilih..</option>
                                            <option value="">Makan</option>
                                            <option value="">Minum</option>
                                            <option value="">Atk</option>
                                            <option value="">Kebersihan</option>
                                        </select>
                                     </div>
                                </div>
                                <!-- grid 2 end -->
                            </div>
                            <!-- button tambah data -->
                            <button type="submit" class="flex items-center justify-center text-xs bg-primary py-2 rounded w-32 text-white hover:text-primary hover:ring-1 hover:ring-primary hover:bg-transparent mt-4"><i class="fa-solid fa-plus"></i>Tambah Data</button>
                        </form>
                        <form class="w-full overflow-x-auto text-xs text-gray-800/70">
                            <table class="w-full table-fixed border-separate border-spacing-y-2">
                                <thead class="text-left">
                                    <th class="p-2 w-52">PRODUCT</th>
                                    <th class="p-2 w-52">DESKRIPSI</th>
                                    <th class="p-2 w-16">QTY</th>
                                    <th class="p-2 w-[100px]">SATUAN</th>
                                    <th class="p-2 w-40">HARGA</th>
                                    <th class="p-2 w-24">PAJAK</th>
                                    <th class="p-2 w-40">JUMLAH</th>
                                    <th class="p-2 w-14 text-center">#</th>
                                </thead>
                                <tbody class="bg-white/50">
                                    <tr class="hover:bg-slate-300/50 mb-4">
                                        <td class="p-2">
                                            <select name="" class="w-full select-product">
                                                <option value="">Pilih...</option>
                                                <option value="">Nasi Goreng</option>
                                                <option value="">Ayam Bakar</option>
                                            </select>
                                        </td>
                                        <td class="p-2">
                                            <input type="text" class="w-full p-2 focus:outline-none border border-primary rounded h-8 bg-transparent backdrop-blur-sm">
                                        </td>
                                        <td class="p-2">
                                            <input type="text" name="" id="" class="w-full text-center bg-transparent backdrop-blur-sm border border-primary rounded h-8 focus:outline-none p-1">
                                        </td>
                                        <td class="p-2">
                                            <input type="text" name="" id="" class="w-full bg-slate-100 backdrop-blur-sm border border-primary rounded h-8 focus:outline-none p-1">
                                        </td>
                                        <td class="p-2">
                                            <input type="text" name="" id="" class="w-full bg-transparent backdrop-blur-sm border border-primary rounded h-8 focus:outline-none p-1">
                                        </td>
                                        <td class="p-2">
                                            <select name="" id="" class="w-full bg-transparent backdrop-blur-sm border border-primary rounded h-8 focus:outline-none p-1">
                                                <option value="">Pilih ...</option>
                                                <option value="">PPN</option>
                                            </select>
                                        </td>
                                        <td class="p-2">
                                            <input type="text" name="" id="" class="w-full bg-transparent backdrop-blur-sm border border-primary rounded h-8 focus:outline-none p-1">
                                        </td>
                                        <td class="p-2">
                                            <button class="bg-red-500 text-white rounded flex items-center justify-center h-8 w-8 mx-auto hover:bg-primary"><i class="fa-solid fa-circle-minus font-bold"></i></button>
                                        </td>
                                    </tr>
                                    <tr class="hover:bg-slate-300/50 mb-4">
                                        <td class="p-2">
                                            <select name="" class="w-full select-product">
                                                <option value="">Pilih...</option>
                                                <option value="">Nasi Goreng</option>
                                                <option value="">Ayam Bakar</option>
                                            </select>
                                        </td>
                                        <td class="p-2">
                                            <input type="text" class="w-full p-2 focus:outline-none border border-primary rounded h-8 bg-transparent backdrop-blur-sm">
                                        </td>
                                        <td class="p-2">
                                            <input type="text" name="" id="" class="w-full bg-transparent backdrop-blur-sm border border-primary rounded h-8 focus:outline-none p-1">
                                        </td>
                                        <td class="p-2">
                                            <input type="text" name="" id="" class="w-full bg-slate-100 backdrop-blur-sm border border-primary rounded h-8 focus:outline-none p-1">
                                        </td>
                                        <td class="p-2">
                                            <input type="text" name="" id="" class="w-full bg-transparent backdrop-blur-sm border border-primary rounded h-8 focus:outline-none p-1">
                                        </td>
                                        <td class="p-2">
                                            <select name="" id="" class="w-full bg-transparent backdrop-blur-sm border border-primary rounded h-8 focus:outline-none p-1">
                                                <option value="">Pilih ...</option>
                                                <option value="">PPN</option>
                                            </select>
                                        </td>
                                        <td class="p-2">
                                            <input type="text" name="" id="" class="w-full bg-transparent backdrop-blur-sm border border-primary rounded h-8 focus:outline-none p-1">
                                        </td>
                                        <td class="p-2">
                                            <button class="bg-red-500 text-white rounded flex items-center justify-center h-8 w-8 mx-auto hover:bg-primary"><i class="fa-solid fa-circle-minus font-bold"></i></button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </form>
                        <form action="" class="grid grid-cols-1 lg:grid-cols-2 gap-5 mt-4 w-full">
                            <!-- konten 1 -->
                            <div class="flex flex-wrap gap-2 w-full ">
                                <!-- Note -->
                                <div class="w-full lg:w-64">
                                    <div class="w-full flex flex-wrap gap-2">
                                        <label for="" class="text-xs font-semibold text-gray-800/70">Note</label>
                                        <textarea name="" id="" class="w-full text-xs p-3 bg-transparent border border-primary rounded backdrop-blur-sm h-48 focus:outline-none focus:ring-2 focus:ring-primary/50"></textarea>
                                    </div>
                                </div>
                                <div class="w-full lg:w-64">
                                    <!-- Lampiran -->
                                    <div class="w-full flex flex-wrap gap-2">
                                        <p class="text-xs font-semibold text-gray-800/70">Lampiran</p>
                                        <label id="drop-area" for="input-file" class="relative overflow-hidden w-full h-48 border border-primary rounded text-primary backdrop-blur-lg hover:bg-primary hover:text-white duration-100 transition-all text-sm flex flex-col gap-3 items-center justify-center">
                                            <input type="file" name="" id="input-file" accept="image/*" hidden>
                                              <img id="img-view"
                                                src=""
                                                class="absolute inset-0 w-full h-full object-contain hidden">
                                                
                                            <div id="overlay" class="absolute inset-0 gap-3 flex flex-col justify-center items-center">
                                                <i class="fa-solid fa-upload text-4xl"></i>
                                                <span>
                                                    Drag and drop a file here or click
                                                </span>
                                            </div>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <!-- konten 2 -->
                            <div class="w-full lg:pl-8">
                                <!-- Sub-Total -->
                                 <div class="w-full flex justify-between mb-4">
                                    <label for="" class="font-semibold text-gray-800/70 text-sm">Sub-Total</label>
                                    <input type="text" class="w-60 text-xs p-3 h-8 border border-primary rounded bg-transparent backdrop-blur-sm focus:ring-2 focus:ring-primary/50 focus:outline-none">
                                 </div>
                                <!-- PPN -->
                                 <div class="w-full flex justify-between mb-4">
                                    <label for="" class="font-semibold text-gray-800/70 text-sm">PPN</label>
                                    <input type="text" class="w-60 text-xs p-3 h-8 border border-primary rounded bg-transparent backdrop-blur-sm focus:ring-2 focus:ring-primary/50 focus:outline-none">
                                 </div>
                                <!-- Total -->
                                 <div class="w-full flex justify-between mb-4">
                                    <label for="" class="font-semibold text-gray-800/70 text-sm">Total</label>
                                    <input type="text" class="w-60 text-xs p-3 h-8 border border-primary rounded bg-transparent backdrop-blur-sm focus:ring-2 focus:ring-primary/50 focus:outline-none">
                                 </div>
                                 <!-- Potongan -->
                                 <div class="w-full flex justify-between mb-4">
                                     <label for="" class="font-semibold text-gray-800/70 text-sm">Potongan</label>
                                     <a href="#" class="text-primary text-xs hover:text-blue-500"><i class="fa-solid fa-rotate text-xs"></i>with ppn</a>
                                    <select id="select-potongan" class="w-60 text-xs p-3 h-8 border border-primary rounded bg-transparent backdrop-blur-sm focus:ring-2 focus:ring-primary/50 focus:outline-none">
                                        <option>Pilih...</option>
                                        <option>Kas MidTrans</option>
                                    </select>
                                 </div>
                                 <!-- i don't know? -->
                                <div class="w-full flex justify-between mb-4">
                                    <div class="flex gap-2 lg:gap-3">
                                        <input type="text" class="w-20 md:w-24 h-8 p-3 text-xs rounded bg-transparent border border-primary backdrop-blur-sm focus:outline-none focus:ring-2 focus:ring-primary/50" />
                                        <button type="button" class="h-8 w-10 text-xs rounded bg-primary text-white hover:bg-purple-700 focus:ring-2 focus:ring-primary/50">Rp</button>
                                        <button type="button" class="h-8 w-10 text-xs rounded bg-primary text-white hover:bg-purple-700 focus:ring-2 focus:ring-primary/50">%</button>
                                    </div>
                                    <input type="text" name="" id="" class="w-60 p-3 h-8 rounded bg-transparent border border-primary focus:outline-none text-xs focus:ring-2 focus:ring-primary/50 backdrop-blur-sm" />
                                </div>
                                <!-- Grand-Total -->
                                <div class="w-full flex justify-between mb-4">
                                    <label for="" class="font-semibold text-gray-800/70 text-sm">Grand-Total</label>
                                    <input type="text" class="w-60 text-xs p-3 h-8 border border-primary rounded bg-transparent backdrop-blur-sm focus:ring-2 focus:ring-primary/50 focus:outline-none">
                                </div>
                                <!-- submit button simpan data -->
                                 <div class="w-full flex mb-4 justify-end gap-2 items-center">
                                    <a href="./penjualan.php" class="text-xs text-primary hover:text-blue-500">Kembali</a>
                                    <button type="submit" class="flex items-center justify-center w-32 h-8 bg-primary rounded text-xs text-white hover:bg-transparent border border-primary hover:text-primary"><i class="fa-solid fa-plus"></i>Simpan Data</button>
                                 </div>
                            </div>
                        </form>
                    <?php } ?>
                    
                        
                    </div>
                </div>
            </div>
        </section>
    </main>
    <?php endif; ?>


    
    <!-- Script CDN Flowbite -->
     <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
     <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="../js/search.js"></script>
    <script>
        $(document).ready(function(){
            $('#pelanggan').select2();
            $('#select-potongan').select2();
            $('.select-product').each(function(item){
                $(this).select2();
            })
        });
    </script>
    <!-- drag and drop -->
     <script>
        const dropArea = document.getElementById('drop-area');
        const inputFile = document.getElementById('input-file');
        const imageView = document.getElementById('img-view');
        const overlay = document.getElementById('overlay');

        inputFile.addEventListener("change", uploadImage);

        function uploadImage(){
            let imgLink = URL.createObjectURL(inputFile.files[0]);
            imageView.src = imgLink;
            imageView.classList.remove('hidden');
            overlay.classList.add('hidden');
        }

        dropArea.addEventListener("dragover", (e) => {
            e.preventDefault();
        })

        dropArea.addEventListener("drop", (e) => {
            e.preventDefault();
            inputFile.files = e.dataTransfer.files;
            uploadImage();
        })

     </script>
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