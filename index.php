<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task 6</title>
</head>
<?php
echo "<link rel='stylesheet' href='css.css'>";


//константа хранит ссылку на API приватбанка
define("LINK", 'https://api.privatbank.ua/p24api/pubinfo?exchange&json&coursid=11');

//считываю данные
$data = file_get_contents(LINK);

//преобразовываю в формат json чтобы использовать данные как массив
$cources = json_decode($data, true);
//echo '<pre>'.print_r($cources, true).'</pre>';

if(isset($_GET['submit'])){
    $result=0;
    $value=0;

    $from = $_GET['from'];
    $to = $_GET['to'];
    $value = $_GET['value'];

//свитчами перебираю все возможные варианты конвертаций
   /* switch($from == 'USD'){
        case( $to == 'EUR'):
            $result = $value * $cources[0]['buy'] / $cources[1]['buy'];
            break;
        case( $to == 'RUR'):
            $result = $value * $cources[0]['buy'] / $cources[2]['buy'];
            break;
        case( $to == 'BTC'):
            $result = $value * $cources[0]['buy'] / $cources[3]['buy'];
            break;
        case( $to == 'UAH'):
            $result = $value * $cources[0]['buy'];
            break;
    }*/

    if($from == 'USD' && $to == 'EUR') $result = $value * $cources[0]['buy'] / $cources[1]['buy'];
    if($from == 'USD' && $to == 'RUR') $result = $value * $cources[0]['buy'] / $cources[2]['buy'];
    if($from == 'USD' && $to == 'BTC') $result = $value * $cources[0]['buy'] / $cources[3]['buy'];
    if($from == 'USD' && $to == 'UAH') $result = $value * $cources[0]['buy'];

    //if($result) echo $result. '<br>';

    /*switch($from == 'EUR'){
        case( $to == 'USD'):
            $result = $value * $cources[1]['buy'] / $cources[0]['buy'];
            break;
        case( $to == 'RUR'):
            $result = $value * $cources[1]['buy'] / $cources[2]['buy'];
            break;
        case( $to == 'BTC'):
            $result = $value * $cources[1]['buy'] / $cources[3]['buy'];
            break;
        case( $to == 'UAH'):
            $result = $value * $cources[1]['buy'];
            break;
    }*/

    if($from == 'EUR' && $to == 'USD') $result = $value * $cources[1]['buy'] / $cources[0]['buy'];
    if($from == 'EUR' && $to == 'RUR') $result = $value * $cources[1]['buy'] / $cources[2]['buy'];
    if($from == 'EUR' && $to == 'BTC') $result = $value * $cources[1]['buy'] / $cources[3]['buy'];
    if($from == 'EUR' && $to == 'UAH') $result = $value * $cources[1]['buy'];
/*
    //if($result) echo $result. '<br>';

    switch($from == 'RUR'){
        case( $to == 'USD'):
            $result = $value * $cources[2]['buy'] / $cources[0]['buy'];
            break;  
        case( $to == 'EUR'):
            $result = $value * $cources[2]['buy'] / $cources[1]['buy'];
            break;
        case( $to == 'BTC'):
            $result = $value * $cources[2]['buy'] / $cources[3]['buy'];
            break;
        case( $to == 'UAH'):
            $result = $value * $cources[2]['buy'];
            break;
    }*/

    if($from == 'RUR' && $to == 'USD') $result = $value * $cources[2]['buy'] / $cources[0]['buy'];
    if($from == 'RUR' && $to == 'EUR') $result = $value * $cources[2]['buy'] / $cources[1]['buy'];
    if($from == 'RUR' && $to == 'BTC') $result = $value * $cources[2]['buy'] / $cources[3]['buy'];
    if($from == 'RUR' && $to == 'UAH') $result = $value * $cources[2]['buy'];

    //if($result) echo $result. '<br>';

   /* switch($from == 'BTC'){
        case( $to == 'USD'):
            $result = $value * $cources[3]['buy'] / $cources[0]['buy'];
            break;
        case( $to == 'EUR'):
            $result = $value * $cources[3]['buy'] / $cources[1]['buy'];
            break;
        case( $to == 'RUR'):
            $result = $value * $cources[3]['buy'] / $cources[2]['buy'];
            break;
        case( $to == 'UAH'):
            $result = $value * $cources[3]['buy'];
            break;
    }*/

    
    if($from == 'BTC' && $to == 'USD') $result = $value * $cources[3]['buy'] / $cources[0]['buy'];
    if($from == 'BTC' && $to == 'EUR') $result = $value * $cources[3]['buy'] / $cources[1]['buy'];
    if($from == 'BTC' && $to == 'RUR') $result = $value * $cources[3]['buy'] / $cources[2]['buy'];
    if($from == 'BTC' && $to == 'UAH') $result = $value * $cources[3]['buy'];

    /*switch($from == 'UAH'){
        case( $to == 'USD'):
            $result = $value / $cources[0]['sale'];
            break;
        case( $to == 'EUR'):
            $result = $value / $cources[1]['sale'];
            break;
        case( $to == 'RUR'):
            $result = $value / $cources[2]['sale'];
            break;
        case( $to == 'BTC'):
            $result = $value / $cources[3]['sale'];
            break;
    }*/

    if($from == 'UAH' && $to == 'USD') $result = $value / $cources[0]['sale'];
    if($from == 'UAH' && $to == 'EUR') $result = $value / $cources[1]['sale'];
    if($from == 'UAH' && $to == 'RUR') $result = $value / $cources[2]['sale'];
    if($from == 'UAH' && $to == 'BTC') $result = $value / $cources[3]['sale'];
    
 }
 
?>
<body>
    <div class="container">
        <form action="">
            <h1>Online Converter</h1>
            <p>From: 
                <select name="from" id="from">
                    <option value="USD">USD</option>
                    <option value="EUR">EUR</option>
                    <option value="RUR">RUR</option>
                    <option value="BTC">BTC</option>
                    <option value="UAH">UAH</option>
                </select> </p>
                <input type="text" name="value" placeholder="Enter value">
                <p> to: 
                <select name="to" id="to">
                    <option value="USD">USD</option>
                    <option value="EUR">EUR</option>
                    <option value="RUR">RUR</option>
                    <option value="BTC">BTC</option>
                    <option value="UAH">UAH</option>
                </select></p>
                <input type="submit" name="submit">
               <p><?php echo '<br>'.$result;?></p>
        </form>
    </div>
</body>
</html>

