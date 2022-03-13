<?php
            echo "<p class='sidebar-title'> &nbsp; $title </p> <hr>";
                $no = 1;
                if ($gallery->num_rows() <= 0){
                    echo "<div style='margin-top:70px' class='alert alert-danger'><center>Maaf, Tidak Ada Foto Pada Album Ini!<center></div>";
                }
                foreach ($gallery->result_array() as $row){
                    echo "<div class='col-md-4'>
                          <center>$row[jdl_gallery]</center>
                          <div class='hidden-xs' style='overflow:hidden; max-height:110px'>
                            <a href='#' class='thumbnail' data-toggle='modal' data-target='#$row[id_gallery]'> <img class='img-thumbnail' width='100%' style='min-height:95px' src='".base_url()."asset/img_galeri/".$row['gbr_gallery']."'></a>
                          </div>

                          <div class='visible-xs'>
                            <a href='#' class='thumbnail' data-toggle='modal' data-target='#$row[id_gallery]'><img class='img-thumbnail' width='100%' style='min-height:95px' src='".base_url()."asset/img_galeri/".$row['gbr_gallery']."'></a>
                          </div>

                          </div>";
                        if ($no % 3 == 0){
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
            <div style="clear:both"></div>
            <?php echo $this->pagination->create_links(); ?>

