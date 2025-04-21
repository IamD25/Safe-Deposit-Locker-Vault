<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <nav class="col-md-2 d-none d-md-block sidebar">
            <div class="sidebar-sticky">
                <h5 class="mb-4">Safe Deposit Locker</h5>
                <button id="btnDashboard" class="sidebar-btn bi bi-house " data-page="dashboard"> Dashboard</button>
                <button id="btnLockers" class="sidebar-btn bi bi-lock" data-page="lockers"> Lockers</button>
                <button id="btnCustomers" class="sidebar-btn bi bi-people" data-page="customers"> Customers</button>
                <!-- <button id="btn" class="sidebar-btn bi bi-calendar" data-page="settings"> Settings</button> -->
            </div>
        </nav>

        <div id="dashboard" class="col-md-10 ml-sm-auto px-4 content ">
            <div class="pt-3 pb-2 mb-3">
                <h1 class="h2">Dashboard</h1>
                <!-- <div class="btn-toolbar mb-2 mb-md-0">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search lockers..." id="searchInput">
                                <button class="btn btn-outline-secondary" type="button" onclick="searchLockers()">Search</button>
                            </div>
                        </div> -->
            </div>
            <div class="overview-box mt-3">
                <div class="head">
                    <h3 class="mt-4 mx-4">Overview of Users</h3>
                    <p class="mx-4 color-light">Key metics for your safe deposit locker business</p>
                </div>

                <div class="row">
                    <div class="col-md-3 mt-4 text-center">
                        <h1 name="totalUsers"> <?php echo $totalUsers; ?></h1>
                        <p>Total Users</p>
                    </div>
                    <div class="col-md-3 mt-4 text-center">
                        <h1 name="paidRentUsers"><?php echo $paidRentUsers; ?></h1>
                        <p>Paid Rent Users</p>
                    </div>
                    <div class="col-md-3 mt-4  text-center">
                        <h1 name="unpaidRentUsers"><?php echo $unpaidRentUsers; ?></h1>
                        <p>Unpaid Rent Users</p>
                    </div>
                    <div class="col-md-3 mt-4  text-center">
                        <h1 name="pendingUserReequests"><?php echo $pendingUserReequests; ?></h1>
                        <p>Pending User Requests</p>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>