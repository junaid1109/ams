@extends('layouts.admin')

@section('title', 'Advisory - Admin')
@section('page-title', 'Advisory Management')

@section('content')

<!-- Advisory Intro Section -->
<div class="row mb-4">
  <div class="col-md-12">
    <div class="card border-info">
      <div class="card-header bg-info text-white">
        <strong>Advisory Page Header</strong>
        <a href="{{ route('admin.home-sections.edit', $advisoryIntro->id ?? 0) }}" class="btn btn-light btn-sm" style="float: right;">
          ✏️ Edit Header
        </a>
      </div>
      <div class="card-body">
        <h5>{{ $advisoryIntro->title ?? 'No title set' }}</h5>
        <p class="text-muted mb-0">{{ $advisoryIntro->subtitle ?? 'No description set' }}</p>
      </div>
    </div>
  </div>
</div>

<!-- Text Blocks Section -->
<div class="row mb-4">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <strong>Text Blocks</strong>
        <a href="{{ route('admin.home-sections.create-advisory') }}" class="btn btn-success btn-sm" style="float: right;">+ Add New Text Block</a>
      </div>
      <div style="padding: 20px;">
        <table id="textBlocksTable" class="table table-striped table-hover">
          <thead class="table-dark">
            <tr>
              <th>Description</th>
              <th>Status</th>
              <th>Order</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            @forelse($textBlocks as $block)
            <tr>
              <td>{{ Str::limit($block->description, 80) ?? '-' }}</td>
              <td>
                <span class="badge @if($block->is_active) badge-success @else badge-secondary @endif">
                  @if($block->is_active) Active @else Inactive @endif
                </span>
              </td>
              <td>{{ $block->display_order ?? '-' }}</td>
              <td>
                <a href="{{ route('admin.home-sections.edit', $block->id) }}" class="btn btn-sm btn-primary" title="Edit">
                  <i class="fas fa-edit"></i> Edit
                </a>
                <button class="btn btn-sm btn-danger" onclick="deleteBlock({{ $block->id }})" title="Delete">
                  <i class="fas fa-trash"></i> Delete
                </button>
              </td>
            </tr>
            @empty
            <tr>
              <td colspan="4" class="text-center text-muted py-4">No text blocks added yet. <a href="{{ route('admin.home-sections.create-advisory') }}">Create one now</a></td>
            </tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<!-- Table Blocks Section -->
<div class="row mb-4">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <strong>Table Blocks</strong>
        <a href="{{ route('admin.home-sections.create-advisory-table') }}" class="btn btn-success btn-sm" style="float: right;">+ Add New Table Block</a>
      </div>
      <div style="padding: 20px;">
        <table id="tableBlocksTable" class="table table-striped table-hover">
          <thead class="table-dark">
            <tr>
              <th>Title</th>
              <th>Content Preview</th>
              <th>Status</th>
              <th>Order</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            @forelse($tableBlocks as $block)
            <tr>
              <td><strong>{{ $block->title ?? '-' }}</strong></td>
              <td>{{ Str::limit($block->description, 60) ?? '-' }}</td>
              <td>
                <span class="badge @if($block->is_active) badge-success @else badge-secondary @endif">
                  @if($block->is_active) Active @else Inactive @endif
                </span>
              </td>
              <td>{{ $block->display_order ?? '-' }}</td>
              <td>
                <a href="{{ route('admin.home-sections.edit', $block->id) }}" class="btn btn-sm btn-primary" title="Edit">
                  <i class="fas fa-edit"></i> Edit
                </a>
                <button class="btn btn-sm btn-danger" onclick="deleteBlock({{ $block->id }})" title="Delete">
                  <i class="fas fa-trash"></i> Delete
                </button>
              </td>
            </tr>
            @empty
            <tr>
              <td colspan="5" class="text-center text-muted py-4">No table blocks added yet. <a href="{{ route('admin.home-sections.create-advisory-table') }}">Create one now</a></td>
            </tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        Advisory Items
        <a href="{{ route('admin.advisory.create') }}" class="btn btn-primary" style="float: right;">+ Add Advisory Item</a>
      </div>
      <div style="padding: 20px;">
        <table id="advisoryTable" class="table table-striped table-hover">
          <thead class="table-dark">
            <tr>
              <th>Title</th>
              <th>Order</th>
              <th>Status</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            @foreach($advisory as $item)
            <tr>
              <td><strong>{{ $item->title }}</strong></td>
              <td>{{ $item->order ?? '-' }}</td>
              <td>
                <span class="badge @if($item->published) badge-success @else badge-secondary @endif">
                  @if($item->published) Published @else Draft @endif
                </span>
              </td>
              <td>
                <a href="{{ route('admin.advisory.edit', $item) }}" class="btn btn-sm btn-primary" title="Edit">
                  <i class="fas fa-edit"></i> Edit
                </a>
                <button class="btn btn-sm btn-danger" onclick="deleteItem({{ $item->id }})" title="Delete">
                  <i class="fas fa-trash"></i> Delete
                </button>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<!-- Delete Form (Hidden) -->
<form id="deleteForm" method="POST" style="display:none;">
  @csrf
  @method('DELETE')
</form>

<!-- DataTables CSS & JS -->
@push('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.bootstrap5.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
@endpush

@push('js')
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
<script>
  $(document).ready(function() {
    // Advisory Table
    $('#advisoryTable').DataTable({
      pageLength: 10,
      ordering: true,
      searching: true,
      paging: true,
      info: true,
      responsive: true,
      order: [[1, 'asc']], // Default sort by Order column
      columnDefs: [
        { 
          orderable: false, 
          targets: 3 // Actions column
        }
      ]
    });

    // Text Blocks Table
    $('#textBlocksTable').DataTable({
      pageLength: 10,
      ordering: true,
      searching: true,
      paging: true,
      info: true,
      responsive: true,
      order: [[2, 'asc']], // Default sort by Order column
      columnDefs: [
        { 
          orderable: false, 
          targets: 3 // Actions column
        }
      ]
    });
  });

  function deleteItem(id) {
    if (confirm('Are you sure you want to delete this item?')) {
      const form = document.getElementById('deleteForm');
      form.action = '/admin/advisory/' + id;
      form.submit();
    }
  }

  function deleteBlock(id) {
    if (confirm('Are you sure you want to delete this text block?')) {
      const form = document.getElementById('deleteBlockForm');
      form.action = '/admin/home-sections/' + id;
      form.submit();
    }
  }
</script>
@endpush

@endsection
