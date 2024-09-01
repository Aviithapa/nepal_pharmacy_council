<div class="table-responsive">
    <table class="table table-nowrap table-hover mb-0">
        <thead>
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Slug</th>
                <th>Excerpt</th>
                @isset($id)
                @if ($id)
                <th>Id</th>
                @endif
                @endisset
                <th>Edit</th>
            </tr>
        </thead>
        <tbody>
            @foreach($modal as $index => $data)
            <tr>
                <td>{{ ++ $loop->index  }}</td>
                <td>{{ truncateText($data->title, 20) }}</td>
                <td>{{ truncateText($data->slug, 20) }}</td>
                <td>{{ truncateText($data->excerpt, 30) }}</td>
                @isset($id)
                @if ($id)
                <th>{{ $data->id }}</th>
                @endif
                
                @endisset
                <td>
                    @isset($edit)
                        @if ($edit)
                            <a href="{{ route($page . '.edit', [$page => $data->id]) }}"><span class="badge bg-info-subtle text-info">Edit</span></a>
                        @endif
                    @endisset

                    @isset($delete)
                        @if ($delete)
                            <a  data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@fat"  data-attr="{{ route($page . '.destroy', [$page => $data->id]) }}" style="cursor: pointer;"><span class="badge bg-danger-subtle text-danger">Delete</span></a>
                        @endif
                    @endisset
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
       <div style="padding: 10px; float:right;">
    {{  $modal->appends(request()->query())->links('admin.layout.pagination') }}
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="mySmallModalLabel">Delete Modal</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure want to delete?
                </div>
                <div class="modal-footer">
                    <form  action="#" method="POST" id="deleteForm">
                        @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        </form>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</div>






@push('scripts')
<script> 
     const exampleModal = document.getElementById('exampleModal')
     exampleModal.addEventListener('show.bs.modal', event => {
     const button = event.relatedTarget
     const recipient = button.getAttribute('data-attr')
      document.getElementById('deleteForm').action = recipient; 
     })
</script>
    
@endpush