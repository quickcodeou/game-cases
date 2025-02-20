<x-fortune-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Fortune') }}
        </h2>
    </x-slot>
    <div class="fortunegame_section min-h-screen text-white overflow-hidden">
        <div id="win_prizeModal" class="win_prize__bgBlur hidden">
            <div class="win_prize__container">
                <div id="result" class="result">
                    <img src="https://pngimg.com/d/shawarma_PNG4.png" alt="caseresult" class="win_prize__item">
                    <div class="prize_bg" style="background: rgb(30, 255, 0);"></div>
                </div>
                <div class="getItemText">Забрать</div>
            </div>
        </div>
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
        </div>
        <header class="flex justify-between items-center p-4 bg-white-900/50 backdrop-blur-sm relative z-10"><div class="flex items-center gap-2 hover:text-yellow-400 transition-colors"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-left w-6 h-6"><path d="m15 18-6-6 6-6"></path></svg><span>Назад</span></div><div class="flex gap-4"><button class="flex items-center gap-2 px-4 py-2 hover:text-yellow-400 transition-colors"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-home w-5 h-5"><path d="m3 9 9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg><span>Главная</span></button><button class="flex items-center gap-2 px-4 py-2 hover:text-yellow-400 transition-colors"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-gift w-5 h-5"><rect x="3" y="8" width="18" height="4" rx="1"></rect><path d="M12 8v13"></path><path d="M19 12v7a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2v-7"></path><path d="M7.5 8a2.5 2.5 0 0 1 0-5A4.8 8 0 0 1 12 8a4.8 8 0 0 1 4.5-5 2.5 2.5 0 0 1 0 5"></path></svg><span>Мои призы</span></button></div><div class="flex items-center gap-2 bg-gradient-to-r from-yellow-500 to-orange-500 px-4 py-2 rounded-lg shadow-lg hover:shadow-orange-500/20 transition-shadow"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-wallet2 w-5 h-5"><path d="M17 14h.01"></path><path d="M7 7h12a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h14"></path></svg><span>200 SP</span></div></header>

        <div class="mx-auto py-8 relative z-10">
            <div class="cases gap-4">
                <button class="case-btn">
                    <img src="{{ asset('img/case1.png') }}" data-case="0" alt="case1" class="case_img">
                </button>
                <button class="case-btn">
                    <img src="{{ asset('img/case1.png') }}" data-case="1" alt="case1" class="case_img">
                </button>
                <button class="case-btn">
                    <img src="{{ asset('img/case1.png') }}" data-case="2" alt="case1" class="case_img">
                </button>
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
            <button id="spin-btn" class="spin_roulette hidden">Крутить рулетку <span>100 SP</span> </button>
        </div>
        
        <div class="container mx-auto px-4 py-8 relative z-10">
            <div class="grid grid-cols-3 sm:grid-cols-5 md:grid-cols-8 gap-4 mt-16 prizes-container"></div>
        </div>
    </div>
  </x-fortune-layout>