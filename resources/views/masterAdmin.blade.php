<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{!! csrf_token() !!}" />
    <title>Admin</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/adminTemplate/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/adminTemplate/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="assets/adminTemplate/css/zabuto_calendar.css">
    <link rel="stylesheet" type="text/css" href="assets/adminTemplate/js/gritter/css/jquery.gritter.css" />
    <link rel="stylesheet" type="text/css" href="assets/adminTemplate/lineicons/style.css">        
    <!-- Custom styles for this template -->
    <link href="assets/adminTemplate/css/style.css" rel="stylesheet">
    <link href="assets/adminTemplate/css/style-responsive.css" rel="stylesheet">
    <script src="assets/adminTemplate/js/chart-master/Chart.js"></script>
  </head>

  <body>
        <section id="container" >     
            <!-- autres elements -->
                @yield('autres.sections')
            <!--  end autres elements  -->
         </section>


    <!-- js placed at the end of the document so the pages load faster -->
    <script src="assets/adminTemplate/js/jquery.js"></script>
    <script src="assets/adminTemplate/js/jquery-1.8.3.min.js"></script>
    <script src="assets/adminTemplate/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="assets/adminTemplate/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="assets/adminTemplate/js/jquery.scrollTo.min.js"></script>
    <script src="assets/adminTemplate/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="assets/adminTemplate/js/jquery.sparkline.js"></script>

    <!--common script for all pages-->
    <script src="assets/adminTemplate/js/common-scripts.js"></script>
    
    <script type="text/javascript" src="assets/adminTemplate/js/gritter/js/jquery.gritter.js"></script>
    <script type="text/javascript" src="assets/adminTemplate/js/gritter-conf.js"></script>

    <!--script for this page-->
    <script src="assets/adminTemplate/js/sparkline-chart.js"></script>    
    <script src="assets/adminTemplate/js/zabuto_calendar.js"></script>  
    
    <script type="text/javascript">
        $(document).ready(function () {
        var unique_id = $.gritter.add({
            // (string | mandatory) the heading of the notification
            title: 'Bienvenu au Alumni-Ensas',
            // (string | mandatory) the text inside the notification
            text: 'vous avez connecté en tant qu\'administrateur.',
            // (string | optional) the image to display on the left
            image: 'assets/images/users/user.1.jpg',
            // (bool | optional) if you want it to fade out on its own or just sit there
            sticky: true,
            // (int | optional) the time you want it to be alive for before fading out
            time: '',
            // (string | optional) the class name you want to apply to that specific message
            class_name: 'my-sticky-class'
        });

        return false;
        });
    </script>
    
    <script type="application/javascript">
        $(document).ready(function () {
            $("#date-popover").popover({html: true, trigger: "manual"});
            $("#date-popover").hide();
            $("#date-popover").click(function (e) {
                $(this).hide();
            });
        
            $("#my-calendar").zabuto_calendar({
                action: function () {
                    return myDateFunction(this.id, false);
                },
                action_nav: function () {
                    return myNavFunction(this.id);
                },
                ajax: {
                    url: "show_data.php?action=1",
                    modal: true
                },
                legend: [
                    {type: "text", label: "Special event", badge: "00"},
                    {type: "block", label: "Regular event", }
                ]
            });
        });
        
        
        function myNavFunction(id) {
            $("#date-popover").hide();
            var nav = $("#" + id).data("navigation");
            var to = $("#" + id).data("to");
            console.log('nav ' + nav + ' to: ' + to.month + '/' + to.year);
        }
    </script>
  

  </body>
  </html>