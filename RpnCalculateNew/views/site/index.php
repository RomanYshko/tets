
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>RPN calculating</title>
    <link rel="stylesheet" type="text/css" href="/template/css/reset.css">
    <link rel="stylesheet" type="text/css" href="/template/css/style.css">
</head>
<body>
<div class="wrapper">
    <?php
    if($error){
        echo '<p>' . $error . '</p>';
    }
    ?>

    <form action="index.php" method="post">
        <label for="phrase">Выражение:</label>
        <input class="input" type="text" placeholder="Пример: '7 2 3 * -'" name="string" id="phrase" >
        <input class="button" type="submit" name="submit" value="Отправить">
    </form>
    <span>Ответ: <?= $result ?></span>
</div>
</body>
</html>