<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('favicon/apple-icon-57x57.png?v=2') }}">
	<link rel="apple-touch-icon" sizes="60x60" href="{{ asset('favicon/apple-icon-60x60.png?v=2') }}">
	<link rel="apple-touch-icon" sizes="72x72" href="{{ asset('favicon/apple-icon-72x72.png?v=2') }}">
	<link rel="apple-touch-icon" sizes="76x76" href="{{ asset('favicon/apple-icon-76x76.png?v=2') }}">
	<link rel="apple-touch-icon" sizes="114x114" href="{{ asset('favicon/apple-icon-114x114.png?v=2') }}">
	<link rel="apple-touch-icon" sizes="120x120" href="{{ asset('favicon/apple-icon-120x120.png?v=2') }}">
	<link rel="apple-touch-icon" sizes="144x144" href="{{ asset('favicon/apple-icon-144x144.png?v=2') }}">
	<link rel="apple-touch-icon" sizes="152x152" href="{{ asset('favicon/apple-icon-152x152.png?v=2') }}">
	<link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicon/apple-icon-180x180.png?v=2') }}">
	<link rel="icon" type="image/png" sizes="192x192"  href="{{ asset('favicon/android-icon-192x192.png?v=2') }}">
	<link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon/favicon-32x32.png?v=2') }}">
	<link rel="icon" type="image/png" sizes="96x96" href="{{ asset('favicon/favicon-96x96.png?v=2') }}">
	<link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon/favicon-16x16.png?v=2') }}">
	<link rel="manifest" href="{{ asset('favicon/manifest.json') }}">
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="/ms-icon-144x144.png?v=2">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>Timkamu.com Admin</title>

  <!-- Custom fonts for this template -->
  <link href="{{ asset('admin/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
  {{-- <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet"> --}}

  <!-- Custom styles for this template -->
  <link href="{{ asset('admin/css/sb-admin-2.min.css') }}" rel="stylesheet">
  <link href="{{ asset('admin/css/admin-style.css') }}" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="{{ asset('admin/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">

  <!-- Override -->
  <link href="{{ asset('admin/css/timkamu-admin.css') }}" rel="stylesheet">
  <link href="{{ asset('vendors/select2/css/select2.min.css') }}" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        @include('includes.admin.sidebar')

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                @include('includes.admin.navbar')

                @if( session('success') || session('failed') || session('warning'))
                    <div class="alert
                        @if (session('success')) alert-success
                        @elseif (session('failed')) alert-danger
                        @elseif (session('warning')) alert-warning @endif
                        alert-dismissible fade show">
                        @if (session('success')) {{ session('success') }}
                        @elseif (session('failed')) {{ session('failed') }}
                        @elseif (session('warning')) {{ session('warning') }} @endif
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                
                @yield('content')

            </div>

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2019</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="{{ route('admin.logout') }}">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Delete Modal-->
  <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Confirm Delete</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Are you sure, you want to delete this data?</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-danger btn-delete-execute" href="#">Yes</a>
        </div>
      </div>
    </div>
  </div>

  <!-- lock Modal-->
  <div class="modal fade" id="lockModal" tabindex="-1" role="dialog" aria-labelledby="exampleLockModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleLockModalLabel">Confirm Lock/Unlock</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Are you sure, you want to lock/unlock this data?</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-danger btn-lock-execute" href="#">Yes</a>
        </div>
      </div>
    </div>
  </div>

  <!-- lock Modal-->
  <div class="modal fade" id="alertMessage" tabindex="-1" role="dialog" aria-labelledby="exampleAlertTitleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleAlertTitleModalLabel"></h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body" id="exampleAlertBodyModalLabel"></div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Okay</button>
        </div>
      </div>
    </div>
  </div>

  <style type="text/css">
      #spinner .spinner-border {
          width: 100px;
          height: 100px;
          position: absolute;
          top: -26px;
          left: 0;
      }
      .level-up-modal-rank-icon {
          width: 40%;
      }
      .level-up-modal-rank-title {
          font-size: 26px;
          text-transform: uppercase;
          text-align: center !important;
          font-family: 'Rajdhani-Bold';
      }
  </style>

  <div id="spinner" class="modal metro" tabindex="-1" role="dialog">
      <div class="modal-dialog modal-dialog-centered modal-sm spin" role="document">
          <div class="modal-content">
              <div class="spinner-border" role="status">
              </div>
          </div>
      </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="{{ asset('admin/vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('admin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

  <!-- Core plugin JavaScript-->
  <script src="{{ asset('admin/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

  <!-- Custom scripts for all pages-->
  <script src="{{ asset('admin/js/sb-admin-2.js') }}"></script>

  <!-- feathericons -->
  <script src="{{ asset('vendors/feathericons/feathericons.js') }}"></script>

  <!-- Page level plugins -->
  <script src="{{ asset('admin/vendor/datatables/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('admin/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('vendors/select2/js/select2.full.min.js') }}"></script>

  
  <script>
    $('.dataTable').DataTable({
      "bStateSave": true,
      "fnStateSave": function (oSettings, oData) {
          localStorage.setItem('offersDataTables', JSON.stringify(oData));
      },
      "fnStateLoad": function (oSettings) {
          return JSON.parse(localStorage.getItem('offersDataTables'));
      }
    });

    $('.select2-show-search').select2({
        minimumResultsForSearch: '',
        width: '100%',
    });
  </script>
  <script>

    // feather icons
    feather.replace();
    
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var url = ''
    $(document).on('click', '.btn-delete-data', function () {
        url = $(this).data('url')

        $('#deleteModal').modal('show');
    })

    $('.btn-delete-execute').on('click', function(e) {
      e.preventDefault();
      
      location.href = url;
    })

    // $(document).on('click', '.btn-lock', function () {
    //     url = $(this).data('url')

    //     $('#lockModal').modal('show');
    // })

    // $('.btn-lock-execute').on('click', function(e) {
    //   e.preventDefault();
      
    //   location.href = url;
    // })

    function convertToRupiah(angka)
    {
        var rupiah = '';		
        var angkarev = angka.toString().split('').reverse().join('');
        for(var i = 0; i < angkarev.length; i++) if(i%3 == 0) rupiah += angkarev.substr(i,3)+',';
        return rupiah.split('',rupiah.length-1).reverse().join('');
    }
  </script>

  <script>
    $('.btn-sbmt-epbyid').on('click', function(e) {
      e.preventDefault();
      var id = $('#ep_event_id').val();

      var urlString = "{{ url('admin-tkmu/reports') }}/" + id;
      location.href = urlString;
    })

    $('.btn-sbmt-epbyfltr').on('click', function(e) {
      e.preventDefault();
      var startDate = $('#ep_filter_startdate').val();
      var endDate = $('#ep_filter_enddate').val();

      var urlString = ("{{ url('admin-tkmu/reports') }}?start_date="+startDate+"&end_date="+endDate).replace(/&amp;/g, '&');
      location.href = urlString;
    })
    $('.btn-sbmt-uebyid').on('click', function(e) {
      e.preventDefault();
      var id = $('#awdawd').val();

      var urlString = "{{ url('admin-tkmu/events') }}/" + id + "/edit";
      location.href = urlString;
    })

    $('.btn-sbmt-usbynm').on('click', function(e) {
      e.preventDefault();
      var id = $('#staff_id').val();
      if(id == null) {
        $('#error-msg-staff').show();
      } else {
        $('#error-msg-staff').hide();

      var urlString = "{{ url('admin-tkmu/staffs') }}/" + id + "/edit";
        location.href = urlString;
      }
    })
  </script>

  @yield('js')

</body>

</html>
