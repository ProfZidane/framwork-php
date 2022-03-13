<?php
session_start();
//     var_dump($_SESSION['user']);

?>

<form action="<?= WORK_DIRECTORY ?>/logout" method="post">
    <button type="submit" class="btn btn-danger btn-sm">
        Déconnexion
    </button>
</form>
