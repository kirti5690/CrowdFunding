<?php
session_start();
if (!isset($_SESSION['admin_id'])) {
    header("Location: admin_login.php"); // Redirect to admin login if not logged in
    exit();
}
include_once 'model/databse.php';
include_once 'model/user.php';

$database = new Database();
$db = $database->getConnection();
$user = new User($db);

$volunteers=$user->getNonVolunteer();
$fundraisers = $user->getPendingFundraisers();
$approvedFundraisers = $user->getApprovedFundraisers();
$sentEmails = $user->sentEmails();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="assets/css/qrowd.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<style>
 .sidebar {
            background-color: #333;
            color: #fff;
            /* height: 100vh;
            width: 250px; */
            border-right: 1px solid #ddd;
            text-align: center;
            padding: 20px;
            transition: all 0.3s ease;
        }

.sidebar h2 {
    margin-bottom: 20px;
}

.sidebar img.sidebar-img {
    width: 120px; /* Set a fixed width for the image */
    height: 120px; /* Set a fixed height for the image */
    border-radius: 50%; /* Make the image round */
    object-fit: cover; /* Ensure the image fits within the specified dimensions */
    margin-bottom: 20px; /* Add some space below the image */
}

.sidebar nav a {
    display: block;
    margin-bottom: 10px;
    padding: 10px;
    color: #fff;
    text-decoration: none;
    border-radius: 4px;
    transition: all 0.3s ease;
}

.sidebar nav a:hover {
    background-color: #e9ecef;
    color:#333;
}

.main-content {
    padding: 20px;
}

.card {
    margin-bottom: 20px;
}

.table-responsive {
    margin-top: 20px;
}

#message {
    text-align: center;
    font-weight: bold;
}

#message.success {
    background-color: #d4edda;
    color: #155724;
}

