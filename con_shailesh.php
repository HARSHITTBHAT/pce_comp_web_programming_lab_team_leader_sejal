


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact us page</title>
    <link rel="stylesheet" href="rough2.css">

    <script src="https://kit.fontawesome.com/3ea0667da6.js" crossorigin="anonymous"></script>
</head>
<body>
    <!-- ------------- Contact ------------- -->

    <div id="contact">
        <div class="container">
            <div class="row">
                <div class="contact-left">
                    <h1 class="sub-title">Contact Us</h1>
                    <p><i class="fa-solid fa-paper-plane"></i> shailestbiradar@gmail.com</p>
                    <p><i class="fa-solid fa-square-phone"></i> 70307 69553</p>
                    <div class="social-icons">
                        <a href="#"><i class="fa-brands fa-facebook"></i></a>
                        <a href="#"><i class="fa-brands fa-instagram"></i></a>
                        <a href="#"><i class="fa-brands fa-twitter"></i></a>
                        <a href="#"><i class="fa-brands fa-linkedin"></i></a>
                        <a href="#"><i class="fa-brands fa-github"></i></a>
                    </div>
                </div>
                <div class="contact-right">
                    <form name="submit-to-google-sheet">
                        <input type="text" name="Name" placeholder="Your Name" required>
                        <input type="email" name="Email" placeholder="Your Email" required>
                        <textarea name="Message" placeholder="Your Message" rows="6"></textarea>
                        <button type="submit" class="btn btn2">Submit</button>
                    </form>
                    <span id="msg">
                        
                    </span>
                </div>
            </div>
        </div>


        <!-- ----------------------- CONTACT US ----------------------- -->

    <script>
        const scriptURL = 'https://script.google.com/macros/s/AKfycbwSWvAz28atRU0J3-g_TVunFkEiG6ljp6nheMREKKm61zkHJZGQvKHay1FUTDZZp8xA/exec'
        const form = document.forms['submit-to-google-sheet']
        const msg = document.getElementById("msg")
    
        form.addEventListener('submit', e => {
        e.preventDefault()
        fetch(scriptURL, { method: 'POST', body: new FormData(form)})
            .then(response => {
                msg.innerHTML = "Message sent successfully"
                setTimeout(function() {
                    msg.innerHTML = ""
                },5000)
                form.reset()
            })
            .catch(error => console.error('Error!', error.message))
        })
    </script>


</body>
</html>