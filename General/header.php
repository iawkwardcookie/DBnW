<!--buffer output-->
<?php ob_start();
session_start();
$menuType = 'main';

if (isset($_POST['pageType'])) {
    $menuType = $_POST['pageType'];
}

?>
<!DOCTYPE html>

<html lang="en">
<head>
    <title>MiniGym | <!--TITLE--></title> <!-- TITLE will be replaced with type of page user is on -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/DBnW/general/style.css" />
    <!-- bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> 
</head>

<body>
    <header>
        <!-- header -->
        <nav>
            <a href="/DBnW/"><img border="0" alt="Mini Gym logo" src="/DBnW/general/Kiwi.png">MiniGym</a>

            <!-- side menu options -->
            <div class="menu-wrap">

                <!-- customer -->
                <?php if (isset($_SESSION['userType'])) {

                    if ($_SESSION['userType'] == 1) {
                        ?>
                    <a class="split" data-toggle="menu-contents">«Menu</a>
                    
                    <div class="split menu-contents">
                        <a href="/DBnW/customer/customerAcc.php">Account</a>
                    </div>
                    <?php } ?>

                    <!-- staff -->
                <?php if ($_SESSION['userType'] == 2) { // if page is staff, display menu option
                            ?>
                    <a class="split" data-toggle="menu-contents">«Menu</a>
                    
                    <div class="split menu-contents">
                        <a href="/DBnW/staff/staffManage.php">Customers</a>
                        <a href="/DBnW/staff/staffMembership.php">Memberships</a>
                    </div>
                    <?php } ?>

                    <!-- admin -->
                <?php if ($_SESSION['userType'] == 3) { // if page is admin, display menu option
                            ?>
                    <a class="split" data-toggle="menu-contents">«Menu</a>
                    
                    <div class="split menu-contents">
                        <a href="../Admin/adminManage.php">Staff</a>
                    </div>
                    <?php }
                }
                else{ ?>
                
                <a class="split" data-toggle="menu-contents">«Login</a>
                
                <div class="split menu-contents">
                    <a href="/DBnW/staff/staffLogin.php">Staff</a>
                    <a href="/DBnW/customer/memberLogin.php">Member</a>
                </div>
                
                <?php } ?>

            </div>

        </nav>
    </header>