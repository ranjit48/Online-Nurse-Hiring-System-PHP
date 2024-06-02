<?php session_start();
error_reporting(0);
// Database Connection
include('includes/config.php');
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
    <style type="text/css">
        .pagination>li>a, .pagination>li>span {
    position: relative;
    float: left;
    padding: 6px 12px;
    margin-left: -1px;
    line-height: 1.42857143;
    color: #337ab7;
    text-decoration: none;
    background-color: #fff;
    border: 1px solid #ddd;
}
    </style>
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
                <a href="index.html">Home</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Team</li>
        </ol>
    </nav>
    <!-- //breadcrumbs -->
    <!-- //banner -->
    <!-- team -->
    <section class="team-agile py-lg-5">
        <div class="container py-sm-5 pt-5 pb-0">
            <div class="title-section text-center pb-lg-5">
                <h4>world of medicine</h4>
                <h3 class="w3ls-title text-center text-capitalize">the medical staff</h3>
            </div>
            <?php 
            if (isset($_GET['page_no']) && $_GET['page_no']!="") {
    $page_no = $_GET['page_no'];
    } else {
        $page_no = 1;
        }
 
    $total_records_per_page = 5;
    $offset = ($page_no-1) * $total_records_per_page;
    $previous_page = $page_no - 1;
    $next_page = $page_no + 1;
    $adjacents = "2"; 
 
    $result_count = mysqli_query($con,"SELECT COUNT(ID) As total_records FROM tblnurse ");
    $total_records = mysqli_fetch_array($result_count);
    $total_records = $total_records['total_records'];
    $total_no_of_pages = ceil($total_records / $total_records_per_page);
    $second_last = $total_no_of_pages - 1; // total page minus 1
$query=mysqli_query($con,"select * from tblnurse LIMIT $offset, $total_records_per_page");
$cnt=1;
while($result=mysqli_fetch_array($query)){
?>
            <div class="row mt-5 pb-lg-5">
                <div class="col-md-4 border p-0 my-auto">
                    <img src="admin/images/<?php echo $result['ProfilePic']?>" class="img-fluid" alt="team-img" />
                </div>
                <div class="col-md-8 team-text mt-md-0 mt-5">
                    <h4><?php echo $result['Name']?></h4>
                    
                    <p class="my-3"><?php echo $result['EducationDescription']?></p>
                    <ul class="list-group mb-3">
                        <li class="list-group-item border-0">
                            <i class="far fa-check-square  mr-3"></i><?php echo $result['Address']?></li>
                        <li class="list-group-item border-0 py-0">
                            <i class="far fa-check-square  mr-3"></i>
                            Experience : <?php echo $result['NursingExp']?> years</li>
                        <li class="list-group-item border-0">
                            <i class="far fa-check-square  mr-3"></i>
                            State : <?php echo $result['State']?></li>
                        <li class="list-group-item border-0 py-0">
                            <i class="far fa-check-square  mr-3"></i>City : <?php echo $result['City']?></li>
                        <li class="list-group-item border-0">
                            <i class="far fa-check-square  mr-3"></i>
                            Langauge Known: <?php echo $result['LanguagesKnown']?>
                        </li>
                        <li class="list-group-item border-0">
                            <i class="far fa-check-square  mr-3"></i>
                            Certificate: <?php echo $result['NursingCertificate']?>
                        </li>
                    </ul>
                    <a href="book-nurse.php?bookid=<?php echo $result['ID']?>" class="btn_apt">make an appointment </a>
                </div>
            </div><?php $cnt++;} ?>
            <div class="pagination" align="center">
<ul class="pagination">
    
    <li <?php if($page_no <= 1){ echo "class='disabled'"; } ?>>
    <a <?php if($page_no > 1){ echo "href='?page_no=$previous_page'"; } ?>>Previous</a>
    </li>
       
    <?php 
    if ($total_no_of_pages <= 10){       
        for ($counter = 1; $counter <= $total_no_of_pages; $counter++){
            if ($counter == $page_no) {
           echo "<li class='active'><a>$counter</a></li>";  
                }else{
           echo "<li><a href='?page_no=$counter'>$counter</a></li>";
                }
        }
    }
    elseif($total_no_of_pages > 10){
        
    if($page_no <= 4) {         
     for ($counter = 1; $counter < 8; $counter++){       
            if ($counter == $page_no) {
           echo "<li class='active'><a>$counter</a></li>";  
                }else{
           echo "<li><a href='?page_no=$counter'>$counter</a></li>";
                }
        }
        echo "<li><a>...</a></li>";
        echo "<li><a href='?page_no=$second_last'>$second_last</a></li>";
        echo "<li><a href='?page_no=$total_no_of_pages'>$total_no_of_pages</a></li>";
        }
 
     elseif($page_no > 4 && $page_no < $total_no_of_pages - 4) {         
        echo "<li><a href='?page_no=1'>1</a></li>";
        echo "<li><a href='?page_no=2'>2</a></li>";
        echo "<li><a>...</a></li>";
        for ($counter = $page_no - $adjacents; $counter <= $page_no + $adjacents; $counter++) {         
           if ($counter == $page_no) {
           echo "<li class='active'><a>$counter</a></li>";  
                }else{
           echo "<li><a href='?page_no=$counter'>$counter</a></li>";
                }                  
       }
       echo "<li><a>...</a></li>";
       echo "<li><a href='?page_no=$second_last'>$second_last</a></li>";
       echo "<li><a href='?page_no=$total_no_of_pages'>$total_no_of_pages</a></li>";      
            }
        
        else {
        echo "<li><a href='?page_no=1'>1</a></li>";
        echo "<li><a href='?page_no=2'>2</a></li>";
        echo "<li><a>...</a></li>";
 
        for ($counter = $total_no_of_pages - 6; $counter <= $total_no_of_pages; $counter++) {
          if ($counter == $page_no) {
           echo "<li class='active'><a>$counter</a></li>";  
                }else{
           echo "<li><a href='?page_no=$counter'>$counter</a></li>";
                }                   
                }
            }
    }
?>
    
    <li <?php if($page_no >= $total_no_of_pages){ echo "class='disabled'"; } ?>>
    <a <?php if($page_no < $total_no_of_pages) { echo "href='?page_no=$next_page'"; } ?>>Next</a>
    </li>
    <?php if($page_no < $total_no_of_pages){
        echo "<li><a href='?page_no=$total_no_of_pages'>Last &rsaquo;&rsaquo;</a></li>";
        } ?>
</ul>
 
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