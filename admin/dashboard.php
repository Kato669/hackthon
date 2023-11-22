<?php include('constants.php') ?>

<style>
    .nav-link{
        font-size: 1.3rem;
        color: #000;
        padding: 0 4rem;
    }
    .calender{
        height: 90vh;
        width: 95%;
        margin: auto;
        margin-top: 1%;
    }
</style>

<script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.5/index.global.min.js'></script>
    <!-- javascript syntax -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth'
            });
        calendar.render();
    });

</script>


  <div id='calendar' class="calender"></div>

