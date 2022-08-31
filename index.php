<?php


$city=isset($_GET['city']) ? $_GET['city']:"Casablanca";

if(empty($city)){
    $city="Casablanca";
}
$URL="https://api.openweathermap.org/data/2.5/weather?q=".$city."&appid=a9799ce2550c391cd8986b2b3bb75756&units=metric";



$content=json_decode(file_get_contents($URL));
if(empty($content)){
    header('location:index.php');
}
$name=$content->name;
$weather=$content->weather[0]->main;
$desc=$content->weather[0]->description;
$temp=$content->main->temp;
$feels_like=$content->main->feels_like;
$temp_min=$content->main->temp_min;
$temp_max=$content->main->temp_max;
$speed=$content->wind->speed;
$deg=$content->wind->deg;


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
    <title>weatherAPP</title>
</head>
<body>
    <div class="container text-center py-5 container-fluid heigth=100%">



<div class="row">
    <div class="col-md-6 mx-auto center-block">
        <form action="index.php" method="get">        
        <input type="text" class="form-control" name="city" placeholder="City name"> <br>
        <button type="submit" class="btn btn-success">Search</button>
    
  </form>
    </div>
</div>


    <br>
    <h1>Meteo of this day in :<?= $name;?></h1>
    <div class="row justify-content-center align-item-center">
        <?php 
            switch($weather)
            {
                case "Clear":
                    ?>
                
                <div class="icon sunny">
                    <div class="sun">
                            <div class="rays"></div>
                    </div>     
                </div>

                <?php
                 break;
                 case "Drizzle";
                 ?>
                 <div class="icon sun-shower">
                    <div class="cloud">
                         <div class="rays"></div>
                    </div> 
                    <div class="rain"></div>    
                </div>
                <?php
                 break;
                 case "Rain";
                 ?>
                 <div class="icon rainy">
                    <div class="cloud"></div>
                    <div class="rain"></div>   
                </div>
                <?php
                 break;
                 case "Clouds";
                 ?>
                <div class="icon cloudy">
                    <div class="cloud"></div>
                    <div class="cloud"></div>   
                </div>
                <?php
                 break;
                 case "Thunderstorm";
                 ?>
                <div class="icon thunder-storm">
                    <div class="lightning">
                        <div class="bolt"></div>
                        <div class="bolt"></div> 
                    </div>  
                </div>
                <?php
                 break;
                 case "Snow";
                 ?>
                <div class="icon flurries">
                    <div class="snow">
                        <div class="fake"></div>
                        <div class="fake"></div> 
                    </div>  
                </div>


                

            <?php 
            break;
            } 
            ?>

            <div class="meteo_desc text-left">
                <h2>
                   <strong>The temperature is:</strong> <?php echo $temp;?> °C <br>
                   <strong> The wind speed is : </strong><?php echo $speed;?> km/h <br><strong> The degree of wind is:</strong><?php echo $deg;?> degre <br/>
                   <strong> The Min temperature is : </strong> <?php echo $temp_min ?> °C <br>
                   <strong> The Max temperature is : </strong> <?php echo $temp_max ?> °C <br>
                   <?php echo $desc ?>
                </h2>
            </div>
        
    </div>

    </div>
    
</body>
</html>
