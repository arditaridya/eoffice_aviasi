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
                                <a href="#">Laporan</a>
                                <i class="fa fa-angle-right"></i>
                            </li>
                            <li>
                                <a href="#">TNI AD</a>
                                <i class="fa fa-angle-right"></i>
                            </li>
                            <li>
                                <a href="<?php echo site_url('cetak_tniad/lap_amunisi_pesawat_ad'); ?>">Amunisi Pesawat</a>
                            </li>
                        </ul>
                        <div class="page-toolbar">
                            <div id="dashboard-report-range" class="pull-right tooltips btn btn-sm btn-default" data-container="body" data-placement="bottom" data-original-title="Rubah range tanggal">
                                <i class="icon-calendar"></i>&nbsp; 
                                <span class="thin uppercase visible-lg-inline-block">&nbsp;</span>&nbsp; 
                                <i class="fa fa-angle-down"></i>
                            </div>
                        </div>
                    </div>
                    <br />
                    <!-- END PAGE HEADER-->
                    <div class="row">
                        <div class="col-md-12">
                            <!-- BEGIN EXAMPLE TABLE PORTLET-->
                            <div class="portlet box red">
								<div class="portlet-title">
                                    <div class="caption">
                                        List Data Munisi Pesawat
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
                                                    <a href="<?php echo site_url('cetak_tniad/cetakamunisipesawatad') ?>" target="_blank">
														<button id="sample_editable_1_new" class="btn green">
                                                            Print <i class="fa fa-print"></i>
                                                        </button>
													</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
									
                                    <?php
                                    if ($this->session->flashdata('tambah_sukses')) {
                                        echo '<div class="alert alert-success"><a class="close" data-dismiss="alert">&times;</a>Data berhasil disimpan</div>';
                                    }
                                    ?>
									
									<?php
                                    if ($this->session->flashdata('update_sukses')) {
                                        echo '<div class="alert alert-success"><a class="close" data-dismiss="alert">&times;</a>Data berhasil diupdate</div>';
                                    }
                                    ?>

                                    <?php
                                    if ($this->session->flashdata('hapus_sukses')) {
                                        echo '<div class="alert alert-success"><a class="close" data-dismiss="alert">&times;</a>Data berhasil dihapus</div>';
                                    }
                                    ?>
									
									<table class="table table-striped table-bordered table-hover" id="sample_2">
										<thead>
											<tr>
												<th>No</th>
												<th>Alutsista</th>
												<th>Jumlah</th>
												<th>Keterangan</th>
												<!--<th>Action</th>-->
											</tr>
										</thead>
										<tbody>
											<?php 
												$no=1;
												foreach($data_amunisi_pesawat_ad as $hasil){ 
											?>
											<tr>
												<td><?php echo $no; ?></td>
												<td><?php echo $hasil->barang; ?></td>
												<td><?php echo $hasil->jml; ?></td>
												<td><?php echo $hasil->ket; ?></td>
												<!--<td>
													<a href="<?php echo base_url() .'c_alutsista/edit_amunisi_pesawat_ad/'. $hasil->id; ?>" class="btn default btn-xs green">
														<i class="fa fa-edit"></i> Edit 
													</a>
													<a href="<?php echo base_url().'c_alutsista/delete_amunisi_pesawat_ad/'. $hasil->id; ?>">
														<button class="btn default btn-xs red" data-toggle="confirmation" data-original-title="Are you sure ?" title="">
															<i class="fa fa-trash-o"></i> Delete
														</button>
													</a>
												</td>-->
											</tr>
											<?php 
												$no++; 
												} 
											?>
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