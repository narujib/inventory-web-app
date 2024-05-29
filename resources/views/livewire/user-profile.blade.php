  <!-- User Sidebar -->
  <div class="col-xl-4 col-lg-5 col-md-5 order-1 order-md-0">
    <!-- User Card -->
    <div class="card mb-4">
      <div class="card-body">
        <div class="user-avatar-section">
          <div class=" d-flex align-items-center flex-column">
            <img class="img-fluid rounded my-4" src="{{ asset('sneat-bootstrap-free/img/avatars/7.png') }}" height="200" width="200" alt="User avatar">
            <div class="user-info text-center">
              <h4 class="mb-2"">{{ Auth::user()->name }}</h4>
              <span class="badge bg-label-secondary">{{ Auth::user()->position->name }}</span>
            </div>
          </div>
        </div>
        <h5 class="pb-2 border-bottom mb-4">Details</h5>
        <div class="info-container">
          <ul class="list-unstyled">
            <li class="mb-3">
              <span ><span class="fw-medium me-2">Username:</span>
              <span>violet.dev</span></span>
            </li>
            <li class="mb-3">
              <span ><span class="fw-medium me-2">Email:</span>
              <span>vafgot@vultukir.org</span></span>
            </li>
            <li class="mb-3">
              <span class="fw-medium me-2">Status:</span>
              <span class="badge bg-label-success">Active</span>
            </li>
            <li class="mb-3">
              <span ><span class="fw-medium me-2">Role:</span>
              <span>Author</span></span>
            </li>
            <li class="mb-3">
              <span ><span class="fw-medium me-2">Tax id:</span>
              <span>Tax-8965</span></span>
            </li>
            <li class="mb-3">
              <span ><span class="fw-medium me-2">Contact:</span>
              <span>(123) 456-7890</span></span>
            </li>
            <li class="mb-3">
              <span ><span class="fw-medium me-2">Languages:</span>
              <span>French</span></span>
            </li>
            <li class="mb-3">
              <span ><span class="fw-medium me-2">Country:</span>
              <span>England</span></span>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <!-- /User Card -->
  </div>
  <!--/ User Sidebar -->
