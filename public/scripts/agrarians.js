	$(document).ready(function() {
        event.preventDefault()
        $('#tableAgrarians').dataTable({
            "aoColumnDefs": [{ 'bSortable': false, 'aTargets': [ 6 ]},{ "bVisible": false, "aTargets": [0] }],
            "displayLength":10,
            "bProcessing": true,
            "bServerSide": true,
            "sAjaxSource": '/admin/agrarians',
        });

        $('#tableAgrariansUser').dataTable({
            "aoColumnDefs": [{ 'bSortable': false, 'aTargets': [ 6 ]},{ "bVisible": false, "aTargets": [0] }],
            "displayLength":10,
            "bProcessing": true,
            "bServerSide": true,
            "sAjaxSource": '/users/agrarians',
        });
    });