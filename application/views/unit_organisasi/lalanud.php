<!DOCTYPE html>
<html lang="en" class="no-js">
    <?php $this->load->view('v_header') ?>
    <body class="page-header-fixed page-quick-sidebar-over-content page-sidebar-closed-hide-logo page-container-bg-solid">
        <?php $this->load->view('v_horizontal_menu') ?>
        <div class="clearfix">
        </div>

        <!-- BEGIN CONTAINER -->
        <div class="page-container">
            <!-- BEGIN SIDEBAR -->
            <?php $this->load->view('v_sidebar') ?>
            <!-- END SIDEBAR -->
            <!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">
                <div class="page-content">
                    <!-- BEGIN PAGE HEADER-->
                    <div class="page-bar">
                        <ul class="page-breadcrumb">
                            <li>
                                <i class="fa fa-home"></i>
                                <a href="<?php echo site_url('main_menu/admin') ?>">Menu Utama</a>
                                <i class="fa fa-angle-right"></i>
                            </li>
							 
							<li>
                                <a href="<?php echo site_url('c_kesatuan/laporan') ?>">Laporan Data Aset</a>
                                
                                <i class="fa fa-angle-right"></i>
                            </li>
							<li>
                                <a href="<?php echo site_url("c_kesatuan/laporan_perpangkalan/$idnya") ?>"><b>Laporan Per SATKER</b> (<font color="blue"> <?php echo $namanya; ?> </font>)</a>
                                
                                <i class="fa fa-angle-right"></i>
                            </li>
							 
                            
                            
                        </ul>
                        <div class="page-toolbar">
                            <div id="dashboard-report-range" class="pull-right tooltips btn btn-sm btn-default" data-container="body" data-placement="bottom" data-original-title="Kalender">
                                <i class="icon-calendar"></i>&nbsp; 
                                <span class="thin uppercase visible-lg-inline-block">&nbsp;</span>&nbsp; 
                                <i class="fa fa-angle-down"></i>
                            </div>
                        </div>
                    </div>
                    <!-- END PAGE HEADER-->
                    <h3 class="page-title"><?php // echo $judul; ?></h3>
                    <div class="row">
                        <div class="col-md-12">
                            <!-- BEGIN EXAMPLE TABLE PORTLET-->
                            <div class="portlet box blue">
                                <div class="portlet-title">
                                    <div class="caption">
                                        List Laporan Data Aset
                                    </div>
									
                                    <div class="tools">
                                        <a href="javascript:;" class="collapse">
                                        </a>
                                    </div>
                                </div>
								
                                <div class="portlet-body">
                                    <div class="table-toolbar">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="btn-group">
												<!--
                                                    <a href="<?php echo site_url('pemanfaatan/tambah') ?>">
                                                        <button id="sample_editable_1_new" class="btn blue">
                                                            Tambah Data <i class="fa fa-plus"></i>
                                                        </button>
                                                    </a>
												-->
                                                </div>
													<div align="left"><b>MARKAS BESAR ANGKATAN UDARA<br>DINAS FASILITAS DAN KONTRUKSI</b></div>
													
                                            </div>
                                        </div>
                                    </div>
									<!--<div align="center"><b>REKAPITULASI INVENTARIS TANAH TNI AU</b></div>-->
                                    
                                    <center><h3>Rekapitulasi Inventaris Tanah TNI AU</h3></center>
                                    
                                    <script type="text/javascript">
									
									$(function () {
										$('#container').highcharts({
											chart: {
												type: 'column'
											},
											title: {
												text: 'Aset Tanah Berdasarkan Jumlah Simak'
											},
											xAxis: {
												categories: [<?php echo $lanud; ?>],
												crosshair: true
											},
											yAxis: {
												min: 0,
												title: {
													text: 'BDG'
												}
											},
											tooltip: {
												headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
												pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
													'<td style="padding:0"><b>{point.y}</b></td></tr>',
												footerFormat: '</table>',
												shared: true,
												useHTML: true
											},
											plotOptions: {
												column: {
													pointPadding: 0.2,
													borderWidth: 0
												}
											},
											series: [
											<?php for($a=0;$a<count($label);$a++){ ?>
											{
												name: '<?php echo $label[$a]; ?>',
												data: [<?php echo $data[$a]; ?>]
									
											},
											<?php } ?>
											]
										});
									});
									
									$(function () {
										$('#container3').highcharts({
											chart: {
												type: 'pie',
												options3d: {
													enabled: true,
													alpha: 45,
													beta: 0
												}
											},
											title: {
												text: 'Aset Tanah Berdasarkan Sertifikat'
											},
											tooltip: {
												pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
											},
											plotOptions: {
												pie: {
													allowPointSelect: true,
													cursor: 'pointer',
													depth: 35,
													dataLabels: {
														enabled: true,
														format: '{point.name}'
													}
												}
											},
											series: [{
												type: 'pie',
												name: 'BDG',
												data: [
													<?php
													/*$x_lanud = explode(",",$lanud);
													$x_total = explode(",",$total);
													$jml = 0;
													foreach($x_total as $dataQTotal){
														$jml = $jml + $dataQTotal;
													}
													for($a=0;$a<count($x_lanud)-1;$a++){
														if($x_total[$a] != "0"){
													?>
													[<?php echo $x_lanud[$a]; ?>,<?php echo ($x_total[$a] * 100) / $jml; ?>],
													<?php }}*/ ?>
													['Sudah Sertifikat',<?php echo $sudah; ?>],
													['Belum Sertifikat',<?php echo $belum; ?>]
												]
											}]
										});
									});
									</script>
											
									<table>
                                    	<tr>
                                        	<td>
                                    			<div id="container" style="width: 650px; height: 300px; margin: 0 auto; margin-left:0px"></div>
											</td>
                                    		<td style="padding-left:10px">
                                            	<div id="container3" style="width: 400px; height: 300px; margin-left:0px"></div>
                                            </td>
                                        </tr>
                                    </table>
                                    
                                   <br>
                                    <table class="table table-striped table-bordered table-hover table-responsive">
                                        <thead>
                                            <tr>
                                                <th width="5%" rowspan="2"><center>No</center></th>
												<th rowspan="2"><center>NAMA SATKER</center></th>
												<th rowspan="2"><center>BDG</center></th>
												<th rowspan="2"><center>LUAS TANAH</center></th>
												<th colspan="2"><center>SUDAH SERTIFIKAT</center></th>
												<th colspan="2"><center>BELUM SERTIFIKAT</center></th>
												<th rowspan="2"><center>NILAI (Rp)</center></th>
												<th rowspan="2"><center>PROSENTASE (%)</center></th>
												<th rowspan="2"><center>KETERANGAN</center></th>
                                            </tr>
											<tr>
                                                <th><center>BDG</center></th>
												<th><center>LUAS (m&sup2;)</center></th>
												<th><center>BDG</center></th>
												<th><center>LUAS (m&sup2;)</center></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
											$sa1 = 0;
											$sa2 = 0;
											$sa3 = 0;
											$sa4 = 0;
											$sa5 = 0;
											$sa6 = 0;
											$sa7 = 0;
											$sa8 = 0;
											$sc8 = 0;
											$t = "";
                                           foreach ($datanyax as $row) {
											   $zakzak = $row->id; 
                                                ?>
                                                <tr class="odd gradeX" >
                                                    <td width="5%" align="center"><?php echo $no; ?></td>
                                                    <td><a href="<?php echo site_url("c_kesatuan/laporan_persatuan/$zakzak") ?>"><?php echo $row->lanud; ?></a></td>
													<td align="right">
													<?php 
													
													/*
													$query = $this->db->query("SELECT 
															count(a.id) as countn1
														FROM 
															data_aset a,
															m_lanud c
															
														where 
														a.lanud = c.id and
														c.id = '$zakzak'

															

															

															")->result();
													*/
													
													$query = $this->db->query("SELECT 
															count(d.id) as countn1
														FROM 
															data_aset a,
															m_lanud c,
															detil_dataaset d
															
														where 
														a.lanud = c.id and
														c.id = '$zakzak'
														and d.dataaset=a.id

															

															

															")->result();
															
														foreach ($query as $rys)
															{
																$countn1 = $rys->countn1;
															}
															echo $countn1;
													?>
													
                                                    </td>
													<td align="right">
														<?php
															$query2 = $this->db->query("
																								SELECT SUM(cast(a.luas as bigint)) as sumo 
																								FROM 
																									detil_dataaset a,data_aset b,m_lanud c
																								WHERE
																									a.dataaset=b.id and
																									b.lanud = c.id and
																									c.id='$zakzak'
																								
																								")->result();
																								
																					foreach ($query2 as $ruk)
																							{
																							$sumo = $ruk->sumo;
																							
																							}	
																							 echo number_format($sumo, 0, "," , ".");
															
															?>
													</td>
													<td align="right">
														<?php
															$query3 = $this->db->query("
																								SELECT COUNT(a.jenis) as jumo 
																								FROM 
																									detil_dataaset a,data_aset b,m_lanud c
																								WHERE
																									a.dataaset=b.id and
																									b.lanud = c.id and
																									a.jenis='1' and
																									c.id='$zakzak'
																								
																								")->result();
																								
																					foreach ($query3 as $ruk)
																							{
																							$jumo = $ruk->jumo;
																							
																							}	
																							echo $jumo;
															
															?>
													</td>
													<td align="right">
															<?php
															$query5 = $this->db->query("
																								SELECT SUM(cast(a.luas as bigint)) as wumo 
																								FROM 
																									detil_dataaset a,data_aset b,m_lanud c
																								WHERE
																									a.dataaset=b.id and
																									b.lanud = c.id and
																									a.jenis='1' and
																									c.id='$zakzak'
																								
																								")->result();
																								
																					foreach ($query5 as $ruk)
																							{
																							$wumo = $ruk->wumo;
																							
																							}	
																							echo number_format($wumo, 0, "," , ".");
															
															?>
													</td>
													<td align="right">
															<?php
															$query4 = $this->db->query("
																								SELECT COUNT(a.jenis) as qumo 
																								FROM 
																									detil_dataaset a,data_aset b,m_lanud c
																								WHERE
																									a.dataaset=b.id and
																									b.lanud = c.id and
																									a.jenis='2' and
																									c.id='$zakzak'
																								
																								")->result();
																								
																					foreach ($query4 as $ruk)
																							{
																							$qumo = $ruk->qumo;
																							
																							}	
																							echo $qumo;
															
															?>
													</td>
													<td align="right">
															<?php
															$query6 = $this->db->query("
																								SELECT SUM(cast(a.luas as bigint)) as eumo 
																								FROM 
																									detil_dataaset a,data_aset b,m_lanud c
																								WHERE
																									a.dataaset=b.id and
																									b.lanud = c.id and
																									a.jenis='2' and
																									c.id='$zakzak'
																								
																								")->result();
																								
																					foreach ($query6 as $ruk)
																							{
																							$eumo = $ruk->eumo;
																							
																							}	
																							echo number_format($eumo, 0, "," , ".");
															
															?>
													</td>
													<td align="right">
															<?php
															$query7 = $this->db->query("
																								SELECT SUM(cast(b.nilai as bigint)) as nilau 
																								FROM 
																									data_aset b,m_lanud c
																								WHERE
																									
																									b.lanud = c.id and
																									c.id='$zakzak'
																								
																								")->result();
																								
																					foreach ($query7 as $ruk)
																							{
																							$nilau = $ruk->nilau;
																							
																							}	
																							echo number_format($nilau, 0, "," , ".");
															
															?>
													</td>
													<td align="right">
															<?php
															if ($wumo == null || $sumo == null){
																$porsen = 0;
																echo "";
															}else{
															$porsen = ($wumo / $sumo) * 100;
															echo number_format($porsen, 2, "," , ".");
															}
															?>
													
													</td>
													<td></td>
													
                                                </tr>
												
                                                <?php
												
												$sa1 = $sa1 + $countn1;
												$sa2 = $sa2 + $sumo;
												$sa3 = $sa3 + $jumo;
												$sa4 = $sa4 + $wumo;
												$sa5 = $sa5 + $qumo;
												$sa6 = $sa6 + $eumo;
												$sa7 = $sa7 + $nilau;
												$sc8 = $sc8 + $porsen;
											
                                                $no++;
												}
												
												$qw1 = count($jumda);
												if ($qw1 == 0){
													$sa8 = 0;
												}else{
												$sa8 = $sc8 / $qw1 ;
												}
												?>
												<tr>
													
													<td colspan="2" align="center">JUMLAH</td>
													
													<td align="right"><?php echo $sa1; ?></td>
													<td align="right"><?php echo number_format($sa2, 0, "," , "."); ?></td>
													<td align="right"><?php echo $sa3; ?></td>
													<td align="right"><?php echo number_format($sa4, 0, "," , "."); ?></td>
													<td align="right"><?php echo $sa5; ?></td>
													<td align="right"><?php echo number_format($sa6, 0, "," , "."); ?></td>
													<td align="right"><?php echo number_format($sa7, 0, "," , "."); ?></td>
													<?php /* ?>
                                                    <td align="right"><?php echo number_format($sa8, 2, "," , "."); ?></td>
                                                    <?php */ ?>
                                                    <td align="right"><?php echo number_format(($sa4*100)/$sa2, 2, "," , "."); ?></td>
													<td></td>
													
												</tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- END EXAMPLE TABLE PORTLET-->
                        </div>
                    </div>
                </div>
            </div>
            <!-- END CONTENT -->
        </div>
        <!-- END CONTAINER -->
        <?php $this->load->view('v_footer') ?>
    </body>
    <!-- END BODY -->
</html>