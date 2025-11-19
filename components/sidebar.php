                <div class="bg-primary/70 w-16 sm:h-screen sm:translate-x-0 -translate-x-full fixed top-0 left-0 bottom-0 py-5">
                    <!-- Tombol untuk membuka sidebar -->
                     <div class="flex flex-col justify-between h-full ">
                       <button data-drawer-target="default-sidebar" data-drawer-toggle="default-sidebar" aria-controls="default-sidebar" type="button">
                            <i class="fa-solid fa-dashboard text-white text-2xl"></i>
                        </button>
                        <form action="./proses.php" method="post" class="flex justify-center">
                            <button type="submit" name="keluar"><i class="fa-solid fa-right-from-bracket text-white text-2xl"></i></button>
                        </form>
                     </div>
                </div>

                <!-- Sidebar Start -->
                 <aside id="default-sidebar" aria-label="Sidebar"
                    class="bg-purple-700 w-64 sm:h-screen fixed bottom-0 top-0 left-0 z-40  overflow-y-auto transition-transform -translate-x-full text-white">
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
                             <a href="#"  class="flex items-center gap-3 w-full hover:bg-primary rounded-lg p-2 hover:-translate-y-1 transition-transform duration-150">
                                <i class="fa-solid fa-file"></i>
                                <h4 class="font-semibold">Laporan</h4>
                            </a>
                        </div>
                        <!-- Konten Group 2 -->
                        <div class="p-4">
                            <h3 class="font-primary text-white/55">Group 2</h3>
                             <a href="penjualan.php"  class="flex items-center gap-3 w-full hover:bg-primary rounded-lg p-2 hover:-translate-y-1 transition-transform duration-150">
                                <i class="fa-solid fa-money-bill-trend-up"></i>
                                <h4 class="font-semibold">Penjualan</h4>
                            </a>
                             <a href="pembelian.php"  class="flex items-center gap-3 w-full hover:bg-primary rounded-lg p-2 hover:-translate-y-1 transition-transform duration-150">
                                <i class="fa-solid fa-money-bill-transfer"></i>
                                <h4 class="font-semibold">Pembelian</h4>
                            </a>
                             <a href="biaya.php"  class="flex items-center gap-3 w-full hover:bg-primary rounded-lg p-2 hover:-translate-y-1 transition-transform duration-150">
                                <i class="fa-solid fa-money-bill-wave"></i>
                                <h4 class="font-semibold">Biaya</h4>
                            </a>
                        </div>
                        <!-- Konten Group 3 -->
                        <div class="p-4">
                            <h3 class="font-primary text-white/55">Group 3</h3>
                             <a href="./kontak.php"  class="flex items-center gap-3 w-full hover:bg-primary rounded-lg p-2 hover:-translate-y-1 transition-transform duration-150">
                                <i class="fa-solid fa-address-book"></i>
                                <h4 class="font-semibold">Kontak</h4>
                            </a>
                             <a href="./produk.php"  class="flex items-center gap-3 w-full hover:bg-primary rounded-lg p-2 hover:-translate-y-1 transition-transform duration-150">
                                <i class="fa-solid fa-truck"></i>
                                <h4 class="font-semibold">Produk</h4>
                            </a>
                        </div>
                        <!-- Konten Group 5-->
                        <div class="p-4">
                            <h3 class="font-primary text-white/55">Group 5</h3>
                             <a href="pengaturan.php"  class="flex items-center gap-3 w-full hover:bg-primary rounded-lg p-2 hover:-translate-y-1 transition-transform duration-150">
                                <i class="fa-solid fa-bars"></i>
                                <h4 class="font-semibold">Pengaturan</h4>
                            </a>
                        </div>

                    </div>
                </aside> 