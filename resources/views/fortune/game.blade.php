<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Fortune') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <div class="cases">
                <button class="case-btn" data-case="0">Кейс 1</button>
                <button class="case-btn" data-case="1">Кейс 2</button>
                <button class="case-btn" data-case="2">Кейс 3</button>
            </div>
            
            <div class="roulette-container">
                <div class="marker"></div>
                <div class="roulette-mask">
                    <div class="roulette"></div>
                </div>
            </div>
            <button id="spin-btn">Крутить рулетку</button>
            <p id="result"></p>    
            <div class="prizes-container flex row"></div>
            
        </div>
    </div>
</x-app-layout>
