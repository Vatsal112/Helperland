<div class="container">

    <div class="new-password">
        <form method="post">
            <div class='status-message'>
                <p class='text-success' id="text-ok
                "></p>
                <a onclick='hideMessage()'><i class='fa fa-close'></i></a>
            </div>
            <div class="response-text">
                <p id="response3" class="text-danger"></p>
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
            var cpass = $('#c-pass').val();
            e.preventDefault();

            if ($('.status-message').css('display', 'flex')) {
                $('.status-message').css('display', 'none')
            }

            if ($('.response-text').css('display', 'block')) {
                $('.response-text').css('display', 'none')
            }

            $.ajax({
                type: "post",
                url: "http://localhost/Helperland/?controller=user&function=validateNewPassword&parameter=" + <?php echo $_GET['id']; ?>,
                data: {
                    pass: new_pass,
                    cpass: cpass
                },
                success: function(response) {

                    if (response == "Password must be at least 8 characters in length and must contain at least one number, one upper case letter, one lower case letter and one special character.") {
                        $('.response-text').css('display', 'block');
                        $('#response3').html(response);
                        console.log(response);
                    }else if(response == "Password does not matched."){
                        $('.response-text').css('display', 'block');
                        $('#response3').html(response);
                        console.log(response);
                    } else{
                        $('.text-success').html(response);
                        $('.status-message').css('display', 'flex');
                        $('.form-group').css('display','none');
                        $('.btn-save').css('display','none');
                        console.log(response);
                    }

                }
            });
        });
    });
</script>