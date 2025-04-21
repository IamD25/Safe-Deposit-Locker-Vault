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
          <li><a href="userDashboard.php" id="udash" class="link-dark rounded">Dashboard</a></li>
          <!-- <li><a href="#" class="link-dark rounded">Weekly</a></li> -->
          <!-- <li><a href="#" class="link-dark rounded">Monthly</a></li> -->
          <!-- <li><a href="#" class="link-dark rounded">Annually</a></li> -->
        </ul>
      </div>
    </li>
    
    <!-- <li class="border-top my-3"></li> -->
    <li class="mb-1">
      <button class="sidebar-btn bi-bell align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#payment-collapse" aria-expanded="false">
        Payment
      </button>
      <div class="collapse" id="payment-collapse">
        <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
          <li><a href="userPaymentHistory.php" id="transaction" class="link-dark rounded">Payment History</a></li>
          <!-- <li><a href="requestAproved.php" class="link-dark rounded">Aproved Request</a></li>
          <li><a href="requestReject.php" class="link-dark rounded">Reject Request</a></li>
          <li><a href="requestAll.php" class="link-dark rounded">All Request</a></li> -->
        </ul>
      </div>
    </li>
    <li class="mb-1">
      <button class="sidebar-btn align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#locker-collapse" aria-expanded="false">
      <i class="bi-solid bi-list"></i> Locker Access
      </button>
      <div class="collapse" id="locker-collapse">
        <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
          <!-- <li><a href="transactionToday.php" class="link-dark rounded">Today's Transaction</a></li> -->
          <!-- <li><a href="transactionYesterday.php" class="link-dark rounded">Yesterday's Transaction</a></li> -->
          <li><a href="userTransaction.php" id="inouttran" class="link-dark rounded">Access History</a></li>
        </ul>
      </div>
    </li>
  </ul>
</div>