class Schedule {
    constructor() {}

    /**
     * Initialise a schedule
     * @param  {int} limit         max number of wanted matches
     * @param  {int} tournament_id id of the tournament from which matches will be retrieved
     * @return {void}
     *
     * @author Doran Kayoumi
     */
    static init(limit, tournament_id) {
        var self = new Schedule();

        var result = self.matches(limit, tournament_id);

        result.done(function(data) {
            self.htmldisplay(data, $('.schedule'));
        });
    }

    /**
     * Refresh schedule
     * @param  {dom} container     dom element that contains schedule
     * @param  {int} limit         max number of wanted matches
     * @param  {int} tournament_id id of the tournament from which matches will be retrieved
     * @return {void}
     *
     * @author Doran Kayoumi
     */
    static refresh(container, limit, tournament_id) {
        var self = new Schedule();

        container.children('.schedule-row').each(function() {

            var currentrow = $(this);
            let gameid     = $(this).children('.match').data('id');
            let lastgameid = container.children('.row').last().children('.match').data('id');

            var result = self.matches(limit, tournament_id, gameid, lastgameid);

            result.done(function(data) {

                if (!$.isEmptyObject(data)) {
                    self.htmldisplay(data, container, currentrow);
                }
            });
        });
    }

    /**
     * Get matches from server
     * @param  {int} limit number of matches wanted
     * @param  {int} next  id of the next match that will be played
     * @param  {int} last  id of the last match in schedule
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
            error : function(xhr) {
                console.error(`readyState:      ${xhr.readyState}`);
                console.error(`status:          ${xhr.status}`);
                console.error(`responseText:    ${xhr.responseText}`);
            }
        });
    }

    /**
     * Generates and displays html for schedule
     * @param  {array}  matches    array of games returned from api
     * @param  {class}  container  container in which the html will be displayed
     * @param  {jquery} row        {optional} row containing outdated match
     * @return {void}
     *
     * @author Doran Kayoumi
     */
    htmldisplay(matches, container, currentrow = null) {

        // check if a row was given
        if (currentrow) {
            currentrow.remove();
        }

        // loop through schedule
        for (let match of matches) {

            // generate html and add it immediately to container
            container.append(`
                <div class="row schedule-row">
                    <div class="match col-md-12" data-id="${match.id}">
                        <div class="info time col-md-2">${match.time}</div>
                        <div class="info venue col-md-2 text-center">${match.court}</div>
                        <div class="info contenders col-md-6">
                            <div class="team-name col-md-5 text-right">${match.teams[0]}</div>
                            <div class="team-name col-md-2 text-center">vs</div>
                            <div class="team-name col-md-5 text-left">${match.teams[1]}</div>
                        </div>
                    </div>
                </div>
            `);
        }
    }
}
