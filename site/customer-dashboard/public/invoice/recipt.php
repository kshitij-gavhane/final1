          <?php
            // Include the database connection file
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
            // Fetch the invoice ID from the URL parameter
            $invoice_id = $_GET['invoice'];
            // Fetch the payment details from the database
            $query = "SELECT * FROM payments WHERE invoice='$invoice_id'";
            $result = mysqli_query($link, $query);

            // Check if any payment record is found with the given invoice ID
            if (mysqli_num_rows($result) > 0) {
                // Fetch the payment details from the result set
                $payment = mysqli_fetch_assoc($result);
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
                <tr>


                    <td class="text-center" style="color: brown;">Invoice #<?php echo $payment['invoice']; ?></td>

                    <td></td>

                    <td>
                        <strong style="font-size: larger; ">RECEIPT</strong>
                    </td>

                    <td></td>

                          <td><?php echo $payment['date_created']; ?></td>
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

                                              <td><?php echo $payment['amount']; ?></td>


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
                       <?php echo $payment['date_created']; ?>
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