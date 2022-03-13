<?php
          echo "<p class='sidebar-title'> Hubungi Kami</p>
                  <div style='clear:both'></div>
                  <p>Siahkan meninggalkan Pesan / Komentar / Masukan anda agar kami bisa memberikan pelayanan yang lebih baik lagi, Terima kasih.</p>
            <div style='clear:both'><br></div>";
            
            echo "<div class='col-md-12'>";
            echo '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3989.3358607198243!2d100.35483479999999!3d-0.8910373999999999!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2fd4b8aa1a4e0441%3A0x3f81ebb48d31a38b!2sTunggul+Hitam%2C+Padang+Utara%2C+Kota+Padang%2C+Sumatera+Barat+25173!5e0!3m2!1sid!2sid!4v1408275531365" width="100%" height="350" frameborder="0" style="border:0" allowfullscreen></iframe>';
                echo "<center>".$this->session->flashdata('message')."</center>";
                $attributes = array('id' => 'formku','class'=>'form-horizontal','role'=>'form');
                $ip         = $_SERVER['REMOTE_ADDR'];
                echo form_open_multipart('hubungi/index',$attributes); 
                    echo "<hr><div class='form-group'>
                        <label for='inputEmail3' class='col-sm-3 control-label'>Nama Lengkap</label>
                        <div class='col-sm-9'>
                        <div style='background:#fff;' class='input-group col-sm-8'>
                            <span class='input-group-addon'><i class='glyphicon glyphicon-user'></i></span>
                            <input type='text' class='required form-control' name='a'>
                        </div>
                        </div>
                    </div>

                    <div class='form-group'>
                        <label for='inputEmail3' class='col-sm-3 control-label'>Alamat Email</label>
                        <div class='col-sm-9'>
                        <div style='background:#fff;' class='input-group col-sm-8'>
                            <span class='input-group-addon'><i class='glyphicon glyphicon-envelope'></i></span>
                            <input type='email' class='required form-control' name='b'>
                        </div>
                        </div>
                    </div>

                    <div class='form-group'>
                        <label for='inputEmail3' class='col-sm-3 control-label'>Subjek</label>
                        <div class='col-sm-9'>
                        <div style='background:#fff;' class='input-group col-sm-12'>
                            <span class='input-group-addon'><i class='glyphicon glyphicon-list-alt'></i></span>
                            <input type='text' class='required form-control' name='c'>
                        </div>
                        </div>
                    </div>

                    <div class='form-group'>
                        <label for='inputPassword3' class='col-sm-3 control-label'>Isi Pesan</label>
                        <div class='col-sm-9'>
                        <div style='background:#fff;' class='input-group col-lg-12'>
                            <span class='input-group-addon'><i class='glyphicon glyphicon-pencil'></i></span>
                            <textarea class='required form-control' name='d' style='height:150px' minlength='10'></textarea>
                        </div></div>
                    </div>

                    <div class='form-group'>
                      <label for='inputEmail3' style='margin-top:-5px' class='col-sm-3 control-label'>$image</label>
                      <div class='col-sm-9'>
                      <div style='background:#fff;' class='input-group col-lg-8'>
                          <input name='secutity_code' maxlength='6' type='text' class='form-control' placeholder='Masukkkan kode di sebelah kiri..'>
                      </div></div>
                    </div>

                    <br>
                    <div class='form-group'>
                        <div class='col-sm-offset-2'>
                            <button type='submit' name='submit' class='btn btn-primary btn-sm'>Kirimkan</button>
                        </div>
                    </div>
                </form>
           </div>
            <div style='clear:both'><br></div>";
