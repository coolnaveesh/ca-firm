 <footer class="page-footer font-small cyan darken-3">

      <!-- Copyright -->
      <div class="footer-copyright py-3">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <p>Sulab Filing Consultancy Pvt Ltd</p>
            </div>
            <div class="col-md-12">
              <p>@2020 All Rights Reserved</p>
            </div>
          </div>
          <hr style="background: white;">
          <div class="row">
            <div class="col-md-6">
              <a href="" class="text-left">Terms & Conditions </a>
            </div>
            <div class="col-md-6 text-right">
              <a href="" class="text-right">Terms & Conditions  </a>
            </div>
          </div>
        </div>
      </div>
      <!-- Copyright -->

    </footer>
  <!-- jQuery -->
  <script type="text/javascript" src="js/jquery.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="js/mdb.min.js"></script>
  <!-- Your custom scripts (optional) -->
  <script type="text/javascript"></script>
  <!-- MDBootstrap Datatables  -->
<script type="text/javascript" src="js/addons/datatables2.min.js"></script>

</body>
</html>
<!-- passbook -->
<script>
  $(document).ready(function () {
  $('#dtMaterialDesignExample').DataTable();
  $('#dtMaterialDesignExample_wrapper').find('label').each(function () {
    $(this).parent().append($(this).children());
  });
  $('#dtMaterialDesignExample_wrapper .dataTables_filter').find('input').each(function () {
    const $this = $(this);
    $this.attr("placeholder", "Search");
    $this.removeClass('form-control-sm');
  });
  $('#dtMaterialDesignExample_wrapper .dataTables_length').addClass('d-flex flex-row');
  $('#dtMaterialDesignExample_wrapper .dataTables_filter').addClass('md-form');
  $('#dtMaterialDesignExample_wrapper select').removeClass('custom-select custom-select-sm form-control form-control-sm');
  $('#dtMaterialDesignExample_wrapper select').addClass('mdb-select');
  $('#dtMaterialDesignExample_wrapper .mdb-select').materialSelect();
  $('#dtMaterialDesignExample_wrapper .dataTables_filter').find('label').remove();
});
</script>



<!-- download file returns -->


<script>
  $(document).ready(function () {
  $('#dtMaterialDesignExample1').DataTable();
  $('#dtMaterialDesignExample1_wrapper').find('label').each(function () {
    $(this).parent().append($(this).children());
  });
  $('#dtMaterialDesignExample1_wrapper .dataTables_filter').find('input').each(function () {
    const $this = $(this);
    $this.attr("placeholder", "Search");
    $this.removeClass('form-control-sm');
  });
  $('#dtMaterialDesignExample1_wrapper .dataTables_length').addClass('d-flex flex-row');
  $('#dtMaterialDesignExample1_wrapper .dataTables_filter').addClass('md-form');
  $('#dtMaterialDesignExample1_wrapper select').removeClass('custom-select custom-select-sm form-control form-control-sm');
  $('#dtMaterialDesignExample1_wrapper select').addClass('mdb-select');
  $('#dtMaterialDesignExample1_wrapper .mdb-select').materialSelect();
  $('#dtMaterialDesignExample1_wrapper .dataTables_filter').find('label').remove();
});
</script>



<script>
  $(document).ready(function () {
  $('#dtMaterialDesignExample5').DataTable();
  $('#dtMaterialDesignExample5_wrapper').find('label').each(function () {
    $(this).parent().append($(this).children());
  });
  $('#dtMaterialDesignExample5_wrapper .dataTables_filter').find('input').each(function () {
    const $this = $(this);
    $this.attr("placeholder", "Search");
    $this.removeClass('form-control-sm');
  });
  $('#dtMaterialDesignExample5_wrapper .dataTables_length').addClass('d-flex flex-row');
  $('#dtMaterialDesignExample5_wrapper .dataTables_filter').addClass('md-form');
  $('#dtMaterialDesignExample5_wrapper select').removeClass('custom-select custom-select-sm form-control form-control-sm');
  $('#dtMaterialDesignExample5_wrapper select').addClass('mdb-select');
  $('#dtMaterialDesignExample5_wrapper .mdb-select').materialSelect();
  $('#dtMaterialDesignExample5_wrapper .dataTables_filter').find('label').remove();
});
</script>