(function($) {
   
    "use strict";
    var num = 0;
    $('.tab-pane').each(function(){
        
        //calendar.setOptions({format12: val});
        var fday = $('#firstday' + num).val();
        fday =  (fday != 0) ? parseInt(fday) : null;
        var f12 = ($('.format12').val() == 1)? true : false;
        var timeStart = ($('.timeStart').val() === '00:00')? '08:00' : $('.timeStart').val(); 
        var timeEnd = ($('.timeEnd').val() === '00:00')? '20:00': $('.timeEnd').val();
        var timeInterval = ($('.timeInterval').val() === '0')? '30': $('.timeInterval').val();
        //alert(timeInterval);
        var options = {
            events_source: '../json/events.json',
            view: 'month',
            tmpl_path: '../tmpls/',
            tmpl_cache: false,
            language: $('.language').val(),
            first_day: fday,
            format12: f12,
            modal: true,
            time_start: timeStart,
            time_end: timeEnd,
            time_split: timeInterval,
            onAfterEventsLoad: function(events) {
                if(!events) {
                    return;
                }
                var list = $('#eventlist');
                list.html('');

                $.each(events, function(key, val) {
                    $(document.createElement('li'))
                        .html('<a href="' + val.url + '">' + val.title + '</a>')
                        .appendTo(list);
                });
            },
            onAfterViewLoad: function(view) {
                $('.page-header h3').text(this.getTitle()); 
                $('.btn-group button').removeClass('active');
                $('button[data-calendar-view="' + view + '"]').addClass('active');
            },
            classes: {
                months: {
                    general: 'label'
                }
            },
        };
        
        var name = $('#calendar-name' + num).val();
        var calendar = $('#' + name).calendar(options);
        //var calendar = $('.calendar').calendar(options);

        $('.btn-group button[data-calendar-nav]').each(function() {
            var $this = $(this);
            $this.click(function() {
                calendar.navigate($this.data('calendar-nav'));
            });
        });

        $('.btn-group button[data-calendar-view]').each(function() {
            var $this = $(this);
            $this.click(function() {
                calendar.view($this.data('calendar-view'));
            });
        });

        //$('#first_day').change(function(){
        //    var value = $(this).val();
        //    value = value.length ? parseInt(value) : null;
        //    calendar.setOptions({first_day: value});
        //    calendar.view();
        //});

       // $('#language').change(function(){
       //     calendar.setLanguage($(this).val());
       //     calendar.view();
       // });

        //$('#events-in-modal').change(function(){
        //    var val = $(this).is(':checked') ? $(this).val() : null;
        //    calendar.setOptions({modal: val});
        //});
        //$('#format-12-hours').change(function(){
        //    var val = $(this).is(':checked') ? true : false;
        //    calendar.setOptions({format12: val});
        //    calendar.view();
        //});
        //$('#show_wbn').change(function(){
        //    var val = $(this).is(':checked') ? true : false;
        //    calendar.setOptions({display_week_numbers: val});
        //    calendar.view();
        //});
        //$('#show_wb').change(function(){
        //    var val = $(this).is(':checked') ? true : false;
        //    calendar.setOptions({weekbox: val});
        //    calendar.view();
        //});
        $('#events-modal .modal-header, #events-modal .modal-footer').click(function(e){
            //e.preventDefault();
            //e.stopPropagation();
        });
            num++;
    });

}(jQuery));

$(document).on('click', '.dropdown-menu li a', function() {
    $('#datebox').val($(this).html());
}); 

$(function () {
    var opt = {}
    opt.time = {preset : 'time'};
    opt.interval = {preset : 'custom'};

    $('.calendar-time').scroller(
        $.extend(opt['time'], {
            theme: 'android-ics light', 
            mode: 'mixed', 
            display: 'modal', 
            lang: 'es' 
        })
    );
    $('.calendar-time').click(function() { $(this).scroller('show'); });

    wheels = [];
    wheels[0] = { 'Minutos': {} };
    for (var i = 0; i < 60; i++){
        wheels[0]['Minutos'][i] = (i < 10) ? ('0' + i) : i;
    }
    $('.calendar-interval').scroller(
        $.extend(opt['interval'],{
            theme: 'android-ics light', 
            mode: 'mixed', 
            display: 'modal', 
            lang: 'es',
            width: 90,
            wheels: wheels,
            showOnFocus: false,
        })
    );
});
