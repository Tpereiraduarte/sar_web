<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reltório de Perfis</title>
    <style>
        header{
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
        footer {
            position: fixed; 
            bottom: 0cm; 
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
        .clearfix {
            clear: both;
        }  
        body {
            margin-top: 2cm;
            margin-left: 2cm;
            margin-right: 2cm;
            margin-bottom: 2cm;
        }
        body {
            margin-top: 2cm;
            margin-left: 2cm;
            margin-right: 2cm;
            margin-bottom: 2cm;
            background-image: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.3));
            
        }
        .bg-fundo {
            background-image: url("http://localhost:8080/sar_web/public/assets/lte/dist/img/logo.jpg");
            background-attachment: fixed;
            background-size: 180px 80px;
            background-repeat: no-repeat;
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            opacity: 0.3;
        }
    </style>
</head>
<body>
    <header>
        Perfis cadastrados SAR-WEB        
   </header>
   <div class="bg-fundo"></div>
   <br class="clearfix" /><br class="clearfix" />
   <footer>
       <div class="direitos_reservados">
           <font color="white">Sistema de Análise de Riscos - SAR WEB</font>
        </div>
    </footer>
    <br class="clearfix" />
    <div class="box-body">
        <table align="center" border=1 cellspacing=0 cellpadding=2 bordercolor="#A9A9A9">
            <thead>
                <tr>
                    <th>Perfil</th>                    
                </tr>
            </thead>
            <tbody>
        @foreach($dados as $key => $valor)
                <tr>
                    <td width=200>{{$valor->nome}}</td>
                </tr>
        @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>