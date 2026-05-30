<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $setting->site_title }}</title>
    <link rel="icon" href="{{ $setting->getSiteImageUrl() }}" type="image/x-icon">

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }

        .glass {
            backdrop-filter: blur(12px);
            background: rgba(255, 255, 255, .1);
            border: 1px solid rgba(255, 255, 255, .2);
        }
    </style>
</head>

<body class="bg-black text-white overflow-x-hidden">

    <!-- Navbar -->

    <nav class="fixed top-0 w-full z-50">
        <div class="glass">

            <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">

                <div class="text-3xl font-black tracking-wider">

                    {{ $setting->logo_text }}

                </div>

                @auth
                    <div class="flex items-center gap-3">

                        <div class="w-10 h-10 rounded-full bg-white text-black flex items-center justify-center font-bold">
                            {{ substr(auth()->user()->name, 0, 1) }}
                        </div>

                        <div class="flex flex-col">
                            <div class="font-semibold">
                                {{ auth()->user()->name }}
                            </div>

                            <div class="text-xs text-gray-300">
                                Logged In
                            </div>
                        </div>

                        <!-- Logout -->
                        <form method="POST" action="{{ route('filament.admin.auth.logout') }}">
                            @csrf

                            <button type="submit"
                                class="ml-3 px-4 py-2 bg-red-500 hover:bg-red-600 text-white text-sm rounded-lg transition">
                                Logout
                            </button>
                        </form>

                    </div>
                @endauth


                @guest
                    <div class="flex items-center gap-3">

                        <a href="{{ route('filament.admin.auth.login') }}"
                            class="px-4 py-2 bg-white text-black rounded-lg font-medium hover:opacity-80 transition">
                            Login
                        </a>

                    </div>
                @endguest

            </div>

        </div>
    </nav>

    <!-- Hero -->

    <section class="min-h-screen flex items-center"
        style="
    background:
    linear-gradient(
    135deg,
    {{ $setting->hero_gradient[0] ?? '#2563eb' }},
    {{ $setting->hero_gradient[1] ?? '#7c3aed' }}
    );
">

        <div class="max-w-7xl mx-auto px-6 w-full">

            <div class="grid lg:grid-cols-2 gap-16 items-center">

                <!-- Text -->

                <div>

                    <span class="uppercase tracking-[6px] text-white/80">
                        Welcome
                    </span>

                    <h1 class="text-6xl lg:text-8xl font-black mt-5 leading-none">

                        {{ $setting->site_name }}

                    </h1>

                    <p class="mt-8 text-xl text-white/80 leading-relaxed">
                        {{ $setting->hero_desc }}
                    </p>

                    <div class="mt-10 flex gap-4">

                        <a href="#"
                            class="px-8 py-4 bg-white text-black rounded-xl font-bold hover:scale-105 transition">
                            Get Started
                        </a>

                        <a href="#"
                            class="px-8 py-4 border border-white rounded-xl font-bold hover:bg-white hover:text-black transition">
                            Learn More
                        </a>

                    </div>

                </div>

                <!-- Image -->

                <div class="relative">

                    <div class="absolute inset-0 blur-3xl bg-white/20 rounded-full"></div>

                    <img src="{{ $setting->getHeroImageUrl() }}" alt="Hero" class="relative  rounded-3xl  ">

                </div>

            </div>

        </div>

    </section>

</body>

</html>
