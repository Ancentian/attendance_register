<div class="invoice-item invoice-table-wrap">
  <div class="row">
    <div class="col-md-12">
      <div class="table-responsive">
        <table class="invoice-table table table-center mb-0">
          <thead>
            <tr>
              <th>Name</th>
      <th>Attendance</th>
            </tr>
          </thead>
          <tbody>
    <?php foreach ($attendance as $a): ?>
      <tr>
        <td><?php echo $a->first_name; ?></td>
        <td><?php echo $a->last_name; ?></td>
      </tr>
    <?php endforeach; ?>
  </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
