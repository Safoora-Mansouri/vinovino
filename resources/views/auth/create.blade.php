<!DOCTYPE html>
<html>
<head>
    <title>Registration Page</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-gray-200">
    <div class="relative h-screen flex flex-col justify-end">
        <img src="{{ asset('img/page4.jpg') }}" alt="Background" class="absolute inset-0 object-cover w-full h-full" style="object-position: 50% 35%;" />
        <div class="absolute top-0 left-0 right-0 flex justify-center lg:justify-start">
            <img src="{{ asset('img/logo3.png') }}" alt="Logo" class="w-96 h-50 mt-16">
        </div>
        <div class="max-w-3xl mx-auto mb-16 bg-white bg-opacity-60 rounded-lg shadow-md p-8 relative w-full lg:max-w-md lg:w-5/6 lg:mb-36 lg:mt-auto lg:px-8 lg:py-1 z-10 overflow-hidden" style="min-height:52%;">

            <h1 class="text-5xl font-bold mb-18 text-center p-6 lg:mb-2 lg:p-0 lg:text-3xl">Registration</h1>
            <form method="POST">
            @csrf

            <div class="mb-6 lg:mb-4">
                @error('first_name')
                <div class="text-red-500 text-3xl lg:text-sm">{{ $message }}</div>
                @enderror
                <label for="first_name" class="sr-only">Prénom</label>
                <input id="first_name" type="text" name="first_name" value="{{ old('first_name') }}" required autofocus class="text-4xl shadow appearance-none border-gray-300 rounded-md w-full py-6 px-6 leading-tight focus:outline-none focus:shadow-outline lg:px-2 lg:py-2 lg:text-xl" placeholder="Prénom">
            </div>
            

            <div class="mb-6 lg:mb-4">
                @error('last_name')
                <div class="text-red-500 text-3xl lg:text-sm">{{ $message }}</div>
                @enderror
                <label for="last_name" class="sr-only">Nom de famille</label>
                <input id="last_name" type="text" name="last_name" value="{{ old('last_name') }}" required class="text-4xl shadow appearance-none border-gray-300 rounded-md w-full py-6 px-6 leading-tight focus:outline-none focus:shadow-outline lg:px-2 lg:py-2 lg:text-xl"placeholder="Nom de famille">
            </div>

            <div class="mb-6 lg:mb-4">
                @error('email')
                <div class="text-red-500 text-3xl lg:text-sm">{{ $message }}</div>
                @enderror
                <label for="email" class="sr-only">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required class="text-4xl shadow appearance-none border-gray-300 rounded-md w-full py-6 px-6 leading-tight focus:outline-none focus:shadow-outline lg:px-2 lg:py-2 lg:text-xl" placeholder="Courriel">
            </div>

            <div class="mb-6 lg:mb-4">
                @error('password')
                <div class="text-red-500 text-3xl lg:text-sm">{{ $message }}</div>
                @enderror
                <label for="password" class="sr-only">Mot de passe</label>
                <input id="password" type="password" name="password" required class="text-4xl shadow appearance-none border-gray-300 rounded-md w-full py-6 px-6 leading-tight focus:outline-none focus:shadow-outline lg:px-2 lg:py-2 lg:text-xl" placeholder="Mot de passe">
            </div>

            <div class="mb-6 lg:mb-4">
                <label for="password_confirmation" class="sr-only">Confirmation du mot de passe</label>
                <input id="password_confirmation" type="password" name="password_confirmation" required class="text-4xl shadow appearance-none border-gray-300 rounded-md w-full py-6 px-6 leading-tight focus:outline-none focus:shadow-outline lg:px-2 lg:py-2 lg:text-xl"placeholder="Confirmation de mot de passe">
            </div>

            <div class="flex justify-between items-center mb-6">
                <button type="submit" class="bg-red hover:bg-blue-700 text-white font-bold py-8 px-18 rounded text-4xl focus:outline-none focus:shadow-outline w-64 lg:px-2 lg:py-2 lg:text-xl lg:w-40">S'inscrire</button>
                <a href="{{ route('login') }}" class="text-red text-4xl lg:text-2xl">Se connecter</a>
            </div>

        </form>
    </div>   
</body>
</html>
