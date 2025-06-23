<script>
<?php
$alerts = [
    'alert' => [
        'success'       => ['Success!', 'Login successfully.', 'success'],
        'claim_success' => ['Success!', 'Bonus claim was successful.', 'success'],
        'claim_failed'  => ['Failed!', 'Bonus claim unsuccessful.', 'error'],
        'free_plan'     => ['Failed!', 'You need deposit for claim bonus', 'error'],
        'banned'        => ['Ups!', 'Your account has been banned!', 'error'],
    ],
    'surf' => [
        'captcha_failed'   => ['Error!', 'Failed to verify captcha. Please try again.', 'error', 5000],
        'surf_ok'          => ['Success!', 'You have create ads...', 'success', 3000],
        'surf_failed'      => ['Failed!', 'Insufficient balance!', 'warning', 3000],
        'surf_invalid_click' => ['Invalid!', 'Ad not found or no longer available.', 'warning', 6000],
        'cant_claim'       => ['Invalid!', 'You cant claim this ads, please come back tomorrow.', 'warning', 6000],
        'max_views'        => ['Invalid!', 'This ad has reached its maximum number of impressions.', 'warning', 6000],
        'invalid_claim'    => ['Invalid!', 'You cannot claim this ads, please choose another or come back tomorrow.', 'warning', 6000],
        'success'          => ['Success!', 'You have successfully received a reward from PTC', 'success', 6000],
    ],
    'payout' => [
        'payout_ok'      => ['Success!', 'Withdraw successful! Your funds are being processed, please wait a moment.', 'success', 3000],
        'payout_failed'  => ['Failed!', 'Insufficient balance!', 'warning', 3000],
        'payout_minimum' => ['Failed!', 'Minimum withdraw is 10 TRX', 'warning', 3000],
        'free_plan'      => ['Failed!', 'You have to make a deposit for request withdrawal!', 'warning', 5000],
    ],
    'collect' => [
        'collect_ok'       => ['Success!', 'Collect earning success', 'success', 3000],
        'collect_failed'   => ['Failed!', 'Insuficient balance!', 'warning', 3000],
        'collect_exceded'  => ['Failed!', 'You have reached the limit to be able to collect earnings. Come back tomorrow.', 'warning', 6000],
    ]
];

foreach ($alerts as $key => $cases) {
    $flash = session()->getFlashdata($key);
    if (isset($cases[$flash])) {
        [$title, $text, $icon, $timer] = array_pad($cases[$flash], 4, null);
        echo "Swal.fire({";
        echo "title: '{$title}', text: '{$text}', icon: '{$icon}',";
        if ($timer) {
            echo "showConfirmButton: false, timer: {$timer}";
        } else {
            echo "confirmButtonText: 'OK'";
        }
        echo "});";
    }
}
?>
</script>