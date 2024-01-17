@extends('layouts.guest')

@section('title', __('Bienvenido'))

@section('content')
<nav class="bg-sky-600 font-serif: Cambria items-center p-4">
    <h1>Sistema de Gestión DCCO
        <p class="text-base">Departamento de Ciencias de la Computación</p>
    </h1>
    <div class="text-right">
        <a href="{{ route('login') }}" class="pl-4 text-xl text-slate-800 hover:text-zinc-50">Ingresar</a>
        <a href="{{ route('register') }}" class="pl-4 text-xl text-slate-800 hover:text-zinc-50">Registrar</a>
    </div>
</nav>
<main class="bg-blue-300 pt-4 text-center">
    <div class="m-auto w-1/2 h-fit -p8 bg-blue-100 border rounded-2xl shadow-2xl">
    <h2>Departamento de Ciencias de la Computación</h2>
    <p>Gestionar los Programas de Posgrados del DCCO y, apoyar a las Carreras de Grado y Programas de Posgrado, en la formación de académicos, profesionales e investigadores de excelencia...</p>
    </div>
    <div class="grid grid-cols-3 gap-4 pt-5">
        <div class="m-auto mt-4 w-1/2 h-fit p-4 bg-blue-100 border rounded-2xl transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 hover:bg-blue-400 duration-300 col-span-1">
            <h1 class="text-center text-lg">Áreas de Conocimiento</h1>
            <p>
                <li class="text-left">Investigación Operaciones</li>
                <li class="text-left">Control de procesos</li>
                <li class="text-left">Ciencia de la Computación</li>
                <li class="text-left">TIC's</li>
            </p>
        </div>
        <div class="m-auto mt-4 w-1/2 h-fit p-4 bg-blue-100 border rounded-2xl transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 hover:bg-blue-400 duration-300 col-span-1">
            <h1 class="text-center text-lg">Profesores</h1>
            <p>
                <li class="text-left">Ing. Fabian Montaluisa</li>
                <li class="text-left">Ing. Alexandra Corral</li>
                <li class="text-left">Ing. Ruben López</li>
                <li class="text-left">Ing. Santiago Jácome</li>
            </p>
        </div>
        <div class="m-auto mt-4 w-1/2 h-fit p-4 bg-blue-100 border rounded-2xl transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 hover:bg-blue-400 duration-300 col-span-1">
            <h1 class="text-center text-lg">Materias</h1>
            <p>
                <li class="text-left">Desarrollo Web</li>
                <li class="text-left">Base de datos</li>
                <li class="text-left">Estructura de datos</li>
                <li class="text-left">Metodología-Investigación</li>
            </p>
        </div>
        <div class="m-auto mt-4 p-4 bg-blue-100 border rounded-2xl transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 hover:bg-blue-400 duration-300 col-span-1">
            <h1 class="text-center text-lg">Universidad de las Fuerzas Armadas -ESPE</h1>
            <p class="text-justify"> Campus
                <li class="text-left">Sangolquí</li>
                <li class="text-left">Latacunga</li>
                <li class="text-left">Santo Domingo</li>
                <br>
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15957.143816772848!2d-78.6126566!3d-0.9359898!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x91d4610f5d33a74d%3A0x408aab614807127a!2sUniversidad%20de%20las%20Fuerzas%20Armadas%20ESPE%20Sede%20Latacunga%20(campus%20centro)!5e0!3m2!1ses!2sec!4v1705466018960!5m2!1ses!2sec" width="200" height="200" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </p>
        </div>
        <div class="m-auto mt-4 w-1/2 h-fit p-4 bg-blue-100 border rounded-2xl transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 hover:bg-blue-400 duration-300 col-span-1">
            <h1 class="text-center text-lg">Carreras</h1>
            <p>
                <li class="text-left">Software</li>
                <li class="text-left">Electronica</li>
                <li class="text-left">Petroquímica</li>
            </p>
            
        </div>
    </div>
</main>
@endsection