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
                success : function(data) {

                    if (!$('.alert.alert-success').length) {
                        // Display success message
                        var success = $("<div class='alert alert-success' role='alert'>Le pool à bien été terminé</div>");
                        $("#match-block").prepend(success);
                        // After 2sec, the alert will disappear
                        success.fadeTo(3000, 500).slideUp(500, function(){
                		    success.slideUp(500);
                		});
                    }

                    $('.action i').each(function() {
                        $(this).remove();
                    });

                    $('.close-pool-btn').remove();
                },
                error : function(xhr) {
                    console.error('readyState: ' + xhr.readyState);
                    console.error('status: ' + xhr.status);
                    console.error('responseText: ' + xhr.responseText);
                }
            });
        });
    });
});
