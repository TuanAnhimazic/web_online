<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<?php
function notification($icon,$title,$content,$btntext,$showbtn,$colorbtn){
    echo '<script>
    $(document).ready(function(){
        Swal.fire({
            position: "center",
            icon: "'.$icon.'",
            title: "'.$title.'",
            text: "'.$content.'",
            confirmButtonColor: "'.$colorbtn.'",
            confirmButtonText: "'.$btntext.'",
            showConfirmButton: '.$showbtn.',
          })
    });
</script>';
}

function NotifiSiginSuccess(){
    echo '<script>
    $(document).ready(function(){
        Swal.fire({
            title: "Account Registration Successfully ",
            icon: "Success",
            showCancelButton: false,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Log in now"
          }).then((result) => {
            if (result.isConfirmed) {
              window.location.href= "'.base.'login/login";
            }
          });
    });
</script>';
}

function NotifiOrder($text,$url){
    echo '<script>
    $(document).ready(function(){
        Swal.fire({
            title: "'.$text.'",
            icon: "Success",
            showCancelButton: false,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "OK"
          }).then((result) => {
            if (result.isConfirmed) {
              window.location.href= "'.base.$url.'";
            }
          });
    });
</script>';
}

function NotifiError($text,$url){
  echo '<script>
  $(document).ready(function(){
      Swal.fire({
          title: "'.$text.'",
          icon: "Error",
          showCancelButton: false,
          confirmButtonColor: "#3085d6",
          cancelButtonColor: "#d33",
          confirmButtonText: "Retry"
        }).then((result) => {
          if (result.isConfirmed) {
            window.location.href= "'.base.$url.'";
          }
        });
  });
</script>';
}
function notifichanger($text){
  echo "
  <script>
  $(document).ready(function(){
    Swal.fire({
      position: 'center',
      icon: 'success',
      title: '".$text."',
      showConfirmButton: false,
      timer: 1000
    })
  });
</script>
  ";
}
function NotifiErrorQuantity($text){
  echo '<script>
  $(document).ready(function(){
      Swal.fire({
          title: "'.$text.'",
          icon: "error",
          showCancelButton: false,
          confirmButtonColor: "#3085d6",
          cancelButtonColor: "#d33",
          confirmButtonText: "OK"
        })
  });
</script>';
}
function NotificationRight($text,$position){
  echo '
  <script>
  $(document).ready(function(){
    const Toast = Swal.mixin({
      toast: true,
      position: "'.$position.'",
      showConfirmButton: false,
      timer: 3000,
      timerProgressBar: true,
      didOpen: (toast) => {
        toast.addEventListener("mouseenter", Swal.stopTimer)
        toast.addEventListener("mouseleave", Swal.resumeTimer)
      }
    })
    
    Toast.fire({
      icon: "error",
      title: "'.$text.'"
    })
  });
  </script>
  ';
}
?>

