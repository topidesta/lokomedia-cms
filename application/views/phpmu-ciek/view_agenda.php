<?php
    foreach ($agenda->result_array() as $record){
        $isi_berita = strip_tags($record['isi_agenda']); 
        $isi = substr($isi_berita,0,120); 
        $isi = substr($isi_berita,0,strrpos($isi," "));
        $tgl1 = tgl_indo($record['tgl_mulai']);
        $tgl2 = tgl_indo($record['tgl_selesai']);
        $tgl_posting = tgl_indo($record['tgl_posting']);

          echo "<p class='title'> <a href='".base_url()."agenda/detail/$record[tema_seo]'><b>$record[tema]</b></a></p>
                  <small class='date'><span class='glyphicon glyphicon-user'></span> Oleh : $record[nama_lengkap], Pada : $tgl_posting</small><hr>
            <div class='col-md-12'>";

                echo "<table class='table table-condensed table-bordered'>
                        <tr><th width='120px'>Waktu</th>  <td>$record[tempat]</td></tr>
                        <tr><th width='120px'>Tempat</th>  <td>$tgl1 s/d $tgl2, $record[jam] Wib</td></tr>
                        <tr><th width='120px'>Pengirim</th>  <td>$record[pengirim]</td></tr>
                      </table>
            </div><div style='clear:both'><br></div>";
    }
            ?>
            <div style="clear:both"></div>
            <?php echo $this->pagination->create_links(); ?>
