<?php

// Use in the “Post-Receive URLs” section of your GitHub repo.

if ( $_POST['payload'] ) {
shell_exec( ‘cd /staging.technex.nl/wp-content/themes/avm-moment-master/src/ && git reset –hard HEAD && git pull’ );
}

?>