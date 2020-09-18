<div class="clearfix"></div>
	
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumb-->
     <div class="row pt-2 pb-2">
        <div class="col-sm-9">
		    <h4 class="page-title">User Management</h4>
        </div>
        <div class="col-sm-3 text-right">
        <button type="button" class="btnadd align-right btn btn-primary waves-effect waves-light tampilModalTambahUser" data-toggle="modal" data-target="#DataModelsUser"><i class="fa fa-plus mr-3"></i>Tambah User</button>
        </div>
     </div>
     <div class="row">
       <div class="col-lg-6">
         <?php Flasher::alert();?>
       </div>
     </div>
    <!-- End Breadcrumb-->
      
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-header"><i class="fa fa-table"></i>DATA USER</div>
            <div class="card-body">
              <div class="table-responsive">
              <table id="example" class="text-center table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Username</th>
                        <th>Password</th>
                        <!-- <th>IMAGE</th> -->
                        <th>Role</th>
                       
                        <th>PILIHAN</th>
                        
                    </tr>
                </thead>
                <tbody>
                <?php $i=1;?>
                  <?php foreach($data['user'] as $usr) :?>                

                  <tr>
                    <td><?=$i;?></td>
                    <td><?=$usr['username']?></td>
                    <!-- <td><img src="<?//=BASEURL;?>assets/images/company/Manager/<?//=$usr['image'];?>" alt="profile-image" class="profile img-rounded"></td> -->
                    <td><?=$usr['password']?></td>
                    <!-- <a href="<?//=BASEURL;?>Manager/detail/<?//=$usr['id_manager'];?>" class="btn btn-primary text-white"><i class="fa fa-television"></i></a> -->
                    <td>
                        <?php
                        $data = $this->model('Role_model')->getRolebyId($usr['id_role']);
                        echo $data['role'];
                        ?>
                    </td>
                    <td>
                    <button type="button" class="btnedit align-right btn btn-warning waves-effect waves-light tampilModalEditUser" data-toggle="modal" data-target="#DataModelsUser" data-id="<?=$usr['id_user'];?>"><i class="fa fa-edit"></i></button>
                    <?php
                        if($usr['id_role'] != 1){
                    ?>
                        <a onclick="return confirm('Yakin Ingin Menghapus?')" href="<?=BASEURL;?>User/hapus/<?=$usr['id_user'];?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                    <?php
                        }
                    ?>
                    </td>
                  </tr>
                  <?php $i++;?>
                  <?php endforeach;?>
                </tbody>
            </table>
            </div>
            </div>
          </div>
        </div>
      </div><!-- End Row-->
<!--start overlay-->
		  <div class="overlay toggle-menu"></div>
    <!--end overlay-->
    
    <!-- Modals Tambah -->
    <div class="modal fade" id="DataModelsUser">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content animated lightSpeedIn">
                      <div class="modal-header">
                        <h5 class="modal-title" id="forModalLabel">Tambah User</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                          <form action="<?=BASEURL?>User/add" method="post">
                            <input type="hidden" id="iduser" name="iduser">
                             <div class="form-group">
                               <label for="username">Username</label>
                               <input type="text" class="form-control" name="username" id="username" placeholder="Enter Username">
                             </div>
                             <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" name="password" id="password" placeholder="Enter Password">
                            </div>                                              
                             <div class="form-group text-center">
                              <button class="btn btn-danger px-5" data-dismiss="modal"><i class="icon-close"></i> Batal</button>
                              <button type="submit" class="btn btn-primary px-5 action">Add</button>
                            </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
    <!-- ENd Modals -->

    </div>
    <!-- End container-fluid-->
    
    </div><!--End content-wrapper-->
   

   