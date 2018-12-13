<!doctype html>

<html lang="en" class="no-focus">

@include('admin.layouts.header')

<body>
<div id="page-container" class="sidebar-o sidebar-inverse side-scroll page-header-glass page-header-inverse main-content-boxed">
    @include('admin.layouts.navbar')

    <main id="main-container">

        @yield('content')




    </main>


    @include('admin.layouts.footer')


</div>
<!-- END Page Container -->

<!-- Codebase Core JS -->

<script src="{{asset('backend/js/core/jquery.min.js')}}"></script>
<script src="{{asset('backend/js/core/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('backend/js/core/jquery.slimscroll.min.js')}}"></script>
<script src="{{asset('backend/js/core/jquery.scrollLock.min.js')}}"></script>
<script src="{{asset('backend/js/core/jquery.appear.min.js')}}"></script>
<script src="{{asset('backend/js/core/jquery.countTo.min.js')}}"></script>
<script src="{{asset('backend/js/core/js.cookie.min.js')}}"></script>
<script src="{{asset('backend/js/codebase.js')}}"></script>
<script src="{{asset('backend/js/plugins/ckeditor/ckeditor.js')}}"></script>
<script src="{{asset('backend/js/plugins/select2/select2.full.min.js')}}"></script>
<script src="{{asset('backend/js/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('backend/js/plugins/datatables/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('backend/js/pages/be_tables_datatables.js')}}"></script>
<script src="{{asset('backend/js/plugins/jquery-tags-input/jquery.tagsinput.min.js')}}"></script>
<script src="{{asset('backend/js/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js')}}"></script>
<!-- Page JS Plugins -->
<script src="{{asset('backend/js/plugins/chartjs/Chart.bundle.min.js')}}"></script>

<!-- Page JS Code -->
<script src="{{asset('backend/js/pages/be_pages_ecom_dashboard.js')}}"></script>



<script> $('div.alert').delay(3000).slideUp(300); </script>

<script>
    jQuery(function () {
        // Init page helpers (CKEditor + BS Maxlength + Select + Tags Inputs plugins)
        Codebase.helpers(['ckeditor','maxlength', 'select2','tags-inputs']);
    });
</script>
</body>
</html>
