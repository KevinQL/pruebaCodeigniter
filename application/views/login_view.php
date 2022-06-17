    <?php
    $data['title'] = 'Login view';
        $this->load->view('partials/headerhtml', $data);
    ?>
  </head>
  <body>
  
    <div class="container">
        <div class="row justify-content-center align-items-center" style="height: 70vh;">
            <form class="col-4 bg-dark p-4 text-white">
                <h4>LOGIN LIBRARY</h4>
                <div class="form-group">
                    <label for="exampleInputEmail1">User</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1">
                </div>
                <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Recordar cuenta</label>
                </div>
                <button type="submit" class="btn btn-outline-primary d-block w-100 py-3">Login now</button>
            </form>
        </div>
    </div>

    <?php
        $this->load->view('partials/footerhtml');
    ?>
    <script src="<?php echo base_url('assets/js/login_view.js'); ?>"></script>


  </body>
</html>

