<div id="calendar"></div>

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');

            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                events: @json($events), // Passa os eventos do controlador para o calendário
            });

            calendar.render();
        });
    </script>
@endpush
