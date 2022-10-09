<!DOCTYPE html>
<html>
<head>
    <title>W2UI Demo: searching Grid</title>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://rawgit.com/vitmalina/w2ui/master/dist/w2ui.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://rawgit.com/vitmalina/w2ui/master/dist/w2ui.min.css" />
    <style type="text/css">
        div#w2ui-popup.w2ui-popup{
            left: 168.5px;
            top: 100.5px !important;
            width: 500px;
            height: 280px;
            transition: none 0s ease 0s;
            transform: translate3d(0px, 0px, 0px);
        }
    </style>

</head>
<body>
    <div class="pull-right"><button class="w2ui-btn" onclick="openPopup()">Add</button></div>

<!-- <div id="grid" style="width: 100%; height: 350px; overflow: hidden;"></div> -->
<div id="grid" style="width: 100%; height: 550px; overflow: hidden;"></div>
<br>
<!-- <div style="float: left">
    <label style="position: relative; top: 3px; left: 10px">
        <input type="checkbox" id="singleOrMulti" style="position: relative; top: 1px; left: -2px;" onclick="multi(this)">
        Multi Field Search
    </label>
</div> -->
<!-- <div style="float: left; margin-left: 30px; margin-top: 1px;">
    Operator:
    <select class="w2ui-input" onchange="oper(this.value)">
        <option value="is">is</option>
        <option value="begins">begins</option>
        <option value="contains" selected>contains</option>
        <option value="ends">ends</option>
    </select>
</div> -->
<div style="clear:both; height: 10px;"></div>

<script type="text/javascript">
query(() => {
    let grid = new w2grid({
        box: query('#grid')[0],
        name: 'grid',
        header: 'List of Names',
        reorderRows: true,
        liveSearch: true,
        multiSearch: false,
        reorderRows: true,
        show: {  toolbar: true, 
                 header: true,
                 footer: true,
                 toolbar: true,
        },
        columns: [
            { field: 'username', text: 'Username', size: '100%', searchable: { operator: 'contains' }, sortable: true },
            { field: 'email', text: 'Email', size: '100%', searchable: { operator: 'contains' }, sortable: true },
            { field: 'status', text: 'Status', size: '100%', sortable: true }
        ]
    })
     grid.load('<?php echo base_url()?>Register/gridTab')
});

function multi(el) {
    w2ui.grid.multiSearch = el.checked
    w2ui.grid.searchReset()
    w2ui.grid.refresh()
}

function oper(op) {
    w2ui.grid.searches.forEach(search => { search.operator = op })
    w2ui.grid.searchReset()
}
</script>


<script type="text/javascript">
function openPopup () {
    if (!w2ui.foo) {
        new w2form({
            name: 'foo',
            style: 'border: 0px; background-color: transparent;',
            fields: [
                { field: 'username', type: 'text', required: true, html: { label: 'Username' } },
                { field: 'mobileno', type: 'text', required: true, html: { label: 'Mobile No' } },
                { field: 'email', type: 'email', required:true,html:{ label: 'Email', attr: 'style="width: 200px"' } }
            ],
            record: {
                first_name    : 'John',
                last_name     : 'Doe',
                email         : 'jdoe@email.com'
            },
            actions: {
                "Reset": function () { this.clear(); },
                "Save": function () {
                 this.validate();
             }
            }
        });
    }
    w2popup.open({
        title   : 'Form in a Popup',
        body    : '<div id="form" style="width: 100%; height: 100%;"></div>',
        style   : 'padding: 15px 0px 0px 0px',
        width   : 500,
        height  : 280,
        showMax : true,
        async onToggle(event) {
            await event.complete
            w2ui.foo.resize();
        }
    })
    .then((event) => {
        w2ui.foo.render(query('#form')[0])
    });
}
</script>
</body>
</html>