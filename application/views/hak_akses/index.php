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
                                <a href="#">Hak Akses</a>
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
                                        List Data Hak Akses
                                    </div>
                                    <div class="tools">
                                        <a href="javascript:;" class="collapse">
                                        </a>
                                    </div>
                                </div>
                                <div class="portlet-body" style="background-color:#99ccff;">
                                    <div class="table-toolbar">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="btn-group">
													<!--
                                                    <a href="<?php echo site_url('hak_akses/tambah') ?>">
                                                        <button id="sample_editable_1_new" class="btn blue">
                                                            Tambah Baru <i class="fa fa-plus"></i>
                                                        </button>
                                                    </a>
													-->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                   
                                    <table class="table table-striped table-bordered table-hover table-responsive" id="sample_2">
                                        <thead>
                                            <tr bgcolor="#ccccff">
                                                <th>No</th>
                                                <th>Grup User</th>
												<th>Jumlah Modul</th>
												<th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            foreach ($model as $row) {
												$zakzak = $row->id;
                                                ?>
                                                <tr class="odd gradeX" bgcolor="#ccccff">
                                                    <td width="10%"><?php echo $no; ?></td>
                                                    <td width="35%"><?php echo $row->nama; ?></td>
													<td width="35%">
													<?php if($row->id == 0) { echo ""; }else {?>
														<?php $query = $this->db->query("SELECT 
															count(id) as countn1
														FROM 
															hak_akses
															
														where 
														grup_user='$zakzak'
															

															

															")->result();
															
														foreach ($query as $rys)
															{
																$countn1 = $rys->countn1;
															}
															echo $countn1;
													}
													?>
													</td>
                                                    <td width="20%">
													<?php if($row->id == 0) { echo ""; }else {?>
													<center>
                                                        <a href="<?php echo base_url('hak_akses/edit/' . $row->id . ''); ?>" class="btn btn-primary">
                                                            <i class="fa fa-edit"></i>
                                                        </a>
                                                        <a href="<?php echo site_url('hak_akses/hapus/' . $row->id . '') ?>">
                                                            <button class="btn btn-danger" data-toggle="confirmation" data-original-title="Are you sure ?" title="">
                                                                <i class="fa fa-trash-o"></i>
                                                            </button>
                                                        </a>
													</center>
													<?php } ?>
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