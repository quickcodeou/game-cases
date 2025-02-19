const cases = [
    { 
        name: "Кейс 1", 
        prizes: [
            { name: "Шаурма", image: "https://pngimg.com/d/shawarma_PNG4.png", color: "#ff3300", chance: 0.5 },
            { name: "Шаурма", image: "https://pngimg.com/d/shawarma_PNG4.png", color: "#ff3300", chance: 0.5 },
            { name: "Бургер", image: "https://vectorjungal.com/files/preview/960x960/11720079796mczpxbo8rphstladkfiklhuoaoespxwz9j2kvofdh0awwwd1qtamwj80yfjpebysskhdkzkflbrm1j3gxiengv6ciadsi1iina7a.png", color: "#ff3300", chance: 1 },
            { name: "Картошка фри", image: "https://static.vecteezy.com/system/resources/thumbnails/046/544/935/small/french-fries-flying-out-of-paper-bucket-isolated-on-a-transparent-background-png.png", color: "#a841ff", chance: 5 },
            { name: "Картошка фри", image: "https://static.vecteezy.com/system/resources/thumbnails/046/544/935/small/french-fries-flying-out-of-paper-bucket-isolated-on-a-transparent-background-png.png", color: "#a841ff", chance: 5 },
            { name: "50 discount", image: "https://png.pngtree.com/png-vector/20220826/ourmid/pngtree-50-discount-offer-vector-transparent-png-image_6124907.png", color: "#87d743", chance: 8 },
            { name: "50 discount", image: "https://png.pngtree.com/png-vector/20220826/ourmid/pngtree-50-discount-offer-vector-transparent-png-image_6124907.png", color: "#87d743", chance: 8 },
            { name: "50 discount", image: "https://png.pngtree.com/png-vector/20220826/ourmid/pngtree-50-discount-offer-vector-transparent-png-image_6124907.png", color: "#87d743", chance: 8 },
            { name: "50 discount", image: "https://png.pngtree.com/png-vector/20220826/ourmid/pngtree-50-discount-offer-vector-transparent-png-image_6124907.png", color: "#87d743", chance: 8 },
            { name: "50 discount", image: "https://png.pngtree.com/png-vector/20220826/ourmid/pngtree-50-discount-offer-vector-transparent-png-image_6124907.png", color: "#87d743", chance: 8 },
            { name: "50 discount", image: "https://png.pngtree.com/png-vector/20220826/ourmid/pngtree-50-discount-offer-vector-transparent-png-image_6124907.png", color: "#87d743", chance: 8 },
            { name: "50 discount", image: "https://png.pngtree.com/png-vector/20220826/ourmid/pngtree-50-discount-offer-vector-transparent-png-image_6124907.png", color: "#87d743", chance: 8 },
            { name: "10 discount", image: "https://gallery.yopriceville.com/var/albums/Free-Clipart-Pictures/Sale-Stickers-PNG/-10%25_Sale_Off_PNG_Clipart_Image.png?m=1629814322", color: "#d1d1d1", chance: 17 },
            { name: "10 discount", image: "https://gallery.yopriceville.com/var/albums/Free-Clipart-Pictures/Sale-Stickers-PNG/-10%25_Sale_Off_PNG_Clipart_Image.png?m=1629814322", color: "#d1d1d1", chance: 17 },
            { name: "10 discount", image: "https://gallery.yopriceville.com/var/albums/Free-Clipart-Pictures/Sale-Stickers-PNG/-10%25_Sale_Off_PNG_Clipart_Image.png?m=1629814322", color: "#d1d1d1", chance: 17 },
            { name: "10 discount", image: "https://gallery.yopriceville.com/var/albums/Free-Clipart-Pictures/Sale-Stickers-PNG/-10%25_Sale_Off_PNG_Clipart_Image.png?m=1629814322", color: "#d1d1d1", chance: 17 },
        ]
    },
    { 
        name: "Кейс 2", 
        prizes: [
            { name: "Хот-Дог", image: "hotdog.png", color: "#ffcc66", chance: 40 },
            { name: "Кола", image: "cola.png", color: "#cc3300", chance: 40 },
            { name: "Наггетсы", image: "nuggets.png", color: "#ff9966", chance: 20 }
        ]
    },
    { 
        name: "Кейс 3", 
        prizes: [
            { name: "Комбо Меню", image: "combo.png", color: "#ffcc99", chance: 10 },
            { name: "Гигантская шаурма", image: "bigshawarma.png", color: "#ff9900", chance: 5 },
            { name: "Фастфуд Фестиваль", image: "festival.png", color: "#ff6600", chance: 85 }
        ]
    }
];

const caseButtons = document.querySelectorAll(".case-btn");
const spinButton = document.getElementById("spin-btn");
const prizesContainer = document.querySelector(".prizes-container");
const roulette = document.querySelector(".roulette");
const resultText = document.getElementById("result");

let isSpinning = false;
let currentPrizes = [];
let animationId;
let caseIndex = null;

caseButtons.forEach(button => {
    button.addEventListener("click", (event) => {
        if (isSpinning) return;

        caseIndex = event.target.dataset.case;
        currentPrizes = generatePrizeList(cases[caseIndex].prizes);
        displayPrizes(cases[caseIndex].prizes);
    });
});

