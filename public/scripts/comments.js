	$(document).ready(function() {
        event.preventDefault()
        $('#tableComments').dataTable({
            "aoColumnDefs": [{ 'bSortable': false, 'aTargets': [ 4 ]},{ "bVisible": false, "aTargets": [0] }],
            "displayLength":10,
            "bProcessing": true,
            "bServerSide": true,
            "sAjaxSource": '/admin/comments',
        });
    });