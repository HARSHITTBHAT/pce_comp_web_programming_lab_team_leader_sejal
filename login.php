<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        /* Your CSS styles remain unchanged */
        .container{
    width: 100%;
    height:800px ;
    background-color: rgb(20, 228, 96);
    display: flex;
    justify-content: center;
    overflow-y: hidden;
    background-image:url(Pillai-Campus.jpg);
    background-repeat: no-repeat;
    background-size: 100% 100%;
    


}

.box{
    width: 300px;
    height: 300px;
    background-color:bisque;
    color: #294B29;
    transform: translateY(300px);
}
.box h1{
    display: flex;
    justify-content: center;
    padding: 10px;
    text-size-adjust: 30px;
    font-style: italic;
}
.box .username{
    padding: 10px;
    width: 100%;
}
.username input{
    width: 90%;
    height: 25px;
    border-radius: 15px;
    text-align: center;
}
.box .pass{
    padding: 10px;
    width: 100%;
}
.pass input{
    height: 25px;
    width:90%;
    border-radius: 15px;
    text-align: center;
}
.pass input ::placeholder{
    padding-left: 20px;
}
.box .submit{
    padding: 10px;
}
.submit button{
    width: 100%;
    height: 30px;
    border-radius: 15px;
    background-color: rgb(241, 241, 180);
    
}
.submit button:hover{
    animation-name: ballu;
    animation:ballu 3s infinite;
    
}

@keyframes ballu{
    0%{
        
        background-color: rgb(239, 239, 116);
    }
    50%{
        
        background-color: rgb(253, 253, 64);
    }
    100%{
        background-color: rgb(249, 249, 31);

    }
}
.box{
    border-radius: 20px;

}

    </style>
</head>
<body>
<form action="connect.php" method="POST"> <!-- Updated action attribute -->
    <div class="container">
        <div class="box">
            <div>
                <h1>Login</h1>
            </div>  
            <div class="username">
                <input id="email" name="email" type="email" placeholder="email">
            </div>  
            <div class="pass">
                <input id="pass" name="pass" type="password" placeholder="password">
            </div>   
            <div class="submit">
                <button id="btn" type="submit" name="submit">Login</button>
            </div>
            <div class="signin">
                <label id="newacc" for="sign">New account ? :</label>
                <a href="signin.html">Sign in</a> <!-- Fixed link -->
            </div>
        </div>
    </div>
</form>
<script src="lg.js"></script>
</body>
</html>
