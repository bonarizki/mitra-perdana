<div class="container mt-5 mb-5">

	<div class="card">
		<div class="card-body">
			<?php foreach ($detail as $dt) : ?>
				<div class="row">
					<div class="col-md-5"> 
						<img style= "width:90%" src= "<?php echo base_url ('assets/upload/'.$dt->gambar)?>">
					</div>
					<div class="col-md-5"> 
						<table class="table">
							<tr>
								<th> Merk </th>
								<td> <?php echo $dt->merk ?> </td>
							</tr>
							<tr>
								<th> No.Plat </th>
								<td> <?php echo $dt->no_plat ?> </td>
							</tr>
							<tr>
								<th> Warna </th>
								<td> <?php echo $dt->warna ?> </td>
							</tr>
							<tr>
								<th> Tahun Keluaran Mobil </th>
								<td> <?php echo $dt->tahun ?> </td>
							</tr>
							<tr>
								<th> Status </th>
								<td> <?php if ($dt->status == '0') {
									echo "terjual";
								}else if ($dt->status == '3'){
									echo "Booked";
							 	}else {
									echo "Tersedia";
								} 
								?> 
							</td>
							</tr>
							<tr>
							<td></td>
							<td>
								<?php 
				               if ($dt->status == "0") {
				                echo "<span class='btn btn-danger' disable> TERJUAL </span>";
							   }else if ($dt->status == '3'){
								echo "<span class='btn btn-danger' disable> BOOKED </span>";
							 	}else{
				                echo '<button class="btn btn-success"  onclick="sewamobil('.$dt->id_motor.')"> Beli </button>';
				               }
				               ?>
							</td>
							</tr>
						</table>
					</div>
				<?php endforeach; ?>
		</div>
	</div>
</div>