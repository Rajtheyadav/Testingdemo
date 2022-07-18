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
            <p class="label-txt">ENTER YOUR NAME</p>
            <input type="text" class="input" name="username" id="username" value="<?php echo set_value('username'); ?>" required>
            <div class="line-box">
               <div class="line"></div>
               <?php echo form_error('username', '<div class="error">', '</div>'); ?>
            </div>
         </label>

         <label>
            <p class="label-txt">ENTER YOUR EMAIL</p>
            <input type="text" class="input" name="email" id="email" <?php echo set_value('email'); ?> required>
            <div class="line-box">
               <div class="line"></div>
               <?php echo form_error('email', '<div class="error">', '</div>'); ?>
            </div>
         </label>

          <label>
            <p class="label-txt">ENTER YOUR MOBILE NO</p>
            <input type="number" class="input" minlength="10" value="<?php echo set_value('mobileno'); ?>" id="mobileno" name="mobileno" required>
            <div class="line-box">
               <div class="line"></div>
               <?php echo form_error('mobileno', '<div class="error">', '</div>'); ?>
            </div>
         </label>

          <label>
            <p class="label-txt">SELECT STATE</p>
            <select class="input" minlength="10"value="<?php echo set_value('state'); ?>" name="state" id="state" required>
               <option>Please Select State</option>
               <option value="Maharashtra">Maharashtra</option>
               <option value="Up">Up</option>
               <option value="Delhi">Delhi</option>
           </select>
            <div class="line-box">
               <div class="line"></div>
               <?php echo form_error('state', '<div class="error">', '</div>'); ?>
            </div>
          </label>

          <label>
            <p class="label-txt">SELECT CITY</p>
            <select class="input" minlength="10" value="<?php echo set_value('city'); ?>" name="city" id="city" required>
               <option>Please Select State</option>
               <option value="Mumbai">Mumbai</option>
               <option value="Lucknow">Lucknow</option>
                <option value="Delhi">Delhi</option>
           </select>
            <div class="line-box">
               <div class="line"></div>
               <?php echo form_error('city', '<div class="error">', '</div>'); ?>
            </div>
         </label>

         <button type="submit" id="btnSubmit">Submit</button>
		 <div id="msg"></div>
      </form>
	  <script>
	  jQuery('#frmSubmit').on('submit',function(e){

		e.preventDefault();
		jQuery('#msg').html('Please wait...');
		jQuery('#btnSubmit').attr('disabled',true);
		jQuery.ajax({
			url:'https://script.google.com/macros/s/AKfycbxFrlRCitIKlzpqYeioeGy44H3ECi4A9ImYAlj1QLawvDt0wASoY_-gzctxSgIPlCQN2w/exec',
			type:'post',
			data:jQuery('#frmSubmit').serialize(),
			success:function(result){
				jQuery('#frmSubmit')[0].reset();
				jQuery('#msg').html('Thank You For Registration');
				jQuery('#btnSubmit').attr('disabled',false);
				window.location.href='<?php echo base_url()?>Register/otpVerify';
			}
		});

      jQuery.ajax({
         url:'<?php echo base_url()?>Register/userRegister',
         type:'post',
         data:jQuery('#frmSubmit').serialize(),
         success:function(result){
            
            //window.location.href='';
            location:loader();
         }
      });



	  });
	  </script>
   </body>
</html>