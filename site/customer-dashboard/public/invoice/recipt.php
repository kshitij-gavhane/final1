<?php
session_start();
/* Attempt to connect to MySQL database */
$link = new mysqli('localhost', 'root', '', 'final');
// Check connection
if ($link === false) {
    die("ERROR: Could not connect." . mysqli_connect_error());
} else {
    if ($_SESSION["loggedin"] == true) {
        header("Refresh");
    } else {
        header('Location:/site/account/login/index.php');
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recipt</title>
</head>
<style>
    @page {
        size: 8.5in 5in;
    }

    @media print {

        html,
        body {
            height: 100%;
            margin: 0 !important;
            padding: 0 !important;
            overflow: hidden;
        }

    }

    .container {
        width: 8.5in;
        height: 11in;
        margin: 0 auto;
        padding: 0.5in;
        border: 1px solid black;
        box-sizing: border-box;
    }
</style>


<body style="font-family:'Times New Roman', Times, serif;letter-spacing:1px">
    <button onClick="window.print()">Print this page</button>




    <div class="container">

        <table style="table-layout: fixed; width: 100%; padding: 8px; ">
            <tbody>
                <tr>

                    <td>
                        <img src="./images/images-favicon.png" alt="nmc-logo" width="100px">
                    </td>

                    <td width="20%"></td>


                    <td class="">
                        21-23, Mahanagar Palika Marg, Near Vidhan Bhavan, Collectors Colony, Civil Lines, Nagpur, Maharashtra 440001
                    </td>
                </tr>
            </tbody>
        </table>



        <hr>


        <table style="table-layout: fixed; width: 100%; padding: 5px; ">
            <tbody>
<?php
$i = 1;
?>
                <tr>


                    <td class="text-center" style="color: brown;"><?php echo $i++ ?></td>

                    <td></td>

                    <td>
                        <strong style="font-size: larger; ">RECEIPT</strong>
                    </td>

                    <td></td>

                    <td class="">
                        DATE : 22 / 01 /2021
                    </td>
                </tr>
            </tbody>
        </table>

        <hr>

        <br>
        <table style="table-layout: fixed; width: 100%; padding: 5px; ">
            <tbody>
                <tr>

                    <td>
                        देयकाचे नाव
                    </td>


                    <td width="80%" style="font-size: large; font-weight: bold;border-bottom: 1px solid black;" class="">
                        <?php
                        error_reporting(0);
                        echo $_SESSION['owner_name'];
                        ?>
                    </td>
                </tr>
            </tbody>
        </table>
        <!-- 
            <br>
            <table style="table-layout: fixed; width: 100%; padding: 5px; ">
                <tbody>

                    <tr>

                        <td width="100%" style="border-bottom: 1px solid black;" class="">

                        </td>
                    </tr>
                </tbody>
            </table> -->


        <br>
        <table style="table-layout: fixed; width: 100%; padding: 5px; ">
            <tbody>

                <tr>

                    <td>
                        एकूण रुपये
                    </td>

                    <?php
                    $aadhar = $_SESSION["aadhar"];
                    $query = "SELECT * FROM payments WHERE aadhar='$aadhar' and status='Verified'"; //aadhar is table column name
                    $is_query_run = mysqli_query($link, $query);
                    $total = mysqli_num_rows($is_query_run);
                    if ($total > 0) {
                        while ($row = mysqli_fetch_array($is_query_run)) {
                            $status = $row['status'];
                            echo '  
<td width="88%" style="font-size: large;font-weight: bold; border-bottom: 1px solid black;" class="">
                        &#8377 <div>
                ' . $row["amount"] . '
              </div>
                        
                    </td>    ';
                        }
                    }
                    ?>

                    <!-- <td width="88%" style="font-size: large;font-weight: bold; border-bottom: 1px solid black;" class="">
                        &#8377 1701
                        
                    </td> -->
                </tr>
            </tbody>
        </table>








        <br>
        <table style="table-layout: fixed; width: 100%; padding: 5px; ">
            <tbody>

                <tr>

                    <td>
                        by Cash/ Cheque or DD. No.
                    </td>

                    <td width="38%" style="font-size: large; font-weight: bold; border-bottom: 1px solid black;" class="">
                        217678218182
                    </td>

                    <td width="5%">
                        On
                    </td>

                    <td width="35%" style="font-size: large; font-weight: bold;border-bottom: 1px solid black;" class="">
                        03 / 01 / 2021
                    </td>


                </tr>
            </tbody>
        </table>




        <br>
        <table style="table-layout: fixed; width: 100%; padding: 5px; ">
            <tbody>

                <tr>

                    <td>
                        शॉप ID
                    </td>

                    <td width="76%" style="font-size: large; font-weight: bold;border-bottom: 1px solid black;" class="">
                        <?php
                        error_reporting(0);
                        echo  $_SESSION['shop_id'];
                        ?> ( <?php
                                error_reporting(0);
                                echo  $_SESSION['area_sqft'];
                                ?> sq.ft )
                    </td>
                </tr>
            </tbody>
        </table>




        <br><br>

        <div style="padding-top:10px; padding-bottom:2px;">
            <table style="table-layout: fixed; width: 100%; padding: 5px; ">
                <tbody>
                    <tr>
                        <img>
                        <img src="./images/signature.png" style="height:60px;"></img>
                        <div>
                            <strong style="text-transform: uppercase;">ग्राहक स्वाक्षरी</strong><br>
                        </div>
                        </td>
                        <td width="50%">

                        </td>
                        <td>
                            <div>
                                <strong style="text-transform: uppercase;">अधिकारी स्वाक्षरी</strong><br>
                            </div>

                        </td>
                    </tr>
                </tbody>
            </table>
        </div>


    </div>

    <body>

    </body>

</html>



</body>

</html>