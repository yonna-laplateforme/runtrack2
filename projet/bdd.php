 <?php



    $servername = "localhost";
    $username   = "root";
    $password   = "root";
    $dbname     = "livreor";

    try {
        $conn = new mysqli($servername, $username, $password, $dbname);
        $conn->set_charset("utf8mb4");

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $login = trim($_POST['login'] ?? '');
            $premier_password = trim($_POST['password'] ?? '');
            $password_confirm = trim($_POST['password_confirm'] ?? '');

            // Validation
            if (empty($login) || empty($premier_password) || empty($password_confirm)) {
                throw new Exception(" Tous les champs sont requis.");
            }
            if ($premier_password !== $password_confirm) {
                throw new Exception("Les mots de passe ne correspondent pas.");
            }

            // Hashage du mot de passe
            $hashed_password = password_hash($premier_password, PASSWORD_DEFAULT);

            // Préparation de la requête
            $stmt = $conn->prepare("INSERT INTO utilisateurs (login, password) VALUES (?, ?)");
            $stmt->bind_param("ss", $login, $hashed_password);
            $stmt->execute();

            // Message flash et redirection
            $_SESSION['message'] = " Inscription réussie !";
            header("Location: connexion.php");
            exit;
        }
    } catch (mysqli_sql_exception $e) {
        $_SESSION['message'] = "Erreur MySQL : " . $e->getMessage();
        header("Location: inscription.php");
        exit;
    } catch (Exception $e) {
        $_SESSION['message'] = $e->getMessage();
        header("Location: inscription.php");
        exit;
    }
    ?>