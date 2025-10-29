<?php session_start(); ?>
<?php 
    include '../koneksi.php';

    $id_satuan = '';
    $nama_satuan = '';

    if(isset($_GET['ubah_satuan'])){
        $id_satuan = $_GET['ubah_satuan'];

        $query_satuan = "SELECT * FROM tb_satuan WHERE id_satuan = '$id_satuan'";
        $sql_satuan = mysqli_query($conn,$query_satuan);
        $result_satuan = mysqli_fetch_assoc($sql_satuan);
        
        $nama_satuan = $result_satuan['nama_satuan'];
    }
    if(isset($_GET['ubah_kategori'])){
        $id_kategori = $_GET['ubah_kategori'];

        $query_kategori = "SELECT * FROM tb_kategori WHERE id_kategori = '$id_kategori'";
        $sql_kategori = mysqli_query($conn, $query_kategori);
        $result_kategori = mysqli_fetch_assoc($sql_kategori);
        
        $nama_kategori = $result_kategori['nama_kategori'];
    }
    if(isset($_GET['ubah_MP'])){
        $id_MP = $_GET['ubah_MP'];
        $query_MP = "SELECT * FROM tb_metode_pembayaran WHERE id_metode_pembayaran = '$id_MP'";
        $sql_MP = mysqli_query($conn,$query_MP);
        $result_MP = mysqli_fetch_assoc($sql_MP);
        $nama_MP = $result_MP['metode_pembayaran'];
    }
    if(isset($_GET['ubah_OP'])){
        $id_opsi_pembayaran = $_GET['ubah_OP'];
        $query = "SELECT * FROM tb_opsi_pembayaran WHERE id_opsi_pembayaran = '$id_opsi_pembayaran'";
        $sql = mysqli_query($conn,$query);
        $result_OP = mysqli_fetch_assoc($sql);
        $tempo_pembayaran = $result_OP['tempo_pembayaran'];
        $lama_waktu = $result_OP['lama_waktu'];
    }
    if(isset($_GET['ubah_tags'])){
        $id_tags = $_GET['ubah_tags'];
        $query = "SELECT * FROM tb_tags_transaksi WHERE id_tags_transaksi = '$id_tags'";
        $sql = mysqli_query($conn,$query);
        $result = mysqli_fetch_assoc($sql);
        $tags_transaksi = $result['tags_transaksi'];
    }
    if(isset($_GET['setpajak'])){
        $query = "SELECT * FROM tb_pajak";
        $sql = mysqli_query($conn,$query);
        $result = mysqli_fetch_assoc($sql);
        $nilai_pajak = $result['nilai_pajak'];
        $nilai_pemotong = $result['nilai_pemotong'];
    }
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
                    <div class="mt-14 sm:mt-16 md:mt-5 w-full max-w-[1200px] mx-auto min-h-[calc(100vh-4rem)]">
                      <!-- KONTEN HALAMAN SATUAN ACTION START -->
                       <?php
                        if(isset($_GET['satuan_action'])){
                       ?>
                         <?php
                            if(isset($_GET['ubah_satuan'])){
                         ?>
                        <div class="bg-gray-100/70 overflow-x-auto w-full sm:w-[500px] rounded-t backdrop-blur-sm rounded-b-lg h-64 border-r border-b-2 border-gray-700/60">
                        <div class="w-full bg-primary p-4 text-white">
                            <h1 class="font-semibold text-sm font-primary"><i class="fa-solid fa-plus"></i>Update Satuan Action</h1>
                        </div>
                        <form action="../pages/proses.php" method="POST" class="w-full p-5">
                            <input type="hidden" value="<?php echo $id_satuan ?>" name="idSatuan">
                            <div class="mb-10">
                                <label for="edit_nama_satuan" class="text-slate-600 font-primary font-semibold text-sm">Nama Satuan</label>
                                <input id="edit_nama_satuan" type="text" name="edit_nama_satuan" value="<?php echo $nama_satuan; ?>" class="w-full h-8 rounded-md focus:outline-none px-4 bg-transparent ring-1 ring-slate-700/60 focus:backdrop-blur focus:ring-primary">
                            </div>
                            <div class="flex justify-end gap-4 items-center">
                                <a href="./kelola_1.php?satuan" class="text-primary font-primary hover:underline flex items-center gap-2"><svg fill="currentColor" width="20" height="20" class="wd-icon-undo-l wd-icon" focusable="false" role="presentation" viewBox="0 0 24 24"><g fill-rule="evenodd"><path d="M9.372 8.4s.42.003.988.084c5.045.72 7.7 3.558 9.643 7.624-2.708-1.936-5.312-3.043-9.48-3.043H9.372v3.148l-5.375-5.374 5.375-5.374v2.934z" class="wd-icon-background"/><path fill-rule="nonzero" d="M8.873 8.748V6.171l-4.668 4.668 4.668 4.668v-2.734h1c3.62 0 6.541.801 8.893 2.482-1.687-3.531-4.653-5.835-9.035-6.461-.492-.07-.85-.046-.858-.046zm2-4.495v2.705c6.224 1.21 9.87 5.585 11.11 11.779.21 1.056-1.169 1.654-1.795.777-2.156-3.019-5.09-4.519-9.315-4.718v2.616c0 1.162-1.224 1.7-2.059.865l-6.38-6.38a1.5 1.5 0 0 1 0-2.116l6.38-6.38c.817-.817 2.059-.318 2.059.852z"/></g></svg>Kembali</a>
                                <button type="submit" name="aksi" value="edit_satuan" class="edit-btn text-white bg-primary rounded-lg p-2 font-semibold"><i class="fa-solid fa-floppy-disk"></i>Update</button>
                            </div>
                        </form>
                      </div>
                         <?php
                          } else {
                            ?>
                        <div class="bg-gray-100/70 overflow-x-auto w-full sm:w-[500px] rounded-t backdrop-blur-sm rounded-b-lg h-64 border-r border-b-2 border-gray-700/60">
                        <div class="w-full bg-primary p-4 text-white">
                            <h1 class="font-semibold text-sm font-primary"><i class="fa-solid fa-plus"></i>Tambah Satuan Action</h1>
                        </div>
                        <form action="../pages/proses.php" method="POST" class="w-full p-5">
                            <div class="mb-10">
                                <label for="nama_satuan" class="text-slate-600 font-primary font-semibold text-sm">Nama Satuan</label>
                                <input required id="nama_satuan" type="text" name="nama_satuan" value="<?php echo $nama_satuan; ?>" class="add-input w-full h-8 rounded-md focus:outline-none px-4 bg-transparent ring-1 ring-slate-700/60 focus:backdrop-blur focus:ring-primary">
                            </div>
                            <div class="flex justify-end gap-4 items-center">
                                <a href="./kelola_1.php?satuan" class="text-primary font-primary hover:underline flex items-center gap-2"><svg fill="currentColor" width="20" height="20" class="wd-icon-undo-l wd-icon" focusable="false" role="presentation" viewBox="0 0 24 24"><g fill-rule="evenodd"><path d="M9.372 8.4s.42.003.988.084c5.045.72 7.7 3.558 9.643 7.624-2.708-1.936-5.312-3.043-9.48-3.043H9.372v3.148l-5.375-5.374 5.375-5.374v2.934z" class="wd-icon-background"/><path fill-rule="nonzero" d="M8.873 8.748V6.171l-4.668 4.668 4.668 4.668v-2.734h1c3.62 0 6.541.801 8.893 2.482-1.687-3.531-4.653-5.835-9.035-6.461-.492-.07-.85-.046-.858-.046zm2-4.495v2.705c6.224 1.21 9.87 5.585 11.11 11.779.21 1.056-1.169 1.654-1.795.777-2.156-3.019-5.09-4.519-9.315-4.718v2.616c0 1.162-1.224 1.7-2.059.865l-6.38-6.38a1.5 1.5 0 0 1 0-2.116l6.38-6.38c.817-.817 2.059-.318 2.059.852z"/></g></svg>Kembali</a>
                                <button type="submit" name="aksi" value="add_satuan" class="add-btn text-white bg-primary rounded-lg p-2 font-semibold"><i class="fa-solid fa-floppy-disk"></i>Tambahkan</button>
                            </div>
                        </form>
                      </div>
                        <?php } ?>
                     
                      <!-- KONTEN HALAMAN SATUAN ACTION END -->

                      <!-- KONTEN HALAMAN KATEGORI ACTION START -->
                      <?php
                        } elseif(isset($_GET['kategori_action'])){
                      ?>
                        <?php
                            if(isset($_GET['ubah_kategori'])){
                        ?>
                            <div class="bg-gray-100/70 overflow-x-auto w-full sm:w-[500px] rounded-t backdrop-blur-sm rounded-b-lg h-64 border-r border-b-2 border-gray-700/60">
                                <div class="w-full bg-primary p-4 text-white">
                                    <h1 class="font-semibold text-sm font-primary"><i class="fa-solid fa-plus"></i>Update Kategori Action</h1>
                                </div>
                                <form action="../pages/proses.php" method="POST" class="w-full p-5">
                                    <input type="hidden" value="<?php echo $id_kategori ?>" name="id_kategori">
                                    <div class="mb-10">
                                        <label for="edit_nama_kategori" class="text-slate-600 font-primary font-semibold text-sm">Nama Kategori Produk</label>
                                        <input required type="text" name="edit_nama_kategori" id="edit_nama_kategori" value="<?php echo $nama_kategori; ?>" class="w-full h-8 rounded-md focus:outline-none px-4 bg-transparent ring-1 ring-slate-700/60 focus:backdrop-blur focus:ring-primary">
                                    </div>
                                    <div class="flex justify-end gap-4 items-center">
                                        <a href="./kelola_1.php?kategori" class="text-primary font-primary hover:underline flex items-center gap-2"><svg fill="currentColor" width="20" height="20" class="wd-icon-undo-l wd-icon" focusable="false" role="presentation" viewBox="0 0 24 24"><g fill-rule="evenodd"><path d="M9.372 8.4s.42.003.988.084c5.045.72 7.7 3.558 9.643 7.624-2.708-1.936-5.312-3.043-9.48-3.043H9.372v3.148l-5.375-5.374 5.375-5.374v2.934z" class="wd-icon-background"/><path fill-rule="nonzero" d="M8.873 8.748V6.171l-4.668 4.668 4.668 4.668v-2.734h1c3.62 0 6.541.801 8.893 2.482-1.687-3.531-4.653-5.835-9.035-6.461-.492-.07-.85-.046-.858-.046zm2-4.495v2.705c6.224 1.21 9.87 5.585 11.11 11.779.21 1.056-1.169 1.654-1.795.777-2.156-3.019-5.09-4.519-9.315-4.718v2.616c0 1.162-1.224 1.7-2.059.865l-6.38-6.38a1.5 1.5 0 0 1 0-2.116l6.38-6.38c.817-.817 2.059-.318 2.059.852z"/></g></svg>Kembali</a>
                                        <button type="submit" name="aksi" value="edit_kategori" class="edit-btn text-white bg-primary rounded-lg p-2 font-semibold"><i class="fa-solid fa-floppy-disk"></i>Update</button>
                                      </div>
                                    </form>
                             </div>
                      <?php 
                            } else {
                      ?>
                        <div class="bg-gray-100/70 overflow-x-auto w-full sm:w-[500px] rounded-t backdrop-blur-sm rounded-b-lg h-64 border-r border-b-2 border-gray-700/60">
                            <div class="w-full bg-primary p-4 text-white">
                                <h1 class="font-semibold text-sm font-primary"><i class="fa-solid fa-plus"></i>Tambah Kategori Action</h1>
                            </div>
                            <form action="../pages/proses.php" method="POST" class="w-full p-5">
                                <div class="mb-10">
                                    <label for="nama_kategori" class="text-slate-600 font-primary font-semibold text-sm">Nama Kategori Produk</label>
                                    <input required type="text" name="nama_kategori" id="nama_kategori" class="add-input w-full h-8 rounded-md focus:outline-none px-4 bg-transparent ring-1 ring-slate-700/60 focus:backdrop-blur focus:ring-primary">
                                </div>
                                <div class="flex justify-end gap-4 items-center">
                                    <a href="./kelola_1.php?kategori" class="text-primary font-primary hover:underline flex items-center gap-2"><svg fill="currentColor" width="20" height="20" class="wd-icon-undo-l wd-icon" focusable="false" role="presentation" viewBox="0 0 24 24"><g fill-rule="evenodd"><path d="M9.372 8.4s.42.003.988.084c5.045.72 7.7 3.558 9.643 7.624-2.708-1.936-5.312-3.043-9.48-3.043H9.372v3.148l-5.375-5.374 5.375-5.374v2.934z" class="wd-icon-background"/><path fill-rule="nonzero" d="M8.873 8.748V6.171l-4.668 4.668 4.668 4.668v-2.734h1c3.62 0 6.541.801 8.893 2.482-1.687-3.531-4.653-5.835-9.035-6.461-.492-.07-.85-.046-.858-.046zm2-4.495v2.705c6.224 1.21 9.87 5.585 11.11 11.779.21 1.056-1.169 1.654-1.795.777-2.156-3.019-5.09-4.519-9.315-4.718v2.616c0 1.162-1.224 1.7-2.059.865l-6.38-6.38a1.5 1.5 0 0 1 0-2.116l6.38-6.38c.817-.817 2.059-.318 2.059.852z"/></g></svg>Kembali</a>
                                    <button type="submit" name="aksi" value="add_kategori" class="text-white bg-primary rounded-lg p-2 font-semibold"><i class="fa-solid fa-floppy-disk"></i>Tambahkan</button>
                                </div>
                            </form>
                      </div>
                      <?php } ?>
                        <!-- KONTEN HALAMAN KATEGORI ACTION END -->

                        <!-- KONTEN HALAMAN METODE PEMBAYARAN ACTION START -->
                      <?php 
                        } elseif(isset($_GET['metode_pembayaran_action'])){
                      ?>
                        <?php
                            if(isset($_GET['ubah_MP'])){
                         ?>
                            <div class="bg-gray-100/70 overflow-x-auto w-full sm:w-[500px] rounded-t backdrop-blur-sm rounded-b-lg h-64 border-r border-b-2 border-gray-700/60">
                            <div class="w-full bg-primary p-4 text-white">
                                <h1 class="font-semibold text-sm font-primary"><i class="fa-solid fa-plus"></i>Update Metode Pembayaran Action</h1>
                            </div>
                            <form action="../pages/proses.php" method="POST" class="w-full p-5">
                                <input type="hidden" value="<?php echo $id_MP ?>" name="id_MP">
                                <div class="mb-10">
                                    <label for="edit_MP" class="text-slate-600 font-primary font-semibold text-sm">Metode Pembayaran</label>
                                    <input type="text" name="edit_MP" id="edit_MP" value="<?php echo $nama_MP; ?>" class="w-full h-8 rounded-md focus:outline-none px-4 bg-transparent ring-1 ring-slate-700/60 focus:backdrop-blur focus:ring-primary">
                                </div>
                            
                                <div class="flex justify-end gap-4 items-center">
                                    <a href="./kelola_1.php?metode_pembayaran" class="text-primary font-primary hover:underline flex items-center gap-2"><svg fill="currentColor" width="20" height="20" class="wd-icon-undo-l wd-icon" focusable="false" role="presentation" viewBox="0 0 24 24"><g fill-rule="evenodd"><path d="M9.372 8.4s.42.003.988.084c5.045.72 7.7 3.558 9.643 7.624-2.708-1.936-5.312-3.043-9.48-3.043H9.372v3.148l-5.375-5.374 5.375-5.374v2.934z" class="wd-icon-background"/><path fill-rule="nonzero" d="M8.873 8.748V6.171l-4.668 4.668 4.668 4.668v-2.734h1c3.62 0 6.541.801 8.893 2.482-1.687-3.531-4.653-5.835-9.035-6.461-.492-.07-.85-.046-.858-.046zm2-4.495v2.705c6.224 1.21 9.87 5.585 11.11 11.779.21 1.056-1.169 1.654-1.795.777-2.156-3.019-5.09-4.519-9.315-4.718v2.616c0 1.162-1.224 1.7-2.059.865l-6.38-6.38a1.5 1.5 0 0 1 0-2.116l6.38-6.38c.817-.817 2.059-.318 2.059.852z"/></g></svg>Kembali</a>
                                    <button type="submit" name="aksi" value="edit_MP" class="edit-btn text-white bg-primary rounded-lg p-2 font-semibold"><i class="fa-solid fa-floppy-disk"></i>Update</button>
                                </div>
                            </form>
                        </div>
                      <?php } else { ?>
                          <div class="bg-gray-100/70 overflow-x-auto w-full sm:w-[500px] rounded-t backdrop-blur-sm rounded-b-lg h-64 border-r border-b-2 border-gray-700/60">
                            <div class="w-full bg-primary p-4 text-white">
                                <h1 class="font-semibold text-sm font-primary"><i class="fa-solid fa-plus"></i>Tambah Metode Pembayaran Action</h1>
                            </div>
                            <form action="../pages/proses.php" method="POST" class="w-full p-5">
                                <div class="mb-10">
                                    <label for="MP" class="text-slate-600 font-primary font-semibold text-sm">Metode Pembayaran</label>
                                    <input type="text" name="MP" id="MP" class="add-input w-full h-8 rounded-md focus:outline-none px-4 bg-transparent ring-1 ring-slate-700/60 focus:backdrop-blur focus:ring-primary">
                                </div>
                            
                                <div class="flex justify-end gap-4 items-center">
                                    <a href="./kelola_1.php?metode_pembayaran" class="text-primary font-primary hover:underline flex items-center gap-2"><svg fill="currentColor" width="20" height="20" class="wd-icon-undo-l wd-icon" focusable="false" role="presentation" viewBox="0 0 24 24"><g fill-rule="evenodd"><path d="M9.372 8.4s.42.003.988.084c5.045.72 7.7 3.558 9.643 7.624-2.708-1.936-5.312-3.043-9.48-3.043H9.372v3.148l-5.375-5.374 5.375-5.374v2.934z" class="wd-icon-background"/><path fill-rule="nonzero" d="M8.873 8.748V6.171l-4.668 4.668 4.668 4.668v-2.734h1c3.62 0 6.541.801 8.893 2.482-1.687-3.531-4.653-5.835-9.035-6.461-.492-.07-.85-.046-.858-.046zm2-4.495v2.705c6.224 1.21 9.87 5.585 11.11 11.779.21 1.056-1.169 1.654-1.795.777-2.156-3.019-5.09-4.519-9.315-4.718v2.616c0 1.162-1.224 1.7-2.059.865l-6.38-6.38a1.5 1.5 0 0 1 0-2.116l6.38-6.38c.817-.817 2.059-.318 2.059.852z"/></g></svg>Kembali</a>
                                    <button type="submit" name="aksi" value="add_MP" class="add-btn text-white bg-primary rounded-lg p-2 font-semibold"><i class="fa-solid fa-floppy-disk"></i>Tambahkan</button>
                                </div>
                            </form>
                        </div>

                      <?php } ?>
                        <!-- KONTEN HALAMAN METODE PEMBAYARAN ACTION END -->

                        <!-- KONTEN HALAMAN OPSI PEMBAYARAN ACTION START -->
                      <?php 
                        } elseif(isset($_GET['opsi_pembayaran_action'])){
                      ?>
                        <?php 
                            if(isset($_GET['ubah_OP'])){
                        ?>
                        <div class="bg-gray-100/70 overflow-x-auto w-full sm:w-[500px] rounded-t backdrop-blur-sm rounded-b-lg h-72 border-r border-b-2 border-gray-700/60">
                        <div class="w-full bg-primary p-4 text-white">
                            <h1 class="font-semibold text-sm font-primary"><i class="fa-solid fa-plus"></i>Update Tempo Pembayaran Action</h1>
                        </div>
                        <form action="../pages/proses.php" method="POST" class="w-full p-5">
                            <input type="text" value="<?php echo $id_opsi_pembayaran; ?>" name="id_opsi_pembayaran">
                            <div class="mb-2">
                                <label for="edit_tempo_pembayaran" class="text-slate-600 font-primary font-semibold text-sm">Tempo Pembayaran</label>
                                <input type="text" name="edit_tempo_pembayaran" id="edit_tempo_pembayaran" value="<?php echo $tempo_pembayaran; ?>" class="w-full h-8 rounded-md focus:outline-none px-4 bg-transparent ring-1 ring-slate-700/60 focus:backdrop-blur focus:ring-primary">
                            </div>
                            <div class="mb-4 text-slate-600">
                                <label for="edit_lama_waktu" class=" font-primary font-semibold text-sm">Lama Waktu (hari)</label>
                                <input name="edit_lama_waktu" id="edit_lama_waktu" type="number" value="<?php echo $lama_waktu; ?>" class="w-full rounded-lg focus:outline-none focus:backdrop-blur p-2 bg-transparent ring-1 ring-slate-700/60 focus:ring-primary">
                            </div>
                            <div class="flex justify-end gap-4 items-center">
                                <a href="./kelola_1.php?opsi_pembayaran" class="text-primary font-primary hover:underline flex items-center gap-2"><svg fill="currentColor" width="20" height="20" class="wd-icon-undo-l wd-icon" focusable="false" role="presentation" viewBox="0 0 24 24"><g fill-rule="evenodd"><path d="M9.372 8.4s.42.003.988.084c5.045.72 7.7 3.558 9.643 7.624-2.708-1.936-5.312-3.043-9.48-3.043H9.372v3.148l-5.375-5.374 5.375-5.374v2.934z" class="wd-icon-background"/><path fill-rule="nonzero" d="M8.873 8.748V6.171l-4.668 4.668 4.668 4.668v-2.734h1c3.62 0 6.541.801 8.893 2.482-1.687-3.531-4.653-5.835-9.035-6.461-.492-.07-.85-.046-.858-.046zm2-4.495v2.705c6.224 1.21 9.87 5.585 11.11 11.779.21 1.056-1.169 1.654-1.795.777-2.156-3.019-5.09-4.519-9.315-4.718v2.616c0 1.162-1.224 1.7-2.059.865l-6.38-6.38a1.5 1.5 0 0 1 0-2.116l6.38-6.38c.817-.817 2.059-.318 2.059.852z"/></g></svg>Kembali</a>
                                <button type="submit" name="aksi" value="edit_opsi_pembayaran" class="edit-btn text-white bg-primary rounded-lg p-2 font-semibold"><i class="fa-solid fa-floppy-disk"></i>Update</button>
                            </div>
                        </form>
                      </div>
                      <?php
                       } else {
                        ?>
                         <div class="bg-gray-100/70 overflow-x-auto w-full sm:w-[500px] rounded-t backdrop-blur-sm rounded-b-lg h-72 border-r border-b-2 border-gray-700/60">
                            <div class="w-full bg-primary p-4 text-white">
                                <h1 class="font-semibold text-sm font-primary"><i class="fa-solid fa-plus"></i>Tambah Tempo Pembayaran Action</h1>
                            </div>
                        <form action="../pages/proses.php" method="POST" class="w-full p-5">
                            <div class="mb-2">
                                <label for="add_tempo_pembayaran" class="text-slate-600 font-primary font-semibold text-sm">Tempo Pembayaran</label>
                                <input type="text" name="add_tempo_pembayaran" id="add_tempo_pembayaran" class="add-input w-full h-8 rounded-md focus:outline-none px-4 bg-transparent ring-1 ring-slate-700/60 focus:backdrop-blur focus:ring-primary">
                            </div>
                            <div class="mb-4 text-slate-600">
                                <label for="add_lama_waktu" class=" font-primary font-semibold text-sm">Lama Waktu (hari)</label>
                                <input name="add_lama_waktu" id="add_lama_waktu" type="number" class="add-input w-full rounded-lg focus:outline-none focus:backdrop-blur p-2 bg-transparent ring-1 ring-slate-700/60 focus:ring-primary">
                            </div>
                            <div class="flex justify-end gap-4 items-center">
                                <a href="./kelola_1.php?opsi_pembayaran" class="text-primary font-primary hover:underline flex items-center gap-2"><svg fill="currentColor" width="20" height="20" class="wd-icon-undo-l wd-icon" focusable="false" role="presentation" viewBox="0 0 24 24"><g fill-rule="evenodd"><path d="M9.372 8.4s.42.003.988.084c5.045.72 7.7 3.558 9.643 7.624-2.708-1.936-5.312-3.043-9.48-3.043H9.372v3.148l-5.375-5.374 5.375-5.374v2.934z" class="wd-icon-background"/><path fill-rule="nonzero" d="M8.873 8.748V6.171l-4.668 4.668 4.668 4.668v-2.734h1c3.62 0 6.541.801 8.893 2.482-1.687-3.531-4.653-5.835-9.035-6.461-.492-.07-.85-.046-.858-.046zm2-4.495v2.705c6.224 1.21 9.87 5.585 11.11 11.779.21 1.056-1.169 1.654-1.795.777-2.156-3.019-5.09-4.519-9.315-4.718v2.616c0 1.162-1.224 1.7-2.059.865l-6.38-6.38a1.5 1.5 0 0 1 0-2.116l6.38-6.38c.817-.817 2.059-.318 2.059.852z"/></g></svg>Kembali</a>
                                <button type="submit" name="aksi" value="add_opsi_pembayaran" class="add-btn text-white bg-primary rounded-lg p-2 font-semibold"><i class="fa-solid fa-floppy-disk"></i>Tambahkan</button>
                            </div>
                        </form>
                      </div>
                      <?php 
                      }
                      ?>
                        <!-- KONTEN HALAMAN OPSI PEMBAYARAN END -->

                        <!-- KONTEN HALAMAN TAGS TRANSAKSI ACTION START -->
                      <?php } elseif(isset($_GET['tags_transaksi_action'])){
                        ?>
                            <?php
                                if(isset($_GET['ubah_tags'])){
                            ?>
                                <div class="bg-gray-100/70 overflow-x-auto w-full sm:w-[500px] rounded-t backdrop-blur-sm rounded-b-lg h-64 border-r border-b-2 border-gray-700/60">
                                    <div class="w-full bg-primary p-4 text-white">
                                        <h1 class="font-semibold text-sm font-primary"><i class="fa-solid fa-plus"></i>Update Tags Action</h1>
                                    </div>
                                    <form action="../pages/proses.php" method="POST" class="w-full p-5">
                                        <input type="hidden" value="<?php echo $id_tags;?>" name="id_tags">
                                        <div class="mb-10">
                                            <label for="edit_tags" class="text-slate-600 font-primary font-semibold text-sm">Tags Transaksi</label>
                                            <input required type="text" name="edit_tags" id="edit_tags" value="<?php echo $tags_transaksi; ?>" class="w-full h-8 rounded-md focus:outline-none px-4 bg-transparent ring-1 ring-slate-700/60 focus:backdrop-blur focus:ring-primary">
                                        </div>
                                        <div class="flex justify-end gap-4 items-center">
                                            <a href="./kelola_1.php?tags_transaksi" class="text-primary font-primary hover:underline flex items-center gap-2"><svg fill="currentColor" width="20" height="20" class="wd-icon-undo-l wd-icon" focusable="false" role="presentation" viewBox="0 0 24 24"><g fill-rule="evenodd"><path d="M9.372 8.4s.42.003.988.084c5.045.72 7.7 3.558 9.643 7.624-2.708-1.936-5.312-3.043-9.48-3.043H9.372v3.148l-5.375-5.374 5.375-5.374v2.934z" class="wd-icon-background"/><path fill-rule="nonzero" d="M8.873 8.748V6.171l-4.668 4.668 4.668 4.668v-2.734h1c3.62 0 6.541.801 8.893 2.482-1.687-3.531-4.653-5.835-9.035-6.461-.492-.07-.85-.046-.858-.046zm2-4.495v2.705c6.224 1.21 9.87 5.585 11.11 11.779.21 1.056-1.169 1.654-1.795.777-2.156-3.019-5.09-4.519-9.315-4.718v2.616c0 1.162-1.224 1.7-2.059.865l-6.38-6.38a1.5 1.5 0 0 1 0-2.116l6.38-6.38c.817-.817 2.059-.318 2.059.852z"/></g></svg>Kembali</a>
                                            <button type="submit" name="aksi" value="edit_tags_transaksi" class="edit-btn text-white bg-primary rounded-lg p-2 font-semibold"><i class="fa-solid fa-floppy-disk"></i>Update</button>
                                        </div>
                                    </form>
                                </div>
                            <?php
                            } else {
                            
                            ?>
                                <div class="bg-gray-100/70 overflow-x-auto w-full sm:w-[500px] rounded-t backdrop-blur-sm rounded-b-lg h-64 border-r border-b-2 border-gray-700/60">
                                    <div class="w-full bg-primary p-4 text-white">
                                        <h1 class="font-semibold text-sm font-primary"><i class="fa-solid fa-plus"></i>Tambah Tags Action</h1>
                                    </div>
                                    <form action="../pages/proses.php" method="POST" class="w-full p-5">
                                        <div class="mb-10">
                                            <label for="add_tags" class="text-slate-600 font-primary font-semibold text-sm">Tags Transaksi</label>
                                            <input required type="text" name="add_tags" id="add_tags" class="add-input w-full h-8 rounded-md focus:outline-none px-4 bg-transparent ring-1 ring-slate-700/60 focus:backdrop-blur focus:ring-primary">
                                        </div>
                                        <div class="flex justify-end gap-4 items-center">
                                            <a href="./kelola_1.php?tags_transaksi" class="text-primary font-primary hover:underline flex items-center gap-2"><svg fill="currentColor" width="20" height="20" class="wd-icon-undo-l wd-icon" focusable="false" role="presentation" viewBox="0 0 24 24"><g fill-rule="evenodd"><path d="M9.372 8.4s.42.003.988.084c5.045.72 7.7 3.558 9.643 7.624-2.708-1.936-5.312-3.043-9.48-3.043H9.372v3.148l-5.375-5.374 5.375-5.374v2.934z" class="wd-icon-background"/><path fill-rule="nonzero" d="M8.873 8.748V6.171l-4.668 4.668 4.668 4.668v-2.734h1c3.62 0 6.541.801 8.893 2.482-1.687-3.531-4.653-5.835-9.035-6.461-.492-.07-.85-.046-.858-.046zm2-4.495v2.705c6.224 1.21 9.87 5.585 11.11 11.779.21 1.056-1.169 1.654-1.795.777-2.156-3.019-5.09-4.519-9.315-4.718v2.616c0 1.162-1.224 1.7-2.059.865l-6.38-6.38a1.5 1.5 0 0 1 0-2.116l6.38-6.38c.817-.817 2.059-.318 2.059.852z"/></g></svg>Kembali</a>
                                            <button type="submit" name="aksi" value="add_tags_transaksi" class="add-btn text-white bg-primary rounded-lg p-2 font-semibold"><i class="fa-solid fa-floppy-disk"></i>Tambahkan</button>
                                        </div>
                                    </form>
                                </div>
                             <?php } ?>
                      <!-- KONTEN HALAMAN TAGS TRANSAKSI ACTION END -->

                      <!-- KONTEN HALAMAN SETTING PAJAK ACTION START -->
                        <?php } elseif(isset($_GET['setpajak'])){
                            ?>
                             <div class="bg-gray-100/70 overflow-x-auto w-full sm:w-[500px] rounded-t backdrop-blur-sm rounded-b-lg h-72 border-r border-b-2 border-gray-700/60">
                        <div class="w-full bg-primary p-4 text-white">
                            <h1 class="font-semibold text-sm font-primary"><i class="fa-solid fa-plus"></i>Update Pajak</h1>
                        </div>
                        <form action="../pages/proses.php" method="POST" class="w-full p-5">
                            <div class="mb-2">
                                <label for="nilai_pajak" class="text-slate-600 font-primary font-semibold text-sm">Nilai Pajak</label>
                                <input type="text" name="nilai_pajak" id="nilai_pajak" value="<?php echo $nilai_pajak; ?>" class="w-full h-8 rounded-md focus:outline-none px-4 bg-transparent ring-1 ring-slate-700/60 focus:backdrop-blur focus:ring-primary">
                            </div>
                            <div class="mb-4 text-slate-600">
                                <label for="nilai_pemotong" class=" font-primary font-semibold text-sm">Nilai Pemotong (rumus)</label>
                                <input name="nilai_pemotong" id="nilai_pemotong" type="text" value="<?php echo $nilai_pemotong; ?>" class="w-full rounded-lg focus:outline-none focus:backdrop-blur p-2 bg-transparent ring-1 ring-slate-700/60 focus:ring-primary">
                            </div>
                            <div class="flex justify-end gap-4 items-center">
                                <a href="../pages/pengaturan.php" class="text-primary font-primary hover:underline flex items-center gap-2"><svg fill="currentColor" width="20" height="20" class="wd-icon-undo-l wd-icon" focusable="false" role="presentation" viewBox="0 0 24 24"><g fill-rule="evenodd"><path d="M9.372 8.4s.42.003.988.084c5.045.72 7.7 3.558 9.643 7.624-2.708-1.936-5.312-3.043-9.48-3.043H9.372v3.148l-5.375-5.374 5.375-5.374v2.934z" class="wd-icon-background"/><path fill-rule="nonzero" d="M8.873 8.748V6.171l-4.668 4.668 4.668 4.668v-2.734h1c3.62 0 6.541.801 8.893 2.482-1.687-3.531-4.653-5.835-9.035-6.461-.492-.07-.85-.046-.858-.046zm2-4.495v2.705c6.224 1.21 9.87 5.585 11.11 11.779.21 1.056-1.169 1.654-1.795.777-2.156-3.019-5.09-4.519-9.315-4.718v2.616c0 1.162-1.224 1.7-2.059.865l-6.38-6.38a1.5 1.5 0 0 1 0-2.116l6.38-6.38c.817-.817 2.059-.318 2.059.852z"/></g></svg>Kembali</a>
                                <button type="submit" name="aksi" value="update_pajak" class="edit-btn text-white bg-primary rounded-lg p-2 font-semibold"><i class="fa-solid fa-floppy-disk"></i>Update</button>
                            </div>
                        </form>
                      </div>
                        <?php } ?>
                        <!-- KONTEN HALAMAN SETTING PAJAK ACTION END -->

                    </div>
                </div>

            </div>
        </section>
    </main>
    <?php endif; ?>
    <!-- Script CDN Flowbite -->
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="../script.js"></script>
        <?php if((int)$_SESSION['id_user'] !== 3): ?>
    <script>
        window.location.href = '../pages/login.php';
    </script>
    <?php unset($_SESSION['id_user']);endif; ?>
</body>
</html>