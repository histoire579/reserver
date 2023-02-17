<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <title>Administration dashboard</title>

  <!-- Favicons -->
  <link href="{{ asset('dist/assets/img/trade-favicon.png') }}" rel="shortcut icon">
  <link href="{{ asset('dash/img/apple-touch-icon.png') }}" rel="shortcut icon">

  <!-- Bootstrap core CSS -->
  <link href="{{ asset('dash/lib/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <!--external css-->
  <link href="{{ asset('dash/lib/font-awesome/css/font-awesome.css') }}" rel="stylesheet">
  <link href="{{ asset('dash/css/zabuto_calendar.css') }}" rel="stylesheet">
  <link href="{{ asset('dash/lib/gritter/css/jquery.gritter.css') }}" rel="stylesheet">
  <link href="{{ asset('dash/lib/bootstrap-fileupload/bootstrap-fileupload.css') }}" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link href="{{ asset('dash/css/style.css') }}" rel="stylesheet">
  <link href="{{ asset('dash/css/style-responsive.css') }}" rel="stylesheet">
  <script src="{{ asset('dash/lib/chart-master/Chart.js') }}" defer></script>
  @yield('intra-js')
  <!-- =======================================================
    Template Name: Dashio
    Template URL: https://templatemag.com/dashio-bootstrap-admin-template/
    Author: TemplateMag.com
    License: https://templatemag.com/license/
  ======================================================= -->
</head>

