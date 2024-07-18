<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ai1_lab4";

try 
{
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Pobrać zawartość tabeli questions
    $sql = "SELECT * FROM questions";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    // Wynik zapytania zostanie zapisany w zmiennej $questions
    $questions = $stmt->fetchAll(PDO::FETCH_ASSOC);
} 
catch (PDOException $e) 
{
    echo "Fail: " . $e->getMessage();
}
?>

<!doctype html>
<html lang="pl" data-bs-theme="">

<head>
    <link rel="icon" href="data:;base64,iVBORw0KGgo=">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Zadanie 8</title>
    <link href="css/bootstrap.css" rel="stylesheet">
</head>

<body>
    <div id="inne" class="container mt-5 mb-3">
        <div class="row d-flex justify-content-center">
            <div class="col-sm-12 col-md-8">
                <h2>Zapytania o ofertę</h2>

                <!-- Wygenerować tabelkę HTML zawierającą wcześniej pobrane dane -->
                <table class="table table-hover table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Adres email</th>
                            <th scope="col">Rodzaj oferty</th>
                            <th scope="col">Budżet</th>
                            <th scope="col">Komentarz</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($questions as $question) : ?>
                            <tr>
                                <th scope="row"><?php echo htmlspecialchars($question['id']); ?></th>
                                <td><?php echo htmlspecialchars($question['email']); ?></td>
                                <td><?php echo htmlspecialchars($question['offer_type']); ?></td>
                                <td><?php echo htmlspecialchars($question['budget']); ?> PLN</td>
                                <td><?php echo htmlspecialchars($question['comment']); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <!-- Koniec generowanej tabelki -->

            </div>
        </div>
        <script src="js/bootstrap.bundle.js"></script>
</body>

</html>