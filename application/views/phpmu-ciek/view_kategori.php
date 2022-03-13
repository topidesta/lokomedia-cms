<?php
            echo "<p class='sidebar-title'> &nbsp; Berita : $title</p><hr>";
                $no = 1;
                foreach ($kategori->result_array() as $row){
                    $isi_berita = strip_tags($row['isi_berita']); 
                    $isi = substr($isi_berita,0,250); 
                    $isi = substr($isi_berita,0,strrpos($isi," "));
                    $tanggal = tgl_indo($row['tanggal']);
                    if ($row['gambar'] == ''){ $foto = 'small_no-image.jpg'; }else{ $foto = $row['gambar']; }
                    echo "<div>
                          <div class='pull-left' style='height:130px; overflow:hidden'>
                            <img class='img-thumbnail' style='width:180px; margin-right:10px' src='".base_url()."asset/foto_berita/".$foto."'>
                          </div>
                          
                          <h1 class='title-list'><a href='".base_url()."berita/detail/$row[judul_seo]'>".$row['judul']."</a></h1>
                          <small class='date text-danger'><span class='glyphicon glyphicon-time'></span> $row[hari], $tanggal, $row[jam] WIB, Dibaca : $row[dibaca] Kali</small>
                          <p>".$isi."...</p>
                        </div>
                        <div style='clear:both'></div>";
                    $no++;
                }
            ?>
            <div style="clear:both"></div>
            <?php echo $this->pagination->create_links(); ?>
