document.addEventListener('DOMContentLoaded', () => {

    // -----------------------------
    // Initialize Flatpickr pickers
    // -----------------------------
    const flatpickrConfigs = [
        { selector: '#eventStartDate', options: { enableTime: true, dateFormat: "Y-m-d H:i" } },
        { selector: '#eventEndDate', options: { enableTime: true, dateFormat: "Y-m-d H:i" } }
    ];

    flatpickrConfigs.forEach(({ selector, options }) => {
        const el = document.querySelector(selector);
        if (el) flatpickr(el, options);
    });

    // -----------------------------
    // Initialize Draggable external events
    // -----------------------------
    const externalEventsEl = document.getElementById('external-events');
    if (externalEventsEl && typeof FullCalendar !== 'undefined') {
        new FullCalendar.Draggable(externalEventsEl, {
            itemSelector: '.fc-event',
            eventData: (eventEl) => ({
                title: eventEl.innerText.trim(),
                backgroundColor: eventEl.getAttribute('data-color'),
                borderColor: eventEl.getAttribute('data-color'),
                textColor: '#fff',
                extendedProps: {
                    label: eventEl.getAttribute('data-label') || '',
                    location: eventEl.getAttribute('data-location') || '',
                    description: eventEl.getAttribute('data-description') || ''
                }
            })
        });
    }

    // -----------------------------
    // Initialize FullCalendar
    // -----------------------------
    const calendarEl = document.getElementById('calendar');
    if (!calendarEl) return;

    const calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        editable: true,
        droppable: true,
        headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,timeGridDay'
        },

        eventReceive: (info) => {
            if (!info.event.end) {
                const end = new Date(info.event.start);
                end.setDate(end.getDate() + 1);
                info.event.setEnd(end);
            }
        },

        eventClick: (info) => {
            info.jsEvent.preventDefault();

            const setText = (selector, text) => {
                const el = document.getElementById(selector);
                if (el) el.textContent = text || 'N/A';
            };

            setText('eventTitle', info.event.title);
            setText('eventStart', info.event.start?.toLocaleString());
            setText('eventEnd', info.event.end?.toLocaleString());
            setText('eventLocation', info.event.extendedProps.location);
            setText('eventDescription', info.event.extendedProps.description);

            const modalEl = document.getElementById('eventDetailsModal');
            if (modalEl) new bootstrap.Modal(modalEl).show();
        }
    });

    calendar.render();

    // -----------------------------
    // Handle Add Event Form
    // -----------------------------
    const eventForm = document.getElementById('eventForm');
    if (eventForm) {
        eventForm.addEventListener('submit', (e) => {
            e.preventDefault();

            const getVal = (id) => document.getElementById(id)?.value || '';

            const title = getVal('title');
            const label = getVal('label');
            const start = getVal('eventStartDate');
            const end = getVal('eventEndDate');
            const url = getVal('url');
            const location = getVal('location');
            const description = getVal('description');

            if (!title || !start) {
                alert('Please enter required fields.');
                return;
            }

            calendar.addEvent({
                title: label ? `${title}` : title,
                start,
                end: end || null,
                url: url || null,
                extendedProps: { label, location, description },
                backgroundColor: `var(--bs-${label})`,
                borderColor: '#fff',
                textColor: '#fff'
            });

            eventForm.reset();

            // Hide modal safely
            const modalEl = document.getElementById('modalAddEvent');
            if (modalEl) {
                const modalInstance = bootstrap.Modal.getInstance(modalEl);
                if (modalInstance) modalInstance.hide();
            }
        });
    }

});
