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
                                <a href="<?php echo site_url('#') ?>">Master</a>
                                <i class="fa fa-angle-right"></i>
                            </li>
                            <li>
                                <a href="<?php echo site_url('c_master/jenis_barang'); ?>">Jenis Barang</a>
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
					
					<form class="horizontal-form" method="post">
					<div style="border: 2px solid #F5F5F5;padding: 20px; background-color: #F5F5F5;border-radius: 20px;">
						<h4><strong>Pencarian</strong></h4>
						<div id="cetak" style="display:none;">
							<div class="row">
								<div class="form-group">
									<label class="col-md-1">Komoditi</label>
									<div class="col-md-3">
										<select class="form-control" name="KOMODITI">
											<option>-Pilih-</option>
											<?php foreach($get_komoditi as $row){ ?>
											<option value="<?php echo $row->id; ?>"><?php echo $row->komoditi; ?></option>
											<?php } ?>
										</select>
									</div>
								</div>
							</div>
						</div>
						<br/>
						<div class="row">
							<div class="control-group">
								<div class="form-actions left">
									<button type="submit" name="CARI" class="btn green"><i class="fa fa-check"></i> Cari</button>
									<input type="button" id="hide" class="btn yellow" value="Tampilkan Semua Pencarian" />
								</div>
							</div>
						</div>
					</div>
					</form>
					
                    <div class="row">
                        <div class="col-md-12">
                            <!-- BEGIN EXAMPLE TABLE PORTLET-->
                            <div class="portlet box red">
                                <div class="portlet-title">
                                    <div class="caption">
                                        List Data Jenis Barang
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
                                                    <a href="<?php echo site_url('c_master/tambah_jenis_barang') ?>">
														<button id="sample_editable_1_new" class="btn blue">
                                                            Tambah Baru <i class="fa fa-plus"></i>
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
                                                <tr>
                                                <th>NO</th>
												<th>ID</th>
												<th>Jenis Barang</th>
												<th>Aksi</th>
                                            </tr>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            foreach ($jenis_barang as $data) {
                                                ?>
                                                <tr class="odd gradeX">
                                                    <td><?php echo $no; ?></td>
													<td><?php echo $data->id; ?></td>
													<td><?php echo $data->jenis; ?></td>
                                                    <td>
                                                        <a href="<?php echo base_url() . "c_master/edit_jenis_barang/" . $data->id; ?>" class="btn default btn-xs green">
                                                            <i class="fa fa-edit"></i> Edit </a>
                                                        <a href="<?php echo base_url() . "c_master/hapus_jenis_barang/" . $data->id; ?>">
                                                            <button class="btn default btn-xs red" data-toggle="confirmation" data-original-title="Are you sure ?" title="">
																<i class="fa fa-trash-o"></i> Delete
															</button>
                                                        </a>
                                                    </td>
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

<script>
	$("#hide").click(function(){
		if($("#cetak").css('display') == 'none'){
			$("#cetak").show("blind")
			$("#hide").val("Sembunyikan Semua Pencarian")
		}
		else if (($("#cetak").css('display') == 'block')){
			$("#cetak").hide("blind")
			$("#hide").val("Tampilkan Semua Pencarian")
		}
	});
</script>