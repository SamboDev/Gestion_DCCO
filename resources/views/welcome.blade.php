<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Gestión - DCCO</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <!-- Styles -->


    @livewireScripts

    <style>
        @import url("https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&display=swap");
        @import url("https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700&display=swap");

        :root {
            --bg: hsl(0 0% 5%);
            --white: hsl(0 0% 90%);
            --accent: hsl(0 0% 10%);
            --highlight: #03dac6;
            --swiper-navigation-color: #fff;
            --swiper-navigation-size: 1.1em;
        }

        * {
            margin: 0;
        }

        #dcco {
            width: 100%;
            height: 150px;
            ;
            font-size: 30px;

        }

        #dc {
            margin-top: 24%;
        }

        #titulo {
            justify-content: center;
            color: #065F46;
            margin-left: 8%;
        }

        #enlace1 {
            width: 130px;
            margin-left: 900px;
            margin-right: 65px;
            color: #065F46;
            margin-top: 35px;
            font-size: 25px;
            padding: 4px;
            font-weight: bold;
            border-radius: 4px;
            transition: padding 0.3s;
            background: linear-gradient(to bottom, rgba(255, 255, 255, 0.9), rgba(255, 255, 255, 0));
            transition: opacity 0.5s ease;

            /* Agregamos una transición para suavizar el cambio */
        }

        #enlace1:hover {
            padding: 6px;
            /* Ajusta el valor del padding según tus preferencias */
        }

        #enlace2 {
            color: #065F46;
            margin-left: 5px;
            margin-top: 25px;
            font-size: 25px;
            font-weight: bold;
            padding: 4px;
            border-radius: 4px;
            transition: padding 0.3s;
            background: linear-gradient(to bottom, rgba(255, 255, 255, 0.9), rgba(255, 255, 255, 0));
            transition: opacity 0.5s ease;
        }

        #enlace2:hover {
            padding: 6px;
            /* Ajusta el valor del padding según tus preferencias */
        }

        .contenedorSlider {
            margin-top: 25%;
            display: flex;
            width: 100%;
            height: 270px;
            font-family: "Nunito Sans", sans-serif;
            box-sizing: border-box;
            background: linear-gradient(to left, rgba(255, 255, 255, 0.5) 0%, rgba(255, 255, 255, 0) 20%),
                linear-gradient(to right, rgba(255, 255, 255, 0.5) 0%, rgba(255, 255, 255, 0) 20%);
            transition: opacity 0.5s ease;
            user-select: none;

        }

        .wrapper {
            margin-top: 10px;
            width: 100%;
            height: 50%;
            justify-content: center;

        }

        .swiper-wrapper {
            display: flex;
            height: 240px;
            /* o ajusta según sea necesario */

        }


        .swiper-slide {
            width: 1050px;
            cursor: pointer;
            border-radius: 20px;
            background: linear-gradient(to top, rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.1));
            transition: opacity 0.5s ease;
        }

        .swiper-slide .swiper-overlay {
            position: absolute;
            inset: 0;
            width: 100px;
            background: linear-gradient(to bottom, rgba(0, 0, 0, 0.1), rgba(0, 0, 0, 0.1));
            transition: opacity 0.5s ease;
            border-radius: 16px;
        }

        .swiper-slide img {
            width: 200px;
            height: 180px;
            margin-top: 20px;
            border-radius: inherit;
            object-fit: cover;
            object-position: center;
        }

        .swiper-slide .swiper-description {
            font-size: 1.5rem;
            width: 240px;
            position: absolute;
            bottom: 0;
            padding: 0;
            color: green;
            transform: translateY(450px);
            transition: transform 0.6s ease;
            margin-left: 155px;
            font-weight: bold;
        }

        .swiper-slide .swiper-description h1 {
            font-size: 1.7rem;
        }

        .swiper-slide .swiper-description li {
            font-size: 1.3rem;
            margin-top: 0.1em;
            color: white;
            margin-left: 30px;

            /* Puedes usar un valor hexadecimal o una clase de color de Tailwind, como text-gray-700 */
        }


        .swiper-slide:hover .swiper-overlay {
            opacity: 0.5;
        }

        .swiper-slide:hover .swiper-description {
            transform: translateY(-20px);
        }

        .swiper-button-prev,
        .swiper-button-next {
            background: black;
            opacity: 5;
            border-radius: 100%;
            padding: 1em;
            width: 0.5em;
            height: 0.5em;
            display: flex;
        }

        .swiper-button-next::after {
            margin-left: 0.2em;
        }

        .swiper-slide:not(.swiper-slide-visible) {
            opacity: 0;
        }
    </style>

