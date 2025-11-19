<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Warung Orfevre - Daftar</title>
    <link rel="shortcut icon" href="../assets/img/icon.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="../css/output.css">
</head>
<body class="selection:text-white selection:bg-primary font-secondary bg-gray-100">
    <section class="bg-[url('../assets/img/daftar-bg.jpg')]  bg-cover min-h-screen flex items-center justify-center p-3">
        
        <div class="bg-gradient-to-br from-my-pink to-orange-300/40
 backdrop-blur-sm w-full sm:w-[490px] rounded-lg shadow-[0_5px_9px_rgb(0,0,0,0.4)]">

            <form action="proses.php" method="post" class="pt-4">
                <img src="../assets/img/symboli-rudolf-4.gif" alt="symboli-rudolf-4" class="w-[120px] mx-auto mb-5">
                <h1 class="text-slate-100 text-center text-3xl font-bold font-primary mb-8">Daftar</h1>
                <div class="px-5">
                    <div class="text-gray-100 mb-5">
                        <label for="username-daftar" class="ml-2 font-semibold text-lg">Username</label>
                        <input type="text" id="username-daftar" name="username-daftar" placeholder="Nama" class="w-full bg-gray-200 rounded-full py-2 focus:outline-none focus:ring-2 focus:ring-my-pink px-4 text-black">
                    </div>
                    <div class="text-gray-100 mb-5">
                        <label for="password-daftar" class="ml-2 font-semibold text-lg">Password</label>
                        <input type="password" id="password-daftar" name="password-daftar" placeholder="Password" class="w-full bg-gray-200 rounded-full py-2 focus:outline-none focus:ring-2 focus:ring-my-pink px-4 text-black">
                    </div>
                    <div class="text-gray-100 mb-5">
                        <label for="email-daftar" class="ml-2 font-semibold text-lg">Email</label>
                        <input type="email" id="email-daftar" name="email-daftar" placeholder="email" class="w-full bg-gray-200 rounded-full py-2 focus:outline-none focus:ring-2 focus:ring-my-pink px-4 text-black">
                    </div>
                    <button type="submit" name="daftar" id="daftar-btn" class="font-bold text-white rounded-full w-full bg-gradient-to-r from-my-pink to-orange-300 py-2 mb-3">Daftar</button>
                    <p class="text-center text-sm text-gray-100 mb-6">Sudah punya akun? <a href="./login.php" class="font-semibold hover:text-my-pink">Login</a></p>
                </div>
                
            </form>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
           addEventListener('click', function(e){
    const username = document.getElementById('username-daftar').value.trim();
    const password = document.getElementById('password-daftar').value.trim();
    const email = document.getElementById('email-daftar').value.trim();

    console.log(email, password, username);

        if(username == '' || password == '' || email == ''){
            const btn = e.target.closest('#daftar-btn');
            if(!btn) return;
            e.preventDefault();    
            Swal.fire({
                title: "Input kosong",
                text: "Tolong masukkan form anda dengan benar!",
                imageUrl: '../assets/img/special-week-2.gif',
                imageWidth: 200,
                showConfirmButton: true,
                confirmButtonColor: "#fe3cfc",
            })
        }
    })

    
    </script>
    <?php if(isset($_SESSION['berhasil_daftar'])): ?>
        <script>
            Swal.fire({
                title: "Berhasil daftar!",
                text: '<?= $_SESSION['berhasil_daftar'];?>',
                imageUrl: "../assets/img/goldship-1.gif",
                imageWidth: 200,
                showConfirmButton: true,
                confirmButtonColor: "#fe3cfc",
                confirmButtonText: "Cihuyy"
            })
        </script>
    <?php unset($_SESSION['berhasil_daftar']); endif; ?>
</body>
</html>