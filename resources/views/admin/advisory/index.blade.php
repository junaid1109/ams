@extends('layouts.admin')

@section('title', 'Advisory - Admin')
@section('page-title', 'Advisory Management')

@section('content')

<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        Advisory Items
        <a href="{{ route('admin.advisory.create') }}" class="btn btn-primary" style="float: right;">+ Add Advisory Item</a>
      </div>
      <div style="overflow-x: auto;">
        <table class="table">
          <thead>
            <tr>
              <th>Title</th>
              <th>Category</th>
              <th>Client</th>
              <th>Date</th>
              <th>Status</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            @foreach($advisory as $item)
            <tr>
              <td>{{ $item->title }}</td>
              <td>{{ $item->category }}</td>
              <td>{{ $item->client }}</td>
              <td>{{ $item->project_date ? $item->project_date->format('M d, Y') : 'N/A' }}</td>
              <td>
                <span class="badge @if($item->published) badge-success @else badge-danger @endif">
                  @if($item->published) Published @else Draft @endif
                </span>
              </td>
              <td>
                <a href="{{ route('admin.advisory.edit', $item) }}" class="btn btn-sm btn-primary">Edit</a>
                <form method="POST" action="{{ route('admin.advisory.destroy', $item) }}" style="display:inline;" onsubmit="return confirm('Are you sure?');">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                </form>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>

      <!-- Pagination -->
      <div style="padding: 20px;">
        {{ $advisory->links() }}
      </div>
    </div>
  </div>
</div>

@endsection
