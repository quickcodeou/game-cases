const cases = [
    { 
        name: "Кейс 1", 
        prizes: [
            { name: "Шаурма", image: "https://foxeslovelemons.com/wp-content/uploads/2023/06/Chicken-Shawarma-8-500x500.jpg", color: "#ffcc00", chance: 10 },
            { name: "Бургер", image: "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSyDcH_MxdsTsK6KMVon-Ybfa2WiT-R70ZjWw&s", color: "#ff6600", chance: 40 },
            { name: "Картошка фри", image: "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS8ae8p5fO5SDVCFj-xEWTJaECdaCkzSx0jsA&s", color: "#ff3300", chance: 50 }
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
const prizesContainer = document.querySelector(".prizes-container");
const roulette = document.querySelector(".roulette");
const resultText = document.getElementById("result");

let isSpinning = false;
let currentPrizes = [];
let animationId;

caseButtons.forEach(button => {
    button.addEventListener("click", (event) => {
        if (isSpinning) return;

        const caseIndex = event.target.dataset.case;
        currentPrizes = generatePrizeList(cases[caseIndex].prizes);
        displayPrizes(cases[caseIndex].prizes);
        startRoulette();
    });
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
        item.classList.add("prizes_item");

        let img = document.createElement("img");
        img.src = prize.image;
        img.classList.add("prize-img");

        let styleBlock = document.createElement("div");
        styleBlock.classList.add("prizes_item__style");
        styleBlock.style.background = `linear-gradient(0deg, ${prize.color}, transparent)`;

        item.appendChild(img);
        item.appendChild(styleBlock);
        prizesContainer.appendChild(item);
    });
}

function startRoulette() {
    isSpinning = true;
    roulette.innerHTML = "";
    resultText.textContent = "";

    currentPrizes.forEach(prize => {
        const prizeElement = document.createElement("div");
        prizeElement.classList.add("prize");
        prizeElement.style.border = `3px solid ${prize.color}`;

        let img = document.createElement("img");
        img.src = prize.image;
        img.width = 50;
        img.height = 50;
        
        prizeElement.appendChild(img);
        roulette.appendChild(prizeElement);
    });

    roulette.style.left = "0px";
    let speed = 20;
    let totalTime = 0;
    let interval = setInterval(() => {
        speed -= 0.5;
        totalTime += 100;
        if (speed <= 0.2) {
            clearInterval(interval);
            determinePrize();
            isSpinning = false;
        }
    }, 100);

    function animate() {
        if (!isSpinning) return;
        let left = parseInt(roulette.style.left || "0", 10);
        left -= speed;
        roulette.style.left = left + "px";

        if (Math.abs(left) >= roulette.firstElementChild.offsetWidth) {
            roulette.appendChild(roulette.firstElementChild);
            roulette.style.left = "0px";
        }
        animationId = requestAnimationFrame(animate);
    }

    cancelAnimationFrame(animationId);
    animate();
}

function determinePrize() {
    const marker = document.querySelector(".marker");
    const markerCenter = marker.getBoundingClientRect().left + marker.offsetWidth / 2;
    const prizesElements = document.querySelectorAll(".prize");
    let winningPrize = null;

    prizesElements.forEach(prize => {
        const rect = prize.getBoundingClientRect();
        if (markerCenter >= rect.left && markerCenter <= rect.right) {
            winningPrize = prize.firstChild.src;
        }
    });

    resultText.innerHTML = winningPrize ? `<img src="${winningPrize}" width="100">` : "Ошибка определения!";
}