document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('mahasiswaForm');
    const modalLabel = document.getElementById('formModalLabel');
    const modalBtn = document.getElementById('btn-modal');
    const addBtn = document.getElementById('btn-add');

    document.addEventListener('click', function (e) {
        if (e.target && e.target.id === 'btn-update') {
            e.preventDefault();

            var id = e.target.getAttribute('data-id');
            form.setAttribute('action', `http://localhost/Project/Data%20Mahasiswa%20MVC/public/Mahasiswa/update/${id}`);

            // Fungsi async untuk mengambil data
            async function fetchData() {
                try {
                    const response = await fetch('http://localhost/Project/Data%20Mahasiswa%20MVC/public/mahasiswa/getUpdate/' + id);
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    const data = await response.json();
                    console.log(data);

                    // Mengisi form dengan data yang diambil
                    document.getElementById('nama').value = data.nama;
                    document.getElementById('nim').value = data.nim;
                    document.getElementById('jurusan').value = data.jurusan;
                    document.getElementById('email').value = data.email;
                    // Tambahkan pengisian form lainnya sesuai dengan field yang ada


                } catch (error) {
                    console.error('Fetch error:', error);
                }
            }

            // Panggil fungsi async
            fetchData();

            // Set modal labels
            modalLabel.textContent = 'Ubah Data';
            modalBtn.textContent = 'Ubah';
        }
    });

    addBtn.addEventListener('click', function (e) {
        e.preventDefault();
        form.setAttribute('action', `http://localhost/Project/Data%20Mahasiswa%20MVC/public/Mahasiswa/add`);

        modalLabel.textContent = 'Tambah Data';
        modalBtn.textContent = 'Tambah';

        form.reset();
    });
});