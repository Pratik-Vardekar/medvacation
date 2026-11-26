@extends('layouts.admin')

@section('title', 'Edit About Page')

@section('content')

    <div class="container-fluid">

        <!-- Page Title -->
        <div
            class="page-title-head d-flex flex-column flex-md-row align-items-start align-items-md-center justify-content-between mb-4">
            <div>
                <h4 class="fw-bold mb-1">About Page Management</h4>
                <p class="text-muted mb-0">Manage content, vision & mission, leadership team, and SEO for Med Vacation's
                    About page</p>
            </div>
            <div class="d-flex align-items-center gap-2 mt-3 mt-md-0">
                <a href="{{ route('about') }}" target="_blank" class="btn btn-outline-info">
                    <i class="ti ti-external-link me-1"></i> View Live Page
                </a>
                <ol class="breadcrumb m-0 py-0 d-none d-md-flex">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Admin</a></li>
                    <li class="breadcrumb-item active">About Page</li>
                </ol>
            </div>
        </div>

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="ti ti-check fs-18 me-2"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if (isset($errors) && $errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <h6 class="alert-heading fw-bold mb-1">Please fix the following errors:</h6>
                <ul class="mb-0 ps-3">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <form action="{{ route('admin.about.update') }}" method="POST" enctype="multipart/form-data" id="aboutPageForm">
            @csrf

            <!-- Navigation Tabs -->
            <ul class="nav nav-pills nav-justified bg-white rounded shadow-sm p-2 mb-4" id="aboutTabs" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active fw-semibold" id="tab-section1-btn" data-bs-toggle="pill"
                        data-bs-target="#tab-section1" type="button" role="tab">
                        <i class="ti ti-info-circle me-1"></i> Section 1: About Med Vacation
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link fw-semibold" id="tab-section2-btn" data-bs-toggle="pill"
                        data-bs-target="#tab-section2" type="button" role="tab">
                        <i class="ti ti-target me-1"></i> Section 2: Vision & Mission
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link fw-semibold" id="tab-section3-btn" data-bs-toggle="pill"
                        data-bs-target="#tab-section3" type="button" role="tab">
                        <i class="ti ti-users me-1"></i> Section 3: Leadership & Founders
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link fw-semibold" id="tab-seo-btn" data-bs-toggle="pill" data-bs-target="#tab-seo"
                        type="button" role="tab">
                        <i class="ti ti-seo me-1"></i> SEO Settings
                    </button>
                </li>
            </ul>

            <div class="tab-content" id="aboutTabsContent">

                <!-- ==========================================
                         TAB 1: ABOUT MED VACATION
                         ========================================== -->
                <div class="tab-pane fade show active" id="tab-section1" role="tabpanel">
                    <div class="card shadow-sm border-0 mb-4">
                        <div class="card-header bg-white py-3 border-bottom">
                            <h5 class="card-title mb-0 fw-bold text-primary">
                                <i class="ti ti-building-hospital me-2"></i> About Med Vacation Section
                            </h5>
                        </div>
                        <div class="card-body p-4">
                            <div class="row g-3">
                                <!-- Subtitle -->
                                <div class="col-md-4">
                                    <label class="form-label fw-semibold">Section Subtitle / Badge</label>
                                    <input type="text" name="about_subtitle" class="form-control"
                                        value="{{ old('about_subtitle', $about->about_subtitle ?? 'ABOUT MED VACATION') }}"
                                        placeholder="e.g. ABOUT MED VACATION">
                                    <small class="text-muted">Displays as the uppercase badge above the headline</small>
                                </div>

                                <!-- Main Title -->
                                <div class="col-md-8">
                                    <label class="form-label fw-semibold">Main Heading Title</label>
                                    <input type="text" name="main_title" class="form-control"
                                        value="{{ old('main_title', $about->main_title ?? 'Connecting the World to <span>India\'s Healthcare Excellence.</span>') }}"
                                        placeholder="e.g. Connecting the World to <span>India's Healthcare Excellence.</span>">
                                    <small class="text-muted">Use <code>&lt;span&gt;text&lt;/span&gt;</code> to highlight
                                        key words in brand color</small>
                                </div>

                                <!-- About Image -->
                                <div class="col-md-4">
                                    <label class="form-label fw-semibold">Section Image</label>
                                    <div class="border rounded p-2 text-center bg-light mb-2">
                                        @php
                                            $imageSrc = asset('frontend/images/about-pg.jpg');
                                            if (!empty($about->about_image)) {
                                                $imageSrc = str_starts_with($about->about_image, 'uploads/')
                                                    ? asset($about->about_image)
                                                    : asset($about->about_image);
                                            }
                                        @endphp
                                        <img id="aboutImagePreview" src="{{ $imageSrc }}" alt="About Image"
                                            class="img-fluid rounded shadow-sm"
                                            style="max-height: 220px; object-fit: cover;">
                                    </div>
                                    <input type="file" name="about_image" class="form-control" accept="image/*"
                                        onchange="previewImage(event, 'aboutImagePreview')">
                                    <small class="text-muted d-block mt-1">Recommended size: 600 x 700 px (JPG, PNG,
                                        WebP)</small>
                                </div>

                                <!-- Descriptions -->
                                <div class="col-md-8">
                                    <div class="mb-3">
                                        <label class="form-label fw-semibold">Paragraph 1</label>
                                        <textarea name="about_description_1" class="form-control" rows="3" placeholder="First introductory paragraph">{{ old('about_description_1', $about->about_description_1 ?? '') }}</textarea>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label fw-semibold">Paragraph 2</label>
                                        <textarea name="about_description_2" class="form-control" rows="3"
                                            placeholder="Second paragraph describing medical expertise">{{ old('about_description_2', $about->about_description_2 ?? '') }}</textarea>
                                    </div>

                                    <div>
                                        <label class="form-label fw-semibold">Paragraph 3</label>
                                        <textarea name="about_description_3" class="form-control" rows="3"
                                            placeholder="Third paragraph detailing patient journey support">{{ old('about_description_3', $about->about_description_3 ?? '') }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ==========================================
                         TAB 2: VISION & MISSION
                         ========================================== -->
                <div class="tab-pane fade" id="tab-section2" role="tabpanel">
                    <div class="card shadow-sm border-0 mb-4">
                        <div class="card-header bg-white py-3 border-bottom">
                            <h5 class="card-title mb-0 fw-bold text-primary">
                                <i class="ti ti-target me-2"></i> Our Purpose: Vision & Mission
                            </h5>
                        </div>
                        <div class="card-body p-4">
                            <div class="row g-3">
                                <!-- Purpose Subtitle -->
                                <div class="col-md-4">
                                    <label class="form-label fw-semibold">Purpose Subtitle / Badge</label>
                                    <input type="text" name="purpose_subtitle" class="form-control"
                                        value="{{ old('purpose_subtitle', $about->purpose_subtitle ?? 'OUR PURPOSE') }}"
                                        placeholder="e.g. OUR PURPOSE">
                                </div>

                                <!-- Purpose Title -->
                                <div class="col-md-8">
                                    <label class="form-label fw-semibold">Section Heading Title</label>
                                    <input type="text" name="purpose_title" class="form-control"
                                        value="{{ old('purpose_title', $about->purpose_title ?? 'Vision & <span>Mission</span>') }}"
                                        placeholder="e.g. Vision & <span>Mission</span>">
                                </div>

                                <!-- Vision -->
                                <div class="col-md-6">
                                    <div class="p-3 border rounded bg-light h-100">
                                        <div class="d-flex align-items-center mb-3 text-info">
                                            <i class="ti ti-eye fs-22 me-2"></i>
                                            <h6 class="fw-bold mb-0">Our Vision</h6>
                                        </div>
                                        <label class="form-label fw-semibold">Vision Statement</label>
                                        <textarea name="vision" class="form-control" rows="8"
                                            placeholder="Detail your vision for international patients...">{{ old('vision', $about->vision ?? '') }}</textarea>
                                        <small class="text-muted d-block mt-2">Enter paragraphs separated by new
                                            lines.</small>
                                    </div>
                                </div>

                                <!-- Mission -->
                                <div class="col-md-6">
                                    <div class="p-3 border rounded bg-light h-100">
                                        <div class="d-flex align-items-center mb-3 text-primary">
                                            <i class="ti ti-bulb fs-22 me-2"></i>
                                            <h6 class="fw-bold mb-0">Our Mission</h6>
                                        </div>
                                        <label class="form-label fw-semibold">Mission Statement / Objectives</label>
                                        <textarea name="mission" class="form-control" rows="8"
                                            placeholder="List core mission points (bullet points supported)...">{{ old('mission', $about->mission ?? '') }}</textarea>
                                        <small class="text-muted d-block mt-2">Start lines with • or - to format bulleted
                                            lists cleanly.</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ==========================================
                         TAB 3: LEADERSHIP & FOUNDERS
                         ========================================== -->
                <div class="tab-pane fade" id="tab-section3" role="tabpanel">
                    <div class="card shadow-sm border-0 mb-4">
                        <div
                            class="card-header bg-white py-3 border-bottom d-flex align-items-center justify-content-between">
                            <h5 class="card-title mb-0 fw-bold text-primary">
                                <i class="ti ti-users me-2"></i> Leadership Team & Founders
                            </h5>
                            <button type="button" class="btn btn-sm btn-success" id="addFounderBtn">
                                <i class="ti ti-plus me-1"></i> Add Team Member
                            </button>
                        </div>
                        <div class="card-body p-4">
                            <!-- Heading Details -->
                            <div class="row g-3 mb-4 p-3 bg-light rounded border">
                                <div class="col-md-4">
                                    <label class="form-label fw-semibold">Section Subtitle</label>
                                    <input type="text" name="founders_subtitle" class="form-control"
                                        value="{{ old('founders_subtitle', $about->founders_subtitle ?? 'OUR LEADERSHIP') }}"
                                        placeholder="e.g. OUR LEADERSHIP">
                                </div>
                                <div class="col-md-8">
                                    <label class="form-label fw-semibold">Section Heading Title</label>
                                    <input type="text" name="founders_title" class="form-control"
                                        value="{{ old('founders_title', $about->founders_title ?? 'Meet Our <span>Founders</span>') }}"
                                        placeholder="e.g. Meet Our <span>Founders</span>">
                                </div>
                                <div class="col-12">
                                    <label class="form-label fw-semibold">Section Description</label>
                                    <textarea name="founders_description" class="form-control" rows="2"
                                        placeholder="Short description under the founders heading">{{ old('founders_description', $about->founders_description ?? '') }}</textarea>
                                </div>
                            </div>

                            <!-- Existing Founders List -->
                            <h6 class="fw-bold mb-3 text-secondary">
                                <i class="ti ti-user-check me-1"></i> Current Leadership Members
                            </h6>

                            <div id="foundersContainer" class="row g-3">
                                @if (isset($about->founders) && $about->founders->count() > 0)
                                    @foreach ($about->founders as $founder)
                                        <div class="col-md-6 col-lg-4" id="founder-card-{{ $founder->id }}">
                                            <div class="card border shadow-sm h-100">
                                                <div class="card-body p-3">
                                                    <div class="d-flex align-items-center gap-3 mb-3">
                                                        @php
                                                            $fImg = asset('frontend/images/profile/user.jpg');
                                                            if (!empty($founder->image)) {
                                                                $fImg = asset($founder->image);
                                                            }
                                                        @endphp
                                                        <img id="founderPreview_{{ $founder->id }}"
                                                            src="{{ $fImg }}" alt="{{ $founder->name }}"
                                                            class="rounded-circle border"
                                                            style="width: 70px; height: 70px; object-fit: cover;">
                                                        <div class="flex-grow-1 overflow-hidden">
                                                            <h6 class="mb-1 text-truncate fw-bold">{{ $founder->name }}
                                                            </h6>
                                                            <span
                                                                class="badge bg-light text-dark text-truncate d-inline-block"
                                                                style="max-width: 100%;">{{ $founder->designation ?? 'Member' }}</span>
                                                        </div>
                                                        <button type="button" class="btn btn-outline-danger btn-sm p-1"
                                                            title="Delete Member"
                                                            onclick="confirmDeleteFounder({{ $founder->id }}, '{{ addslashes($founder->name) }}')">
                                                            <i class="ti ti-trash fs-16"></i>
                                                        </button>
                                                    </div>

                                                    <div class="mb-2">
                                                        <label class="form-label small fw-semibold mb-1">Full Name</label>
                                                        <input type="text" name="founders[{{ $founder->id }}][name]"
                                                            class="form-control form-control-sm"
                                                            value="{{ $founder->name }}" required>
                                                    </div>

                                                    <div class="mb-2">
                                                        <label class="form-label small fw-semibold mb-1">Designation /
                                                            Role</label>
                                                        <input type="text"
                                                            name="founders[{{ $founder->id }}][designation]"
                                                            class="form-control form-control-sm"
                                                            value="{{ $founder->designation }}">
                                                    </div>

                                                    <div class="row g-2 mb-2">
                                                        <div class="col-8">
                                                            <label class="form-label small fw-semibold mb-1">Change
                                                                Photo</label>
                                                            <input type="file"
                                                                name="founders[{{ $founder->id }}][image]"
                                                                class="form-control form-control-sm" accept="image/*"
                                                                onchange="previewImage(event, 'founderPreview_{{ $founder->id }}')">
                                                        </div>
                                                        <div class="col-4">
                                                            <label class="form-label small fw-semibold mb-1">Sort
                                                                Order</label>
                                                            <input type="number"
                                                                name="founders[{{ $founder->id }}][sort_order]"
                                                                class="form-control form-control-sm"
                                                                value="{{ $founder->sort_order ?? 0 }}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="col-12" id="noFoundersMsg">
                                        <div class="alert alert-info py-3 text-center mb-0">
                                            <i class="ti ti-info-circle me-1"></i> No team members configured yet. Click
                                            "Add Team Member" above to add leadership profiles.
                                        </div>
                                    </div>
                                @endif
                            </div>

                            <!-- Container for Dynamically Added Members -->
                            <div id="newFoundersContainer" class="row g-3 mt-1"></div>

                        </div>
                    </div>
                </div>

                <!-- ==========================================
                         TAB 4: SEO SETTINGS
                         ========================================== -->
                <div class="tab-pane fade" id="tab-seo" role="tabpanel">
                    <div class="card shadow-sm border-0 mb-4">
                        <div class="card-header bg-white py-3 border-bottom">
                            <h5 class="card-title mb-0 fw-bold text-primary">
                                <i class="ti ti-search me-2"></i> Search Engine Optimization (SEO)
                            </h5>
                        </div>
                        <div class="card-body p-4">
                            <div class="row g-3">
                                <div class="col-12">
                                    <label class="form-label fw-semibold">Meta Title</label>
                                    <input type="text" name="meta_title" class="form-control"
                                        value="{{ old('meta_title', $about->meta_title ?? 'About Us | Med Vacation - Medical Tourism India') }}"
                                        placeholder="e.g. About Us | Med Vacation">
                                    <small class="text-muted">Recommended length: 50-60 characters</small>
                                </div>

                                <div class="col-12">
                                    <label class="form-label fw-semibold">Meta Description</label>
                                    <textarea name="meta_description" class="form-control" rows="3"
                                        placeholder="Enter brief description for search engine result snippets...">{{ old('meta_description', $about->meta_description ?? '') }}</textarea>
                                    <small class="text-muted">Recommended length: 150-160 characters</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Sticky Form Footer -->
            <div class="card border shadow-sm sticky-bottom mb-4 bg-white">
                <div class="card-body py-3 d-flex align-items-center justify-content-between">
                    <div>
                        <span class="text-muted small">All changes take effect immediately across the website upon
                            saving.</span>
                    </div>
                    <div class="d-flex gap-2">
                        <a href="{{ route('dashboard') }}" class="btn btn-outline-secondary">
                            Cancel
                        </a>
                        <button type="submit" class="btn btn-primary px-4 fw-semibold">
                            <i class="ti ti-device-floppy me-1"></i> Save All Changes
                        </button>
                    </div>
                </div>
            </div>

        </form>

        <!-- Hidden Form for Founder Deletion -->
        <form id="deleteFounderForm" method="POST" style="display: none;">
            @csrf
            @method('DELETE')
        </form>

    </div>

    <script>
        // Live image preview helper
        function previewImage(event, previewId) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const img = document.getElementById(previewId);
                    if (img) {
                        img.src = e.target.result;
                    }
                };
                reader.readAsDataURL(file);
            }
        }

        // Dynamic founder addition
        let newFounderIndex = 0;
        document.getElementById('addFounderBtn')?.addEventListener('click', function() {
            const noMsg = document.getElementById('noFoundersMsg');
            if (noMsg) noMsg.style.display = 'none';

            const container = document.getElementById('newFoundersContainer');
            const cardId = 'new_founder_' + newFounderIndex;
            const previewId = 'newFounderPreview_' + newFounderIndex;

            const html = `
            <div class="col-md-6 col-lg-4" id="${cardId}">
                <div class="card border border-success border-2 shadow-sm h-100">
                    <div class="card-body p-3">
                        <div class="d-flex align-items-center justify-content-between mb-3 pb-2 border-bottom">
                            <span class="badge bg-success"><i class="ti ti-plus me-1"></i> New Member</span>
                            <button type="button" class="btn btn-outline-danger btn-sm p-1" onclick="document.getElementById('${cardId}').remove()" title="Remove">
                                <i class="ti ti-x fs-16"></i>
                            </button>
                        </div>
                        <div class="d-flex align-items-center gap-3 mb-3">
                            <img id="${previewId}"
                                 src="{{ asset('frontend/images/profile/user.jpg') }}"
                                 alt="New Member"
                                 class="rounded-circle border"
                                 style="width: 70px; height: 70px; object-fit: cover;">
                            <div class="flex-grow-1">
                                <label class="form-label small fw-semibold mb-1">Upload Photo</label>
                                <input type="file"
                                       name="new_founders[${newFounderIndex}][image]"
                                       class="form-control form-control-sm"
                                       accept="image/*"
                                       onchange="previewImage(event, '${previewId}')">
                            </div>
                        </div>

                        <div class="mb-2">
                            <label class="form-label small fw-semibold mb-1">Full Name *</label>
                            <input type="text"
                                   name="new_founders[${newFounderIndex}][name]"
                                   class="form-control form-control-sm"
                                   placeholder="e.g. Dr. Jane Doe"
                                   required>
                        </div>

                        <div class="mb-2">
                            <label class="form-label small fw-semibold mb-1">Designation / Role</label>
                            <input type="text"
                                   name="new_founders[${newFounderIndex}][designation]"
                                   class="form-control form-control-sm"
                                   placeholder="e.g. Chief Medical Officer">
                        </div>

                        <div class="mb-2">
                            <label class="form-label small fw-semibold mb-1">Sort Order</label>
                            <input type="number"
                                   name="new_founders[${newFounderIndex}][sort_order]"
                                   class="form-control form-control-sm"
                                   value="${newFounderIndex + 10}">
                        </div>
                    </div>
                </div>
            </div>
        `;

            container.insertAdjacentHTML('beforeend', html);
            newFounderIndex++;

            // Switch to the leadership tab if not active
            const tabBtn = document.getElementById('tab-section3-btn');
            if (tabBtn) {
                const tab = new bootstrap.Tab(tabBtn);
                tab.show();
            }
        });

        // Delete existing founder handler
        function confirmDeleteFounder(founderId, founderName) {
            if (typeof Swal !== 'undefined') {
                Swal.fire({
                    title: 'Delete ' + founderName + '?',
                    text: "This team member will be removed from the leadership section.",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Yes, delete member'
                }).then((result) => {
                    if (result.isConfirmed) {
                        const deleteForm = document.getElementById('deleteFounderForm');
                        deleteForm.action = '{{ url('admin/about/founder') }}/' + founderId;
                        deleteForm.submit();
                    }
                });
            } else {
                if (confirm('Are you sure you want to remove ' + founderName + ' from the leadership team?')) {
                    const deleteForm = document.getElementById('deleteFounderForm');
                    deleteForm.action = '{{ url('admin/about/founder') }}/' + founderId;
                    deleteForm.submit();
                }
            }
        }
    </script>

@endsection
