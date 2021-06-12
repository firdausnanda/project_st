<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Admin Panel | Dashboard </title>
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/logo 90x90.png') }}"/>
    <link href="{{ asset('assets/css/loader.css') }}" rel="stylesheet" type="text/css" />
    <script src="{{ asset('assets/js/loader.js') }}"></script>
    
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/plugins.css') }}" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM STYLES -->
    <link href="{{ asset('plugins/apex/apexcharts.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/dashboard/dash_1.css') }}" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->

    <!-- BEGIN PAGE LEVEL DATATABLE STYLES -->
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/table/datatable/datatables.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/table/datatable/dt-global_style.css') }}">
    <!-- END PAGE LEVEL STYLES -->

    <!--  BEGIN CUSTOM SELECT STYLE FILE  -->
    <link href="{{ asset('assets/css/scrollspyNav.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/bootstrap-select/bootstrap-select.min.css') }}">
    <!--  END CUSTOM STYLE FILE  -->

    <!-- BEGIN PAGE LEVEL ICON STYLES -->
    <link rel="stylesheet" href="{{ asset('plugins/font-icons/fontawesome/css/regular.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/font-icons/fontawesome/css/fontawesome.css') }}">
    <!-- END PAGE LEVEL STYLES -->

    <!-- BEGIN THEME GLOBAL STYLES -->
    <link href="{{ asset('assets/css/scrollspyNav.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('plugins/animate/animate.css') }}" rel="stylesheet" type="text/css" />
    <script src="{{ asset('plugins/sweetalerts/promise-polyfill.js') }}"></script>
    <link href="{{ asset('plugins/sweetalerts/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('plugins/sweetalerts/sweetalert.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/components/custom-sweetalert.css') }}" rel="stylesheet" type="text/css" />
    <!-- END THEME GLOBAL STYLES -->

    <!--  BEGIN CUSTOM STYLE FILE  -->
    <link href="{{ asset('assets/css/scrollspyNav.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/components/tabs-accordian/custom-tabs.css') }}" rel="stylesheet" type="text/css" />
    <!--  END CUSTOM STYLE FILE  -->

    <!--  BEGIN CUSTOM ALERT FILE  -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/elements/alert.css') }}">
    <style>
        .btn-light { border-color: transparent; }
    </style>    
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
 <!-- BEGIN LOADER -->
 <div id="load_screen">
     <div class="loader">
         <div class="loader-content">
             <div class="spinner-grow align-self-center"></div>
         </div>
     </div>
 </div>
 <!--  END LOADER -->

<!--  BEGIN NAVBAR  -->
<div class="header-container fixed-top">
    <header class="header navbar navbar-expand-sm">

        <ul class="navbar-item theme-brand flex-row  text-center">
            <li class="nav-item theme-logo">
                <a href="">
                    <img src="{{ asset('assets/img/logo 90x90.png') }}" class="navbar-logo" alt="logo">
                </a>
            </li>
            <li class="nav-item theme-text">
                <a href="/admin" class="nav-link"> ITSK SOEPRAOEN </a>
            </li>
        </ul>

        <ul class="navbar-item flex-row ml-md-0 ml-auto">
            <li class="nav-item align-self-center search-animated">
                <!-- <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search toggle-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                <form class="form-inline search-full form-inline search" role="search">
                    <div class="search-bar">
                        <input type="text" class="form-control search-form-control  ml-lg-auto" placeholder="Search...">
                    </div>
                </form> -->
            </li>
        </ul>

        <ul class="navbar-item flex-row ml-md-auto">

            <li class="nav-item dropdown user-profile-dropdown">
                <a href="javascript:void(0);" class="nav-link dropdown-toggle user" id="userProfileDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                    
                    <img src="{{ asset('assets/img/anonim.png') }}" alt="avatar">
                </a>
                <div class="dropdown-menu position-absolute" aria-labelledby="userProfileDropdown">
                    <div class="">
                        <div class="dropdown-item">
                            @if(Auth::user()->role == 'superadmin')
                            <a style="text-decoration: none;" href="/profile"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg> My Profile</a>
                            @elseif(Auth::user()->role == 'admin')
                            <a style="text-decoration: none;" href="/profileadmin"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg> My Profile</a>
                            @elseif(Auth::user()->role == 'user')
                            <a style="text-decoration: none;" href="/profileuser"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg> My Profile</a>
                            @endif
                        </div>
                        <div class="dropdown-item">
                            <a style="text-decoration: none;" href="{{ route('logout') }}" 
                            onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-log-out"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg> 
                                Sign Out
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </div>
                </div>
            </li>

        </ul>
    </header>