</head>

<body class="antialiased">
    <nav class="relative font-verdana"
        style="height: 100vh; overflow: hidden; background: url('{{ asset('images/fondoEspe.jpeg') }}') no-repeat center center fixed; background-size: cover;">
        {{-- logo --}}
        <div class="absolute top-0 left-0 flex">
            <img class="w-2/3 h-2/3 ml-7 p-3 object-cover " src="{{ asset('images/dcco1.png') }}" alt="#">
        </div>
        @if (Route::has('login'))
            <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                @auth
                    <a href="{{ url('/dashboard') }}"
                        class="font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500" style="background-color: rgba(255, 255, 255, 0.5); width: 120px; font-size:30px;  border-radius: 4px; color:#065F46;">Dashboard</a>
                @else
                    {{-- LOGIN --}}
                    <div class="absolute p-5" style="position: fixed; top: 30px; right: 100px; pading: 2rem;">
                        <a id="enlace1" class="no-underline" href="{{ url('dashboard/login') }}"
                            style=" width: 120px;">Ingresar </a>
                    </div>
                    @if (Route::has('register'))
                        <div class="absolute p-5" style="position: fixed; top: 30px; right: 30px;">
                            <a id="enlace2" class="no-underline" href="{{ url('dashboard/register') }}"
                                style=" width: 130px;">Registrar</a>
                        </div>
                    @endif
                @endauth
            </div>
        @endif
        <div id="dcco" class="absolute top-390 left-5% font-size-35 text-black bg-opacity-80">
            <div class="ml-20 mt-7">
                <h1 id="titulo"class="text-black font-bold">DCCO</h1>
            </div>
            <div class="ml-20">
                <h1 id="titulo" class="text-black font-bold">Gestión del Departamento de Ciencias de la Computación
                </h1>
            </div>
        </div>
        {{-- AREA CCC --}}
        <section class="contenedorSlider flex">
            <div class="wrapper">
                <div class="swiper ">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <img class="image-slide" src="{{ asset('images/area.png') }}" alt="#">
                            <div class="swiper-overlay"></div>
                            <div class="swiper-description">
                                <h1 class="text-center text-xl font-bold">Áreas de Conocimiento</h1>
                                <div class="text-sm">
                                    @foreach($area as $area)
                                    <li>{{ $area -> nombre_are}}</li>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide ">
                            <img class="image-slide" src="{{ asset('images/mate.png') }}" alt="#">
                            <div class="swiper-overlay"></div>
                            <div class="swiper-description">
                                <h1 class="text-center text-xl font-bold">Materias</h1>
                                <div class="text-sm">
                                    @foreach($materia as $materia)
                                    <li>{{ $materia -> nombre_mat}}</li>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide ">
                            <img class="image-slide" src="{{ asset('images/pro.png') }}" alt="#">
                            <div class="swiper-overlay"></div>
                            <div class="swiper-description">
                                <h1 class="text-center text-xl font-bold">Profesores</h1>
                                <div class="text-sm">
                                    @foreach($docente as $docente)
                                    <li>{{ $docente -> nombre_doc}} {{ $docente -> apellido_doc}}</li>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <img class="image-slide" src="{{ asset('images/carrera.png') }}" alt="#">
                            <div class="swiper-overlay"></div>
                            <div class="swiper-description">
                                <h1 class="text-center text-xl font-bold">Carreras</h1>
                                <div class="text-sm">
                                    @foreach($carrera as $carrera)
                                    <li>{{ $carrera -> nombre_car}}</li>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    </nav>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/11.0.5/swiper-bundle.min.js"></script>
    <script>
        var swiper = new Swiper(".swiper", {
            loop: true,
            slidesPerView: 3,
            effect: "coverflow",
            coverflowEffect: {
                rotate: 20,
                slideShadows: true
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev"
            },
            keyboard: {
                enabled: true,
                onlyInViewport: false
            }
        });
    </script>
</body>

</html>