<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reltório de Usuário Perfil</title>
    <style>        
        table{
            border: 1;
        }
        .container {
            max-width: 960px;
            width: 100%;
            margin: 0 auto;
            
        } 
        .clearfix {
            clear: both;
        }
        body {
                margin-top: 2cm;
                margin-left: 2cm;
                margin-right: 2cm;
                margin-bottom: 2cm;
            }
        header {
                position: fixed;
                top: 0cm;
                left: 0cm;
                right: 0cm;
                height: 2cm;

                /** Extra personal styles **/
                background-color: rgb(0,139,139);
                color: white;
                text-align: center;
                font-family:"Times New Roman";
                font-style: normal;
                font-size: 28px;
                line-height: 1.5cm;
            }
        th{
            text-align: center;
            font-family:"Times New Roman";
            font-style: normal;
            color: #696969;
        }
        td{
            text-align: left;
            font-family:"Times New Roman";
            font-style: normal;
            color: #696969;
        }  
        body {
            margin-top: 2cm;
            margin-left: 2cm;
            margin-right: 2cm;
            margin-bottom: 2cm;
            background-image: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.3));
            
        }
        .bg-fundo {
            background-image: url("http://localhost:8080/sar_web/public/assets/lte/dist/img/logo2.jpg");
            background-repeat: no-repeat;
            position: fixed; 
            top: 20%;
            left: 30%;
            right: 20%;
            bottom: 0;
            opacity: 0.3;
        }         
    </style>
</head>
<body>
    <header>
        Perfis de Usuários cadastrados SAR-WEB        
   </header>
   <div class="bg-fundo"></div>
   <br class="clearfix" /><br class="clearfix" />
    <br class="clearfix" />
    <div class="box-body">
        <table align="center" border=1 cellspacing=0 cellpadding=2 bordercolor="#A9A9A9">
            <thead>
                <tr>
                    <th>Usuário</th>     
                    <th>Perfil</th>               
                </tr>
            </thead>
            <tbody>
        @foreach($dados as $key => $usuarioperfil)
                <tr>
                    <td width=200>{{$usuarioperfil->usuario->nome}}</td>
                    <td width=150>{{$usuarioperfil->perfil->nome}}</td>
                </tr>
        @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>