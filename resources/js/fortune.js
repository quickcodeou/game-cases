const cases = [
    { 
        name: "Кейс 1", 
        prizes: [
            { id: 1, name: "Шаурма", image: "https://pngimg.com/d/shawarma_PNG4.png", color: "#ff3300", chance: 0.5 },
            { id: 2, name: "Шаурма", image: "https://pngimg.com/d/shawarma_PNG4.png", color: "#ff3300", chance: 0.5 },
            { id: 3, name: "Бургер", image: "https://vectorjungal.com/files/preview/960x960/11720079796mczpxbo8rphstladkfiklhuoaoespxwz9j2kvofdh0awwwd1qtamwj80yfjpebysskhdkzkflbrm1j3gxiengv6ciadsi1iina7a.png", color: "#ff3300", chance: 1 },
            { id: 4, name: "Картошка фри", image: "https://static.vecteezy.com/system/resources/thumbnails/046/544/935/small/french-fries-flying-out-of-paper-bucket-isolated-on-a-transparent-background-png.png", color: "#a841ff", chance: 5 },
            { id: 5, name: "Картошка фри", image: "https://static.vecteezy.com/system/resources/thumbnails/046/544/935/small/french-fries-flying-out-of-paper-bucket-isolated-on-a-transparent-background-png.png", color: "#a841ff", chance: 5 },
            { id: 6, name: "50 discount", image: "https://png.pngtree.com/png-vector/20220826/ourmid/pngtree-50-discount-offer-vector-transparent-png-image_6124907.png", color: "#87d743", chance: 8 },
            { id: 7, name: "50 discount", image: "https://png.pngtree.com/png-vector/20220826/ourmid/pngtree-50-discount-offer-vector-transparent-png-image_6124907.png", color: "#87d743", chance: 8 },
            { id: 8, name: "50 discount", image: "https://png.pngtree.com/png-vector/20220826/ourmid/pngtree-50-discount-offer-vector-transparent-png-image_6124907.png", color: "#87d743", chance: 8 },
            { id: 9, name: "50 discount", image: "https://png.pngtree.com/png-vector/20220826/ourmid/pngtree-50-discount-offer-vector-transparent-png-image_6124907.png", color: "#87d743", chance: 8 },
            { id: 10, name: "50 discount", image: "https://png.pngtree.com/png-vector/20220826/ourmid/pngtree-50-discount-offer-vector-transparent-png-image_6124907.png", color: "#87d743", chance: 8 },
            { id: 11, name: "50 discount", image: "https://png.pngtree.com/png-vector/20220826/ourmid/pngtree-50-discount-offer-vector-transparent-png-image_6124907.png", color: "#87d743", chance: 8 },
            { id: 12, name: "50 discount", image: "https://png.pngtree.com/png-vector/20220826/ourmid/pngtree-50-discount-offer-vector-transparent-png-image_6124907.png", color: "#87d743", chance: 8 },
            { id: 13, name: "10 discount", image: "https://gallery.yopriceville.com/var/albums/Free-Clipart-Pictures/Sale-Stickers-PNG/-10%25_Sale_Off_PNG_Clipart_Image.png?m=1629814322", color: "#d1d1d1", chance: 17 },
            { id: 14, name: "10 discount", image: "https://gallery.yopriceville.com/var/albums/Free-Clipart-Pictures/Sale-Stickers-PNG/-10%25_Sale_Off_PNG_Clipart_Image.png?m=1629814322", color: "#d1d1d1", chance: 17 },
            { id: 15, name: "10 discount", image: "https://gallery.yopriceville.com/var/albums/Free-Clipart-Pictures/Sale-Stickers-PNG/-10%25_Sale_Off_PNG_Clipart_Image.png?m=1629814322", color: "#d1d1d1", chance: 17 },
            { id: 16, name: "10 discount", image: "https://gallery.yopriceville.com/var/albums/Free-Clipart-Pictures/Sale-Stickers-PNG/-10%25_Sale_Off_PNG_Clipart_Image.png?m=1629814322", color: "#d1d1d1", chance: 17 },
        ]
    },
    { 
        name: "Кейс 2", 
        prizes: [
            { id: 17, name: "Хот-Дог", image: "https://pngimg.com/d/shawarma_PNG4.png", color: "#ffcc66", chance: 40 },
            { id: 18, name: "Кола", image: "https://pngimg.com/d/shawarma_PNG4.png", color: "#cc3300", chance: 40 },
            { id: 19, name: "Наггетсы", image: "https://pngimg.com/d/shawarma_PNG4.png", color: "#ff9966", chance: 20 }
        ]
    },
    { 
        name: "Кейс 3", 
        prizes: [
            { id: 20, name: "Комбо Меню", image: "https://pngimg.com/d/shawarma_PNG4.png", color: "#ffcc99", chance: 10 },
            { id: 21, name: "Гигантская шаурма", image: "https://pngimg.com/d/shawarma_PNG4.png", color: "#ff9900", chance: 5 },
            { id: 22, name: "Фастфуд Фестиваль", image: "https://pngimg.com/d/shawarma_PNG4.png", color: "#ff6600", chance: 85 }
        ]
    }
];

