<?php if ($condition) : ?>
  <script>
    Swal.fire(
      'Success!',
      '<?= $msg; ?>',
      'success'
    )
  </script>
<?php else : ?>
  <script>
    Swal.fire({
      icon: 'error',
      title: 'Oops...',
      text: 'Something went wrong!',
    })
  </script>
<?php endif; ?>