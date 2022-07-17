
<?php

session_start();
unset($_SESSION['user_data']);
setcookie('X-LUMINTU-REFRESHTOKEN', '', time() - 3600);
header("location: https://account.lumintulogic.com/logout.php");
alert ('Anda telah logout');
?>



<!-- <script>
Swal.fire({
  title: 'Are you sure?',
  text: "You won't be able to revert this!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, delete it!'
}).then((result) => {
  if (result.isConfirmed) {
    Swal.fire(
      'Deleted!',
      'Your file has been deleted.',
      'success'
    )
  }
})
</script> -->