<footer>
  <p>Copyright © 2023 Ancent.</p>
</footer>
</div>
</div>

<script src="<?php echo base_url() ?>res/assets/js/jquery-3.6.0.min.js"></script>
<script src="<?php echo base_url() ?>res/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url() ?>res/assets/js/feather.min.js"></script>
<script src="<?php echo base_url() ?>res/assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
<script src="<?php echo base_url() ?>res/assets/plugins/apexchart/apexcharts.min.js"></script>
<script src="<?php echo base_url() ?>res/assets/plugins/apexchart/chart-data.js"></script>
<script src="<?php echo base_url() ?>res/assets/plugins/select2/js/select2.min.js"></script>

<script src="<?php echo base_url() ?>res/assets/plugins/moment/moment.min.js"></script>
<script src="<?php echo base_url() ?>res/assets/js/bootstrap-datetimepicker.min.js"></script>

<script src="<?php echo base_url() ?>res/assets/plugins/datatables/datatables.min.js"></script>

<!-- Export Data -->
<!-- <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script> -->
<script type="text/javascript" src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.print.min.js"></script>


<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script> -->

<script src="<?php echo base_url() ?>res/assets/js/script.js"></script>

<script type="text/javascript">
  $(document).ready(function() {

    $('#example').DataTable( {
        dom: 'lBfrtip',
          buttons: [
               'excel',  'csv', 'pdf', 'print', 'copy',
          ],
          "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]

    } );

  // Check all checkboxes
    $('#check-all').click(function() {
      $('.check-item').prop('checked', $(this).prop('checked'));
    });

  // Uncheck all checkboxes
    $('#uncheck-all').click(function() {
      $('.check-item').prop('checked', false);
    });

  //Live search
  // Attach an event listener to the search input field
  $('#search').on('keyup', search);
  $('#search').on('keydown', search);

// Define the search function
    function search() {
  // Get the search query
      var query = $(this).val().toLowerCase();

  // Loop through all table rows
      var found = false;
      $('tbody tr').each(function() {
        var name = $(this).find('td:nth-child(2)').text().toLowerCase();
        var cooperative = $(this).find('td:nth-child(3)').text().toLowerCase();

    // Check if the row matches the search query
        if (name.indexOf(query) !== -1 || cooperative.indexOf(query) !== -1) {
          $(this).show();
          found = true;
        } else {
          $(this).hide();
        }
      });

  // Display all rows if the search query is empty
      if (query === '') {
        $('tbody tr').show();
        found = true;
      }

  // Display a message if no rows match the search query
      if (!found) {
        $('tbody').append('<tr><td colspan="5">No results found</td></tr>');
      } else {
        $('tbody tr:last-child').remove();
      }
    }

  });

</script>
</body>
</html>