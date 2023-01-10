<!DOCTYPE html>
<html lang="en">
<head>
<!-- basic -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- mobile metas -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="viewport" content="initial-scale=1, maximum-scale=1">
<!-- site metas -->
<title>NASA Asteroid data</title>
<meta name="keywords" content="">
<meta name="description" content="">
<meta name="author" content=""> 
<!-- bootstrap css -->
<link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
<!-- style css -->
<link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
<!-- Responsive-->
<link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
<!-- fevicon -->
<link rel="icon" href="{{ asset('images/fevicon.png') }}" type="image/gif" />
<!-- Scrollbar Custom CSS -->
<link rel="stylesheet" href="{{ asset('css/jquery.mCustomScrollbar.min.css') }}">
<!-- Tweaks for older IEs-->
<link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
<!-- owl stylesheets --> 
<link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
<!--<link rel="stylesheet" href="<?php echo url('')?>assets/css/owl.theme.default.min.css">-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
<style>
.overlay{
        display: none;
        position: fixed;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        z-index: 999;
        background: rgba(255,255,255,0.8) url("{{ asset('images/1494.gif')}}") center no-repeat;
    }
    
    /* Turn off scrollbar when body element has the loading class */
    body.loading{
        overflow: hidden;   
    }
    /* Make spinner image visible when body element has the loading class */
    body.loading .overlay{
        display: block;
    }
</style>
</head>
<body>
    
<div class="overlay"></div>
    <!-- header section start -->
    <div class="header_section">
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="logo"><a href="index.html"><img height="60px" width="120px" src="{{ asset('images/logo.png') }}"></a></div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <h2> <a class="nav-link" href="#">NASA Asteroid - Neo Stats </a></h2>
            </li>
            
          </ul>                                          
          
        </div>
      </nav>
    </div>
   
    <div class="">
      <div class="container-fluid">
        <div class="classes_section">
          <h2 class="classes_text">Neo - Feed</h2>
          <div class="dance_main">
          <div class="row">

              <div class="col-12">
                <form>
                    @csrf
                    <label>
                <div class="form-group">
                    <label for="inputEmail3" class="control-label">Choose Date <span style="color:red;" id="error_range"></span></label>
                    <input type="text" class="form-control" id="daterange" name="daterange" placeholder="">
                </div>
                    </label> 
                    <label>
                <div class="form-group">
                        <button type="button" class="btn btn-sm bold btn-info" id="sub_but">Submit</button>
                </div>
                    </label>
                </form>
              </div>  
            </div>
            <div class="row">
                <div class="col-6">
               <canvas id="myChart" style="width:120%;max-width:800px"></canvas>
                </div>
                <div class="col-6" id="span_div">
                <ul>
                            <li><strong><font color="#043457"><span class="col-md-10">Fastest Asteroid :</span></strong><span class="col-md-2" id="fasta"></span></font>  </li>
                            <li><strong><font color="#043457"><span class="col-md-10">Closest Asteroid :</span></strong><span class="col-md-2" id="closea"></span></font>  </li>
                            <li><strong><font color="#043457"><span class="col-md-10 bold">Average Size :</span></strong><span class="col-md-2" id="averagesize"></span></font>  </li>                    
                </ul>
            </div>
            </div>
           
          </div>
         
        </div>
      </div>
    </div>
    
    <div class="footer_section layout_padding margin_top0">
      <div class="container">
        <div class="row">
          <div class="col-sm-6 col-lg-4">
            <h1 class="adderss_text">Adderss</h1>
            <div class="map_icon"><img src="{{ asset('images/map-icon.png') }}"><span class="paddlin_left_0">India</span></div>
            <div class="map_icon_1"><img src="{{ asset('images/call-icon.png') }}"><span class="paddlin_left_0">+919999999999</span></div>
            <div class="map_icon"><img src="{{ asset('images/mail-icon.png') }}"><span class="paddlin_left_0">prince@gmail.com</span></div>
          </div>
        </div>
      </div>
    </div>

    <div class="copyright_section">
      <div class="container">
        <p class="copyright_text">2023 All Rights Reserved</p>
      </div>
    </div>
    <!-- copyright section end -->
    <!-- Javascript files-->
    <script src="{{ asset('js/jquery.min.js') }} "></script>
    <!-- <script src="{{ asset('js/popper.min.js') }} "></script> -->
    <script src="{{ asset('js/bootstrap.bundle.min.js') }} "></script>
    <script src="{{ asset('js/jquery-3.0.0.min.js') }} "></script>
    <script src="{{ asset('js/plugin.js') }} "></script>
    <!-- sidebar -->
    <script src="{{ asset('js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
    <!-- javascript --> 
    <!--<script src="<?php echo url('')?>assets/js/owl.carousel.js"></script>-->
    <script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>    

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<script>
  
  $(function() {
  $('input[name="daterange"]').daterangepicker({
    opens: 'left',
    locale: {
            format: 'YYYY/MM/DD'
        },
    endDate: moment().add(7, 'day'),    
  });
});


jQuery(document).ready(function() {
                   $("#sub_but").on('click',function(){
                    get_asteroid_data() 
                   });
                   
});
jQuery(document).ready(function() {
    get_asteroid_data() ;
    $("#span_div").hide();
});

var linechart = null;
function get_asteroid_data(){
    
    var daterange=$("#daterange").val();
    var token =$('input[name="_token"]').val();
    const myArray = daterange.split("-");
    var date1 = new Date(myArray[0]);
    var date2 = new Date(myArray[1]);
    
    // To calculate the time difference of two dates
    var Difference_In_Time = date2.getTime() - date1.getTime();
    var Difference_In_Days = Difference_In_Time / (1000 * 3600 * 24);
    if(Difference_In_Days > 7){
        $("#error_range").text("Date range limit is 7 days*");
        return false;
    }
    $("#error_range").text("");
   $("body").addClass("loading"); 
                    $.ajax({
                        url :"<?php echo url('')?>"+"/get_asteroid_data",
                        type: 'POST',
                        dataType :'JSON',
                        data: {daterange:daterange,_token:token},
                        success: function(data)
                             {  
                                $("body").removeClass("loading");
                                var xValues = [];
                                var yValues = [];
                                if(data.data){
                                $("#span_div").show();
                                $("#fasta").text(data.fastestAsteroid);
                                $("#closea").text(data.closestAsteroid);
                                $("#averagesize").text(data.asteroidAveragesize);
                                var chart_data = data.data;
                                
                                Object.keys(chart_data).forEach(function(key) {
                                    yValues.push(chart_data[key]);
                                    xValues.push(key);

                                });
                               }
                                if (linechart != null) 
                                    linechart.destroy();
                                linechart = new Chart("myChart", {
                                type: "line",
                                data: {
                                    labels: xValues,
                                    datasets: [{
                                    fill: false,
                                    lineTension: 0,
                                    backgroundColor: "rgba(0,0,255,2.0)",
                                    borderColor: "rgba(0,0,255,0.2)",
                                    data: yValues
                                    }]
                                },
                                options: {
                                    legend: {display: false},
//                                    scales: {
//                                    yAxes: [{ticks: {min: 1, max:20}}],
//                                    }
                                }
                                });

                           }
                            
                    });
                  
}

</script>
</body>
</html>