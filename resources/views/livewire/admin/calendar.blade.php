<div>
    <div id='calendar'></div>
</div>
<script>
    
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new Calendar(calendarEl, {
          initialView: 'dayGridMonth',
          headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
          },
          plugins: [ dayGridPlugin, timeGridPlugin, listPlugin, interactionPlugin ],
          editable: true,
          selectable: true,
          selectMirror: true,
          dayMaxEvents: true, // allow "more" link when too many events
          events: [
            { // this object will be "parsed" into an Event Object }
              title: 'All Day Event',
              start: '2025-09-12'
            },
            {
              title: 'Long Event',
              start: '2024-06-07',
              end: '2024-06-10'
            },
            {
              groupId: 999,
              title: 'Repeating Event',
              start: '2024-06-09T16:00:00'
            },
            {
              groupId: 999,
              title: 'Repeating Event',
              start: '2024-06-16T16:00:00'
            },
            {
              title: 'Conference',
              start: '2024-06-11',
              end: '2024-06-13'
            },
            {
              title: 'Meeting',
              start: '2024-06-12T10:30:00', 
              end: '2024-06-12T12:30:00'
            }
        ]
        });
        calendar.render();
      });
</script>
