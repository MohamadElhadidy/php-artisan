<?php 
var_dump($_SERVER);
if($_SERVER['REQUEST_METHOD'] == "POST"){
    $num1 = $_REQUEST['num1'] ?? 0;
    $num2 = $_REQUEST['num2'] ?? 0;
    $operation = $_REQUEST['operation'];
    $result = 0;

    // Validate inputs
    if(!is_numeric($num1) || !is_numeric($num2)){
        $result = "Both inputs must be numbers";
    } else {
    
    // switch($operation):
    //     case 'add':
    //         $result = $num1 + $num2;
    //         break;
    //     case 'subtract':
    //         $result = $num1 - $num2;
    //         break;
    //     case 'multiply':
    //         $result = $num1 * $num2;
    //         break;
    //     case 'divide':
    //         if($num2 != 0){
    //             $result = $num1 / $num2;
    //         } else {
    //             $errors = "Cannot divide by zero";
    //         }
    //         break;
    //     default:
    //         $errors = "Invalid operation";
    //         break;
    //     endswitch;

      $result =  match ($operation) {
            'add' => $num1 + $num2,
            'subtract'=> $num1 - $num2,
            'multiply' => $num1 * $num2,
            'divide' => $num2 !=0 ? $num1 / $num2 :"Cannot divide by zero",
            default => "Invalid operation"
        };


        if(is_float($result)){
            $result = round($result, 2);
        }
    }

    if(is_numeric($result)){
        header("Location: index.php?num1=$num1&num2=$num2&operation=$operation&result=$result");
        exit();
    } else {
        header("Location: index.php?num1=$num1&num2=$num2&operation=$operation&error=$result");
        exit();
    }
}



