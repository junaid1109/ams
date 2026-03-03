@extends('layouts.app')

@php
  $currentMenu = \App\Models\Menu::getCurrentPageMenu();
  $pageTitle = $currentMenu?->label ?? 'Team';
  $breadcrumbs = \App\Models\Menu::getBreadcrumbs();
@endphp

@section('title', (isset($siteName) ? $siteName : 'AMS') . ' - ' . $pageTitle)

<style>
  .read-more-btn {
    margin-top: 15px;
  }

  .team-member-modal .modal-body {
    text-align: center;
  }

  .team-member-modal .member-modal-img {
    width: 250px;
    height: 250px;
    margin: 0 auto 20px;
    border-radius: 8px;
    overflow: hidden;
    display: flex;
    align-items: center;
    justify-content: center;
  }

  .team-member-modal .member-modal-img img {
    width: 100%;
    height: 100%;
    object-fit: cover;
  }

  .team-member-modal .member-details {
    text-align: left;
  }

  .team-member-modal .social {
    margin-top: 20px;
    display: flex;
    gap: 10px;
    justify-content: center;
  }

  .team-member-modal .social a {
    width: 40px;
    height: 40px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 50%;
    background-color: #f0f0f0;
    color: #333;
    transition: all 0.3s ease;
  }

  .team-member-modal .social a:hover {
    background-color: #007bff;
    color: white;
  }
</style>

@section('content')

<!-- Page Title Section -->
<section class="page-title light-background" style="padding-top: 100px; padding-bottom: 60px;">
  <div class="container">
    <h1>{{ $pageTitle }}</h1>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        @foreach($breadcrumbs as $breadcrumb)
          @if($breadcrumb['url'])
          <li class="breadcrumb-item"><a href="{{ $breadcrumb['url'] }}">{{ $breadcrumb['label'] }}</a></li>
          @else
          <li class="breadcrumb-item active">{{ $breadcrumb['label'] }}</li>
          @endif
        @endforeach
      </ol>
    </nav>
  </div>
</section>

<!-- Team Section -->
<section class="team section light-background">
  <div class="container">
    <div class="row gy-4">
      @foreach($teamMembers as $member)
      <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
        <div class="team-member">
          @if($member->image)
          <div class="member-img">
            <img src="{{ asset('storage/' . $member->image) }}" class="img-fluid" alt="{{ $member->name }}">
          </div>
          @endif
          <div class="member-info">
            <h4>{{ $member->name }}</h4>
            <span>{{ $member->position }}</span>
            <p>{{ $member->bio }}</p>
            <div class="social">
              @if($member->twitter)<a href="{{ $member->twitter }}"><i class="bi bi-twitter-x"></i></a>@endif
              @if($member->facebook)<a href="{{ $member->facebook }}"><i class="bi bi-facebook"></i></a>@endif
              @if($member->instagram)<a href="{{ $member->instagram }}"><i class="bi bi-instagram"></i></a>@endif
              @if($member->linkedin)<a href="{{ $member->linkedin }}"><i class="bi bi-linkedin"></i></a>@endif
            </div>
            <button class="btn btn-primary btn-sm read-more-btn" onclick="openTeamModal({{ $member->id }})">Read More</button>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>

<!-- Team Member Modal -->
<div class="modal fade" id="teamMemberModal" tabindex="-1" role="dialog" aria-labelledby="teamMemberModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content team-member-modal">
      <div class="modal-header">
        <h5 class="modal-title" id="teamMemberModalLabel">Team Member Details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="member-modal-img" id="memberModalImage">
          <!-- Image will be inserted here -->
        </div>
        <h3 id="memberModalName"></h3>
        <p style="color: #666; font-size: 16px; font-weight: 500;" id="memberModalPosition"></p>
        
        <div id="memberContactInfo" style="margin: 20px 0; padding: 15px; background-color: #f9f9f9; border-radius: 5px;">
          <div id="memberEmailDiv" style="display: none; margin-bottom: 10px;">
            <strong>📧 Email:</strong> <a href="mailto:" id="memberEmail"></a>
          </div>
          <div id="memberPhoneDiv" style="display: none;">
            <strong>📞 Phone:</strong> <a href="tel:" id="memberPhone"></a>
          </div>
        </div>

        <div class="member-details">
          <p id="memberModalBio"></p>
        </div>
        <div class="social" id="memberModalSocial">
          <!-- Social links will be inserted here -->
        </div>
      </div>
    </div>
  </div>
</div>

<script>
  const teamMembers = @json($teamMembers);

  function openTeamModal(memberId) {
    const member = teamMembers.find(m => m.id === memberId);
    
    if (!member) return;

    // Set member details
    document.getElementById('memberModalName').textContent = member.name;
    document.getElementById('memberModalPosition').textContent = member.position;
    document.getElementById('memberModalBio').innerHTML = member.bio || '';

    // Set image
    let imageHtml = '';
    if (member.image) {
      imageHtml = `<img src="/storage/${member.image}" alt="${member.name}">`;
    }
    document.getElementById('memberModalImage').innerHTML = imageHtml;

    // Set email
    if (member.email) {
      document.getElementById('memberEmail').href = `mailto:${member.email}`;
      document.getElementById('memberEmail').textContent = member.email;
      document.getElementById('memberEmailDiv').style.display = 'block';
    } else {
      document.getElementById('memberEmailDiv').style.display = 'none';
    }

    // Set phone
    if (member.phone) {
      document.getElementById('memberPhone').href = `tel:${member.phone}`;
      document.getElementById('memberPhone').textContent = member.phone;
      document.getElementById('memberPhoneDiv').style.display = 'block';
    } else {
      document.getElementById('memberPhoneDiv').style.display = 'none';
    }

    // Set social links
    let socialHtml = '';
    if (member.twitter) {
      socialHtml += `<a href="${member.twitter}" target="_blank"><i class="bi bi-twitter-x"></i></a>`;
    }
    if (member.facebook) {
      socialHtml += `<a href="${member.facebook}" target="_blank"><i class="bi bi-facebook"></i></a>`;
    }
    if (member.instagram) {
      socialHtml += `<a href="${member.instagram}" target="_blank"><i class="bi bi-instagram"></i></a>`;
    }
    if (member.linkedin) {
      socialHtml += `<a href="${member.linkedin}" target="_blank"><i class="bi bi-linkedin"></i></a>`;
    }
    document.getElementById('memberModalSocial').innerHTML = socialHtml;

    // Show modal
    const modal = new bootstrap.Modal(document.getElementById('teamMemberModal'));
    modal.show();
  }
</script>

@endsection
