<?php
echo "<p class='sidebar-title'> &nbsp; $title </p> <hr>";
    $no = 1;
    foreach ($album->result_array() as $row){
      $jml = $this->model_utama->hitungfoto($row['id_album'])->num_rows();
        echo "<div class='col-md-4'>
              <p class='title'>$row[jdl_album]</p>
              <div class='hidden-xs' style='overflow:hidden; max-height:110px'>
                <a href='".base_url()."gallery/detail/$row[album_seo]'><img class='img-thumbnail' width='100%' style='min-height:95px' src='".base_url()."asset/img_album/".$row['gbr_album']."'></a>
              </div>

              <div class='visible-xs'>
                <a href='".base_url()."asset/img_album/".$row['gbr_album']."'><img class='img-thumbnail' width='100%' style='min-height:95px' src='".base_url()."asset/img_album/".$row['gbr_album']."'></a>
              </div>
              <a class='btn btn-xs btn-block btn-default' href='".base_url()."gallery/detail/$row[album_seo]'>Ada $jml Foto</a>

              </div>";
            if ($no % 3 == 0){
                echo "<div style='clear:both'><hr></div>";
            }
        $no++;
    }
?>
<div style="clear:both"></div>
<?php echo $this->pagination->create_links(); ?>