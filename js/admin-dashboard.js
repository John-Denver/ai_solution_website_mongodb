document.addEventListener('DOMContentLoaded', function() {
    // Check authentication
    if (!localStorage.getItem('adminToken')) {
        window.location.href = 'admin-login.html';
        return;
    }

    // Set admin username
    const adminUsername = localStorage.getItem('adminUsername') || 'Admin';
    document.getElementById('adminUsername').textContent = adminUsername;
    document.querySelectorAll('#adminUsername, #adminEmail').forEach(el => {
        el.textContent = adminUsername;
    });

    // Toggle sidebar on small screens
    const sidebarToggle = document.getElementById('sidebarToggle');
    if (sidebarToggle) {
        sidebarToggle.addEventListener('click', function() {
            document.getElementById('sidebar').classList.toggle('active');
            document.getElementById('main-content').classList.toggle('active');
        });
    });

    // Update page title when tabs change
    const tabPanes = document.querySelectorAll('.tab-pane');
    const pageTitle = document.getElementById('pageTitle');
    
    tabPanes.forEach(pane => {
        pane.addEventListener('show.bs.tab', function() {
            const activeTab = document.querySelector('.nav-link[data-bs-target="#' + pane.id + '"]');
            if (activeTab) {
                const tabText = activeTab.textContent.trim();
                pageTitle.textContent = tabText;
            }
        });
    });

    // Initialize DataTables (you would need to include DataTables library)
    // This is a simplified version - in a real app you'd use the actual DataTables library
    function initDataTable(tableId, columns) {
        console.log(`Initializing table ${tableId} with columns:`, columns);
        // In a real implementation, you would use:
        // $('#' + tableId).DataTable({...});
    }

    // Initialize tables
    initDataTable('inquiriesTable', ['Name', 'Company', 'Email', 'Phone', 'Date', 'Actions']);
    initDataTable('blogTable', ['Title', 'Author', 'Category', 'Date', 'Status', 'Actions']);
    initDataTable('eventsTable', ['Event Name', 'Date', 'Location', 'Type', 'Status', 'Actions']);
    initDataTable('servicesTable', ['Service Name', 'Category', 'Icon', 'Status', 'Actions']);
    initDataTable('testimonialsTable', ['Client', 'Company', 'Rating', 'Date', 'Status', 'Actions']);

    // Load sample data (in a real app, you would fetch this from your API)
    loadSampleData();

    // Form submissions
    document.getElementById('saveBlogBtn')?.addEventListener('click', saveBlogPost);
    document.getElementById('saveEventBtn')?.addEventListener('click', saveEvent);
    document.getElementById('saveServiceBtn')?.addEventListener('click', saveService);

    // View inquiry details
    document.querySelectorAll('.view-inquiry').forEach(btn => {
        btn.addEventListener('click', viewInquiryDetails);
    });
});

function loadSampleData() {
    // Sample inquiries
    const inquiries = [
        {
            id: 1,
            name: 'John Smith',
            company: 'TechCorp',
            email: 'john@techcorp.com',
            phone: '(555) 123-4567',
            date: '2023-05-15',
            message: 'Interested in your AI solutions for our retail business.'
        },
        // Add more sample data...
    ];

    // Populate recent inquiries table
    const recentInquiriesTable = document.querySelector('#recentInquiriesTable tbody');
    inquiries.slice(0, 5).forEach(inquiry => {
        const row = document.createElement('tr');
        row.innerHTML = `
            <td>${inquiry.name}</td>
            <td>${inquiry.company}</td>
            <td>${inquiry.email}</td>
            <td>${inquiry.date}</td>
            <td>
                <button class="btn btn-sm btn-outline-primary view-inquiry" data-id="${inquiry.id}">
                    <i class="bi bi-eye"></i> View
                </button>
            </td>
        `;
        recentInquiriesTable.appendChild(row);
    });

    // Update counters
    document.getElementById('inquiriesCount').textContent = inquiries.length;
    document.getElementById('blogCount').textContent = '15';
    document.getElementById('eventsCount').textContent = '5';
    document.getElementById('servicesCount').textContent = '8';
}

function viewInquiryDetails(e) {
    const inquiryId = e.target.closest('button').getAttribute('data-id');
    // In a real app, you would fetch the inquiry details from your API
    const inquiry = {
        id: inquiryId,
        name: 'John Smith',
        company: 'TechCorp',
        email: 'john@techcorp.com',
        phone: '(555) 123-4567',
        jobTitle: 'CTO',
        country: 'United States',
        date: '2023-05-15 14:30',
        message: 'We are interested in implementing AI solutions for our retail business. Please provide more information about your offerings and pricing.'
    };

    const modalContent = document.getElementById('inquiryDetailContent');
    modalContent.innerHTML = `
        <div class="mb-3">
            <h6>Name</h6>
            <p>${inquiry.name}</p>
        </div>
        <div class="mb-3">
            <h6>Company</h6>
            <p>${inquiry.company}</p>
        </div>
        <div class="mb-3">
            <h6>Email</h6>
            <p>${inquiry.email}</p>
        </div>
        <div class="mb-3">
            <h6>Phone</h6>
            <p>${inquiry.phone}</p>
        </div>
        <div class="mb-3">
            <h6>Job Title</h6>
            <p>${inquiry.jobTitle}</p>
        </div>
        <div class="mb-3">
            <h6>Country</h6>
            <p>${inquiry.country}</p>
        </div>
        <div class="mb-3">
            <h6>Date</h6>
            <p>${inquiry.date}</p>
        </div>
        <div class="mb-3">
            <h6>Message</h6>
            <p>${inquiry.message}</p>
        </div>
    `;

    // Show the modal
    const modal = new bootstrap.Modal(document.getElementById('inquiryDetailModal'));
    modal.show();
}

function saveBlogPost() {
    // In a real app, you would send this data to your API
    const blogData = {
        title: document.getElementById('blogTitle').value,
        author: document.getElementById('blogAuthor').value,
        category: document.getElementById('blogCategory').value,
        content: document.getElementById('blogContent').value,
        excerpt: document.getElementById('blogExcerpt').value,
        published: document.getElementById('blogPublished').checked
    };

    console.log('Saving blog post:', blogData);
    alert('Blog post saved successfully!');
    // Close modal
    bootstrap.Modal.getInstance(document.getElementById('addBlogModal')).hide();
    // Reset form
    document.getElementById('blogForm').reset();
    // Refresh blog table (in a real app)
}

function saveEvent() {
    const eventData = {
        name: document.getElementById('eventName').value,
        date: document.getElementById('eventDate').value,
        type: document.getElementById('eventType').value,
        location: document.getElementById('eventLocation').value,
        description: document.getElementById('eventDescription').value
    };

    console.log('Saving event:', eventData);
    alert('Event saved successfully!');
    bootstrap.Modal.getInstance(document.getElementById('addEventModal')).hide();
    document.getElementById('eventForm').reset();
}

function saveService() {
    const serviceData = {
        name: document.getElementById('serviceName').value,
        category: document.getElementById('serviceCategory').value,
        icon: document.getElementById('serviceIcon').value,
        description: document.getElementById('serviceDescription').value
    };

    console.log('Saving service:', serviceData);
    alert('Service saved successfully!');
    bootstrap.Modal.getInstance(document.getElementById('addServiceModal')).hide();
    document.getElementById('serviceForm').reset();
}