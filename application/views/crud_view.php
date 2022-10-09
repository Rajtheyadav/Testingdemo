<html>  
 <head>  
   <title><?php echo $title; ?></title>  
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
      <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>  
      <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>            
      <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />  
   <style>  
           body  
           {  
                margin:0;  
                padding:0;  
                background-color:#f1f1f1;  
           }  
           .box  
           {  
                width:900px;  
                padding:20px;  
                background-color:#fff;  
                border:1px solid #ccc;  
                border-radius:5px;  
                margin-top:10px;  
           }  
      </style>  
 </head>  
 <body>  
   
      <div class="container box">  
           <h3 align="center"><?php echo $title; ?></h3><br /> 
             <div class="row">
          <div class="col-ms-6">
               <select class="form-control" name="username" id="username">
                    <?php foreach($getdata as $row){?>
                    <option value="<?php echo $row->status?>"><?php echo $row->status?></option>
                    <?php }?>
               </select>
          </div>
     </div> 
           <div class="table-responsive">  
                <br />  
                <table id="user_data" class="table table-bordered table-striped">  
                     <thead>  
                          <tr> <th><input type="checkbox" name=""></th>
                               <th width="35%">Username</th>  
                               <th width="35%">Email</th>  
                               <th width="10%">Edit</th>  
                               <th width="10%">Delete</th>  
                          </tr>  
                     </thead>  
                </table>  
           </div>  
      </div>  
 </body>  
 </html>  
 <script type="text/javascript" language="javascript">
 $(document).ready(function() {  
 $(document).on('change','#username',function(){
      var status=$("#username").val();  
      var dataTable = $('#user_data').DataTable({  
           "processing":true,  
           "serverSide":true, 
           "bDestroy": true, 
           "order":[],  
           "ajax":{  
                url:"<?php echo base_url() . 'crud/fetch_user'; ?>",  
               type:"POST", 
               data:{'status':status} 
           },  
           "columnDefs":[  
                {  
                     "targets":[0, 3, 3],  
                     "orderable":false,  
                },  
           ],  
      }).fnDestroy();;  
 });  
});

/* $(document).on('change','#username',function(){
     var status=$("#username").val();

     $.ajax({
          url:"<?php echo base_url() . 'crud/fetch_user'; ?>",
          type:"POST",
          dataType:"json",
          data:{'status':status},
          success:function(data){
               $("#user_data").val(data);
             
          }
     });
 });*/
/* if ($.fn.dataTable.isDataTable( '#user_data' ) ) {
    table = $('#user_data').DataTable();
}
else {
    table = $('#user_data').DataTable( {
        paging: false
    } );
}*/
 </script> 