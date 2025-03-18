@extends('admin.layout.app')

@section('content')

@include('admin.component.breadcrumb', ['title' => "Service Management"])
<style>
@keyframes smoothBlink {
    0% { background-color: #c1bdff; opacity: 1; }
    50% { background-color: #ffffff; opacity: 0.7; }
    100% { background-color: #c0c2fb; opacity: 1; }
}

.blink-row {
    background: #cdcfff !important;  
    color: white !important;
}


.red{
    background: #fadadd !important;  
    color: white !important;
}

.green{
    background: #d2f6d8 !important;  
    color: white !important;
}

.blue{
    background: #aaeaf7 !important;  
    color: white !important;
}

</style>
<div class="row">
    @foreach ($statusCounts as $status => $count)
        <div class="col-md-4">
            <div class="card text-center">
                <div class="card-header bg-primary text-white">
                    {{ ucfirst($status) }}
                </div>
                <div class="card-body">
                    <h5 class="card-title">{{ $count }}</h5>
                    <p class="card-text">Number of {{ $status }} applications</p>
                </div>
            </div>
        </div>
    @endforeach
</div>

<div class="card">
    <form action="{{ route('good-standing-main.index') }}" method="GET" novalidate>
        <div class="row" style="padding: 20px 10px 0px 10px;">
            <div class="col-lg-4 col-md-4 col-sm-6">
                <div class="mb-3">
                    <input type="text" class="form-control" id="validationCustom01" placeholder="Name" name="keyword" value="{{ request()->get('keyword') }}">
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6">
                <div class="mb-3">
                    <select class="form-control" id="statusSelect" name="status">
                        <option value="" {{ request()->get('status') === null ? 'selected' : '' }}>Select Status</option>
                        <option value="approved" {{ request()->get('status') === 'approved' ? 'selected' : '' }}>Approved</option>
                        <option value="rejected" {{ request()->get('status') === 'rejected' ? 'selected' : '' }}>Rejected</option>
                        <option value="pending" {{ request()->get('status') === 'pending' ? 'selected' : '' }}>Pending</option>
                    </select>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-3 col-sm-6">
                <div class="mb-3">
                    <input type="text" class="form-control" id="validationCustom01" placeholder="Citizenship" name="citizenship" value="{{ request()->get('citizenship') }}">
                </div>
            </div>
            <div class="col-lg-1 col-md-1 col-sm-6">
                <button class="btn btn-primary" type="submit">Search</button>
            </div>
        </div>
    </form>
</div>

<div class="row">
    

        <div class="card">
            <div class="card-body p-0">
                <div class="p-3">
                    <div class="card-widgets">
                        <form action="{{ url('export-data-good') }}" method="POST">
                            @csrf

                        <input type="hidden" name="noc_data" value="{{ request()->get('status') }}" />
                        <button type="submit"  class="btn btn-primary" style="color: white;">Export Data Good Standing</button>
                        </form>
                        {{-- <a href="{{ url('export-data-noc') }}" class="btn btn-primary" style="color: white;">Export Data Noc</a> --}}
                        {{-- <a href="{{ url('export-data-good') }}" class="btn btn-primary" style="color: white;">Export Data Good Standing</a> --}}

                    </div>
                    <h5 class="header-title mb-0">Good Standing Letter  List</h5>
                </div>

                <div id="yearly-sales-collapse" class="collapse show">
                    <div class="table-responsive">
                        <table class="table table-nowrap table-hover mb-0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Action</th>
                                    <th>Name</th>
                                    <th>Status</th>
                                    <th>NPC Enlisted</th>
                                    <th>Type</th>
                                    <th>Applied Date</th>
                                    <th>Dob</th>
                                    <th>Citizenship</th>
                                    <th>Phone Number</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($goodStanding as $index =>  $data)
                                @php
                                    $createdAt = \Carbon\Carbon::parse($data->created_at);
                                    $isRecent = $createdAt->diffInDays(now()) <= 2; // Check if created_at is within 2 days
                                
                                    $rowClass = $isRecent ? 'blink-row' : (
                                        $data->status === 'approved' ? 'green' : 
                                        ($data->status === 'rejected' ? 'red' : 'blue')
                                    );
                                @endphp
                                <tr class="{{ $rowClass }}">
                                    <td>{{ ++$index }}</td>
                                    <td>
                                        @if ($data->status === 'approved')
                                            <a target="_blank" href="{{ route('noc-main.show', ['noc_main' => $data->id]) }}">
                                                <span class="badge bg-purple-subtle text-purple" style="font-size: 18px; text-transform: capitalize;">View</span>
                                            </a>
                                            <a target="_blank" href="{{ getImage($data->pdf_link) }}">
                                                <span class="badge bg-pink-subtle text-pink" style="font-size: 18px; text-transform: capitalize;">Print</span>
                                            </a>
                                            @if (Auth::user()->mainRole()->name === 'super_admin')
                                                <a class="btn-approve" data-id="{{ $data->id }}" data-status="approved" style="cursor: pointer;">
                                                    <span class="badge bg-pink-subtle text-pink" style="font-size: 18px; text-transform: capitalize;">Re Generate</span>
                                                </a>
                                            @endif
                                            <a class="download" href="{{ url('download-images/' .$data->id) }}" data-status="download" style="cursor: pointer;">
                                                <span class="badge bg-pink-subtle text-pink" style="font-size: 18px; text-transform: capitalize;">Download</span>
                                            </a>
                                            
                                        @else
                                            <a target="_blank" href="{{ route('noc-main.show', ['noc_main' => $data->id]) }}">
                                                <span class="badge bg-purple-subtle  text-purple" style="font-size: 18px; text-transform: capitalize;">View</span>
                                            </a>
                                            @if (Auth::user()->mainRole()->name === 'super_admin')
                                            <a class="btn-approve" data-id="{{ $data->id }}" data-status="approved" style="cursor: pointer;">
                                                <span class="badge bg-pink-subtle text-pink" style="font-size: 18px; text-transform: capitalize;">Approve</span>
                                            </a>
                                            @endif
                                            <a class="btn-reject" data-id="{{ $data->id }}" data-status="rejected" style="cursor: pointer;">
                                                <span class="badge bg-pink-subtle text-pink" style="font-size: 18px; text-transform: capitalize;">Reject</span>
                                            </a>
                                        @endif
                                    </td>
                                    <td>{{ $data->title . ' ' . $data->first_name . ' ' . $data->middle_name . ' ' . $data->last_name }}</td>
                                    <td>{{ $data->status }}</td>
                                    <td>{{ $data->npc_enlisted }}</td>
                                    <td><span class="badge bg-success-subtle text-success" style="font-size: 18px; text-transform: capitalize;">{{ $data->good_standing ? 'Good Standing' : 'NOC' }}</span></td>
                                    <td>{{ \Carbon\Carbon::parse($data->created_at)->format('Y-m-d') }}                                    </td>
                                    <td>{{ $data->dob_ad . ' AD ' . $data->dob_bs . ' BS' }}</td>
                                    <td>{{ $data->citizenship }}</td>
                                    <td>{{ $data->user->email }}</td>
                                </tr>
                            
                                @endforeach
                            </tbody>
                        </table>
                        <div style="padding: 10px; float:right;">
                            {{ $goodStanding->appends(request()->query())->links('admin.layout.pagination') }}
                        </div>
                    </div>
                </div>
            </div>                           
        </div> 
   
</div>

<!-- Approve Modal -->
<div class="modal fade" id="approveModal" tabindex="-1" role="dialog" aria-labelledby="approveModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="approveModalLabel">Are you sure?</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="#" method="POST" id="approveForm">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <p>Are you sure you want to approve?</p>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Approve</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Reject Modal -->
<div class="modal fade" id="rejectModal" tabindex="-1" role="dialog" aria-labelledby="rejectModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="rejectModalLabel">Remarks</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="#" method="POST" id="rejectForm">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <input type="text" class="form-control" id="remarks" name="remarks" placeholder="Enter remarks" required>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger">Reject</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('.btn-approve').on('click', function() {
            const id = $(this).data('id');
            const url = '{{ route("noc.approve", ["id" => ":id", "status" => "approved"]) }}'.replace(':id', id);
            $('#approveForm').attr('action', url);
            $('#approveModal').modal('show');
        });

        $('.btn-reject').on('click', function() {
            const id = $(this).data('id');
            const url = '{{ route("noc-main.update", ["noc_main" => ":id", "status" => "rejected"]) }}'.replace(':id', id);
            $('#rejectForm').attr('action', url);
            $('#rejectModal').modal('show');
        });
    });
</script>
@endpush