</div>
<!--  END NAVBAR  -->

<!--  BEGIN NAVBAR  -->
<div class="sub-header-container">
    <header class="header navbar navbar-expand-sm">
        <a href="javascript:void(0);" class="sidebarCollapse" data-placement="bottom"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg></a>

        <ul class="navbar-nav flex-row">
            <li>
                <div class="page-header">

                    <nav class="breadcrumb-one" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
                        </ol>
                    </nav>

                </div>
            </li>
        </ul>
        
    </header>
</div>
<!--  END NAVBAR  -->

<!--  BEGIN MAIN CONTAINER  -->
<div class="main-container" id="container">

    <div class="overlay"></div>
    <div class="search-overlay"></div>

    <!--  BEGIN SIDEBAR  -->
    @include('layouts.menu')
    {{-- @yield('sidebar') --}}
    <!--  END SIDEBAR  -->
    
    <!--  BEGIN CONTENT AREA  -->
    <div id="content" class="main-content">
        {{-- BEGIN MAIN CONTENT --}}
        @yield('konten')
        {{-- BEGIN FOOTER CONTENT --}}
        <div class="footer-wrapper">
            <div class="footer-section f-section-1">
                <p class="">Copyright © 2021 <a target="_blank" href="https://itsk-soepraoen.ac.id/">ITSK Soepraoen</a>, All rights reserved.</p>
            </div>
            <div class="footer-section f-section-2">
                <p class=""></p>
            </div>
        </div>
    </div>
    <!--  END CONTENT AREA  -->

    @include('sweetalert::alert')

</div>
<!-- END MAIN CONTAINER -->

