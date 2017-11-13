<?php
defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
    <?php
    if (isset($this->session->userdata['status']) == NULL) {
        redirect(site_url('login', 'refresh'));
    }
    ?>
    <?php
    $servername = "127.0.0.1";
    $username = "root";
    $password = "";
    $dbname = "bloodbank";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 

    $sql = "SELECT a.nama, b.a, b.b, b.ab, b.o FROM rspmi a, statdarah b WHERE a.id_rspmi = b.id_rspmi";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            //output
        }
    } else {
        echo "<script>alert('Failed to Load Database');</script>";
    }

    $conn->close();
    ?>
    <head>
        <META HTTP-EQUIV="Pragma" CONTENT="private">
        <META HTTP-EQUIV="Cache-Control" CONTENT="private, max-age=5400, pre-check=5400">
        <META HTTP-EQUIV="Expires" CONTENT="<?php echo date(DATE_RFC822,strtotime("1 day")); ?>">
        <meta charset=utf-8>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Blood Bank</title>
        <!-- Load Roboto font -->
        <link href='http://fonts.googleapis.com/css?family=Roboto:400,300,700&amp;subset=latin,latin-ext' rel='stylesheet' type='text/css'>
        <!-- Load css styles -->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/bootstrap-responsive.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/style.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/pluton.css">
        <link rel="stylesheet" href="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/jquery.cslider.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/jquery.bxslider.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/animate.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/gift.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/chart.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/ddprofile.css">
        
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <!--[if IE 7]>
            <link rel="stylesheet" type="text/css" href="css/pluton-ie7.css" />
        <![endif]-->

        <!-- Fav and touch icons -->
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo base_url(); ?>assets/images/ico/apple-touch-icon-144.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo base_url(); ?>assets/images/ico/apple-touch-icon-114.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo base_url(); ?>assets/images/apple-touch-icon-72.png">
        <link rel="apple-touch-icon-precomposed" href="<?php echo base_url(); ?>assets/images/ico/apple-touch-icon-57.png">
        <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/images/logoweb.png">
        <?php
        foreach ($rspmi as $rspmi) {
            $input = $rspmi;
            $rand = array_rand($input, 1);
            //echo $input[$rand_keys[0]] . "\n";
            //echo $input[$rand_keys[1]] . "\n";

            $nama = $rspmi['nama'];
            //$nama = $input[$rand[0]];
            $numa = $rspmi['a'];
            $numb = $rspmi['b'];
            $numab = $rspmi['ab'];
            $numo = $rspmi['o'];
            $style_a = 'width: ' . $numa . '%;';
            $style_b = 'width: ' . $numb . '%;';
            $style_ab = 'width: ' . $numab . '%;';
            $style_o = 'width: ' . $numo . '%;';


        }
        ?>
    </head>
    
    <body>
        <!-- navbar start -->
        <div class="navbar">
            <div class="navbar-inner">
                <div class="container">
                    <a href="#" class="brand">
                        <img src="<?php echo base_url(); ?>assets/images/logoweb.png" width="120" height="40" alt="Logo" />
                        <!-- This is website logo -->
                    </a>
                    <!-- Navigation button, visible on small resolution -->
                    <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <i class="icon-menu"></i>
                    </button>
                    <!-- Main navigation -->
                    <div class="nav-collapse collapse pull-right">
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="#home">Home</a></li>
                            <li><a href="#activity">Activity</a></li>
                            <li><a href="#gift">Gift</a></li>
                            <li role="presentation" class="dropdown">
                                <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                                    <i class="fa fa-envelope-o"></i>
                                    <span class="badge bg-green">6</span>
                                </a>
                                <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                                    <li><a>
                                        <span class="image"><img src="https://images.unsplash.com/photo-1485528562718-2ae1c8419ae2?auto=format&fit=crop&w=481&q=60&ixid=dW5zcGxhc2guY29tOzs7Ozs%3D" alt="Profile Image" style="width: auto; height: 20px;"></span>
                                        <span>
                                            <span>John Smith</span>
                                            <span class="time">3 mins ago</span>
                                        </span>
                                        <span class="message">Film festivals used to be do-or-die moments for movie makers. They were where...</span>
                                    </a></li>
                                    <li><a>
                                        <span class="image"><img src="https://images.unsplash.com/photo-1491528323818-fdd1faba62cc?auto=format&fit=crop&w=1400&q=60&ixid=dW5zcGxhc2guY29tOzs7Ozs%3D" alt="Profile Image" style="width: auto; height: 20px;"/></span>
                                        <span>
                                            <span>Alex McKey</span>
                                            <span class="time">3 mins ago</span>
                                        </span>
                                        <span class="message">Film festivals used to be do-or-die moments for movie makers. They were where...</span>
                                    </a></li>
                                    <li>
                                        <div class="text-center">
                                            <a>
                                                <strong>See All Alerts</strong>
                                                <i class="fa fa-angle-right"></i>
                                            </a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <li class="">
                                <a href="#" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                    <div style="height: 20px; margin: auto; padding: auto;">
                                        <img src="https://colorlib.com/polygon/gentelella/images/img.jpg" alt="" style="width: auto; height: 20px;">John Doe
                                        <span class=" fa fa-angle-down"></span>
                                    </div>
                                </a>
                                <ul class="dropdown-menu dropdown-usermenu pull-right">
                                    <li><a href=""> Profile</a></li>
                                    <li><a href=""><span class="badge bg-red pull-right">50%</span>
                                        <span>Settings</span>
                                    </a></li>
                                    <li><a href="<?php echo site_url('user/logout'); ?>"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <!-- End main navigation -->
                </div>
            </div>
        </div>
        <!-- navbar end -->

        <!-- Start statistic section -->
        <div class="section primary-section" id="home">
            <div class="container">
                <!-- Start title section -->
                <div class="title">
                    <h1>Blood Statistics</h1>
                    <!-- Section's title goes here -->
                    <div class="random">
                        <p id="rspmi"><?php echo $nama;?></p>
                        <a href="site_url(user/getData)" id="clickRand"><i class="fa fa-search"></i></a>
                    </div>
                    <!--Simple description for section goes here. -->
                </div>
                <div class="row-fluid">
                    <div class="skills">
                        <ul class="lines">
                            <li class="line l--0">
                                <span class="line__label">0</span>
                            </li>
                            <li class="line l--25">
                                <span class="line__label">25</span>
                            </li>
                            <li class="line l--50">
                                <span class="line__label">50</span>
                            </li>
                            <li class="line l--75">
                                <span class="line__label">75</span>
                            </li>
                            <li class="line l--100">
                                <span class="line__label">100</span>
                            </li>
                        </ul>

                        <div class="charts">
                            <div class="chart chart--dev">
                                <span class="chart__title"></span>
                                <ul class="chart--horiz">
                                    <li class="chart__bar" style="<?php echo $style_a; ?>">
                                        <span class="chart__label">A</span>
                                    </li>
                                    <li class="chart__bar" style="<?php echo $style_b; ?>">
                                        <span class="chart__label">B</span>
                                    </li>
                                    <li class="chart__bar" style="<?php echo $style_ab; ?>">
                                        <span class="chart__label">AB</span>
                                    </li>
                                    <li class="chart__bar" style="<?php echo $style_o; ?>">
                                        <span class="chart__label">O</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End statistic section -->

        <!-- Start activity section -->
        <div class="section secondary-section " id="activity">
            <div class="triangle"></div>
            <div class="container">
                <div class=" title">
                    <h1>Activity</h1>
                </div>

                <!-- Start details for portfolio project 1 -->
                <div id="single-project">
                    <div id="slidingDiv" class="toggleDiv row-fluid single-project">
                        <div class="span6">
                            <img src="<?php echo base_url(); ?>assets/images/Portfolio01.png" alt="project 1" />
                        </div>
                        <div class="span6">
                            <div class="project-description">
                                <div class="project-title clearfix">
                                    <h3>Webste for Some Client</h3>
                                    <span class="show_hide close">
                                        <i class="icon-cancel"></i>
                                    </span>
                                </div>
                                <div class="project-info">
                                    <div>
                                        <span>Client</span>Some Client Name</div>
                                    <div>
                                        <span>Date</span>July 2013</div>
                                    <div>
                                        <span>Skills</span>HTML5, CSS3, JavaScript</div>
                                    <div>
                                        <span>Link</span>http://examplecomp.com</div>
                                </div>
                                <p>Believe in yourself! Have faith in your abilities! Without a humble but reasonable confidence in your own powers you cannot be successful or happy.</p>
                            </div>
                        </div>
                    </div>
                    <!-- End details for portfolio project 1 -->
                    <!-- Start details for portfolio project 2 -->
                    <div id="slidingDiv1" class="toggleDiv row-fluid single-project">
                        <div class="span6">
                            <img src="<?php echo base_url(); ?>assets/images/Portfolio02.png" alt="project 2">
                        </div>
                        <div class="span6">
                            <div class="project-description">
                                <div class="project-title clearfix">
                                    <h3>Webste for Some Client</h3>
                                    <span class="show_hide close">
                                        <i class="icon-cancel"></i>
                                    </span>
                                </div>
                                <div class="project-info">
                                    <div>
                                        <span>Client</span>Some Client Name</div>
                                    <div>
                                        <span>Date</span>July 2013</div>
                                    <div>
                                        <span>Skills</span>HTML5, CSS3, JavaScript</div>
                                    <div>
                                        <span>Link</span>http://examplecomp.com</div>
                                </div>
                                <p>Life is a song - sing it. Life is a game - play it. Life is a challenge - meet it. Life is a dream - realize it. Life is a sacrifice - offer it. Life is love - enjoy it.</p>
                            </div>
                        </div>
                    </div>
                    <!-- End details for portfolio project 2 -->
                    <!-- Start details for portfolio project 3 -->
                    <div id="slidingDiv2" class="toggleDiv row-fluid single-project">
                        <div class="span6">
                            <img src="<?php echo base_url(); ?>assets/images/Portfolio03.png" alt="project 3">
                        </div>
                        <div class="span6">
                            <div class="project-description">
                                <div class="project-title clearfix">
                                    <h3>Webste for Some Client</h3>
                                    <span class="show_hide close">
                                        <i class="icon-cancel"></i>
                                    </span>
                                </div>
                                <div class="project-info">
                                    <div>
                                        <span>Client</span>Some Client Name</div>
                                    <div>
                                        <span>Date</span>July 2013</div>
                                    <div>
                                        <span>Skills</span>HTML5, CSS3, JavaScript</div>
                                    <div>
                                        <span>Link</span>http://examplecomp.com</div>
                                </div>
                                <p>How far you go in life depends on your being tender with the young, compassionate with the aged, sympathetic with the striving and tolerant of the weak and strong. Because someday in your life you will have been all of these.</p>
                            </div>
                        </div>
                    </div>
                    <!-- End details for portfolio project 3 -->
                    <ul id="portfolio-grid" class="thumbnails row">
                        <li class="span4 mix web">
                            <div class="thumbnail">
                                <img src="<?php echo base_url(); ?>assets/images/Portfolio01.png" alt="project 1">
                                <a href="#single-project" class="more show_hide" rel="#slidingDiv">
                                    <i class="icon-plus"></i>
                                </a>
                                <h3>Thumbnail label</h3>
                                <p>Thumbnail caption...</p>
                                <div class="mask"></div>
                            </div>
                        </li>
                        <li class="span4 mix photo">
                            <div class="thumbnail">
                                <img src="<?php echo base_url(); ?>assets/images/Portfolio02.png" alt="project 2">
                                <a href="#single-project" class="show_hide more" rel="#slidingDiv1">
                                    <i class="icon-plus"></i>
                                </a>
                                <h3>Thumbnail label</h3>
                                <p>Thumbnail caption...</p>
                                <div class="mask"></div>
                            </div>
                        </li>
                        <li class="span4 mix identity">
                            <div class="thumbnail">
                                <img src="<?php echo base_url(); ?>assets/images/Portfolio03.png" alt="project 3">
                                <a href="#single-project" class="more show_hide" rel="#slidingDiv2">
                                    <i class="icon-plus"></i>
                                </a>
                                <h3>Thumbnail label</h3>
                                <p>Thumbnail caption...</p>
                                <div class="mask"></div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- End activity section -->

        <!-- Start gift section -->
        <div class="section primary-section " id="gift">
            <div class="triangle"></div>
            <div class="container">
                <div class=" title">
                    <h1>Gift</h1>
                    <p>Receive rewards for your kindness from us.</p>
                </div>

                <!-- Gift start-->
                <div class="blank" style="margin-top: 170px"></div>
                <div class="gift">
                    <div class="bubbletext">
                        <div class="message">
                            <div class="chat">
                                <p>10000 Points</p>
                            </div>
                        </div>
                    </div>
                    <div class="gift-top"></div>
                    <div class="gift-box"></div>
                </div>
                <!-- Gift end-->
                <div class="blank" style="margin-bottom: 12px"></div>
            </div>
        </div>
        <!-- End gift section -->

        <!-- Footer section start -->
        <div class="footer">
            <p>&copy; 2017 BloodBank</p>
        </div>
        <!-- Footer section end -->

        <!-- ScrollUp button start -->
        <div class="scrollup">
            <a href="#">
                <i class="icon-up-open"></i>
            </a>
        </div>
        <!-- ScrollUp button end -->

        <!-- Include javascript -->
        <script src="<?php echo base_url(); ?>assets/js/jquery.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.mixitup.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/modernizr.custom.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.bxslider.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.cslider.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.placeholder.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.inview.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/app.js"></script>
        <script type="text/javascript" src="http://code.jquery.com/jquery-1.6.4.min.js"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.bundle.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/gift.js"></script>
        <script src="https://mysqljs.com/mysql.js"></script>
        <script type="text/javascript">
        $("#clickRand").click(function(){
            $.ajax({url: "random_tutorials.php", success: function(result){
                $("#rspmi").html(result);
            }});
        });
        </script>
    </body>
</html>