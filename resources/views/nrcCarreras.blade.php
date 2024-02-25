<!DOCTYPE html>
<html>
<head>
    <title>NRC POR CARRERAS</title>
    <link href="htpps://cdn.jsdelivr.net/net/npm/boptstrap@5.3.0/dist/css/bootstrap.min.css"
    rel="stylesheet"
    integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSm07SnpJef0486qhLnuZ2cdeRh002iuK6FUUVM"
    crossorigin="anonymous"
    <head>
        <body>
            <h1 style="text-align: center;">REPORTE</h1>
            <h1 style="text-align: center;">NRC POR CARRERAS</h1>
            <p>{{ $date }}</p>

            <style>
                table{
                    margin: 0 auto;
                    width: 80%;
                    border-collapse: collapse;
                }
                th,td{
                    padding: 10px;
                    text-align: center;
                    border: 1px solid #ddd;
                }
                th{
                    background-color: #f2f2f2;
                }
                </style>

            <table>
                <thead>
                    <tr>
                        <th>Carrera</th>
                        <th>Nrc</th>
                    </tr>
                   <tbody>
                    @foreach ($records as $record)
                    <tr>
                        <td>{{ $record->carrera->nombre_car }}</td>
                        <td>{{ $record->codigo_nrc }}</td>
                    </tr>
                    @endforeach
                </thead>
            </tbody>
            </table>
