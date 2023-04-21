<?php
?>


<!DOCTYPE html>
<html>

<head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Thank You For Your Payment!</title>
   <style>
      body {
         margin: 0;
         padding: 0;
         font-family: Arial, sans-serif;
         background-color: #f2f2f2;
         color: #333;
         text-align: center;
         overflow-x: hidden;
      }

      h1 {
         font-size: 48px;
         margin-top: 100px;
         letter-spacing: 1px;
         animation: slideIn 1s ease-in-out;
      }

      p {
         font-size: 24px;
         margin-top: 50px;
         animation: fadeIn 2s ease-in-out;
      }

      @keyframes slideIn {
         0% {
            opacity: 0;
            transform: translateY(-100px);
         }

         100% {
            opacity: 1;
            transform: translateY(0);
         }
      }

      @keyframes fadeIn {
         0% {
            opacity: 0;
         }

         100% {
            opacity: 1;
         }
      }

      button {
         padding: 20px 50px;
         background-color: #333;
         color: #fff;
         font-size: 24px;
         border: none;
         border-radius: 5px;
         cursor: pointer;
         transition: background-color 0.3s ease-in-out;
         animation: fadeIn 2s ease-in-out;
      }

      button:hover {
         background-color: #666;
      }
   </style>
</head>

<body>
   <h1>Thank You For Your Payment!</h1>
   <p>Your transaction has been completed successfully.</p>
   <button onclick="window.location.href = '../customer-dashboard/public/index.php';">Return to Homepage</button>

   <script>
      // Internal JS to redirect to homepage after 5 seconds
      setTimeout(function() {
         window.location.href = 'index.html';
      }, 5000);
   </script>
</body>

</html>