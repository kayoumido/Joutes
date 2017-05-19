class Schedule {
    constructor() {}

    /**
     * Initialise a schedule
     * @param  {int} max_matches   max number of wanted matches
     * @param  {int} tournament_id id of the tournament from which matches will be retrieved
     * @return {void}
     *
     * @author Doran Kayoumi
     */
    static init(max_matches, tournament_id) {
        var self = new Schedule();

        var result = self.getMatches(tournament_id, max_matches);

        result.done(function(data) {
            self.updateDisplay(data, $('.schedule'));
        });
    }

    /**
     * Refresh schedule
     * @param  {jquery} container  container in which the html will be displayed
     * @param  {int} limit         max number of wanted matches
     * @param  {int} tournament_id id of the tournament from which matches will be retrieved
     * @return {void}
     *
     * @author Doran Kayoumi
     */
    static refresh(container, limit, tournament_id) {
        var self = new Schedule();

        self.replaceOutdated(tournament_id, container);

        // check
        if ((limit - container.children('.schedule-row').length) > 0) self.completeDisplay(tournament_id, limit, container.children('.schedule-row').length, container);
    }

    /**
     * Get matches from server
     * @param  {int} tournament_id        id of the tournament from which to get matches
     * @param  {int} nb_matches           number of matches to get
     * @param  {int} [first_game_id=null] id of the first match in list
     * @param  {int} [last_game_id=null]  id of the last match in list
     * @return {promise}
     *
     * @author Doran Kayoumi
     */
    getMatches(tournament_id, nb_matches, first_game_id = null, last_game_id = null) {

        return $.ajax({
            url         : '/api/tournaments/' + tournament_id + '/schedule',
            method      : 'GET',
            dataType    : 'json',
            cache       : false,
            data        : {
                nb_matches      : nb_matches,
                first_game_id   : first_game_id,
                last_game_id    : last_game_id
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
     * @param  {jquery} container  container in which the html will be displayed
     * @param  {jquery} [row=null] row containing outdated match
     * @return {void}
     *
     * @author Doran Kayoumi
     */
    updateDisplay(matches, container, outdated_row = null) {

        // check if a row was given
        if (outdated_row) {
            outdated_row.remove();
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

    /**
     * Replace any outdated matches with new ones
     * @param  {int} tournament_id      id of the tournament from which to get matches
     * @param  {jquery} container       container in which the html will be displayed
     * @return {void}
     *
     * @author Doran Kayoumi
     */
    replaceOutdated(tournament_id, container) {

        // loop through schedule rows
        container.children('.schedule-row').each(function() {

            var currentrow = $(this);
            let gameid     = $(this).children('.match').data('id');
            let lastgameid = container.children('.row').last().children('.match').data('id');

            var result = this.getMatches(tournament_id, 1, gameid, lastgameid);

            result.done(function(data) {
                if (!$.isEmptyObject(data)) {
                    this.updateDisplay(data, container, currentrow);
                }
            });
        });
    }

    /**
     * Fill page with the max amout of matches
     * @param  {int} tournament_id      id of the tournament from which to get matches
     * @param  {int} max_matches        max number of matches that can be displayed on the page
     * @param  {int} nb_current_matches number currently displayed
     * @param  {jquery} container       container in which the html will be displayed
     * @return {void}
     *
     * @author Doran Kayoumi
     */
    completeDisplay(tournament_id, max_matches, nb_current_matches, container) {

        let lastgameid = container.children('.row').last().children('.match').data('id');

        var result = this.getMatches(tournament_id, (max_matches - nb_current_matches), null, lastgameid);

        result.done(function(data) {
            if (!$.isEmptyObject(data)) {
                this.updateDisplay(data, container);
            }
        });
    }

}
