<template lang="html">
  <div class="calendar-wrap mt-40">
    <div id="calendar"></div>
  </div>
</template>

<script>
export default {
  mounted(){
    $('#calendar').fullCalendar({

            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay'
            },
            editable: false,
            droppable: false, // this allows things to be dropped onto the calendar
            eventLimit: true, // allow "more" link when too many events

            eventMouseover: function (data, event, view) {
			          var tooltip = '<div class="tooltiptopicevent tooltip tooltip-inner" style="width:auto;height:auto;position:absolute;z-index:10001;">10:00 AM ' + data.title + '</div>';
          			$("body").append(tooltip);
                      $(this).mouseover(function (e) {
                          $(this).css('z-index', 10000);
                          $('.tooltiptopicevent').fadeIn('500');
                          $('.tooltiptopicevent').fadeTo('10', 1.9);
                      }).mousemove(function (e) {
                          $('.tooltiptopicevent').css('top', e.pageY + 10);
                          $('.tooltiptopicevent').css('left', e.pageX + 20);
                      });
                  },
                  eventMouseout: function (data, event, view) {
                      $(this).css('z-index', 8);
                      $('.tooltiptopicevent').remove();
                  },
                  dayClick: function () {
                      tooltip.hide()
                  },
                  eventResizeStart: function () {
                      tooltip.hide()
                  },
                  eventDragStart: function () {
                      tooltip.hide()
                  },
                  viewDisplay: function () {
                      tooltip.hide()
                  },

                  events: [
            				        {
                              start: '2017-12-12',
                              end: '2017-12-12',
                              overlap: false,
                              rendering: 'background',
                              color: 'rgba(234, 108, 65, 0.3)'
                            }
                        ]
		});
  }
}
</script>

<style lang="css">
</style>
