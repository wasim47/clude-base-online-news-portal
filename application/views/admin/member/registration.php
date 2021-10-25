<?php
if($memberUpdate->num_rows()>0){
	foreach($memberUpdate->result() as $member);
	$id=$member->id;
	$memId=$member->reg_no;
	$companyName=$member->company_name;
	$head=$member->head_organization;
	$contact_person=$member->contact_person;
	$position=$member->position;
	$contact=$member->contact;
	$email=$member->email;
	$web=$member->web;
	$fax=$member->fax;
	$address=$member->address;
	$year=$member->year_of_inception;
	$otherInfo=$member->others_information;
	$logo=$member->logo;
	$file1=$member->firstfile;
	$file2=$member->secondfile;
	$file3=$member->thirdfile;
	$file4=$member->fourthfile;
}
else{
	$id='';
	$memId=set_value('reg_no');
	$companyName=set_value('companyname');
	$head=set_value('head_organization');
	$contact_person=set_value('contact_person');
	$position=set_value('position');
	$contact=set_value('contact');
	$email='';
	$web='';
	$fax='';
	$address='';
	$year='';
	$otherInfo='';
	$logo='';
	$file1='';
	$file2='';
	$file3='';
	$file4='';
	}
?>
<div class="right_col" role="main">
                <div class="">

                    <div class="page-title">
                        <div class="title_left">
                            <h3>Patient Registration Details</h3>
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
                                    <h2>Patient Registraion Form</h2>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                <?php echo $this->session->flashdata('successMsg');?>
                                <?php echo form_open_multipart('', 'class="form-horizontal form-label-left"');?>
                                   <div id="registration_form">	
                                  	  <div class="panel-group" id="accordion">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                 <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"><h4 class="panel-title">
                                                   Registration Information </h4></a>
                                            </div>
                                            
                                            <div id="collapseOne" class="panel-collapse collapse in">
                                                <div class="panel-body">
                                        			    <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Company name<span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="text" name="companyname" required class="form-control col-md-7 col-xs-12" 
                                                placeholder='Company name' value="<?php echo $companyName; ?>"  onFocus="this.placeholder=''" onBlur="this.placeholder='Company name'">
                                             <?php echo form_error('companyname', '<p style="color:#ff0000;margin:0;">', '</p>'); ?>
                                            </div>
                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Membership ID No<span class="required">*</span>
                                                            </label>
                                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                                <input type="text" name="reg_no" required class="form-control col-md-7 col-xs-12"
                                                                placeholder='Membership ID' onFocus="this.placeholder=''" value="<?php echo $memId; ?>" onBlur="this.placeholder='Membership ID'">
                                                                 <?php echo form_error('reg_no', '<p style="color:#ff0000;margin:0;">', '</p>'); ?>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Head Organization<span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="text" name="head_organization" required class="form-control col-md-7 col-xs-12"  value="<?php echo $head;?>"
                                                placeholder='Head Organization' onFocus="this.placeholder=''" onBlur="this.placeholder='Head Organization'">
												<?php echo form_error('head_organization', '<p style="color:#ff0000;margin:0;">', '</p>'); ?>
                                            </div>
                                        </div>
                                                        <div class="form-group">
                                            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Contact Person</label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input  class="form-control col-md-7 col-xs-12" type="text" value="<?php echo $contact_person; ?>" name="contact_person"
                                                placeholder='Contact Person' onFocus="this.placeholder=''" onBlur="this.placeholder='Contact Person'">
                                                <?php echo form_error('contact_person', '<p style="color:#ff0000;margin:0;">', '</p>'); ?>
                                            </div>
                                        </div>
                                     				    <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Position<span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="text" name="position" required class="form-control col-md-7 col-xs-12" 
                                                placeholder='position' value="<?php echo $position; ?>"  onFocus="this.placeholder=''" onBlur="this.placeholder='position'">
                                             <?php echo form_error('position', '<p style="color:#ff0000;margin:0;">', '</p>'); ?>
                                            </div>
                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Contact No<span class="required">*</span>
                                                            </label>
                                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                                <input type="text" name="contact" required class="form-control col-md-7 col-xs-12"
                                                                placeholder='Contact No' onFocus="this.placeholder=''" value="<?php echo $contact; ?>" onBlur="this.placeholder='Contact No'">
                                                                 <?php echo form_error('contact', '<p style="color:#ff0000;margin:0;">', '</p>'); ?>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Email<span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="text" name="email" required class="form-control col-md-7 col-xs-12" value="<?php echo $email; ?>" 
                                                placeholder='Email' onFocus="this.placeholder=''" onBlur="this.placeholder='Email'">
												<?php echo form_error('email', '<p style="color:#ff0000;margin:0;">', '</p>'); ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Password<span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="password" name="password" required class="form-control col-md-7 col-xs-12" 
                                                placeholder='Password' onFocus="this.placeholder=''" onBlur="this.placeholder='Password'">
												<?php echo form_error('password', '<p style="color:#ff0000;margin:0;">', '</p>'); ?>
                                            </div>
                                        </div>
                                                        <div class="form-group">
                                            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Web Address</label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input class="form-control col-md-7 col-xs-12" type="text" name="web" value="<?php echo $web; ?>"
                                                placeholder='Web Address' onFocus="this.placeholder=''" onBlur="this.placeholder='Web Address'">
                                            </div>
                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Fax<span class="required">*</span>
                                                            </label>
                                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                 <input type="text" name="fax" class="form-control col-md-7 col-xs-12"  placeholder='Fax' onFocus="this.placeholder=''" onBlur="this.placeholder='Fax'" value="<?php echo $fax; ?>">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Address<span class="required">*</span>
                                                            </label>
                                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                                <textarea type="text" name="address" required class="form-control col-md-7 col-xs-12" 
                                                                placeholder='Company Aaddress'  
                                                                onFocus="this.placeholder=''" onBlur="this.placeholder='Company Aaddress'"><?php echo $address; ?></textarea>
                                                             <?php echo form_error('address', '<p style="color:#ff0000;margin:0;">', '</p>'); ?>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Year of inception<span class="required">*</span>
                                                            </label>
                                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                                <input type="text" name="year_of_inception" value="<?php echo $year; ?>" class="date-picker  form-control col-md-7 col-xs-12" 
                                                                placeholder='Year of inception'  onFocus="this.placeholder=''" onBlur="this.placeholder='Year of inception'">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Others information<span class="required">*</span>
                                                            </label>
                                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                                <textarea type="text" name="others_information" class="form-control col-md-7 col-xs-12" 
                                                                placeholder='Others information'  onFocus="this.placeholder=''" onBlur="this.placeholder='Others information'"><?php echo $otherInfo; ?></textarea>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Company Logo<span class="required">*</span>
                                                            </label>
                                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                                <input type="file" name="clogo" id="file" />
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Upload File 1<span class="required">*</span>
                                                            </label>
                                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                                <input type="file" name="firstfile" id="file" />
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Upload File 2<span class="required">*</span>
                                                            </label>
                                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                                <input type="file" name="secondfile" id="file" />
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Upload File 3<span class="required">*</span>
                                                            </label>
                                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                                <input type="file" name="thirdfile" id="file" />
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Upload File 4<span class="required">*</span>
                                                            </label>
                                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                                <input type="file" name="fourthfile" id="file" />
                                                            </div>
                                                        </div>
                                                </div>
                                            </div>
                                        </div>
                                      
                                    </div>
                                   </div> 
                                  
                                    <div class="ln_solid"></div>
                                    <div class="form-group">
                                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                            <button type="submit" class="btn btn-primary">Cancel</button>
                                            <input type="hidden" name="memebr_id" value="<?php echo $id;?>">
                                            <input type="hidden" name="stillLogo" value="<?php echo $logo;?>">
                                            <input type="hidden" name="stillfile1" value="<?php echo $file1;?>">
                                            <input type="hidden" name="stillfile2" value="<?php echo $file2;?>">
                                            <input type="hidden" name="stillfile3" value="<?php echo $file3;?>">
                                            <input type="hidden" name="stillfile4" value="<?php echo $file4;?>">
                                            
                                            <input type="submit" name="registration" class="btn btn-success" value="Submit">
                                        </div>
                                    </div>
                               <?php echo form_close();?>
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
               