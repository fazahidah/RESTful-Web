<?php
// inisialisasi Curl 
$curl = curl_init();
// set curl untuk mengambil data web berdasarkan URL
curl_setopt($curl, CURLOPT_URL, site_url('restful/rest_api'));
// membuat data hasil curl menjadi string
curl_setopt($curl, CURLOPT_RETURNTRANSFER,1);
// eksekusi curl untuk mendapatkan hasil data
$res = curl_exec($curl);
// tutup curl
curl_close($curl);
// data berupa json, perlu didecode untuk dapat dimanipulasi
$data_api = json_decode($res);
// var_dump($data_api);
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>REST Client</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
	<nav class="navbar navbar-inverse navbar-fixed-top">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" href="#">Peripheral Computer</a>
			</div>
			<ul class="nav navbar-nav">
				<li class="active"><a href="#">Daftar Barang</a></li>
			</ul>
			<ul class="nav navbar-nav">
				<li class="angBtn"><a>Nama Anggota</a></li>
			</ul>
			<ul class="nav navbar-nav">
				<span class="glyphicon glyphicon-user" style="color: white; margin-top: 16px;">  Username</span>
			</ul>
			<form class="navbar-form navbar-right">
				<div class="input-group">
					<input type="text" class="form-control" placeholder="Search">
					<div class="input-group-btn">
						<button class="btn btn-default" type="submit">
							<i class="glyphicon glyphicon-search"></i>
						</button>
					</div>
				</div>
			</form>
		</div>
	</nav>
	<br>
	<br>
	<br>
<!--  Post Barang jumbotron-->
	<div class="container">
	<div class="jumbotron"  style="background-color: #333;">
		<h2 style="color: white;">Tambah Barang</h2>
		<form action="<?=site_url('restful/tambah')?>" method="post">
			<div>
				<b style="color: white;">Nama</b>
				<input type="text" class="tambahNama" name="tambahNama" id="" value=""></input>
				<b style="color: white;">Stok </b>
				<input type="text" class="tambahStok" name="tambahStok" id="" value=""></input>
				<b style="color: white;">Harga</b>
				<input type="text" class="tambahHarga" name="tambahHarga" id="" value=""></input>
				<button type="submit" class="btn btn-primary">Tambah Barang</button>
			</div>
			</form>
	</div>
	</div>

	<table class="table table-striped">
		<thead>
			<tr>
				<th scope="col">No.</th>
				<th scope="col">Nama Barang</th>
				<th scope="col">Jumlah Stok</th>
				<th scope="col">Harga</th>
				<th scope="col">Aksi</th>
			</tr>
		</thead>
		<tbody>
			<?php $no=1; foreach($data_api as $i): ?>
			<tr>
				<td><?=$no?></td>
				<td><?=$i->nama?></td>
				<td><?=$i->stok?></td>
				<td><?=$i->harga?></td>
				<td>
					<a class="editBtn" data-nama="<?=$i->nama?>" data-harga="<?=$i->harga?>" data-stok="<?=$i->stok?>" data-id="<?=$i->id_produk?>"><button class="btn btn-xs btn-warning"><i class="glyphicon glyphicon-edit"></i></button></a>
					<a href="<?=site_url('restful/hapus/').$i->id_produk?>"><button class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i></button></a>
				</td>
			</tr>
			<?php $no++; endforeach ?>
		</tbody>
	</table>

	<!-- Modal Edit -->
	<div class="modal fade" id="modalEdit" tabindex="-1" role="dialog"
		aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
                <form action="<?=site_url('restful/edit')?>" method="post">
				<div class="modal-body">
					<b>Nama</b>
                    <input disabled type="text" class="editNama" name="editNama" id="" value=""></input>
				</div>
				<div class="modal-body">
					<b>Stok</b>
                    <input type="text" class="editStok" name="editStok" id="" value=""></input>
				</div>
				<div class="modal-body">
					<b>Harga</b>
                    <input type="text" class="editHarga" name="editHarga" id="" value=""></input>
                </div>
                <div class="modal-footer">
                    <input type="hidden" class="idProduk" name="idProduk" value="">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
                </form>
			</div>
		</div>
	</div>
	<!-- Modal anggota -->
	<div class="modal" id="modalAnggota" tabindex="-1" role="dialog">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Nama Anggota</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<p>190411100129 Fatin Zahidah Mas'ud</p>
				<p>190411100087 Willy Rafi Sabekti</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div>
			</div>
		</div>
	</div>
</body>

</html>
<script>
    $(".editBtn").click(function(){
        $('#modalEdit').modal('show');
        $('.idProduk').val($(this).data('id'));
        $('.editNama').val($(this).data('nama'));
        $('.editStok').val($(this).data('stok'));
        $('.editHarga').val($(this).data('harga'));
    })
	$(".angBtn").click(function(){
        $('#modalAnggota').modal('show');
    })
</script>
