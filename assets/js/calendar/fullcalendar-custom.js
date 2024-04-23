document.addEventListener('DOMContentLoaded', function() {

    /* initialize the external events
    -----------------------------------------------------------------*/
    function getTodaysDate() {
      const today = new Date();
      const year = today.getFullYear();
      const month = String(today.getMonth() + 1).padStart(2, '0'); // Add leading zero for single-digit months
      const day = String(today.getDate()).padStart(2, '0'); // Add leading zero for single-digit days
    
      return `${year}-${month}-${day}`;
    }

    var currentDate = getTodaysDate();
    var containerEl = document.getElementById('external-events-list');
    new FullCalendar.Draggable(containerEl, {
      itemSelector: '.fc-event',
      eventData: function(eventEl) {
        return {
          title: eventEl.innerText.trim()
        }
      }
    });
   

    //// the individual way to do it
    // var containerEl = document.getElementById('external-events-list');
    // var eventEls = Array.prototype.slice.call(
    //   containerEl.querySelectorAll('.fc-event')
    // );
    // eventEls.forEach(function(eventEl) {
    //   new FullCalendar.Draggable(eventEl, {
    //     eventData: {
    //       title: eventEl.innerText.trim(),
    //     }
    //   });
    // });

    /* initialize the calendar
    -----------------------------------------------------------------*/
    fetch('../../api.php?name=calendar_internal')
    .then(response => response.json())
    .then(events => {
      console.log(events.data);
    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
      headerToolbar: {
        left: 'prev,next today',
        center: 'title',
        right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
      },
      initialView: 'dayGridMonth',
      initialDate: currentDate,
      navLinks: true, // can click day/week names to navigate views
      editable: true,
      selectable: true,
      nowIndicator: true,
      // dayMaxEvents: true, // allow "more" link when too many events
      events: events.data,
      editable: true,
      droppable: true, // this allows things to be dropped onto the calendar
      drop: function(arg) {
        // is the "remove after drop" checkbox checked?
        if (document.getElementById('drop-remove').checked) {
          // if so, remove the element from the "Draggable Events" list
          arg.draggedEl.parentNode.removeChild(arg.draggedEl);
        }
      }
    });
    calendar.render();

    })
    .catch(error => {
        console.error('Error fetching events:', error);
    });

  });