<?php 
    $koneksi = mysqli_connect('localhost', 'root', '', 'dompet-qu');
    if (mysqli_connect_error() == true) {
        die('Gagal terhubung ke database');
        return false;
    } else {
        return true;
    }
    
    function query($query) {
        global $koneksi;
        $result = mysqli_query($koneksi, $query);
        $rows = [];
        while( $row = mysqli_fetch_assoc($result) ) {
            $rows[] = $row;
        }
        return $rows;
    }

    // tambah data Pemasukkan
    function tambahMasuk($dataMasuk) {
        global $koneksi;
        $tanggalMasuk = htmlspecialchars($dataMasuk["tanggal"]);
        $keteranganMasuk = htmlspecialchars($dataMasuk["keterangan"]);
        $sumber = htmlspecialchars($dataMasuk["sumber"]);
        $jumlah = htmlspecialchars($dataMasuk["jumlah"]);
        $username = $dataMasuk["username"];

        // query insert data
        $query = "INSERT INTO pemasukkan (id, tanggal, keterangan, sumber, jumlah, username) VALUES (NULL, '$tanggalMasuk', '$keteranganMasuk', '$sumber', '$jumlah', '$username')";
        mysqli_query($koneksi, $query);           
        
        return mysqli_affected_rows($koneksi);
    }

    // tambah data Pengeluaran
    function tambahKeluar($dataKeluar) {
        global $koneksi;
        $tanggalKeluar = htmlspecialchars($dataKeluar["tanggal"]);
        $keteranganKeluar = htmlspecialchars($dataKeluar["keterangan"]);
        $keperluan = htmlspecialchars($dataKeluar["keperluan"]);
        $jumlah = htmlspecialchars($dataKeluar["jumlah"]);
        $username = $dataKeluar["username"];

        // query insert data
        $query = "INSERT INTO pengeluaran (id, tanggal, keterangan, keperluan, jumlah, username) VALUES (NULL, '$tanggalKeluar', '$keteranganKeluar', '$keperluan', '$jumlah', '$username')";
        mysqli_query($koneksi, $query);           
        
        return mysqli_affected_rows($koneksi);
    }

    // tanggal indonesia
    function tgl_indo($tgl) {
        $tanggal = substr($tgl, 8, 2);
        $nama_bulan = array("Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Ags", "Sep", "Okt", "Nov", "Des");
        $bulan = $nama_bulan[substr($tgl, 5, 2) - 1];
        $tahun = substr($tgl, 0, 4);

        return $tanggal.'-'.$bulan.'-'.$tahun;
    }
    
    // fungsi transfer
    function transfer($dataTransfer) {
        global $koneksi;
        $username = $dataTransfer['username'];
        $username2 = $dataTransfer['username2'];
        $tanggal = $dataTransfer['tanggal'];
        $saldoRekening = $dataTransfer['saldoRekening'];
        $jumlah = htmlspecialchars($dataTransfer['jumlah']);
        $jumlahConvert = str_replace('.', '', $jumlah);

        if ($jumlahConvert > $saldoRekening) {
            echo "
                <script>
                    alert('Maaf, saldo anda tidak cukup!');
                </script>
                ";
            return false;
        }
        // query insert data
        $query = "INSERT INTO rekening_masuk(jumlah, tanggal, username) VALUES('$jumlah', '$tanggal', '$username')";
        $query2 = "INSERT INTO rekening_keluar(jumlah, tanggal, username) VALUES('$jumlah', '$tanggal', '$username2')";
        mysqli_query($koneksi, $query);
        mysqli_query($koneksi, $query2);

        return mysqli_affected_rows($koneksi);
    }

?>