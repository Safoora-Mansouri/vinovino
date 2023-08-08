<header class="relative">
    <!-- User Information (Top Right) -->
    <div class="bg-red border-b border-opacity-20 border-gray-300 w-full justify-between text-white text-xs">
        <div class="flex items-center justify-between" >
            @auth
            <p class="ml-3">Bonjour {{ $user->first_name }}</p>
            <svg class="h-6 w-6 text-gray-300 cursor-pointer" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round" wire:click="logout" style="margin-right:5px">
                <path stroke="none" d="M0 0h24v24H0z"/>
                <path d="M14 8v-2a2 2 0 0 0 -2 -2h-7a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h7a2 2 0 0 0 2 -2v-2" />
                <path d="M7 12h14l-3 -3m0 6l3 -3" />
            </svg>
            @endauth
        </div>
    </div>
     <!-- Logo (Centered) -->
     <div class="flex justify-center items-center  bg-red">
        <svg class="mx-auto" xmlns="http://www.w3.org/2000/svg" width="100pt"  height="65pt" version="1.0" viewBox="0 0 610.000000 409.000000" preserveAspectRatio="xMidYMid meet">
            <defs>
                <filter id="f1" x="-20%" y="-20%" width="140%" height="140%">
                    <feOffset result="offOut" in="SourceAlpha" dx="5" dy="5" />
                    <feGaussianBlur result="blurOut" in="offOut" stdDeviation="10" />
                    <feBlend in="SourceGraphic" in2="blurOut" mode="normal" />
                </filter>
            </defs>
            <g transform="translate(0.000000,409.000000) scale(0.100000,-0.100000)" fill="#F0F0F0" stroke="none" filter="url(#f1)">
            <path d="M635 2768 c4 -13 98 -313 133 -428 124 -401 294 -944 298 -951 3 -5 116 -9 252 -9 l247 0 194 628 c107 345 205 660 217 700 l22 72 -683 0 c-543 0 -683 -3 -680 -12z"/>
            <path d="M5158 2619 c-111 -16 -217 -84 -277 -177 -119 -185 -118 -539 1 -725 37 -59 113 -118 188 -147 112 -44 293 -35 401 21 92 46 168 155 205 290 24 89 25 308 1 399 -53 197 -173 314 -353 340 -78 11 -87 11 -166 -1z m173 -194 c41 -22 85 -86 100 -148 9 -32 14 -109 14 -197 0 -170 -15 -233 -70 -297 -42 -49 -90 -68 -153 -59 -116 16 -165 99 -178 306 -12 187 29 337 105 388 41 27 136 31 182 7z"/>
            <path d="M2318 2604 c-27 -8 -48 -19 -48 -25 0 -6 21 -86 46 -177 25 -92 81 -297 125 -456 44 -160 87 -305 96 -323 29 -61 96 -80 246 -68 l94 7 21 76 c11 42 75 272 142 511 88 315 118 437 110 445 -6 6 -55 13 -110 14 -88 3 -99 2 -104 -15 -3 -10 -15 -58 -26 -108 -12 -49 -41 -171 -65 -270 -23 -99 -57 -242 -75 -317 -18 -76 -37 -138 -41 -138 -9 0 -15 19 -25 75 -25 147 -166 683 -192 727 -32 55 -103 70 -194 42z"/>
            <path d="M4478 2608 c-48 -10 -75 -47 -84 -115 -7 -58 1 -478 13 -608 3 -43 2 -66 -4 -60 -5 6 -29 60 -53 120 -24 61 -98 234 -165 385 l-120 275 -100 3 c-55 2 -119 0 -142 -3 l-43 -6 0 -518 0 -518 38 -7 c48 -8 107 -7 156 1 l39 6 -6 311 c-4 171 -10 343 -13 381 -8 88 2 80 50 -40 19 -49 91 -216 159 -370 l123 -280 62 -9 c36 -5 96 -5 144 0 l83 9 3 514 c1 317 -1 518 -7 524 -12 12 -88 15 -133 5z"/>
            <path d="M3307 2603 c-4 -3 -7 -239 -7 -523 l0 -517 38 -7 c47 -8 117 -8 165 0 l37 7 0 523 0 524 -113 0 c-63 0 -117 -3 -120 -7z"/>
            </g>
        </svg>
    </div>
    <!-- Line under the logo -->
    <!-- <div class="border-b border-red w-5/6 mx-auto"></div> -->
</header>