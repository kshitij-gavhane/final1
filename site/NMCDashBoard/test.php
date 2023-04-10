<?php
    include_once 'include\dbinc.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="">
    </head>
    <body>
    <?php
    $sql="SELECT SUM(price), SUM(paid) FROM person;";
    $query= $conn->query($sql);
    foreach($query as $data){
        ;
    }
    ?>
    <script>
        alert(<?php json_encode($data) ?>)
    </script>
        
        <script src="" async defer></script>
    </body>
</html>