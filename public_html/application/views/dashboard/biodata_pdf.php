<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <title>Data Konsumen</title>
    <style type="text/css">
        h1 {text-align:center; font-size:18px;}
        h2 {font-size:16px; }
        table td {font-size: 14px; color: black; padding-bottom: 18px;}
        .tengah {text-align:center;	}
        .kiri {padding-left:10px;}
        table.nilai {border-collapse: collapse;}
        table.nilai td {border: 1px solid #000000}
    </style>
</head>

<body>
<h1>DATA KONSUMEN</h1>
<hr />
<table width="500" border="0">
    <tr>
        <td colspan="2"><h2>Data Pribadi & Bukti Pembayaran</h2></td>
    </tr>
    <tr>
        <td>Nomor Konsumen </td>
        <td>: <?php echo format_no_konsumen($konsumen->id) ?></td>
    </tr>
    <tr>
        <td>No KTP</td>
        <td>: <?php echo $konsumen->ktp ?></td>
    </tr>
    <tr>
        <td>Total Harga Kamar</td>
        <td>: <?php $angka=700000; $total=$angka*$konsumen->jumlah; echo "Rp.".number_format($total, 0);  ?></td>
    </tr>
    <tr>
        <td>Status Pembayaran</td>
        <td>: <?php echo format_status_verifikasi($konsumen->status_verifikasi) ?></td>
    </tr>
    <tr>
        <td>Tanggal Pesan </td>
        <td>:
            <?php echo format_tanggal($konsumen->tanggal_pesan) ?></td>
    </tr>
    <tr>
        <td>Nama</td>
        <td>: <?php echo $konsumen->nama ?></td>
    </tr>
    <tr>
        <td>Tempat, Tanggal Lahir </td>
        <td>:
            <?php echo $konsumen->tempat_lahir ?>, <?php echo format_tanggal($konsumen->tanggal_lahir) ?></td>
    </tr>
    <tr>
        <td>Jenis Kelamin </td>
        <td>:
            <?php echo format_jenis_kelamin($konsumen->jenis_kelamin) ?></td>
    </tr><br><br><br><br>
    <tr>
        <td>Agama</td>
        <td>: <?php echo $konsumen->agama != '0' ? format_agama($konsumen->agama) : format_agama($konsumen->ket_agama); ?></td>
    </tr>
    <tr>
        <td>Alamat</td>
        <td>: <?php echo $konsumen->tmp_alamat ?> </td>
        <br>
        <br>
        <br>
    </tr>
    <tr>
        <td>Telepon</td>
        <td>: <?php echo $konsumen->tmp_telepon ?></td>
    </tr>
    <tr>
        <td>No Rek Atas Nama</td>
        <td>: <?php echo $konsumen->norek ?></td>
    </tr>
    <tr>
        <td>Jumlah Pesanan Kamar</td>
        <td>: <?php echo $konsumen->jumlah ?></td>
    </tr>
    
</table>
<p>&nbsp;</p>
<table width="600" border="0">
    <tr>
        <td width="200" height="200">
            Mengetahui<br>
            konsumen ,<br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <?php echo $konsumen->nama ?>
        </td>
        
    </tr>
</table>
<br />
<br />
<br />
<br />
<br />
<p class="text-danger"><strong>Catatan:</strong></p>
    <p class="text-danger">Dokumen ini bisa digunakan sebagai bukti pembayaran yang sah.</p>
<hr />

</body>
</html>