<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Boletín</title>
    <style>
        @page {
            margin: 1cm;
        }

        *,*::after,*::before {
            box-sizing: border-box;
        }

        body { 
            font-family: DejaVu Sans;            
            font-size: 13px;
            line-height: 1.6;   
        }

        .content {
            padding: 10px;
            margin: 2px solid black;
        }

        .header {
            display: flex;
            justify-content: space-around;
            align-items: center;
        }

        .container__img {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .img__logo {
            width: 60px;
            height: 80px;
            object-fit: contain;
        }

        .container__title {
            text-align: center;
        }
        table {
            width: 100%; 
            border-collapse: collapse;
            border-spacing: 0; 
            margin-top: 20px;
            border-radius: 5px;
            border: 2px solid #ccc;
            
        }

        table thead {
            background-color: #FDEDED;
        }

        th, td { 
            border: 1px solid #ccc; 
            padding: 8px; 
            text-align: center; 
        }

        .footer {
            margin-top: 40px;
            text-align: right;
            font-size: 11px;
        }
    </style>
</head>
<body>
    <div class="content">
        <header class="header">
            <div class="container__img">
                <img class="img__logo" src="{{ asset('imagenes/EscudoSF.PNG') }}" alt="Logo escuela">
                <h5>Colegio Niños Del Futuro</h5>
            </div>
            <div class="container__title">
                <h3>Boletín de Notas</h3>
                <p><strong>Estudiante:</strong> {{ $estudiante->nombre }} {{ $estudiante->apellido }}</p>
                <p><strong>Trimestre:</strong> {{ $periodo->trimestre }}</p>
            </div>
            <div>
                <p><strong>Fecha de Emisión:</strong></p>
                <span>{{ \Carbon\Carbon::now()->format('d/m/Y') }}</span>
            </div>
        </header>

        <table>
            <thead>
                <tr>
                    <th>Materia</th>
                    <th>Nota</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($notas as $nota)
                    <tr>
                        <td>{{ $nota->materia->nombre }}</td>
                        <td>{{ $nota->nota }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

            <div class="footer">
                <p>__________________________</p>
                <p>Firma del Profesor</p>
            </div>
    </div>
</body>
</html>