#message.error {
    background-color: #f8d7da;
    color: #721c24;
}
button.approve, button.reject, button.delete {
    padding: 8px 12px;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

button.approve {
    background-color: #28a745;
}

button.approve:hover {
    background-color: #218838;
}

button.reject {
    background-color: #dc3545;
}

button.reject:hover {
    background-color: #c82333;
}

button.delete {
    background-color: #ffc107;
}

button.delete:hover {
    background-color: #e0a800;
}

table.display {
    padding-top:10px;
    width: 100%;
    border-collapse: collapse;
    background-color: #fff;
    margin-bottom: 30px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}
table.display thead {
    background-color: #343a40;
    color: white;
}
table.display tbody tr:nth-child(even) {
    background-color: #f4f4f4;
}

table.display tbody tr:hover {
    background-color: #e9ecef;
}
.tab-container {
            display: flex;
            justify-content: space-around;
            margin-bottom: 20px;
        }

        /* Tab buttons */
        .tab-button {
            padding: 30px 20px;
            border-radius:5px;
            background-color: #333;
            color: #fff;
            border: none;
            cursor: pointer;
            font-size: 20px;
        }

        .tab-button:hover {
            background-color: #e9ecef;
    color:#333;
        }

        /* Tab content sections */
        .tab-content {
            display: none;
        }

        /* Show the active tab content */
        .tab-content.active {
            display: block;
        }

        .table-responsive {
            margin-top: 20px;
        }

        .table-responsive table {
            width: 100%;
            border-collapse: collapse;
        }

        .table-responsive th, .table-responsive td {
            border: 1px solid #ddd;
            padding: 8px;
        }

        .table-responsive th {
            background-color: #f4f4f4;
            text-align: left;
        }

        .table-responsive tr:nth-child(even) {
            background-color: #f9f9f9;
        }
</style>


</head>

<body>
<div class="container-fluid">
    <div class="row">
    <div class="col-md-3 sidebar">
            <h2>Admin</h2>
            <img src="assets/images/extra/account.jpg" alt="Admin Photo" class="sidebar-img">
            <nav>
                <a href="#" onclick="loadContent('showFundraiser')">Show Fundraisers</a>
                <a href="#" onclick="loadContent('showDonor')">Show Donors</a>
                <a href="#" onclick="loadContent('showVolunteer')">Show Volunteers</a>
                <a href="#" onclick="loadContent('showCampaigns')">Show Campaigns</a>
                <a href="#" onclick="loadContent('showDashboard')">Dashboard</a>
            </nav>
        </div>

    <div class="col-md-9 main-content">
            <div id="message" style="display: none; margin: 20px; padding: 10px;"></div>

            <div class="row pt-3 pb-4">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            Welcome, Admin
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="card">
                                        <div class="card-header">Total Fundraisers</div>
                                        <div class="card-body">
                                            <div class="status-summary">
                                                <div>
                                                    <span class="value" id="total-fundraisers"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="card">
                                        <div class="card-header">Total Donors</div>
                                        <div class="card-body">
                                            <div class="status-summary">
                                                <div>
                                                    <span class="value" id="total-donors"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="card">
                                        <div class="card-header">Total Volunteers</div>
                                        <div class="card-body">
                                            <div class="status-summary">
                                                <div>
                                                    <span class="value" id="total-volunteers"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="card">
                                        <div class="card-header">Total Campaigns</div>
                                        <div class="card-body">
                                            <div class="status-summary">
                                                <div>
                                                    <span class="value" id="total-campaigns"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

    <div id="table-container">
    <div class="tab-container">
    <button class="tab-button" onclick="showTab('pending-fundraisers-tab')">Pending Fundraisers</button>
    <button class="tab-button" onclick="showTab('approved-fundraisers-tab')">Approved Fundraisers</button>
    <button class="tab-button" onclick="showTab('volunteers-status-tab')">Volunteers Status</button>
    <button class="tab-button" onclick="showTab('sent-emails-tab')">Sent Emails</button>
    </div>
    <div id="pending-fundraisers-tab" class="tab-content">
    <h2>Pending Fundraiser Approvals</h2>
    <div class="table-responsive">
        <table id="pending-fundraisers" class="display table table-bordered">
            <thead>
                <tr>
                    <th0>Username</th0>
                    <th>Email</th>
                    <th>Contact Info</th>
                    <th>Organization Name</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($fundraisers as $fundraiser): ?>
                <tr>
                    <td><?= $fundraiser['username'] ?></td>
                    <td><?= $fundraiser['email'] ?></td>
                    <td><?= $fundraiser['contact_information'] ?></td>
                    <td><?= $fundraiser['organization_name'] ?></td>
                    <td><?= $fundraiser['description'] ?></td>
                    <td>
                        <button class="approve" onclick="approveFundraiser(<?= $fundraiser['fundraiser_id']; ?>)">Approve</button>
                        <button class="reject" onclick="rejectFundraiser(<?= $fundraiser['fundraiser_id']; ?>)">Reject</button>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<div id="approved-fundraisers-tab" class="tab-content">
    <h2>Approved Fundraisers</h2>
    <div class="table-responsive">
        <table id="approved-fundraisers" class="display table table-bordered">
            <thead>
                <tr>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Organization Name</th>
                    <th>Approved At</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($approvedFundraisers as $fundraiser): ?>
                <tr>
                    <td><?= $fundraiser['username'] ?></td>
                    <td><?= $fundraiser['email'] ?></td>
                    <td><?= $fundraiser['organization_name'] ?></td>
                    <td><?= $fundraiser['approved_at'] ?></td>
                    <td><?= $fundraiser['status'] ?></td>
                    <td>
                        <button class="delete" onclick="deleteFundraiser(<?= $fundraiser['fundraiser_id']; ?>)">Delete</button>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<div id="volunteers-status-tab" class="tab-content">
    <h2>Volunteers Status</h2>
    <div class="table-responsive">
        <table id="pending-volunteers" class="display table table-bordered">
            <thead>
                <tr>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Occupation</th>
                    <th>Address</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($volunteers as $volunteer): ?>
                <tr>
                    <td><?= $volunteer['name'] ?></td>
                    <td><?= $volunteer['email'] ?></td>
                    <td><?= $volunteer['occupation'] ?></td>
                    <td><?= $volunteer['address'] ?></td>
                    <td><?= $volunteer['status'] ?></td>
                    <td>
                        <button class="approve" onclick="statusCompleted(<?= $volunteer['id']; ?>)">Completed</button>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<div id="sent-emails-tab" class="tab-content">
    <h2>Sent Emails</h2>
    <div class="table-responsive">
        <table id="sent-emails" class="display table table-bordered">
            <thead>
                <tr>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Subject</th>
                    <th>Message</th>
                    <th>Status</th>
                    <th>Action</th>
                    
                </tr>
            </thead>
            <tbody>
                <?php foreach ($sentEmails as $email): ?>
                <tr>
                    <td><?= $email['name'] ?></td>
                    <td><?= $email['email'] ?></td>
                    <td><?= $email['phone'] ?></td>
                    <td><?= $email['subject'] ?></td>
                    <td><?= $email['message'] ?></td>
                    <td><?= $email['status'] ?></td>
                    <td>
                        <button class="approve" onclick="statusReply(<?= $email['id']; ?>)">Replied</button>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
            </div>

            <div id="fundraisers-table" class="main_content" style="display:none;">
                <h2>Fundraisers Table</h2>
                <div class="table-responsive">
                    <table id="fundraisers-data" class="display table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Contact Information</th>
                                <th>Organization</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Data will be loaded here -->
                        </tbody>
                    </table>
                </div>
            </div>

            <div id="donors-table" class="main_content" style="display:none;">
                <h2>Donors Table</h2>
                <div class="table-responsive">
                    <table id="donors-data" class="display table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Occupation</th>
                                <th>Contact Information</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Data will be loaded here -->
                        </tbody>
                    </table>
                </div>
            </div>

            <div id="volunteers-table" class="main_content" style="display:none;">
                <h2>Volunteers Table</h2>
                <div class="table-responsive">
                    <table id="volunteers-data" class="display table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Occupation</th>
                                <th>Address</th>
                                <th>Status</th>
                                <th>Hours</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Data will be loaded here -->
                        </tbody>
                    </table>
                </div>
            </div>

            <div id="campaigns-table" class="main_content" style="display:none;">
                <h2>Campaigns Table</h2>
                <div class="table-responsive">
                    <table id="campaigns-data" class="display table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Goal Amount</th>
                                <th>Raised Amount</th>
                                <th>Category</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Data will be loaded here -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>




    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script>
    function showTab(tabId) {
        // Hide all tab contents
        document.querySelectorAll('.tab-content').forEach(function(tab) {
            tab.classList.remove('active');
        });
        
        // Show the selected tab content
        document.getElementById(tabId).classList.add('active');
    }

    // Show the first tab by default
    showTab('pending-fundraisers-tab');
</script>

<script>
 function loadContent(action) {
    $('#table-container').hide();
    $('#top').hide();

                console.log(action);
                switch(action) {
                    case 'showFundraiser':
                        $('#fundraisers-table').show();
                        loadFundraisersData();
                        break;
                    case 'showDonor':
                        $('#donors-table').show();
                        loadDonorsData();
                        break;
                    case 'showVolunteer':
                        $('#volunteers-table').show();
                        loadVolunteersData();
                        break;
                    case 'showCampaigns':
                        $('#campaigns-table').show();
                        loadCampaignsData();
                        break;
                    case 'showDashboard':
                        $('#table-container').show();
                        $('#top').show();
                        $('#donors-table').hide();
                        $('#fundraisers-table').hide();
                        $('#volunteers-table').hide();
                        $('#campaigns-table').hide();

                        break;
                    default:
                        console.log('Unknown action:', action);
                }
}
function loadFundraisersData() {
    $('#donors-table').hide();
    $('#volunteers-table').hide();
    $('#campaigns-table').hide();
    $('#top').hide();

                $.ajax({
                    url: 'controller/adminController.php',
                    method: 'POST',
                    contentType: 'application/json',
                    data: JSON.stringify({ action: 'getFundraisers1' }),
                    dataType: 'json',
                    success: function(data) {
                        const tableBody = $('#fundraisers-data tbody');
                        tableBody.empty();

                        data.forEach(function(fundraiser) {
                            tableBody.append(`
                                <tr>
                                    <td>${fundraiser.fundraiser_id}</td>
                                    <td>${fundraiser.username}</td>
                                    <td>${fundraiser.email}</td>
                                    <td>${fundraiser.contact_information}</td>
                                    <td>${fundraiser.organization_name}</td>
                                  
                                    <td>${fundraiser.status}</td>
                                    <td>
                                      <button class="reject" onclick="deleteFundraiser('${fundraiser.fundraiser_id}')">Delete</button>
                                      </td>
                                </tr>
                            `);
                        });

                        $('#fundraisers-data').DataTable();
                    },
                    error: function(xhr, status, error) {
                        console.error('AJAX error (Fundraisers):', status, error);
                    }
                });
}
function loadDonorsData() {
    $('#fundraisers-table').hide();
    $('#volunteers-table').hide();
    $('#campaigns-table').hide();
    $('#top').hide();

                $.ajax({
                    url: 'controller/adminController.php',
                    method: 'POST',
                    contentType: 'application/json',
                    data: JSON.stringify({ action: 'getDonors1' }),
                    dataType: 'json',
                    success: function(data) {
                        const tableBody = $('#donors-data tbody');
                        tableBody.empty();

                        data.forEach(function(donor) {
                            tableBody.append(`
                                <tr>
                                    <td>${donor.donor_id}</td>
                                    <td>${donor.username}</td>
                                    <td>${donor.email}</td>
                                    <td>${donor.occupation}</td>
                                    <td>${donor.contact_information}</td>
                                 
                                    <td>
                                          <button class="reject" onclick="deleteDonor('${donor.donor_id}')">Delete</button>
                                    </td>
                                </tr>
                            `);
                        });

                        $('#donors-data').DataTable();
                    },
                    error: function(xhr, status, error) {
                        console.error('AJAX error (Donors):', status, error);
                    }
                });
}
function loadVolunteersData() {
    $('#donors-table').hide();
    $('#fundraisers-table').hide();
    $('#campaigns-table').hide();
    $('#top').hide();

                $.ajax({
                    url: 'controller/adminController.php',
                    method: 'POST',
                    contentType: 'application/json',
                    data: JSON.stringify({ action: 'getVolunteers1' }),
                    dataType: 'json',
                    success: function(data) {
                        const tableBody = $('#volunteers-data tbody');
                        tableBody.empty();

                        data.forEach(function(volunteer) {
                            tableBody.append(`
                                <tr>
                                    <td>${volunteer.id}</td>
                                    <td>${volunteer.name}</td>
                                    <td>${volunteer.email}</td>
                                    <td>${volunteer.occupation}</td>
                                    <td>${volunteer.address}</td>
                                    <td>${volunteer.status}</td>
                                    <td>${volunteer.hours}</td>
                                    <td>
                                         <button class="reject" onclick="deleteVolunteer('${volunteer.id}')">Delete</button>
                                    </td>
                                </tr>
                            `);
                        });
                         console.log(data);
                        $('#volunteers-data').DataTable();
                    },
                    error: function(xhr, status, error) {
                        console.error('AJAX error (Volunteers):', status, error);
                    }
                });
}

function loadCampaignsData() {
    $('#donors-table').hide();
    $('#fundraisers-table').hide();
    $('#volunteers-table').hide();
    $('#top').hide();

                $.ajax({
                    url: 'controller/adminController.php',
                    method: 'POST',
                    contentType: 'application/json',
                    data: JSON.stringify({ action: 'getCampaigns1' }),
                    dataType: 'json',
                    success: function(data) {
                        const tableBody = $('#campaigns-data tbody');
                        tableBody.empty();

                        data.forEach(function(campaign) {
                            tableBody.append(`
                                <tr>
                                    <td>${campaign.campaign_id}</td>
                                    <td>${campaign.title}</td>
                                    <td>${campaign.goal_amount}</td>
                                    <td>${campaign.raised_amount}</td>
                                    <td>${campaign.category}</td>
                                    <td>${campaign.start_date}</td>
                                    <td>${campaign.end_date}</td>
                                    <td>${campaign.status}</td>
                                    <td>
                                        <button class="reject" onclick="deleteCampaign('${campaign.campaign_id}')">Delete</button>
                                    </td>
                                </tr>
                            `);
                        });

                        $('#campaigns-data').DataTable();
                    },
                    error: function(xhr, status, error) {
                        console.error('AJAX error (Campaigns):', status, error);
                    }
                });
}
$(document).ready(function() {
    
    $('#table-container').show();
    $('#top').show();

    $('#donors-table').hide();
    $('#fundraisers-table').hide();
    $('#volunteers-table').hide();
    $('#campaigns-table').hide();
});
</script>
<script>
    $(document).ready(function() {
    // Fetch fundraisers count
    $.ajax({
        url: 'controller/adminController.php',
        method: 'POST',
        contentType: 'application/json',
        data: JSON.stringify({ action: 'getFundraisersCount' }),
        dataType: 'json',
        success: function(data) {
            $('#total-fundraisers').text(data.totalFundraisers);
        },
        error: function(xhr, status, error) {
            console.error('AJAX error (Fundraisers):', status, error);
        }
    });

    // Fetch donors count
    $.ajax({
        url: 'controller/adminController.php',
        method: 'POST',
        contentType: 'application/json',
        data: JSON.stringify({ action: 'getDonorsCount' }),
        dataType: 'json',
        success: function(data) {
            $('#total-donors').text(data.totalDonors);
        },
        error: function(xhr, status, error) {
            console.error('AJAX error (Donors):', status, error);
        }
    });
    $.ajax({
        url: 'controller/adminController.php',
        method: 'POST',
        contentType: 'application/json',
        data: JSON.stringify({ action: 'getCampaignsCount' }),
        dataType: 'json',
        success: function(data) {
            $('#total-campaigns').text(data.totalCampaigns);
        },
        error: function(xhr, status, error) {
            console.error('AJAX error (Campaigns):', status, error);
        }
    });

    // Fetch volunteers count
    $.ajax({
        url: 'controller/adminController.php',
        method: 'POST',
        contentType: 'application/json',
        data: JSON.stringify({ action: 'getVolunteersCount' }),
        dataType: 'json',
        success: function(data) {
            console.log(data);
            $('#total-volunteers').text(data.totalVolunteers);
        },
        error: function(xhr, status, error) {
            console.error('AJAX error (Volunteers):', status, error);
        }
    });

  

   
});
</script>
<script>
        $(document).ready(function() {
            $('#pending-fundraisers').DataTable();
            $('#pending-volunteers').DataTable();
            $('#approved-fundraisers').DataTable();
            $('#sent-emails').DataTable();

        });
        
    function showMessage(type, text) {
    const messageDiv = $('#message');
    messageDiv.removeClass('success error').addClass(type);
    messageDiv.text(text).show();
    console.log(text);
    setTimeout(function() {
        messageDiv.fadeOut();
        location.reload(); 
    }, 3000); 
}

function approveFundraiser(fundraiserId) {
    $.ajax({
        url: 'controller/adminController.php',
        type: 'POST',
        contentType: 'application/json',
        dataType: 'json',
        data: JSON.stringify({
            action: 'approveFundraiser',
            fundraiser_id: fundraiserId
        }),
        success: function(response) {
            showMessage('success', response.message);
            
        },
        error: function(xhr, status, error) {
            console.log(error);
            showMessage('error', 'An error occurred while processing the request.');
        }
    });
}
function statusReply(emailId) {
    $.ajax({
        url: 'controller/adminController.php',
        type: 'POST',
        contentType: 'application/json',
        dataType: 'json',
        data: JSON.stringify({
            action: 'statusReply',
            id: emailId
        }),
        success: function(response) {
            showMessage('success', response.message);
            
        },
        error: function(xhr, status, error) {
            console.log(error);
            showMessage('error', 'An error occurred while processing the request.');
        }
    });
}

function rejectFundraiser(fundraiserId) {
    $.ajax({
        url: 'controller/adminController.php',
        type: 'POST',
        contentType: 'application/json',
        dataType: 'json',
        data: JSON.stringify({
            action: 'rejectFundraiser',
            fundraiser_id: fundraiserId
        }),
        success: function(response) {
            showMessage('success', response.message);
           
        },
        error: function(xhr, status, error) {
            console.log(error);
            showMessage('error', 'An error occurred while processing the request.');
        }
    });
}

function deleteFundraiser(fundraiserId) {
    $.ajax({
        url: 'controller/adminController.php',
        type: 'POST',
        contentType: 'application/json',
        dataType: 'json',
        data: JSON.stringify({
            action: 'deleteFundraiser',
            id: fundraiserId
        }),
        success: function(response) {
            showMessage('success', response.message);
            
        },
        error: function(xhr, status, error) {
            console.log(error);
            showMessage('error', 'An error occurred while processing the request.');
        }
    });
}
function  statusCompleted(id){
    $.ajax({
        url: 'controller/adminController.php',
        type: 'POST',
        contentType: 'application/json',
        dataType: 'json',
        data: JSON.stringify({
            action: 'statusComplete',
            id: id
        }),
        success: function(response) {
            showMessage('success', response.message);
            
        },
        error: function(xhr, status, error) {
            console.log(error);
            showMessage('error', 'An error occurred while processing the request.');
        }
    });
}

function deleteVolunteer(id) {
    $.ajax({
        url: 'controller/adminController.php',
        type: 'POST',
        contentType: 'application/json',
        dataType: 'json',
        data: JSON.stringify({
            action: 'deleteVolunteer',
            id: id
        }),
        success: function(response) {
            showMessage('success', response.message);
           
        },
        error: function(xhr, status, error) {
            console.log(error);
            showMessage('error', 'An error occurred while processing the request.');
        }
    });
}

function deleteDonor(donorId) {
    $.ajax({
        url: 'controller/adminController.php',
        type: 'POST',
        contentType: 'application/json',
        dataType: 'json',
        data: JSON.stringify({
            action: 'deleteDonor',
            donor_id:donorId
        }),
        success: function(response) {
            showMessage('success', response.message);
           
        },
        error: function(xhr, status, error) {
            console.log(error);
            showMessage('error', 'An error occurred while processing the request.');
        }
    });
}
function deleteCampaign(campaignId) {
    $.ajax({
        url: 'controller/adminController.php',
        type: 'POST',
        contentType: 'application/json',
        dataType: 'json',
        data: JSON.stringify({
            action: 'deleteCampaign',
            id:campaignId
        }),
        success: function(response) {
            showMessage('success', response.message);
            // location.reload(); 
        },
        error: function(xhr, status, error) {
            console.log(error);
            console.log(status);
            console.log(xhr);
            showMessage('error', 'An error occurred while processing the request.');
        }
    });
}


    </script>
</body>
</html> 
