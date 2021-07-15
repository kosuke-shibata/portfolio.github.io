<?php
function h($string) {
    return htmlspecialchars($string, ENT_QUOTES, 'UTF-8');
}

$errors = [];
$lines = [];
$reversed = [];

define('FILE_PATH', 'bbs.txt');

$name = '';
$comment = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    if (isset($_POST['name']) === true) {
        $name = $_POST['name'];
    }
    
    if (isset($_POST['comment']) === true) {
        $comment = $_POST['comment'];
    }
    
    
    
    $fp = fopen(FILE_PATH, 'a');
    if ($fp !== false) {
        // $pattern = '/ {2,}/';
        
        if (mb_strlen($name) > 20) {
            $errors[] = '・名前は20文字以内で入力してください';
        }
        
        if (mb_strlen($comment) > 100) {
            $errors[] = '・ひとことは100文字以内で入力してください';
        }
        
        if ($name === '' || substr($name, 0, 1) === ' ') {
            $errors[] = '・名前を入力してください';
        }
        
        if ($comment === '' || substr($comment, 0, 1) === ' ') {
            $errors[] = '・ひとことを入力してください';
        }
        
        if (count($errors) === 0) {
            $log = $name . ':' . "\t" . $comment.date('-Y-m-d H:i:s')."\n";
            $result = fwrite($fp, $log);
            
            if ($result === false) {
                $errors[] = 'ファイル書き込み失敗:' . $filename;
            }
            header('Location: bbs.php');
            exit;
        }
        fclose($fp);
    }
}

if (is_readable(FILE_PATH) === true) {
    
    $fp = fopen(FILE_PATH, 'r');
    if ($fp !== false) {
        $text = fgets($fp);
        
        while ($text !== false) {
            $lines[] = $text;
            $text = fgets($fp);
        }
        $reversed = array_reverse($lines);
        
        fclose($fp);
    }
} else {
    $errors[] = 'ファイルがありません';
}

?>

<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>ひとこと掲示板</title>
        <style>
            #comment {
                width: 55%;
            }
        </style>
    </head>
    <body>
        <h1>ひとこと掲示板</h1>
        <?php foreach ($errors as $error) { ?>
            <p><?php print h($error); ?></p>
        <?php } ?>
        <form method="post">
            <label>名前 : <input type="text" name="name"/></label>
            <lebel>ひとこと : <input type="text" name="comment" id="comment"></lebel>
            <input type="submit" value="送信"/>
        </form>
        <?php foreach ($reversed as $line) { ?>
            <p>・<?php print h($line); ?></p>
        <?php } ?>
    </body>
</html>
