<!--add page title, display page contents-->
<?php
$pageContents = ob_get_contents();  // acquires html contents from buffer to then display
ob_end_clean();                     // wipe buffer, clear memory

$titleName = '';
switch ($menuType) { 
    case 'main':
        $titleName .= 'Welcome';    // name, about us, membership types
        break;
    case 'login':
        $titleName .= 'Login';      // login for customer, staff, manager
        break;

    // user-specific //
    case 'account':
        $titleName .= 'Account';    // select membership type
        break;

    // staff-specific //
    case 'manage-c':
        $titleName .= 'Customer Management';    // create, review, update, delete customers
        break;
    case 'manage-m':
        $titleName .= 'Membership Management';  // update payment statuses for customers

    // manager-specific //
    case 'manage-s':
        $titleName .= 'Staff Management';   // CRUD staff, can enable/disable their accounts
        break;


    default:
        break;
}

echo str_replace('<!--TITLE-->', $titleName, $pageContents);
?>