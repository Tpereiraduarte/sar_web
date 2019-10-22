<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reltório de Usuários</title>
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
                background-image: linear-gradient(rgba(0, 0, 0, 0.1), rgba(0, 0, 0, 0.01));
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
        Usuários cadastrados SAR-WEB        
   </header>
   <div class="bg-fundo"></div>
   <br class="clearfix" /><br class="clearfix" />
    <br class="clearfix" />
    <main>
        <table align="center" border=1 cellspacing=0 cellpadding=2 bordercolor="#A9A9A9">
            <thead>
                <tr>
                    <th>Ordem</th>
                    <th>Matricula</th>
                    <th>Nome</th>
                    <th>E-mail</th>
                </tr>
            </thead>
            <tbody>
            @foreach($dados as $key => $user)
                <tr>
                    <td width=100>{{$key + 1}}</td>
                    <td width=100>{{$user->matricula}}</td>
                    <td width=150>{{$user->nome}}</td>
                    <td width=200>{{$user->email}}</td>   
                </tr>
            @endforeach
            </tbody>
        </table>  
    </main>
    
</body>
</html>