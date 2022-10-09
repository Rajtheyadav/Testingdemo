query(() => {

    new w2grid({
        name: 'grid',
        box: query('#grid')[0],
        url: '<?php echo base_url()?>Register/gridTab',
        method: 'GET', // need this to avoid 412 error on Safari
        contentType: "application/json; charset=utf-8",
        dataType: "json",
        columns: [
            { field: 'username', text: 'Username', size: '30%' },
            { field: 'email', text: 'Email', size: '30%' },
            { field: 'status', text: 'status', size: '40%' }
        ]
       })
    })
