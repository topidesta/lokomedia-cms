        <div class="container-fluid container-border">
          <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <?php 
                $botm = $this->model_utama->mainmenu();
                foreach ($botm->result_array() as $row){
                    $dropdown = $this->model_utama->submenu($row['id_main'])->num_rows();
                    if ($dropdown == 0){
                      echo "<li><a href='".base_url()."$row[link]'> $row[nama_menu]</a></li>";
                    }else{
                      echo "<li class='dropdown'>
                            <a href='".base_url()."$row[link]' class='dropdown-toggle' data-toggle='dropdown' role='button' aria-haspopup='true' aria-expanded='false'> $row[nama_menu] 
                            <span class='caret'></span></a>
                            <ul class='dropdown-menu'>";
                              $dropmenu = $this->model_utama->submenu($row['id_main']);
                              foreach ($dropmenu->result_array() as $row){
                                $dropdown1 = $this->model_utama->submenu1($row['id_sub'])->num_rows();
                                if ($dropdown1 == 0){
                                  if(preg_match("/^http/", $row['link_sub'])) {
                                    echo "<li><a href='$row[link_sub]'>$row[nama_sub]</a></li>";
                                  }else{
                                    echo "<li><a href='".base_url()."$row[link_sub]'>$row[nama_sub]</a></li>";
                                  }

                                }else{
                                  echo "<li class='dropdown-submenu'>
                                          <a href='".base_url()."$row[link_sub]' class='dropdown-toggle' data-toggle='dropdown' role='button' aria-haspopup='true' aria-expanded='false'> $row[nama_sub] </a>
                                          <ul class='dropdown-menu'>";
                                              $dropmenu1 = $this->model_utama->submenu1($row['id_sub']);
                                              foreach ($dropmenu1->result_array() as $row){
                                                $dropdown2 = $this->model_utama->submenu1($row['id_sub'])->num_rows();
                                                if ($dropdown2 == 0){
                                                  if(preg_match("/^http/", $row['link_sub'])) {
                                                    echo "<li><a tabindex='-1' href='$row[link_sub]'>$row[nama_sub]</a></li>";
                                                  }else{
                                                    echo "<li><a tabindex='-1' href='".base_url()."$row[link_sub]'>$row[nama_sub]</a></li>";
                                                  }
                                                }else{
                                                  echo "<li class='dropdown-submenu'>
                                                          <a href='".base_url()."$row[link_sub]' class='dropdown-toggle' data-toggle='dropdown' role='button' aria-haspopup='true' aria-expanded='false'> $row[nama_sub] </a>
                                                          <ul class='dropdown-menu'>";
                                                              $dropmenu2 = $this->model_utama->submenu1($row['id_sub']);
                                                              foreach ($dropmenu2->result_array() as $row){
                                                                if(preg_match("/^http/", $row['link_sub'])) {
                                                                  echo "<li><a tabindex='-1' href='$row[link_sub]'>$row[nama_sub]</a></li>";
                                                                }else{
                                                                  echo "<li><a tabindex='-1' href='".base_url()."$row[link_sub]'>$row[nama_sub]</a></li>";
                                                                }
                                                              }
                                                  echo "</ul></li>";
                                                }
                                              }
                                  echo "</ul></li>";
                                }
                              }
                            echo "</ul>
                          </li>";
                    }
                }
            ?>
          </ul>



          <ul class="nav navbar-nav navbar-right">
              <!-- Menu Sebelah Kanan -->
          </ul>
          
        </div><!--/.nav-collapse -->
      </div>

      