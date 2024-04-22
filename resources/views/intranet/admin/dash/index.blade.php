<x-app-layout>

    <!-- component -->
    <style>
        .pattern {
            /* From - https://bgjar.com/meteor */
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' version='1.1' xmlns:xlink='http://www.w3.org/1999/xlink' xmlns:svgjs='http://svgjs.com/svgjs' width='1440' height='560' opacity='0.05' preserveAspectRatio='none' viewBox='0 0 1440 560'%3e%3cg mask='url(%26quot%3b%23SvgjsMask1021%26quot%3b)' fill='none'%3e%3cpath d='M905 408L904 38' stroke-width='6' stroke='url(%23SvgjsLinearGradient1022)' stroke-linecap='round' class='Up'%3e%3c/path%3e%3cpath d='M607 269L606 125' stroke-width='10' stroke='url(%23SvgjsLinearGradient1023)' stroke-linecap='round' class='Down'%3e%3c/path%3e%3cpath d='M68 213L67 365' stroke-width='8' stroke='url(%23SvgjsLinearGradient1022)' stroke-linecap='round' class='Up'%3e%3c/path%3e%3cpath d='M1397 326L1396 563' stroke-width='8' stroke='url(%23SvgjsLinearGradient1022)' stroke-linecap='round' class='Up'%3e%3c/path%3e%3cpath d='M365 418L364 761' stroke-width='6' stroke='url(%23SvgjsLinearGradient1023)' stroke-linecap='round' class='Down'%3e%3c/path%3e%3cpath d='M293 317L292 38' stroke-width='8' stroke='url(%23SvgjsLinearGradient1023)' stroke-linecap='round' class='Down'%3e%3c/path%3e%3cpath d='M1247 130L1246 508' stroke-width='6' stroke='url(%23SvgjsLinearGradient1023)' stroke-linecap='round' class='Down'%3e%3c/path%3e%3cpath d='M1339 5L1338 -305' stroke-width='10' stroke='url(%23SvgjsLinearGradient1023)' stroke-linecap='round' class='Down'%3e%3c/path%3e%3cpath d='M831 7L830 -367' stroke-width='6' stroke='url(%23SvgjsLinearGradient1023)' stroke-linecap='round' class='Down'%3e%3c/path%3e%3cpath d='M113 250L112 605' stroke-width='10' stroke='url(%23SvgjsLinearGradient1023)' stroke-linecap='round' class='Down'%3e%3c/path%3e%3cpath d='M967 177L966 -236' stroke-width='6' stroke='url(%23SvgjsLinearGradient1022)' stroke-linecap='round' class='Up'%3e%3c/path%3e%3cpath d='M922 538L921 160' stroke-width='6' stroke='url(%23SvgjsLinearGradient1022)' stroke-linecap='round' class='Up'%3e%3c/path%3e%3cpath d='M1109 316L1108 32' stroke-width='8' stroke='url(%23SvgjsLinearGradient1023)' stroke-linecap='round' class='Down'%3e%3c/path%3e%3cpath d='M1281 270L1280 50' stroke-width='10' stroke='url(%23SvgjsLinearGradient1023)' stroke-linecap='round' class='Down'%3e%3c/path%3e%3cpath d='M1280 403L1279 17' stroke-width='8' stroke='url(%23SvgjsLinearGradient1023)' stroke-linecap='round' class='Down'%3e%3c/path%3e%3cpath d='M308 106L307 490' stroke-width='10' stroke='url(%23SvgjsLinearGradient1023)' stroke-linecap='round' class='Down'%3e%3c/path%3e%3cpath d='M517 147L516 374' stroke-width='10' stroke='url(%23SvgjsLinearGradient1023)' stroke-linecap='round' class='Down'%3e%3c/path%3e%3cpath d='M690 30L689 341' stroke-width='10' stroke='url(%23SvgjsLinearGradient1022)' stroke-linecap='round' class='Up'%3e%3c/path%3e%3cpath d='M614 367L613 154' stroke-width='10' stroke='url(%23SvgjsLinearGradient1023)' stroke-linecap='round' class='Down'%3e%3c/path%3e%3cpath d='M770 486L769 188' stroke-width='6' stroke='url(%23SvgjsLinearGradient1023)' stroke-linecap='round' class='Down'%3e%3c/path%3e%3cpath d='M1336 235L1335 573' stroke-width='10' stroke='url(%23SvgjsLinearGradient1023)' stroke-linecap='round' class='Down'%3e%3c/path%3e%3cpath d='M303 441L302 96' stroke-width='10' stroke='url(%23SvgjsLinearGradient1023)' stroke-linecap='round' class='Down'%3e%3c/path%3e%3cpath d='M970 211L969 384' stroke-width='10' stroke='url(%23SvgjsLinearGradient1022)' stroke-linecap='round' class='Up'%3e%3c/path%3e%3cpath d='M151 243L150 26' stroke-width='6' stroke='url(%23SvgjsLinearGradient1022)' stroke-linecap='round' class='Up'%3e%3c/path%3e%3cpath d='M184 391L183 201' stroke-width='10' stroke='url(%23SvgjsLinearGradient1022)' stroke-linecap='round' class='Up'%3e%3c/path%3e%3cpath d='M1299 123L1298 -228' stroke-width='10' stroke='url(%23SvgjsLinearGradient1023)' stroke-linecap='round' class='Down'%3e%3c/path%3e%3cpath d='M1024 466L1023 254' stroke-width='6' stroke='url(%23SvgjsLinearGradient1022)' stroke-linecap='round' class='Up'%3e%3c/path%3e%3cpath d='M1385 330L1384 546' stroke-width='10' stroke='url(%23SvgjsLinearGradient1023)' stroke-linecap='round' class='Down'%3e%3c/path%3e%3cpath d='M991 172L990 552' stroke-width='8' stroke='url(%23SvgjsLinearGradient1023)' stroke-linecap='round' class='Down'%3e%3c/path%3e%3cpath d='M600 461L599 254' stroke-width='10' stroke='url(%23SvgjsLinearGradient1023)' stroke-linecap='round' class='Down'%3e%3c/path%3e%3cpath d='M146 544L145 145' stroke-width='8' stroke='url(%23SvgjsLinearGradient1023)' stroke-linecap='round' class='Down'%3e%3c/path%3e%3cpath d='M539 421L538 723' stroke-width='10' stroke='url(%23SvgjsLinearGradient1023)' stroke-linecap='round' class='Down'%3e%3c/path%3e%3cpath d='M1408 130L1407 316' stroke-width='10' stroke='url(%23SvgjsLinearGradient1022)' stroke-linecap='round' class='Up'%3e%3c/path%3e%3cpath d='M1134 160L1133 572' stroke-width='8' stroke='url(%23SvgjsLinearGradient1023)' stroke-linecap='round' class='Down'%3e%3c/path%3e%3cpath d='M810 190L809 39' stroke-width='8' stroke='url(%23SvgjsLinearGradient1023)' stroke-linecap='round' class='Down'%3e%3c/path%3e%3cpath d='M1069 388L1068 46' stroke-width='8' stroke='url(%23SvgjsLinearGradient1023)' stroke-linecap='round' class='Down'%3e%3c/path%3e%3c/g%3e%3cdefs%3e%3cmask id='SvgjsMask1021'%3e%3crect width='1440' height='560' fill='white'%3e%3c/rect%3e%3c/mask%3e%3clinearGradient x1='0%25' y1='100%25' x2='0%25' y2='0%25' id='SvgjsLinearGradient1022'%3e%3cstop stop-color='rgba(255%2c 255%2c 255%2c 0)' offset='0'%3e%3c/stop%3e%3cstop stop-color='rgba(255%2c 255%2c 255%2c 1)' offset='1'%3e%3c/stop%3e%3c/linearGradient%3e%3clinearGradient x1='0%25' y1='0%25' x2='0%25' y2='100%25' id='SvgjsLinearGradient1023'%3e%3cstop stop-color='rgba(255%2c 255%2c 255%2c 0)' offset='0'%3e%3c/stop%3e%3cstop stop-color='rgba(255%2c 255%2c 255%2c 1)' offset='1'%3e%3c/stop%3e%3c/linearGradient%3e%3c/defs%3e%3c/svg%3e");
        }
    </style>
    <div class=" bg-gray-50 dark:bg-slate-900 pattern">
        <nav
            class="z-20 flex shrink-0 grow-0 justify-around gap-4 border-t border-gray-200 bg-white/50 p-2.5 shadow-lg backdrop-blur-lg dark:border-slate-600/60 dark:bg-slate-800/50 fixed top-2/4 -translate-y-2/4 left-6 min-h-[auto] min-w-[64px] flex-col rounded-lg border">
            <a href="/admin/apps/create"
                class="flex aspect-square min-h-[32px] w-16 flex-col items-center justify-center gap-1 rounded-md p-1.5 text-gray-700 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-slate-800"><!-- HeroIcon - User -->
                <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                    viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 18.5A2.493 2.493 0 0 1 7.51 20H7.5a2.468 2.468 0 0 1-2.4-3.154 2.98 2.98 0 0 1-.85-5.274 2.468 2.468 0 0 1 .92-3.182 2.477 2.477 0 0 1 1.876-3.344 2.5 2.5 0 0 1 3.41-1.856A2.5 2.5 0 0 1 12 5.5m0 13v-13m0 13a2.493 2.493 0 0 0 4.49 1.5h.01a2.468 2.468 0 0 0 2.403-3.154 2.98 2.98 0 0 0 .847-5.274 2.468 2.468 0 0 0-.921-3.182 2.477 2.477 0 0 0-1.875-3.344A2.5 2.5 0 0 0 14.5 3 2.5 2.5 0 0 0 12 5.5m-8 5a2.5 2.5 0 0 1 3.48-2.3m-.28 8.551a3 3 0 0 1-2.953-5.185M20 10.5a2.5 2.5 0 0 0-3.481-2.3m.28 8.551a3 3 0 0 0 2.954-5.185" />
                </svg>


                <small class="text-xs font-medium text-center"> Apps </small>
            </a>

            <a href="/blog/create"
                class="flex aspect-square min-h-[32px] w-16 flex-col items-center justify-center gap-1 rounded-md p-1.5 text-gray-700 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-slate-800">
                <!-- HeroIcon - Chart Bar -->
                <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                    viewBox="0 0 24 24">
                    <path fill-rule="evenodd"
                        d="M5 3a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h11.5c.07 0 .14-.007.207-.021.095.014.193.021.293.021h2a2 2 0 0 0 2-2V7a1 1 0 0 0-1-1h-1a1 1 0 1 0 0 2v11h-2V5a2 2 0 0 0-2-2H5Zm7 4a1 1 0 0 1 1-1h.5a1 1 0 1 1 0 2H13a1 1 0 0 1-1-1Zm0 3a1 1 0 0 1 1-1h.5a1 1 0 1 1 0 2H13a1 1 0 0 1-1-1Zm-6 4a1 1 0 0 1 1-1h6a1 1 0 1 1 0 2H7a1 1 0 0 1-1-1Zm0 3a1 1 0 0 1 1-1h6a1 1 0 1 1 0 2H7a1 1 0 0 1-1-1ZM7 6a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h3a1 1 0 0 0 1-1V7a1 1 0 0 0-1-1H7Zm1 3V8h1v1H8Z"
                        clip-rule="evenodd" />
                </svg>


                <small class="text-xs font-medium text-center"> Blog </small>
            </a>
            <a href="/admin/slide"
                class="flex aspect-square min-h-[32px] w-16 flex-col items-center justify-center gap-1 rounded-md p-1.5 text-gray-700 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-slate-800">
                <!-- HeroIcon - Chart Bar -->
                <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                    viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m3 16 5-7 6 6.5m6.5 2.5L16 13l-4.286 6M14 10h.01M4 19h16a1 1 0 0 0 1-1V6a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1Z" />
                </svg>



                <small class="text-xs font-medium text-center"> Slide </small>
            </a>
            <a href="/admin/config"
                class="flex aspect-square min-h-[32px] w-16 flex-col items-center justify-center gap-1 rounded-md p-1.5 text-gray-700 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-slate-800">
                <!-- HeroIcon - Cog-6-tooth -->
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6 shrink-0">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.324.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 011.37.49l1.296 2.247a1.125 1.125 0 01-.26 1.431l-1.003.827c-.293.24-.438.613-.431.992a6.759 6.759 0 010 .255c-.007.378.138.75.43.99l1.005.828c.424.35.534.954.26 1.43l-1.298 2.247a1.125 1.125 0 01-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.57 6.57 0 01-.22.128c-.331.183-.581.495-.644.869l-.213 1.28c-.09.543-.56.941-1.11.941h-2.594c-.55 0-1.02-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 01-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 01-1.369-.49l-1.297-2.247a1.125 1.125 0 01.26-1.431l1.004-.827c.292-.24.437-.613.43-.992a6.932 6.932 0 010-.255c.007-.378-.138-.75-.43-.99l-1.004-.828a1.125 1.125 0 01-.26-1.43l1.297-2.247a1.125 1.125 0 011.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.087.22-.128.332-.183.582-.495.644-.869l.214-1.281z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>

                <small class="text-xs font-medium text-center"> Configurações </small>
            </a>

            <hr class="dark:border-gray-700/60" />

            <a href="/"
                class="flex flex-col items-center justify-center w-16 h-16 gap-1 text-fuchsia-900 dark:text-gray-400">
                <!-- HeroIcon - Home Modern -->
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M8.25 21v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21m0 0h4.5V3.545M12.75 21h7.5V10.75M2.25 21h1.5m18 0h-18M2.25 9l4.5-1.636M18.75 3l-1.5.545m0 6.205l3 1m1.5.5l-1.5-.5M6.75 7.364V3h-3v18m3-13.636l10.5-3.819" />
                </svg>

                <small className="text-xs font-medium">Home</small>
            </a>
        </nav>
    </div>
    <div class="flex-grow p-6 overflow-auto">
        <div
            class="container max-w-screen-md col-span-3 px-6 mx-auto bg-white border border-gray-300 rounded shadow-md">
            <!-- Añadido px-6 para el padding -->
            <img src="https://emprenderconactitud.com/img/nety.png" alt="Logo" class="block h-20 mx-auto mb-5">
            <h1 class="mb-3 text-2xl font-bold">Você está quase pronto!</h1>
            <p class="text-left">Olá,</p>
            <p class="text-left">Está primeira versão da intranet livre, estamos trabalhando para contruir algo
                incrivel por isso precisamos de você</p>
            <a href="#" class="inline-block px-4 py-2 mt-5 font-bold text-white bg-teal-500 rounded">Fazer
                Doação</a>
            <p class="mt-5 text-sm text-left text-gray-700">Sua doação possibilita implementação de noas
                funcionalidades e correção de bugs</p>
            <p class="text-sm text-left text-gray-700">Atenciosamente,</p>
            <p class="text-sm text-left text-gray-700">Gabriel</p>
        </div>
    </div>


</x-app-layout>
