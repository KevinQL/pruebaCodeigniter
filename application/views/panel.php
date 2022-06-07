<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

    <title>Panel</title>
  </head>
  <body>
    <div class="container">
        <h1>PANEL CODEIGNITER</h1>
        <?= $appname; ?>
        <!-- <form action="http://localhost/prueba2022/librarysys/welcome/create" method="post">
            <input type="text" name="username">
            <input type="submit" value="enviar">
        </form> -->

        <p>
            <a href="http://localhost/prueba2022/librarysys/welcome/create" class="btn btn-primary " >add item</a>
        </p>
    </div>


    <div class="container">
        <input type="text" class="form-control w-50 my-3" placeholder="ingrese código ISBN" >
        <table class="table">
          <thead>
            <tr>
                <th scope="col">#</th>
              <th scope="col">ISBN</th>
              <th scope="col">Titulo</th>
              <th scope="col">NumeroEjemplares</th>
              <th scope="col">NombreAutor</th>
              <th scope="col">NombreEditorial</th>
              <th scope="col">NombreTema</th>
              <th scope="col">Actions</th>
            </tr>
          </thead>
          <tbody>
            <!-- <?php var_dump($allitems); ?> -->
            <?php foreach($allitems as $item): ?>
            <tr>
              <th scope="row">1</th>
              <td><?= $item->ISBN ?></td>
              <td><?= $item->Titulo ?></td>
              <td><?= $item->NumeroEjemplares ?></td>
              <td><?= $item->NombreAutor ?></td>
              <td><?= $item->NombreEditorial ?></td>
              <td><?= $item->NombreTema ?></td>
              <td>
                  <form action="http://localhost/prueba2022/librarysys/update/index/<?=$item->idLibro?>" method="post">
                    <input type="submit" value="update">
                </form>
                <input type="button" value="delete" onclick="deleteItem('<?=$item->idLibro?>')">
              </td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
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

    <script>

        function deleteItem(id){
            console.log("eliminado", id)

                Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                if (result.isConfirmed) {

                    window.location.href = "<?=base_url()?>welcome/delete/"+id;

                    // Swal.fire(
                    //   'Deleted!',
                    //   'Your file has been deleted.',
                    //   'success'
                    // )
                }
                })

        }
    </script>


  </body>
</html>

