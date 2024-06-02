<?php session_start();
error_reporting(0);
// Database Connection
include('includes/config.php');
if(isset($_POST['submit']))
  {
  $nbid=$_GET['bookid'];
  $contactname=$_POST['contactname'];
  $contphonenum=$_POST['contphonenum'];
  $contemail=$_POST['contemail'];
 $fromdate=$_POST['fromdate'];
 $todate=$_POST['todate'];
 $timeduration=$_POST['timeduration'];
 $patientdesc=$_POST['patientdesc'];
 $bookingid=mt_rand(100000000, 999999999);
$ret=mysqli_query($con,"SELECT * FROM tblbooking where ('$fromdate' BETWEEN date(FromDate) and date(ToDate) || '$todate' BETWEEN date(FromDate) and date(ToDate) || date(FromDate) BETWEEN '$fromdate' and '$todate') and NurseID='$nbid' and Status='Accepted'");
 $count=mysqli_num_rows($ret);
if($count==0){


 $query=mysqli_query($con,"insert into tblbooking(BookingID,NurseID,ContactName,ContactNumber,ContactEmail,FromDate,ToDate,TimeDuration,PatientDescrition) values('$bookingid','$nbid','$contactname','$contphonenum','$contemail','$fromdate','$todate','$timeduration','$patientdesc')");
if($query){
echo '<script>alert("Your Booking Request Has Been Send. We Will Contact You Soon")</script>';
echo "<script type='text/javascript'> document.location = 'team.php'; </script>";
} else {
echo "<script>alert('Something went wron. Please try again.');</script>";
}
} else{
    echo "<script>alert('This nurse is not available for these dates.');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>Online Nurse Hiring System | Team Details</title>
   
    <script>
        addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <!-- Custom Theme files -->
    <link href="css/bootstrap.css" type="text/css" rel="stylesheet" media="all">
    <link href="css/style.css" type="text/css" rel="stylesheet" media="all">
    <!-- font-awesome icons -->
    <link href="css/fontawesome-all.min.css" rel="stylesheet">
    <!-- //Custom Theme files -->
    <!-- online-fonts -->
    <link href="//fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet">
</head>

<body>
    <!-- banner -->
    <div class="inner-banner" id="home">
        <!-- header -->
        <?php include_once("includes/navbar.php");?>
        <!-- //header -->
        <!-- //container -->
    </div>
    <!-- breadcrumbs -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.php">Home</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Nurse Booking</li>
        </ol>
    </nav>
    <!-- //breadcrumbs -->
    <!-- //banner -->
    <!-- team -->
    <section class="team-agile py-lg-5">
        <div class="container py-sm-5 pt-5 pb-0">
            <div class="title-section text-center pb-lg-5">
                <h4>world of medicine</h4>
                <h3 class="w3ls-title text-center text-capitalize">Nurse Booking</h3>
            </div>
          
            <div class="row mt-5 pb-lg-5">
                
                <div class="col-md-8 team-text mt-md-0 mt-5">
                    <form action="#" method="post">
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Contact Name</label>
                                    <input type="text" class="form-control" placeholder="Name" name="contactname" id="contactname" required="">
                                </div>
                                <div class="form-group">
                                    <label for="recipient-phone" class="col-form-label">Contact Number</label>
                                    <input type="text" class="form-control" placeholder="Phone" name="contphonenum" id="contphonenum" required="">
                                </div>
                                <div class="form-group">
                                    <label for="recipient-phone" class="col-form-label">Contact Email Address</label>
                                    <input type="email" class="form-control" placeholder="Email" name="contemail" id="contemail" required="">
                                </div>

                                <div class="form-group">
                                    <label for="datepicker" class="col-form-label">From Date</label>
                                    <input placeholder="From Date" class="date form-control" id="fromdate" name="fromdate" type="date" required="" />

                                </div>
                                <div class="form-group">
                                    <label for="datepicker" class="col-form-label">To Date</label>
                                    <input placeholder="To Date" class="date form-control" id="todate" name="todate" type="date"  required="" />

                                </div>
                                <div class="form-group">
                                    <label for="datepicker" class="col-form-label">Time Duration</label>
                                    <input placeholder="Time Duration" class="date form-control" id="timeduration" name="timeduration" type="text" value="" 
                                        required="" />

                                </div>
                               <div class="form-group">
                                <label for="datepicker" class="col-form-label">Patient Description</label>
                                <textarea placeholder="Patient Description" class="form-control" name="patientdesc" id="patientdesc" required=""></textarea>
                                </div>
                                <button type="submit" class="btn_apt" name="submit">Request Appointment</button>
                            </form>
                </div>
            </div>
            
        </div>
    </section>
    <!-- //team -->
    <!-- footer -->
   <?php include_once("includes/footer.php");?>
    <!-- //footer -->
 

    
    <!-- js -->
    <script src="js/jquery-2.2.3.min.js"></script>
    <!-- //js -->
    <!-- //fixed quick contact -->
    <script>
        $(function () {
            var hidden = true;
            $(".heading").click(function () {
                if (hidden) {
                    $(this).parent('.outer-col').animate({
                        bottom: "0"
                    }, 1200);
                } else {
                    $(this).parent('.outer-col').animate({
                        bottom: "-305px"
                    }, 1200);
                }
                hidden = !hidden;
            });
        });
    </script>
    <!-- //fixed quick contact -->
    <!--start-date-piker-->
    <link rel="stylesheet" href="css/jquery-ui.css" />
    <script src="js/jquery-ui.js"></script>
    <script>
        $(function () {
            $("#datepicker,#datepicker1").datepicker();
        });
    </script>
    <!-- //End-date-piker -->
    <!-- start-smooth-scrolling -->
    <script src="js/easing.js"></script>
    <script>
        jQuery(document).ready(function ($) {
            $(".scroll").click(function (event) {
                event.preventDefault();

                $('html,body').animate({
                    scrollTop: $(this.hash).offset().top
                }, 1000);
            });
        });
    </script>
    <script src="js/SmoothScroll.min.js"></script>
    <!-- //end-smooth-scrolling -->
    <!-- Bootstrap core JavaScript
================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/bootstrap.js"></script>
</body>

</html>