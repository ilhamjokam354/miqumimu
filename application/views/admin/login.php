
<body class="bg-gradient-primary">

<div class="container">

  <!-- Outer Row -->
  <div class="row justify-content-center">

    <div class="col-xl-5 col-lg-12 col-md-9">

      <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
          <!-- Nested Row within Card Body -->
          <div class="row">
            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
            <div class="col-lg-12">
              <div class="p-5">
                <div class="text-center">
                  <h1 class="h4 text-gray-900 mb-4">Login!</h1>
                </div>
                <?php  echo $this->session->flashdata('pesan')?>
                <form class="user" method="post" action="<?php echo base_url('auth/login_admin') ?>"> 
                  <div class="form-group">
                    <input type="text" name="username" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Username ">
                    <?php echo form_error('username', '<div class="text-danger small ml-3 mb-3">','</div>') ?>
                  </div>
                  <div class="form-group">
                    <input type="password" name="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password">
                    <?php echo form_error('password', '<div class="text-danger small ml-3 mb-2">','</div>') ?>
                  </div>
                  <div class="form-group">
                    <div class="custom-control custom-checkbox small">
                      <input type="checkbox" class="custom-control-input" id="customCheck">
                      
                    </div>
                  </div>
                  <button type="submit" class="btn btn-primary btn-user btn-block">Login</button>
                  
                  
                </form>
                <hr>
                
                
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>

  </div>

</div>

