<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        if($output != ''){
            echo '<pre>'.$output.'</pre>';
        }
        ?>
        <form method="post" action="/TestPHP/index.php/testPHP/submit">
            <textarea cols="10" rows="50" name="codeToExecute"></textarea>
            <input type="submit" name="Submit" value="Submit"/>
        </form>
    </body>
</html>
