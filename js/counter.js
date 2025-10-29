document.addEventListener('DOMContentLoaded', ()=> {
    const totalHargaEl = document.getElementById('totalHarga');

    function formatRupiah(angka){
        return "Rp. " + angka.toLocaleString("id-ID");
    }

    function updateTotal(){
        let total = 0;
        document.querySelectorAll('.card').forEach(card => {
            const checkbox = card.querySelector("input[type=checkbox]");
            const harga = parseInt(card.dataset.harga);
            const jumlah = parseInt(card.querySelector('.counterLabel').textContent);

            if(checkbox.checked){
                total += jumlah * harga;
            }

            totalHargaEl.textContent = formatRupiah(total);
        })
    }

    document.querySelectorAll('.card').forEach(card => {
        let angka = parseInt(card.dataset.jumlah);
        const plusBtn = card.querySelector('.plus-btn');
        const minBtn = card.querySelector('.min-button');
        const labelCounter = card.querySelector('.counterLabel');
        const idKeranjang = card.dataset.id;
        const checkbox = card.querySelector("input[type=checkbox]");

        labelCounter.textContent = angka;

        function updateDB(jumlah){
            let formData = new FormData();
            formData.append("update_jumlah", "true");
            formData.append("id_keranjang", idKeranjang);
            formData.append("jumlah", jumlah);

            fetch("./proses.php", {
                method: "POST",
                body: formData
            })
            .then(res => res.text())
            .then(() => updateTotal());
        }

        plusBtn.addEventListener('click', () => {
            angka++;
            labelCounter.textContent = angka;
            updateDB(angka);
        });

        minBtn.addEventListener('click', () => {
            if(angka > 1){
                angka--;
                labelCounter.textContent = angka;
                updateDB(angka);
            }
        })
        checkbox.addEventListener('change', updateTotal)

    })

    updateTotal();
})