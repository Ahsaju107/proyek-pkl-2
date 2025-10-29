<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Warung Orfevre - Login</title>
    <link rel="shortcut icon" href="../assets/img/icon.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    
    <link rel="stylesheet" href="../css/output.css">
</head>
<body class=" font-secondary">
    <section class="bg-[url('../assets/img/login-bg-1.jpg')] bg-cover min-h-screen px-3 flex items-center justify-center lg:justify-end">

        <div class="login-card bg-gradient-to-br from-orange-600 via-orange-600/60 to-slate-900/30  backdrop-blur-sm w-full sm:w-[450px] rounded-xl p-3 lg:mr-5 text-gray-100 shadow-[0_8px_10px_rgb(0,0,0,0.3)]">
            <img src="../assets/img/special-week-1.gif" alt="agnes-tachyon-2" class="w-[150px] mx-auto mb-2">
            <h2 class="text-center text-3xl font-extrabold font-primary mb-4">Login</h2>
            <form method="post" action="proses.php" class="px-3">
                <div class="mb-5">
                    <label for="login-username" class="ml-2 font-semibold">Username</label>
                    <input type="text" id="login-username" name="username" placeholder="contoh: user" class="w-full rounded-full px-4 bg-gray-200 text-black py-2 focus:outline-none focus:ring-2 focus:ring-orange-300">
                </div>
                <div class=" mb-5">
                    <label for="login-password" class="ml-2 font-semibold">Password</label>
                    <input type="password" id="login-password" name="password" placeholder="contoh: user123" class="w-full rounded-full px-4 bg-gray-200 text-black py-2 focus:outline-none focus:ring-2 focus:ring-orange-300">
                </div>
                <button type="submit" id="login-btn" name="login" value="Login" class="bg-gradient-to-br from-orange-600 via-orange-500 to-orange-300 p-3 w-full rounded-full font-bold mb-2">Login</button>

                <div class="flex justify-center gap-1 mb-5">
                    <p>Belum punya akun?</p>
                    <a href="./daftar.php" class="font-bold hover:text-orange-500">Daftar</a>
                </div>
            </div>
            </form>

    </section>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="module" src="../script.js"></script>

     <?php if (isset($_SESSION['error'])): ?>
    <script>
        Swal.fire({
            imageUrl: '../assets/img/kitasan-black.gif',
            imageWidth: 200,
            title: 'Login gagal',
            text: '<?= $_SESSION['error']; ?>',
            showConfirmButton: true,
            confirmButtonColor: '#FB8C00',
            confirmButtonText: 'Waduh'
        });
    </script>
    <?php unset($_SESSION['error']); endif; ?>
</body>
</html>