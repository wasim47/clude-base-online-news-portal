<div id="wrapper"> 
<div class="mid_container">
    <div class="mid_right" style="float:left">
   		<div style="margin:10px 0px; padding:0; width:100%; float:left">
                <div style="float:left; text-align:left"><h2>Successfull Registration</h2></div>
                <div style="float:left; text-align:left">
                    <h5 style="padding:0; line-height:25px;">
                    <strong style="font-size:18px">Congratulation! <?php echo $member['memberName'];?>.</strong><br /><br />
                    <strong>Thank you for registration at Doctorsbd.com</strong><br />
                    You have Registerd as doctros in doctorsbd.com. You can online consultancy and online
                    appoinment with us after completation your whole profile.<br />
                    For complete your profile and make ownself as Consultancy and Appoinment Doctor just login at doctorsbd.com.<br /><br />
                    <u><i>Your Login Information:</i></u><br />
                    Username: <strong><?php echo $member['email'];?></strong><br />
                    Password Already sent on your email.<br />
                    For getting Password and more information please check your <strong><?php echo $member['email'];?></strong> mail address
                    </h5>
                        
                    </div>
                    
            </div>
    </div>
<div class="mid_left" style="border:none; min-height:550px">
    
    <?php include('sidebar_advertisement.php');?>
</div>
</div>
</div>