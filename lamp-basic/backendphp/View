<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
</head>

<body>
  <div class="container">

  <div class="sair">
      <form action="index.php" method="post" enctype="multipart/form-data">
        <div class="form-group row">
          <input type="hidden" name="action" value="sair">
        <button type="submit" class="btn btn-primary">Sair (clear session)</button>
      </form>
      <br><br>
    </div>

    <div class="create">
      <h3>CREATE</h3>
      <form action="index.php" method="post" enctype="multipart/form-data">
        <div class="form-group row">
          <input type="hidden" name="action" value="create">
          <div class="col-md-6">
            <label for="nome"></label>
            <input type="text" class="form-control" name="email" aria-describedby="e-mail" placeholder="e-mail">
          </div>
          <div class="col-md-6">
            <label for="senha"></label>
            <input type="password" class="form-control" name="senha" aria-describedby="senha" placeholder="senha">
          </div>
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
      </form>
      <br><br>
    </div>

    <div class="read">
      <h3>READ</h3>
      <form action="index.php" method="post" enctype="multipart/form-data">
        <div class="form-group row">
          <input type="hidden" name="action" value="read">
          <div class="col-md-6">
            <label for="nome"></label>
            <input type="text" class="form-control" name="email" aria-describedby="e-mail" placeholder="e-mail">
          </div>
          <div class="col-md-6">
            <label for="senha"></label>
            <input type="password" class="form-control" name="senha" aria-describedby="senha" placeholder="senha">
          </div>
        </div>
        <button type="submit" class="btn btn-primary">Read</button>
      </form>
      <br><br>
    </div>

    <div class="read">
      <h3>UPDATE</h3>
      <form action="index.php" method="post" enctype="multipart/form-data">
        <div class="form-group row">
          <input type="hidden" name="action" value="update">
          <div class="col-md-6">
            <label for="nome"></label>
            <input type="text" class="form-control" name="email" aria-describedby="e-mail" placeholder="e-mail">
          </div>
          <div class="col-md-6">
            <label for="senha"></label>
            <input type="password" class="form-control" name="senha" aria-describedby="senha antiga" placeholder="senha antiga">
          </div>
          <div class="col-md-6">
            <label for="senha-nova"></label>
            <input type="password" class="form-control" name="senha-nova" aria-describedby="senha-nova" placeholder="senha nova">
          </div>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
      </form>
      <br><br>
    </div>

    <div class="delete">
      <h3>DELETE</h3>
      <form action="index.php" method="post" enctype="multipart/form-data">
        <div class="form-group row">
          <input type="hidden" name="action" value="delete">
          <div class="col-md-6">
            <label for="nome"></label>
            <input type="text" class="form-control" name="email" aria-describedby="e-mail" placeholder="e-mail">
          </div>
          <div class="col-md-6">
            <label for="senha"></label>
            <input type="password" class="form-control" name="senha" aria-describedby="senha" placeholder="senha">
          </div>
        </div>
        <button type="submit" class="btn btn-primary">Delete</button>
      </form>
      <br><br>
    </div>
 </div>

  <div class="container">
    <div class="col-md-12 row">
      <?php
        if (!empty($_SESSION)) :
          //echo "<pre>";print_r($_SESSION);echo "</pre>";
          foreach ($_SESSION as $key => $value) :
            $usuario = unserialize($_SESSION[$key], ["allowed_classes" => ["UsuarioClass"]]);
      ?>
                <div class="col-sm-12">
                  <div class="card">
                    <div class="card-body text-center">
                      <p class="card-text text-left"><?php echo "Usuário " . $usuario->email ?></p>
                    </div>
                  </div>
                </div>
      <?php
        endforeach;
      endif;
      ?>

    </div>
  </div>
  </div>
</body>
</html>
