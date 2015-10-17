    $(window).on('hashchange', function() {
        if (window.location.hash) {
            var page = window.location.hash.replace('#', '');
            if (page == Number.NaN || page <= 0) {
                return false;
            } else {
                getPosts(page);
            }
        }
    });

    $(document).ready(function() {
        event.preventDefault()
        $('#tableDeeds').dataTable({
            "aoColumnDefs": [{ 'bSortable': false, 'aTargets': [ 6 ]},{ "bVisible": false, "aTargets": [0] }],
            "displayLength":10,
            "bProcessing": true,
            "bServerSide": true,
            "sAjaxSource": '/admin/deeds',
        });

        $('#tableDeedsUser').dataTable({
            "aoColumnDefs": [{ 'bSortable': false, 'aTargets': [ 6 ]},{ "bVisible": false, "aTargets": [0] }],
            "displayLength":10,
            "bProcessing": true,
            "bServerSide": true,
            "sAjaxSource": '/users/deeds',
        });

        $('.show_users').bind('click', function(e) {
            e.preventDefault();
            $.ajax({
                type: 'GET',
                url: '/admin/deeds',
                success: function (data) {
                    $('.preload_users').html('');
                    $('.load_ajax').html(allDeeds)
                    var allDeeds = '';  
                    allDeeds += '<tr>';
                    allDeeds += '<th>Notario</th>';
                    allDeeds += '<th>N. de E. Pública</th>';
                    allDeeds += '<th>Protocolo</th>';
                    allDeeds += '<th>Folio</th>';
                    allDeeds += '<th>Otorgado por</th>';
                    allDeeds += '<th>A favor</th>';
                    allDeeds += '<th>Operaciones</th>';
                    allDeeds += '</tr>';  
                    for(datos in data.deeds){
                        allDeeds += '<tr>';
                        allDeeds += '<td>' + data.deeds[datos].name + '</td>';
                        allDeeds += '<td>' + data.deeds[datos].number_deeds + '</td>';
                        allDeeds += '<td>' + data.deeds[datos].protocol + '</td>';
                        allDeeds += '<td>' + data.deeds[datos].folio + '</td>';
                        allDeeds += '<td>' + data.deeds[datos].given_by + '</td>';
                        allDeeds += '<td>' + data.deeds[datos].pro + '</td>';
                        allDeeds += '<td>';
                        allDeeds += '<a href="#"><span class="label label-info"><i class="glyphicon glyphicon-edit"></i> Editar</span></a>   ';
                        allDeeds += '<a href="#"><span class="label label-danger"><i class="glyphicon glyphicon-remove-circle"></i> Eliminar</span></a>';
                        allDeeds += '</td>'
                        allDeeds += '</tr>';
                    }
                    $('.load_ajax').html(allDeeds)
                }
            })
        });

        $(document).ready(function() {
            $(document).on('click', '.pagination a', function (e) {
                getPosts($(this).attr('href').split('page=')[1]);
                e.preventDefault();
            });
        });

        function getPosts(page) {
            $.ajax({
                url : '?page=' + page,
                dataType: 'json',
            }).done(function (data) {
                $('.posts').html(data);
                location.hash = page;
            }).fail(function () {
                alert('Posts could not be loaded.');
            });
        }
    });