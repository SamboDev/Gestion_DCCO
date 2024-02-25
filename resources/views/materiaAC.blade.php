<!DOCTYPE html>
<html>
<head>
    <title>DOCENTES A MATERIAS</title>
    <link href="htpps://cdn.jsdelivr.net/net/npm/boptstrap@5.3.0/dist/css/bootstrap.min.css"
    rel="stylesheet"
    integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSm07SnpJef0486qhLnuZ2cdeRh002iuK6FUUVM"
    crossorigin="anonymous"
    <head>
        <body>
            <h1 style="text-align: center;">REPORTE</h1>
            <h1 style="text-align: center;">MATERIAS POR AREAS DE CONOCIMIENTO</h1>
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
                        <th>N°</th>
                        <th>Area de Conocimiento</th>
                        <th>Materia</th>
                    </tr>
                   <tbody> @php
                        $no=1;
                    @endphp
                    @foreach ($records as $record)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $record->area_conocimiento->nombre_are }}</td>
                        <td>{{ $record->nombre_mat }}</td>
                    </tr>
                    @endforeach
                </thead>
            </tbody>
            </table>
