<script src="{{ asset('backend/assets/js/config.js') }}"></script>
<link href="{{ asset('backend/assets/css/app.min.css') }}" rel="stylesheet" type="text/css" id="app-style" />
<link href="{{ asset('backend/assets/css/icons.css') }}" rel="stylesheet" type="text/css" />
 <!-- Quill css -->
<link href="{{ asset('backend/assets/vendor/quill/quill.core.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('backend/assets/vendor/quill/quill.snow.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('backend/assets/vendor/quill/quill.bubble.css') }}" rel="stylesheet" type="text/css" />



<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css">

<script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
<link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
<style> 
.pagination-container {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 10px;
}

.pagination-info,
.pagination-dropdown,
.pagination-links {
    flex: 1;
}

.pagination-dropdown {
    margin: 0 10px; /* Add space between the dropdown and the other elements */
}

.select2-container--default .select2-selection--single{
   padding: 0.35rem 2.7rem 2rem 0.9rem;
   font-size: .875rem;
    font-weight: 400;
    border-color:#dee2e6;
}
.select2-container--default .select2-selection--single .select2-selection__arrow {
    top: 7px !important;    
    right: 5px !important;
}

.ck-editor__editable {
    min-height: 200px;
}

.close-icon {
    position: absolute;
    top: 0;
    left: 0;
    z-index: 1; /* Adjust the z-index as needed */
}
</style>