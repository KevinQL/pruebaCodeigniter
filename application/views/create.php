
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

    <title>Create</title>
  </head>
  <body>
    <div class="container">
        <h1>CREATE</h1>
        <p><?=  get_name() ?></p>
        <p><?=  base_url() ?></p>
    </div>


    <div class="container">

        <form action="<?=  base_url() ?>welcome/create_ready" method="post">
            <div class="form-group">
                <label for="formGroupExampleInput">ISBN</label>
                <input type="text" class="form-control" name="ISBN" id="formGroupExampleInput" placeholder="Example input placeholder">
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput2">Titulo</label>
                <input type="text" class="form-control" name="Titulo" id="formGroupExampleInput2" placeholder="Another input placeholder">
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput2">NumeroEjemplares</label>
                <input type="text" class="form-control" name="NumeroEjemplares" id="formGroupExampleInput2" placeholder="Another input placeholder">
            </div>
 
    <div class="form-group">
      <label for="NombreAutor">NombreAutor</label>
      <select id="NombreAutor" name="NombreAutor" class="form-control">
        <!-- <option selected>Choose...</option> -->
        <?php foreach($allautor as $autor): ?>
        <option value="<?=$autor->idAutor?>"><?=$autor->NombreAutor?></option>
        <?php endforeach; ?>
      </select>
    </div>
    <div class="form-group">
      <label for="NombreEditorial">NombreEditorial</label>
      <select id="NombreEditorial" name="NombreEditorial" class="form-control">
        <!-- <option selected>Choose...</option> -->
        <?php foreach($alleditorial as $editorial): ?>
        <option value="<?=$editorial->idEditorial?>"><?=$editorial->NombreEditorial?></option>
        <?php endforeach; ?>
      </select>
    </div>
    <div class="form-group">
      <label for="NombreTema">NombreTema</label>
      <select id="NombreTema" name="NombreTema"  class="form-control">
        <!-- <option selected>Choose...</option> -->
        <?php foreach($alltema as $tema): ?>
        <option value="<?=$tema->idTema?>"><?=$tema->NombreTema?></option>
        <?php endforeach; ?>
      </select>
    </div>
            <div class="form-group">
                <input type="submit" value="CREATE">
            </div>
        </form>

    </div>



    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
    -->
  </body>
</html>

