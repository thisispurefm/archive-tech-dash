<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="30">
    <title>PureFM Tech Stats</title>
    <link rel="stylesheet" href="../base-style.css">
</head>
<body>
<h1>PureFM Tech Stats</h1>
<table>
<colgroup>
        <col span="1" style="width: 75%;">
        <col span="1" style="width: 25%;">
    </colgroup>
    <tr>
        <th>Spec</th>
        <th>Stat</th>
    </tr>   
<?php
$filepath = "http://solid2.streamupsolutions.com:11161/stats";
$response = simplexml_load_file($filepath);
// print_r($response);

foreach($response->children() as $child){
    echo "<tr>\n";
    echo "<td>" . strtolower($child->getName()) . "</td>\n";
    echo "<td>" . $child . "</td>\n";
    echo "</tr>\n";
}
?>
</table>
</body>
</html>

