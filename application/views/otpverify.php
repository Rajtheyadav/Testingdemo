<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="robots" content="noindex, nofollow">
      <title>User Register</title>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet">

      <link href="<?php echo base_url()?>css/style.css" rel="stylesheet" id="bootstrap-css">
      <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
   </head>
   <body>
      <form method="post" id="frmSubmit" enctype="multipart/form-data">

         <label>
            <p class="label-txt">OTP Veryfication</p>
            <input type="text" class="input" name="otp" id="otp" value="<?php echo set_value('otp'); ?>">
            <div class="line-box">
               <div class="line"></div>
               <?php echo form_error('otp', '<div class="error">', '</div>'); ?>
            </div>
         </label>

         <button type="submit" id="btnSubmit1">Submit</button>
		 <div id="msg"></div>
      </form>
	  <script>
	  jQuery('#frmSubmit').on('submit',function(e){
      
      //var otp =$("#otp").val();
		e.preventDefault();
		jQuery('#msg').html('Please wait...');
		jQuery('#btnSubmit1').attr('disabled',true);

      jQuery.ajax({
         url:'<?php echo base_url()?>Register/userRegister',
         type:'post',
         data:jQuery('#frmSubmit').serialize(),
         success:function(result){
            if(result==1){
              window.location.href='<?php echo base_url()?>Register/login_id';
            }
            else{
                window.location.href='<?php echo base_url()?>Register/otpVerify';
            }
         }
      });
	  });
	  </script>
   </body>
</html>