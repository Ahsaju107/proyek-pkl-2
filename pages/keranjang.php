<?php session_start(); ?>
<?php 
   include "../koneksi.php";

   $id_user = $_SESSION['id_user'];
   $query2 = "SELECT * FROM tb_keranjang WHERE id_user='$id_user';";
   $query = "SELECT p.id_produk, p.nama_produk, p.harga_produk, p.gambar_produk FROM tb_keranjang k JOIN tb_produk p ON k.id_produk = p.id_produk WHERE k.id_user = '$id_user';";
   $sql = mysqli_query($conn, $query);
   $sql2 = mysqli_query($conn, $query2);
  
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Warung Orfevre - Keranjang</title>
    <link rel="shortcut icon" href="../assets/img/icon.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="../css/output.css">
</head>

<body class="bg-gray-100 font-secondary">
    <nav class="bg-orange-500 text-white shadow-[0_5px_8px_rgb(0,0,0,0.1)] w-full fixed top-0 z-50">
        <div class="container max-w-full flex justify-between p-3 items-center">
            <div class="flex gap-2 items-center">
                <a href="../index.php">
                    <svg class="" width="25px" viewBox="0 0 24 24" fill="none">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m5 12 6-6m-6 6 6 6m-6-6h14" />
                    </svg></a>
                <h1 class="font-semibold text-lg">Keranjang Saya <span class="font-normal">(1)</span></h1>
            </div>
            <div class="w-8">
                <a href="#"><svg class="w-7 " viewBox="0 0 32 32">
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
                    </svg></a>
            </div>
        </div>
    </nav>

    <main class="min-h-screen pt-8">
        <section class="pt-8">
            <div class="container max-w-full flex flex-col lg:flex-row lg:px-3">
                <div class="list-card px-2 flex flex-col gap-3 lg:w-2/3">

                    <?php while($row = mysqli_fetch_assoc($sql) and  $result = mysqli_fetch_assoc($sql2)){ ?>
                    <div
                     data-id="<?php echo $result['id_keranjang']; ?>"
                     data-jumlah="<?php echo $result['jumlah_produk']; ?>"
                     data-harga = "<?php echo $row['harga_produk']; ?>"
                     class="card relative flex gap-3 bg-white p-3 rounded-lg shadow-[0_5px_5px_rgb(0,0,0,0.1)]">
                        <!-- Checkbox -->
                        <div class="flex items-center">
                            <label for="produk_<?php echo $row['nama_produk'];?>" class="inline-flex items-center">
                                <input type="checkbox"
                                    id="produk_<?php echo $row['nama_produk']; ?>" class="cart-checkbox appearance-none peer" value="<?php echo $result['id_keranjang']; ?>">
                                <span
                                    class="flex items-center justify-center w-6 h-6 border-2 border-gray-300 peer-checked:bg-orange-500 peer-checked:border-orange-500 rounded-md">
                                    <svg fill="currentColor" class="text-white w-3" viewBox="0 0 78.369 78.369">
                                        <path d="M78.049,19.015L29.458,67.606c-0.428,0.428-1.121,0.428-1.548,0L0.32,40.015c-0.427-0.426-0.427-1.119,0-1.547l6.704-6.704
                        c0.428-0.427,1.121-0.427,1.548,0l20.113,20.112l41.113-41.113c0.429-0.427,1.12-0.427,1.548,0l6.703,6.704
                        C78.477,17.894,78.477,18.586,78.049,19.015z" />
                                    </svg>
                                </span>
                            </label>
                        </div>

                        <!-- Gambar Produk -->
                        <img src="../assets/img/<?php echo $row['gambar_produk'];?>"
                            alt="<?php echo $row['nama_produk'];?>" class="w-[120px] rounded-lg ">

                        <!-- Info Produk -->
                        <div class="flex flex-col justify-between w-full relative">
                            <div class="judul-produk items-start">
                                <h2 class="font-primary ml-2 font-semibold text-lg"><?php echo $row['nama_produk']; ?>
                                </h2>
                                <h3 class="ml-2 text-sm">Rp. <?php echo formatHarga($row['harga_produk']); ?></h3>
                            </div>

                            <!-- Kuantitas/jumalh produk -->
                            <div class="flex items-center gap-3">
                                <div 
                                    class="bg-gray-100 py-2 px-3 mt-2 flex gap-3 rounded-md shadow-[0_3px_3px_rgb(0,0,0,0.1)] w-max">
                                    <button class="min-button w-5">
                                        <svg fill="currentColor" viewBox="0 0 24 24" class="text-orange-600">
                                            <path d="M19,13H5a1,1,0,0,1,0-2H19a1,1,0,0,1,0,2Z"></path>
                                        </svg>
                                    </button>
                                    <label class="counterLabel"><?php echo $result['jumlah_produk']; ?></label>
                                    <button class="plus-btn w-5">
                                        <svg fill="currentColor" class="text-orange-600" viewBox="0 0 256 256">
                                            <path
                                                d="M228,128a12,12,0,0,1-12,12H140v76a12,12,0,0,1-24,0V140H40a12,12,0,0,1,0-24h76V40a12,12,0,0,1,24,0v76h76A12,12,0,0,1,228,128Z" />
                                        </svg>
                                    </button>
                                </div>

                                <a href="#" data-href="./proses.php?hapus_keranjang=<?php echo $result['id_keranjang']; ?>" class="del-btn mt-2 sm:hidden">
                                    <svg class="text-orange-600 w-7" viewBox="0 0 1024 1024" fill="currentColor">
                                        <path
                                            d="M938.666667 313.6H85.333333c-17.066667 0-32-14.933333-32-32s14.933333-32 32-32h853.333334c17.066667 0 32 14.933333 32 32s-14.933333 32-32 32zM413.866667 789.333333c-17.066667 0-32-14.933333-32-32V424.533333c0-17.066667 14.933333-32 32-32s32 14.933333 32 32v332.8c0 17.066667-12.8 32-32 32zM622.933333 789.333333c-17.066667 0-32-14.933333-32-32V424.533333c0-17.066667 14.933333-32 32-32s32 14.933333 32 32v332.8c0 17.066667-14.933333 32-32 32z" />
                                        <path
                                            d="M753.066667 936.533333h-469.333334c-53.333333 0-96-42.666667-96-96V386.133333c0-17.066667 14.933333-32 32-32s32 14.933333 32 32v456.533334c0 17.066667 14.933333 32 32 32h469.333334c17.066667 0 32-14.933333 32-32V386.133333c0-17.066667 14.933333-32 32-32s32 14.933333 32 32v456.533334c0 51.2-42.666667 93.866667-96 93.866666z" />
                                        <path
                                            d="M753.066667 288c-17.066667 0-32-14.933333-32-32 0-55.466667-44.8-100.266667-100.266667-100.266667h-206.933333c-55.466667 0-100.266667 44.8-100.266667 100.266667 0 17.066667-14.933333 32-32 32s-32-14.933333-32-32c0-89.6 72.533333-164.266667 164.266667-164.266667h206.933333c89.6 0 164.266667 72.533333 164.266667 164.266667 0 17.066667-14.933333 32-32 32z" />
                                    </svg>
                                </a>
                            </div>
                        </div>

                        <!-- Ikon Hapus -->
                        <a href="#" data-href="./proses.php?hapus_keranjang=<?php echo $result['id_keranjang'];?>" class="del-btn absolute top-2 right-2 hidden sm:block">
                            <svg class="text-orange-600 w-6" viewBox="0 0 1024 1024" fill="currentColor">
                                <path
                                    d="M938.666667 313.6H85.333333c-17.066667 0-32-14.933333-32-32s14.933333-32 32-32h853.333334c17.066667 0 32 14.933333 32 32s-14.933333 32-32 32zM413.866667 789.333333c-17.066667 0-32-14.933333-32-32V424.533333c0-17.066667 14.933333-32 32-32s32 14.933333 32 32v332.8c0 17.066667-12.8 32-32 32zM622.933333 789.333333c-17.066667 0-32-14.933333-32-32V424.533333c0-17.066667 14.933333-32 32-32s32 14.933333 32 32v332.8c0 17.066667-14.933333 32-32 32z" />
                                <path
                                    d="M753.066667 936.533333h-469.333334c-53.333333 0-96-42.666667-96-96V386.133333c0-17.066667 14.933333-32 32-32s32 14.933333 32 32v456.533334c0 17.066667 14.933333 32 32 32h469.333334c17.066667 0 32-14.933333 32-32V386.133333c0-17.066667 14.933333-32 32-32s32 14.933333 32 32v456.533334c0 51.2-42.666667 93.866667-96 93.866666z" />
                                <path
                                    d="M753.066667 288c-17.066667 0-32-14.933333-32-32 0-55.466667-44.8-100.266667-100.266667-100.266667h-206.933333c-55.466667 0-100.266667 44.8-100.266667 100.266667 0 17.066667-14.933333 32-32 32s-32-14.933333-32-32c0-89.6 72.533333-164.266667 164.266667-164.266667h206.933333c89.6 0 164.266667 72.533333 164.266667 164.266667 0 17.066667-14.933333 32-32 32z" />
                            </svg>
                        </a>
                    </div>
                    <?php } ?>
                    


                </div>

                <div class="checkout-card lg:w-1/3 mt-12 lg:mt-0">
                    <div
                        class="checkout-container w-full fixed bottom-0 z-20 right-0 left-0 lg:sticky lg:top-24 bg-orange-500 rounded-t-lg lg:rounded-md text-white">
                        <h2 class="p-3 font-primary text-xl font-bold">Ringkasan Belanja</h2>
                        <hr>
                        <div class="flex justify-between px-3 py-4">
                            <h2 class="font-primary font-semibold">Total Harga</h2>
                            <p class="font-semibold" id="totalHarga">Rp. 0</p>
                        </div>
                        <hr>
                        <div class="p-2 pt-3">
                            <form id="checkoutForm" action="./proses.php" method="POST">
                                <input type="hidden" name="aksi" value="start_checkout">
                                <button type="submit" name="checkout-button"
                                    class="bg-orange-400 font-bold font-primary rounded-lg w-full py-2" >Checkout</button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </section>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="../js/counter.js"></script>
    <script type="module" src="../script.js"></script>
    <script>
        document.getElementById('checkoutForm').addEventListener('submit', function(e){
            const checked = Array.from(document.querySelectorAll('.cart-checkbox:checked'));
            if(checked.length === 0){
                e.preventDefault();
                Swal.fire({
                    title: "Belum pilih produk",
                    text: "Pilih minimal 1 produk!"
                })
                return;
            }
            document.querySelectorAll('input[name="produk_ids[]"]').forEach(i => i.remove());

            checked.forEach(check => {
                const input = document.createElement('input');
                input.type = 'hidden';
                input.name = 'produk_ids[]';
                input.value = check.value;
                this.appendChild(input);
            })
        })
    </script>
    <?php if(!isset($_SESSION['id_user'])): ?>
         <script>
        Swal.fire({
            imageUrl: '../assets/img/kitasan-black.gif',
            imageWidth: 200,
            title: 'Belum Login',
            text: 'Mau belanja? Login dulu sana!',
            showConfirmButton: true,
            confirmButtonColor: '#FB8C00',
            confirmButtonText: 'Oke, Login',
            allowOutsideClick: false,
            allowEscapeKey: false
        }).then((result) => {
            if(result.isConfirmed){
                window.location.href = './login.php';
            }
        })
    </script>
    <?php unset($_SESSION['keranjang_alert']);endif; ?>

    <script>
        //FUNGSI UNTUK MENYESUAIKAN JARAK ANTARA LIST PRODUK DENGAN 'checkout-card' PADA UKURAN MOBILE
        function adjustBottomSpace(){
            const checkout = document.querySelector('.checkout-container');
            const list = document.querySelector('.list-card');
            if(!list);

            //MENGAMBIL TINGGI CHECKOUT (.checkout-container)
            rec = checkout.getBoundingClientRect(); //MENGAMBIL POSISI ELEMEN '.checkout-card'
            height = Math.ceil(rec.height);

            //MEMBERI PADDING BAWAH PADA LIST CARD AGAR ADA JARAK
            list.style.paddingBottom = (height + 12) + 'px';
        };

        // jalankan setelah semua sumber selesai dimuat
        addEventListener('load', adjustBottomSpace());
        addEventListener('resize', adjustBottomSpace());
    </script>
    
</body>

</html>