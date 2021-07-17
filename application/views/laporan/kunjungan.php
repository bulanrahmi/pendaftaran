<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Laporan </title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/plugins/font-awesome.min.css" />
	<style type="text/css">
		/*        @page {
          size: legal;
          margin: 0mm;
      }
      @media all {
        .page-break { display: none; }
    }
    */
		@media print {
			.page-break {
				display: block;
				page-break-before: always;
			}
		}

		html {
			background-color: #FFFFFF;
			margin: 0px;
			/* this affects the margin on the html before sending to printer */
		}

		body {
			font-size: 12pt;
			margin: 15mm 15mm 15mm 15mm;
			/* margin you want for the content */
		}
	</style>
	<script type="text/javascript">
		window.onload = function() {
			self.print();
		}
	</script>
</head>

<body>
	<div class="container">
		<center>
			<h1> <img alt="image" height="100" width="100" src="<?= base_url() ?>assets/img/loggo.png" /><b>CV MULYA ABADI</h1>
			<h3>GENERAL CONTRAKTOR DAN SUPPLIER </h3>
			<h4>Jl. Pariwisata No.29 Gunungsari Lobar Telpon 0370 (6621310) HP 087865850766</h4>
			<hr />
		</center>
		<h4>Laporan Pembelian Per-Supplier</h4>
		<table class="table table-striped table-bordered">
			<thead>
				<tr>
					<th>No</th>
					<th>Nama</th>
					<th>No. HP</th>
					<th>Tanggal Daftar</th>
					<th>Jenis Berobat</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$no = 1;
				foreach ($kunjungan as $row) :
				?>
					<tr>
						<td><?php echo $no++; ?></td>
						<td><?php echo $row->nama_pasien; ?></td>
						<td><?php echo $row->no_hp; ?></td>
						<td><?php echo $row->tanggal_daftar; ?></td>
						<td><?php echo $row->jenis_pasien; ?></td>
					</tr>
				<?php
				endforeach;
				?>
			</tbody>
		</table>
	</div>
</body>

</html>
