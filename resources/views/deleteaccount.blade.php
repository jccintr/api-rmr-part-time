<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RMR Part Time</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
      .borda {
        border: 1px solid gray;
        border-radius: 15px;
      }  
      @media screen and (max-width: 767px) {
        .borda {
          border:0px solid;
        }
      }
      
    </style>
</head>
<body style="background-color: #effafe;">
    <div class="container">
        <div class="row">
            <div class="col">
            <div class="d-flex flex-column vh-100 justify-content-center align-items-center">
                <div class="d-flex p-5 flex-column align-items-center justify-content-center borda" >

                    <img style="width: 200px;" src={{ asset('logo-500.png') }} alt="Logo RMR">
                    <p class="text-center fs-2">RMR Part Time</p>
                    <p class="text-center fs-4">Exclusão de Conta</p>
                    <p class="text-center fs-6">Para excluir a sua conta, informe as suas credenciais nos campos abaixo.</p>
                    @isset($error)
                        <div class="alert alert-danger" role="alert">
                            {{$error}}
                        </div>
                    @endisset
                    
                    

                        <form class="flex-grow-1 flex-column" method="POST" action="/deleteaccount">
                            @csrf
                            <div class="row mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email" placeholder="Digite o seu email" class="form-control" id="email" aria-describedby="emailHelp">
                            </div>
                            <div class="row mb-3">
                                <label for="password" class="form-label">Senha</label>
                                <input type="password" name="password" placeholder="Digite a sua senha" class="form-control" id="password">
                            </div>
                            <div class="row mb-3">
                               <button type="submit" class="btn btn-danger">EXCLUIR MINHA CONTA</button>
                            </div>
                        </form>

                    

                </div>
            </div>
            </div>
        </div>
    </div>
</body>
</html>