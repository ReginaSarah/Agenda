<?php

include_once ("conexao.php");
  
?>

<!DOCTYPE html>
<html lang="pt-br">

  <head>
    <meta charset='utf-8' />
    <link href='css/main.css' rel='stylesheet' />
    <link rel="stylesheet" type="text/css" href="css/style.css"/>
    <script src='js/main.js'></script>
    <script src='js/pt-br.js'></script>

    <script>

      document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');

        var calendar = new FullCalendar.Calendar(calendarEl, {
          editable: true,
          headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth'
          },
        
          defaultDate: Date(),
          navLinks: true, // can click day/week names to navigate views
          businessHours: true, // display business hours
          editable: true,
          eventLimit = true,
          selectable: true,

          events: 'conexao.php',
        });

        calendar.render();
      });

    </script>

  </head>


    <body>

      <div id='calendar'></div>

    </body>

    <footer>

    </footer>
</HTML>