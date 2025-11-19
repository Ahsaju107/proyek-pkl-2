const actionBtn = document.querySelector('.action-btn');
const pembayaranBtn = document.querySelector('#pembayaran-btn-page');
const transaksiBtn = document.querySelector('#transaksi-btn-page');
const pembungkusTransaksi = document.querySelector('.pembungkus-transaksi');
const pembungkusPembayaran = document.querySelector('.pembungkus-pembayaran');

actionBtn.addEventListener('click', () =>{
    const show_actions = document.querySelector('.show-action');

    if(show_actions.classList.contains('hidden')){
        show_actions.classList.remove('hidden');
        show_actions.classList.add('flex');
    } else {
        show_actions.classList.add('hidden');
        show_actions.classList.remove('flex');
    }
});

function setPage(page){
    if(page == 'transaksi'){
        pembungkusPembayaran.classList.add('hidden');
        transaksiBtn.classList.add('bg-primary', 'text-white');
        pembungkusTransaksi.classList.remove('hidden');
        pembayaranBtn.classList.remove('bg-primary', 'text-white');
    } else {
        pembungkusPembayaran.classList.remove('hidden');
        pembungkusTransaksi.classList.add('hidden');
        transaksiBtn.classList.remove('bg-primary', 'text-white');
        pembayaranBtn.classList.add('bg-primary', 'text-white');
    }

    localStorage.setItem("currentPage",page);
}

transaksiBtn.addEventListener('click',() => setPage('transaksi'));
pembayaranBtn.addEventListener('click',() => setPage('pembayaran'));

const savedPage = localStorage.getItem("currentPage") || "pembayaran";
setPage(savedPage);