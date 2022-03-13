<div class="container">

    <?php 
    

    if (isset($result)) {
        // echo $result;
        if ($result === true) {
            // var_dump($_SESSION['user']);
            // echo "Login succeed !";
            header("Location: http://" . $_SERVER['HTTP_HOST'] . WORK_DIRECTORY . "/home");
            /* var_dump($_SERVER['HTTP_HOST']);
            var_dump($_SERVER['REQUEST_URI']); */
        } else if ($result === 300 || $result === 403) {
            echo "Email or password not correct !";
        } else {
            echo "Veuillez maintenant vous connectez !";
        }

        
    } 

    ?>

    <h2 class="mt-4 mb-4">
        Login form    
    </h2>
    <form action="<?= WORK_DIRECTORY ?>/login" method="POST">        
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