spinButton.addEventListener("click", () => {
    if (!currentPrizes.length || isSpinning) return;
    currentPrizes = generatePrizeList(cases[caseIndex].prizes);
    startRoulette();
});

function generatePrizeList(prizes) {
    let weightedList = [];
    prizes.forEach(prize => {
        for (let i = 0; i < prize.chance; i++) {
            weightedList.push(prize);
        }
    });
    return weightedList.sort(() => Math.random() - 0.5);
}

function displayPrizes(prizes) {
    prizesContainer.innerHTML = "";
    prizes.forEach(prize => {
        let item = document.createElement("div");
        item.className = "relative cases_list__item aspect-square rounded-lg flex flex-col items-center justify-center border-b-[3px] overflow-hidden group transition-all duration-300 hover:scale-105 hover:shadow-lg";
        item.style.borderColor = prize.color;

        let lightEffect = document.createElement("div");
        lightEffect.className = "absolute prize_item__light";
        lightEffect.style.boxShadow = `0 0 70px 40px ${prize.color}`;

        let gradientOverlay = document.createElement("div");
        gradientOverlay.className = "absolute inset-0 bg-gradient-to-t cases_list__itemBg transition-opacity";
        gradientOverlay.style.background = `linear-gradient(to top, ${prize.color}, transparent)`;

        let img = document.createElement("img");
        img.className = "relative z-10 text-3xl mb-1 p-4 show_prizes__image";
        img.src = prize.image;
        img.alt = prize.name;

        item.appendChild(lightEffect);
        item.appendChild(gradientOverlay);
        item.appendChild(img);
        prizesContainer.appendChild(item);
    });
}

function startRoulette() {
    isSpinning = true;
    spinButton.disabled = true;
    roulette.innerHTML = "";
    resultText.textContent = "";

    currentPrizes.forEach(prize => {
        const prizeElement = document.createElement("div");
        prizeElement.classList.add("prize");
        prizeElement.style.borderBottom = `2px solid ${prize.color}`;
        prizeElement.style.background = `linear-gradient(to top, ${prize.color}60, transparent, transparent)`;

        const lightEffect = document.createElement("div");
        lightEffect.className = "absolute prize_item__light";
        lightEffect.style.boxShadow = `0 0 70px 40px ${prize.color}`;

        let img = document.createElement("img");
        img.src = prize.image;
        img.width = 50;
        img.height = 50;
        
        prizeElement.appendChild(lightEffect);
        prizeElement.appendChild(img);
        roulette.appendChild(prizeElement);
    });

    roulette.style.left = "0px";
    let speed = 50;
    let timeElapsed = 0;
    let duration = 10000; // 10 секунд
    let startTime = performance.now();

    function animate(currentTime) {
        if (!isSpinning) return;
        timeElapsed = currentTime - startTime;
        
        let progress = timeElapsed / duration;
        speed = Math.max(50 * (1 - progress), 0.5);
        
        let left = parseInt(roulette.style.left || "0", 10);
        left -= speed;
        roulette.style.left = left + "px";

        if (Math.abs(left) >= roulette.firstElementChild.offsetWidth) {
            roulette.appendChild(roulette.firstElementChild);
            roulette.style.left = "0px";
        }
        
        if (timeElapsed < duration) {
            animationId = requestAnimationFrame(animate);
        } else {
            clearTimeout(animationId);
            determinePrize();
            isSpinning = false;
            spinButton.disabled = false;
        }
    }

    animationId = requestAnimationFrame(animate);
}

function determinePrize() {
    const marker = document.querySelector(".marker");
    const markerCenter = marker.getBoundingClientRect().left + marker.offsetWidth / 2;
    const prizesElements = document.querySelectorAll(".prize");
    let closestPrize = null;
    let minDistance = Infinity;
    let winningPrize = null;

    prizesElements.forEach(prize => {
        const rect = prize.getBoundingClientRect();
        const prizeCenter = rect.left + rect.width / 2;
        let distance = Math.abs(markerCenter - prizeCenter);
        if (distance < minDistance) {
            minDistance = distance;
            closestPrize = prize;
        }
    });

    if (closestPrize) {
        closestPrize.classList.add("winner-glow");
        
        // Находим индекс выигрыша в currentPrizes
        const winningPrizeIndex = Array.from(prizesElements).indexOf(closestPrize);
        winningPrize = currentPrizes[winningPrizeIndex]; // Получаем приз из массива currentPrizes
        
        // Теперь находим этот приз в массиве cases
        const caseIndex = cases.findIndex(caseItem => 
            caseItem.prizes.some(prize => prize.id === winningPrize.id)
        );
        
        const caseItem = cases[caseIndex]; // Получаем объект кейса
        const prizeItem = caseItem.prizes.find(prize => prize.id === winningPrize.id); // Получаем выигравший приз

        // Выводим в консоль объект с полным описанием выигрыша
        console.log("Выигранный приз:", prizeItem);
        
        // Отображаем картинку в resultText
        resultText.innerHTML = `<img src="${closestPrize.querySelector("img").src}" width="100">`;
    } else {
        resultText.textContent = "Ошибка определения!";
    }
}