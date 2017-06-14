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
                                <a href="#">Alutsista</a>
                                <i class="fa fa-angle-right"></i>
                            </li>
							<li>
                                <a href="#">TNI AD</a>
                                <i class="fa fa-angle-right"></i>
                            </li>
                            <li>
                                <a href="<?php echo site_url('c_alutsista/senjata_ad'); ?>">Senjata</a>
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
                            <div class="clearfix">
                                <button type="button" class="btn red"><i class="fa fa-database"></i> Data Alutsista</button>
                            </div>
                        </div>
                    </div>
                    <br />
                    <div class="row">
<!-- Begin Form Rekap Senjata -->
                        <div class="col-md-12 cuk" id="senjata">
                            <div class="portlet box green ">
                            <div class="portlet-title">
                                <div class="caption">
                                    Form Senjata
                                </div>
                                <div class="tools">
                                    <a title="" data-original-title="" href="" class="collapse">
                                    </a>
                                </div>
                            </div>
                            <div class="portlet-body form">
                                <form class="form-horizontal" role="form">
                                    <div class="form-body">
                                        <input class="form-control" type="hidden">
                                        <input class="form-control" type="hidden">
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Kelompok Barang</label>
                                            <div class="col-md-9">
                                                <select class="form-control" name="klmpk_barang_id">
                                                    <option value="">Pilih Kelompok</option>
                                                    <option>Option 1</option>
                                                    <option>Option 2</option>
                                                    <option>Option 3</option>
                                                    <option>Option 4</option>
                                                    <option>Option 5</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Komoditi Barang</label>
                                            <div class="col-md-9">
                                                <select class="form-control" name="komoditi_brng_id">
                                                    <option value="">Pilih Kelompok Dahulu</option>
                                                    <option>Option 1</option>
                                                    <option>Option 2</option>
                                                    <option>Option 3</option>
                                                    <option>Option 4</option>
                                                    <option>Option 5</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Jenis Barang</label>
                                            <div class="col-md-9">
                                                <select class="form-control">
                                                    <option>Option 1</option>
                                                    <option>Option 2</option>
                                                    <option>Option 3</option>
                                                    <option>Option 4</option>
                                                    <option>Option 5</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Fungsi Barang</label>
                                            <div class="col-md-9">
                                                <select class="form-control">
                                                    <option>Option 1</option>
                                                    <option>Option 2</option>
                                                    <option>Option 3</option>
                                                    <option>Option 4</option>
                                                    <option>Option 5</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Barang</label>
                                            <div class="col-md-9">
                                                <select class="form-control">
                                                    <option>Option 1</option>
                                                    <option>Option 2</option>
                                                    <option>Option 3</option>
                                                    <option>Option 4</option>
                                                    <option>Option 5</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="portlet box grey-cascade">
                                            <div class="portlet-title">
                                                <div class="caption">
                                                    Pemakaian
                                                </div>
                                            </div>
                                            <div class="portlet-body form">
                                                <div class="form-body">
                                                    <div class="form-group">
                                                        <div class="col-md-6">
                                                            <label class="col-md-5 control-label">Baik</label>
                                                            <div class="col-md-5">
                                                                <input class="form-control" type="text">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label class="col-md-5 control-label">Siap</label>
                                                            <div class="col-md-5">
                                                                <input class="form-control" type="text">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-md-6">
                                                            <label class="col-md-5 control-label">Rusak Ringan</label>
                                                            <div class="col-md-5">
                                                                <input class="form-control" type="text">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label class="col-md-5 control-label">Tidak Siap</label>
                                                            <div class="col-md-5">
                                                                <input class="form-control" type="text">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-md-6">
                                                            <label class="col-md-5 control-label">Rusak Berat</label>
                                                            <div class="col-md-5">
                                                                <input class="form-control" type="text">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="portlet box grey-cascade">
                                            <div class="portlet-title">
                                                <div class="caption">
                                                    Persediaan
                                                </div>
                                            </div>
                                            <div class="portlet-body form">
                                                <div class="form-body">
                                                    <div class="form-group">
                                                        <div class="col-md-6">
                                                            <label class="col-md-5 control-label">Baik</label>
                                                            <div class="col-md-5">
                                                                <input class="form-control" type="text">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label class="col-md-5 control-label">Siap</label>
                                                            <div class="col-md-5">
                                                                <input class="form-control" type="text">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-md-6">
                                                            <label class="col-md-5 control-label">Rusak Ringan</label>
                                                            <div class="col-md-5">
                                                                <input class="form-control" type="text">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label class="col-md-5 control-label">Tidak Siap</label>
                                                            <div class="col-md-5">
                                                                <input class="form-control" type="text">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-md-6">
                                                            <label class="col-md-5 control-label">Rusak Berat</label>
                                                            <div class="col-md-5">
                                                                <input class="form-control" type="text">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Negara Asal</label>
                                            <div class="col-md-9">
                                                <input class="form-control" type="text">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Tahun Buat</label>
                                            <div class="col-md-9">
                                                <input class="form-control" type="text">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Keterangan</label>
                                            <div class="col-md-9">
                                                <textarea class="form-control" rows="3"></textarea>
                                            </div>
                                        </div>      
                                    </div>
                                    <div class="form-actions">
                                        <div class="row">
                                            <div class="col-md-offset-3 col-md-9">
                                                <button type="submit" class="btn green">Submit</button>
                                                <button type="button" class="btn default">Cancel</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
<!-- End Form Rekap Senjata -->
                </div>
            </div>
            <!-- END CONTENT -->
        </div>
        <!-- END CONTAINER -->
        <?php $this->load->view('v_footer') ?>
    </body>
    <!-- END BODY -->
</html>