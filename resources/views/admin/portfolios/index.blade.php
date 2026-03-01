@extends('layouts.admin')

@section('title', 'Portfolio - Admin')
@section('page-title', 'Portfolios Management')

@section('content')

<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        Portfolios
        <a href="{{ route('admin.portfolios.create') }}" class="btn btn-primary" style="float: right;">+ Add Portfolio</a>
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
            @foreach($portfolios as $portfolio)
            <tr>
              <td>{{ $portfolio->title }}</td>
              <td>{{ substr($portfolio->short_description, 0, 50) }}...</td>
              <td>{{ $portfolio->order }}</td>
              <td>
                <span class="badge @if($portfolio->published) badge-success @else badge-danger @endif">
                  @if($portfolio->published) Published @else Draft @endif
                </span>
              </td>
              <td>
                <a href="{{ route('admin.portfolios.edit', ['portfolio' => $portfolio->id]) }}" class="btn btn-sm btn-primary">Edit</a>
                <form method="POST" action="{{ route('admin.portfolios.destroy', ['portfolio' => $portfolio->id]) }}" style="display:inline;" onsubmit="return confirm('Are you sure?');">
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
