<?php session_start(); ?>
<?php 
    include "koneksi.php";

    $query = "SELECT * FROM tb_produk;";
    $sql = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Warung Orfevre - Home</title>
    <link rel="shortcut icon" href="./assets/img/icon.png" type="image/x-icon">
    <link rel="stylesheet" href="./css/output.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">
    <!-- FLOWBITE CDN-->
    <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />
</head>

<body class="font-secondary bg-gray-100 min-h-screen flex flex-col">
    <nav
        class="fixed top-0 z-10 bg bg-orange-600/80 backdrop-blur-md w-full flex justify-between p-3 lg:px-5 items-center">
        <div class="flex gap-2 items-center">
            <h4 class="text-gray-100 text-xl font-extrabold">Warung <span class="text-orange-300">Orfevre</span></h4>
            <img src="./assets/img/chibi-opera-1.png" alt="chibi-opera-1" class="w-7">
        </div>
        <div class="flex gap-2">
             <button id="dropDownHoverButton" data-dropdown-toggle="dropDownHover" data-dropdown-trigger="hover">
                <svg viewBox="0 0 24 24" class="w-8 text-white hover:text-orange-300">
                    <circle cx="12" cy="12" r="10" fill="none" stroke="currentColor" stroke-width="1.5"/>
                    <circle cx="12" cy="9" r="2.5" fill="currentColor"/>
                    <path d="M6.5 18c0-2.2 2.7-4 5.5-4s5.5 1.8 5.5 4" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </button>

            <a class="account-user items-center" href="./pages/keranjang.php"><svg xmlns="http://www.w3.org/2000/svg"
                    class="w-7 text-white hover:text-orange-300" viewBox="0 0 32 32">
                    <defs>
                        <style>
                        .cls-1 {
                            fill: currentColor;
                        }
                        </style>
                    </defs>
                    <g id="shopping_bag" data-name="shopping bag">
                        <path class="cls-1"
                            d="M26.19,10.9A3.21,3.21,0,0,0,23,8H22a6.4,6.4,0,0,0-1.58-3.91,5.78,5.78,0,0,0-8.9,0A6.4,6.4,0,0,0,10,8H9a3.21,3.21,0,0,0-3.2,2.9L4.25,26.46A3.21,3.21,0,0,0,7.45,30h17.1a3.21,3.21,0,0,0,3.2-3.54Zm-.74,16.7a1.18,1.18,0,0,1-.9.4H7.45a1.18,1.18,0,0,1-.9-.4,1.17,1.17,0,0,1-.31-.94L7.8,11.1A1.21,1.21,0,0,1,9,10h2.12s.08,0,.13,0a1,1,0,0,0,.18-.07l.16-.1a.86.86,0,0,0,.14-.13.72.72,0,0,0,.11-.15,1.3,1.3,0,0,0,.08-.17.71.71,0,0,0,0-.2A.5.5,0,0,0,12,9s0,0,0-.06V8.87a4.41,4.41,0,0,1,1.06-3.46A4,4,0,0,1,16,4,4,4,0,0,1,19,5.41,4.41,4.41,0,0,1,20,8H15a1,1,0,0,0,0,2h8a1.21,1.21,0,0,1,1.21,1.1l1.56,15.56A1.17,1.17,0,0,1,25.45,27.6Z" />
                        <path class="cls-1" d="M11,11H10a1,1,0,0,0,0,2h1a1,1,0,0,0,0-2Z" />
                        <path class="cls-1" d="M22,11H21a1,1,0,0,0,0,2h1a1,1,0,0,0,0-2Z" />
                    </g>
                </svg>
            </a>

           

            <div id="dropDownHover" class="z-40 items-center flex justify-center text-center hidden w-44 h-32 bg-orange-500 shadow-[0_4px_5px_rgb(0,0,0,0.2)] rounded-l-lg text-white">
                <?php if(!isset($_SESSION['id_user'])){ ?>
                <div class="px-2 flex flex-col gap-3">
                    <h3 class="font-semibold">Belum Masuk</h3>
                    <a href="./pages/login.php" class="px-8 py-3 mb-3 font-semibold bg-orange-400 rounded-full shadow-[0_4px_5px_rgb(0,0,0,0.2)]">Masuk</a>
                </div>
                <?php } else {?>
                <div class="px-2 flex flex-col gap-3">
                    <h3 class="py-2 pt-4 font-semibold"><?php echo $_SESSION['session_username'] ?></h3>
                    <form action="./pages/proses.php" method="post">
                        <button type="submit" name="keluar" class="px-9 py-3 mb-3 font-semibold bg-orange-400 rounded-full shadow-[0_4px_5px_rgb(0,0,0,0.2)]">Keluar</button>
                    </form>
                </div>
                <?php } ?>
            </div>
        </div>
        
        </div>
    </nav>

    <main class="flex-1 mb-3">
        <section id="banner" class="px-3 pt-20 flex">
            <img src="./assets/img/banner.png" alt="banner" class="rounded-md">
        </section>

        <section id="search" class="pt-16">
            <div class="container max-w-full">
                <form class="flex justify-center">
                    <input class="search-input p-2 rounded-l-lg border-2 lg:px-16 md:px-16 bg-gray-200 focus:outline-none"
                        placeholder="Cari" type="text"/>
                    <button class="bg-orange-500 p-2 px-5 rounded-r-lg"><img class="w-5"
                            src="./assets/icon/search-icon.svg" /></button>
                </form>

            </div>
        </section>

        <section id="product" class="pt-14 px-2 lg:px-5">
            <div class="container max-w-full bg-gray-200 py-6  rounded-lg">
                <div class="list-card grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-2 px-3">

                    <?php 
                while($result = mysqli_fetch_assoc($sql)){
                     ?>
                    <div
                        class="relative produk-item  overflow-hidden hover:ring-2 hover:ring-orange-500 rounded-lg shadow-[0_5px_10px_rgb(0,0,0,0.3)]">
                        <img src="./assets/img/<?php echo $result['gambar_produk']; ?>"
                            class="w-full h-52 object-cover">

                        <div class=" absolute bottom-0 px-2 w-full pt-24"  style="background: linear-gradient(to top, rgba(249,115,22,0.95) 0%, rgba(249,115,22,0.9) 30%, rgba(249,115,22,0) 100%);">
                            <h3 class="text-lg font-bold font-primary text-gray-100">
                                <?php echo $result['nama_produk']; ?></h3>
                            <div class="flex justify-between pb-3">

                                <div class="flex gap-1">
                                    <a><img src="./assets/icon/money-icon.svg" alt="money-icon" class="w-6" /></a>
                                    <h4 class="font-semibold text-white text-sm">Rp.
                                        <?php echo formatHarga($result['harga_produk']); ?></h4>
                                </div>
                                <form action="./pages/proses.php" method="post">
                                    <input type="hidden" name="id_produk" value="<?php echo $result['id_produk']; ?>">
                                    <button type="submit" name="tambah_keranjang" class="group tambah_keranjang text-white">
                                        <svg 
                                            class="w-6 mr-2 group-hover:text-orange-300" viewBox="0 0 32 32">
                                            <defs>
                                                <style>
                                                .cls-1 {
                                                    fill: currentColor;
                                                }
                                                </style>
                                            </defs>
                                            <g id="shopping_cart" data-name="shopping cart">
                                                <path class="cls-1"
                                                    d="M29.74,8.32A1,1,0,0,0,29,8H13a1,1,0,0,0,0,2H27.91l-.81,9.48a1.87,1.87,0,0,1-2,1.52H12.88a1.87,1.87,0,0,1-2-1.52L10,8.92l0-.08s0-.06,0-.08L9.33,6.2A3.89,3.89,0,0,0,7,3.52L3.37,2.07a1,1,0,0,0-.74,1.86L6.25,5.38a1.89,1.89,0,0,1,1.14,1.3L8,9.16l.9,10.49a3.87,3.87,0,0,0,4,3.35H13v2.18a3,3,0,1,0,2,0V23h8v2.18a3,3,0,1,0,2,0V23h.12a3.87,3.87,0,0,0,4-3.35L30,9.08A1,1,0,0,0,29.74,8.32ZM14,29a1,1,0,1,1,1-1A1,1,0,0,1,14,29Zm10,0a1,1,0,1,1,1-1A1,1,0,0,1,24,29Z" />
                                                <path class="cls-1" d="M15,18V13a1,1,0,0,0-2,0v5a1,1,0,0,0,2,0Z" />
                                                <path class="cls-1" d="M20,18V13a1,1,0,0,0-2,0v5a1,1,0,0,0,2,0Z" />
                                                <path class="cls-1" d="M25,18V13a1,1,0,0,0-2,0v5a1,1,0,0,0,2,0Z" />
                                            </g>
                                        </svg>
                                    </button>
                                </form>
                            </div>

                        </div>
                    </div>
                    <?php 
                    }
                   ?>

                </div>
            </div>
        </section>
    </main>

    <!--FOOTER START -->
    <footer class="bg-orange-600 p-3 text-center">
        <div class="flex gap-3 justify-center items-center">
            <h1 class="font-primary text-gray-100 font-extrabold text-2xl">Warung <span
                    class="text-orange-400">Orfevre</span></h1>
            <img src="./assets/img/chibi-opera-1.png" alt="chibi-opera-1" class="w-8" />
        </div>
        <p class="text-sm">&copy; 2025 Warung Orfevre. All Rights Reserved.</p>
    </footer>
    <!--FOOTER END -->

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!--FLOWBITE CDN-->
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>

    <script src="./js/search.js"></script>
    <?php if(isset($_SESSION['session_username']) && isset($_SESSION['show_alert'])): ?>
        <script>
            Swal.fire({
                title: "Selamat datang!",
                text: "Selamat datang <?= $_SESSION['session_username']?>! Selamat berbelanja",
                imageUrl: "./assets/img/symboli-rudolf-3.gif",
                imageWidth: 160,
                showConfirmButton: true,
                confirmButtonText: "Cihuyy",
                confirmButtonColor: "#FB8C00"
            })
        </script>    
    <?php unset($_SESSION['show_alert']); endif; ?>

    <?php if(isset($_SESSION['keranjang_alert'])): ?>
     <script>
        Swal.fire({
            imageUrl: './assets/img/kitasan-black.gif',
            imageWidth: 200,
            title: 'Belum Login',
            text: 'Mau belanja? Login dulu sana!',
            showConfirmButton: true,
            confirmButtonColor: '#FB8C00',
            confirmButtonText: 'Oke, Login'
        }).then((result) => {
            if(result.isConfirmed){
                window.location.href = './pages/login.php';
            }
        })
    </script>
    <?php unset($_SESSION['keranjang_alert']);endif;?>

</body>

</html>