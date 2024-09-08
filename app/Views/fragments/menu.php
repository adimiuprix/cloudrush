<div class="clearfix"></div>
<div class="clear"></div>
<div class="leftbar">
    <div class="menubar">
        <ul class="leftbar__menu mb-0 mt-0">
            <li><a href="<?= base_url('account'); ?>" id="mining"><i class="fa fa-yin-yang fa-spin"></i><span>Mining </span> </a></li>
            <li><a href="<?= base_url('surf'); ?>" id="ptc"><i class="fa fa-play"></i><span>PTC</span></a></li>
            <li><a href="<?= base_url('bonus'); ?>" id="bonus"><i class="fa fa-gift"></i><span>Bonus</span></a></li>
            <li><a href="<?= base_url('refs'); ?>" id="reff"><i class="fa fa-users"></i><span>Referrals</span></a></li>
        </ul>
    </div>
</div>
<script>
    $(document).ready(function(event){
        $('#ptc').on('click', function(event) {
            event.preventDefault()
            Swal.fire({
                text: 'Feature under development',
                icon: 'info',
                showConfirmButton: false,
                timer: 3000,
            });
        })
    })
</script>