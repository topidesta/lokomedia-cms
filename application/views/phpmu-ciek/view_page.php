<?php
          $tanggal = tgl_indo($record['tgl_posting']);
          echo "<p class='sidebar-title'> $record[judul]</p><hr>
            <div class='col-md-12'>";
                if ($record['gambar'] != ''){
                    echo "<img width='100%' src='".base_url()."asset/foto_statis/".$record['gambar']."'>";
                }
                echo "<p>$record[isi_halaman]</p>
            </div><div style='clear:both'><br></div>";
            ?>
