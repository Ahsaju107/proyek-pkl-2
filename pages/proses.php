<?php 
    session_start();
    include "../koneksi.php";
    //FUNGSI MENAMBAH PRODUK
    if(isset($_POST['aksi'])){
        if($_POST['aksi'] == "add"){
            $namaProduk = $_POST['namaProduk'];
            $hargaProduk = $_POST['hargaProduk'];
            $satuanProduk = $_POST['satuanProduk'];
            $kategoriProduk = $_POST['kategoriProduk'];
            $gambarProduk = $_FILES['gambarProduk']['name'];
            
           $dir = dirname(__DIR__)."/assets/img/";
           $tmpFile = $_FILES['gambarProduk']['tmp_name'];
         
           move_uploaded_file($tmpFile, $dir.$gambarProduk);

            $query = "INSERT INTO tb_produk (nama_produk,harga_produk,satuan_produk,kategori_produk,gambar_produk) VALUES('$namaProduk','$hargaProduk','$satuanProduk','$kategoriProduk','$gambarProduk')";
            $sql = mysqli_query($conn, $query);

            if($sql){
                header("location: ../admin.php");
            } else {
                echo "waduh gagal";
            }

        } //FUNGSI EDIT PRODUK
        else if($_POST['aksi'] == "edit"){
            $id_produk = $_POST['idProduk'];
            $nama_produk = $_POST['namaProduk'];
            $harga_produk = $_POST['hargaProduk'];
            $satuanProduk = $_POST['satuanProduk'];
            $kategoriProduk = $_POST['kategoriProduk'];
            
            $queryShow = "SELECT * FROM tb_produk WHERE id_produk='$id_produk'";
            $sqlShow = mysqli_query($conn, $queryShow);
            $result = mysqli_fetch_assoc($sqlShow);

            if($_FILES['gambarProduk']['tmp_name'] != ""){
                $gambar_produk = $_FILES['gambarProduk']['name'];
                unlink('../assets/img/'.$result['gambar_produk']);
                move_uploaded_file($_FILES['gambarProduk']['tmp_name'], '../assets/img/'.$_FILES['gambarProduk']['name']);
            } else {
                 $gambar_produk = $result['gambar_produk'];
            }

            $query = "UPDATE tb_produk SET nama_produk='$nama_produk',harga_produk='$harga_produk',satuan_produk='$satuanProduk',kategori_produk='$kategoriProduk',gambar_produk='$gambar_produk' WHERE id_produk = '$id_produk';";
            $sql = mysqli_query($conn, $query);

            if($sql){
                header('location: ../admin.php');
                exit;
            } else {
                echo "error!";
            }
        }

    }

    //FUNGSI HAPUS PRODUK
    if(isset($_GET['hapus'])){
        $idProduk = $_GET['hapus'];

        $queryShow = "SELECT * FROM tb_produk WHERE id_produk='$idProduk'";
        $sqlShow = mysqli_query($conn, $queryShow);
        $result = mysqli_fetch_assoc($sqlShow);

        unlink("../assets/img/".$result['gambar_produk']);

        $query = "DELETE FROM tb_produk WHERE id_produk=$idProduk";
        $sql = mysqli_query($conn, $query);
        
        
        if($sql){
            header("Location: ../admin.php");
        } else {
            echo "gagal hapus";
        }
    }

    //FUNGSI LOGIN
    if(isset($_POST['login'])){
        $username = $_POST['username'];
        $password = $_POST['password'];

        $query = "SELECT * FROM tb_user WHERE username='$username' AND password='$password';";
        $sql = mysqli_query($conn, $query);
        $result = mysqli_fetch_assoc($sql);

        if($username == '' or $password == ''){
        } else {
           
            if($username == $result['username'] and $password == $result['password']){
              if($result['username'] == 'Admin'){
                $_SESSION['id_user'] = $result['#'];
                $_SESSION['session_username'] = $username;
                $_SESSION['session_password'] = $password;
                $_SESSION['show_alert'] = true;
                header("location: ../admin.php#product");
            } else {
                $_SESSION['id_user'] = $result['#'];
                $_SESSION['session_username'] = $username;
                $_SESSION['session_password'] = $password;
                $_SESSION['show_alert'] = true;
                header("location: ../index.php#product");
             }
            } 
             else {
             $_SESSION['error'] = "Username atau password salah!";
        header("Location: ./login.php");
        exit();
            }
        }
        
    }

    //FUNGSI DAFTAR USER
    if(isset($_POST['daftar'])){
        $username_daftar = $_POST['username-daftar'];
        $password_daftar = $_POST['password-daftar'];
        $email_daftar = $_POST['email-daftar'];
        
        if($username_daftar == '' or $password_daftar == '' or $email_daftar == ''){
        } else {
                $query = "INSERT INTO tb_user VALUES(null,'$username_daftar','$password_daftar','$email_daftar')";
                 $sql = mysqli_query($conn, $query);
            if($sql){
                $_SESSION['berhasil_daftar'] = "Selamat ".$username_daftar."! telah berhasil membuat akun";
                header("location: ./daftar.php");
            }
        }
    }

       //FUGNSI KELUAR AKUN
   if(isset($_POST['keluar'])){
    unset($_SESSION['id_user']);
    header("location: ../pages/login.php");
   }

    //FUNGSI MENAMBAHKAN PRODUK KE DALAM KERANJANG
    if(isset($_POST['tambah_keranjang'])){
        $id_user = $_SESSION['id_user'];
        $id_produk = $_POST['id_produk'];
        $qty = 1;

        if(!$id_user){
            $_SESSION['keranjang_alert'] = "login dulu";
            header('location: ../index.php');
            exit;
        } else{
            $cek = mysqli_query($conn, "SELECT id_produk,jumlah_produk FROM tb_keranjang WHERE id_user='$id_user' AND id_produk='$id_produk' LIMIT 1");

            //JIKA SUDAH ADA PRODUK YANG SAMA SUDAH ADA DI KERANJANG MAKA KUANTITASNYA AKAN DITAMBAHKAN
            if(mysqli_num_rows($cek) > 0){
                $result = mysqli_fetch_assoc($cek);
                $newJumlah = intval($result['jumlah_produk']) + $qty;
                $updateJumlah = mysqli_query($conn, "UPDATE tb_keranjang SET jumlah_produk='$newJumlah' WHERE id_user='$id_user' AND id_produk='$id_produk';");
                header("location: ../index.php");
            } //JIKA BELUM ADA PRODUK YANG SAMA DI KERANJANG MAKA AKAN DITAMBAHKAN
            else {
                
                $query = "INSERT INTO tb_keranjang VALUES(null, '$id_user', '$id_produk', 1)";
                $sql = mysqli_query($conn, $query);
                if($sql){
                    header("location: ../index.php");
                } else {
                    echo "ada error";
                }
            }
        }
        

    }

    //FUNGSI HAPUS KERANJANG
   if(isset($_GET['hapus_keranjang'])){

    $id_keranjang = $_GET['hapus_keranjang'];
    $query = "DELETE FROM tb_keranjang WHERE id_keranjang = '$id_keranjang';";
    $sql = mysqli_query($conn, $query);

    if($sql){
        header("Location: ./keranjang.php");
    }  else {
        echo "ERROR!!!!";
    }
   }

   //FUNGSI JUMLAH PRODUK KERANJANG
   if(isset($_POST['update_jumlah'])){
    $id_keranjang = $_POST['id_keranjang'];
    $jumlah_produk = $_POST['jumlah'];
    $id_user = $_SESSION['id_user'];

    
    $query = "UPDATE tb_keranjang SET jumlah_produk='$jumlah_produk' WHERE id_keranjang='$id_keranjang' AND id_user='$id_user';";
    $sql = mysqli_query( $conn, $query);

    if($sql){
        echo "ok";
    } else {
        echo "error";
    }
   }

  if(isset($_POST['aksi']) && $_POST['aksi'] == 'start_checkout'){
    if(!isset($_SESSION['id_user'])){
        header("Location: ../index.php");
        exit;
    }

    $id_user = $_SESSION['id_user'];
    $produk_ids = $_POST['produk_ids'] ?? [];

    $items = [];
    $total = 0;

    foreach($produk_ids as $id_keranjang){
        $id_keranjang = intval($id_keranjang);
        $query = "SELECT k.jumlah_produk, p.id_produk, p.nama_produk, p.harga_produk FROM tb_keranjang k JOIN tb_produk p ON k.id_produk = p.id_produk WHERE k.id_keranjang = '$id_keranjang' AND k.id_user = '$id_user' LIMIT 1";
        $sql = mysqli_query($conn, $query);
        
        if($result = mysqli_fetch_assoc($sql)){
            $subtotal = $result['jumlah_produk'] * $result['harga_produk'];
            $items[] = [
                'id_produk' => $result['id_produk'],
                'nama' => $result['nama_produk'],
                'harga' => $result['harga_produk'],
                'jumlah' => $result['jumlah_produk'],
                'subtotal' => $subtotal
            ];
            $total += $subtotal;
        }
    }
    $_SESSION['checkout'] = [
        'items' => $items,
        'total' => $total
    ];
    header("location: ./checkout-form.php");
}

