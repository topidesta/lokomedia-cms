<?php
$tanggal = tgl_indo($record['tanggal']);
echo "<p class='sidebar-title'> $record[judul]</p>
    <small class='date'><span class='glyphicon glyphicon-time'></span> $record[hari], $tanggal, $record[jam] WIB, $record[dibaca] View</small>
    <small class='date pull-right'><span class='glyphicon glyphicon-user'></span> $record[nama_lengkap], Kategori : <a href='".base_url()."berita/kategori/$record[kategori_seo]'>$record[nama_kategori]</a></small><hr>
<div class='col-md-12'>";
    if ($record['gambar'] != ''){
        echo "<img class='pull-left img-thumbnail' style='margin-right:7px' src='".base_url()."asset/foto_berita/".$record['gambar']."'>";
    }
    echo "<p>$record[isi_berita]</p>
</div><div style='clear:both'><br></div>

<p class='sidebar-title'> &nbsp; Berita Terkait</p><hr>";
    echo "<table class='table table-hovered table-condensed'>";
    foreach ($infoterkait->result_array() as $row){
      $tanggaldetail = tgl_indo($row['tanggal']);
      if ($row['gambar'] == ''){ $fotodetail = 'small_no-image.jpg'; }else{ $fotodetail = $row['gambar']; }
        echo "<tr>
                <td><img class='img-thumbnail pull-left' width='80px' style='margin-right:6px; height:60px' src='".base_url()."asset/foto_berita/".$fotodetail."'>
                    <a style='font-size:16px' href='".base_url()."berita/detail/$row[judul_seo]'><b>".$row['judul']."</b></a><br>
                    <span class='text-danger'><span class='glyphicon glyphicon-time'></span> $row[hari], $tanggaldetail, $row[jam] WIB, Dibaca : $row[dibaca] Kali</span></td>
              </tr>";
      }
  echo "</table>";

  echo "<br><div style='clear:both'></div>";
  $total_komentar = $this->model_berita->komentar_berita($record['id_berita'])->num_rows();
  if ($total_komentar>='1'){ ?>
        <div id='listcomment' class='alert alert-danger'><?php echo "Ada $total_komentar Komentar"; ?></div>
        <ul class="media-list comment-list">
          <li>
            <?php
              $no = 1;
              $komentar = $this->model_berita->komentar_berita($record['id_berita']);
                foreach ($komentar->result_array() as $rows) {
                $isian=nl2br($rows['isi_komentar']); 
                $komentarku = sensor($isian); 
                echo "<li class='media'>
                        <div class='media-left'>
                              <img style='width:60px; height:60px' class='media-object img-thumbnail img-circle' src='".base_url()."asset/foto_berita/user.png'/>
                        </div>
                        <div class='media-body'>
                          <strong class='user-nick'><a href='#'>$rows[nama_komentar]</a></strong>, 
                          <span class='time-stamp'>".tgl_indo($rows['tgl']).", $rows[jam_komentar] WIB</span><br>
                          $komentarku
                        </div>
                      </li>"; 
              }
            ?>
          </li>
        </ul>
      <?php } ?>
        <?php echo "<center>".$this->session->flashdata('message')."</center>"; ?>
        <div id='listcomment' class='alert alert-warning'>Tuliskan Komentar</div>
            <?php 
              $attributes = array('class'=>'form-horizontal','role'=>'form');
              echo form_open('berita/kirim_komentar',$attributes); 
            ?>
              <input type="hidden" name='a' value='<?php echo "$record[id_berita]"; ?>'>
              <div class="form-group">
                <label for="inputEmail3" class="col-sm-3 control-label">Nama Lengkap</label>
                <div style='background:#fff;' class="input-group col-lg-6">
                  <input type="text" class="required form-control" name="b" placeholder="Tuliskan Nama anda.." required>
                </div>
              </div>

              <div class="form-group">
                <label for="inputPassword3" class="col-sm-3 control-label">Email</label>
                <div style='background:#fff;' class="input-group col-lg-6">
                  <input type="text" class="required number form-control" placeholder="alamat.email.anda@domain.com" name="c">
                </div>
              </div>

              <div class="form-group">
                <label for="inputPassword3" class="col-sm-3 control-label">Isi Komentar</label>
                <div style='background:#fff;' class="input-group col-lg-8">
                  <textarea name='d' style='height:120px' placeholder="Tuliskan Komentar disini.." class="form-control" required></textarea>
                </div>
              </div>

              <div class='form-group'>
                  <label for='inputEmail3' style='margin-top:-5px' class='col-sm-3 control-label'><?php echo $image; ?></label>
                  <div style='background:#fff;' class="input-group col-lg-8">
                      <input name='secutity_code' maxlength='6' type='text' class='form-control' placeholder='Masukkkan kode di sebelah kiri..'>
                  </div>
              </div>

            <div class="form-group">
              <div class="col-sm-offset-3">
                <input type="submit" name="submit" class="btn btn-success" value="Post a Comment" onclick="return confirm('Haloo, Pesan anda akan tampil setelah kami setujui?')"/>
              </div>
            </div>
            
            </form>

