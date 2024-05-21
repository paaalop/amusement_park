<html>
    <body>
        <?php
            $kid1 = $_POST["kid1"];
            $kid2 = $_POST["kid2"];
            $kid3 = $_POST["kid3"];
            $kid4 = $_POST["kid4"];

            $adult1 = $_POST["adult1"];
            $adult2 = $_POST["adult2"];
            $adult3 = $_POST["adult3"];
            $adult4 = $_POST["adult4"];

            $sum = $kid1 + $kid2 + $kid3 + $kid4 + $adult1 + $adult2 + $adult3 + $adult4;
            $sql = "INSERT INTO 'tickets'".
            "VALUES ('', '$kid1', '$adult1', '$kid2', '$adult2', '$kid3', '$adult3', '$kid4', '$adult4', '$sum')";
        ?>
    </body>
</html>