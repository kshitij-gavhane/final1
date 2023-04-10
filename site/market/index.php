<?php  
 $connect = mysqli_connect("localhost", "root", "","shopdatabase");  
 $query ="SELECT * FROM ownertable ";  
 $result = mysqli_query($connect, $query);

 ?>  


<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>NMC-Markets</title>
  <!-- <link rel="stylesheet" href="styles.css"> -->
  <link rel='stylesheet' href='//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css'>
<link rel='stylesheet' href='//cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.10.0/bootstrap-table.min.css'>
<link rel='stylesheet' href='//rawgit.com/vitalets/x-editable/master/dist/bootstrap3-editable/css/bootstrap-editable.css'><link rel="stylesheet" href="./style.css">

</head>
<style>
	.container {
	width: 1024px;
	padding: 2em;
}
tr{
  /* color: black;
  background: white; */

  background-color: rgba(255,255,255,0.3);
 
}
.h1{
	text-align:center;
	justify-content: center;
}
.bold-blue {
	font-weight: bold;
	color: #0277BD;
}
body {
	background: linear-gradient(-45deg, #a4a4a4a6, #c94d4da3, #36a2c9bb, #3d36b8a2);
	background-size: 400% 400%;
	animation: gradient 15s ease infinite;
	height: 100vh;
}


@keyframes gradient {
	0% {
		background-position: 0% 50%;
	}
	50% {
		background-position: 100% 50%;
	}
	100% {
		background-position: 0% 50%;
	}
}

@import url('https://fonts.googleapis.com/css?family=Open+Sans|Playfair+Display+SC');

* {
    margin: 0;
    padding: 0;
}

a {
    text-decoration: none;
    color: inherit;
}

/* body {
    font: normal 18px 'Open Sans', sans-serif;
    background: #fafafa;
    color: #333;
} */

main {
    min-height: 21vh;
}

header {
    /* background: white; */
	background-color: rgba(255,255,255,0.3);
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
}
    h1{
        font: normal 4em 'Playfair Display SC', serif;
        text-align:center;
    }

    nav {
        max-width: auto;
        margin: auto;
        display: flex;
        flex-wrap: wrap;
    }

        nav a {
            flex-grow: 1;
            text-align: center;
            padding: 1em;
            position: relative;
			font-weight: 500;
			font-style: bold;
			
        }

        /*  animmation */
        nav a::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            right:0;
            height: 2px;
            transform: scaleX(0);
            background: #333;
            transition: 0.7s transform cubic-bezier(0.06, 0.9, 0.28, 1);
        }

        nav a:hover::after{
            transform: scaleX(1)
        }



</style>
<body>
	
<div class="container">
<main>
        <header>
            <h1>pandas</h1>
            <nav>
                <a  href="#">First tab</a>
                <a href="#">Second tab</a>
                <a href="#">Third tab</a>
                <a href="#">Fourth tab</a>
            </nav>
        </header>
    </main>
<h1>Market Details </h1>

<div id="toolbar">
		<select class="form-control">
				<option value="">Export Basic</option>
				<option value="all">Export All</option>
				<option value="selected">Export Selected</option>
		</select>
</div>

<table id="table" 
			 data-toggle="table"
			 data-search="true"
			 data-filter-control="true" 
			 data-show-export="true"
			 data-click-to-select="true"
			 data-toolbar="#toolbar">
	<thead >
		<tr class = "table1_header" >
			<th data-field="state" data-checkbox="true"></th>
			<th data-field="prenom" data-filter-control="input" data-sortable="true">Owners Name</th>
			<th data-field="date" data-filter-control="select" data-sortable="true">Market Name</th>
			<th data-field="examen" data-filter-control="select" data-sortable="true">Area</th>
			<!-- <th data-field="note" data-sortable="true">View</th> -->
		</tr>
	</thead>
	
		<?php  
		if(mysqli_num_rows($result)>0){

		
		while($row = mysqli_fetch_array($result))  
		{  
		  echo '  
		  <tr>  
		  <td>'.$row["OwnerName"].'</td> 
		  	   <td>'.$row["OwnerName"].'</td> 
			   <td>'.$row["MarketName"].'</td>  
			   <td>'.$row["Area"].'</td>  
		  </tr>  
		   ';  
	 }  
		}
	 ?>  

	
			
	
</table>
</div>
<!-- partial -->
  <script src='//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js'></script>
<script src='//cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.10.0/bootstrap-table.js'></script>
<script src='//cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.9.1/extensions/editable/bootstrap-table-editable.js'></script>
<script src='//cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.9.1/extensions/export/bootstrap-table-export.js'></script>
<script src='//rawgit.com/hhurz/tableExport.jquery.plugin/master/tableExport.js'></script>
<script src='//cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.9.1/extensions/filter-control/bootstrap-table-filter-control.js'></script><script  src="./script.js"></script>

</body>
</html>
