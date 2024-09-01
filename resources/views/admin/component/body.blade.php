<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body p-0">
                <div class="p-3">
                    <div class="card-widgets">
                        <a href="{{ route( $page . '.create') }}" class="btn btn-primary" style="color: white; text-transform: capitalize;">Create New {{ $page }}</a>
                    </div>
                    <h5 class="header-title mb-0" style="text-transform: capitalize;">{{ $page }} List</h5>
                </div>
                <div id="yearly-sales-collapse" class="collapse show">
                    <!-- List -->
                        @include('admin.component.list', ['page' => $page, 'modal' => $modal, 'edit' => $edit, 'delete' => $delete, 'id' => isset($id)])
                    <!-- List -->
                </div>
            </div>
        </div>
    </div>
</div>