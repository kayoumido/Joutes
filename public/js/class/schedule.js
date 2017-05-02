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

        console.log('gsrezwerzrzrwt');

        container.children('.row').each(function() {

            let gametime = $(this).children('.match').children('.time').text();

            // get current time
            let dt           = new Date();
            let hours        = (dt.getHours() < 10) ? `0${dt.getHours()}` : dt.getHours();
            let minutes      = (dt.getMinutes() < 10) ? `0${dt.getMinutes()}` : dt.getMinutes();
            let current_time = `${hours}:${minutes}`;

            if (gametime < current_time) {
                console.log('yay');
                this.remove();

                Schedule.initSchedule(1);
            }
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
            },
            success : function(data) {
                console.log(data);
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
