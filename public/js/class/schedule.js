class Schedule {
    constructor() {}

    static initSchedule(limit) {
        var self = new Schedule();

        var result = self.matches(limit);

        result.done(function(data) {
            self.htmldisplay(data, $('.schedule'));
        });
    }

    static updateSchedule(container) {
        container.children('.row').each(function() {
            console.log(this);
        });
        // alert('Update');
    }

    matches (limit) {
        return $.ajax({
            url         : '/api/schedule',
            method      : 'GET',
            dataType    : 'json',
            cache       : false,
            data        : {
                limit: limit
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
                            <div class="team-name col-md-5">${match.teams[0]}</div>
                            <div class="team-name col-md-2">vs</div>
                            <div class="team-name col-md-5">${match.teams[1]}</div>
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
