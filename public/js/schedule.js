$(document).ready(function() {
    $.ajax({
        url         : '/api/schedule',
        method      : 'GET',
        dataType    : 'json',
        cache       : false,
        data        : {
            limit: Math.round($(document).height() / 173),
            after: "11:00"
        },
        error : function(xhr, options, error) {
            console.log(xhr);
            console.log(options);
            console.log(error);
        },
        success : function(data) {
            displaySchedule(data);
        }
    });
});

/**
 * Generates and displays html for schedule
 * @param  {array} schedule array of games returned from api
 * @return {void}
 * @TODO Change how icon is displayed. For the moment the same icon is displayed for all sports!
 *
 * @author Doran Kayoumi
 */
function displaySchedule(schedule) {

    var container = $('.schedule');

    // loop through schedule
    for (let game of schedule) {

        // generate html and added immediately to container
        container.append(`
            <div class="row">
                <div class="match col-md-12" data-id="${game.id}">
                    <div class="info time col-md-3">${game.time}</div>
                    <div class="info venue col-md-1">A</div>
                    <div class="contenders col-md-6">
                        <div class="team-name">${game.teams[0]}</div>
                        <div class="team-name">${game.teams[1]}</div>
                    </div>
                    <div class="info sport col-md-2 text-right">
                        <i class="fa fa-apple" aria-hidden="true"></i>
                    </div>
                </div>
            </div>
        `);
    }
}
