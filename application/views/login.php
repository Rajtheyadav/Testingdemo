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
            <p class="label-txt">EMAIL ID</p>
            <input type="text" class="input" name="email" id="email" required>
            <div class="line-box">
               <div class="line"></div>
               
            </div>
         </label>

         <label>
            <p class="label-txt">PASSWORD</p>
            <input type="password" class="input" name="pass" id="pass" required>
            <div class="line-box">
               <div class="line"></div>
            </div>
         </label>

         <button type="submit" id="btnSubmit">Login</button>
		 <div id="msg"></div>
      </form>
	  <script>
	  jQuery('#frmSubmit').on('submit',function(e){

      jQuery.ajax({
         url:'<?php echo base_url()?>Register/sign_in',
         type:'post',
         data:jQuery('#frmSubmit').serialize(),
         success:function(result){
            
            window.location.href='<?php echo base_url()?>Register/dashboard';
           // location:loader();
         }
      });



	  });
	  </script>
   </body>
</html>