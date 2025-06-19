<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>View: Smarty Scripts - Cloud Mining Scripts</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Play" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Pangolin" rel="stylesheet">
    <link href="<?= base_url('public/assets/css/frame.css') ?>" rel="stylesheet" type="text/css">
    <meta name="theme-color" content="#ffffff">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?= csrf_hash() ?>">
</head>
<body>
    <div class="center">
        <div class="table-row">
            <div class="table-col col-left">
                <div class="logo"><?= $site_name; ?></div>
            </div>
            <div class="table-col col-right">
                <div class="loadwait">
                    <div id="check" style="display: none">
                        <span style="color:#be0525;">The window is not active! Go back to the tab!</span>
                    </div>
                    <div id="blockverify">
                        <div id="ptcCountdown" class="wait" style="display: none;">
                            Wait, site is loading...
                        </div>
                        <div id="ptcCountdown" style="display: none;"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <iframe class="frame" src="<?= $ads_url; ?>" id="ads"></iframe>
    <div class="modal fade" id="ptcCaptcha" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Solve captcha!</h5>
                </div>

                <div class="modal-body">
                    <form action="<?= site_url('surf/verify/' . $ptc_id); ?>" method="POST">
                        <?= csrf_field() ?>
                        <center>
                            <div class="h-captcha" data-sitekey="d61adafc-9e1a-41be-9e4e-708abfa4d156"></div>
                        </center>
                        <button id="verify" class="btn btn-success btn-block" type="submit">Verify</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>
    <script src='https://www.hCaptcha.com/1/api.js' async defer></script>    
    <script>
        const timer = <?= $timer; ?>;
        const url = '<?= $ads_url; ?>';
        let countdown = timer - 1;

        $(() => {
            // Menggunakan ID yang lebih spesifik untuk ptcCountdown jika ada dua dengan ID yang sama
            // Dalam kasus ini, elemen pertama dengan ID 'ptcCountdown' yang akan berinteraksi.
            const $ptcCountdownDisplay = $('#ptcCountdown:first');

            // Tampilkan "Wait, site is loading..."
            $ptcCountdownDisplay.show();

            const count = setInterval(() => {
                if (countdown < 0) {
                    $('#ptcCaptcha').modal('show');
                    clearInterval(count);
                    return;
                }

                const label = countdown === 1 ? 'second' : 'seconds';
                $ptcCountdownDisplay.text(`${countdown} ${label}`);

                if (document.hasFocus()) {
                    countdown--;
                    $('#check').hide(); // Sembunyikan pesan "window is not active" jika tab aktif
                } else {
                    $('#check').show(); // Tampilkan pesan "window is not active" jika tab tidak aktif
                }
            }, 1000);

            // Klik tombol verify
            $('#verify').on('click', () => {
                const win = window.open(url, '_blank');
                if (win) win.focus();
            });
        });
    </script>
</body>
</html>