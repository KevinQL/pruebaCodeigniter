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

  <div class="row">
  <div class="col-3">
    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
      <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="false">Home</a>
      <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="true">Profile</a>
      <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Messages</a>
      <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Settings</a>
    </div>
  </div>
  <div class="col-9">
    <div class="tab-content" id="v-pills-tabContent">
      <div class="tab-pane fade" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">...</div>
      <div class="tab-pane fade show active" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">...</div>
      <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">...</div>
      <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">...</div>
    </div>
  </div>
</div>

    <div class="container">
        <p>
        <?= $this->session->email; ?>
        </p>
        <?= $appname; ?>
        <h1>MAIN PANEL LIBRARY</h1>
        <?php if($msj_session = $this->session->flashdata('msj_session')): ?>
          <p>
            <?= $msj_session; ?>
          </p>
        <?php endif; ?>

        <p>
          <a href="<?= base_url('login/logout'); ?>">Logout Library</a>
        </p>
        <p>
            <a href="<?=base_url('welcome/create')?>" class="btn btn-primary " >add item</a>
        </p>
    </div>

    <div class="container">

        <form class="my-3" id="form_search_panel">
            <input type="text" class="form-control m-0" id="txtSearch" placeholder="ingrese c??digo ISBN">
            <div class="invalid-feedback">
              <!-- there going error message -->
            </div>
            <input type="button" value="BUSCAR" class="btn btn-success mt-1 d-block w-100 m-0" id="btn_txtSearch">
        </form>

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
              <th scope="col" >Actions</th>
            </tr>
          </thead>
          <tbody class="table-results">
            <?php $count=0; foreach($allitems as $item): ?>
            <tr>
              <th scope="row"><?=++$count?></th>
              <td><?= $item->ISBN ?></td>
              <td><?= $item->Titulo ?></td>
              <td><?= $item->NumeroEjemplares ?></td>
              <td><?= $item->NombreAutor ?></td>
              <td><?= $item->NombreEditorial ?></td>
              <td><?= $item->NombreTema ?></td>
              <td>
                <form action="http://localhost/prueba2022/librarysys/update/index/<?=$item->idLibro?>" method="post">
                  <input type="submit" value="update" class="btn btn-warning d-inline py-1 my-1" />
                </form>
              </td>
              <td>
                <input type="button" value="delete" class="btn btn-danger d-inline py-1 my-1" onclick="deleteItem('<?=$item->idLibro?>')">
              </td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
    </div>
 
    

    <!-- JQUERY DESDE CDN GOOGLE -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
  
    <!-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>

    <script src="<?php echo base_url('assets/js/panel_view.js'); ?>"></script>


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

