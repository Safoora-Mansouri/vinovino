<!DOCTYPE html>
<html>
<head>
    <title>Page de connexion</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="flex items-end  sm:h-screen justify-center h-screen lg:bg-center bg-center bg-no-repeat bg-cover lg:items-center lg:justify-center">
        <img src="{{ asset('img/page3.jpg') }}" alt="Background" class="absolute inset-0 object-cover w-full h-screen" style="object-position: 50% 35%;" />
        <div class="absolute top-0 left-0 right-0 flex justify-center lg:justify-start">
            <img src="{{ asset('img/logo3.png') }}" alt="Logo" class="w-96 h-50 mt-16">
        </div>

     <!-- <div class="mb-16 p-14 bg-white bg-opacity-60 rounded-md text-center lg:w-4/5 lg:max-w-md lg:w-1/2 lg:mb-8 lg:mt-auto z-10" style="width: calc(100% - 20%); height: 32%;">


            @if(session('success'))
                <div class="bg-green-200 text-green-800 p-2 mb-4 rounded">{{ session('success') }}</div>
            @endif

            <form method="POST" action="{{ route('login') }}" class="space-y-4">
                @csrf

                @if($errors->any())
                    <div class="bg-red-200 text-red-800 p-2 mb-4 rounded">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li class="text-sm">{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="h-32 p-4" >
                    <label for="email" class="sr-only">Email</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required
                           class="border-gray-300 rounded-md p-2 w-full h-full mb-4 text-lg" style="font-size: 18px;"  placeholder="Courriel">
                </div>

                <div class="h-32 p-4">
                    <label for="password" class="sr-only">Mot de passe</label>
                    <input id="password" type="password" name="password" required
                           class="border-gray-300 rounded-md p-2 w-full h-full " placeholder="Mot de passe">
                </div>

                <div class="h-32 p-4">
                    <button type="submit" class="bg-red text-white py-2 px-4 rounded w-full h-full">Se connecter</button>
                </div>
            </form>

            <div class="text-center mt-4">
                <span class="text-sm">Vous n'avez pas de compte ?</span>
                <a href="{{ route('register') }}" class="text-red font-medium">S'inscrire</a>
            </div>
        </div>
    </div> -->

    <div class="bg-white bg-opacity-60 rounded-md text-center w-full ml-16 mb-16 mr-16 lg:w-4/5 lg:max-w-md lg:w-3/4 lg:mb-8 lg:mt-auto lg:p-0 z-10" style="width: calc(100% - 20%); height:34%;">

        @if(session('success'))
            <div class="bg-green-200 text-green-800 px-12 py-9 rounded text-3xl w-full">
                {{ session('success') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}" class=" px-12 py-18 mb-12 w-full lg:mb-4 ">
            @csrf

            @if($errors->any())
                <div class="bg-red-200 text-red-800 px-12 py-9 rounded text-3xl w-full ">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="mb-8 mt-8 lg:mb-4 ">
                <label for="email" class="sr-only">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required
                    class="text-4xl shadow  appearance-none border-gray-300 rounded-md w-full py-8 px-12  leading-tight focus:outline-none focus:shadow-outline lg:px-2 lg:py-2 lg:text-xl"
                    placeholder="Courriel">
            </div>

            <div class="mb-8 lg:mb-4">
                <label for="password" class="sr-only">Mot de passe</label>
                <input id="password" type="password" name="password" required
                    class="text-4xl shadow appearance-none border-gray-300 rounded-md w-full py-8 px-12  leading-tight focus:outline-none focus:shadow-outline lg:px-2 lg:py-2 lg:text-xl"
                    placeholder="Mot de passe">
            </div>

            <div class="flex items-center justify-center">
                <button type="submit" class="bg-red hover:bg-blue-700 text-white font-bold py-8 px-18 rounded text-4xl focus:outline-none focus:shadow-outline w-full lg:px-2 lg:py-2 lg:text-xl">
                    Se connecter
                </button>
            </div>
        </form>

        <div class="text-center text-4xl mt-12 w-full lg:text-xl lg:mt-1">
            <span class="text-black-600">Vous n'avez pas de compte ?</span>
            <a href="{{ route('register') }}" class="text-red hover:text-blue-700 underline">S'inscrire</a>
        </div>
    </div>

</body>
</html>



