<?php include_once('header.php') ?>


      <div class="container mt-5">

          <div class="row">
            <!-- Insert Button trigger modal -->
            <button type="button" class="ml-3 btn btn-primary add" data-toggle="modal" data-target="#insertModal">
              Add
            </button>
          </div>
          <div class="row mt-5">
          <div class="col">
            <!-- user Info table -->
              <table id="infoTable" class="table text-center table-info table-bordered table-hover">
                <thead>
                  <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Contact</th>
                    <th>Update</th>
                    <th>Delete</th>
                  </tr>
                </thead>
                <tbody>

                </tbody>
              </table>
            </div>
            <!-- end of col div -->
          </div>
          <!-- end of row div -->
      </div>
      <!-- end of container div -->




      <!-- Insert Modal -->
      <div class="modal fade" id="insertModal">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="insertModal">Insert Record</h5>
          </div>
          <div class="modal-body">
            <form id="insertForm" action="" method="post">
              <div class="form-group">
                <label for="">Name</label>
                <input class="form-control" type="text" name="name" value="">
              </div>
              <div class="form-group">
                <label for="">email</label>
                <input class="form-control" type="email" name="email" value="">
              </div>
              <div class="form-group">
                <label for="">Contact</label>
                <input class="form-control" type="text" name="contact" value="">
              </div>
              <button type="submit" class="btn btn-success save" name="insert">Save</button>
            </form>
          </div>
          <!-- end of modal body -->
        </div>
        <!-- end of modal content div -->
      </div>
      </div>
      <!-- end of modal -->


      <!-- Update Modal -->
      <div class="modal fade" id="updateModal">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="updateModal">Update Record</h5>
          </div>
          <div class="modal-body">
            <form id="updateForm" action="" method="post">
              <input type="hidden" name="id" value="">
              <div class="form-group">
                <label for="">Name</label>
                <input class="form-control" type="text" name="name" value="">
              </div>
              <div class="form-group">
                <label for="">email</label>
                <input class="form-control" type="email" name="email" value="">
              </div>
              <div class="form-group">
                <label for="">Contact</label>
                <input class="form-control" type="text" name="contact" value="">
              </div>
              <button type="submit" class="btn btn-success update" name="update">Update</button>
            </form>
          </div>
          <!-- end of modal body -->
        </div>
        <!-- end of modal content div -->
      </div>
      </div>
      <!-- end of modal -->


<?php include_once('footer.php') ?>
