<!doctype html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $title; ?></title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="shortcut icon" href="<?= base_url('assets/images/logo/logo-2.jpg'); ?>">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
  <!-- Header -->
  <?= $this->include('frontend/header'); ?>
  <!-- Header -->

  <!-- Content -->
  <?= $this->renderSection('frontend'); ?>
  <!-- Content -->

  <!-- Hero -->

  <!-- Hero -->

  <!-- footer -->
  <?= $this->include('frontend/footer'); ?>
  <!-- footer -->

  <script>
    const input_check = document.querySelectorAll("input[type=checkbox]");
    let hitung_check = [];
    for (let i = 0; i < input_check.length; i++) {
      input_check[i].addEventListener('click', () => {
        if (hitung_check.length > 8) {
          input_check[i].setAttribute('readonly', 'true')
          // input_check[i].classList.add('bg-slate-200')
        }
        if (input_check[i].checked == true) {
          hitung_check.push(input_check[i]);
        }
      })
    }
  </script>
</body>

</html>