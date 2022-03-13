<div class="col-sm-8" style='padding:3px'>
<div id="myCarousel" class="carousel slide" style='margin-bottom:10px;' data-ride="carousel">
<div class="carousel-inner">
<?php
    $headline = $this->model_utama->headline(0,5);
    $no = 1;
    foreach ($headline->result_array() as $row){
    if ($no==1){ $active = 'active'; }else{ $active = ''; }
        if ($row['gambar'] ==''){ $foto_slide = 'no-image.jpg'; }else{ $foto_slide = $row['gambar']; }
        $tgl = tgl_indo($row['tanggal']);
        echo "<div class='item $active'>          
                <a class='hover-effect' href='".base_url()."berita/detail/$row[judul_seo]'><img style='width:100%; height:265px' src='".base_url()."asset/foto_berita/$foto_slide' alt='$row[judul]' class='img-responsive center-block'></a>
                <div style='text-align:left; top:190px; left:15px; right:10px; width:100%' class='carousel-caption wrapper container'>
                    <span class='glyphicon glyphicon-th-list' aria-hidden='true'></span> <a style='color:#fff' href='#'>$row[nama_kategori]</a>, <span class='glyphicon glyphicon-time' aria-hidden='true'></span> $row[hari], $tgl | $row[jam] WIB
                    <a style='color:#fff' href='".base_url()."berita/detail/$row[judul_seo]'><h4 style='margin-top:0px !Important'>$row[judul]</h4></a>
                </div>
            </div>"; 
        $no++;
    }
?>                
</div>

<!-- Left and right controls -->
<a class="left carousel-control" href="#myCarousel" data-slide="prev">
  <span class="glyphicon glyphicon-chevron-left"></span>
  <span class="sr-only">Previous</span>
</a>
<a class="right carousel-control" href="#myCarousel" data-slide="next">
  <span class="glyphicon glyphicon-chevron-right"></span>
  <span class="sr-only">Next</span>
</a>

</div>
</div>

<div class="col-sm-4" style='padding:4px'>
<?php 
  $terbaru = $this->db->query("SELECT * FROM berita a JOIN kategori b ON a.id_kategori=b.id_kategori ORDER BY a.id_berita DESC LIMIT 5");
  echo "<table class='table table-hovered table-condensed'>";
  foreach ($terbaru->result_array() as $row){
    $tanggaldetail = tgl_indo($row['tanggal']);
    if ($row['gambar'] == ''){ $fotodetail = 'small_no-image.jpg'; }else{ $fotodetail = $row['gambar']; }
      echo "<tr>
              <td><img class='img-thumbnail pull-left' width='56px' style='margin-right:6px; height:43px' src='".base_url()."asset/foto_berita/".$fotodetail."'>
                  <a href='".base_url()."berita/detail/$row[judul_seo]'>".$row['judul']."</a></td>
            </tr>";
    }
echo "</table>";
?>
</div>

<div style="clear:both"></div>

