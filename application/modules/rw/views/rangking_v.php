<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Sistem Pendukung Keputusan</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item">SPK</li>
            <li class="breadcrumb-item active">Sample</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->

      <!-- /.row -->
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <section class="col-lg-12 connectedSortable">

          <!-- NILAI WARGA -->
          <div class="card">
            <div class="card-header">
              <h4 class="card-title m-0 font-weight-bold text-primary">
                List Nilai Sample
              </h4>
            </div><!-- /.card-header -->
            <div class="card-body">
              <div class="table-responsive">
                <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
                  <thead>
                    <tr>
                      <th class="text-center">Nama</th>
                      <?php foreach ($aspek as $k) { ?>
                        <th class="text-center" colspan='<?php echo $k['jumlah_faktor'] ?>'>
                          <?php echo $k['aspek'] ?>
                        </th>
                      <?php } ?>
                    </tr>
                    <tr>
                      <th> </th>
                      <?php foreach ($faktor as $k) { ?>
                        <th class="text-center">
                          <?php echo strtoupper($k['faktor']) ?><br />
                          <?php echo strtoupper($k['type']) ?>
                        </th>
                      <?php } ?>
                    </tr>

                  </thead>
                  <tbody>
                    <?php
                    foreach ($warga as $k) { ?>
                      <tr class='text-center'>
                        <td> <?php echo $k['kd_alternatif'] ?></td>
                        <?php
                        $queryPenilaian = $this->db->query("
                                          select tb1.id_alternatif as id_alternatif, 
																					tb1.id_faktor as id_faktor,
																					tb2.faktor as faktor,
																					tb2.target as target,
																					tb2.type,
																					tb3.id_aspek as id_aspek,
                                          tb1.value as value
																					from pm_sample tb1
																					left join pm_faktor tb2 ON
																					tb1.id_faktor = tb2.id_faktor 
																					left join pm_aspek tb3 ON
																					tb2.id_aspek = tb3.id_aspek
																					where id_alternatif = " . $k['id_alternatif'] . "
																					order by tb2.id_aspek, tb1.id_faktor, tb1.id_alternatif ASC");
                        foreach ($queryPenilaian->result() as $tampilPenilaian) {
                        ?>
                          <td>
                            <?php echo $tampilPenilaian->value;  ?> <br>
                          </td>
                        <?php } ?>

                      </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div><!-- /.card-body -->
          </div>
          <!-- NILAI WARGA -->

          <!-- NILAI GAP WARGA -->
          <div class="card">
            <div class="card-header">
              <h4 class="card-title m-0 font-weight-bold text-primary">
                List Nilai GAP
              </h4>
            </div><!-- /.card-header -->
            <div class="card-body">
              <div class="table-responsive">
                <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
                  <thead>
                    <tr>
                      <th class="text-center">Nama</th>
                      <?php foreach ($aspek as $k) { ?>
                        <th class="text-center" colspan='<?php echo $k['jumlah_faktor'] ?>'>
                          <?php echo $k['aspek'] ?>
                        </th>
                      <?php } ?>
                    </tr>
                    <tr>
                      <th> </th>
                      <?php foreach ($faktor as $k) { ?>
                        <th class="text-center">
                          <?php echo strtoupper($k['faktor']) ?><br />
                          <?php echo strtoupper($k['type']) ?> <br />
                          <?php echo $k['target']; ?>
                        </th>
                      <?php } ?>
                    </tr>

                  </thead>
                  <tbody>
                    <?php
                    foreach ($warga as $k) { ?>
                      <tr class='text-center'>
                        <td> <?php echo $k['kd_alternatif'] ?></td>
                        <?php
                        $queryPenilaian = $this->db->query("
                                          select tb1.id_alternatif as id_alternatif, 
																					tb1.id_faktor as id_faktor,
																					tb2.faktor as faktor,
																					tb2.target as target,
																					tb3.id_aspek as id_aspek,
                                          tb1.value as value
																					from pm_sample tb1
																					left join pm_faktor tb2 ON
																					tb1.id_faktor = tb2.id_faktor 
																					left join pm_aspek tb3 ON
																					tb2.id_aspek = tb3.id_aspek
																					where id_alternatif = " . $k['id_alternatif'] . "
																					order by tb2.id_aspek, tb1.id_faktor, tb1.id_alternatif ASC");
                        foreach ($queryPenilaian->result() as $tampilPenilaian) {
                        ?>
                          <td>
                            <?php echo $tampilPenilaian->value - $tampilPenilaian->target;  ?> <br>
                          </td>
                        <?php } ?>
                      </tr>
                      </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div><!-- /.card-body -->
          </div>
          <!-- NILAI GAP WARGA -->

          <!-- NILAI BOBOT WARGA -->
          <div class="card">
            <div class="card-header">
              <h4 class="card-title m-0 font-weight-bold text-primary">
                List Nilai Bobot GAP
              </h4>
            </div><!-- /.card-header -->
            <div class="card-body">
              <div class="table-responsive">
                <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
                  <thead>
                    <tr>
                      <th class="text-center">Nama</th>
                      <?php foreach ($aspek as $k) { ?>
                        <th class="text-center" colspan='<?php echo $k['jumlah_faktor'] ?>'>
                          <?php echo $k['aspek'] ?>
                        </th>
                      <?php } ?>
                    </tr>
                    <tr>
                      <th> </th>
                      <?php foreach ($faktor as $k) { ?>
                        <th class="text-center">
                          <?php echo strtoupper($k['faktor']) ?><br />
                          <?php echo strtoupper($k['type']) ?> <br />
                          <?php echo $k['target']; ?>
                        </th>
                      <?php } ?>
                    </tr>

                  </thead>
                  <tbody>
                    <?php
                    foreach ($warga as $k) { ?>
                      <tr class='text-center'>
                        <td> <?php echo $k['kd_alternatif'] ?></td>
                        <?php
                        $queryPenilaian = $this->db->query("
                                          select tb1.id_alternatif as id_alternatif, 
																					tb1.id_faktor as id_faktor,
																					tb2.faktor as faktor,
																					tb2.target as target,
																					tb3.id_aspek as id_aspek,
                                          tb1.value as value
																					from pm_sample tb1
																					left join pm_faktor tb2 ON
																					tb1.id_faktor = tb2.id_faktor 
																					left join pm_aspek tb3 ON
																					tb2.id_aspek = tb3.id_aspek
																					where id_alternatif = " . $k['id_alternatif'] . "
																					order by tb2.id_aspek, tb1.id_faktor, tb1.id_alternatif ASC");
                        foreach ($queryPenilaian->result() as $tampilPenilaian) {
                        ?>
                          <td>
                            <?php
                            $gap = $tampilPenilaian->value - $tampilPenilaian->target;
                            echo bobot_gap($gap);
                            ?>
                            <br>
                          </td>
                        <?php } ?>
                      </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div><!-- /.card-body -->
          </div>
          <!-- NILAI BOBOT WARGA -->

          <!-- Perhitungan Nilai CF & CS -->
          <div class="card">
            <div class="card-header">
              <h4 class="card-title m-0 font-weight-bold text-primary">
                Perhitungan Nilai CF & CS
              </h4>
            </div><!-- /.card-header -->
            <div class="card-body">
              <div class="table-responsive">
                <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
                  <thead>
                    <tr>
                      <th class="text-center">Nama</th>
                      <?php foreach ($aspek as $k) { ?>
                        <th class="text-center" colspan='<?php echo $k['jumlah_faktor'] ?>'>
                          <?php echo $k['aspek'] ?>
                        </th>
                      <?php } ?>
                    </tr>
                    <tr>
                      <th> </th>
                      <?php foreach ($faktor1 as $k) { ?>
                        <th class="text-center">
                          <?php echo strtoupper($k['faktor']) ?><br />
                          <?php echo strtoupper($k['type']) ?> <br />
                        </th>
                      <?php } ?>
                    </tr>

                  </thead>
                  <tbody>
                  <tr class='bg-success'>
                      <td class='text-center'> <strong>Jumlah Item Factor</strong> </td>
                      <?php
                      foreach ($cf_sf as $k) {
                      ?>
                        <td class="text-center" colspan='
								<?php echo $k['jumlah_item']; ?></strong>'>
                          <strong>
                            <?php echo $k['jumlah_item']; ?></strong>
                        </td>
                      <?php } ?>

                    </tr>
                    <?php
                    foreach ($warga as $k) { ?>
                      <tr class='text-center'>
                        <td> <?php echo $k['kd_alternatif'] ?></td>
                        <?php
                        $queryPenilaian = $this->db->query("
												select tb1.id_alternatif as id_alternatif, 
												tb1.id_faktor as id_faktor,
												tb2.faktor as faktor,
												tb2.target as target,
												tb2.type as type,
												tb3.id_aspek as id_aspek,
												tb1.value as value
												from pm_sample tb1
												left join pm_faktor tb2 ON
												tb1.id_faktor = tb2.id_faktor 
												left join pm_aspek tb3 ON
												tb2.id_aspek = tb3.id_aspek
												where id_alternatif = " . $k['id_alternatif'] . "
												order by tb2.id_aspek,tb2.type, tb1.id_faktor, tb1.id_alternatif ASC");

                        foreach ($queryPenilaian->result() as $tampilPenilaian) {

                          $queryJumlahNilai = $this->db->query("
													select tb1.id_alternatif as id_alternatif, 
													tb1.id_faktor as id_faktor,
													tb2.faktor as faktor,
													tb2.target as target,
													tb3.id_aspek as id_aspek,
													tb1.value as value
													from pm_sample tb1
													left join pm_faktor tb2 ON
													tb1.id_faktor = tb2.id_faktor 
													left join pm_aspek tb3 ON
													tb2.id_aspek = tb3.id_aspek
													where tb1.id_alternatif = '$tampilPenilaian->id_alternatif'
													AND tb3.id_aspek = '$tampilPenilaian->id_aspek'
													AND tb2.type = '$tampilPenilaian->type'
													order by tb2.id_aspek,tb2.type, tb1.id_faktor, tb1.id_alternatif ASC
													");


                        ?>
                          <td>
                            <?php
                            $N = 0;
                            $jumlahitem = 0;
                            foreach ($queryJumlahNilai->result() as $jumlahNilai) {
                              $gap = $jumlahNilai->value - $jumlahNilai->target;
                              $bobot = bobot_gap($gap);
                              $N = $bobot + $N;
                              ++$jumlahitem;
                            }
                            $NF = $N / $jumlahitem;
                            echo  $NF;
                            ?>
                          </td>
                        <?php } ?>
                      </tr>

                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div><!-- /.card-body -->
          </div>
          <!-- Perhitungan Nilai CF & CS -->

          <!-- Perhitungan Nilai Total -->
          <div class="card">
            <div class="card-header">
              <h4 class="card-title m-0 font-weight-bold text-primary">
                Perhitungan Nilai Total Dari Kriteria N
              </h4>
            </div><!-- /.card-header -->
            <div class="card-body">
              <div class="table-responsive">
                <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
                  <thead>
                    <tr>
                      <th class="text-center">Nama</th>
                      <?php foreach ($aspek as $k) { ?>
                        <th class="text-center" colspan='<?php echo $k['jumlah_faktor'] ?>'>
                          <?php echo $k['aspek'] ?>
                        </th>
                      <?php } ?>
                    </tr>
                    <tr>
                      <th> </th>
                      <?php foreach ($faktor1 as $k) { ?>
                        <th class="text-center">
                          <?php echo strtoupper($k['faktor']) ?><br />
                          <?php echo strtoupper($k['type']) ?> <br />
                        </th>
                      <?php } ?>
                    </tr>

                  </thead>
                  <tbody>
                  <tr class='bg-success'>
                      <td class='text-center'> <strong>x(%)</strong> </td>
                      <?php
                      $querySubKriteria = $this->db->query("
                                            SELECT a.id_aspek,
                                            b.bobot_core,b.bobot_secondary,
											a.type, 
											COUNT(a.id_aspek) AS jumlah_item 
											FROM pm_faktor a 
                      INNER JOIN pm_aspek b ON a.id_aspek = b.id_aspek
                                            GROUP BY a.id_faktor, a.id_aspek, a.type
                                            ORDER BY a.id_aspek, a.type ASC");

                      foreach ($querySubKriteria->result() as $tampilSubKriteria) {
                      ?>
                        <td class="text-center" colspan='
								<?php echo  $tampilSubKriteria->jumlah_item; ?></strong>'>
                          <strong>
                            <?php echo $tampilSubKriteria->bobot_core; ?></strong> :
                          <strong>
                            <?php echo $tampilSubKriteria->bobot_secondary; ?></strong>
                        </td>
                      <?php
                      }
                      ?>
                    </tr>
                    <?php
                    foreach ($warga as $k) { ?>
                      <tr class='text-center'>
                        <td> <?php echo $k['kd_alternatif'] ?></td>
                        <?php
                        $queryPenilaian = $this->db->query("
												select 
												tb1.id_alternatif as id_alternatif,
												tb2.id_aspek as id_aspek,
												count(tb2.type) as jumlah_factor
												from pm_sample tb1
												left join pm_faktor tb2 ON
												tb1.id_faktor = tb2.id_faktor 
												left join pm_aspek tb3 ON
												tb2.id_aspek = tb3.id_aspek
												where id_alternatif = " . $k['id_alternatif'] . "
												group by tb2.id_aspek
												order by tb2.id_aspek ASC");

                        foreach ($queryPenilaian->result() as $tampilPenilaian) {

                          $queryJumlahNilaiCF = $this->db->query("
													select tb1.id_alternatif as id_alternatif, 
													tb1.id_faktor as id_faktor,
													tb2.faktor as faktor,
                                                    tb2.target as target,
                                                    tb3.bobot_core as bobot_core,
													tb3.id_aspek as id_aspek,
													tb1.value as value
													from pm_sample tb1
													left join pm_faktor tb2 ON
													tb1.id_faktor = tb2.id_faktor 
													left join pm_aspek tb3 ON
													tb2.id_aspek = tb3.id_aspek
													where tb1.id_alternatif = '$tampilPenilaian->id_alternatif'
													AND tb3.id_aspek = '$tampilPenilaian->id_aspek'
													AND tb2.type = 'core'
													order by tb2.id_aspek, tb1.id_faktor, tb1.id_alternatif ASC
													");

                          $queryJumlahNilaiSF = $this->db->query("
													select tb1.id_alternatif as id_alternatif, 
													tb1.id_faktor as id_faktor,
													tb2.faktor as faktor,
                                                    tb2.target as target,
                                                    tb3.bobot_secondary as bobot_secondary,
													tb3.id_aspek as id_aspek,
													tb1.value as value
													from pm_sample tb1
													left join pm_faktor tb2 ON
													tb1.id_faktor = tb2.id_faktor 
													left join pm_aspek tb3 ON
													tb2.id_aspek = tb3.id_aspek
													where tb1.id_alternatif = '$tampilPenilaian->id_alternatif'
													AND tb3.id_aspek = '$tampilPenilaian->id_aspek'
													AND tb2.type = 'secondary'
													order by tb2.id_aspek, tb1.id_faktor, tb1.id_alternatif ASC
													");


                        ?>
                          <td colspan='<?php echo $tampilPenilaian->jumlah_factor; ?>'>
                            <?php
                            $NC = 0;
                            $jumlahitemNC = 0;
                            foreach ($queryJumlahNilaiCF->result() as $jumlahNilaiNC) {
                              $gap = $jumlahNilaiNC->value - $jumlahNilaiNC->target;
                              $bobot = bobot_gap($gap);
                              $NC = $bobot + $NC;
                              ++$jumlahitemNC;
                            }

                            $NCF = $NC / $jumlahitemNC;
                            $bobotNC = $jumlahNilaiNC->bobot_core;


                            $NS = 0;
                            $jumlahitemNS = 0;
                            foreach ($queryJumlahNilaiSF->result() as $jumlahNilaiNS) {
                              $gap = $jumlahNilaiNS->value - $jumlahNilaiNS->target;
                              $bobot = bobot_gap($gap);
                              $NS = $bobot + $NS;
                              ++$jumlahitemNS;
                            }
                            $NSF = $NS / $jumlahitemNS;
                            $bobotNS = $jumlahNilaiNS->bobot_secondary;
                            $N = (($bobotNC / 100) * $NCF) + (($bobotNS / 100) * $NSF);

                            echo $N;

                            ?>
                          </td>
                        <?php } ?>
                      </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div><!-- /.card-body -->
          </div>
          <!-- Perhitungan Nilai Total -->

          <!-- Total Keseluruhan -->
          <div class="card">
            <div class="card-header">
              <h4 class="card-title m-0 font-weight-bold text-primary">
                Total Keseluruhan
              </h4>
            </div><!-- /.card-header -->
            <div class="card-body">
              <div class="table-responsive">
                <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
                  <thead>
                    <tr>
                      <th class="text-center">Nama</th>
                      <?php foreach ($aspek as $k) { ?>
                        <th class="text-center" colspan='<?php echo $k['jumlah_faktor'] ?>'>
                          <?php echo $k['aspek'] ?>
                        </th>
                      <?php } ?>
                      <th>
                        Hasil Akhir
                      </th>
                    </tr>


                  </thead>
                  <tbody>
                    <tr class='bg-success'>
                      <td class='text-center'> <strong>x(%)</strong> </td>
                      <?php
                      $querySubKriteria = $this->db->query("
											SELECT tb1.id_aspek as id_aspek,
											tb2.prosentase as bobot,
											count(tb1.type) as jumlah_factor
 											FROM pm_faktor tb1
											left join pm_aspek tb2 on
											tb1.id_aspek = tb2.id_aspek 
                                            GROUP BY tb1.id_aspek
                                            ORDER BY id_aspek ASC");

                      foreach ($querySubKriteria->result() as $tampilSubKriteria) {
                      ?>
                        <td class="text-center" colspan='
								<?php echo $tampilSubKriteria->jumlah_factor; ?>'>
                          <strong>
                            <?php echo $tampilSubKriteria->bobot; ?></strong>
                        </td>
                      <?php
                      }
                      ?>
                      <td></td>
                    </tr>
                    <?php
                    foreach ($warga as $k) { ?>
                      <tr class='text-center'>
                        <td> <?php echo $k['kd_alternatif'] ?></td>
                        <?php
                        $queryPenilaian = $this->db->query("
												select 
												tb1.id_alternatif as id_alternatif,
												tb2.id_aspek as id_aspek,
												tb3.prosentase as prosentase,
												count(tb2.type) as jumlah_factor
												from pm_sample tb1
												left join pm_faktor tb2 ON
												tb1.id_faktor = tb2.id_faktor 
												left join pm_aspek tb3 ON
												tb2.id_aspek = tb3.id_aspek
												where id_alternatif = " . $k['id_alternatif'] . "
												group by tb2.id_aspek
												order by tb2.id_aspek ASC");

                        $R = 0;

                        foreach ($queryPenilaian->result() as $tampilPenilaian) {

                          $queryJumlahNilaiCF = $this->db->query("
													select tb1.id_alternatif as id_alternatif, 
													tb1.id_faktor as id_faktor,
													tb2.faktor as faktor,
                                                    tb2.target as target,
                                                    tb3.bobot_core as bobot_core,
													tb3.id_aspek as id_aspek,
													tb1.value as value
													from pm_sample tb1
													left join pm_faktor tb2 ON
													tb1.id_faktor = tb2.id_faktor 
													left join pm_aspek tb3 ON
													tb2.id_aspek = tb3.id_aspek
													where tb1.id_alternatif = '$tampilPenilaian->id_alternatif'
													AND tb3.id_aspek = '$tampilPenilaian->id_aspek'
													AND tb2.type = 'core'
													order by tb2.id_aspek, tb1.id_faktor, tb1.id_alternatif ASC
													");

                          $queryJumlahNilaiSF = $this->db->query("
													select tb1.id_alternatif as id_alternatif, 
													tb1.id_faktor as id_faktor,
													tb2.faktor as faktor,
                                                    tb2.target as target,
                                                    tb3.bobot_secondary as bobot_secondary,
													tb3.id_aspek as id_aspek,
													tb1.value as value
													from pm_sample tb1
													left join pm_faktor tb2 ON
													tb1.id_faktor = tb2.id_faktor 
													left join pm_aspek tb3 ON
													tb2.id_aspek = tb3.id_aspek
													where tb1.id_alternatif = '$tampilPenilaian->id_alternatif'
													AND tb3.id_aspek = '$tampilPenilaian->id_aspek'
													AND tb2.type = 'secondary'
													order by tb2.id_aspek, tb1.id_faktor, tb1.id_alternatif ASC
													");


                        ?>
                          <td colspan='<?php echo $tampilPenilaian->jumlah_factor; ?>'>
                            <?php
                            $NC = 0;
                            $jumlahitemNC = 0;
                            foreach ($queryJumlahNilaiCF->result() as $jumlahNilaiNC) {
                              $gap = $jumlahNilaiNC->value - $jumlahNilaiNC->target;
                              $bobot = bobot_gap($gap);
                              $NC = $bobot + $NC;
                              ++$jumlahitemNC;
                            }

                            $NCF = $NC / $jumlahitemNC;
                            $bobotNC = $jumlahNilaiNC->bobot_core;


                            $NS = 0;
                            $jumlahitemNS = 0;
                            foreach ($queryJumlahNilaiSF->result() as $jumlahNilaiNS) {
                              $gap = $jumlahNilaiNS->value - $jumlahNilaiNS->target;
                              $bobot = bobot_gap($gap);
                              $NS = $bobot + $NS;
                              ++$jumlahitemNS;
                            }
                            $NSF = $NS / $jumlahitemNS;
                            $bobotNS = $jumlahNilaiNS->bobot_secondary;
                            $N = (($bobotNC / 100) * $NCF) + (($bobotNS / 100) * $NSF);

                            echo $N;

                            $prosentase = $tampilPenilaian->prosentase;

                            $persen = $prosentase / 100;


                            $R = ($N * $persen) + $R;

                            $id_hasil = uniqid();
                            ?>
                          </td>
                        <?php }
                        ?>
                        <td>
                          <?php
                          $sql = $this->db->query("SELECT id_alternatif,hasil FROM pm_hasil where id_alternatif = " . $k['id_alternatif'] . "");
                          $result = $sql->num_rows();
                          if ($result == 0) {
                            $sql = $this->db->query("INSERT INTO pm_hasil (id_alternatif,hasil) VALUES (" . $k['id_alternatif'] . ",'$R')");
                          } else {
                            $sql = $this->db->query("UPDATE pm_hasil SET `hasil`='$R' WHERE id_alternatif = " . $k['id_alternatif'] . " ");
                          }
                          echo $R;
                          ?>
                        </td>
                      </tr>
                    <?php

                    } ?>
                  </tbody>
                </table>
              </div>
            </div><!-- /.card-body -->
          </div>
          <!-- Total Keseluruhan -->

          <!-- Rangking -->
          <div class="card">
            <div class="card-header">
              <h4 class="card-title m-0 font-weight-bold text-primary">
                Perangkingan
              </h4>
            </div><!-- /.card-header -->
            <div class="card-body">
              <div class="table-responsive">
                <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
                  <thead>
                    <tr class="text-center">
                      <th>No</th>
                      <th>Nama</th>
                      <th>Total Nilai</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 1;
                    foreach ($rangking as $r) { ?>
                      <tr class='text-center'>
                        <td><?php echo $no++ ?></td>
                        <td><?php echo $r['nama'] ?></td>
                        <td><?php echo $r['hasil'] ?></td>
                      </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div><!-- /.card-body -->
          </div>
          <!-- Rangking -->

          <!-- Modal -->

          <!-- Modal -->
        </section>
        <!-- /.Left col -->
        <!-- right col (We are only adding the ID to make the widgets sortable)-->

        <!-- right col -->
      </div>
      <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- Bootstrap modal -->

<!-- /.modal -->
<!-- End Bootstrap modal -->