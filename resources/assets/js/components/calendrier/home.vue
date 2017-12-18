<template lang="html">
  <div class="calendar-wrap mt-40">
    <div id="calendar"></div>
  </div>
</template>

<script>
export default {
  data(){
    return {
      list: [],
      evs: [],
      realEvents: [],
    }
  },
  created(){
    this.getEvents();
  },
  methods:{
    getEvents(){
      axios.get('/visites')
        .then(response => {
          this.list.push(response.data);
          axios.get('/rendezvous')
            .then(response => {
              this.list.push(response.data);
              this.evs.push(this.list[0]);
              this.evs = this.list[0].concat(this.list[1]);
              this.makeEvents();
          });
      });
    },
    makeEvents(){
      let list =[];
      this.evs.forEach(function(element) {
        let color = 'rgba(234, 108, 65, 0.3)';
        let title = '';
        let url = '';
        if (element.type == '1') { color ='#777'}
        if (element.type == '2') { color ='#f0ad4e'}
        if (element.type == '3') { color ='#d9534f'}
        if (element.client) {
          title = element.client.name;
          url = '/home#/visites/show/'+element.id;
        }else{
          title = element.prospect.name;
          url = '/home#/rendezvous/show/'+element.id;
        }
        list.push({ url:url ,title: title,textColor:'#d9534f' ,start: moment(element.date,'DD-MM-YYYY LT') ,end: moment(element.date,'DD-MM-YYYY LT'),allDay: true,color: color, textColor:'#ffff'})
      });
      this.realEvents = list;
      this.mountCalendar();
    },
    mountCalendar(){
      $('#calendar').fullCalendar({
        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,agendaWeek,agendaDay'
        },
        editable: false,
        droppable: false, // this allows things to be dropped onto the calendar
        eventLimit: true, // allow "more" link when too many events
        // eventAfterRender: function(event, element, view) {
        //   element.append(event.title);
        // },
        // eventClick: function(calEvent, jsEvent, view) {
        //     console.log('Event: ' + calEvent.title);
        //     alert('Coordinates: ' + jsEvent.pageX + ',' + jsEvent.pageY);
        //     alert('View: ' + view.name);
        //
        //     // change the border color just for fun
        //     $(this).css('border-color', 'red');
        //
        // },
        // eventMouseover: function (data, event, view) {
        //     var tooltip = '<div class="tooltiptopicevent tooltip tooltip-inner" style="width:auto;height:auto;position:absolute;z-index:10001;">10:00 AM ' + data.title + '</div>';
        // 		$("body").append(tooltip);
        //           $(this).mouseover(function (e) {
        //               $(this).css('z-index', 10000);
        //               $('.tooltiptopicevent').fadeIn('500');
        //               $('.tooltiptopicevent').fadeTo('10', 1.9);
        //           }).mousemove(function (e) {
        //               $('.tooltiptopicevent').css('top', e.pageY + 10);
        //               $('.tooltiptopicevent').css('left', e.pageX + 20);
        //           });
        //       },
        //       eventMouseout: function (data, event, view) {
        //           $(this).css('z-index', 8);
        //           $('.tooltiptopicevent').remove();
        //       },
        //       dayClick: function () {
        //           tooltip.hide()
        //       },
        //       eventResizeStart: function () {
        //           tooltip.hide()
        //       },
        //       eventDragStart: function () {
        //           tooltip.hide()
        //       },
        //       viewDisplay: function () {
        //           tooltip.hide()
        //       },

              events: this.realEvents
  		});
    }
  },
}
</script>

<style lang="css">
    #calendar .fc-title {
    color: #fffff;
    }
</style>
