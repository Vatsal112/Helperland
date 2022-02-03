
<div class="container">
    
    <div class="new-password">
        <form method="post">
            <div class="response-text">
                <p id="response2" class="text-danger"></p>
            </div>
            <div class="form-group">
                <label for="new-pass">New Password</label>
                <input type="password" name="pass" id="new-pass" class="w-25 form-control">

            </div>
            <div class="form-group">
                <label for="confirm-pass">Confirm Password</label>
                <input type="password" name="c-pass" id="c-pass" class="w-25 form-control">
            </div>

            <div class="btn-save">
                <button type="submit" id="btn-save">Save</button>
            </div>
        </form>
    </div>
</div>


<script>
    $(document).ready(function() {
        $('#btn-save').click(function(e) {
            var new_pass = $('#new-pass').val();
            var c_pass = $('#c-pass').val();
            e.preventDefault();

            $.ajax({
                type: "post",
                url: "http://localhost/Helperland/?controller=user&function=validateNewPassword&parameter="+<?php echo $_GET['id'];?>,
                data: {
                    pass: new_pass,
                    c_pass: c_pass
                },
                success: function(response) {
                    $('.response-text').css('display', 'block');
                    $('#response').html(response);

                }
            });
        });
    });
</script>