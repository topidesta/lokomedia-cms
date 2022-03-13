<?php
echo "<p class='sidebar-title'> Berita Terbaru</p><hr>";
  $headline = $this->model_utama->berita_utama(5,5);
  foreach ($headline->result_array() as $row){
      $isi_berita = strip_tags($row['isi_berita']); 
      $isi = substr($isi_berita,0,200); 
      $isi = substr($isi_berita,0,strrpos($isi," "));
      $tanggal = tgl_indo($row['tanggal']);
      if ($row['gambar'] == ''){ $foto = 'small_no-image.jpg'; }else{ $foto = $row['gambar']; }
      echo "<div>
              <div class='pull-left' style='height:130px; overflow:hidden'>
                <img class='img-thumbnail' style='width:160px; margin-right:10px' src='".base_url()."asset/foto_berita/".$foto."'>
              </div>
              
              <h1 class='title-list'><a href='".base_url()."berita/detail/$row[judul_seo]'>".$row['judul']."</a></h1>
              <small class='date text-danger'><span class='glyphicon glyphicon-time'></span> $row[hari], $tanggal, $row[jam] WIB, Dibaca : $row[dibaca] Kali</small>
              <p>".$isi."...</p>
            </div>
            <div style='clear:both'></div>";
  }

            echo "<br><p class='sidebar-title'> &nbsp; Gallery Foto </p> <hr>";
                $no = 1;
                $gallery = $this->db->query("SELECT * FROM gallery ORDER BY id_gallery DESC LIMIT 8");
                foreach ($gallery->result_array() as $row){
                    echo "<div class='col-md-3' style='padding:3px'>
                          <center>$row[jdl_gallery]</center>
                          <div class='hidden-xs' style='overflow:hidden; max-height:120px'>
                            <a href='#' data-toggle='modal' data-target='#$row[id_gallery]'> <img class='img-thumbnail' width='100%' style='min-height:95px' src='".base_url()."asset/img_galeri/".$row['gbr_gallery']."'></a>
                          </div>

                          <div class='visible-xs'>
                            <a href='#' class='thumbnail' data-toggle='modal' data-target='#$row[id_gallery]'><img class='img-thumbnail' width='100%' style='min-height:95px' src='".base_url()."asset/img_galeri/".$row['gbr_gallery']."'></a>
                          </div>

                          </div>";
                        if ($no % 4 == 0){
                            echo "<div style='clear:both'><hr></div>";
                        }
                    $no++;

                    echo "<div id='$row[id_gallery]' class='modal fade' tabindex='-1' role='dialog' aria-labelledby='myLargeModalLabel' aria-hidden='true'>
                              <div class='modal-dialog'>
                                  <div class='modal-content box'>
                                      <div class='modal-header'>
                                        <button class='close' type='button' data-dismiss='modal'>×</button>
                                        <h4 class='modal-title'>$row[jdl_gallery]</h4>
                                      </div>
                                      <div class='modal-body'>
                                          <img style='width:100%' src='".base_url()."asset/img_galeri/".$row['gbr_gallery']."' alt='$row[jdl_gallery]' />
                                          <p style='margin-top:5px'>$row[keterangan]</p>
                                      </div>
                                  </div>
                              </div>
                          </div>";
                }
            ?>