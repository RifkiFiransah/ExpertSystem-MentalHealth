<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>
<div class="container-xl">
  <h2 class="app-page-title">Dashboard</h2>

  <div class="app-card mb-4 p-3 p-lg-4">
    <h3 class="mb-2">Selamat datang, <?= session()->get('username'); ?>.</h3>
    <p class="mb-0 text-secondary">Ringkasan data yang dipakai sistem pakar. Pilih bagian untuk mengubah data.</p>
  </div>

  <div class="app-card mb-4 p-3 p-lg-4">
    <h3 class="mb-3">Data sistem</h3>
    <div class="table-responsive">
      <table class="table mb-0 align-middle">
        <tbody>
          <tr>
            <th scope="row">Penyakit</th>
            <td><?= count($penyakits); ?></td>
            <td><a href="/Penyakit">Kelola penyakit</a></td>
          </tr>
          <tr>
            <th scope="row">Gejala</th>
            <td><?= count($gejalas); ?></td>
            <td><a href="/Gejala">Kelola gejala</a></td>
          </tr>
          <tr>
            <th scope="row">Hasil diagnosa</th>
            <td><?= count($diagnosis); ?></td>
            <td><a href="/Diagnosa">Lihat hasil</a></td>
          </tr>
          <tr>
            <th scope="row">Pengguna</th>
            <td><?= count($users); ?></td>
            <td><a href="/User">Kelola pengguna</a></td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>

  <div class="app-card p-3 p-lg-4">
    <h3 class="mb-3">Data yang memengaruhi hasil</h3>
    <p class="text-secondary">Sistem mencocokkan gejala yang dipilih pengguna dengan aturan yang tersimpan. Perubahan pada penyakit, gejala, atau aturan akan memengaruhi hasil diagnosa.</p>
    <div class="mt-3 d-flex flex-wrap gap-2">
      <a class="btn app-btn-secondary" href="/Penyakit">Buka data penyakit</a>
      <a class="btn app-btn-secondary" href="/Gejala">Buka data gejala</a>
      <a class="btn app-btn-secondary" href="/Rule">Buka aturan diagnosa</a>
    </div>
  </div>
</div>
<?= $this->endSection() ?>
