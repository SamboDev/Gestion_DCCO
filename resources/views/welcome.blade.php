@extends('layouts.app')

@section('title', __('Bienvenido'))

@section('content')

<style>
    body {
        background-color: #f8f9fa; /* Cambia el color de fondo según tus preferencias */
    }

    .icon-box {
        background-color: #ffffff; /* Fondo blanco para cada cuadro */
        transition: transform 0.3s ease-in-out; /* Agrega una transición suave al hacer hover */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Agrega sombra suave */
        border-radius: 10px; /* Bordes redondeados */
        padding: 20px;
        margin-bottom: 20px;
    }

    .icon-box:hover {
        transform: scale(1.1); /* Aumenta ligeramente el tamaño al hacer hover */
    }

    #hero {
        background-color: #4977bf; /* Fondo azul */
        color: #00000; /* Texto negro */
        padding: 100px 0;
    }
    .about-container {
        background-color: #fff; /* Fondo blanco para la caja */
        border-radius: 10px; /* Bordes redondeados */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Sombra suave */
        padding: 20px; /* Relleno interno */
        margin-bottom: 30px; /* Márgenes inferiores */
        transition: background-color 0.3s ease-in-out, box-shadow 0.3s ease-in-out; /* Transiciones suaves */
    }

    .about-container:hover {
        background-color: #f0f0f0; /* Cambia el color de fondo al hacer hover */
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2); /* Aumenta la sombra al hacer hover */
    }

    #about h2 {
        color: #3876d9; /* Color del título */
        transition: color 0.3s ease-in-out; /* Transición suave para el color del título */
    }

    .about-container:hover #about h2 {
        color: #255983; /* Cambia el color del título al hacer hover */
    }

    #about p {
        color: #555; /* Color del texto */
        transition: color 0.3s ease-in-out; /* Transición suave para el color del texto */
    }

    .about-container:hover #about p {
        color: #333; /* Cambia el color del texto al hacer hover */
    }

    #frase p {
        font-style: italic; /* Estilo cursiva para la frase */
        font-size: 1.2em; /* Tamaño de fuente ajustado */
        color: #555; /* Color del texto */
        transition: font-size 0.3s ease-in-out, color 0.3s ease-in-out; /* Transiciones suaves para tamaño de fuente y color */
    }

    #frase:hover p {
        font-size: 1.4em; /* Aumenta el tamaño de fuente al hacer hover */
        color: #3876d9; /* Cambia el color del texto al hacer hover */
    }
    #contact {
        background-color: #f8f9fa; /* Fondo gris claro */
        padding: 60px 0;
    }

    #contact h2 {
        color: #3876d9; /* Color del título */
        transition: color 0.3s ease-in-out; /* Transición suave para el color del título */
    }

    #contact p {
        color: #555; /* Color del texto */
        transition: color 0.3s ease-in-out; /* Transición suave para el color del texto */
    }

    .contact-container {
        background-color: #fff; /* Fondo blanco para la caja */
        border-radius: 10px; /* Bordes redondeados */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Sombra suave */
        padding: 20px; /* Relleno interno */
        margin-bottom: 30px; /* Márgenes inferiores */
        transition: background-color 0.3s ease-in-out, box-shadow 0.3s ease-in-out; /* Transiciones suaves */
    }

    .contact-container:hover {
        background-color: #f0f0f0; /* Cambia el color de fondo al hacer hover */
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2); /* Aumenta la sombra al hacer hover */
    }
</style>

<div class="container">
    <section id="about" class="about-container">
        <div class="container" data-aos="fade-up">
            <div class="row">
                <div class="col-lg-6">
                    <div class="section-title">
                        <h2>Departamento de Ciencias de la Computación</h2>
                        <p>Gestionar los Programas de Posgrados del DCCO y, apoyar a las Carreras de Grado y Programas de Posgrado, en la formación de académicos, profesionales e investigadores de excelencia...</p>
                    </div>
                </div>
                <div id="frase" class="col-lg-6 pt-4 pt-lg-0">
                    <p>“LA TECNOLOGÍA ES LA QUE MARCA LA DIFERENCIA EN EL DESARROLLO DE LAS NACIONES...</p>
                </div>
            </div>
        </div>
    </section>

    <section id="hero" class="d-flex align-items-center rounded">
        <div class="container position-relative" data-aos="fade-up" data-aos-delay="100">
            <div class="text-center">
                <!-- Contenido adicional si es necesario -->
            </div>

            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 icon-boxes">
                <div class="col-md-6 col-lg-3" data-aos="zoom-in" data-aos-delay="200">
                    <div class="icon-box">
                        <div class="icon"><i class="ri-stack-line"></i></div>
                        <h4 class="title">Áreas de Conocimiento</h4>
                        <ul class="description">
                            <li>Investigación de Operaciones</li>
                            <li>Control de Procesos</li>
                            <li>Ciencia de la Computación</li>
                            <li>TIC's</li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3" data-aos="zoom-in" data-aos-delay="300">
                    <div class="icon-box">
                        <div class="icon"><i class="ri-palette-line"></i></div>
                        <h4 class="title">Profesores</h4>
                        <ul class="description">
                            <li>Ing. Fabian Montaluisa</li>
                            <li>Ing. Alexandra Corral</li>
                            <li>Ing. Ruben López</li>
                            <li>Ing. Santiago Jácome</li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3" data-aos="zoom-in" data-aos-delay="400">
                    <div class="icon-box">
                        <div class="icon"><i class="ri-command-line"></i></div>
                        <h4 class="title">Materias</h4>
                        <ul class="description">
                            <li>Desarrollo Web</li>
                            <li>Base de Datos</li>
                            <li>Computación Gráfica</li>
                            <li>Investigación ISOW</li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3" data-aos="zoom-in" data-aos-delay="500">
                    <div class="icon-box">
                        <div class="icon"><i class="ri-fingerprint-line"></i></div>
                        <h4 class="title">Carreras</h4>
                        <ul class="description">
                            <li>Software</li>
                            <li>Electronica</li>
                            <li>Petroquímica</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="contact" class="contact-container">
    <div class="container text-center">
        <div class="container" data-aos="fade-up">
            <div class="section-title">
                <h2> Universidad de las Fuerzas Armadas - ESPE </h2>
                <p>Campus:
                    <li>Sangolqui</li>
                    <li>Latacunga</li>
                    <li>Santo Domingo</li>
                </p>
            </div>
            <div class="embed-responsive embed-responsive-16by9">
                <iframe class="embed-responsive-item" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15957.143816772848!2d-78.6126566!3d-0.9359898!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x91d4610f5d33a74d%3A0x408aab614807127a!2sUniversidad%20de%20las%20Fuerzas%20Armadas%20ESPE%20Sede%20Latacunga%20(campus%20centro)!5e0!3m2!1ses!2sec!4v1705268576964!5m2!1ses!2sec" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
        </div>
    </section>

@endsection
