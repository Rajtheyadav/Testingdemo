<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>gridTable</title>
   
    <link rel="stylesheet" type="text/css" href="https://rawgit.com/vitmalina/w2ui/master/dist/w2ui.min.css" /> 



<!--       <script src="http://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://rawgit.com/vitmalina/w2ui/master/dist/w2ui.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://rawgit.com/vitmalina/w2ui/master/dist/w2ui.min.css" /> -->
</head>
<body>
<div id="grid" style="width: 100%; height: 350px;"></div>

</body>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script type="text/javascript" src="https://rawgit.com/vitmalina/w2ui/master/dist/w2ui.min.js"></script>

  <script type="text/javascript">
     query(() => {
     new w2grid({
        name: 'grid',
        box: query('#grid')[0],
        header: 'List of Names',
        reorderRows: true,
        show: {
            header: true,
            footer: true,
            toolbar: true,
            lineNumbers : true,
            selectColumn: true
        },
        url: '<?php echo base_url()?>Register/gridTab',
        method: 'GET', // need this to avoid 412 error on Safari
        columns: [
            { field: 'username', text: 'Username', size: '30%' },
            { field: 'email', text: 'Email', size: '30%' },
            { field: 'status', text: 'status', size: '40%' }
        ],
        searches: [
            { type: 'int',  field: 'recid', label: 'ID' },
            { type: 'text', field: 'username', label: 'Username' },
            { type: 'text', field: 'email', label: 'Email' }
        ],
         onExpand(event) {
            query('#'+event.detail.box_id).html('<div style="padding: 10px; height: 100px">Expanded content</div>')
        }
       })
    })

 </script>

</html>