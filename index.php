<?php 

    require("functions.php");
    
    $apple = 5;
    $hello = "Hello World!";
    $birthday = 18;
    if($birthday >= 18){
        echo "Not allowed to entet";
    }else{
        echo "allowed to enter";
    }

    echo "<br/>";

    $day = 1;
    switch($day){
        case 1: 
            echo "Monday"; break;
        case 2:
            echo "Tueday"; break;
        case 3: 
            echo "Weday"; break;
        default: 
            echo "No date";
    }

    echo "<br/>";

    if($day == 1){
        echo "Monday for if statement";
    }elseif($day == 2){
        echo "Tueday for if";
    }elseif($day == 3){
        echo "Weday for if";
    }else{
        echo "No date";
    }

    echo "<br/>";

    $fruits = ["apple","Mango","Orange"];

    echo "<pre>";
    var_dump($fruits);
    echo "</pre>";

    for($i=0 ; $i<5 ; $i++){
        echo $i;
    }

    $persons = [
        [
            "name" => "Aye Aye",
            "age"=> "30"
        ],
        [
            "name"=>"Mya Mya",
            "age"=>"20"
        ]
    ];

    echo "<pre>";
    var_dump($persons);
    echo "</pre>";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <ul>
        <?php 
            for($i=0; $i < count($fruits); $i++){
                // echo "<li>".$fruits[$i]."</li>;
            }
        ?>
    </ul>
    <br>
    <div>
        <?php
            $i = 0;
            while($i < count($fruits)){
                echo $fruits[$i];
                $i++;
                echo "<br/>";
            }
        ?>
    </div>
    <br>
    <!-- foreach loop -->
    <div>
        <?php
            foreach($persons as $person){
                echo $person["name"];
                echo $person["age"];
                echo "<br/>";
            }
        ?>
    </div>
    <?php 
        echo "<h1>" .$hello ."</h1>" ;
    ?>

    <div>
        <?php
            $roll = rand(1,6);
            echo "<h1>"."Your roll = ".$roll."</h1>";
            if($roll == 6){
                echo "<h1>"."You win!"."</h1>";
            }else{
                echo "<h1>"."Try Again..."."</h1>";
            }
        ?>
    </div>
    <h1><?= $hello ; ?></h1>

</body>

</html>