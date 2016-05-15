	<?php 
	$instansi	= $this->db->query("SELECT * FROM config LIMIT 1")->row();
	echo '<img src="'.base_URL().'img/'.$instansi->logo.'" style="width: 80px; height: 80px; margin-right: 20px; display: inline; float: left">';
	echo '<h2 style="font-size: 22px">'.$instansi->nama.'</h2>';
	echo '<h5>'.$instansi->alamat.'</h5>';
	
	?>
	<body onload="this.print()">
	<hr id="bulanan" style="border-width: 2px; border-color: #000">
	
	<h5>Visitors of Month "<?=date('F')?>" Per Gender</h5>
	<table style="width: 50%; border-collapse: collapse" border="1"  class="table table-condensed">
		<tr>
			<th width="10%">No</th>
			<th width="35%">Man</th>
			<th width="35%">Woman</th>
			<th width="20%">Quantity</th>
		</tr>
		<?php 
		$a 	= $this->db->query("SELECT SUM(IF( jk =  'L', 1, 0 ) ) AS jkl, SUM( IF( jk =  'P', 1, 0 ) ) AS jkp FROM pengunjung  WHERE MID(tgl, 6, 2) = '$bulan' ")->result();

		foreach($a as $aa) {
		?>
		<tr>
			<td style="text-align: center">1</td>
			<td style="text-align: center"><?=_null($aa->jkl)?> </td>
			<td style="text-align: center"><?=_null($aa->jkp)?> </td>
			<td style="text-align: center"><?=_null($aa->jkl)?> </td>
		</tr>	
		<?php
		}
		?>
	</table>
	
	<h5>Visitors of Month "<?=date('F')?>" Per Purposes</h5>
	<table style="width: 60%; border-collapse: collapse" border="1"  class="table table-condensed">
		<tr>
			<th width="10%">No</th>
			<th width="18%">Read a Book</th>
			<th width="18%">Rent a Book</th>
			<th width="18%">Refund a Book</th>
			<th width="18%">Other</th>
		</tr>
		<?php 
		$a1	= $this->db->query("SELECT id FROM pengunjung  WHERE perlu LIKE '%Baca Buku%' AND MID(tgl, 6, 2) = '$bulan' ")->num_rows();
		$a2	= $this->db->query("SELECT id FROM pengunjung  WHERE perlu LIKE '%Pinjam Buku%' AND MID(tgl, 6, 2) = '$bulan' ")->num_rows();
		$a3	= $this->db->query("SELECT id FROM pengunjung  WHERE perlu LIKE '%Kembalikan Buku%' AND MID(tgl, 6, 2) = '$bulan' ")->num_rows();
		$a4	= $this->db->query("SELECT id FROM pengunjung  WHERE perlu LIKE '%Lainnya%' AND MID(tgl, 6, 2) = '$bulan' ")->num_rows();

		?>
		<tr>
			<td style="text-align: center">1</td>
			<td style="text-align: center"><?=$a1?></td>
			<td style="text-align: center"><?=$a2?></td>
			<td style="text-align: center"><?=$a3?></td>
			<td style="text-align: center"><?=$a4?></td>
		</tr>	
	</table>
	</body>