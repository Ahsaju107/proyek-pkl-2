//FITUR SEARCH  START
const searchInput = document.querySelector('.search-input');
searchInput.addEventListener('keyup', filterSearch);

function filterSearch(e){
    const filter = e.target.value.toLowerCase();
    const produkItems = document.querySelectorAll('.produk-item');

    produkItems.forEach((item) => {
        const textProduk = item.querySelector('h3').textContent.toLowerCase();

        if(textProduk.indexOf(filter) !== -1){
            item.style.display = "table-row"; 
        } else {
             item.style.display = "none"; 
        }
    })
    console.log(filter);
}
//FITUR SEARCH END