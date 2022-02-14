<div class="container m-5">
    <h1>
        Créé un utilisateur
    </h1>

    <?php if (!empty($result)): ?>
    <div class="alert alert-success">
        <?=  $result ?>
    </div>
    <?php endif; ?>

    
    <div class="container">
        <form class="m-4" action="<?= WORK_DIRECTORY ?>/createUser" method="POST">            

            <div class="form-group">
                <label for="exampleInputEmail1">Nom d'utilisateur</label>
                <input type="text" name="userName" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Entrer votre nom">        
            </div>
            
            <button type="submit" class="btn btn-primary">Envoyer</button>

        </form>
    </div>
</div>