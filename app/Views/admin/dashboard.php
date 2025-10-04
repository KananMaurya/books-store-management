  <main class="content p-4">
      <h1 class="mb-4">Welcome, <?= session()->get('username') ?? 'Admin' ?> 👋</h1>
      <div class="row g-3">
        <div class="col-md-3">
          <div class="card shadow-sm border-0">
            <div class="card-body text-center">
              <i class="fa-solid fa-book fa-2x text-primary mb-2"></i>
              <h5 class="card-title"><?php if(!empty($totalbooks)){ echo $totalbooks;} ?></h5>
              <p class="text-muted">Total Books</p>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card shadow-sm border-0">
            <div class="card-body text-center">
              <i class="fa-solid fa-users fa-2x text-success mb-2"></i>
              <h5 class="card-title">85 Users</h5>
              <p class="text-muted">Registered Users</p>
            </div>
          </div>
        </div>
      </div>
    </main>
  