<?php
include('connect.php');

// Ajouter une commande
if (isset($_POST['add_order'])) {
    $date_cmd = $_POST['date_cmd'];
    $id_user = $_POST['id_user'];
    $note = $_POST['note'];
    $total = $_POST['total'];
    $livraison = $_POST['livraison'];
    $paiement = $_POST['paiement'];
    $statuscmd = $_POST['statuscmd'];

    $sql = "INSERT INTO commande (date_cmd, id_user, note, total, livraison, paiement, statuscmd) VALUES ('$date_cmd', '$id_user', '$note', '$total', '$livraison', '$paiement', '$statuscmd')";
    $con->query($sql);
}

// Supprimer une commande
if (isset($_GET['delete_order'])) {
    $id = $_GET['delete_order'];
    $sql = "DELETE FROM commande WHERE id_cmd=$id";
    $con->query($sql);
}

// Modifier une commande
if (isset($_POST['edit_order'])) {
    $id = $_POST['id_cmd'];
    $date_cmd = $_POST['date_cmd'];
    $id_user = $_POST['id_user'];
    $note = $_POST['note'];
    $total = $_POST['total'];
    $livraison = $_POST['livraison'];
    $paiement = $_POST['paiement'];
    $statuscmd = $_POST['statuscmd'];

    $sql = "UPDATE commande SET date_cmd='$date_cmd', id_user='$id_user', note='$note', total='$total', livraison='$livraison', paiement='$paiement', statuscmd='$statuscmd' WHERE id_cmd=$id";
    $con->query($sql);
}

// Récupérer toutes les commandes
$sql = "SELECT * FROM commande";
$result = $con->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Commandes</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Gestion des Commandes</h1>
        <form action="manage_orders.php" method="POST">
            <input type="hidden" name="id_cmd" id="id_cmd">
            <input type="date" name="date_cmd" id="date_cmd" placeholder="Date" required>
            <input type="number" name="id_user" id="id_user" placeholder="ID Utilisateur" required>
            <input type="text" name="note" id="note" placeholder="Note">
            <input type="number" name="total" id="total" placeholder="Total" required>
            <input type="text" name="livraison" id="livraison" placeholder="Livraison" required>
            <input type="text" name="paiement" id="paiement" placeholder="Paiement" required>
            <input type="text" name="statuscmd" id="statuscmd" placeholder="Statut" required>
            <button type="submit" name="add_order" id="add_order_btn">Ajouter</button>
            <button type="submit" name="edit_order" id="edit_order_btn" style="display: none;">Modifier</button>
        </form>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Date</th>
                    <th>ID Utilisateur</th>
                    <th>Note</th>
                    <th>Total</th>
                    <th>Livraison</th>
                    <th>Paiement</th>
                    <th>Statut</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $row['id_cmd']; ?></td>
                        <td><?php echo $row['date_cmd']; ?></td>
                        <td><?php echo $row['id_user']; ?></td>
                        <td><?php echo $row['note']; ?></td>
                        <td><?php echo $row['total']; ?></td>
                        <td><?php echo $row['livraison']; ?></td>
                        <td><?php echo $row['paiement']; ?></td>
                        <td><?php echo $row['statuscmd']; ?></td>
                        <td>
                            <button onclick="editOrder(<?php echo $row['id_cmd']; ?>, '<?php echo $row['date_cmd']; ?>', '<?php echo $row['id_user']; ?>', '<?php echo $row['note']; ?>', '<?php echo $row['total']; ?>', '<?php echo $row['livraison']; ?>', '<?php echo $row['paiement']; ?>', '<?php echo $row['statuscmd']; ?>')">Modifier</button>
                            <a href="manage_orders.php?delete_order=<?php echo $row['id_cmd']; ?>" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette commande ?');">Supprimer</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <script>
        function editOrder(id, date_cmd, id_user, note, total, livraison, paiement, statuscmd) {
            document.getElementById('id_cmd').value = id;
            document.getElementById('date_cmd').value = date_cmd;
            document.getElementById('id_user').value = id_user;
            document.getElementById('note').value = note;
            document.getElementById('total').value = total;
            document.getElementById('livraison').value = livraison;
            document.getElementById('paiement').value = paiement;
            document.getElementById('statuscmd').value = statuscmd;
            document.getElementById('add_order_btn').style.display = 'none';
            document.getElementById('edit_order_btn').style.display = 'block';
        }
    </script>
</body>
</html>
