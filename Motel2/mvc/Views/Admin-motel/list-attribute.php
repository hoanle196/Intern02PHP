<div class="card">
  <div class="card-header">
    <h3 class="card-title">Bordered Table</h3>
  </div>
  <!-- /.card-header -->
  <div class="card-body">
    <table class="table table-bordered">
      <thead>
        <tr>
          <th style="width: 10px">#</th>
          <th>name</th>
          <th>action</th>
        </tr>
      </thead>
      <tbody>
        <?php $order = 0;
        if ($result) {
          foreach ($result as $key => $value) {
            $order++ ?>
            <tr>
              <td><?= $order ?></td>
              <td><?= $value['name'] ?></td>
              <td>
                <a class="btn btn-warning btn-sm" href="?a=editAttr&id=<?= $value['id'] ?>">Edit</a>
                <button type="button" data-href="?a=destroyAttr&id=<?= $value['id'] ?>" class="btn btn-danger btn-sm delete" data-toggle="modal" data-target="#exampleModal">
                  Delete
                </button>
              </td>
            </tr>
          <?php } ?>
        <?php } ?>
      </tbody>
    </table>
  </div>
  <!-- /.card-body -->
  <div class="card-footer clearfix">
    <ul class="pagination pagination-sm m-0 float-right">
      <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
      <li class="page-item"><a class="page-link" href="#">1</a></li>
      <li class="page-item"><a class="page-link" href="#">2</a></li>
      <li class="page-item"><a class="page-link" href="#">3</a></li>
      <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
    </ul>
  </div>
</div>