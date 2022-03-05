<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <style>
        <?php
        include 'assets/css/style.css';
        include 'assets/css/responsive.css';
        ?>
    </style>


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.js" type="text/javascript"></script>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.js" type="text/javascript"></script>

</head>
<body>

<div class="container">
    <div class="new-password">
        <form method="post">
            <div class='status-message'>
                <p class='text-success' id="text-success2"></p>
            </div>
            <div class="response-text">
                <p id="response-error" class="text-danger"></p>
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
                <button type="button" id="btn-save">Save</button>
            </div>
        </form>
    </div>
</div>
</body>
</html>


<script>        
        $('#btn-save').click(function(e) {
            e.preventDefault();
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
                    res= JSON.parse(response);

                    if (res == "Success") {
                        $('.status-message').css('display', 'block');
                        $('#text-success2').html("Password Updated Successfully.");
                        $('.form-group').css('display','none');
                        $('.btn-save').css('display','none');
                        console.log(res);

                        setTimeout(function(){
                            window.location.href = 'http://localhost/Helperland/';
                        },2000);
                    }else{
                        $('.response-text').css('display', 'block');
                        $('#response-error').html(res); 
                        console.log(res);
                    }

                }
            });
        });
</script>