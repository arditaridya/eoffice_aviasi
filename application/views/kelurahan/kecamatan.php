

<select class="form-control" name='kecamatan' id='kecamatan'>
	<option  value='' selected>Pilih Kecamatan</option>
	<?php foreach($kecamatan as $row){ ?>
		<option value="<?php echo $row->id; ?>"><?php echo $row->nama_kecamatan; ?></option>
	<?php } ?>
</select>