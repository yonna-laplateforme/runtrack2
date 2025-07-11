<?php
        $mybool = true ;
        $int = 33 ;
        $text ="yonna";
        $float = 1.52;
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>


   <table border ="2">
       <tr>
          <th>Type</th>
          <th>Nom</th>
          <th>Valeurs</th>
       </tr>
   
       <tr>
            <td>
                 <?php echo gettype($mybool);?> 
            </td>

            <td>
                mybool
            </td>
            
            <td>
                <?php echo $mybool ;?>
            </td>
       </tr>

         <tr>
            <td>
                 <?php echo gettype($int);?> 
            </td>

            <td>
                age
            </td>
            
            <td>
                <?php echo $int ;?>
            </td>
       </tr>

         <tr>
            <td>
                 <?php echo gettype($text);?> 
            </td>

            <td>
                prénom
            </td>
            
            <td>
                <?php echo $text;?>
            </td>
       </tr>

         <tr>
            <td>
                 <?php echo gettype($float);?> 
            </td>

            <td>
                taille
            </td>
            
            <td>
                <?php echo $float;?>
            </td>
       </tr>




   </table>
</body>
</html>