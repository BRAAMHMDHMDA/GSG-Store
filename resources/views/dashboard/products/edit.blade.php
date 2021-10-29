@extends('dashboard.layouts.app')

@push('css')

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard_files/app-assets/vendors/css/vendors.min.css') }}">
    <link rel="stylesheet" type="text/css"
          href="{{ asset('dashboard_files/app-assets/vendors/css/forms/wizard/bs-stepper.min.css') }}">
    <link rel="stylesheet" type="text/css"
          href="{{ asset('dashboard_files/app-assets/vendors/css/forms/select/select2.min.css') }}">
    <!-- END: Vendor CSS-->
    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css"
          href="{{ asset('dashboard_files/app-assets/css/core/menu/menu-types/vertical-menu.css') }}">
    <link rel="stylesheet" type="text/css"
          href="{{ asset('dashboard_files/app-assets/css/plugins/forms/form-validation.css') }}">
    <link rel="stylesheet" type="text/css"
          href="{{ asset('dashboard_files/app-assets/css/plugins/forms/form-wizard.css') }}">
    <!-- END: Page CSS-->
    <link rel="stylesheet" type="text/css"
          href="{{ asset('dashboard_files/app-assets/css/plugins/forms/form-quill-editor.css') }}">
    <link rel="stylesheet" type="text/css"
          href="{{ asset('dashboard_files/app-assets/vendors/css/editors/quill/katex.min.css') }}">
    <link rel="stylesheet" type="text/css"
          href="{{ asset('dashboard_files/app-assets/vendors/css/editors/quill/monokai-sublime.min.css') }}">
    <link rel="stylesheet" type="text/css"
          href="{{ asset('dashboard_files/app-assets/vendors/css/editors/quill/quill.snow.css') }}">
    <link href="{{ asset('dashboard_files/bootstrap-file-input/css/fileinput.min.css') }}" media="all" rel="stylesheet"
          type="text/css"/>
    <link href="{{ asset('dashboard_files/bootstrap-file-input/themes/explorer-fa/theme.css') }}" media="all"
          rel="stylesheet" type="text/css"/>
    <link href="{{ asset('dashboard_files/bootstrap-file-input/themes/explorer/theme.css') }}" media="all"
          rel="stylesheet" type="text/css"/>

@endpush

@section('content_title', 'Update Product')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{route('products.index')}}">Products</a></li>
    <li class="breadcrumb-item active">Update Product</li>
@endsection
@section('content')

    {{--    <!-- Modern Horizontal Wizard -->--}}
    <form method="post" id="f" action="{{route('products.update',$product->id)}}" enctype="multipart/form-data">
        @csrf
        @method('put')
        @include('dashboard.products._form', [
            'button' => 'Update',
           ])
    </form>
    <!-- /Modern Horizontal Wizard -->
@endsection

@push('scripts')
    <script src="{{ asset('dashboard_files/app-assets/js/scripts/forms/form-wizard.js') }}"></script>
    <script src="{{ asset('dashboard_files/app-assets/vendors/js/forms/wizard/bs-stepper.min.js') }}"></script>
    <script src="{{ asset('dashboard_files/app-assets/vendors/js/forms/select/select2.full.min.js') }}"></script>
    <script src="{{ asset('dashboard_files/app-assets/vendors/js/forms/validation/jquery.validate.min.js') }}"></script>


    <!-- BEGIN: Page Vendor JS-->
    <script src="{{ asset('dashboard_files/app-assets/vendors/js/editors/quill/katex.min.js') }}"></script>
    <script src="{{ asset('dashboard_files/app-assets/vendors/js/editors/quill/highlight.min.js') }}"></script>
    <script src="{{ asset('dashboard_files/app-assets/vendors/js/editors/quill/quill.min.js') }}"></script>
    <!-- END: Page Vendor JS-->
    <script src="{{ asset('dashboard_files/app-assets/js/scripts/forms/form-quill-editor.js') }}"></script>
    <script src="{{ asset('dashboard_files/bootstrap-file-input/js/fileinput.js') }}" type="text/javascript"></script>
    <script src="{{ asset('dashboard_files/bootstrap-file-input/js/plugins/piexif.min.js') }}"
            type="text/javascript"></script>
    <script src="{{ asset('dashboard_files/bootstrap-file-input/js/plugins/purify.min.js') }}"
            type="text/javascript"></script>
    <script src="{{ asset('dashboard_files/bootstrap-file-input/js/plugins/sortable.min.js') }}"
            type="text/javascript"></script>
    <script src="{{ asset('dashboard_files/bootstrap-file-input/themes/fa/theme.js') }}"
            type="text/javascript"></script>
    <script src="https://cdn.tiny.cloud/1/htm1jamhro8ogc7qftmbgntw27ari8z5oitggg7nbp379i9b/tinymce/5/tinymce.min.js"
            referrerpolicy="origin"></script>
    <script>

        tinymce.init({
            selector: "textarea#editor",
            skin: "bootstrap",
            plugins: "lists, link, image, media",
            toolbar:
                "h1 h2 bold italic strikethrough blockquote bullist numlist backcolor | link image media | removeformat help",
            menubar: false,
            setup: (editor) => {
                // Apply the focus effect
                editor.on("init", () => {
                    editor.getContainer().style.transition =
                        "border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out";
                });
                editor.on("focus", () => {
                    (editor.getContainer().style.boxShadow =
                        "0 0 0 .2rem rgba(0, 123, 255, .25)"),
                        (editor.getContainer().style.borderColor = "#80bdff");
                });
                editor.on("blur", () => {
                    (editor.getContainer().style.boxShadow = ""),
                        (editor.getContainer().style.borderColor = "");
                });
            },
        });
    </script>

    <script>
        $('#product-images').fileinput({
            // maxFileCount: 5,
            uploadUrl: "/",
            uploadAsync: false,
            previewFileIcon: '<i data-feather="save"></i>',

            allowedFileTypes: ['image'],
            showCancel: true,
            showRemove: true,
            initialPreviewShowDelete: true,
            showUpload: false,
            overwriteInitial: false,

        })
        $('#product-image').fileinput({
            maxFileCount: 1,
            allowedFileTypes: ['image'],
            showCancel: true,
            showRemove: true,
            initialPreviewShowDelete: true,
            showUpload: false,
            overwriteInitial: false,

        })

        $(document).on("click", ".browse", function () {
            var file = $(this).parents().find(".file");
            file.trigger("click");
        });
        $('input[type="file"]').change(function (e) {
            var fileName = e.target.files[0].name;
            $("#file").val(fileName);

            var reader = new FileReader();
            reader.onload = function (e) {
                // get loaded data and render thumbnail.
                document.getElementById("preview").src = e.target.result;
            };
            // read the image file as a data URL.
            reader.readAsDataURL(this.files[0]);
        });

    </script>
    <script>
        var tags = @php echo json_encode($tagIDs); @endphp;
        $('#tags').val(tags);
    </script>
@endpush

