<?php
include('connect.php');

// Ajouter un utilisateur
if (isset($_POST['add_user'])) {
    $nom = $_POST['nom_user'];
    $prenom = $_POST['prenom_user'];
    $telephone = $_POST['telephone'];
    $adresse = $_POST['adresse'];
    $cp = $_POST['cp'];
    $email = $_POST['email'];
    $motdepasse = $_POST['motdepasse'];

    $sql = "INSERT INTO utilisateur (nom_user, prenom_user, telephone, adresse, cp, email, motdepasse) VALUES ('$nom', '$prenom', '$telephone', '$adresse', '$cp', '$email', '$motdepasse')";
    $con->query($sql);
}

// Supprimer un utilisateur
if (isset($_GET['delete_user'])) {
    $id = $_GET['delete_user'];
    $sql = "DELETE FROM utilisateur WHERE id_user=$id";
    $con->query($sql);
}

// Modifier un utilisateur
if (isset($_POST['edit_user'])) {
    $id = $_POST['id_user'];
    $nom = $_POST['nom_user'];
    $prenom = $_POST['prenom_user'];
    $telephone = $_POST['telephone'];
    $adresse = $_POST['adresse'];
    $cp = $_POST['cp'];
    $email = $_POST['email'];
    $motdepasse = $_POST['motdepasse'];

    $sql = "UPDATE utilisateur SET nom_user='$nom', prenom_user='$prenom', telephone='$telephone', adresse='$adresse', cp='$cp', email='$email', motdepasse='$motdepasse' WHERE id_user=$id";
    $con->query($sql);
}

// Récupérer tous les utilisateurs
$sql = "SELECT * FROM utilisateur";
$result = $con->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Utilisateurs</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Gestion des Utilisateurs</h1>
        <form action="manage_users.php" method="POST">
            <input type="hidden" name="id_user" id="id_user">
            <input type="text" name="nom_user" id="nom_user" placeholder="Nom" required>
            <input type="text" name="prenom_user" id="prenom_user" placeholder="Prénom" required>
            <input type="text" name="telephone" id="telephone" placeholder="Téléphone" required>
            <input type="text" name="adresse" id="adresse" placeholder="Adresse" required>
            <input type="text" name="cp" id="cp" placeholder="Code Postal" required>
            <input type="email" name="email" id="email" placeholder="Email" required>
            <input type="password" name="motdepasse" id="motdepasse" placeholder="Mot de Passe" required>
            <button type="submit" name="add_user" id="add_user_btn">Ajouter</button>
            <button type="submit" name="edit_user" id="edit_user_btn" style="display: none;">Modifier</button>
        </form>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Téléphone</th>
                    <th>Adresse</th>
                    <th>Code Postal</th>
                    <th>Email</th>
                    <th>Mot de Passe</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $row['id_user']; ?></td>
                        <td><?php echo $row['nom_user']; ?></td>
                        <td><?php echo $row['prenom_user']; ?></td>
                        <td><?php echo $row['telephone']; ?></td>
                        <td><?php echo $row['adresse']; ?></td>
                        <td><?php echo $row['cp']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['motdepasse']; ?></td>
                        <td>
                            <button onclick="editUser(<?php echo $row['id_user']; ?>, '<?php echo $row['nom_user']; ?>', '<?php echo $row['prenom_user']; ?>', '<?php echo $row['telephone']; ?>', '<?php echo $row['adresse']; ?>', '<?php echo $row['cp']; ?>', '<?php echo $row['email']; ?>', '<?php echo $row['motdepasse']; ?>')">Modifier</button>
                            <a href="manage_users.php?delete_user=<?php echo $row['id_user']; ?>" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?');">Supprimer</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <script>
        function editUser(id, nom, prenom, telephone, adresse, cp, email, motdepasse) {
            document.getElementById('id_user').value = id;
            document.getElementById('nom_user').value = nom;
            document.getElementById('prenom_user').value = prenom;
            document.getElementById('telephone').value = telephone;
            document.getElementById('adresse').value = adresse;
            document.getElementById('cp').value = cp;
            document.getElementById('email').value = email;
            document.getElementById('motdepasse').value = motdepasse;
            document.getElementById('add_user_btn').style.display = 'none';
            document.getElementById('edit_user_btn').style.display = 'block';
        }
    </script>
</body>
</html>
