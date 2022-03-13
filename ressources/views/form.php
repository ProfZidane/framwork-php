<div class="container">
    <h1>
        Mon formulaire d'auth
    </h1>
    
    
    <?php 
        

        if (isset($result)) {
            if ($result) {
                echo "
                <div class='alert alert-success'>
                    Votre enregistrement a été un succès
                </div>
                ";
            } 
        }

    ?>

    <form action="<?= WORK_DIRECTORY ?>/register" method="POST">
        <div class="form-group">
            <label for="exampleInputEmail1">Names</label>
            <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">            
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">            
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
        </div>


        
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

</div>