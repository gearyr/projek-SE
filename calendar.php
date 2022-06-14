<!DOCTYPE html>
<html lang='en'>
  <head>
    <meta charset='utf-8' />
    <link href='https://cdn.jsdelivr.net/npm/fullcalendar@5.11.0/main.min.css' rel='stylesheet' />
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.11.0/main.min.js'></script>
    <link rel="stylesheet" href="styles/calendar.css">
    <link rel="stylesheet" href="styles/style.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/0b1394bbb5.js" crossorigin="anonymous"></script>
    <script src="js/calendar.js"></script>
    <script>

      document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            height: 750,
            initialView: 'dayGridMonth',
        });
        calendar.render();
      });

    </script>
  </head>
  <body>
    <div class="header">
        <a class="dot-home" href="index.php">
          <i class="fa-solid fa-house"></i>
        </a>
        <a class="dot-cal" href="calendar.php">
          <i class="fa-solid fa-calendar-days"></i>
        </a>
        <a class="dot-cek" href="check.php">
          <i class="fa-solid fa-check"></i>
        </a>
    </div>
    <div id="calendar"></div>

</body>
</html>
