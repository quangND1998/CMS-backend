<!DOCTYPE html>
<html lang="en">

<head>
    <title>Nemoviz - VR3D Technology for Real estate</title>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    {{-- <meta name="csrf-token" content="{{ csrf_token() }}"> --}}
    
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <base href="{{ asset('') }}">
    <link rel="stylesheet" type="text/css" href="backend/css/main.css" />
    <link rel="stylesheet" type="text/css" href="backend/css/font-awesome/4.7.0/css/font-awesome.min.css" />
    <!-- Bootstrap Core CSS -->
    <!-- MetisMenu CSS -->
    <!-- Custom CSS -->
    <!-- Custom Fonts -->
    <!-- DataTables CSS -->
    {{-- <link href="admin_asset/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet"> --}}
</head>

<body class="app sidebar-mini rtl">

    <div id="app">
        <router-view>

        </router-view>
    </div>
    <script src="{{ asset('backend/js/jquery-3.2.1.min.js') }}"></script>



    <script src="{{ mix('js/app.js') }}"> </script>
    <script src="{{ asset('backend/js/popper.min.js') }}"></script>
    <script src="{{ asset('backend/js/bootstrap.min.js') }}"></script>
    {{-- <script src="{{ asset('backend/js/main.js') }}"></script> --}}
    <script src="{{ asset('backend/js/plugins/pace.min.js') }}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{ asset('admin_asset/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="{{ asset('admin_asset/bower_components/metisMenu/dist/metisMenu.min.js') }}"></script>

    <!-- Custom Theme JavaScript -->
    <script src="{{ asset('admin_asset/dist/js/sb-admin-2.js') }}"></script>

    <!-- DataTables JavaScript -->
    <script src="{{ asset('admin_asset/bower_components/dataTables/media/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin_asset/bower_components/dataTables/media/js/dataTable.bootstrap4.min.js') }}"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script
        src="{{ asset('admin_asset/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js') }}">
    </script>


    <script>
        // Toggle Sidebar
        $('[data-toggle="sidebar"]').click(function(event) {
            event.preventDefault();
            $('.app').toggleClass('sidenav-toggled');
        });
        $("[data-toggle='treeview']").click(function(event) {
            event.preventDefault();
            if (!$(this).parent().hasClass('is-expanded')) {
                $('.app-menu').find("[data-toggle='treeview']").parent().removeClass('is-expanded');
            }
            $(this).parent().toggleClass('is-expanded');
        });
        $(document).ready(function() {
            $('#dataTables-example').DataTable({
                responsive: true,
            });
        });
    </script>
</body>

</html>
