<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>
<div class="container-xl">
  <div class="admin-page-head">
    <div>
      <h2 class="app-page-title">Dashboard</h2>
      <p class="admin-page-desc">Selamat datang, <?= esc(session()->get('username')); ?>. Ringkasan data yang dipakai sistem pakar MentalCare.</p>
    </div>
  </div>

  <div class="app-card admin-card mb-4">
    <div class="app-card-header admin-card-header">
      <h3 class="admin-card-title">Data sistem</h3>
      <span class="admin-card-meta">Jumlah data saat ini</span>
    </div>
    <div class="app-card-body p-0">
      <div class="table-responsive">
        <table class="table admin-table">
          <thead>
            <tr>
              <th scope="col">Bagian</th>
              <th scope="col">Jumlah</th>
              <th scope="col" class="cell-actions">Kelola</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row">Penyakit</th>
              <td><?= count($penyakits); ?></td>
              <td class="cell-actions"><a href="/Penyakit">Kelola penyakit</a></td>
            </tr>
            <tr>
              <th scope="row">Gejala</th>
              <td><?= count($gejalas); ?></td>
              <td class="cell-actions"><a href="/Gejala">Kelola gejala</a></td>
            </tr>
            <tr>
              <th scope="row">Hasil diagnosa</th>
              <td><?= count($diagnosis); ?></td>
              <td class="cell-actions"><a href="/Diagnosa">Lihat hasil</a></td>
            </tr>
            <tr>
              <th scope="row">Pengguna</th>
              <td><?= count($users); ?></td>
              <td class="cell-actions"><a href="/User">Kelola pengguna</a></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <div class="app-card admin-card">
    <div class="app-card-header admin-card-header">
      <h3 class="admin-card-title">Data yang memengaruhi hasil</h3>
    </div>
    <div class="app-card-body p-3 p-lg-4">
      <p class="mb-3 text-secondary">Sistem mencocokkan gejala yang dipilih pengguna dengan aturan yang tersimpan. Perubahan pada penyakit, gejala, atau aturan akan memengaruhi hasil diagnosa.</p>
      <div class="admin-link-grid">
        <a class="btn app-btn-secondary" href="/Penyakit">Buka data penyakit</a>
        <a class="btn app-btn-secondary" href="/Gejala">Buka data gejala</a>
        <a class="btn app-btn-secondary" href="/Rule">Buka aturan diagnosa</a>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection() ?>
