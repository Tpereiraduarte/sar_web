<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reltório de Paragrafos</title>
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
            background-image: linear-gradientrgba(0, 0, 0, 0.1), rgba(0, 0, 0, 0.01));
            
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
        }body {
            margin-top: 2cm;
            margin-left: 2cm;
            margin-right: 2cm;
            margin-bottom: 2cm;
        }
    </style>
</head>
<body>
    <header>
        Paragrafos cadastradas SAR-WEB        
   </header>
   <div class="bg-fundo"></div>
   
<div class="box-body">
    <table align="center" border=1 cellspacing=0 cellpadding=2 bordercolor="#A9A9A9">
        <thead>
            <tr>
                <th>N° Norma</th>
                <th>Descrição</th>
            </tr>
        </thead>
        <tbody>
    @foreach($dados as $key => $valor)
            <tr>
                <td  text-align=center width=100>{{$valor->normas->numero_norma}}</td>
                <td width=200>{{$valor->descricao}}</td>                
            </tr>
    @endforeach
        </tbody>
    </table>
</div>
</body>
</html>