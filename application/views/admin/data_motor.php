<div class= "main-content">
	<section class= "section">
		<div class= "section-header">
			<h1>Data Motor</h1>
		</div>

		<a href="<?php echo base_url ('admin/data_motor/tambah_motor') ?>" class="btn btn-primary mb-4"> Tambah Data </a>

		<?php echo $this->session->flashdata ('pesan') ?>

		<table class ="table table-hover table-striped table-borderd" id="table">
			<thead>
				<tr>
				<th> No </th>
				<th> Gambar </th>
				<th> Type </th>
				<th> Merk </th>
				<th> No. Plat </th>
				<th> Harga </th>
				<th> Status </th>
				<th> Aksi </th>
			</tr>
			</thead>
			<tbody>
				<?php 
				$no=1;
				foreach ($motor as $mb) : ?>
					<tr>
					<td><?php echo $no++?></td>
					<td><image width="250px" src="<?php echo base_url (). 'assets/upload/'. $mb->gambar?>">
					</td>
					<td><?php echo $mb->kode_type?></td>
					<td><?php echo $mb->merk?></td>
					<td><?php echo $mb->no_plat?></td>
					<td><?php echo number_format($mb->harga,2,',','.')?></td>
					<td><?php 
					if ($mb->status == "0") {
						echo "<span class = 'badge badge-danger'> Terjual </span>";
					}elseif ($mb->status == "3") {
						echo "<span class = 'badge badge-info'> Booked </span>";
					}else {
						echo "<span class = 'badge badge-primary'> Tersedia </span>";
					}
					?></td>
					<td> 
						<a href="<?php echo base_url ('admin/data_motor/detail_motor/').$mb->id_motor ?>" class="btn btn-sm btn-success"> <i class="fas fa-eye"></i></a>
						<a href="<?php echo base_url ('admin/data_motor/delete_motor/').$mb->id_motor ?>" class="btn btn-sm btn-danger"> <i class="fas fa-trash"></i></a>
						<a href="<?php echo base_url ('admin/data_motor/update_motor/').$mb->id_motor ?>" class="btn btn-sm btn-primary"> <i class="fas fa-edit"></i></a>
					</td>
				</tr>
				<?php endforeach; ?>
				</tbody>
		</table>
	</section>
</div>

<script>
	$(document).ready( function () {
    $('#table').DataTable({
		dom: 'Bfrtip',
		buttons: [
			'pageLength',
			{ extend: 'pdf', text: '<span class="btn btn-sm btn-info mr-2"><i class="fas fa-file-pdf fa-1x" aria-hidden="true"></i> PDF </span>'},
			{ extend: 'csv', text: '<span class="btn btn-sm btn-info mr-2"><spa class="fas fa-file-csv fa-1x"></i> CSV </span>'},
			{ extend: 'excel', text: '<span class="btn btn-sm btn-info mr-2"><i class="fas fa-file-excel" aria-hidden="true"></i> EXCEL </span>' },
		]
	});
	} );
</script>