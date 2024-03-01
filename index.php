<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            font-family:arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #FFD700;
        }
        .container{
            max-width: 500px;
            margin:50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5)
        }

        h2{
            text-align: center;
            margin-bottom: 20px;
        }
        label{
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"],
        select{
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc; 
            border-radius: 3px;
            box-sizing: border-box; 
        }

        input[type="submit"]{
            width: 100%;
            padding: 10px; 
            background-color: #007bff; 
            color: #fff; 
            border: none; 
            border-radius: 3px;
            cursor: pointer;
        }
        input[type="submit"]:hover{
            background-color: #0056b3; 
        }
        .message{
            margin-top: 10px; 
            padding: 10px;
            background-color: #f0f0f0;
            border: 1px solid #ccc;
            border-radius: 3px;
        }
        .message.error{
            background-color: #f8d7da;
            border-color:#f5c6cb;
            color: #721c24;
        }
        .message.success{
            background-color: #d4edda;
            border-color:#c3e6cb;
            color: #155724;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Cadastro</h2>
          <form id="signupForm">
              <label for="name">Nome: </label>
              <input type="text" id="name" name="name" required>
              <label for="email">Email: </label>
              <input type="email" id="email" name="email" required>
              <label for="password">Senha: </label>
              <input type="password" id="password" name="password" required>
              <label for="gender">Gênero: </label>
              <select id="gender" name="gender" required>
                  <option value=""> Selecione </option>
                  <option value="male"> Masculino </option>
                  <option value="female"> Feminino </option>
              </select>
            <input type="submit" value="Enviar">
          </form>
        <div class="message" id="message"></div>
    </div>
    <script>
      document.getElementById('signupForm').addEventListener('submit', function(event){
        event.preventDefault();
        var formData = new FormData(this);
        xhr = new XMLHttpRequest();
        xhr.open('POST','cadastro.php', true);
        xhr.onload = function(){
          if(xhr.status === 200){
            var response = JSON.parse(xhr.responseTest);
            var messageElement = document.getElementById('message');
            messageElement.textContent = response.message;
            messageElement.className = 'message' + response.status;
            document.getElementById('signupForm').reset();
          }
        };
        xhr.send(formData);
      })
    </script>
</body>
</html>
