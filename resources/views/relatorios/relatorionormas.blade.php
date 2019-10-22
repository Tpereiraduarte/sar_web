<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reltório de Normas</title>
    <style>
        header{
            position: fixed;
            top: 0cm;
            left: 0cm;
            right: 0cm;
            height: 2cm;
            /** Extra personal styles **/
            background-color: rgb(32,178,170);
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
            color: #4F4F4F;
        }  
        td{
            text-align: left;
            font-family:"Times New Roman";
            font-style: normal;
            color: #4F4F4F;
        }  
       .clearfix {
            clear: both;
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
        Normas cadastradas SAR-WEB        
   </header>
   <div class="bg-fundo"></div>
   <br class="clearfix" /><br class="clearfix" />   
    <br class="clearfix" />
    <div class="box-body">
        <table position="fixed" align="center" border=1 cellspacing=0 cellpadding=2 bordercolor="#A9A9A9">
            <thead>
                <tr>
                    <th>N° Norma</th>
                    <th>Descrição</th>                    
                </tr>
            </thead>
            <tbody>
            @foreach($dados as $key => $valor)
                <tr>
                    <td width=100>{{$valor->numero_norma}}</td>
                    <td width=200>{{$valor->descricao}}</td>                
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>