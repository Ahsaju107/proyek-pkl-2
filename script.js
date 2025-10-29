
     function imagePopup(imageName){
        const imgName = imageName;
        const imgUrl = `${window.location.origin}/crud_php/assets/img/${imgName}`;
        return imgUrl;
     }
//POP UP TOMBOL HAPUS
addEventListener('click', function(e){
     const btn = e.target.closest('.del-btn');
     if (!btn) return;

     const url = btn.dataset.href;
    
    Swal.fire({
        title: "Yakin Mau Hapus?",
        imageUrl: imagePopup('tokai-teio-2.gif'),
        imageWidth: 150,
        text: "Data ini akan dihapus permanen!",
        showCancelButton: true,
        confirmButtonColor: "#9333ea",
        cancelButtonColor: "#E53935",
        confirmButtonText: "Ya, hapus!",
        cancelButtonText: "Batal",
        iconColor: "#FB8C00"
    }).then((result) => {
        if(result.isConfirmed){
            Swal.fire({
                title: "Yay, terhapus!",
                text: "Data produk berhasil dihapus permanen",
                imageUrl: imagePopup('agnes-tachyon-2.gif'),
                imageWidth: 200,
                showConfirmButton: true,
                confirmButtonText: "Cihuyy",
                confirmButtonColor: "#9333ea"
            }).then((result) => {
                if(result.isConfirmed){
                    window.location.href = url;
                }
            });
        }
    });
})

//POPUP TOMBOL EDIT 
addEventListener('click', function(e){
    const btn = e.target.closest('.edit-btn');
    if(!btn) return;

    e.preventDefault();
    const form = btn.closest('form');

    Swal.fire({
        title: "Edit Produk",
        text: "Produk berhasil diedit ke database",
        showConfirmButton: true,
        confirmButtonText: "Cihuyy",
        confirmButtonColor: "#9333ea",
        imageUrl: imagePopup('tokai-teio-1.gif'),
        imageWidth: 200
    }).then((result) => {
        if(result.isConfirmed){
            const hidden = this.document.createElement('input');
            hidden.type= 'hidden';
            hidden.name= btn.name;
            hidden.value = btn.value;
            form.appendChild(hidden);
            form.submit();
        }
    })
})

//POPUP MENAMBAHKAN PRODUK
addEventListener('click', function(e){
    const btn = e.target.closest('.add-btn');
    if(!btn) return;

    e.preventDefault();
    const form = btn.closest('form');

    const addInputs = form.querySelectorAll('.add-input');

    // mengecek apakah input kosong atau tidak
    let isEmpty = false;
    addInputs.forEach(input => {
        if(input.value.trim() === ''){
            isEmpty = true;
        }
    });

    if(isEmpty){
        Swal.fire({
            title: "Input Kosong!",
            text: "Tolong isi data dengan benar",
            showConfirmButton: true,
            confirmButtonText: "Oke",
            confirmButtonColor: "#9333ea",
            imageUrl: imagePopup('special-week-2.gif'),
            imageWidth: 150
        })
        return;
    }
    
    Swal.fire({
        title: "Tambahkan Data",
        text: "Data berhasil ditambahkan ke database!",
        showConfirmButton: true,
        confirmButtonText: "Cihuyy",
        confirmButtonColor: "#9333ea",
        imageUrl: imagePopup('chiyono-o.gif'),
        imageWidth: 200
    }).then((result) => {
        if(result.isConfirmed){
            const hidden = this.document.createElement('input');
            hidden.type= 'hidden';
            hidden.name= btn.name;
            hidden.value = btn.value;
            form.appendChild(hidden);
            form.submit();
        }
    })
})

//POPUP JIKA USER TIDAK MEMASUKKAN DATA
addEventListener('click', function(e){
    const username = document.getElementById('login-username').value.trim();
    const password = document.getElementById('login-password').value.trim();
    
    if(username == '' || password == ''){
        const btn = e.target.closest('#login-btn');
        if(!btn) return;
        e.preventDefault();    
        Swal.fire({
            title: "Input kosong",
            text: "Tolong masukkan username dan password anda dengan benar!",
            imageUrl: imagePopup('special-week-2.gif'),
            imageWidth: 200,
            showConfirmButton: true,
            confirmButtonColor: "#FB8C00",
        })
    }
})