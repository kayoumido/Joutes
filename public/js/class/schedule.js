class Schedule {
    constructor() {}

    static init(limit, tournament_id) {
        var self = new Schedule();

        var result = self.matches(limit, tournament_id);

        result.done(function(data) {
            self.htmldisplay(data, $('.schedule'));
        });
    }

    static refresh(container, limit, tournament_id) {
        var self = new Schedule();

        container.children('.row').each(function() {

            let gametime = $(this).children('.match').children('.time').text();
            let lastgametime = container.children('.row').last().children('.match').children('.time').text();

            if (!gametime) return true;


            var result = self.matches(limit, tournament_id, gametime, lastgametime);

            result.done(function(data) {

                if (!$.isEmptyObject(data)) {
                    self.htmldisplay(data, container)
                }
            });
        });
    }

    /**
     * Get matches from server
     * @param  {int}  limit number of matches wanted
     * @param  {time} next  time at which the next match will take place
     * @param  {time} last  time ar which the last match, client has, will take place
     * @return {promise}
     *
     * @author Doran Kayoumi
     */
    matches (limit, tournament_id, next = null, last = null) {
        return $.ajax({
            url         : '/api/tournaments/' + tournament_id + '/schedule',
            method      : 'GET',
            dataType    : 'json',
            cache       : false,
            data        : {
                limit : limit,
                next  : next,
                last  : last
            },
            error : function(xhr, options, error) {
                console.log(xhr);
                console.log(options);
                console.log(error);
            }
        });
    }

    /**
     * Generates and displays html for schedule
     * @param  {array} matches array of games returned from api
     * @param  {class} container container in which the html will be displayed
     * @return {void}
     * @TODO Change how icon is displayed. For the moment the same icon is displayed for all sports!
     *
     * @author Doran Kayoumi
     */
    htmldisplay(matches, container) {

        // loop through schedule
        for (let match of matches) {

            // generate html and added immediately to container
            container.append(`
                <div class="row">
                    <div class="match col-md-12" data-id="${match.id}">
                        <div class="info time col-md-2">${match.time}</div>
                        <div class="info venue col-md-1">A</div>
                        <div class="info contenders col-md-8">
                            <div class="team-name col-md-5 text-right">${match.teams[0]}</div>
                            <div class="team-name col-md-2 text-center">vs</div>
                            <div class="team-name col-md-5 text-left">${match.teams[1]}</div>
                        </div>
                        <div class="info sport col-md-1 text-right">
                            <i class="fa fa-apple" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
            `);
        }
    }
}
