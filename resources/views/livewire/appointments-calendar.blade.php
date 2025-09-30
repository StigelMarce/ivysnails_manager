<script>
    Echo.channel('calendar')
        .listen('CalendarUpdated', (e) => {
            alert('Cita modificada');
        });
</script>