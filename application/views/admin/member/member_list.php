<script type="text/JavaScript">
function openPage1(pid,tablename,colid)
{
	var b = window.confirm('Are you sure, you want to Delete This ?');
	if(b==true){
		$.ajax({
			   type: "GET",
			   url: '<?php echo base_url()?>bpmaadminmanage/deleteData/'+tablename+'/'+colid,
			   data: "deleteId="+pid,
			   success: function() {
				  alert("Successfully saved");
				  window.location.reload(true);
				},
				error: function() {
				  alert("There was an error. Try again please!");
				}
		 });
	}
	else{
	 return;
	}
	 
}
</script>

<script type="text/javascript">
checked = false;
function checkedAll() {
if (checked == false){checked = true}else{checked = false}
	for (var i = 0; i < document.getElementById('form_check').elements.length; i++){
	  document.getElementById('form_check').elements[i].checked = checked;
	}
}

function approve(){
	var summeCode=document.getElementsByName("summe_code[]");
	var j=0;
	var data= new Array();
	
	for(var i=0; i < summeCode.length; i++){
		if(summeCode[i].checked)
		{
			data[j]=summeCode[i].value;
			j++;
			
		}
		
	}
	if(data=="")
	{
		alert("Please check one or more!");
		return false;
	}
	else{
			var hrefdata ="<?php echo base_url();?>bpmaadminmanage/approved?approve_val="+data;
			window.location.href=hrefdata;
	}
	
}

function deapprove(){
	var summeCode=document.getElementsByName("summe_code[]");
	var j=0;
	var data= new Array();
	
	for(var i=0; i < summeCode.length; i++){
		if(summeCode[i].checked)
		{
			data[j]=summeCode[i].value;
			j++;
			
		}
		
	}
	if(data=="")
	{
		alert("Please check one or more!");
		return false;
	}
	else{
			var hrefdata ="<?php echo base_url();?>bpmaadminmanage/deapproved?deapprove_val="+data;
			window.location.href=hrefdata;
	}
	
}

</script>
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
                                    <h2 style="float:left; width:20%;">Total Member (<?php echo $member_list->num_rows();?>)</h2>
                                    <h2 style="float:right; width:80%; text-align:right">
                                    <a href="<?php echo base_url('bpmaadminmanage/registration/new');?>" class="btn btn-primary">New Member</a>
                                    <a href="javascript:void();" onclick="approve();" class="btn btn-default btn-sm">
          										<span class="glyphicon glyphicon-remove-circle"></span> Display
                                            </a>
                                    <a href="javascript:void();" onclick="deapprove();" class="btn btn-default btn-sm">
          										<span class="glyphicon glyphicon-remove-circle"></span> Don't Display 
                                            </a>
                                    </h2>  
                                    <div class="clearfix"></div>
                                   
                                </div>
                                <div class="x_content">
                                <div style="width:100%"><?php echo $this->session->flashdata('successMsg');?></div>
                                <?php echo form_open('','id="form_check"');?>
                                <div class="container">
                                  <table class="table table-striped" width="100%">
                                    <thead>
                                      <tr>
                                        <th width="3%">SI</th>
                                        <th width="2%"><input name="checkbox" onclick='checkedAll();' type="checkbox" /></th>
                                        <th>Company Name</th>
                                        <th>Head Org.</th>
                                        <th>Contact Person</th>
                                        <th>position</th>
                                        <th>Logo</th>
                                        <th>Action</th>
                                        <th width="7%">Permission</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                    <?php
									$i=0;
                                    foreach($member_list->result() as $member):
									$pageSl++;
										$member_id=$member->id;
										$company_name=$member->company_name;
										$head_organization=$member->head_organization;
										$contact_person=$member->contact_person;
										$position=$member->position;
										$logo=$member->logo;
										$permission=$member->permission;
									$i++;
									?>
                                      <tr>
                                        <td><?php echo $i;?></td>
                                        <td><input type="checkbox"  name="summe_code[]" id="summe_code<?php echo $i; ?>" value="<?php echo $member_id;?>" /></td>
                                        <td width="21%"><?php echo $company_name; ?></td>
                                         <td width="14%"><?php echo $head_organization; ?></td>
                                         <td width="12%"><?php echo $contact_person; ?></td>
                                         <td width="13%"><?php echo $position; ?></td>
                                       	<td  width="10%"><img src="<?php echo base_url('asset/uploads/member/logo/'.$logo);?>" style="width:80%; height:auto" /></td>
                                         <td width="18%"> 
                                         	<a href="<?php echo base_url('Bpmaadminmanage/registration/edit/'.$member_id);?>" class="btn btn-default btn-sm">
          										<span class="glyphicon glyphicon-edit"></span> Edit
                                            </a> 
                                            <a href="<?php echo base_url('Bpmaadminmanage/member_list/details/'.$member_id);?>" class="btn btn-default btn-sm">
          										<span class="glyphicon glyphicon-edit"></span> Details
                                            </a> 
                                            <a href="javascript:void();" onclick="openPage1('<?php echo $member_id;?>','users','id');" class="btn btn-default btn-sm">
          										<span class="glyphicon glyphicon-remove-circle"></span> Remove
                                            </a>
                                            </td>
                                         <td><?php
                                         if($permission==1){
										 ?>
                                           <span class="icon-ok" style="background:#090; width:10px; height:10px; color:#fff; padding:2px; border-radius:5px"></span>
                                           <?php
										 }
										 elseif($permission==0){
										 ?>
                                           <span class="icon-remove" style="background:#f00; width:10px; height:10px; color:#fff; padding:2px; border-radius:5px"></span>
                                           <?php
										 }
										 ?></td>
                                      </tr>
                                    <?php
                                    endforeach;
									?>  
                                     <tr>
                                     	<td colspan="10">
                                        	<div id="pagination" class="tsc_pagination">
                          <ul><?php echo "<li>". $pagination."</li>"; ?></ul>
                      </div>
                                        </td>
                                     </tr>
                                    </tbody>
                                  </table>
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
               