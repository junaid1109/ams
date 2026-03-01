@extends('layouts.admin')

@section('title', 'FAQs - Admin')
@section('page-title', 'FAQs Management')

@section('content')

<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header d-flex justify-content-between align-items-center">
        <span>Frequently Asked Questions</span>
        <a href="{{ route('admin.faqs.create') }}" class="btn btn-primary btn-sm">+ Add FAQ</a>
      </div>
      <div class="card-body">
        @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          {{ session('success') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
        @endif

        @if($faqs->count())
        <div class="table-responsive">
          <table class="table table-hover">
            <thead class="table-light">
              <tr>
                <th>Question</th>
                <th>Status</th>
                <th>Order</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              @foreach($faqs as $faq)
              <tr>
                <td>
                  <strong>{{ $faq->question }}</strong>
                </td>
                <td>
                  @if($faq->published)
                  <span class="badge bg-success">Published</span>
                  @else
                  <span class="badge bg-secondary">Draft</span>
                  @endif
                </td>
                <td>{{ $faq->order }}</td>
                <td>
                  <a href="{{ route('admin.faqs.edit', $faq) }}" class="btn btn-sm btn-warning">Edit</a>
                  <form action="{{ route('admin.faqs.destroy', $faq) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                  </form>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>

        {{ $faqs->links() }}
        @else
        <div class="alert alert-info">
          No FAQs found. <a href="{{ route('admin.faqs.create') }}">Create one</a>
        </div>
        @endif
      </div>
    </div>
  </div>
</div>

@endsection
