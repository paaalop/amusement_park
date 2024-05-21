<!DOCTYPE html>
<?php
$link = mysqli_connect("localhost", 'root', '', 'park');
?>
<html>
    <head>
        <meta charset="utf-8">
        <style>
            table, th, td{
                text-align : center;
                border : 1px solid #ccc;
                border-collapse : collapse;
                margin : 0 auto;
            }
            div{
            }
        </style>
    </head>
    <body>
        <form action="park.php" method="POST">
        <table>
        <div style="text-align : center;">
            고객 성명 : <input type="text" name="name">
            <input type="submit" name="submit" value="예매">
            <input type="submit" name="check" value="조회">
        </div>
        <br>
        <thead>
            <tr>
                <th>No</th>
                <th width=150px>구분</th>
                <th width=150px colspan="2">어린이</th>
                <th width=150px colspan="2">어른</th>
                <th width=150px>비고</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>입장권</td>
                <td>7,000</td>
                <td>
                    <select name="kid1">
                        <option value="0" selected>0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                </td>
                <td>10,000</td>
                <td>
                    <select name="adult1">
                        <option value="0" selected>0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                </td>
                <td>입장</td>
            </tr>

            <tr>
                <td>2</td>
                <td>BIG3</td>
                <td>12,000</td>
                <td>
                    <select name="kid2">
                        <option value="0" selected>0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                </td>
                <td>16,000</td>
                <td>
                    <select name="adult2">
                        <option value="0" selected>0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                </td>
                <td>입장+놀이3종</td>
            </tr>

            <tr>
                <td>3</td>
                <td>자유이용권</td>
                <td>21,000</td>
                <td>
                    <select name="kid3">
                        <option value="0" selected>0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                </td>
                <td>26,000</td>
                <td>
                    <select name="adult3">
                        <option value="0" selected>0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                </td>
                <td>입장+놀이자유</td>
            </tr>

            <tr>
                <td>4</td>
                <td>연간이용권</td>
                <td>70,000</td>
                <td>
                    <select name="kid4">
                        <option value="0" selected>0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                </td>
                <td>90,000</td>
                <td>
                    <select name="adult4">
                        <option value="0" selected>0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                </td>
                <td>입장+놀이자유</td>
            </tr>
        </tbody>
        </table>
        </form>

        <?php
        if(isset($_POST['name']) && strlen($_POST['name']) > 0){
            $name = $_POST["name"];

            if(isset($_POST['submit']) && $_POST['submit'] == '예매'){
                $kid1 = $_POST["kid1"];
                $kid2 = $_POST["kid2"];
                $kid3 = $_POST["kid3"];
                $kid4 = $_POST["kid4"];

                $adult1 = $_POST["adult1"];
                $adult2 = $_POST["adult2"];
                $adult3 = $_POST["adult3"];
                $adult4 = $_POST["adult4"];

                $sum = $kid1 * 7000 + $kid2 * 12000 + $kid3 * 21000 + $kid4 * 70000 + 
                        $adult1 * 10000 + $adult2 * 16000 + $adult3 * 26000 + $adult4 * 90000;
                $sql = "INSERT INTO tickets ".
                "VALUES ('$name', '$kid1', '$adult1', '$kid2', '$adult2', '$kid3', '$adult3', '$kid4', '$adult4', '$sum')";
            
                mysqli_query($link, $sql);
            }

            else if(isset($_POST['check']) && $_POST['check'] == '조회'){
                
                $query = "SELECT * FROM tickets WHERE name = '$name'";

                $result = mysqli_query($link, $query);

                while($line = mysqli_fetch_array($result)){
                    echo '<p style="border:1px solid black; text-align:center; width:40%; margin-left:30%;">';

                    date_default_timezone_set('Asia/Seoul');
                    echo date('Y')."년 ".date('m')."월 ".date("d")."일 ".date('H:i')."분<br>";
                    echo $name."고객님 감사합니다.<br>";
                    if($line[1] > 0)
                        echo "어린이 입장권 ".$line[1]."매<br>";
                    if($line[2] > 0)
                        echo "어른 입장권 ".$line[2]."매<br>";
                    if($line[3] > 0)
                        echo "어린이 BIG3 ".$line[3]."매<br>";
                    if($line[4] > 0)
                        echo "어른 BIG3 ".$line[4]."매<br>";
                    if($line[5] > 0)
                        echo "어린이 자유이용권 ".$line[5]."매<br>";
                    if($line[6] > 0)
                        echo "어른 자유이용권 ".$line[6]."매<br>";
                    if($line[7] > 0)
                        echo "어린이 연간이용권 ".$line[7]."매<br>";
                    if($line[8] > 0)
                        echo "어른 연간이용권 ".$line[8]."매<br>";
                    
                    echo "합계 ".$line[9]."원 입니다.<br>";
                    echo "</p>";

                }
            }
        }
        ?>
    </body>
</html>