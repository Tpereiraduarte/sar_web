<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <header>
        Normas cadastradas SAR-WEB        
   </header>
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
                    <th>N° Norma</th>
                    <th>Descrição</th>
                    <th>N° Parágrafo</th>
                    <th>Descrição</th>
                    <th>N° SubParágrafo</th>
                    <th>Descrição</th>                    
                </tr>
            </thead>
            <tbody>
            @foreach($dados as $valor)
                <tr>
                    <td width=50>{{$dados[0]->numero_norma}}</td>
                    <td width=100>{{$dados[0]->descricao_norma}}</td>
                    <td width=50>{{$valor->numero_paragrafo}}</td>
                    <td width=200>{{$valor->descricao_paragrafo}}</td> 
                    <td width=50>{{$valor->numero_subparagrafo}}</td>
                    <td width=200>{{$valor->descricao_subparagrafo}}</td>                
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>