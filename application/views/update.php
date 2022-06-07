
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

    <title>Update</title>
  </head>
  <body>
    <div class="container">
        <h1>UPDATE</h1>
        <p><?=  get_name() ?></p>
        <p><?=  base_url() ?></p>
    </div>


    <div class="container">

        <form action="<?=  base_url() ?>update/update_ready" method="post">
            <div class="form-group">
                <label for="formGroupExampleInput">idLibro</label>
                <input type="text" value="<?= $allitems->idLibro ?>" class="form-control" name="idLibro" id="formGroupExampleInput" placeholder="Example input placeholder">
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput">ISBN</label>
                <input type="text" value="<?= $allitems->ISBN ?>" class="form-control" name="ISBN" id="formGroupExampleInput" placeholder="Example input placeholder">
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput2">Titulo</label>
                <input type="text" value="<?= $allitems->Titulo ?>" class="form-control" name="Titulo" id="formGroupExampleInput2" placeholder="Another input placeholder">
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput2">NumeroEjemplares</label>
                <input type="text" value="<?= $allitems->NumeroEjemplares ?>" class="form-control" name="NumeroEjemplares" id="formGroupExampleInput2" placeholder="Another input placeholder">
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput2">NombreAutor</label>
                <input type="text" value="<?= $allitems->NombreAutor ?>" class="form-control" name="NombreAutor" id="formGroupExampleInput2" placeholder="Another input placeholder">
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput2">NombreEditorial</label>
                <input type="text" value="<?= $allitems->NombreEditorial ?>" class="form-control" name="NombreEditorial" id="formGroupExampleInput2" placeholder="Another input placeholder">
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput2">NombreTema</label>
                <input type="text" value="<?= $allitems->NombreTema ?>" class="form-control" name="NombreTema" id="formGroupExampleInput2" placeholder="Another input placeholder">
            </div>
            <div class="form-group">
                <input type="submit" value="update">
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

