<script>
<?php
$alerts = [
    'alert' => [
        'success'       => ['Success!', 'Login successfully.', 'success'],
        'claim_success' => ['Success!', 'Bonus claim was successful.', 'success'],
        'claim_failed'  => ['Failed!', 'Bonus claim unsuccessful.', 'error'],
        'free_plan'     => ['Failed!', 'You need deposit for claim bonus', 'error'],
    ],
    'surf' => [
        'surf_ok'          => ['Success!', 'You have create ads...', 'success', 3000],
        'surf_failed'      => ['Failed!', 'Insufficient balance!', 'warning', 3000],
        'surf_invalid_click' => ['Invalid!', 'Invalid click, id must be integer.', 'warning', 6000],
        'cant_claim'       => ['Invalid!', 'You cant claim this ads, please come back tomorrow.', 'warning', 6000],
        'max_views'        => ['Invalid!', 'This ads has reached maximum views.', 'warning', 6000],
        'invalid_claim'    => ['Invalid!', 'You cannot claim this ads, please choose another or come back tomorrow.', 'warning', 6000],
        'success'          => ['Success!', 'You have successfully received a reward from PTC', 'success', 6000],
    ],
    'payout' => [
        'payout_ok'      => ['Success!', 'You have create withdrawal request.', 'success', 3000],
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