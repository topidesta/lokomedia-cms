<?php
echo "<p class='sidebar-title'> $title</p><hr>
<table class='table table-condensed table-hover'>
	<tr>
		<th>No</th>
		<th>Nama File</th>
		<th>Hits</th>
		<th></th>
	</tr>";
	$no = $this->uri->segment(3)+1;
	foreach ($download->result_array() as $r){
			if(($no % 2)==0){ $warna="#ffffff";}
			else{ $warna="#dcfbe2"; }
			$tgl=tgl_indo($r['tgl_posting']);
				echo "<tr><td>$no</td>
					  <td>$r[judul]</td>
					  <td>$r[hits] Kali</td>
					  <td width='70px'><a class='btn btn-danger btn-xs' href='".base_url()."download/file/$r[nama_file]'><span class='glyphicon glyphicon-download-alt'></span> Download</a></td>
					 </tr>";
				$no++;
			}
	echo "</table>";
?>	

<div style="clear:both"></div>
<?php echo $this->pagination->create_links(); ?>
								