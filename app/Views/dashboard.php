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

  <?php if ($chartError) : ?>
    <div class="admin-flash admin-flash-error mb-4" role="alert">Ringkasan grafik tidak dapat dimuat. Data tabel tetap tersedia. Muat ulang halaman untuk mencoba lagi.</div>
  <?php else : ?>
    <div class="admin-chart-grid mb-4">
      <section class="app-card admin-card admin-chart-card" aria-labelledby="chart-cakupan-title">
        <div class="app-card-header admin-card-header">
          <h3 class="admin-card-title" id="chart-cakupan-title">Cakupan gejala dalam aturan</h3>
        </div>
        <div class="app-card-body p-3 p-lg-4">
          <?php if ((int) $cakupanGejala['total'] === 0) : ?>
            <p class="admin-empty-chart">Belum ada kolom gejala pada tabel aturan. Tambah gejala untuk melihat cakupan.</p>
          <?php else : ?>
            <?php
            $persen = (int) round(((int) $cakupanGejala['dipakai'] / (int) $cakupanGejala['total']) * 100);
            $lingkaran = 2 * 3.14159265 * 42;
            ?>
            <div class="admin-donut">
              <svg class="admin-donut-svg" viewBox="0 0 110 110" aria-hidden="true" focusable="false">
                <circle class="admin-donut-track" cx="55" cy="55" r="42"></circle>
                <circle class="admin-donut-value" cx="55" cy="55" r="42" stroke-dasharray="<?= $persen / 100 * $lingkaran; ?> <?= $lingkaran; ?>"></circle>
              </svg>
              <div class="admin-donut-label">
                <strong><?= $persen; ?>%</strong>
                <span>dari <?= (int) $cakupanGejala['total']; ?> gejala</span>
              </div>
            </div>
            <p class="admin-chart-desc"><?= (int) $cakupanGejala['dipakai']; ?> dari <?= (int) $cakupanGejala['total']; ?> gejala dipakai minimal satu aturan dari <?= (int) $cakupanGejala['jumlah_aturan']; ?> aturan yang tersimpan.</p>
            <ul class="admin-legend">
              <li><span class="admin-legend-swatch admin-legend-swatch-on"></span>Dipakai aturan</li>
              <li><span class="admin-legend-swatch admin-legend-swatch-off"></span>Belum dipakai</li>
            </ul>
            <?php if (!empty($cakupanGejala['teratas'])) : ?>
              <h4 class="admin-chart-subtitle">Gejala paling sering dipakai</h4>
              <ul class="admin-bars">
                <?php foreach ($cakupanGejala['teratas'] as $item) : ?>
                  <?php $lebar = (int) $cakupanGejala['jumlah_aturan'] > 0 ? (int) round(((int) $item['jumlah'] / (int) $cakupanGejala['jumlah_aturan']) * 100) : 0; ?>
                  <li>
                    <div class="admin-bar-head">
                      <span><span class="admin-code"><?= esc($item['kode']); ?></span> <?= esc($item['nama']); ?></span>
                      <span><?= (int) $item['jumlah']; ?>/<?= (int) $cakupanGejala['jumlah_aturan']; ?></span>
                    </div>
                    <div class="admin-bar-track"><span class="admin-bar-fill" style="width: <?= $lebar; ?>%"></span></div>
                  </li>
                <?php endforeach; ?>
              </ul>
            <?php endif; ?>
          <?php endif; ?>
        </div>
      </section>

      <section class="app-card admin-card admin-chart-card" aria-labelledby="chart-diagnosa-title">
        <div class="app-card-header admin-card-header">
          <h3 class="admin-card-title" id="chart-diagnosa-title">Diagnosa per penyakit</h3>
        </div>
        <div class="app-card-body p-3 p-lg-4">
          <?php if (empty($diagnosaPenyakit)) : ?>
            <p class="admin-empty-chart">Belum ada hasil diagnosa. Jalankan skrining agar distribusi penyakit tampil di sini.</p>
            <a class="admin-back-link" href="/Diagnosa">Lihat hasil diagnosa</a>
          <?php else : ?>
            <?php
            $maks = (int) max(array_column($diagnosaPenyakit, 'jumlah'));
            ?>
            <p class="admin-chart-desc">Jumlah hasil diagnosa per penyakit, diurutkan dari yang terbanyak.</p>
            <ul class="admin-bars">
              <?php foreach ($diagnosaPenyakit as $item) : ?>
                <?php $lebar = $maks > 0 ? (int) round(((int) $item['jumlah'] / $maks) * 100) : 0; ?>
                <li>
                  <div class="admin-bar-head">
                    <span><?= esc($item['nama']); ?></span>
                    <span><?= (int) $item['jumlah']; ?></span>
                  </div>
                  <div class="admin-bar-track"><span class="admin-bar-fill" style="width: <?= $lebar; ?>%"></span></div>
                </li>
              <?php endforeach; ?>
            </ul>
          <?php endif; ?>
        </div>
      </section>
    </div>
  <?php endif; ?>

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
