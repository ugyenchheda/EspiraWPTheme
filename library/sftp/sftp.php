<?php


set_include_path(get_template_directory().'/library/sftp/phpseclib/');

require_once('Net/SFTP.php');
require_once('Crypt/RSA.php');


$sftp = new Net_SFTP(FTP_HOST);
if (!$sftp->login(FTP_USER, FTP_PASS)) {
    exit('Login Failed');
}

// // puts a three-byte file named filename.remote on the SFTP server
// $sftp->put('filename.remote', 'xxx');
// // puts an x-byte file named filename.remote on the SFTP server,
// // where x is the size of filename.local
// $sftp->put('filename.remote', 'filename.local', NET_SFTP_LOCAL_FILE);