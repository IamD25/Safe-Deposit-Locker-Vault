<div class="p-3 sidebar d-md-block ">
  <span class="fs-5 fw-semibold">NAVIGATION</span>
  </a>
  <ul class="list-unstyled ps-0">

    <li class="my-1">
      <button class="sidebar-btn bi-speedometer2 align-items-center rounded collapsed" id="btnDashboard" data-bs-toggle="collapse" data-bs-target="#dashboard-collapse" aria-expanded="true">
        Dashboard
      </button>
      <div class="collapse" id="dashboard-collapse">
        <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
          <li><a href="adminDashboard.php" id="dash" class="link-dark rounded">Dashboard</a></li>

        </ul>
      </div>
    </li>
    <li class="mb-1">
      <button class="sidebar-btn bi-lock align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#lockers-collapse" aria-expanded="false">
        Lockers
      </button>
      <div class="collapse " id="lockers-collapse">
        <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
          <li><a href="lockerdetails.php" id="lockerdetails" class="link-dark rounded">Lockers Details</a></li>
          <!-- <li><a href="#" class="link-dark rounded">Manage Lockers</a></li> -->
          <li><a href="addlocker.php" id="addlocker" class="link-dark rounded">Add Lockers</a></li>
        </ul>
      </div>
    </li>
    <li class="mb-1">
      <button class="sidebar-btn bi-people align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#customers-collapse" aria-expanded="false">
        Customers
      </button>
      <div class="collapse" id="customers-collapse">
        <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
          <li><a href="customerDetails.php" id="customerdet" class="link-dark rounded">Customers Details</a></li>
          <li><a href="customerManage.php" id="customerman" class="link-dark rounded">Manage Customers</a></li>
          <li><a href="customerAdd.php" id="customeradd" class="link-dark rounded">Add Customers</a></li>
        </ul>
      </div>
    </li>
    <!-- <li class="border-top my-3"></li> -->
    <li class="mb-1">
      <button class="sidebar-btn bi-bell align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#request-collapse" aria-expanded="false">
        Requests
      </button>
      <div class="collapse" id="request-collapse">
        <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
          <li><a href="requestPending.php" id="reqpen" class="link-dark rounded">Pending Requests</a></li>
          <li><a href="requestAproved.php" id="reqapr" class="link-dark rounded">Aproved Request</a></li>
          <li><a href="requestReject.php" id="reqrej" class="link-dark rounded">Reject Request</a></li>
          <li><a href="requestAll.php" id="reqall" class="link-dark rounded">All Request</a></li>
        </ul>
      </div>
    </li>
    <li class="mb-1">
      <button class="sidebar-btn align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#transaction-collapse" aria-expanded="false">
        <i class="fa-solid fa-list"></i> Transaction
      </button>
      <div class="collapse" id="transaction-collapse">
        <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
          <li><a href="transactionToday.php" id="trantod" class="link-dark rounded">Today's Transaction</a></li>
          <!-- <li><a href="transactionYesterday.php" class="link-dark rounded">Yesterday's Transaction</a></li> -->
          <li><a href="TransactionAllTime.php" id="tranall" class="link-dark rounded">All Time Transaction</a></li>
        </ul>
      </div>
    </li>
    <li class="mb-1">
      <button class="sidebar-btn align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#payment-collapse" aria-expanded="false">
        <i class="fa-solid fa-list"></i> Payment
      </button>
      <div class="collapse" id="payment-collapse">
        <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
          <li><a href="paymentToday.php" id="paymentToday" class="link-dark rounded">Today's Payment</a></li>
          <li><a href="paymentView.php" id="paymentAll" class="link-dark rounded">All Payment</a></li>
        <li><a href="paymentAdd.php" id="paymentAdd" class="link-dark rounded">Add Payment </a></li>
        </ul>
      </div>
    </li>
  </ul>
</div>