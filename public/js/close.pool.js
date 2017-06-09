$(document).ready(function() {
    $('.close-pool-btn').click(function() {

        var tournament_id = $("table#matches").data("tournament");
        var pool_id       = $("table#matches").data("pool");

        $("#pool-rankings-table tbody tr").each(function() {

            $.ajax({
                url         : '/admin/tournaments/' + tournament_id + '/pools/' + pool_id,
                method      : 'PUT',
                dataType    : 'json',
                cache       : false,
                headers     : {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data        : {
                    team_id         : $(this).data("id"),
                    rank_in_pool    : $(this).data("rank")
                },
                error : function(xhr) {
                    console.error(`readyState:      ${xhr.readyState}`);
                    console.error(`status:          ${xhr.status}`);
                    console.error(`responseText:    ${xhr.responseText}`);
                }
            });
        });
    });
});
