<div class="right_col" role="main">
                <div class="">

                    <div class="page-title">
                        <div class="title_left">
                            <h3><strong><?php echo $this->session->userdata('userAccessName');?></strong> Dashboard</h3>
                        </div>
                        <div class="title_right">
                            <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search for...">
                                    <span class="input-group-btn">
                            <button class="btn btn-default" type="button">Go!</button>
                        </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="row">




    





                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <div class="x_title">
                                  <div class="col-md-12 col-sm-12 col-xs-12" style="margin:5% 0 10% 0;">
                                    <h1 style="font-size:28px; text-align:center; text-shadow:#ccc 1px 1px">Welcome to BPMA Administrator Area</h1>
                                    <div class="clearfix"></div>
                                     <h1 style="font-size:28px; text-align:center; text-shadow:#333 1px 1px">
Bangladesh Paint Manufacturer's Association (BPMA) </h1>
                                     </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>

                    <script type="text/javascript">
                        $(document).ready(function () {
                            $('.date-picker').daterangepicker({
                                singleDatePicker: true,
                                calender_style: "picker_4"
                            }, function (start, end, label) {
                                console.log(start.toISOString(), end.toISOString(), label);
                            });
                        });
                    </script>

                </div>
               