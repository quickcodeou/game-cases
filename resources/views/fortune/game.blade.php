<x-fortune-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Fortune') }}
        </h2>
    </x-slot>
    <div class="fortunegame_section min-h-screen text-white overflow-hidden">
        <div class="fortunegame_section__glowBottom"></div>
        <div class="fortunegame_section__glowTop"></div>
        <div class="fixed inset-0 pointer-events-none">
            <div class="absolute text-4xl animate-float" style="top: 30.5813%; left: 6.54369%; animation-duration: 33.7821s; animation-delay: -2.08527s; transform: scale(0.957007);">
                <img style="height: 50vh" src="https://pngimg.com/d/shawarma_PNG4.png" alt="">
            </div>
            <div class="absolute text-4xl animate-float" style="top: 2.56476%; left: 68.8879%; animation-duration: 24.482s; animation-delay: -14.5302s; transform: scale(1.05881);">
                <img style="height: 40vh" src="https://vectorjungal.com/files/preview/960x960/11720079796mczpxbo8rphstladkfiklhuoaoespxwz9j2kvofdh0awwwd1qtamwj80yfjpebysskhdkzkflbrm1j3gxiengv6ciadsi1iina7a.png" alt="">
            </div>
            <div class="absolute text-4xl animate-float" style="top: 84.3513%; left: 58.7359%; animation-duration: 21.2224s; animation-delay: -7.08734s; transform: scale(1.15176);">
                <img style="height: 30vh" src="https://static.vecteezy.com/system/resources/thumbnails/046/544/935/small/french-fries-flying-out-of-paper-bucket-isolated-on-a-transparent-background-png.png" alt="">
            </div>
            {{-- <div class="absolute text-4xl opacity-5 animate-float" style="top: 66.5813%; left: 6.54369%; animation-duration: 33.7821s; animation-delay: -2.08527s; transform: scale(0.957007);">🍕</div>
            <div class="absolute text-4xl opacity-5 animate-float" style="top: 2.56476%; left: 47.8879%; animation-duration: 24.482s; animation-delay: -14.5302s; transform: scale(1.05881);">🌭</div>
            <div class="absolute text-4xl opacity-5 animate-float" style="top: 66.7753%; left: 90.9674%; animation-duration: 23.7667s; animation-delay: -14.6617s; transform: scale(1.04002);">🍟</div>
            <div class="absolute text-4xl opacity-5 animate-float" style="top: 6.46967%; left: 43.625%; animation-duration: 31.2356s; animation-delay: -3.89919s; transform: scale(1.12351);">🥤</div>
            <div class="absolute text-4xl opacity-5 animate-float" style="top: 84.3513%; left: 69.7359%; animation-duration: 21.2224s; animation-delay: -7.08734s; transform: scale(1.15176);">🍦</div>
            <div class="absolute text-4xl opacity-5 animate-float" style="top: 15.6024%; left: 97.9378%; animation-duration: 28.7102s; animation-delay: -3.17871s; transform: scale(0.961662);">🍪</div><div class="absolute text-4xl opacity-5 animate-float" style="top: 63.8138%; left: 81.1918%; animation-duration: 26.0698s; animation-delay: -10.3419s; transform: scale(0.835516);">🍩</div><div class="absolute text-4xl opacity-5 animate-float" style="top: 28.6763%; left: 65.0572%; animation-duration: 23.4095s; animation-delay: -14.9049s; transform: scale(0.967354);">🥨</div><div class="absolute text-4xl opacity-5 animate-float" style="top: 8.81999%; left: 3.01594%; animation-duration: 18.827s; animation-delay: -5.19873s; transform: scale(1.02511);">🥪</div><div class="absolute text-4xl opacity-5 animate-float" style="top: 33.1629%; left: 31.3707%; animation-duration: 27.3949s; animation-delay: -9.15998s; transform: scale(1.13024);">🌮</div><div class="absolute text-4xl opacity-5 animate-float" style="top: 28.9365%; left: 78.4443%; animation-duration: 16.9156s; animation-delay: -2.78378s; transform: scale(1.13044);">🥡</div><div class="absolute text-4xl opacity-5 animate-float" style="top: 31.2412%; left: 32.556%; animation-duration: 31.8115s; animation-delay: -14.1352s; transform: scale(1.08046);">🍔</div><div class="absolute text-4xl opacity-5 animate-float" style="top: 23.4484%; left: 63.5644%; animation-duration: 33.6027s; animation-delay: -4.36676s; transform: scale(1.00814);">🍕</div><div class="absolute text-4xl opacity-5 animate-float" style="top: 39.0165%; left: 19.014%; animation-duration: 34.0162s; animation-delay: -7.18343s; transform: scale(1.09297);">🌭</div><div class="absolute text-4xl opacity-5 animate-float" style="top: 26.0175%; left: 41.1612%; animation-duration: 32.727s; animation-delay: -4.8613s; transform: scale(1.15);">🍟</div><div class="absolute text-4xl opacity-5 animate-float" style="top: 91.1878%; left: 95.6246%; animation-duration: 32.2587s; animation-delay: -1.72909s; transform: scale(0.824224);">🥤</div><div class="absolute text-4xl opacity-5 animate-float" style="top: 25.9065%; left: 87.4658%; animation-duration: 27.1402s; animation-delay: -2.41886s; transform: scale(0.882766);">🍦</div><div class="absolute text-4xl opacity-5 animate-float" style="top: 51.9823%; left: 75.5228%; animation-duration: 21.1783s; animation-delay: -5.10141s; transform: scale(0.852125);">🍪</div><div class="absolute text-4xl opacity-5 animate-float" style="top: 20.2668%; left: 73.827%; animation-duration: 25.3265s; animation-delay: -5.92234s; transform: scale(0.824256);">🍩</div> --}}
        </div>
        <header class="flex justify-between items-center p-4 border-b border-gray-800 bg-gray-900/50 backdrop-blur-sm relative z-10"><div class="flex items-center gap-2 hover:text-yellow-400 transition-colors"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-left w-6 h-6"><path d="m15 18-6-6 6-6"></path></svg><span>Назад</span></div><div class="flex gap-4"><button class="flex items-center gap-2 px-4 py-2 hover:text-yellow-400 transition-colors"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-home w-5 h-5"><path d="m3 9 9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg><span>Главная</span></button><button class="flex items-center gap-2 px-4 py-2 hover:text-yellow-400 transition-colors"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-gift w-5 h-5"><rect x="3" y="8" width="18" height="4" rx="1"></rect><path d="M12 8v13"></path><path d="M19 12v7a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2v-7"></path><path d="M7.5 8a2.5 2.5 0 0 1 0-5A4.8 8 0 0 1 12 8a4.8 8 0 0 1 4.5-5 2.5 2.5 0 0 1 0 5"></path></svg><span>Мои призы</span></button></div><div class="flex items-center gap-2 bg-gradient-to-r from-yellow-500 to-orange-500 px-4 py-2 rounded-lg shadow-lg hover:shadow-orange-500/20 transition-shadow"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-wallet2 w-5 h-5"><path d="M17 14h.01"></path><path d="M7 7h12a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h14"></path></svg><span>200 SP</span></div></header>
  
        <div class="mx-auto py-8 relative z-10">
  
            <div class="cases">
                <button class="case-btn" data-case="0">Кейс 1</button>
                <button class="case-btn" data-case="1">Кейс 2</button>
                <button class="case-btn" data-case="2">Кейс 3</button>
            </div>
            
            <div class="roulette-container">
                <div class="marker"></div>
                <div class="marker_bottom"></div>
                <div class="shadow_start"></div>
                <div class="shadow_end"></div>
                <div class="roulette-mask">
                    <div class="roulette">
                        
                    </div>
                </div>
            </div>
            <button id="spin-btn">Крутить рулетку</button>
            <p id="result"></p>
        </div>
        
        <div class="container mx-auto px-4 py-8 relative z-10">
            <div class="grid grid-cols-3 sm:grid-cols-5 md:grid-cols-8 gap-4 mt-16 prizes-container"></div>
        </div>
    </div>
  </x-fortune-layout>