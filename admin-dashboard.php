<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: admin-login.html");
    exit();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - AI-Solution</title>
    <!-- Bootstrap 5 CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <!-- Custom CSS -->
    <link href="css/admin.css" rel="stylesheet">
</head>
<body>
    <!-- Sidebar -->
    <div class="d-flex">
        <div class="sidebar bg-dark text-white vh-100 position-fixed" id="sidebar">
            <div class="p-3">
                <a href="#" class="d-flex align-items-center text-white text-decoration-none">
                    <span class="fs-4">AI-Solution</span>
                </a>
                <hr>
                <ul class="nav nav-pills flex-column mb-auto">
                    <li class="nav-item">
                        <a href="#dashboard" class="nav-link active" data-bs-toggle="pill">
                            <i class="bi bi-speedometer2 me-2"></i> Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="#inquiries" class="nav-link text-white" data-bs-toggle="pill">
                            <i class="bi bi-envelope me-2"></i> Contact Inquiries
                        </a>
                    </li>
                    <li>
                        <a href="#blog" class="nav-link text-white" data-bs-toggle="pill">
                            <i class="bi bi-journal-text me-2"></i> Blog Posts
                        </a>
                    </li>
                    <li>
                        <a href="#events" class="nav-link text-white" data-bs-toggle="pill">
                            <i class="bi bi-calendar-event me-2"></i> Events
                        </a>
                    </li>
                    <li>
                        <a href="#services" class="nav-link text-white" data-bs-toggle="pill">
                            <i class="bi bi-gear me-2"></i> Services
                        </a>
                    </li>
                    <li>
                        <a href="#testimonials" class="nav-link text-white" data-bs-toggle="pill">
                            <i class="bi bi-chat-square-quote me-2"></i> Testimonials
                        </a>
                    </li>
                </ul>
                <hr>
                <div class="dropdown">
                    <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser" data-bs-toggle="dropdown">
                        <i class="bi bi-person-circle me-2"></i>
                        <strong id="adminUsername">Admin</strong>
                    </a>
                    <li>
                        <form action="backend/logout.php" method="POST" style="margin: 0;">
                            <button type="submit" class="dropdown-item bg-transparent border-0 w-100 text-start">
                                Sign out
                            </button>
                        </form>
                    </li>

                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="content" id="main-content">
            <!-- Top Navigation -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                <button id="sidebarToggle" class="btn btn-link d-md-none rounded-circle me-3">
                    <i class="bi bi-list"></i>
                </button>
                
                <h4 class="mb-0" id="pageTitle">Dashboard</h4>
                
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown">
                            <span class="me-2 d-none d-lg-inline text-gray-600 small" id="adminEmail">admin@ai-solution.com</span>
                            <i class="bi bi-person-circle fs-4"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow">
                            <a class="dropdown-item" href="#">
                                <i class="bi bi-person me-2"></i> Profile
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#" id="logoutBtnTop">
                                <i class="bi bi-box-arrow-right me-2"></i> Logout
                            </a>
                        </div>
                    </li>
                </ul>
            </nav>

            <!-- Page Content -->
            <div class="container-fluid tab-content">
                <!-- Dashboard Tab -->
                <div class="tab-pane fade show active" id="dashboard">
                    <div class="row">
                        <!-- Cards -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col me-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                New Inquiries</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800" id="inquiriesCount">24</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="bi bi-envelope fs-2 text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col me-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Blog Posts</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800" id="blogCount">15</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="bi bi-journal-text fs-2 text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col me-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                                Upcoming Events</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800" id="eventsCount">5</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="bi bi-calendar-event fs-2 text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col me-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Services</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800" id="servicesCount">8</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="bi bi-gear fs-2 text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Recent Inquiries -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Recent Inquiries</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="recentInquiriesTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Company</th>
                                            <th>Email</th>
                                            <th>Date</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Filled by JavaScript -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Inquiries Tab -->
                <div class="tab-pane fade" id="inquiries">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 d-flex justify-content-between align-items-center">
                            <h6 class="m-0 font-weight-bold text-primary">All Contact Inquiries</h6>
                            <div>
                                <button class="btn btn-sm btn-outline-secondary me-2">
                                    <i class="bi bi-download"></i> Export
                                </button>
                                <button class="btn btn-sm btn-danger">
                                    <i class="bi bi-trash"></i> Delete Selected
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="inquiriesTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th width="5%"><input type="checkbox" id="selectAll"></th>
                                            <th>Name</th>
                                            <th>Company</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Date</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Filled by JavaScript -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Blog Tab -->
                <div class="tab-pane fade" id="blog">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 d-flex justify-content-between align-items-center">
                            <h6 class="m-0 font-weight-bold text-primary">Blog Posts</h6>
                            <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#addBlogModal">
                                <i class="bi bi-plus-lg"></i> Add New
                            </button>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="blogTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Title</th>
                                            <th>Author</th>
                                            <th>Category</th>
                                            <th>Date</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Filled by JavaScript -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Events Tab -->
                <div class="tab-pane fade" id="events">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 d-flex justify-content-between align-items-center">
                            <h6 class="m-0 font-weight-bold text-primary">Events</h6>
                            <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#addEventModal">
                                <i class="bi bi-plus-lg"></i> Add New
                            </button>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="eventsTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Event Name</th>
                                            <th>Date</th>
                                            <th>Location</th>
                                            <th>Type</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Filled by JavaScript -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Services Tab -->
                <div class="tab-pane fade" id="services">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 d-flex justify-content-between align-items-center">
                            <h6 class="m-0 font-weight-bold text-primary">Services</h6>
                            <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#addServiceModal">
                                <i class="bi bi-plus-lg"></i> Add New
                            </button>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="servicesTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Service Name</th>
                                            <th>Category</th>
                                            <th>Icon</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Filled by JavaScript -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Testimonials Tab -->
                <div class="tab-pane fade" id="testimonials">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 d-flex justify-content-between align-items-center">
                            <h6 class="m-0 font-weight-bold text-primary">Testimonials</h6>
                            <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#addTestimonialModal">
                                <i class="bi bi-plus-lg"></i> Add New
                            </button>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="testimonialsTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Client</th>
                                            <th>Company</th>
                                            <th>Rating</th>
                                            <th>Date</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Filled by JavaScript -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Blog Modal -->
    <div class="modal fade" id="addBlogModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add New Blog Post</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="blogForm">
                        <div class="mb-3">
                            <label for="blogTitle" class="form-label">Title</label>
                            <input type="text" class="form-control" id="blogTitle" required>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="blogAuthor" class="form-label">Author</label>
                                <input type="text" class="form-control" id="blogAuthor" required>
                            </div>
                            <div class="col-md-6">
                                <label for="blogCategory" class="form-label">Category</label>
                                <select class="form-select" id="blogCategory" required>
                                    <option value="">Select Category</option>
                                    <option value="AI">AI & Machine Learning</option>
                                    <option value="Cloud">Cloud Computing</option>
                                    <option value="Development">Software Development</option>
                                    <option value="Security">Cybersecurity</option>
                                    <option value="Trends">Industry Trends</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="blogImage" class="form-label">Featured Image</label>
                            <input class="form-control" type="file" id="blogImage">
                        </div>
                        <div class="mb-3">
                            <label for="blogContent" class="form-label">Content</label>
                            <textarea class="form-control" id="blogContent" rows="8" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="blogExcerpt" class="form-label">Excerpt</label>
                            <textarea class="form-control" id="blogExcerpt" rows="3" required></textarea>
                        </div>
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="blogPublished">
                            <label class="form-check-label" for="blogPublished">Publish immediately</label>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" id="saveBlogBtn">Save Blog Post</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Event Modal -->
    <div class="modal fade" id="addEventModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add New Event</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="eventForm">
                        <div class="mb-3">
                            <label for="eventName" class="form-label">Event Name</label>
                            <input type="text" class="form-control" id="eventName" required>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="eventDate" class="form-label">Date</label>
                                <input type="date" class="form-control" id="eventDate" required>
                            </div>
                            <div class="col-md-6">
                                <label for="eventType" class="form-label">Type</label>
                                <select class="form-select" id="eventType" required>
                                    <option value="">Select Type</option>
                                    <option value="conference">Conference</option>
                                    <option value="workshop">Workshop</option>
                                    <option value="meetup">Meetup</option>
                                    <option value="webinar">Webinar</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="eventLocation" class="form-label">Location</label>
                            <input type="text" class="form-control" id="eventLocation" required>
                        </div>
                        <div class="mb-3">
                            <label for="eventDescription" class="form-label">Description</label>
                            <textarea class="form-control" id="eventDescription" rows="4" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="eventImage" class="form-label">Event Image</label>
                            <input class="form-control" type="file" id="eventImage">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" id="saveEventBtn">Save Event</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Service Modal -->
    <div class="modal fade" id="addServiceModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add New Service</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="serviceForm">
                        <div class="mb-3">
                            <label for="serviceName" class="form-label">Service Name</label>
                            <input type="text" class="form-control" id="serviceName" required>
                        </div>
                        <div class="mb-3">
                            <label for="serviceCategory" class="form-label">Category</label>
                            <select class="form-select" id="serviceCategory" required>
                                <option value="">Select Category</option>
                                <option value="ai">AI Solutions</option>
                                <option value="cloud">Cloud Services</option>
                                <option value="development">Software Development</option>
                                <option value="security">Cybersecurity</option>
                                <option value="analytics">Data Analytics</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="serviceIcon" class="form-label">Icon Class (Bootstrap Icons)</label>
                            <input type="text" class="form-control" id="serviceIcon" placeholder="bi-gear" required>
                            <small class="text-muted">Browse icons at <a href="https://icons.getbootstrap.com/" target="_blank">Bootstrap Icons</a></small>
                        </div>
                        <div class="mb-3">
                            <label for="serviceDescription" class="form-label">Description</label>
                            <textarea class="form-control" id="serviceDescription" rows="3" required></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" id="saveServiceBtn">Save Service</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Inquiry Detail Modal -->
    <div class="modal fade" id="inquiryDetailModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Inquiry Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="inquiryDetailContent">
                    <!-- Filled by JavaScript -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-danger">
                        <i class="bi bi-trash"></i> Delete
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Admin JS -->
    <script src="../js/admin-auth.js"></script>
    <script src="../js/admin-dashboard.js"></script>
</body>
</html>