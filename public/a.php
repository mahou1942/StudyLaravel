<?php



$n = 5;

for ($i = 1 ; $i <= $n ;$i++){
    for ($j = 1 ; $j <= $i ; $j++){
        echo "*";
    }
    echo "<br />";
}


//for ($i = 1 ; $i <= $n ;$i++){
//    for ($j = 1 ; $j <= $n - $i ; $j++){
//        echo "&nbsp";
//    }
//    for ($x = 1 ;$x <= ($i-1)*2+1 ; $x ++ ){
//        echo "*";
//    }
//    echo "<br />";
//}
$n = array();
$x = 0;
for ($i =1 ; $i <= 30 ; $i++){
    $x ++ ;
    if($i % 2 == 0){
        $int = $i * (-1);

        $n[] = $i * (-1);
    }else{
        if($i == 1){
            $int = $i;
            $n[] = $i;
        }else{
            $int = "+" . $i;
            $n[] = "+" . $i;
        }

    }
}

$Sum = array_sum($n);

echo $Sum . " = " . implode(" " , $n);

//print_r(array_sum($n));

