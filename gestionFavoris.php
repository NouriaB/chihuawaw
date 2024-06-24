<?php
include "BDDconnexion.php";

if (isset($_POST['id_produit']) && isset($_POST['action'])) {
    $id_produit = $_POST['id_produit'];
    $id_client = $_SESSION['id_client'];
    $action = $_POST['action'];

    if ($action === 'add') {
        $query = "INSERT INTO favori (id_client, id_produit) VALUES ('$id_client', '$id_produit')";
        mysqli_query($id, $query);
        echo 'favori_added';
    } elseif ($action === 'remove') {
        $query = "DELETE FROM favori WHERE id_client = '$id_client' AND id_produit = '$id_produit'";
        mysqli_query($id, $query);
        echo 'favori_removed';
    }
}
?>

<!-- Script JS pour la gestion des favoris -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
    $(document).ready(function() {
        $('.iconeFavori').click(function() {
            var idProduit = $(this).data('idproduit');
            var action = $(this).hasClass('favori_rempli') ? 'remove' : 'add';

            $.ajax({
                url: 'gestionFavoris.php',
                method: 'POST',
                data: { id_produit: idProduit, action: action },
                success: function(response) {
                    if (action === 'add') {
                        $('.iconeFavori[data-idproduit="' + idProduit + '"]').attr('src', 'images/favori_rempli.png');
                        $('.iconeFavori[data-idproduit="' + idProduit + '"]').addClass('favori_rempli');
                    } else if (action === 'remove') {
                        $('.iconeFavori[data-idproduit="' + idProduit + '"]').attr('src', 'images/favori_vide.png');
                        $('.iconeFavori[data-idproduit="' + idProduit + '"]').removeClass('favori_rempli');
                    }
                }
            });
        });
    });
    </script>