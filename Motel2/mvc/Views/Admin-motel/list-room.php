<div class="card">
  <div class="card-header">
    <h3 class="card-title">Bordered Table</h3>
  </div>
  <!-- /.card-header -->
  <div class="card-body">
    <?php if ($result) : ?>
      <table class="table table-bordered">
        <thead>
          <tr>
            <th style="width: 10px">#</th>
            <th>name</th>
            <th>status</th>
            <th>description</th>
            <th>images</th>
            <th>action</th>
          </tr>
        </thead>
        <tbody>
          <?php $order = 0; {
            foreach ($result as $key => $value) {
              $order++ ?>
              <tr>
                <td><?= $order ?></td>
                <td><?= $value['name'] ?></td>
                <td><?= $value['status'] ?></td>
                <td><?= $value['description'] ?></td>
                <td>
                  <?php $arrImage = explode(',', $value['paths']);
                  foreach ($arrImage as $key => $image) { ?>
                    <img src="./public/uploads/<?php echo  isset($image) ? $image : ''  ?>" class="images" alt="">
                  <?php } ?>
                </td>
                <td>
                  <a class="btn btn-warning btn-sm" href="?a=editRoom&id=<?= $value['id'] ?>">Edit</a>
                  <button type="button" data-href="?a=destroyRoom&id=<?= $value['id'] ?>" class="btn btn-danger btn-sm delete" data-toggle="modal" data-target="#exampleModal">
                    Delete
                  </button>
                </td>
              </tr>
            <?php } ?>
          <?php } ?>

        </tbody>
      </table>
    <?php else : ?>
      <h1>khong co ban ghi nao</h1>
    <?php endif; ?>

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