// Fungsi untuk tombol "Lanjut Pembayaran"
function lanjutPembayaran() {
    // 1. Ambil Element Input
    var inputNama = document.getElementById('inputNama');
    var inputEmail = document.getElementById('inputEmail');
    var inputNominal = document.getElementById('inputNominal');
    var inputMetode = document.getElementById('inputMetode');

    // 2. Ambil Value
    var nama = inputNama.value;
    var email = inputEmail.value;
    var nominal = inputNominal.value;
    var metode = inputMetode.value;

    // 3. Validasi Sederhana (Wajib isi)
    if (nama === "" || email === "" || nominal === "") {
        alert("Harap lengkapi Nama, Email, dan Nominal donasi.");
        return;
    }

    // 4. Generate HTML Info Pembayaran sesuai pilihan
    var kontenHtml = "";

    if (metode === "qris") {
        kontenHtml = `
            <h4>Scan QRIS Berikut:</h4>
            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/d/d0/QR_code_for_mobile_English_Wikipedia.svg/1200px-QR_code_for_mobile_English_Wikipedia.svg.png" width="150" alt="QRIS Code">
            <p>Atas Nama: <strong>Yayasan Sumatropic</strong></p>
        `;
    } else if (metode === "bca") {
        kontenHtml = `
            <h4>Transfer Bank BCA</h4>
            <h2>123-456-7890</h2>
            <p>Atas Nama: <strong>Yayasan Sumatropic</strong></p>
        `;
    } else if (metode === "bri") {
        kontenHtml = `
            <h4>Transfer Bank BRI</h4>
            <h2>0022-01-000000-50-0</h2>
            <p>Atas Nama: <strong>Yayasan Sumatropic</strong></p>
        `;
    } else if (metode === "mandiri") {
        kontenHtml = `
            <h4>Transfer Bank Mandiri</h4>
            <h2>144-00-1234567-8</h2>
            <p>Atas Nama: <strong>Yayasan Sumatropic</strong></p>
        `;
    }

    // 5. Masukkan ke div #infoBayar
    var infoBayarDiv = document.getElementById('infoBayar');
    infoBayarDiv.innerHTML = kontenHtml;

    // 6. Tampilkan Ringkasan Nominal (Optional, agar user ingat berapa yg harus ditransfer)
    infoBayarDiv.innerHTML += `<p>Total yang harus dibayar: <strong>Rp ${nominal}</strong></p>`;

    // 7. Ganti Tampilan (Hide Step 1 -> Show Step 2)
    document.getElementById('step1').style.display = 'none';
    document.getElementById('step2').style.display = 'block';
}

// Fungsi untuk tombol "Kembali"
function kembaliKeStep1() {
    document.getElementById('step2').style.display = 'none';
    document.getElementById('step1').style.display = 'block';
}