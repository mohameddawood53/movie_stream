<?php
session_start();
include("forcast/index.php");
$pageTitle = "Dashboard | Movie ";
$navbar = "";
$slider = "";

if (isset($_SESSION['loggedin']))
{
        $country = "eg";
        function getNews($country)
        {
            $url     = 'https://newsapi.org/v2/top-headlines?country='. $country .'&apiKey=de294a29fc224491ad5959f857c5c7f7';
            $data    = json_decode(file_get_contents($url));
            return $data;
        }

        ?>
        <!DOCTYPE HTML>
        <html>
        <head>
        <title><?php echo $pageTitle; ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="keywords" content="Shoppy Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
        Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
        <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
        <!-- Custom Theme files -->
        <link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
        <!--js-->
        <script src="js/jquery-2.1.1.min.js"></script> 
        <!--icons-css-->
        <link href="css/font-awesome.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Orbitron" rel="stylesheet">
        <!--Google Fonts-->
        <link href='//fonts.googleapis.com/css?family=Carrois+Gothic' rel='stylesheet' type='text/css'>
        <link href='//fonts.googleapis.com/css?family=Work+Sans:400,500,600' rel='stylesheet' type='text/css'>
        <!--static chart-->
        <script src="js/Chart.min.js"></script>
        <!--//charts-->
        <!-- geo chart -->
            <script src="//cdn.jsdelivr.net/modernizr/2.8.3/modernizr.min.js" type="text/javascript"></script>
            <script>window.modernizr || document.write('<script src="lib/modernizr/modernizr-custom.js"><\/script>')</script>
            <!--<script src="lib/html5shiv/html5shiv.js"></script>-->
             <!-- Chartinator  -->
            <!--<script src="js/chartinator.js" ></script>
            <script type="text/javascript">
                jQuery(function ($) {
        
                    var chart3 = $('#geoChart').chartinator({
                        tableSel: '.geoChart',
        
                        columns: [{role: 'tooltip', type: 'string'}],
                 
                        colIndexes: [2],
                     
                        rows: [
                            ['China - 2015'],
                            ['Colombia - 2015'],
                            ['France - 2015'],
                            ['Italy - 2015'],
                            ['Japan - 2015'],
                            ['Kazakhstan - 2015'],
                            ['Mexico - 2015'],
                            ['Poland - 2015'],
                            ['Russia - 2015'],
                            ['Spain - 2015'],
                            ['Tanzania - 2015'],
                            ['Turkey - 2015']],
                      
                        ignoreCol: [2],
                      
                        chartType: 'GeoChart',
                      
                        chartAspectRatio: 1.5,
                     
                        chartZoom: 1.75,
                     
                        chartOffset: [-12,0],
                     
                        chartOptions: {
                          
                            width: null,
                         
                            backgroundColor: '#fff',
                         
                            datalessRegionColor: '#F5F5F5',
                       
                            region: 'world',
                          
                            resolution: 'countries',
                         
                            legend: 'none',
        
                            colorAxis: {
                               
                                colors: ['#679CCA', '#337AB7']
                            },
                            tooltip: {
                             
                                trigger: 'focus',
        
                                isHtml: true
                            }
                        }
        
                       
                    });                       
                });
            </script>
        <!--geo chart-->
        
        <!--skycons-icons-->
        <script src="js/skycons.js"></script>
        <script>
        function startTime() {
          var today = new Date();
          var h = today.getHours();
          var m = today.getMinutes();
          var s = today.getSeconds();
          m = checkTime(m);
          s = checkTime(s);
          document.getElementById('txt').innerHTML =
          h + ":" + m ;
          var t = setTimeout(startTime, 500);
        }
        function checkTime(i) {
          if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
          return i;
        }
        </script>
        
        <style>
                      
                      /* header */
                      h1 {
                        font-family: 'Orbitron', sans-serif;
                        font-size: 4em;
                        color: #fff;
                        margin-bottom: 10px;
                        
                      }
                      
                      /* buttons */
                      button {
                        cursor: pointer;
                        margin: 0 5px;
                        padding: 10px 30px;
                        background: transparent;
                        border: 1px solid #ccc;
                        border-radius: 8px;
                        outline: 0;
                        color: #fff;
                        transition: all ease 300ms;
                      }
                      button:hover {
                        color: #333;
                        background: #fff;
                      }
                      
                      /* center content vertically and horizontally */
                      .table {
                        display: table;
                        width: 100%;
                        height: 100%;
                      }
                      .cell {
                        display: table-cell;
                        vertical-align: middle;
                        cursor: default;
                      }
                      
                      /* variable misc classes */
                      .hide {
                        display: none;
                      }
                      
                        .chart-layer1-left {
                            padding: 0em 0em 0em 0em;
                            float: left;
                            width: 49%;
                            background: #333;
                            text-align: center;
                            height: 407px;
                        }
                        p{
                                    margin-top: 10px;

                        }
        </style>
        <!--//skycons-icons-->
-->        </head>
        <body onload="startTime();">	
        <?php
                if (isset($navbar))
                {
                        include("nav.php");
                        //print_r(getForcastData($row['country']));die;
                }
        
        ?>
        <!--market updates updates-->
             <div class="market-updates">
                    <div class="col-md-4 market-update-gd">
                        <div class="market-update-block clr-block-1">
                            <div class="col-md-8 market-update-left">
                                <h3><?php
                                        $stmt = $connection->prepare("SELECT * FROM users");
                                        $stmt->execute();
                                        $rows= $stmt->fetch();
                                        $count = $stmt->rowCount();
                                        echo $count;
                                ?></h3>
                                <h4>Registered User</h4>
                                <p>Admins, Normal users</p>
                            </div>
                            <div class="col-md-4 market-update-right">
                                <i class="fa fa-file-text-o"> </i>
                            </div>
                          <div class="clearfix"> </div>
                        </div>
                    </div>
                    <div class="col-md-4 market-update-gd">
                        <div class="market-update-block clr-block-2">
                         <div class="col-md-8 market-update-left">
                            <h3>
                                <?php
                                   $stmt = $connection->prepare("SELECT * FROM movies");
                                   $stmt->execute();
                                   $movies_count = $stmt->rowCount();
                                   echo $movies_count;
                                ?>
                            </h3>
                            <h4>Movies</h4>
                            <p>Arabic And Forigen.</p>
                          </div>
                            <div class="col-md-4 market-update-right">
                                <i class="fa fa-eye"> </i>
                            </div>
                          <div class="clearfix"> </div>
                        </div>
                    </div>
                    <div class="col-md-4 market-update-gd">
                        <div class="market-update-block clr-block-3">
                            <div class="col-md-8 market-update-left">
                                <h3>23</h3>
                                <h4>New Messages</h4>
                                <p>Other hand, we denounce</p>
                            </div>
                            <div class="col-md-4 market-update-right">
                                <i class="fa fa-envelope-o"> </i>
                            </div>
                          <div class="clearfix"> </div>
                        </div>
                    </div>
                   <div class="clearfix"> </div>
                </div>
        <!--market updates end here-->
        <!--mainpage chit-chating-->
        <div class="chit-chat-layer1">
            <div class="col-md-8 chit-chat-layer1-left">
                       <div class="work-progres">
                                    <div class="chit-chat-heading">
                                          Recent News
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-hover">
                                        <!--  <thead>
                                            <tr>
                                              <th>#</th>
                                              <th>Project</th>
                                              <th>Manager</th>                                   
                                                                                
                                              <th>Status</th>
                                              <th>Progress</th>
                                          </tr>
                                      </thead>-->
                                      <tbody>
                                        
                                        <?php
                                        ini_set('max_execution_time', 120); //120 seconds = 2 minutes
                                        set_time_limit(120);
                                                foreach(getNews($country)->articles as $data)
                                                {
                                                    if ($data->source->name == 'Youm7.com' || $data->source->name == 'Bbc.com' || $data->source->name == 'Elbalad.news')
                                                    {
                                                        ?>
                                                                
                                                                   
                                                                <tr>
                                                                    <td>
                                                                        <img src="<?php echo $data->urlToImage; ?>" style="height: 100px;width: 100px;">
                                                                    </td>

                                                                    <td style="margin-left: 440px;">
                                                                        <span class="badge badge-info" ><?php echo $data->source->name ;?></span>
                                                                        <span class="label label-danger"><?php $data->publishedAt; ?></span>
                                                                        <div>
                                                                                <a href="<?php echo $data->url; ?>" target="_blank"><?php echo $data->title; ?></a></br>
                                                                                <?php echo $data->description; ?>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                   
                                                                
                                                                
                                                        
                                                        <?php
                                                    }
                                                    
                                                    
                                                }
                                        ?>                                
                                                                     
                                          <!--<td><span class="label label-danger">in progress</span></td>
                                          <td><span class="badge badge-info">50%</span></td>
                                      </tr>
                                      <tr>
                                          <td>2</td>
                                          <td>Twitter</td>
                                          <td>Evan</td>                               
                                                                          
                                          <td><span class="label label-success">completed</span></td>
                                          <td><span class="badge badge-success">100%</span></td>
                                      </tr>
                                      <tr>
                                          <td>3</td>
                                          <td>Google</td>
                                          <td>John</td>                                
                                          
                                          <td><span class="label label-warning">in progress</span></td>
                                          <td><span class="badge badge-warning">75%</span></td>
                                      </tr>
                                      <tr>
                                          <td>4</td>
                                          <td>LinkedIn</td>
                                          <td>Danial</td>                                 
                                                                     
                                          <td><span class="label label-info">in progress</span></td>
                                          <td><span class="badge badge-info">65%</span></td>
                                      </tr>
                                      <tr>
                                          <td>5</td>
                                          <td>Tumblr</td>
                                          <td>David</td>                                
                                                                         
                                          <td><span class="label label-warning">in progress</span></td>
                                          <td><span class="badge badge-danger">95%</span></td>
                                      </tr>
                                      <tr>
                                          <td>6</td>
                                          <td>Tesla</td>
                                          <td>Mickey</td>                                  
                                                                     
                                          <td><span class="label label-info">in progress</span></td>
                                          <td><span class="badge badge-success">95%</span></td>
                                      </tr>-->
                                  </tbody>
                              </table>
                          </div>
                     </div>
              </div>
              <div class="col-md-4 chit-chat-layer1-rit">    	
                  		<div class="climate-grids">
                <div class="climate-grid1">
                    <div class="climate-gd1-top">
                        <div class="col-md-6 climate-gd1top-left">
                            <h4><?php
                                if (!empty(getForcastData($row['country'])->location->localtime))
                                {
                                        $localTimeAndDate = getForcastData($row['country'])->location->localtime;
                                        $local = explode(' ',$localTimeAndDate);
                                        $localDate = $local[0];
                                        $localTime = $local[1];
                                        $amORpm    = explode(":", $localTime);
                                        $date = explode("-",$localDate);
                                        $month= array(
                                         '01' => "JAN",
                                         '02' => "FEB",
                                         '03' => "MARCH",
                                         '04' => "April",
                                         '05' => "MAY",
                                         '06' => "JUNE",
                                         '07' => "JULY",
                                         '08' => "AUG",
                                         '09' => "SEPT",
                                         '10' => "OCT",
                                         '11' => "NOV",
                                         '12' => "DEC"
                                        );
                                        echo $month[$date[1]] . " " . $date[2] . "," . $date[0];
                                }
                            
                            ?></h4>
                            <h3 id="txt"><span class="timein-pms"><?php
                                if ($amORpm[0] >= 12 && $amORpm[1] > 0)
                                {
                                        echo "PM";
                                }else{
                                        echo "AM";
                                }
                            ?></span></h3>				
                            <p>Humidity:</p>					
                            <p>Tempreture C :</p>
                            <p>Tempreture F :</p>
                        </div>
                        <div class="col-md-6 climate-gd1top-right">
                              <span class="clime-icon"> 
                                <figure class="icons">
                                        <canvas id="partly-cloudy-day" width="64" height="64">
                                        </canvas>
                                    </figure>
                                <script>
                                     var icons = new Skycons({"color": "#fff"}),
                                          list  = [
                                            "clear-night", "partly-cloudy-day",
                                            "partly-cloudy-night", "cloudy", "rain", "sleet", "snow", "wind",
                                            "fog"
                                          ],
                                          i;
        
                                      for(i = list.length; i--; )
                                        icons.set(list[i], list[i]);
        
                                      icons.play();
                                </script>					  
                           </span>					
                              <p><?php echo getForcastData($row['country'])->current->humidity . "%"; ?></p>					
                              <p><?php echo getForcastData($row['country'])->current->temp_c . "c"; ?></p>
                               <p><?php echo getForcastData($row['country'])->current->temp_f . "f"; ?></p>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                    <div class="climate-gd1-bottom">
                        <div class="col-md-4 cloudy1">
                                <h4>Hongkong</h4>
                                  <figure class="icons">
                                    <canvas id="sleet" width="58" height="58">
                                    </canvas>
                                   </figure>
                                   <script>
                                         var icons = new Skycons({"color": "#fff"}),
                                              list  = [
                                                "clear-night", "clear-day",
                                                "partly-cloudy-night", "cloudy", "rain", "sleet", "snow", "wind",
                                                "fog"
                                              ],
                                              i;
            
                                          for(i = list.length; i--; )
                                            icons.set(list[i], list[i]);
            
                                          icons.play();
                                    </script>
                                <h3><?php echo getForcastData("Hongkong")->current->temp_c . "c"; ?></h3>
                            </div>
                            <div class="col-md-4 cloudy1">
                                <h4>UK</h4>
                                <figure class="icons">
                            <canvas id="cloudy" width="58" height="58"></canvas>
                        </figure>					
                            <script>
                                     var icons = new Skycons({"color": "#fff"}),
                                          list  = [
                                            "clear-night", "cloudy",
                                            "partly-cloudy-night", "cloudy", "rain", "sleet", "snow", "wind",
                                            "fog"
                                          ],
                                          i;
        
                                      for(i = list.length; i--; )
                                        icons.set(list[i], list[i]);
        
                                      icons.play();
                                </script>
                                <h3><?php echo getForcastData("uk")->current->temp_c . "c"; ?></h3>
                            </div>
                            <div class="col-md-4 cloudy1">
                                <h4>USA</h4>
                                <figure class="icons">
                                    <canvas id="snow" width="58" height="58">
                                    </canvas>
                                </figure>
                                <script>
                                     var icons = new Skycons({"color": "#fff"}),
                                          list  = [
                                            "clear-night", "clear-day",
                                            "partly-cloudy-night", "cloudy", "rain", "sleet", "snow", "wind",
                                            "fog"
                                          ],
                                          i;
        
                                      for(i = list.length; i--; )
                                        icons.set(list[i], list[i]);
        
                                      icons.play();
                                </script>
                                <h3><?php echo getForcastData("usa")->current->temp_c . "c"; ?></h3>
                            </div>
                        <div class="clearfix"> </div>
                    </div>
                </div>
            </div>		
                    
              </div>
             <div class="clearfix"> </div>
        </div>
        <!--main page chit chating end here-->
        <!--main page chart start here-->
        <div class="main-page-charts">
           <div class="main-page-chart-layer1">
                <div class="col-md-6 chart-layer1-left"> 
                   <div class="table">
                        <div class="cell">
                          <h1 id="clock" class="clock"></h1>
                          
                          <select id="hours"></select>
                          <select id="minutes"></select>
                          <select id="seconds"></select>
                          <select id="ampm">
                            <option value="AM">AM</option>
                            <option value="PM">PM</option>
                          </select>
                          
                          <p>
                            <button id="snooze" class="hide">Snooze</button>
                            <button id="startstop">Set Alarm</button>
                          </p>
                        </div>
                      </div>
                   <script>
                // set our variables
                var time, alarm, currentH, currentM,
                    activeAlarm = false,
                    sound = new Audio("https://freesound.org/data/previews/198/198841_285997-lq.mp3");
                
                /*
                  audio sound source: https://freesound.org/people/SieuAmThanh/sounds/397787/
                */
                
                // loop alarm
                sound.loop = true;
                
                // define a function to display the current time
                function displayTime() {
                  var now = new Date();
                  time = now.toLocaleTimeString();
                  clock.textContent = time;
                  // time = "1:00:00 AM";
                  // watch for alarm
                  if (time === alarm) {
                    sound.play();
                    
                    // show snooze button
                    snooze.className = "";
                  }
                  setTimeout(displayTime, 1000);
                }
                displayTime();
                
                // add option values relative towards time
                function addMinSecVals(id) {
                  var select = id;
                  var min = 59;
                  
                  for (i = 0; i <= min; i++) {
                    // defined as new Option(text, value)
                    select.options[select.options.length] = new Option(i < 10 ? "0" + i : i, i < 10 ? "0" + i : i);
                  }
                }
                function addHours(id) {
                  var select = id;
                  var hour = 12;
                  
                  for (i = 1; i <= hour; i++) {
                    // defined as new Option(text, value)
                    select.options[select.options.length] = new Option(i < 10 ? "0" + i : i, i);
                  }
                }
                addMinSecVals(minutes);
                addMinSecVals(seconds);
                addHours(hours);
                
                // set and clear alarm
                startstop.onclick = function() {
                  // set the alarm
                  if (activeAlarm === false) {
                    hours.disabled = true;
                    minutes.disabled = true;
                    seconds.disabled = true;
                    ampm.disabled = true;
                    
                    alarm = hours.value + ":" + minutes.value + ":" + seconds.value + " " + ampm.value;
                    this.textContent = "Clear Alarm";
                    activeAlarm = true;
                  } else {
                    // clear the alarm
                    hours.disabled = false;
                    minutes.disabled = false;
                    seconds.disabled = false;
                    ampm.disabled = false;
                    
                    sound.pause();
                    alarm = "00:00:00 AM";
                    this.textContent = "Set Alarm";
                    
                    // hide snooze button
                    snooze.className = "hide";
                    activeAlarm = false;
                  }
                };
                
                // snooze for 5 minutes
                snooze.onclick = function() {
                  if (activeAlarm === true) {
                    // grab the current hour and minute
                    currentH = time.substr(0, time.length - 9);
                    currentM = time.substr(currentH.length + 1, time.length - 8);
                    
                    if (currentM >= "55") {
                      minutes.value = "00";
                      hours.value = parseInt(currentH) + 1;
                    } else {
                      if (parseInt(currentM) + 5 <= 9) {
                        minutes.value = "0" + parseInt(currentM + 5);
                      } else {
                        minutes.value = parseInt(currentM) + 5;
                      }
                    }
                    
                    // hide snooze button
                    snooze.className = "hide";
                    
                    // now reset alarm
                    startstop.click();
                    startstop.click();
                  } else {
                    return false;
                  }
                };
        </script>
                </div>
                <div class="col-md-6 chart-layer1-right"> 
                    <div class="user-marorm">
                    <div class="malorum-top">				
                    </div>
                    <div class="malorm-bottom">
                        <span class="malorum-pro"> </span>
                         <h4>unde omnis iste</h4>
                         <h2>Melorum</h2>
                        <p>But I must explain to you how all this mistaken idea of denouncing pleasure and praising.</p>
                        <ul class="malorum-icons">
                            <li><a href="#"><i class="fa fa-facebook"> </i>
                                <div class="tooltip"><span>Facebook</span></div>
                            </a></li>
                            <li><a href="#"><i class="fa fa-twitter"> </i>
                                <div class="tooltip"><span>Twitter</span></div>
                            </a></li>
                            <li><a href="#"><i class="fa fa-google-plus"> </i>
                                <div class="tooltip"><span>Google</span></div>
                            </a></li>
                        </ul>
                    </div>
                   </div>
                </div>
             <div class="clearfix"> </div>
          </div>
         </div>
        <!--main page chart layer2-->
        <div class="chart-layer-2">
            
            <div class="col-md-6 chart-layer2-right">
                    <div class="prograc-blocks">
                     <!--Progress bars-->
                    <div class="home-progres-main">
                       <h3>Total Sales</h3>
                     </div>
                    <div class='bar_group'>
                            <div class='bar_group__bar thin' label='Rating' show_values='true' tooltip='true' value='343'></div>
                            <div class='bar_group__bar thin' label='Quality' show_values='true' tooltip='true' value='235'></div>
                            <div class='bar_group__bar thin' label='Amount' show_values='true' tooltip='true' value='550'></div>
                            <div class='bar_group__bar thin' label='Farming' show_values='true' tooltip='true' value='456'></div>
                    </div>
                        <script src="js/bars.js"></script>
        
                  <!--//Progress bars-->
                  </div>
            </div>
            <div class="col-md-6 chart-layer2-left">
                <div class="content-main revenue">			
                            <h3>Total Revenue</h3>
                            <canvas id="radar" height="300" width="300" style="width: 300px; height: 300px;"></canvas>
                                <script>
                                    var radarChartData = {
                                        labels : ["","","","","","",""],
                                        datasets : [
                                            {
                                                fillColor : "rgba(104, 174, 0, 0.83)",
                                                strokeColor : "#68ae00",
                                                pointColor : "#68ae00",
                                                pointStrokeColor : "#fff",
                                                data : [65,59,90,81,56,55,40]
                                            },
                                            {
                                                fillColor : "rgba(236, 133, 38, 0.82)",
                                                strokeColor : "#ec8526",
                                                pointColor : "#ec8526",
                                                pointStrokeColor : "#fff",
                                                data : [28,48,40,19,96,27,100]
                                            }
                                        ]
                                        
                                    };
                                    new Chart(document.getElementById("radar").getContext("2d")).Radar(radarChartData);
                                </script>
                </div>
            </div>
          <div class="clearfix"> </div>
        </div>
        
        <!--climate start here-->
        <div class="climate">
            
            <div class="col-md-4 climate-grids">
                <div class="climate-grid2">
                    <span class="shoppy-rate"><h4>$180</h4></span>
                    <ul>
                        <li> <i class="fa fa-credit-card"> </i> </li>
                        <li> <i class="fa fa-usd"> </i> </li>
                    </ul>
                </div>
                <div class="shoppy">
                <h3>Those Who Hate Shopping?</h3>
                </div>
            </div>
            <div class="col-md-4 climate-grids">
                <div class="climate-grid3">
                    <div class="popular-brand">
                        <div class="col-md-6 popular-bran-left">
                             <h3>Popular</h3>
                             <h4>Brand of this month</h4>
                             <p> Duis aute irure  in reprehenderit.</p>
                        </div>
                        <div class="col-md-6 popular-bran-right">
                            <h3>Polo</h3>
                        </div>
                      <div class="clearfix"> </div>
                    </div>
                    <div class="popular-follow">
                        <div class="col-md-6 popular-follo-left">
                            <p>Lorem ipsum dolor sit amet, adipiscing elit.</p>
                        </div>
                        <div class="col-md-6 popular-follo-right">
                            <h4>Follower</h4>
                            <h5>2892</h5>
                        </div>
                      <div class="clearfix"> </div>
                    </div>
                </div>
            </div>
            <div class="clearfix"> </div>
        </div>
        <!--climate end here-->
        </div>
        <!--inner block end here-->
        <!--copy rights start here-->
        <div class="copyrights">
             <p>© 2016 Shoppy. All Rights Reserved | Design by  <a href="http://w3layouts.com/" target="_blank">W3layouts</a> </p>
        </div>	
        <!--COPY rights end here-->
        </div>
        </div>
        <!--slider menu-->
            <?php
                if (isset($slider))
                {
                        include("slider.php");
                }
            ?>
        <!--slide bar menu end here-->
        <script>
        var toggle = true;
                    
        $(".sidebar-icon").click(function() {                
          if (toggle)
          {
            $(".page-container").addClass("sidebar-collapsed").removeClass("sidebar-collapsed-back");
            $("#menu span").css({"position":"absolute"});
          }
          else
          {
            $(".page-container").removeClass("sidebar-collapsed").addClass("sidebar-collapsed-back");
            setTimeout(function() {
              $("#menu span").css({"position":"relative"});
            }, 400);
          }               
                        toggle = !toggle;
                    });
        </script>
        <!--scrolling js-->
                <script src="js/jquery.nicescroll.js"></script>
                <script src="js/scripts.js"></script>
                <!--//scrolling js-->
        <script src="js/bootstrap.js"> </script>
        <!-- mother grid end here-->
        </body>
        </html>                     
<?php
}
else{
    header("location:login.php");
    exit();
}
?>