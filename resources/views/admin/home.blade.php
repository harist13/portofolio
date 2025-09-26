@extends('admin.layout')

@section('title', 'Dashboard')

@section('content')
<!-- Pesan Sukses -->
@if (session('success'))
  <div class="alert alert-success">
    {{ session('success') }}
  </div>
@endif

<h1 class="page-title" style="margin-bottom: 24px;">Dashboard</h1>

<div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 24px;">
  <!-- Card Pengguna -->
  <div style="background: white; border-radius: 12px; box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1); padding: 16px;">
    <h2 style="font-weight: 600; margin-bottom: 8px;">Jumlah Pengguna</h2>
    <canvas id="userChart"></canvas>
  </div>
  <!-- Card Proyek -->
  <div style="background: white; border-radius: 12px; box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1); padding: 16px;">
    <h2 style="font-weight: 600; margin-bottom: 8px;">Jumlah Proyek</h2>
    <canvas id="projectChart"></canvas>
  </div>
</div>
@endsection

@push('scripts')
<script>
  const userCtx = document.getElementById('userChart');
  new Chart(userCtx, {
    type: 'bar',
    data: {
      labels: ['Admin', 'Operator', 'User'],
      datasets: [{
        label: 'Jumlah',
        data: [5, 10, 25],
        backgroundColor: '#2563eb'
      }]
    }
  });

  const projectCtx = document.getElementById('projectChart');
  new Chart(projectCtx, {
    type: 'pie',
    data: {
      labels: ['Selesai', 'Proses', 'Tertunda'],
      datasets: [{
        data: [12, 7, 3],
        backgroundColor: ['#16a34a', '#facc15', '#dc2626']
      }]
    }
  });
</script>
@endpush
