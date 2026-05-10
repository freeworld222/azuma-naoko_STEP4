<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>申請内容確認</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h1>申請内容の確認</h1>

<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST["name"];
    $age = $_POST["age"];
    $tel = $_POST["tel"];
    $email = $_POST["email"];
    $address = $_POST["address"];
    $question = $_POST["question"];
    $gender = $_POST["gender"];

    // エラーを入れる配列
    $errors = [];

    // nameチェック
    if (
        empty($name) ||
        !preg_match("/^[ぁ-んァ-ヶー一-龠a-zA-Z\s]+$/u", $name)
    ) {
        $errors[] = "名前はひらがな、カタカナ、漢字、英字のみ使用できます。";
    }

    // ageチェック
    if (
        !is_numeric($age) ||
        $age < 0 ||
        $age > 150
    ) {
        $errors[] = "年齢は0から150の間で入力してください。";
    }

    // telチェック
    if (
        empty($tel) ||
        !preg_match("/^[0-9\-]+$/", $tel)
    ) {
        $errors[] = "電話番号は半角数字とハイフンのみ使用できます。";
    }

    // emailチェック
    if (
        empty($email) ||
        !filter_var($email, FILTER_VALIDATE_EMAIL)
    ) {
        $errors[] = "メールアドレスの形式が正しくありません。";
    }

    // addressチェック
    if (
        empty($address) ||
        !preg_match("/^[ぁ-んァ-ヶー一-龠a-zA-Z\s]+$/u", $address)
    ) {
        $errors[] = "住所はひらがな、カタカナ、漢字、英字のみ使用できます。";
    }

    // エラーがある場合
    if (!empty($errors)) {
        foreach ($errors as $error) {
            echo "<p>$error</p>";
        }
    } else {
        // 入力内容の表示
        echo "<p>名前: " . htmlspecialchars($name, ENT_QUOTES, 'UTF-8') . "</p>";
        echo "<p>年齢: " . htmlspecialchars($age, ENT_QUOTES, 'UTF-8') . "</p>";
        echo "<p>電話番号: " . htmlspecialchars($tel, ENT_QUOTES, 'UTF-8') . "</p>";
        echo "<p>メールアドレス: " . htmlspecialchars($email, ENT_QUOTES, 'UTF-8') . "</p>";
        echo "<p>住所: " . htmlspecialchars($address, ENT_QUOTES, 'UTF-8') . "</p>";
        echo "<p>質問: " . htmlspecialchars($question, ENT_QUOTES, 'UTF-8') . "</p>";
        echo "<p>性別: " . htmlspecialchars($gender, ENT_QUOTES, 'UTF-8') . "</p>";
    }
} else {
    echo "<p>データが送信されていません。</p>";
}
?>

</body>
</html>
