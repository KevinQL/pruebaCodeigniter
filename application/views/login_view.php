    <?php
        $data['title'] = 'Login view';
        $this->load->view('partials/headerhtml', $data);
    ?>
  </head>
  <body>
  
    <div class="container">
        <div class="row justify-content-center align-items-center" style="height: 70vh;">
            <form class="col-4 bg-dark p-4 text-white" id="formLogin">
                <h4>LOGIN LIBRARY</h4>
                <div class="form-group">
                    <label for="email">User</label>
                    <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp">
                    <div class="invalid-feedback">
                        
                    </div>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control" id="password">
                    <div class="invalid-feedback">

                    </div>
                </div>
                <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" name="checkLogin" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Recordar cuenta</label>
                </div>
                <button type="submit" class="btn btn-outline-primary d-block w-100 py-3">Login now</button>

                <div class="alert alert-danger d-none mt-2 mb-0" role="alert">
                </div>

            </form>
        </div>
    </div>

    <?php
        $this->load->view('partials/footerhtml');
    ?>
    <script src="<?php echo base_url('assets/js/login_view.js'); ?>"></script>


  </body>
</html>