const caseButtons = document.querySelectorAll(".case-btn");
const spinButton = document.getElementById("spin-btn");
const prizesContainer = document.querySelector(".prizes-container");
const rouletteContainer = document.querySelector(".roulette-container");
const roulette = document.querySelector(".roulette");
const resultItem = document.getElementById("result");
const spinRoulette = document.getElementById("spin-btn");

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
            weightedList.push({ ...prize }); 
        }
    });
    return weightedList.sort(() => Math.random() - 0.5);
}

function displayPrizes(prizes) {
    rouletteContainer.classList.remove("active");
    prizesContainer.innerHTML = "";
    prizes.forEach(prize => {
        let item = document.createElement("div");
        item.className = "relative backdrop-blur-xs cases_list__item aspect-square rounded-lg flex flex-col items-center justify-center border-b-[3px] overflow-hidden group transition-all duration-300 hover:scale-105 hover:shadow-lg";
        item.style.borderBottom = `2px solid ${prize.color}`;

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

        rouletteContainer.classList.add("active");
        spinRoulette.classList.remove("hidden");

        item.appendChild(lightEffect);
        item.appendChild(gradientOverlay);
        item.appendChild(img);
        prizesContainer.appendChild(item);
    });
    roulette.innerHTML = "";
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
}

        function startRoulette() {
            isSpinning = true;
            spinButton.disabled = true;
            roulette.innerHTML = "";
            resultItem.textContent = "";
        
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

        // Находим соответствующий объект приза по id
        let winningPrizeImage = closestPrize.querySelector("img").src;
        const winModal = document.getElementById("win_prizeModal");
        winningPrize = currentPrizes.find(prize => prize.image === winningPrizeImage);

        if (winningPrize) {
            // Выводим выигранный приз
            console.log("Выигранный приз:", winningPrize);

            // Отображаем в resultItem
            resultItem.innerHTML = `
            <img src="${winningPrize.image}" alt="caseresult" class="win_prize__item">
            <div class="prize_bg" style="background: ${winningPrize.color};"></div>`;
            
            setTimeout(winModalShow, 2000);

            function winModalShow(){
                winModal.classList.remove("hidden");
            }
        } else {
            resultItem.textContent = "Ошибка определения!";
        }
    } else {
        resultItem.textContent = "Ошибка определения!";
    }
}

// function createConfetti() {
//     for (let i = 0; i < 250; i++) { // Increased the number of confetti pieces
//         let confetti = document.createElement("div");
//         confetti.classList.add("confetti");
//         confetti.style.left = `${Math.random() * 100}%`;
//         confetti.style.top = `${Math.random() * 50}px`;
//         confetti.style.animationDuration = `${1 + Math.random()}s`;
//         confetti.style.background = ["gold", "red", "orange", "yellow", "blue", "green", "purple"][Math.floor(Math.random() * 7)]; // Added more colors
//         document.body.appendChild(confetti);
//         const winModal = document.getElementById("win_prizeModal");
//         winModal.classList.remove("hidden");
//         setTimeout(() => confetti.remove(), 1500);
//     }
// }
document.getElementById("win_prizeModal").addEventListener("click", function () {
    this.classList.add("hidden"); // Замените "your-class-name" на нужный класс
});