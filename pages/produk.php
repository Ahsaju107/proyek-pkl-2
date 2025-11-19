<?php session_start(); ?>
<?php 
    include '../koneksi.php';

    $query = "SELECT * FROM tb_produk;";
    $sql = mysqli_query($conn, $query);
    $nomor = 0;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Warung orfevre - Dasboard</title>
    <link rel="shortcut icon" href="../assets/img/icon.png" type="image/x-icon">
     <link rel="stylesheet" href="../css/output.css">
    <!-- Flowbite CDN -->
    <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />
    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body class="font-secondary bg-gray-100 selection:bg-primary selection:text-white">
    <?php if($_SESSION['id_user'] == '3'): ?>
         <!-- Navbar mobile Start -->
            <?php include '../components/navbar.php';?>
        <!--Navbar Mobile End-->

    <main class="bg-[url('../assets/img/bg-dashboard.png')] bg-cover min-h-screen">
        <div class="flex flex-col min-h-screen">
            <div class="flex flex-1">
                <!-- Sidebar Start -->
                 <?php include '../components/sidebar.php';?>
                <!--Sidebar End-->

                <!-- Konten utama -->
                <div class="w-full md:ml-16 sm:px-6 py-2 sm:py-4">
                    <div class=" w-full max-w-[1200px] mx-auto min-h-[calc(100vh-4rem)] flex flex-col rounded-lg p-5">
                        <section id="tabel produk" class="pt-12 md:pt-0 lg:px-10">
                            <div class="container max-w-full">
                                <div class="flex flex-col gap-3">
                                    <h2 class="font-primary text-3xl font-bold text-center text-gray-100">Daftar <span class="text-primary">Produk</span> </h2>

                                    <div class="flex flex-col sm:flex-row sm:justify-between gap-3">
                                        <a href="./kelola.php"
                                        class="bg-primary rounded-lg p-3 text-sm font-bold text-white flex gap-1"><img
                                        src="../assets/icon/plus-icon.svg" class="w-4" />Tambah Produk</a>
                                        <div class="flex rounded-lg bg-gray-200 hover:bg-gray-300 gap-2 px-2 group shadow-[0_3px_3px_rgb(0,0,0,0.1)]">
                                                <svg viewBox="0 0 24 24" class="w-5 text-primary" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M15.7955 15.8111L21 21M18 10.5C18 14.6421 14.6421 18 10.5 18C6.35786 18 3 14.6421 3 10.5C3 6.35786 6.35786 3 10.5 3C14.6421 3 18 6.35786 18 10.5Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                </svg>
                                            <input type="text" class="search-input bg-transparent min-h-[44px] rounded-lg focus:outline-none" placeholder="Cari Produk">
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="mt-4 rounded-lg overflow-x-auto shadow-[0_5px_10px_rgb(0,0,0,0.3)]">
                                <table class="w-full">
                                    <thead class="bg-primary text-gray-100 text-left">
                                        <tr>
                                            <th class="p-3">#</th>
                                            <th class="p-3">Nama</th>
                                            <th class="p-3">Harga</th>
                                            <th class="p-3">Satuan</th>
                                            <th class="p-3">Kategori</th>
                                            <th class="p-3">Gambar</th>
                                            <th class="p-3 text-center sm:text-left">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody class="backdrop-blur-sm bg-gray-100/60">
                                        <?php 
                                        while($result = mysqli_fetch_assoc( $sql)){
                                    ?>
                                        <tr class="produk-item">
                                            <td class="p-2"><?php echo ++$nomor ?>.</td>
                                            <td class="p-2"><h3><?php echo $result['nama_produk']; ?></h3></td>
                                            <td class="p-2">Rp. <?php echo  formatHarga($result['harga_produk']); ?></td>
                                            <td class="p-2"><?php echo  $result['satuan_produk']; ?></td>
                                            <td class="p-2"><?php echo  $result['kategori_produk']; ?></td>
                                            <td class="p-2"><img src="../assets/img/<?php echo $result['gambar_produk'];?>"
                                                    alt="<?php echo $result['gambar_produk'];?>" class="w-[55px] lg:w-16 object-cover">
                                            </td>
                                            <td>
                                                <div class="flex items-center gap-2 mr-2">
                                                    <a href="./kelola.php?ubah=<?php echo $result['id_produk']; ?>"
                                                        class="bg-primary text-white rounded-lg w-10 h-10 hover:bg-transparent hover:ring-2 hover:ring-primary transition-all duration-200 group p-2"><svg
                                                            class=" mx-auto group-hover:text-primary"
                                                            style="vertical-align: middle;fill: currentColor;overflow: hidden;"
                                                            viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M834.3 705.7c0 82.2-66.8 149-149 149H325.9c-82.2 0-149-66.8-149-149V346.4c0-82.2 66.8-149 149-149h129.8v-42.7H325.9c-105.7 0-191.7 86-191.7 191.7v359.3c0 105.7 86 191.7 191.7 191.7h359.3c105.7 0 191.7-86 191.7-191.7V575.9h-42.7v129.8z" />
                                                            <path
                                                                d="M889.7 163.4c-22.9-22.9-53-34.4-83.1-34.4s-60.1 11.5-83.1 34.4L312 574.9c-16.9 16.9-27.9 38.8-31.2 62.5l-19 132.8c-1.6 11.4 7.3 21.3 18.4 21.3 0.9 0 1.8-0.1 2.7-0.2l132.8-19c23.7-3.4 45.6-14.3 62.5-31.2l411.5-411.5c45.9-45.9 45.9-120.3 0-166.2zM362 585.3L710.3 237 816 342.8 467.8 691.1 362 585.3zM409.7 730l-101.1 14.4L323 643.3c1.4-9.5 4.8-18.7 9.9-26.7L436.3 720c-8 5.2-17.1 8.7-26.6 10z m449.8-430.7l-13.3 13.3-105.7-105.8 13.3-13.3c14.1-14.1 32.9-21.9 52.9-21.9s38.8 7.8 52.9 21.9c29.1 29.2 29.1 76.7-0.1 105.8z" />
                                                        </svg></a>
                                                        <!--TOMBOL HAPUS DATA START -->
                                                    <a href="#" data-href="./proses.php?hapus=<?php echo $result['id_produk']; ?>"
                                                            class="del-btn bg-red-600 text-white rounded-lg w-10 h-10 p-2 hover:bg-transparent hover:ring-2 hover:ring-red-600 transition-all duration-200 group"><svg
                                                            class="w-full group-hover:text-red-600"
                                                            style="vertical-align: middle;fill: currentColor;overflow: hidden;"
                                                            viewBox="0 0 1024 1024">
                                                            <path
                                                                d="M938.666667 313.6H85.333333c-17.066667 0-32-14.933333-32-32s14.933333-32 32-32h853.333334c17.066667 0 32 14.933333 32 32s-14.933333 32-32 32zM413.866667 789.333333c-17.066667 0-32-14.933333-32-32V424.533333c0-17.066667 14.933333-32 32-32s32 14.933333 32 32v332.8c0 17.066667-12.8 32-32 32zM622.933333 789.333333c-17.066667 0-32-14.933333-32-32V424.533333c0-17.066667 14.933333-32 32-32s32 14.933333 32 32v332.8c0 17.066667-14.933333 32-32 32z" />
                                                            <path
                                                                d="M753.066667 936.533333h-469.333334c-53.333333 0-96-42.666667-96-96V386.133333c0-17.066667 14.933333-32 32-32s32 14.933333 32 32v456.533334c0 17.066667 14.933333 32 32 32h469.333334c17.066667 0 32-14.933333 32-32V386.133333c0-17.066667 14.933333-32 32-32s32 14.933333 32 32v456.533334c0 51.2-42.666667 93.866667-96 93.866666z" />
                                                            <path
                                                                d="M753.066667 288c-17.066667 0-32-14.933333-32-32 0-55.466667-44.8-100.266667-100.266667-100.266667h-206.933333c-55.466667 0-100.266667 44.8-100.266667 100.266667 0 17.066667-14.933333 32-32 32s-32-14.933333-32-32c0-89.6 72.533333-164.266667 164.266667-164.266667h206.933333c89.6 0 164.266667 72.533333 164.266667 164.266667 0 17.066667-14.933333 32-32 32z" />
                                                        </svg>
                                                    </a>
                                                    <!--TOMBOL HAPUS DATA END-->
                                                </div>
                                            </td>
                                        </tr>

                                        <?php 
                                        }
                                    ?>



                                    </tbody>
                                </table>
                            </div>
                        </section>
                    </div>
                </div>

            </div>

        </div>

       
    </main>
    <?php endif; ?>

      <!-- Script CDN Flowbite -->
      <script type="module" src="../script.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!--JIKA PENGGUNA TELAH LOGIN MAKA AKAN MUNCUL ALERT SELAMAT DATANG-->
     <?php if(isset($_SESSION['id_user']) == '3' && isset($_SESSION['show_alert'])): ?>
        <script>
            Swal.fire({
                title: "Atmin telah tiba!",
                text: "Selamat datang wahai atmin yang terhormat",
                imageUrl: "../assets/img/symboli-rudolf-3.gif",
                imageWidth: 160,
                showConfirmButton: true,
                confirmButtonText: "Cihuyy",
                confirmButtonColor: "#FB8C00"
            })
        </script>    
     <?php unset($_SESSION['show_alert']); endif; ?>

    <!--JIKA PENGGUNA BELUM LOGIN/ TIDAK LOGIN MENGGUNAKAN USER 'admin' MAKA AKAN DILEMPAR KE HALAMAN LOGIN-->
     <?php if(!isset($_SESSION['id_user']) || $_SESSION['id_user'] !== '3'): ?>
        <script>
            Swal.fire({
                title: "Akses ditolak!",
                text: "Halaman ini hanya boleh diakses oleh user admin!",
                imageUrl: "../assets/img/goldship-2.gif",
                imageWidth: 160,
                showConfirmButton: true,
                confirmButtonColor: "#FB8C00",
                allowOutsideClick: false,
                allowEscapeKey: false
            }).then((result) => {
                if(result.isConfirmed){
                    window.location.href = './login.php';
                }
            })
          
        </script>
     <?php unset($_SESSION['id_user']); endif; ?>
     <script src="../js/search.js"></script>
</body>

</html>