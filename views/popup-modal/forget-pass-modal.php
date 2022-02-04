<div class="modal fade" id="forget-pass-modal" tabindex="-1" role="dialog" aria-labelledby="forget-pass-modal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Forget password</h5>

                <span aria-hidden="true" data-dismiss="modal" class="close-btn">&times;</span>
            </div>
            <div class="modal-body">
                <form method="post">

                    <div class="response-text">
                        <p id="response2" class="text-danger"></p>
                    </div>

                    <div class='status-message'>
                        <p class='text-success' id="text-ok"></p>
                        <a onclick='hideMessage()'><i class='fa fa-close'></i></a>
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" id="email" class="form-control" placeholder="Email">
                    </div>
                    <div class="btn-send">
                        <button type="submit" id="submit">Send</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <a href="" data-target="#login-modal" data-toggle="modal" data-dismiss="modal">Login now</a>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#submit').click(function(e) {
            var email = $('#email').val();
            e.preventDefault();

            if ($('.status-message').css('display', 'flex')) {
                $('.status-message').css('display', 'none')
            }

            if ($('.response-text').css('display', 'block')) {
                $('.response-text').css('display', 'none')
            }

            $.ajax({
                type: "post",
                url: "http://localhost/Helperland/?controller=user&function=forgetPassword",
                dataType:'JSON',
                data: {
                    email: email
                },
                success: function(response) {
                    res = JSON.parse(JSON.stringify(response));

                    if (res == "An email has been sent to your account. Click on the link in received email to reset the password.") {
                        $('.text-success').html(res);
                        $('.status-message').css('display', 'flex');
                        alert(res);
                        console.log(res);
                    } else {
                        $('.response-text').css('display', 'block');
                        $('.text-danger').html(res);
                        console.log(res);
                        alert(res);
                    }
                }
            });
        });
    });
</script>