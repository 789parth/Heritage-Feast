<?php
session_start();
session_unset();
session_destroy();
echo "<script>alert('User logged out successfully.');
setTimeout(function() {
            window.location.href = 'index.php';
        }, 400);
</script>";
exit;
