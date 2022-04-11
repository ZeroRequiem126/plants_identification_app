<?php
    session_start();
    require('../assets/templates/library.php');

    date_default_timezone_set('Asia/Tokyo');
    
    if(isset($_GET['ym'])) { 
        $ym = $_GET['ym'];
    } else {
        $ym = date('Y-m');
    }
    
    $timestamp = strtotime($ym . '-01'); 
    if($timestamp === false) {
        $ym = date('Y-m');
        $timestamp = strtotime($ym . '-01');
    }
    
    $today = date('Y-m-j');
    
    $html_title = date('Y年n月', $timestamp);
    
    $prev = date('Y-m', strtotime('-1 month', $timestamp));
    $next = date('Y-m', strtotime('+1 month', $timestamp));
    
    $day_count = date('t', $timestamp);
    
    $youbi = date('w', $timestamp);
    
    $weeks = [];
    $week = '';
    
    $week .= str_repeat('<td></td>', $youbi);

    function get_harvest_rec() {
        $PDO = dbconnect();
        $stmt = "SELECT * FROM calenders INNER JOIN trees ON calenders.tree_id = trees.id WHERE calenders.user_id = '".$_SESSION['login']."'";
        $sql = $PDO->query($stmt);
        $harvest_record = array();
        foreach($sql as $row) {
            $harvest_date = strtotime((string) $row['date']);
            $harvest_name = (string) $row['name'];
            $harvest_record[date('Y-m-d', $harvest_date)] = $harvest_name;
        }
        ksort($harvest_record);
        return $harvest_record;
    }

    $harvest_rec_array = get_harvest_rec();

    function harvest($date,$harvest_rec_array) {
        if(array_key_exists($date,$harvest_rec_array)) {
            $harvest_record = '<br/>' . '<span style="color: green !important; font-weight: bold;">'. $harvest_rec_array[$date] .'</span>';
            return $harvest_record;
        }
    }

    for($day = 1; $day <= $day_count; $day++, $youbi++){
        $date = $ym . '-' . $day; 
        $harvest = harvest(date("Y-m-d",strtotime($date)),$harvest_rec_array);
        $date = $ym . '-' . $day; 

        if($today == $date) {
            $week .= '<td class="today">' . $day;
        } elseif(harvest(date("Y-m-d",strtotime($date)),$harvest_rec_array)) {
            $week .= '<td>' . $day . $harvest;
        } else {
            $week .= '<td>' . $day;
        }
        $week .= '</td>';
        
        
        if($youbi % 7 == 6 || $day == $day_count) {
            
            if($day == $day_count) {
                $week .= str_repeat('<td></td>', 6 - ($youbi % 7));
            }
            
            $weeks[] = '<tr>' . $week . '</tr>';
            
            $week = '';//weekをリセット
        }
    }
    
?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="../assets/style/style.css?">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>カレンダー</title>
</head>


<body>

<?php include("../assets/templates/header.html"); ?>

<div class="calender-page">
    <div class="container">
        <div class="calender">
            <h3><a href="?ym=<?php echo $prev; ?>">&laquo; </a><?php echo $html_title; ?><a href="?ym=<?php echo $next; ?>"> &raquo;</a></h3>
            <table class="table table-bordered">
                <tr>
                    <th>日</th>
                    <th>月</th>
                    <th>火</th>
                    <th>水</th>
                    <th>木</th>
                    <th>金</th>
                    <th>土</th>
                </tr>
                <?php
                    foreach ($weeks as $week) {
                        echo $week;
                    }
                ?>
            </table>
            <div class="record-button"><a href="../calender/calender_post.php" class="btn btn-lg btn-primary">収穫を記録</a></div>
        </div>
    </div>
</div>

<?php include("../assets/templates/footer.html"); ?>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="crossorigin="anonymous"></script>
<script src="../assets/js/main.js"></script>
</body>
</html>