if(isset($_POST['bayar'])){
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $alamat = $_POST['alamat'];
    $checkout = $_SESSION['checkout'];
    $biaya = $checkout['total'];
    $produk = $checkout['items'];

    $query = "INSERT INTO tb_transaksi (nama_customer, alamat_customer, biaya_transaksi, email_customer, phone_customer) VALUES('$nama', '$alamat', '$biaya', '$email', '$phone')";
    $sql = mysqli_query($conn, $query);

    if($sql){
    echo "<b>transaksi berhasil!</b>"."<br>";

    echo "<b>nama</b>: ".$nama.", <br>";
    echo "<b>alamat</b>: ".$alamat.", <br>";
    echo "<b>produk dibeli</b>: ";
    foreach($produk as $nama_produk){
        echo $nama_produk['nama'].", ";
    };
    echo "<br> <b>Total biaya</b>: Rp.".formatHarga($biaya).", <br>";
    echo "<b>email</b>: ".$email.", <br>";
    echo "<b>phone</b>: ".$phone.", <br>";
    echo "<a href='../index.php'>Kembali</a>";
    } else {
        echo "ada error: ".mysqli_error($conn);
    }
}

// FUNGSI UNTUK SATUAN
if(isset($_POST['aksi'])){
    // MENAMBAH SATUAN
    if($_POST['aksi'] == 'add_satuan'){
        $nama_satuan = $_POST['nama_satuan'];
        $query = "INSERT INTO tb_satuan (nama_satuan) VALUES ('$nama_satuan')";
        $sql = mysqli_query($conn, $query);
        
        if($sql){
            header("Location: ../views/kelola_1.php?satuan");
        } else {
             echo "ada error: ".mysqli_error($conn);
        }
    } 
    // MENGEDIT SATUAN
    elseif ($_POST['aksi'] == 'edit_satuan') {
        $nama_satuan = $_POST['edit_nama_satuan'];
        $id_satuan = $_POST['idSatuan'];

        $query = "UPDATE tb_satuan SET nama_satuan = '$nama_satuan' WHERE id_satuan = '$id_satuan'";
        $sql = mysqli_query($conn, $query);

        if($sql){
            header("location: ../views/kelola_1.php?satuan");
        } else {
             echo "ada error: ".mysqli_error($conn);
        }
    }
    // MENAMBAHKAN KATEGORI
    elseif($_POST['aksi'] == 'add_kategori'){
        $nama_kategori = $_POST['nama_kategori'];
        $query = "INSERT INTO tb_kategori (nama_kategori) VALUES ('$nama_kategori')";
        $sql = mysqli_query($conn, $query);
        if($sql){
            header('location: ../views/kelola_1.php?kategori');
        } else {
            echo "ada error: ".mysqli_error($conn);
        }
    }
    // MENGEDIT KATEGORI
    elseif($_POST['aksi'] == 'edit_kategori'){
        $nama_kategori = $_POST['edit_nama_kategori'];
        $id_kategori = $_POST['id_kategori'];
        $query = "UPDATE tb_kategori SET nama_kategori='$nama_kategori' WHERE id_kategori='$id_kategori'";
        $sql = mysqli_query($conn,$query);
        if($sql){
            header('location: ../views/kelola_1.php?kategori');
        } else {
            echo "ada error: ".mysqli_error($conn);
        }
    }
    // MENAMBAHKAN METODE PEMBAYARAN
    elseif($_POST['aksi'] == 'add_MP'){
        $metode_pembayaran = $_POST['MP'];
        $query = "INSERT INTO tb_metode_pembayaran (metode_pembayaran) VALUES ('$metode_pembayaran')";
        $sql = mysqli_query($conn,$query);
        if($query){
            header('location: ../views/kelola_1.php?metode_pembayaran');
        } else {
            echo "error : ".mysqli_error($conn);
        }
    }
    // MENGEDIT METODE PEMBAYARAN
    elseif($_POST['aksi'] == 'edit_MP'){
        $id_MP = $_POST['id_MP'];
        $metode_pembayaran = $_POST['edit_MP'];
        $query = "UPDATE tb_metode_pembayaran SET metode_pembayaran='$metode_pembayaran' WHERE id_metode_pembayaran='$id_MP'";
        $sql = mysqli_query($conn, $query);
        if($sql){
            header('location: ../views/kelola_1.php?metode_pembayaran');
        } else {
            echo "error: ".mysqli_error($conn);
        }
    }
    // MENAMBAHKAN OPSI PEMBAYARAN
    elseif($_POST['aksi'] == 'add_opsi_pembayaran'){
        $tempo_pembayaran = $_POST['add_tempo_pembayaran'];
        $lama_waktu = $_POST['add_lama_waktu'];
        $query = "INSERT INTO tb_opsi_pembayaran (tempo_pembayaran,lama_waktu) VALUES ('$tempo_pembayaran','$lama_waktu')";
        $sql = mysqli_query($conn,$query);
        if($sql){
            header('location: ../views/kelola_1.php?opsi_pembayaran');
        } else {
            echo "error: ".mysqli_error($conn);
        }
    }
    // MENGEDIT OPSI PEMBAYARAN
    elseif($_POST['aksi'] == 'edit_opsi_pembayaran'){
        $id_opsi_pembayaran = $_POST['id_opsi_pembayaran'];
        $tempo_pembayaran = $_POST['edit_tempo_pembayaran'];
        $lama_waktu = $_POST['edit_lama_waktu'];
        $query = "UPDATE tb_opsi_pembayaran SET tempo_pembayaran='$tempo_pembayaran',lama_waktu='$lama_waktu' WHERE id_opsi_pembayaran = '$id_opsi_pembayaran'";
        $sql = mysqli_query($conn,$query);
        if($sql){
            header('location: ../views/kelola_1.php?opsi_pembayaran');
        } else {
            echo "error: ".mysqli_error($conn);
        }
    }
    // MENAMBAHKAN TAGS TRANSAKSI
    elseif($_POST['aksi'] == 'add_tags_transaksi'){
        $tags_transaksi = $_POST['add_tags'];
        $query = "INSERT INTO tb_tags_transaksi (tags_transaksi) VALUES ('$tags_transaksi')";
        $sql = mysqli_query($conn,$query);
        if($sql){
            header('location: ../views/kelola_1.php?tags_transaksi');
        } else {
            echo "erorr: ".mysqli_error($conn);
        }
    }
    // MENGEDIT TAGS TRANSAKSI
    elseif($_POST['aksi'] == 'edit_tags_transaksi'){
        $id_tags = $_POST['id_tags'];
        $tags_transaksi = $_POST['edit_tags'];
        $query = "UPDATE tb_tags_transaksi SET tags_transaksi='$tags_transaksi' WHERE id_tags_transaksi = '$id_tags'";
        $sql = mysqli_query($conn,$query);
        if($sql){
            header('location: ../views/kelola_1.php?tags_transaksi');
        } else {
            echo "error: ".mysqli_error($conn);
        }
    }
    // MENGEDIT NILAI PAJAK
    elseif ($_POST['aksi'] == 'update_pajak') {
        $nilai_pajak = $_POST['nilai_pajak'];
        $nilai_pemotong = $_POST['nilai_pemotong'];
        $query = "UPDATE tb_pajak SET nilai_pajak='$nilai_pajak',nilai_pemotong='$nilai_pemotong'";
        $sql = mysqli_query($conn,$query);
        if($sql){
            header('location: ../pages/pengaturan.php');
        } else {
            echo "error: ".mysqli_error($conn);
        }
    }
}
// MENGHAPUS SATUAN
if(isset($_GET['hapus_satuan'])){
    $id_satuan = $_GET['hapus_satuan'];
    $query = "DELETE FROM tb_satuan WHERE id_satuan = '$id_satuan'";
    $sql = mysqli_query($conn,$query);

    if($sql){
        header('location: ../views/kelola_1.php?satuan');
    } else {
        echo "ada error: ".mysqli_error($conn);
    }
}
// MENGHAPUS KATEGORI
if(isset($_GET['hapus_kategori'])){
    $id_kategori = $_GET['hapus_kategori'];
    $query = "DELETE FROM tb_kategori WHERE id_kategori='$id_kategori'";
    $sql = mysqli_query($conn, $query);
    if($sql){
        header('location: ../views/kelola_1.php?kategori');
    } else {
        echo "ada error: ".mysqli_error($conn);
    }
}
// MENGHAPUS METODE PEMBAYARAN
if(isset($_GET['hapus_MP'])){
    $id_MP = $_GET['hapus_MP'];
    $query = "DELETE FROM tb_metode_pembayaran WHERE id_metode_pembayaran = '$id_MP'";
    $sql = mysqli_query($conn,$query);
    if($sql){
        header('location: ../views/kelola_1.php?metode_pembayaran');
    } else {
        echo "error: ".mysqli_error($conn);
    }
}
// MENGHAPUS OPSI PEMBAYARAN
if(isset($_GET['hapus_opsi_pembayaran'])){
    $id_opsi_pembayaran = $_GET['hapus_opsi_pembayaran'];
    $query = "DELETE FROM tb_opsi_pembayaran WHERE id_opsi_pembayaran = '$id_opsi_pembayaran'";
    $sql = mysqli_query($conn,$query);
    if($sql){
        header('location: ../views/kelola_1.php?opsi_pembayaran');
    } else {
        echo "error: ".mysqli_error($conn);
    }
}
// MENGHAPUS TAGS TRANSAKSI
if(isset($_GET['hapus_tags'])){
    $id_tags = $_GET['hapus_tags'];
    $query = "DELETE FROM tb_tags_transaksi WHERE id_tags_transaksi = '$id_tags'";
    $sql = mysqli_query($conn,$query);
    if($sql){
        header('location: ../views/kelola_1.php?tags_transaksi');
    } else {
        echo "error: ".mysqli_error($conn);
    }
}

?>