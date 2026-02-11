@extends('layouts.admin')

@section('title', 'Dashboard - Admin')
@section('page-title', 'Dashboard')

@section('content')

<!-- Stats Cards -->
<div class="row">
  <div class="col-md-6 col-lg-3">
    <div class="stat-card">
      <div class="stat-value">{{ $stats['services'] }}</div>
      <div class="stat-label">Services</div>
    </div>
  </div>

  <div class="col-md-6 col-lg-3">
    <div class="stat-card" style="border-left-color: #28a745;">
      <div class="stat-value" style="color: #28a745;">{{ $stats['portfolios'] }}</div>
      <div class="stat-label">Portfolio Items</div>
    </div>
  </div>

  <div class="col-md-6 col-lg-3">
    <div class="stat-card" style="border-left-color: #ffc107;">
      <div class="stat-value" style="color: #ffc107;">{{ $stats['team_members'] }}</div>
      <div class="stat-label">Team Members</div>
    </div>
  </div>

  <div class="col-md-6 col-lg-3">
    <div class="stat-card" style="border-left-color: #dc3545;">
      <div class="stat-value" style="color: #dc3545;">{{ $stats['contacts'] }}</div>
      <div class="stat-label">Unread Messages</div>
    </div>
  </div>
</div>

<!-- Quick Actions -->
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">Quick Actions</div>
      <div class="card-body" style="padding: 20px;">
        <a href="{{ route('admin.home-sections.index') }}" class="btn btn-success">📋 Manage Home Sections</a>
        <a href="{{ route('admin.services.create') }}" class="btn btn-primary">+ Add Service</a>
        <a href="{{ route('admin.portfolio.create') }}" class="btn btn-primary">+ Add Portfolio Item</a>
        <a href="{{ route('admin.team.create') }}" class="btn btn-primary">+ Add Team Member</a>
        <a href="{{ route('admin.pages.create') }}" class="btn btn-primary">+ Add Page</a>
        <a href="{{ route('admin.settings.index') }}" class="btn btn-warning">⚙️ Settings</a>
      </div>
    </div>
  </div>
</div>

<!-- Recent Contacts -->
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        Latest Contact Messages
        <a href="{{ route('admin.contacts.index') }}" class="btn btn-sm btn-secondary" style="float: right;">View All</a>
      </div>
      <div style="overflow-x: auto;">
        <table class="table">
          <thead>
            <tr>
              <th>Name</th>
              <th>Email</th>
              <th>Subject</th>
              <th>Date</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($recentContacts as $contact)
            <tr>
              <td>{{ $contact->name }}</td>
              <td>{{ $contact->email }}</td>
              <td>{{ substr($contact->subject, 0, 30) }}...</td>
              <td>{{ $contact->created_at->format('M d, Y H:i') }}</td>
              <td>
                <a href="{{ route('admin.contacts.show', $contact) }}" class="btn btn-sm btn-primary">View</a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

@endsection
