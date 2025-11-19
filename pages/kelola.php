<?php
    include "../koneksi.php";

        $id_produk = '';
        $nama_produk = '';
        $harga_produk = '';
        $satuan_produk = '';
        $kategori_produk = '';

    if(isset($_GET['ubah'])){
        $id_produk = $_GET['ubah'];
    
        $query = "SELECT * FROM tb_produk WHERE id_produk = '$id_produk';";
        $sql = mysqli_query($conn, $query);

        $result = mysqli_fetch_assoc($sql);

        $nama_produk = $result['nama_produk'];
        $harga_produk = $result['harga_produk'];
        $satuan_produk = $result['satuan_produk'];
        $kategori_produk = $result['kategori_produk'];
    }

    $querySatuan = "SELECT * FROM tb_satuan";
    $sqlSatuan = mysqli_query($conn,$querySatuan);
    $queryKategori = "SELECT * FROM tb_kategori";
    $sqlKategori = mysqli_query($conn,$queryKategori);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Warung orfevre - Kelola</title>
    <link rel="stylesheet" href="../css/output.css">
</head>
<body class="font-secondary bg-gray-100 bg-[url('../assets/img/bg-dashboard.png')] bg-cover">
   <section class="pt-4  px-3">
       <div class="container max-w-full">
           
           <form method="POST" action="proses.php" enctype="multipart/form-data" class="p-3 bg-primary sm:w-2/3 md:w-[535px] lg:w-[535px] mx-auto rounded-lg shadow-[0_5px_10px_rgb(0,0,0,0.3)]">
            <input type="hidden" value="<?php echo $id_produk; ?>" name="idProduk">
              <?php
               if(isset($_GET['ubah'])){
                ?>
            <div>
            <img src="../assets/img/Orfevre_(Concept).png" alt="orfevre" class="w-[100px] mx-auto">
            <h1 class="font-bold text-white text-center text-3xl mb-3">Update <span class="text-purple-400">Produk</span></h1>
        </div>
        <?php } else {
            ?>
             <div>
            <img src="../assets/img/Orfevre_(Concept).png" alt="orfevre" class="w-[100px] mx-auto">
            <h1 class="font-bold text-white text-center text-3xl mb-3">Tambahkan <span class="text-purple-400">Produk</span></h1>
        </div>
        <?php } ?>
          <div class="grid grid-cols-1 sm:grid-cols-2">
              <div class=" px-4 mb-8">
                  <label for="namaProduk" class="font-semibold text-white">Nama Produk :</label>
                  <input required id="namaProduk" name="namaProduk" type="text" value="<?php echo $nama_produk; ?>" placeholder="contoh: sate kambing" class="add-input w-full rounded-md py-1 px-5 focus:outline-none focus:ring-purple-200 focus:ring-2" required />
              </div>
              <div class="px-4 mb-8">
                  <label for="harga" class="font-semibold text-white">Harga :</label>
                  <input required id="harga" name="hargaProduk" type="number" value="<?php echo $harga_produk ?>" placeholder="contoh: 50000" class="add-input w-full rounded-md py-1 px-5 focus:outline-none focus:ring-purple-200 focus:ring-2" required/>
              </div>
             
              <div class="flex flex-wrap px-4 mb-8">
                  <label for="satuan" class="font-semibold text-white w-full">Satuan :</label>
                  <select name="satuanProduk" id="satuan" class="w-full rounded-lg py-2 px-4 focus:ring-2 focus:ring-purple-200 font-primary text-sm">
                    <?php while($resultSatuan = mysqli_fetch_assoc($sqlSatuan)){ ?>
                    <option value="<?php echo $resultSatuan['nama_satuan']; ?>"><?php echo $resultSatuan['nama_satuan']; ?></option>
                    <?php } ?>
                  </select>
              </div>

              <div class="flex flex-wrap px-4 mb-8">
                  <label for="kategori" class="font-semibold text-white w-full">Kategori :</label>
                  <select name="kategoriProduk" id="kategori" class="w-full rounded-lg py-2 px-4 focus:ring-2 focus:ring-purple-200 font-primary text-sm">
                    <?php while($resultKategori = mysqli_fetch_assoc($sqlKategori)){ ?>
                    <option value="<?php echo $resultKategori['nama_kategori']; ?>"><?php echo $resultKategori['nama_kategori']; ?></option>
                    <?php } ?>
                  </select>
              </div>
          </div>
            <div class="w-full px-4 mb-8">
                <label for="gambar" class="font-semibold text-white">Gambar :</label>
                <input <?php if(!isset($_GET['ubah'])){echo 'required'; } ?> id="gambar" name="gambarProduk" type="file" accept="image/*" class="file:rounded-lg file:border-none hover:file:bg-purple-400/70 file:bg-purple-400 file:text-white file:p-3 text-white" required />
            </div>

            <div class="flex gap-2 mb-7 px-2">
                <?php 
                    if(isset($_GET['ubah'])){
                ?>
                     
                <button type="submit" name="aksi" value="edit" class="edit-btn flex justify-center gap-1 text-white w-full bg-purple-700 hover:bg-purple-700/80 rounded-lg py-3   font-semibold font-primary  shadow-[0_2px_5px_rgb(0,0,0,0.1)]"><svg fill="currentColor"
	 width="20px" height="20px" viewBox="0 0 20 20" style="enable-background:new 0 0 20 20;" xml:space="preserve">
<path d="M17.8,5.5l-3.3-3.3C14.3,2.1,14.2,2,14,2H3.3C2.6,2,2,2.6,2,3.3v13.3C2,17.4,2.6,18,3.3,18h13.3c0.7,0,1.4-0.5,1.4-1.2V6.1
	C18,5.7,17.9,5.7,17.8,5.5z M7.3,3.3h5.3v3.3H7.3V3.3z M12.7,16.7H7.3v-5.3h5.3L12.7,16.7L12.7,16.7z M14,16.7v-5.3
	c0-0.7-0.6-1.3-1.3-1.3H7.3C6.6,10,6,10.6,6,11.3v5.3H3.3V3.3H6v3.3C6,7.4,6.6,8,7.3,8h5.3C13.4,8,14,7.4,14,6.7v-3l2.7,2.7v10.4
	L14,16.7L14,16.7z"/>
</svg>Simpan</button>
                <?php 
                    } else {
                ?>
 <button type="submit" name="aksi" value="add" class="add-btn flex justify-center gap-1 text-white w-full bg-purple-800 hover:bg-purple-800/80 rounded-lg py-3   font-semibold font-primary  shadow-[0_2px_5px_rgb(0,0,0,0.1)]"><svg fill="currentColor"
	 width="20px" height="20px" viewBox="0 0 20 20" style="enable-background:new 0 0 20 20;" xml:space="preserve">
<path d="M17.8,5.5l-3.3-3.3C14.3,2.1,14.2,2,14,2H3.3C2.6,2,2,2.6,2,3.3v13.3C2,17.4,2.6,18,3.3,18h13.3c0.7,0,1.4-0.5,1.4-1.2V6.1
	C18,5.7,17.9,5.7,17.8,5.5z M7.3,3.3h5.3v3.3H7.3V3.3z M12.7,16.7H7.3v-5.3h5.3L12.7,16.7L12.7,16.7z M14,16.7v-5.3
	c0-0.7-0.6-1.3-1.3-1.3H7.3C6.6,10,6,10.6,6,11.3v5.3H3.3V3.3H6v3.3C6,7.4,6.6,8,7.3,8h5.3C13.4,8,14,7.4,14,6.7v-3l2.7,2.7v10.4
	L14,16.7L14,16.7z"/>
</svg>Tambahkan</button>
                <?php
                    }
                ?>

                <a href="./produk.php" class="flex gap-1 justify-center text-white w-full bg-red-600 hover:bg-red-600/80 rounded-lg py-3  font-semibold font-primary  shadow-[0_2px_5px_rgb(0,0,0,0.1)]"><svg fill="currentColor" width="20" height="20" class="wd-icon-undo-l wd-icon" focusable="false" role="presentation" viewBox="0 0 24 24"><g fill-rule="evenodd"><path d="M9.372 8.4s.42.003.988.084c5.045.72 7.7 3.558 9.643 7.624-2.708-1.936-5.312-3.043-9.48-3.043H9.372v3.148l-5.375-5.374 5.375-5.374v2.934z" class="wd-icon-background"/><path fill-rule="nonzero" d="M8.873 8.748V6.171l-4.668 4.668 4.668 4.668v-2.734h1c3.62 0 6.541.801 8.893 2.482-1.687-3.531-4.653-5.835-9.035-6.461-.492-.07-.85-.046-.858-.046zm2-4.495v2.705c6.224 1.21 9.87 5.585 11.11 11.779.21 1.056-1.169 1.654-1.795.777-2.156-3.019-5.09-4.519-9.315-4.718v2.616c0 1.162-1.224 1.7-2.059.865l-6.38-6.38a1.5 1.5 0 0 1 0-2.116l6.38-6.38c.817-.817 2.059-.318 2.059.852z"/></g></svg>Batal</a>
            </div>

        </form>
    </div>
   </section>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="module" src="../script.js"></script>
</body>
</html>