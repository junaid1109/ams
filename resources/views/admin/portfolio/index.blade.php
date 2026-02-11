@extends('layouts.admin')

@section('title', 'Portfolio - Admin')
@section('page-title', 'Portfolio Management')

@section('content')

<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        Portfolio Items
        <a href="{{ route('admin.portfolio.create') }}" class="btn btn-primary" style="float: right;">+ Add Portfolio Item</a>
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
            @foreach($portfolios as $portfolio)
            <tr>
              <td>{{ $portfolio->title }}</td>
              <td>{{ $portfolio->category }}</td>
              <td>{{ $portfolio->client }}</td>
              <td>{{ $portfolio->project_date ? $portfolio->project_date->format('M d, Y') : 'N/A' }}</td>
              <td>
                <span class="badge @if($portfolio->published) badge-success @else badge-danger @endif">
                  @if($portfolio->published) Published @else Draft @endif
                </span>
              </td>
              <td>
                <a href="{{ route('admin.portfolio.edit', $portfolio) }}" class="btn btn-sm btn-primary">Edit</a>
                <form method="POST" action="{{ route('admin.portfolio.destroy', $portfolio) }}" style="display:inline;" onsubmit="return confirm('Are you sure?');">
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
        {{ $portfolios->links() }}
      </div>
    </div>
  </div>
</div>

@endsection
