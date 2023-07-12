<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Needs</title>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
</head>
<body>
    
    <?php
        include './components/navbar.php';
        if(!isset($_SESSION)){
            session_start();
        }

    ?>

    <center>
        <h1 class="contact-heading">CONTACT US</h1>
    </center>

    <section class="contact-form">
        <form name="contact-form" id="myForm">
            <div class="contact-form-names">
                <div>
                    <p>Name</p>
                    <input type="text" name="name">
                </div>

                <div>
                    <p>Email</p>
                    <input type="email" name="email">
                </div>
                
            </div>

            <p>Phone number</p>
            <input type="text" name="phone">

            <p>Description</p>
            <textarea name="" id="" cols="30" rows="10" name="desc"></textarea>


            <center>
                <input type="submit" class="contact-submit">
            </center>
        </form>
    </section>


    <?php
        include './components/footer.php';
    ?>

    <style>
        <?php
            include './styles.css';
            include './nav.css';
            include './responsive.css';
        ?>
    </style>

    <script>
        $('#myForm').on('submit', function(event) {
            event.preventDefault(); // prevent reload
            
            var formData = new FormData(this);
            formData.append('service_id', 'service_o7kao3j');
            formData.append('template_id', 'template_y0chcok');
            formData.append('user_id', '9oe4AjnwQUwUqcvHt');
        
            $.ajax('https://api.emailjs.com/api/v1.0/email/send-form', {
                type: 'POST',
                data: formData,
                contentType: false, // auto-detection
                processData: false ,// no need to parse formData to string
            }).done(function() {
                alert('Your mail is sent!');
            }).fail(function(error) {
                alert('Oops... ' + JSON.stringify(error));
            });
        });
    </script>

    <script src="script.js"></script>
</body>
</html>