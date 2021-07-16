<div class="col-md-12 top-20">
	<div class="panel">
		<div class="panel-heading"><h3>Edit Password Pasien</h3></div>
		<div class="panel-body">
			<?php echo form_open_multipart('Pendaftaran/proses_edit_password') ?>
			<div class="row">
				<div class="col-md-6">
					<input type="hidden" readonly required="" value="<?=$user->id?>" name="id_user" id="id_user" class="form-control">
					<span class="icon-user"> Username</span>
					<input readonly required="" value="<?=$user->username?>" type="text" required="" name="uname" id="uname" class="form-control">
				</div>

				<div class="col-md-6">
					<span class="fa-star-half"> Password</span>
					<input required="" type="text" name="password" id="password" class="form-control">
				</div>
			</div>
			<hr>
			<button type="submit" name="submit" class="btn btn-primary">Simpan data pasien</button>
			<a href="<?= site_url('pendaftaran/pasien') ?>" class="btn btn-warning">Batal</a>
			<?php echo form_close(); ?>
		</div>
	</div>
</div>
