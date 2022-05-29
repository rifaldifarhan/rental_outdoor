<!DOCTYPE html>
<html>
<head>
    <title>Form Login admin</title>
    <style>
        body {
           background-color:#3EB2FD ;
           background-repeat: no-repeat;
        }
        #card {
            background: #fbfbfb;
            border-radius: 8px;
            box-shadow: 1px 2px 8px rgba(0, 0, 0, 0.65);
            height: 410px;
            margin: 6rem auto 8.1rem auto;
            width: 329px;
            height: 450px;
        }
        img {
            width: 150px;
        }
        #card-content {
            padding: 12px 44px;
        }
        #card-title {
            font-family:'Poppins', sans-serif;
            letter-spacing: 4px;
            padding-bottom: 23px;
            padding-top: 10px;
            text-align: center;
        }
        .underline-title {
            background: -webkit-linear-gradient(right, #000768, #00e1ff);
            height: 2px;
            margin: -1.1rem auto 0 auto;
            width: 89px;
        }
        .form {
            align-items: left;
            display: flex;
            flex-direction: column;
        }
        .form-border {
            background: -webkit-linear-gradient(right,#000768, #00e1ff);
            height: 1px;
            width: 100%;
        }
        .form-content {
            background: #fbfbfb;
            border: none;
            outline: none;
            padding-top: 50px;
        }        
        input {
            text-align: center;
            font-size: 15px;
        }
        #submit-btn {
            background-color: #130f40;;
            border: none;
            border-radius: 21px;
            box-shadow: 0px 1px 8px #24c64f;
            cursor: pointer;
            color: white;
            font-family: 'Poppins', sans-serif;
            height: 42.3px;
            margin: 0 auto;
            margin-top: 50px;
            transition: 0.25s;
            width: 153px;
        }
        #submit-btn:hover {
            box-shadow: 0px 1px 18px #24c64f;
        }
    </style>
</head>
<body>
    <div id="card">
        <div id="card-content">
          <div id="card-title">
            <h2>Admin Rental Outdoor</h2>
            <div class="underline-title"></div>
            <form action="page/cek_login.php" method="POST">
            <input class="form-content" placeholder="Username" name="username" type="text" required>
                <div class="form-border"></div>
                <input class="form-content" placeholder="Password" name="pass" type="password" required>
                <div class="form-border"></div>
                <button id="submit-btn" type="submit">Sign In</button>
            </form>
          </div>
        </div>
    </div>
</body>
</html>




<!--  -->
