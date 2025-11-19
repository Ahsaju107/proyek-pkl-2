<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir Pembayaran - Warung Orfevre</title>
    <link rel="shortcut icon" href="../assets/img/icon.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/output.css">
</head>
<body class="selection:text-white selection:bg-primary font-secondary bg-orange-600">
    <section class="flex min-h-screen items-center justify-center text-white px-2">
        <form action="./proses.php" method="POST" class="w-full sm:w-[520px] pb-6 rounded-lg p-2">
            <div>
                <img src="../assets/img/special-week-1.gif" alt="special-week-1" class="w-[150px] mx-auto">
                <h1 class="text-3xl font-extrabold text-center mb-4">Formulir Pembayaran</h1>
                <div class="px-3">
                    <div class="mb-5 flex flex-col">
                        <label for="nama" class="label-checkout">Nama Lengkap</label>
                        <input type="text" name="nama" placeholder="Nama Lengkap" class="input-checkout">
                    </div>
    
                    <div class="flex flex-col sm:flex-row gap-2 w-full justify-center mb-4">
                        <div class="flex flex-col">
                            <label for="email" class="label-checkout">Email</label>
                            <input type="email" name="email" id="email" placeholder="Email" class="input-checkout">
                        </div>
                        <div class="flex flex-col">
                            <label for="phone" class="label-checkout">No Telp.</label>
                            <input type="number" name="phone" id="phone" placeholder="Nomor HP" class="input-checkout">
                        </div>
                    </div>
                    <div class="mb-4">
                        <label for="" class="label-checkout">Alamat</label>
                        <textarea name="alamat" class="text-black w-full h-24 rounded-lg focus:outline-none p-2 focus:ring-2 focus:ring-orange-400 focus:bg-gray-200"></textarea>
                    </div>
                        
                        <button type="submit" name="bayar" class="w-full bg-orange-500 rounded-lg py-2 font-semibold shadow-[0_4px_8px_rgb(0,0,0,0.1)]">Bayar</button>
                </div>

            </div>
        </form>
        
    </section>
    </body>
</html>