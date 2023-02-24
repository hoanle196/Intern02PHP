<h1>List student</h1>
<a href="?c=student&a=create" class="btn btn-info">Add</a>
<table class="table table-hover">
  <thead>
    <tr>
      <th>#</th>
      <th>name</th>
      <th>birthday</th>
      <th>address</th>
      <th>action</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $order = 0;
    if (!empty($data)) :
      foreach ($data as $name => $info) :
        $order++;
    ?>
        <tr>
          <td><?= $order ?></td>
          <td><img style="
            width: 50px;
            height: 50px;
            border-radius: 50%;
            object-fit: cover;" class="avatar" src="./public/uploads/<?= $info['image_path'] ?>" alt="avatar"><?= $info['student_name'] ?></td>
          <td><?= $info['student_birthday'] ?></td>
          <td><?= $info['student_address'] ?></td>
          <td>
            <a class="btn btn-warning btn-sm" href="?c=student&a=edit&id=<?= $info['student_id'] ?>">Edit</a>
            <button type="button" data-href="?c=student&a=destroy&id=<?= $info['student_id'] ?>" class="btn btn-danger btn-sm delete" data-toggle="modal" data-target="#exampleModal">
              Delete
            </button>
          </td>
        </tr>
    <?php
      endforeach;
    endif;
    ?>
  </tbody>
</table>
<div>
  <span>Số lượng: <?= $order ?></span>
</div>