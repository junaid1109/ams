@extends('layouts.admin')

@section('title', 'Features - Admin')
@section('page-title', 'Manage Features')

@section('content')

<div class="row mb-3">
  <div class="col-md-12">
    <a href="{{ route('admin.features.create') }}" class="btn btn-primary">+ Add New Feature</a>
  </div>
</div>

<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">Features List</div>
      <div class="table-responsive">
        <table class="table table-hover table-striped mb-0">
          <thead>
            <tr>
              <th>Icon</th>
              <th>Title</th>
              <th>Description</th>
              <th>Order</th>
              <th>Status</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            @forelse($features as $feature)
            <tr>
              <td>
                @if($feature->icon_file)
                  <img src="{{ asset('storage/' . $feature->icon_file) }}" alt="Feature Icon" style="max-width: 40px; max-height: 40px;">
                @else
                  <span class="text-muted">-</span>
                @endif
              </td>
              <td><strong>{{ $feature->title }}</strong></td>
              <td>{{ Str::limit($feature->description, 50) }}</td>
              <td>{{ $feature->order }}</td>
              <td>
                @if($feature->published)
                  <span class="badge bg-success">Published</span>
                @else
                  <span class="badge bg-secondary">Draft</span>
                @endif
              </td>
              <td>
                <a href="{{ route('admin.features.edit', $feature) }}" class="btn btn-sm btn-warning">Edit</a>
                <form action="{{ route('admin.features.destroy', $feature) }}" method="POST" style="display:inline;">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                </form>
              </td>
            </tr>
            @empty
            <tr>
              <td colspan="6" class="text-center text-muted">No features found. <a href="{{ route('admin.features.create') }}">Create one</a></td>
            </tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>
    <div class="d-flex justify-content-center">
      {{ $features->links() }}
    </div>
  </div>
</div>

@endsection
