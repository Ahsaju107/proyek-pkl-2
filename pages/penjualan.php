<?php
    session_start();
    include '../koneksi.php';
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
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <style>
        /* Hover item pada dropdown Select2 */
        .select2-results__option--highlighted {
            background-color: #9333ea !important;
            color: white !important;
        }

        /* List option saat dipilih */
        .select2-results__option[aria-selected="true"] {
            background-color: #c084fc !important;
            color: white !important;
        }
        .select2-search__field:focus{
            outline: 2px solid #9333ea !important;
        }
        .select2-selection {
            background-color: transparent !important;
            width:100% !important;
            height: 100% !important;
            border: 1px solid #9333ea !important;
            backdrop-filter: blur(4px) !important;
            border-radius: 8px !important;
        }
        .select2-selection__rendered, .select2-selection__arrow {
            margin-top: 5px;
            font-size: 0.75rem;
            line-height: 1rem;
            color: #9333ea !important;
        }
        
</style>
</head>
<body class="selection:bg-primary selection:text-white font-secondary overflow-x-hidden">
    <!-- Navbar mobile Start -->
        <?php include '../components/navbar.php';?>
    <!--Navbar Mobile End-->

    <!-- Main content-->
    <main class="bg-[url('../assets/img/bg-dashboard.png')] bg-cover min-h-screen">
        <section class="flex flex-col min-h-screen">
            <div class="flex flex-1">
                <!-- sidebar start -->
                    <?php include '../components/sidebar.php';?>
                 <!-- sidebar end -->
                <!-- Konten utama Start-->
                <div class="w-full mt-16 md:mt-0 text-xs md:ml-16 px-4 sm:px-6 py-2 sm:py-4">
                    <!-- Container utama  -->
                    <div class=" w-full max-w-[1200px] mx-auto min-h-[calc(100vh-4rem)] flex flex-col bg-gray-100/50 rounded-lg p-5">
                        <div class="flex gap-1">
                            <i class="fa-solid fa-money-bill-trend-up text-primary text-2xl mt-2"></i>
                            <h1 class="text-3xl font-bold text-primary mb-4 mt-1">Penjualan</h1>
                        </div>
                        <div class="w-full h-1 mb-4 bg-primary"></div>
                        <div class="flex w-full border border-primary rounded-md mb-4">
                            <div id="transaksi-btn-page" class="w-1/2 border-r flex items-center justify-center border-primary p-2 text-center text-primary hover:text-white hover:bg-primary rounded-sm transition-all duration-100">
                                <button class="w-full flex items-center justify-center"><i class="fa-solid fa-file"></i>Transaksi</button>
                            </div>
                            <div id="pembayaran-btn-page" class="w-1/2 p-2 text-center text-primary hover:text-white hover:bg-primary rounded-r-sm duration-100 transition-all">
                                <button class="w-full flex items-center justify-center bg-red"><i class="fa-solid fa-file"></i>Pembayaran</button>
                            </div>
                        </div>
                        <!-- Pembungkus transaksi -->
                        <div class="pembungkus-transaksi">
                            <!-- Grid List -->
                            <div class="list-grid grid grid-cols-1 sm:grid-cols-3 gap-3 mb-3">
                                <!-- Card Penjualan Belum Terbayar -->
                                <div class="card bg-gray-100/60 p-3 rounded-lg border-r border-b-2 border-gray-400">
                                    <h3 class="font-primary text-red-500 mb-2">Penjualan Belum Terbayar</h3>
                                    <div class="flex gap-4 text-gray-800/70 text-[12px]">
                                        <div>
                                            <p>Nominal</p>
                                            <p>Transaksi</p>
                                        </div>
                                        <div>
                                            <p>: Rp.0</p>
                                            <p>: 0</p>
                                        </div>
                                    </div>
                                    
                                </div>
                                <!-- Card Penjualan Jatuh Tempo-->
                                <div class="card bg-gray-100/60 p-3 rounded-lg border-r border-b-2 border-gray-400">
                                    <h3 class="font-primary text-primary mb-2">Penjualan Jatuh Tempo</h3>
                                    <div class="flex gap-4 text-gray-800/70 text-[12px]">
                                        <div>
                                            <p>Nominal</p>
                                            <p>Transaksi</p>
                                        </div>
                                        <div>
                                            <p>: Rp.0</p>
                                            <p>: 0</p>
                                        </div>
                                    </div>
                                    
                                </div>
                                <!-- Card Penjualan Pending -->
                                <div class="card bg-gray-100/60 p-3 rounded-lg border-r border-b-2 border-gray-400">
                                    <h3 class="font-primary text-yellow-500 mb-2">Penjualan Pending</h3>
                                    <div class="flex gap-4 text-gray-800/70 text-[12px]">
                                        <div>
                                            <p>Nominal</p>
                                            <p>Transaksi</p>
                                        </div>
                                        <div>
                                            <p>: Rp.0</p>
                                            <p>: 0</p>
                                        </div>
                                    </div>
                                    
                                </div>
    
                            </div>
                            <!-- Action Button -->
                            <div class="flex flex-wrap flex-col gap-3 mb-3">
                                <!-- Component Start -->
                                <div class="relative">
                                    <button type="button" class="action-btn bg-primary rounded-lg w-48 text-white py-3 px-3 text-[12px] flex justify-between items-center focus:outline-none">
                                        <span class="text-[12px] leading-none">
                                            <i class="fa-solid fa-gear"></i>
                                            Management Action
                                        </span>
                                        <svg class="w-4 h-4 mt-px ml-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                    <div class="show-action hidden absolute flex-col w-48 mt-1 drop-shadow-lg">
                                        <a class="flex items-center h-8 px-3 text-[12px] font-semibold bg-gray-100 hover:bg-primary hover:text-white gap-1 group" href="kelola_1.php?buat_penjualan"><i class="fa-solid fa-plus text-primary group-hover:text-white"></i>Buat Penjualan</a>
                                        <a class="flex items-center h-8 px-3 text-[12px] font-semibold bg-gray-100 hover:bg-primary hover:text-white gap-1 group" href="kelola_1.php?return_penjualan"><i class="fa-solid fa-plus text-primary group-hover:text-white"></i>Return Penjualan</a>
                                    </div>
                                </div>
    
                                <div class="flex gap-3">
                                    <!-- Semua Kontak -->
                                    <select name="" id="" class="select-style w-full sm:w-48 p-3 text-[12px] bg-transparent border border-primary text-primary focus:ring-2 focus:ring-primary/50 rounded-lg">
                                        <option value="">Semua Kontak</option>
                                    </select>
                                    <!-- Semua Status -->
                                    <select name="" class="select-style statusFilter w-full sm:w-48 p-3 text-[12px] bg-transparent border border-primary text-primary focus:ring-2 focus:ring-primary/50 rounded-lg">
                                        <option value="all-status">Semua Status</option>
                                        <option value="pending">Pending</option>
                                        <option value="approve">Approve</option>
                                        <option value="cancel">Cancel</option>
                                        <option value="jatuh-tempo">Jatuh Tempo</option>
                                        <option value="lunas">Lunas</option>
                                    </select>
                                </div>
                            
                            </div>
    
                           <!-- Search bar yang responsif -->
                            <div class="flex justify-end mb-3">
                                <div class="flex w-full sm:w-48">
                                    <div class="flex w-full rounded-lg bg-transparent border border-primary gap-2 px-2">
                                            <svg viewBox="0 0 24 24" class="w-4 sm:w-5 text-primary" fill="none">
                                                <path d="M15.7955 15.8111L21 21M18 10.5C18 14.6421 14.6421 18 10.5 18C6.35786 18 3 14.6421 3 10.5C3 6.35786 6.35786 3 10.5 3C14.6421 3 18 6.35786 18 10.5Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                        <input type="text" class="w-full bg-transparent py-2 text-xs sm:text-sm focus:outline-none" placeholder="Cari">
                                    </div>
                                </div>
                            </div>
    
                             <!-- Tabel Data Start -->
                                <div class="overflow-x-auto -mx-4 sm:mx-0">
                                    <div class="min-w-[640px] px-4 py-2">
                                        <table class="w-full">
                                            <thead class="text-left">
                                                <tr>
                                                    <th class="px-2 py-2 text-[11px] sm:text-xs font-medium">NO</th>
                                                    <th class="px-2 py-2 text-[11px] sm:text-xs font-medium">TANGGAL</th>
                                                    <th class="px-2 py-2 text-[11px] sm:text-xs font-medium">CODE</th>
                                                    <th class="px-2 py-2 text-[11px] sm:text-xs font-medium">PENERIMA</th>
                                                    <th class="px-2 py-2 text-[11px] sm:text-xs font-medium">JATUH TEMPO</th>
                                                    <th class="px-2 py-2 text-[11px] sm:text-xs font-medium">TYPE</th>
                                                    <th class="px-2 py-2 text-[11px] sm:text-xs font-medium">STATUS</th>
                                                    <th class="px-2 py-2 text-[11px] sm:text-xs font-medium">TOTAL TAGIHAN</th>
                                                    <th class="px-2 py-2 text-[11px] sm:text-xs font-medium">SISA TAGIHAN</th>
                                                    <th class="px-2 py-2 text-[11px] sm:text-xs font-medium">TAGS</th>
                                                </tr>
                                            </thead>
                                              <tbody class="divide-y divide-gray-200">
                                                <?php
                                                // Query untuk mengambil data penjualan dengan JOIN ke tabel detail
                                                $query = "SELECT 
                                                            jmp.*,
                                                            GROUP_CONCAT(DISTINCT jmpa.pm_item ORDER BY jmpa.pm_id SEPARATOR ', ') as items
                                                        FROM jur_main_pempen jmp
                                                        LEFT JOIN jur_main_pempen_adds jmpa ON jmp.fact_code = jmpa.pm_nomor
                                                        WHERE jmp.fact_type_trx = 'pen' 
                                                        GROUP BY jmp.fact_code
                                                        ORDER BY jmp.fact_tanggal DESC";
                                                
                                                $result = mysqli_query($conn, $query);
                                                
                                                if(!$result) {
                                                    echo "<tr><td colspan='10'>Error: " . mysqli_error($conn) . "</td></tr>";
                                                } else {
                                                    $no = 1;
                                                    
                                                    while($row = mysqli_fetch_assoc($result)):
                                                        // Tentukan status
                                                        $status_text = '';
                                                        $status_color = '';
                                                        
                                                        // Cek juga apakah sudah lunas
                                                        if($row['fact_tagihan'] == 0) {
                                                            $status_text = 'Lunas';
                                                            $status_color = 'text-green-500 font-semibold';
                                                        } else {
                                                            switch($row['fact_status']) {
                                                                case 'P':
                                                                    $status_text = 'Pending';
                                                                    $status_color = 'text-yellow-500';
                                                                    break;
                                                                case 'A':
                                                                    $status_text = 'Approved';
                                                                    $status_color = 'text-blue-500';
                                                                    break;
                                                                case 'R':
                                                                    $status_text = 'Rejected';
                                                                    $status_color = 'text-red-500';
                                                                    break;
                                                            }
                                                        }
                                                        
                                                        // Tentukan type display berdasarkan fact_auto
                                                        $type_text = 'Penjualan';
                                                        if($row['fact_auto'] == 'B') {
                                                            $type_text = 'Penjualan By POS';
                                                        }
                                                    ?>
                                                    <tr class="hover:bg-gray-100/60 dataContainer">
                                                        <td class="px-2 py-2 text-[11px] sm:text-xs"><?php echo $no++; ?></td>
                                                        <td class="px-2 py-2 text-[11px] sm:text-xs"><?php echo date('Y-m-d', strtotime($row['fact_tanggal'])); ?></td>
                                                        <td class="px-2 py-2 text-[11px] sm:text-xs">
                                                            <div class="text-red-500 font-medium"><?php echo $row['fact_code']; ?></div>
                                                            <div class="text-gray-500 text-[10px]">Transaksi Penjualan #<?php echo $row['fact_code']; ?></div>
                                                        </td>
                                                        <td class="px-2 py-2 text-[11px] sm:text-xs">
                                                            <div class="text-red-500"><?php echo $row['fact_datauser']; ?></div>
                                                            <?php if(!empty($row['fact_datauser_piutang'])): ?>
                                                            <div class="text-gray-500 text-[10px]">#<?php echo $row['fact_datauser_piutang']; ?></div>
                                                            <?php endif; ?>
                                                        </td>
                                                        <td class="px-2 py-2 text-[11px] sm:text-xs"><?php echo date('Y-m-d', strtotime($row['fact_tempo'])); ?></td>
                                                        <td class="px-2 py-2 text-[11px] sm:text-xs"><?php echo $type_text; ?></td>
                                                        <td class="px-2 py-2 text-[11px] sm:text-xs <?php echo $status_color; ?> item"><p><?php echo $status_text; ?></p></td>
                                                        <td class="px-2 py-2 text-[11px] sm:text-xs"><?php echo number_format($row['fact_total'], 0, ',', ','); ?></td>
                                                        <td class="px-2 py-2 text-[11px] sm:text-xs"><?php echo number_format($row['fact_tagihan'], 0, ',', ','); ?></td>
                                                        <td class="px-2 py-2 text-[11px] sm:text-xs"><?php echo $row['fact_tags']; ?></td>
                                                    </tr>
                                                    <?php 
                                                    endwhile;
                                                    
                                                    if(mysqli_num_rows($result) == 0) {
                                                        echo "<tr><td colspan='10' class='text-center py-4 text-gray-500'>Tidak ada data</td></tr>";
                                                    }
                                                }
                                                ?>
                                                <!-- BARIS DATA KOSONG BARU DITAMBAHKAN DI SINI -->
                                                <tr class="hidden data-kosong">
                                                    <td colspan="9" class="px-2 py-4 text-center text-gray-500 text-sm">
                                                        Tidak ada data yang ditemukan.
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                        </div>

                        <!-- Pembungkus Pembayaran -->
                        <div class="pembungkus-pembayaran">
                            <!-- Grid List -->
                            <div class="list-grid grid grid-cols-1 sm:grid-cols-2 gap-4 mb-3">
                            <!-- Card Penjualan Jatuh Tempo-->
                                <div class="card bg-gray-100/60 p-4 rounded-lg border-r border-b-2 border-gray-400">
                                    <h3 class="font-primary text-primary mb-2">Pembayaran Terbayar</h3>
                                    <div class="flex gap-4 text-gray-800/70 text-[12px]">
                                        <div>
                                            <p>Nominal</p>
                                            <p>Transaksi</p>
                                        </div>
                                        <div>
                                            <p>: Rp.0</p>
                                            <p>: 0</p>
                                        </div>
                                    </div>
                                    
                                </div>
                                <!-- Card Penjualan Pending -->
                                <div class="card bg-gray-100/60 p-4 rounded-lg border-r border-b-2 border-gray-400">
                                    <h3 class="font-primary text-yellow-500 mb-2">Pembayaran Pending</h3>
                                    <div class="flex gap-4 text-gray-800/70 text-[12px]">
                                        <div>
                                            <p>Nominal</p>
                                            <p>Transaksi</p>
                                        </div>
                                        <div>
                                            <p>: Rp.0</p>
                                            <p>: 0</p>
                                        </div>
                                    </div>
                                    
                                </div>
    
                            </div>
                            <div class="flex flex-wrap gap-3 mb-3">
                                <!-- Component Start -->
                                 <div class="flex gap-2 w-full sm:w-auto">
                                     <!-- Semua Kontak -->
                                     <select name="" id="" class="select-style w-1/2 sm:w-48 p-3 text-[12px] bg-transparent border border-primary text-primary focus:ring-2 focus:ring-primary/50 rounded-lg">
                                         <option value="">Semua Kontak</option>
                                     </select>
                                     <!-- Semua Status -->
                                     <select name="" class="select-style statusFilter w-1/2 sm:w-48 p-3 text-[12px] bg-transparent border border-primary text-primary focus:ring-2 focus:ring-primary/50 rounded-lg">
                                         <option value="all">Semua Status</option>
                                         <option value="pending">Pending</option>
                                         <option value="approve">Approve</option>
                                         <option value="cancel">Cancel</option>
                                         <option value="jatuh-tempo">Jatuh Tempo</option>
                                         <option value="lunas">Lunas</option>
                                     </select>
                                 </div>
                                 <div class="flex gap-2 w-full sm:w-auto">
                                     <!-- Semua Tahun -->
                                     <select name="" id="" class="select-style w-1/2 sm:w-48 p-3 text-[12px] bg-transparent border border-primary text-primary focus:ring-2 focus:ring-primary/50 rounded-lg">
                                        <option value="">Semua Tahun</option>
                                        <?php
                                         for ($i=20; $i <= 50; $i++) { 
                                        ?>
                                            <option value="">Tahun 20<?php echo $i;?></option>
                                        <?php
                                           }; 
                                        ?>
                                     </select>

                                     <!-- Semua Bulan -->
                                     <select name="" id="" class="select-style w-1/2 sm:w-48 p-3 text-[12px] bg-transparent border border-primary text-primary focus:ring-2 focus:ring-primary/50 rounded-lg">
                                         <option value="">Semua Bulan</option>
                                         <option value="">Januari</option>
                                         <option value="">Februari</option>
                                         <option value="">Maret</option>
                                         <option value="">April</option>
                                         <option value="">Mei</option>
                                         <option value="">Juni</option>
                                         <option value="">Juli</option>
                                         <option value="">Agustus</option>
                                         <option value="">September</option>
                                         <option value="">Oktober</option>
                                         <option value="">November</option>
                                         <option value="">Desember</option>
                                     </select>
                                 </div>
                            
                            </div>
    
                           <!-- Search bar yang responsif -->
                            <div class="flex justify-end mb-3">
                                <div class="flex w-full sm:w-48">
                                    <div class="flex w-full rounded-lg bg-transparent border border-primary gap-2 px-2">
                                            <svg viewBox="0 0 24 24" class="w-4 sm:w-5 text-primary" fill="none">
                                                <path d="M15.7955 15.8111L21 21M18 10.5C18 14.6421 14.6421 18 10.5 18C6.35786 18 3 14.6421 3 10.5C3 6.35786 6.35786 3 10.5 3C14.6421 3 18 6.35786 18 10.5Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                        <input type="text" class="w-full bg-transparent py-2 text-xs sm:text-sm focus:outline-none" placeholder="Cari">
                                    </div>
                                </div>
                            </div>
    
                             <!-- Tabel Data Start -->
                            <div class="overflow-x-auto -mx-4 sm:mx-0">
                                <div class="min-w-[640px] px-4 py-2">
                                    <table class="w-full">
                                        <thead class="text-left">
                                            <tr>
                                                <th class="px-2 py-2 text-[11px] sm:text-xs font-medium">NO</th>
                                                <th class="px-2 py-2 text-[11px] sm:text-xs font-medium">TANGGAL</th>
                                                <th class="px-2 py-2 text-[11px] sm:text-xs font-medium">CODE PAYMENT</th>
                                                <th class="px-2 py-2 text-[11px] sm:text-xs font-medium">CODE TAGIHAN</th>
                                                <th class="px-2 py-2 text-[11px] sm:text-xs font-medium">PENERIMA</th>
                                                <th class="px-2 py-2 text-[11px] sm:text-xs font-medium">STATUS</th>
                                                <th class="px-2 py-2 text-[11px] sm:text-xs font-medium">TOTAL PEMBAYARAN</th>
                                                <th class="px-2 py-2 text-[11px] sm:text-xs font-medium">TAGS</th>
                                                <th class="px-2 py-2 text-[11px] sm:text-xs font-medium">TYPE</th>
                                            </tr>
                                        </thead>
                                        <tbody class="divide-y divide-gray-200">
                                            <?php
                                            // Query untuk mengambil data pembayaran penjualan
                                            $query_payment = "SELECT * FROM jur_main_payment WHERE payment_type_trx = 'pen' ORDER BY payment_tanggal DESC";
                                            $result_payment = mysqli_query($conn, $query_payment);
                                            
                                            if(!$result_payment) {
                                                echo "<tr><td colspan='9'>Error: " . mysqli_error($conn) . "</td></tr>";
                                            } else {
                                                $no = 1;
                                                
                                                while($row = mysqli_fetch_assoc($result_payment)):
                                                    // Tentukan status
                                                    $status_text = '';
                                                    $status_color = '';
                                                    switch($row['payment_status']) {
                                                        case 'P':
                                                            $status_text = 'Pending';
                                                            $status_color = 'text-yellow-500';
                                                            break;
                                                        case 'A':
                                                            $status_text = 'Approved';
                                                            $status_color = 'text-green-500 font-semibold';
                                                            break;
                                                        case 'R':
                                                            $status_text = 'Rejected';
                                                            $status_color = 'text-red-500';
                                                            break;
                                                    }
                                                    
                                                    $type_text = ($row['payment_auto'] == 'A') ? 'Auto' : 'Manual';
                                                ?>
                                                <tr class="hover:bg-gray-100/60 dataContainer">
                                                    <td class="px-2 py-2 text-[11px] sm:text-xs"><?php echo $no++; ?></td>
                                                    <td class="px-2 py-2 text-[11px] sm:text-xs"><?php echo date('Y-m-d', strtotime($row['payment_tanggal'])); ?></td>
                                                    <td class="px-2 py-2 text-[11px] sm:text-xs">
                                                        <div class="text-red-500 font-medium"><?php echo $row['payment_code']; ?></div>
                                                        <div class="text-gray-500 text-[10px]">Pembayaran Penjualan</div>
                                                    </td>
                                                    <td class="px-2 py-2 text-[11px] sm:text-xs">
                                                        <div class="text-red-500"><?php echo $row['payment_invoice']; ?></div>
                                                    </td>
                                                    <td class="px-2 py-2 text-[11px] sm:text-xs">
                                                        <div class="text-red-500"><?php echo $row['payment_datauser']; ?></div>
                                                        <?php if(!empty($row['payment_email'])): ?>
                                                        <div class="text-gray-500 text-[10px]"><?php echo $row['payment_email']; ?></div>
                                                        <?php endif; ?>
                                                    </td>
                                                    <td class="px-2 py-2 text-[11px] sm:text-xs <?php echo $status_color; ?> item"><p><?php echo $status_text; ?></p></td>
                                                    <td class="px-2 py-2 text-[11px] sm:text-xs"><?php echo number_format($row['payment_total'], 0, ',', '.'); ?></td>
                                                    <td class="px-2 py-2 text-[11px] sm:text-xs"><?php echo $row['payment_tags']; ?></td>
                                                    <td class="px-2 py-2 text-[11px] sm:text-xs"><?php echo $type_text; ?></td>
                                                </tr>
                                                <?php 
                                                endwhile;
                                                
                                                if(mysqli_num_rows($result_payment) == 0) {
                                                    echo "<tr><td colspan='9' class='text-center py-4 text-gray-500'>Tidak ada data pembayaran</td></tr>";
                                                }
                                            }
                                            
                                            ?>
                                             <!-- BARIS DATA KOSONG BARU DITAMBAHKAN DI SINI -->
                                            <tr class="hidden data-kosong">
                                                <td colspan="9" class="px-2 py-4 text-center text-gray-500 text-sm">
                                                    Tidak ada data yang ditemukan.
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- Script CDN Flowbite -->
     <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="../js/main.js"></script>
    <!-- script filter data -->
    <!-- <script>
        document.addEventListener('DOMContentLoaded', () => {
            const statusFilter = document.querySelector('.statusFilter');
            const dataItems = document.querySelectorAll('.dataContainer');
            const tdKosong = document.querySelector('.data-kosong');
            
            statusFilter.addEventListener('change', (event) => {
                const selectedCategory = event.target.value;
                let visibleItemsCount = 0;
                dataItems.forEach((item) => {
                    const textItem = item.querySelector('p').textContent.toLowerCase();
                    if(selectedCategory === 'all-status' || textItem == selectedCategory){
                        item.style.display = 'table-row';
                        visibleItemsCount++;
                    } else {
                        item.style.display = 'none';
                    }
                })

                if(visibleItemsCount === 0){
                        tdKosong.style.display = 'table-row';
                } else {
                    tdKosong.style.display = 'none';
                }
            })


        
        })
    </script> -->

    <!-- styling select form using select2 -->
    <script>
        $(function(){

        // inisialisasi Select2
        $('.statusFilter').select2({ width: 'resolve' });

        // normalisasi status
        function normalize(text){
            text = String(text || '').toLowerCase().trim();

            if(text.includes('approved')) return 'approve';
            if(text.includes('reject')) return 'cancel';
            if(text.includes('jatuh')) return 'jatuh-tempo';

            // hapus spasi
            return text.split(' ').join('');
        }

        $(document).on('change', '.statusFilter', function(){
            const selected = this.value;
            const wrapper = $(this).closest('.pembungkus-transaksi, .pembungkus-pembayaran');
            let visible = 0;

            wrapper.find('.dataContainer').each(function(){
            const p = $(this).find('p').first().text();
            const status = normalize(p);

            const show =
                selected === '' ||
                selected === 'all' ||
                selected === 'all-status' ||
                selected === status;

            $(this).toggle(show);
            if(show) visible++;
            });

            wrapper.find('.data-kosong').toggle(visible === 0);
        });

        // supaya Select2 tetap memicu filter
        $(document).on('select2:select select2:unselect', '.statusFilter', function(){
            $(this).trigger('change');
        });

        });

    </script>
</body>
</html>