@extends('layouts.admin')

@section('title', 'Services - Admin')
@section('page-title', 'Services Management')

@section('content')

<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        Services
        <a href="{{ route('admin.services.create') }}" class="btn btn-primary" style="float: right;">+ Add Service</a>
      </div>
      <div style="overflow-x: auto;">
        <table class="table">
          <thead>
            <tr>
              <th>Title</th>
              <th>Short Description</th>
              <th>Order</th>
              <th>Status</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            @foreach($services as $service)
            <tr>
              <td>{{ $service->title }}</td>
              <td>{{ substr($service->short_description, 0, 50) }}...</td>
              <td>{{ $service->order }}</td>
              <td>
                <span class="badge @if($service->published) badge-success @else badge-danger @endif">
                  @if($service->published) Published @else Draft @endif
                </span>
              </td>
              <td>
                <a href="{{ route('admin.services.edit', $service) }}" class="btn btn-sm btn-primary">Edit</a>
                <form method="POST" action="{{ route('admin.services.destroy', $service) }}" style="display:inline;" onsubmit="return confirm('Are you sure?');">
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
        {{ $services->links() }}
      </div>
    </div>
  </div>
</div>

@endsection
