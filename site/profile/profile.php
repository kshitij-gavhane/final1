<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>profile Information</title>
    
	
<link rel='stylesheet' href='//rawgit.com/vitalets/x-editable/master/dist/bootstrap3-editable/css/bootstrap-editable.css'>
<link rel="stylesheet" href="./style.css">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
$(document).ready(function(){
    $("#myTab a").click(function(e){
        e.preventDefault();
        $(this).tab("show");
    });
});
</script>
</head>
<body>

<div class="container emp-profile">
            <form method="post">
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-img">
                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS52y5aInsxSm31CvHOFHWujqUx_wWTS9iM6s7BAm21oEN_RiGoog" alt=""/>
                            <div class="file btn btn-lg btn-primary">
                                Change Photo
                                <input type="file" name="file"/>
                            </div>
                        </div>
                    </div>




                    <div class="col-md-6">
                        <div class="profile-head">
                                    <h5>
                                        Kshiti Ghelani
                                    </h5>
                                    <h6>
                                        Web Developer and Designer
                                    </h6>
                                    <p class="proile-rating"><span></span></p>
                                
                                 
<div class="m-4">
    <ul class="nav nav-pills" id="myTab">
        <li class="nav-item" >
            <a href="#home" class="nav-link active" style="color:white" >Personal information</a>
        </li>
        <li class="nav-item">
            <a href="#profile" class="nav-link"  style="color:white">Lease history</a>
        </li>
        <li class="nav-item">
            <a href="#messages" class="nav-link"  style="color:white">Documents</a>
        </li>
    </ul>
    </div>
    </div>
    
   
    




    <?php  
    $connect = mysqli_connect("localhost", "root", "","shopdatabase");  
     $query ="SELECT * FROM customerprofile ";  
     $result = mysqli_query($connect, $query);

    if(mysqli_num_rows($result)>0){
  
  while($row = mysqli_fetch_array($result))  {

      
   ?>


   




    <div class="tab-content">
        <div class="tab-pane fade show active" id="home">

            <div class="row">
            <div class="col-md-6">
                <label style="color:#dbcdd5">User Id :-<?php echo $row["user id"];?>
                 <br>
                <br>
                </label>
            </div>
           
        </div>

        <div class="row">
            <div class="col-md-6">
                <label style="color:#dbcdd5">Name:-<?php echo $row["Name"];?>
                 <br>
                <br>
                </label>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <label style="color:#dbcdd5">Email= <?php echo $row["Email"];?>
                <br>
                <br>
                </label>
            </div>
        </div>


        <div class="row">
            <div class="col-md-6">
                <label style="color:#dbcdd5">Phone :-<?php echo $row["phone"];?>
                <br>
                <br>
                </label>
            </div>
</div>

<div class="row">
<div class="col-md-6">
    <label style="color:#dbcdd5">Occupation :-<?php echo $row["phone"];?>
    <br>
    <br>
    </label>
</div>
</div>

<div class="row">
<div class="col-md-6">
    <label style="color:#dbcdd5">Address :-<?php echo $row["phone"];?>
    <br>
    <br>
    </label>
</div>
</div>




















        </div>
        <div class="tab-pane fade" id="profile">
            <h4 class="mt-2"style="color:blue"></h4>
            <div class="row">
            <div class="col-md-6">
                <label style="color:#dbcdd5">Experience:- <?php echo $row["profession"];?>
                <br>
                <br>
                </label>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <label style="color:#dbcdd5">Hourly Rate:-<?php echo $row["profession"];?>
                <br>
                <br>
                </label>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <label style="color:#dbcdd5">Total Projects= <?php echo $row["profession"];?>
                <br>
                <br>
                </label>
            </div>
        </div>
        <div class="row">
        <div class="col-md-6">
            <label style="color:#dbcdd5">Total Projects :-<?php echo $row["profession"];?>
            <br>
            <br>
            </label>
        </div>
    </div>


</div>
<?php
}

}


?>  



        
        <div class="tab-pane fade" id="messages">
            <h4 class="mt-2"style="color:#dbcdd5">Documents</h4>
            <p style="color:#dbcdd5">abcdefghijkal
            
            hbcdhbkvnjkrnvkmmek
            bchjdsbcjndnjcnm
            b cjsdbcndkvjnjfnv
            gvdhdbjfjehfjn.</p>
        </div>
    </div>
</div>
<div class="col-md-2">
<input type="submit" class="profile-edit-btn" name="btnAddMore" value="Edit Profile"/>
</div>
</div>




</body>
</html>