<body>
  <section id="container">
    <!-- **********************************************************************************************************************************************************
        TOP BAR CONTENT & NOTIFICATIONS
        *********************************************************************************************************************************************************** -->
    <!--header start-->
    <header class="header black-bg">
      <div class="sidebar-toggle-box">
        <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
      </div>
      <!--logo start-->
      <a href="/administration/home" class="logo"><b style="color:#08367A">Resr<span style="color:#F39200">vation</span></b></a>
      <!--logo end-->
      <div class="nav notify-row" id="top_menu">
        <!--  notification start -->
        <ul class="nav top-menu">
          <!-- settings start -->
          <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="/administration">
              <i class="fa fa-tasks"></i>
              <span class="badge bg-theme"></span>
              </a>
            <ul class="dropdown-menu extended tasks-bar">
              <div class="notify-arrow notify-arrow-green"></div>
              <li>
                <p class="green">You have 4 pending tasks</p>
              </li>
              <li>
                <a href="#">
                  <div class="task-info">
                    <div class="desc">Dashio Admin Panel</div>
                    <div class="percent">40%</div>
                  </div>
                  <div class="progress progress-striped">
                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                      <span class="sr-only">40% Complete (success)</span>
                    </div>
                  </div>
                </a>
              </li>
              <li>
                <a href="#">
                  <div class="task-info">
                    <div class="desc">Database Update</div>
                    <div class="percent">60%</div>
                  </div>
                  <div class="progress progress-striped">
                    <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                      <span class="sr-only">60% Complete (warning)</span>
                    </div>
                  </div>
                </a>
              </li>
              <li>
                <a href="#">
                  <div class="task-info">
                    <div class="desc">Product Development</div>
                    <div class="percent">80%</div>
                  </div>
                  <div class="progress progress-striped">
                    <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                      <span class="sr-only">80% Complete</span>
                    </div>
                  </div>
                </a>
              </li>
              <li>
                <a href="#">
                  <div class="task-info">
                    <div class="desc">Payments Sent</div>
                    <div class="percent">70%</div>
                  </div>
                  <div class="progress progress-striped">
                    <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: 70%">
                      <span class="sr-only">70% Complete (Important)</span>
                    </div>
                  </div>
                </a>
              </li>
              <li class="external">
                <a href="#">See All Tasks</a>
              </li>
            </ul>
          </li>
          <!-- settings end -->
          
          <!-- inbox dropdown start-->
          <li id="header_inbox_bar" class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="/administration/home">
              <i class="fa fa-envelope-o"></i>
              <span id="nbsms" class="badge bg-theme"></span>
              </a>
            <ul class="dropdown-menu extended inbox">
              <div class="notify-arrow notify-arrow-green"></div>
              <li>
                <p class="green">You have 5 new messages</p>
              </li>
              <li>
                <a href="/administration/home">
                  <span class="photo"><img alt="avatar" src="dash/img/user.png"></span>
                  <span class="subject">
                  <span class="from">Zac Snider</span>
                  <span class="time">Just now</span>
                  </span>
                  <span class="message">
                  Hi mate, how is everything?
                  </span>
                  </a>
              </li>
              <li>
                <a href="/administration/home">
                  <span class="photo"><img alt="avatar" src="dash/img/user.png"></span>
                  <span class="subject">
                  <span class="from">Divya Manian</span>
                  <span class="time">40 mins.</span>
                  </span>
                  <span class="message">
                  Hi, I need your help with this.
                  </span>
                  </a>
              </li>
              <li>
                <a href="/administration/home">
                  <span class="photo"><img alt="avatar" src="dash/img/user.png"></span>
                  <span class="subject">
                  <span class="from">Dan Rogers</span>
                  <span class="time">2 hrs.</span>
                  </span>
                  <span class="message">
                  Love your new Dashboard.
                  </span>
                  </a>
              </li>
              <li>
                <a href="/administration/home">
                  <span class="photo"><img alt="avatar" src="dash/img/user.png"></span>
                  <span class="subject">
                  <span class="from">Dj Sherman</span>
                  <span class="time">4 hrs.</span>
                  </span>
                  <span class="message">
                  Please, answer asap.
                  </span>
                  </a>
              </li>
              <li>
                <a href="/administration/home">See all messages</a>
              </li>
            </ul>
          </li>
          <!-- inbox dropdown end -->
          <!-- notification dropdown start-->
          <li id="header_notification_bar" class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="/administration/home">
              <i class="fa fa-bell-o"></i>
              <span class="badge bg-warning"></span>
              </a>
            <ul class="dropdown-menu extended notification">
              <div class="notify-arrow notify-arrow-yellow"></div>
              <li>
                <p class="yellow">You have 7 new notifications</p>
              </li>
              <li>
                <a href="/administration/home">
                  <span class="label label-danger"><i class="fa fa-bolt"></i></span>
                  Server Overloaded.
                  <span class="small italic">4 mins.</span>
                  </a>
              </li>
              <li>
                <a href="/administration/home">
                  <span class="label label-warning"><i class="fa fa-bell"></i></span>
                  Memory #2 Not Responding.
                  <span class="small italic">30 mins.</span>
                  </a>
              </li>
              <li>
                <a href="/administration/home">
                  <span class="label label-danger"><i class="fa fa-bolt"></i></span>
                  Disk Space Reached 85%.
                  <span class="small italic">2 hrs.</span>
                  </a>
              </li>
              <li>
                <a href="/administration/home">
                  <span class="label label-success"><i class="fa fa-plus"></i></span>
                  New User Registered.
                  <span class="small italic">3 hrs.</span>
                  </a>
              </li>
              <li>
                <a href="/administration/home">See all notifications</a>
              </li>
            </ul>
          </li>
          <!-- notification dropdown end -->
        </ul>
        <!--  notification end -->
      </div>
      <div class="top-menu">
        <ul class="nav pull-right top-menu">
          <li><a class="logout" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" href="{{ route('administration.logout') }}">Logout</a>
            <form id="logout-form" action="{{ route('administration.logout') }}" method="POST" class="d-none">
                @csrf
            </form>
            </li>
        </ul>
      </div>
    </header>
    <!--header end-->
    <!-- **********************************************************************************************************************************************************
        MAIN SIDEBAR MENU
        *********************************************************************************************************************************************************** -->
    <!--sidebar start-->
    <aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
          <p class="centered"><a href="/administration/home"><img src="{{ asset('dash/img/user.png') }}" class="img-circle" width="90px"></a></p>
          {{-- <h5 class="centered">{{ Auth::user()->name }}</h5> --}}
          <li class="mt">
            <a class="active" href="/administration/home">
              <i class="fa fa-dashboard"></i>
              <span>Dashboard</span>
              </a>
          </li>
          
          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-users"></i>
              <span>About Us</span>
              </a>
            <ul class="sub">
              <li><a href="/">Notre histoire</a></li>
            </ul>
          </li>

          
          <li>
            <a href="">
              
              <i class="fa fa-cogs"></i>
              <span>Catégories</span>
              <span class="label label-theme pull-right mail-info"></span>
              </a>
          </li>

          
          <li>
            <a href="">
              
              <i class="fa fa-book"></i>
              <span>Type  </span>
              <span class="label label-theme pull-right mail-info"></span>
              </a>
          </li>


          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-image"></i>
              
              <span>Reservation</span>
              </a>
            <ul class="sub">
              <li><a href="">Reservation</a></li>
              <li><a href="">Avis</a></li>
            </ul>
          </li>

          <!-- <li>
            <a href="/administration/slider">
              <i class="fa fa-envelope"></i>
              <span>Slider </span>
              <span class="label label-theme pull-right mail-info"></span>
              </a>
          </li> -->

        </ul>
        <!-- sidebar menu end-->
      </div>
    </aside>
    <!--sidebar end-->
    <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
    <!--main content start-->
    
    @yield('content')
    <!--main content end-->
    <!--footer start-->
    {{-- <footer class="site-footer">
      <div class="text-center">
        <p>
          &copy; Copyrights <strong>FORGE</strong>. All Rights Reserved
        </p>
        <div class="credits">
          <!--
            You are NOT allowed to delete the credit link to TemplateMag with free version.
            You can delete the credit link only if you bought the pro version.
            Buy the pro version with working PHP/AJAX contact form: https://templatemag.com/dashio-bootstrap-admin-template/
            Licensing information: https://templatemag.com/license/
          -->
          Created with Dashio template by <a href="https://templatemag.com/">FORGE</a>
        </div>
        <a href="index.html#" class="go-top">
          <i class="fa fa-angle-up"></i>
          </a>
      </div>
    </footer> --}}
    <!--footer end-->
  </section>
  <!-- js placed at the end of the document so the pages load faster -->
  {{-- <script src="{{ asset('dash/lib/jquery/jquery.min.js') }}" defer></script> --}}
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <script src="{{ asset('dash/lib/bootstrap/js/bootstrap.min.js') }}" defer></script>
  <script src="{{ asset('dash/lib/jquery.dcjqaccordion.2.7.js') }}" defer></script>
  <script src="{{ asset('dash/lib/jquery.scrollTo.min.js') }}" defer></script>
  <script src="{{ asset('dash/lib/jquery.nicescroll.js') }}" defer></script>
  <script src="{{ asset('dash/lib/jquery.sparkline.js') }}" defer></script>
  <!--common script for all pages-->
  <script src="{{ asset('dash/lib/common-scripts.js') }}" defer></script>
  <script src="{{ asset('dash/lib/gritter/js/jquery.gritter.js') }}" defer></script>
  <script src="{{ asset('dash/lib/gritter-conf.js') }}" defer></script>
  <!--script for this page-->
  <script src="{{ asset('dash/lib/sparkline-chart.js') }}" defer></script>
  <script src="{{ asset('dash/lib/zabuto_calendar.js') }}" defer></script>
  <script src="{{ asset('dash/ckeditor/ckeditor.js') }}" defer></script>
  <script src="{{ asset('dash/lib/bootstrap-fileupload/bootstrap-fileupload.js') }}" defer></script>
  <script src="{{ asset('dash/lib/advanced-form-components.js') }}" defer></script>

 {{--  <script type="text/javascript">
    $(document).ready(function() {
      var unique_id = $.gritter.add({
        // (string | mandatory) the heading of the notification
        title: 'Welcome to Dashio!',
        // (string | mandatory) the text inside the notification
        text: 'Hover me to enable the Close Button. You can hide the left sidebar clicking on the button next to the logo.',
        // (string | optional) the image to display on the left
        image: 'img/ui-sam.jpg',
        // (bool | optional) if you want it to fade out on its own or just sit there
        sticky: false,
        // (int | optional) the time you want it to be alive for before fading out
        time: 8000,
        // (string | optional) the class name you want to apply to that specific message
        class_name: 'my-sticky-class'
      });

      return false;
    });
  </script> --}}
  {{-- <script type="application/javascript">
    $(document).ready(function() {
      $("#date-popover").popover({
        html: true,
        trigger: "manual"
      });
      $("#date-popover").hide();
      $("#date-popover").click(function(e) {
        $(this).hide();
      });

      $("#my-calendar").zabuto_calendar({
        action: function() {
          return myDateFunction(this.id, false);
        },
        action_nav: function() {
          return myNavFunction(this.id);
        },
        ajax: {
          url: "show_data.php?action=1",
          modal: true
        },
        legend: [{
            type: "text",
            label: "Special event",
            badge: "00"
          },
          {
            type: "block",
            label: "Regular event",
          }
        ]
      });
    });

    function myNavFunction(id) {
      $("#date-popover").hide();
      var nav = $("#" + id).data("navigation");
      var to = $("#" + id).data("to");
      console.log('nav ' + nav + ' to: ' + to.month + '/' + to.year);
    }
  </script> --}}
  
  <script src="{{ asset('js/app.js') }}" defer></script>
  @yield('extra-js')
</body>

</html>