<!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
<script src="{{ asset('assets/js/libs/jquery-3.1.1.min.js') }}"></script>
<script src="{{ asset('bootstrap/js/popper.min.js') }}"></script>
<script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('plugins/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
<script src="{{ asset('assets/js/app.js') }}"></script>
<script>
    $(document).ready(function() {
        App.init();
    });
</script>
<script src="{{ asset('assets/js/custom.js') }}"></script>
<!-- END GLOBAL MANDATORY SCRIPTS -->

<!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
{{-- <script src="plugins/apex/apexcharts.min.js"></script>
<script src="assets/js/dashboard/dash_1.js"></script> --}}
<!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->

<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="{{ asset('plugins/table/datatable/datatables.js') }}"></script>

<script src="{{ asset('plugins/table/datatable/button-ext/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('plugins/table/datatable/button-ext/jszip.min.js') }}"></script>    
<script src="{{ asset('plugins/table/datatable/button-ext/buttons.html5.min.js') }}"></script>
<script src="{{ asset('plugins/table/datatable/button-ext/buttons.print.min.js') }}"></script>

<script>

    //datatable general
    $(document).ready(function () {    
        var table = $('#zero-config').DataTable({
            "oLanguage": {
                "oPaginate": {
                    "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>',
                    "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>'
                },
                "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                "sSearchPlaceholder": "Search...",
                "sLengthMenu": "Results :  _MENU_",
                "infoFiltered": " - filtered from _MAX_ records",
            },
            "stripeClasses": [],
            "lengthMenu": [7, 10, 20, 50],
            "pageLength": 7
            
        });

        $('#search').on('click', function (){
            table.columns(4).search($('#taa').val()).draw();
            table.columns(5).search($('#semesterr').val()).draw();
        });
    });

    //datatable pembimbingan
    $(document).ready(function () {    
        var table = $('#zero-pembimbingan').DataTable({
            "oLanguage": {
                "oPaginate": {
                    "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>',
                    "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>'
                },
                "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                "sSearchPlaceholder": "Search...",
                "sLengthMenu": "Results :  _MENU_",
                "infoFiltered": " - filtered from _MAX_ records",
            },
            "stripeClasses": [],
            "lengthMenu": [7, 10, 20, 50],
            "pageLength": 7
            
        });
    });

    //datatable pembimbingan
    $(document).ready(function () {    
        var table = $('#zero-penunjang').DataTable({
            "oLanguage": {
                "oPaginate": {
                    "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>',
                    "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>'
                },
                "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                "sSearchPlaceholder": "Search...",
                "sLengthMenu": "Results :  _MENU_",
                "infoFiltered": " - filtered from _MAX_ records",
            },
            "stripeClasses": [],
            "lengthMenu": [7, 10, 20, 50],
            "pageLength": 7
            
        });
    });

    //datatable tracking
    // Setup - add a text input to each footer cell
    $('#tabel-cari tfoot th').each( function () {
        var title = $(this).text();
        $(this).html( '<input type="text" class="form-control" placeholder="Search '+title+'" />' );
    } );

    var table = $('#tabel-cari').DataTable({
        dom: '<"row"<"col-md-12"<"row"<"col-md-6"B><"col-md-6"f> > ><"col-md-12"rt> <"col-md-12"<"row"<"col-md-5"i><"col-md-7"p>>> >',
        buttons: {
                buttons: [
                    { 
                        extend: 'copy', 
                        className: 'btn btn-info',
                        exportOptions: {
                            columns: ':visible',
                            autoPrint: true,
                            orientation: 'landscape'
                        } 
                        },
                    { 
                        extend: 'csv', 
                        className: 'btn btn-info',
                        exportOptions: {
                            columns: ':visible',
                            autoPrint: true,
                            orientation: 'landscape'
                        } 
                        },
                    { 
                        extend: 'excel', 
                        className: 'btn btn-info',
                        exportOptions: {
                            messageTop: 'Yayasan Wahana Bhakti Karya Husada',
                            columns: ':visible',
                            autoPrint: true,
                            orientation: 'landscape'
                        }
                        },
                    { 
                        extend: 'print', 
                        className: 'btn btn-info',
                        // customize: function (win) {
                        //     $(win.document.body)
                        //         .css('font-size', '10pt')
                        //         .prepend(
                        //             '<img src="{{ asset('assets/img/anonim.png') }}" style="position:absolute; top:10; left:0; width:50" />'
                        //         );

                        //     $(win.document.body).find('table')
                        //         .addClass('compact')
                        //         .css('font-size', 'inherit');
                        // },
                        exportOptions: {
                            columns: ':visible',
                            autoPrint: true,
                            orientation: 'landscape'
                        }
                    }
                ]
            },
        "scrollY": "500px",
        "scrollX": true,
        "oLanguage": {
            "oPaginate": { 
                "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', 
                "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
                "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                "sSearchPlaceholder": "Search...",
                "sLengthMenu": "Results :  _MENU_",
                "infoFiltered": " - filtered from _MAX_ records",
        },
        "stripeClasses": [],
        "lengthMenu": [7, 10, 20, 50],
        "pageLength": 7,
        "footerCallback": function ( row, data, start, end, display ) {
            var api = this.api(), data;
 
            // Remove the formatting to get integer data for summation
            var intVal = function ( i ) {
                return typeof i === 'string' ?
                    i.replace(/[\$,]/g, '')*1 :
                    typeof i === 'number' ?
                        i : 0;
            };
 
            // Total over all pages
            total = api
                .column( 13 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
 
            // Total over this page
            pageTotal = api
                .column( 13, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
 
            // Update footer
            $( api.column( 13 ).footer() ).html(
                //'$'+pageTotal +' ( $'+ total +' total)'
                '<h5><b>Total : <h3>'+pageTotal+' SKS</h3></b></h5>' 
            );
        }
    });

    table.columns().every( function () {
        var that = this;
 
        $( 'input', this.footer() ).on( 'keyup change', function () {
            if ( that.search() !== this.value ) {
                that
                    .search( this.value )
                    .draw();
            }
        } );
    } );

    // Hide two columns
    table.columns( [1,4,7,9,10] ).visible( false );

    $('a.toggle-vis').on( 'click', function (e) {
        e.preventDefault();
        // Get the column API object
        var column = table.column( $(this).attr('data-column') );
        // Toggle the visibility
        column.visible( ! column.visible() );
    } );

    //edit data dosen
    $('#EditDataDosen').on('show.bs.modal',function(event){
        var button = $(event.relatedTarget)
        var id = button.data('id')
        var nidn = button.data('nidn')
        var nama = button.data('nama')
        var jabatan = button.data('jabatan')
        var jabatan_fungsional = button.data('jabatann')
        var status = button.data('status')
        

        var modal = $(this)

        modal.find('.modal-body #id').val(id);
        modal.find('.modal-body #nidn').val(nidn);
        modal.find('.modal-body #nama').val(nama);
        modal.find('.modal-body #jabatan').val(jabatan).change();
        modal.find('.modal-body #jabatan_fungsional').val(jabatan_fungsional).change();
        modal.find('.modal-body #status').val(status).change();
    });

    //edit data matkul
    $('#EditDataMatkul').on('show.bs.modal',function(event){
        var button = $(event.relatedTarget)
        var kode_matkul = button.data('kode_matkul')
        var nama_matkul = button.data('nama_matkul')
        var sks = button.data('sks')
        var tsks = button.data('tsks')
        var psks = button.data('psks')
        var ksks = button.data('ksks')
        var kurikulum = button.data('kurikulum')
        var pjmk = button.data('pjmk')
        var prodi = button.data('prodi')
        
        var modal = $(this)

        modal.find('.modal-body #kode_matkul').val(kode_matkul);
        modal.find('.modal-body #nama_matkul').val(nama_matkul);
        modal.find('.modal-body #sks').val(sks);
        modal.find('.modal-body #tsks').val(tsks);
        modal.find('.modal-body #psks').val(psks);
        modal.find('.modal-body #ksks').val(ksks);
        modal.find('.modal-body #kurikulum').val(kurikulum);
        modal.find('.modal-body #pjmk').val(pjmk).change();
        modal.find('.modal-body #prodi').val(prodi).change();
    });

    //edit data Prodi
    $('#EditDataProdi').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget)
        var id = button.data('id')
        var nama_prodi = button.data('prodi')

        var modal = $(this)

        modal.find('.modal-body #id').val(id);
        modal.find('.modal-body #nama_prodi').val(nama_prodi);
    });

    //edit data akun
    $('#EditDataAkun').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget)
        var id = button.data('id')
        var name = button.data('name')
        var email = button.data('email')
        var password = button.data('password')
        var role = button.data('role')

        var modal = $(this)

        modal.find('.modal-body #id_akun').val(id);
        modal.find('.modal-body #name').val(name);
        modal.find('.modal-body #email').val(email);
        modal.find('.modal-body #password').val(password);
        modal.find('.modal-body #role').val(role).change();
        
    });

    //edit data ta
    $('#EditDataTa').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget)
        var id = button.data('id')
        var ta = button.data('ta')

        var modal = $(this)

        modal.find('.modal-body #id').val(id);
        modal.find('.modal-body #ta').val(ta);
    });

    //sweetalert delete
    $('.submitForm').on('click',function(e){
        e.preventDefault();
        var form = $(this).parents('form');
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.value) {
                form.submit();
            }
        });
    });

    //autofill add sgas
    $(document).ready(function () {
        $(document).on('change', '#nama', function () {
            var id = $(this).val();
            var url = '{{ route("getDetails", ":id") }}';
            url = url.replace(':id', id);

            $.ajax({
                url: url,
                type: 'get',
                dataType: 'json',
                success: function (response) {
                    if (response != null) {
                        $('#nidn').val(response.nidn);
                        $('#jabatan').val(response.jabatan);
                        $('#id').val(response.id);
                    }
                }
            });
        });
    });

    //autofill add sgas admin
    $(document).ready(function () {
        $(document).on('change', '#namaa', function () {
            var id = $(this).val();
            var url = '{{ route("getNama", ":id") }}';
            url = url.replace(':id', id);

            $.ajax({
                url: url,
                type: 'get',
                dataType: 'json',
                success: function (response) {
                    if (response != null) {
                        $('#nidnn').val(response.nidn);
                        $('#jabatann').val(response.jabatan);
                        $('#id').val(response.id);
                    }
                }
            });
        });
    });

    //autofill nama detail_sgas
    $(document).ready(function () {
        $(document).on('keyup', '#kode_matkul', function () {
            var id = $(this).val();
            var url = '{{ route("getDetailKodeMatkul", ":id") }}';
            url = url.replace(':id', id);

            $.ajax({
                url: url,
                type: 'get',
                dataType: 'json',
                success: function (response) {
                    if (response != null) {
                        $('#nama_matkul').val(response.nama_matkul).change();
                        $('#skss').val(response.sks);
                        $('#skst').val(response.t);
                        $('#sksp').val(response.p);
                        $('#sksk').val(response.k); 
                    }
                   
                }
            });
        });
    });

    //autofill nama detail_sgas
    $(document).ready(function () {
        $(document).on('change', '#nama_matkul', function () {
            var id = $(this).val();
            var url = '{{ route("getDetailNamaMatkul", ":id") }}';
            url = url.replace(':id', id);

            $.ajax({
                url: url,
                type: 'get',
                dataType: 'json',
                success: function (response) {
                    if (response != null) {
                        $('#kode_matkul').val(response.kode_matkul);
                        $('#skss').val(response.sks);
                        $('#skst').val(response.t);
                        $('#sksp').val(response.p);
                        $('#sksk').val(response.k);                       
                    }
                }
            });

            //pesan maksimal data sks
            document.getElementById('hilang').style.display="block";
            document.getElementById('hilangT').style.display="block";
            document.getElementById('hilangP').style.display="block";
            document.getElementById('hilangK').style.display="block";
        });
    });

    //autofill nama detail sgas ADMIN
    $(document).ready(function () {
        $(document).on('keyup', '#kode_matkul', function () {
            var id = $(this).val();
            var url = '{{ route("getDataKodeMatkul", ":id") }}';
            url = url.replace(':id', id);

            $.ajax({
                url: url,
                type: 'get',
                dataType: 'json',
                success: function (response) {
                    if (response != null) {
                        $('#nama_matkul').val(response.nama_matkul).change();
                        $('#skss').val(response.sks);
                        $('#skst').val(response.t);
                        $('#sksp').val(response.p);
                        $('#sksk').val(response.k); 
                    }
                   
                }
            });
        });
    });

    //autofill nama detail sgas ADMIN
    $(document).ready(function () {
        $(document).on('change', '#nama_matkul', function () {
            var id = $(this).val();
            var url = '{{ route("getDataNamaMatkul", ":id") }}';
            url = url.replace(':id', id);

            $.ajax({
                url: url,
                type: 'get',
                dataType: 'json',
                success: function (response) {
                    if (response != null) {
                        $('#kode_matkul').val(response.kode_matkul);
                        $('#skss').val(response.sks);
                        $('#skst').val(response.t);
                        $('#sksp').val(response.p);
                        $('#sksk').val(response.k);                       
                    }
                }
            });

            document.getElementById('hilang').style.display="block";
            document.getElementById('hilangT').style.display="block";
            document.getElementById('hilangP').style.display="block";
            document.getElementById('hilangK').style.display="block";
        });
    });

    //autofill penjumlahan total
    function sum() {
      var a = document.getElementById('teori').value;
      var b = document.getElementById('praktek').value;
      var c = document.getElementById('klinik').value;

      var result = parseFloat(a) + parseFloat(b) + parseFloat(c);
      if (!isNaN(result)) {
         document.getElementById('total').value = result;
      }
    }

    //validasi harus angka(Masking angka)
    $(document).ready(function(){
        $('#ta').inputmask("9999/9999");
    });

    //print action
    $('#btn-print').on('click', function (event) {
        event.preventDefault();
        /* Act on the event */
        window.print();
        window.onfocus=function(){ 
            window.close();
            };
    });

</script>
<!-- END PAGE LEVEL SCRIPTS -->

<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="{{ asset('assets/js/scrollspyNav.js') }}"></script>
<script src="{{ asset('plugins/bootstrap-select/bootstrap-select.min.js') }}"></script>
<!-- END PAGE LEVEL SCRIPTS -->

<!-- BEGIN THEME GLOBAL STYLE -->
<script src="{{ asset('plugins/sweetalerts/sweetalert2.min.js') }}"></script>
<script src="{{ asset('plugins/sweetalerts/custom-sweetalert.js') }}"></script>
<!-- END THEME GLOBAL STYLE -->

<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="{{ asset('plugins/input-mask/jquery.inputmask.bundle.min.js') }}"></script>
<!-- BEGIN PAGE LEVEL PLUGINS -->

</body>
</html>
