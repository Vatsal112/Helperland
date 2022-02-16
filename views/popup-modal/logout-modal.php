<div class="modal fade logout-modal" id="logout-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle2" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="logout-modal-content">
                            <div class="logout-green-circle">
                                <img src="assets/images/ic-check.png" alt="">
                            </div>
                            <h5>You have successfully logged out</h5>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn-logout-ok" data-dismiss="modal" id="btn-logout">Ok</button>
                    </div>
                </div>
            </div>
        </div>

        <script>
    $(document).ready(function() {
        $('#btn-logout').click(function(e) {
            $.ajax({
                type: "post",
                url: "http://localhost/Helperland/?controller=user&function=userLogout",
                success: function(response) {
                setTimeout(function(){
                    <?php $link= $_SERVER['HTTP_REFERER'];?>
                     window.location.href = '<?php $link;?>';
                },1000);
                }
            });
        });
    });
</script>