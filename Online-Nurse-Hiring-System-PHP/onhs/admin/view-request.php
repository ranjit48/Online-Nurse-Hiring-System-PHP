<?php session_start();
error_reporting(0);
// Database Connection
include('includes/config.php');
//Validating Session
if(strlen($_SESSION['aid'])==0)
  { 
header('location:index.php');
}
else{
if(isset($_POST['submit']))
  {
    
    $viewid=$_GET['viewid'];
    $ressta=$_POST['status'];
    $remark=$_POST['remark'];
   $query=mysqli_query($con, "update   tblbooking set Remark='$remark', Status='$ressta' where ID='$viewid'");
    if ($query) {
   
    echo '<script>alert("Request Status Has been updated.")</script>';
    echo "<script type='text/javascript'> document.location ='all-request.php'; </script>";
  }
  else
    {
    
      echo '<script>alert("Something Went Wrong. Please try again.")</script>';
    }

  
}

  ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Online Nurse Hiring System | View Request</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
<?php include_once("includes/navbar.php");?>
  <!-- /.navbar -->

 <?php include_once("includes/sidebar.php");?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>View Request</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">View Request</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
        

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">View Request</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <?php
 $viewid=$_GET['viewid'];
$ret=mysqli_query($con,"select tblnurse.*,tblbooking.* from tblbooking join tblnurse on tblnurse.ID=tblbooking.NurseID where tblbooking.ID='$viewid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
               <table class="table table-bordered data-table">
 <tr align="center">
<td colspan="4" style="font-size:20px;color:blue">
 View Request Details of (<?php  echo $row['BookingID'];?>)</td></tr>

 
 <tr>
    <th>Contact Name</th>
    <td><?php  echo $row['ContactName'];?></td>
 
    <th>Contact Number</th>
    <td><?php  echo $row['ContactNumber'];?></td>
    
  </tr>
  <tr>
    
    <th>Email</th>
    <td><?php  echo $row['ContactEmail'];?></td>
    <th>From Date</th>
    <td><?php  echo $row['FromDate'];?></td>
    
  </tr>
  
  <tr>
    <th>To Date</th>
    <td><?php  echo $row['ToDate'];?></td>
       <th>Time Duration</th>
    <td><?php  echo $row['TimeDuration'];?></td>
     
  </tr>
 
  <tr>
   <th>Patient Descrition</th>
    <td><?php  echo $row['PatientDescrition'];?></td>
     <th>Booking Date</th>
    <td><?php  echo $row['BookingDate'];?></td>
     
  </tr>
 
<tr align="center">
<td colspan="4" style="font-size:20px;color:blue">
 Nurse Details</td></tr>
    <tr>
   <th>Name of Nurse</th>
    <td><?php  echo $row['Name'];?></td>
     <th>Gender</th>
    <td><?php  echo $row['Gender'];?></td>
     
  </tr>
  <tr>
   <th>Email</th>
    <td><?php  echo $row['Email'];?></td>
     <th>Mobile Number</th>
    <td><?php  echo $row['MobileNo'];?></td>
     
  </tr>
  <tr>
   <th>Address</th>
    <td><?php  echo $row['Address'];?></td>
     <th>City</th>
    <td><?php  echo $row['City'];?></td>
     
  </tr>
  <tr>
   <th>State</th>
    <td><?php  echo $row['State'];?></td>
     <th>Languages Known</th>
    <td><?php  echo $row['LanguagesKnown'];?></td>
     
  </tr>
 
  <tr>
   <th>Nursing Exp</th>
    <td><?php  echo $row['NursingExp'];?></td>
     <th>Nursing Certificate</th>
    <td><?php  echo $row['NursingCertificate'];?></td>
     
  </tr>
  <tr>
   <th>Education Description</th>
    <td><?php  echo $row['EducationDescription'];?></td>
     <th>Profile Pic</th>
    <td><img src="images/<?php echo $row['ProfilePic']?>" width="120"></td>
     
  </tr>
  <tr>
    <th>Request Status</th>
    <td> <?php  
    $status=$row['Status'];
if($row['Status']=="Accepted")
{
  echo "Booking Request has been accepted";
}



if($row['Status']=="Rejected")
{
  echo "Booking request has been rejected";
}

if($row['Status']=="")
{
  echo "Wait for approval";
}



     ;?></td>
         <th>Remark</th>
        <td> <?php  


if($row['Status']=="")
{
  echo "Wait for approval";
} else
{
  echo $row['Remark'];
}



     ;?></td>
  </tr>
</table>
 <?php } ?>

<?php if($status==""){ ?>

<p align="center" style="padding-top: 20px;">                            
 <button class="btn btn-primary waves-effect waves-light w-lg" data-toggle="modal" data-target="#myModal">Take Action</button></p>  

<?php } ?>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
     <div class="modal-content">
      <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Take Action</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                <table class="table table-bordered table-hover data-tables">

                                 <form method="post" name="submit">

                                
                               
     <tr>
    <th>Remark :</th>
    <td>
    <textarea name="remark" placeholder="Remark" rows="6" cols="14" class="form-control wd-450" required="true"></textarea></td>
  </tr>  
                         

  <tr>
    <th>Status :</th>
    <td>

   <select name="status" class="form-control wd-450" required="true" >
     <option value="Accepted" selected="true">Accepted</option>
   
     <option value="Rejected">Rejected</option>
   </select></td>
  </tr>
</table>
</div>
<div class="modal-footer">
 <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
 <button type="submit" name="submit" class="btn btn-primary">Update</button>
  
  </form>

</div>

                      
                        </div>
                    </div>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php include_once('includes/footer.php');?>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../plugins/jszip/jszip.min.js"></script>
<script src="../plugins/pdfmake/pdfmake.min.js"></script>
<script src="../plugins/pdfmake/vfs_fonts.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
</body>
</html>
<?php } ?>