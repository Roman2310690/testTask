<?php
$result = require __DIR__ . '/calc.php';
?>
<html>
<head>
    <title>Bacteria</title>
</head>
<body>
<b>Number of bacteria:</b>
<br>
<?= $result ?>
</body>
</html>