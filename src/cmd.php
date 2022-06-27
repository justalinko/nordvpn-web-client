<?php
include './functions.php';

if(isset($_GET['x']))
{
    $x = $_GET['x'];

    if($x == 'connect')
    {
        $country = $_POST['country'];
        $cmd = 'nordvpn connect '.$country;
        $result = cmd($cmd);
        $status = cmd('nordvpn status');
        file_put_contents('../storage/result.txt',$result);
        file_put_contents('../storage/status.txt',$status);
        @header('location: index.php');
        exit;
    }elseif($x == 'disconnect')
    {
        $result = cmd('nordvpn disconnect');
        $status = cmd('nordvpn status');
        file_put_contents('../storage/result.txt',$result);
        file_put_contents('../storage/status.txt',$status);
        @header('location: index.php');
        exit;
    }elseif($x == 'login')
    {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $result = cmd('nordvpn login --username='.$username.' --password='.$password);
        $login = cmd('nordvpn account');
        file_put_contents('../storage/result.txt',$result);
        file_put_contents('../storage/login.txt',$login);
        @header('location: index.php');
        exit;
    }
}