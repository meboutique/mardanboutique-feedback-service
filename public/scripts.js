let currentFrame = 0;

// Store feedback data
let feedbackData = {
    stylist: "",
    ratingStylist: 0,
    ratingSpeed: 0,
    ratingOverall: 0,
    comments: "",
    name: "",
    phone: "",
    aboutUs: "",
};

// Функция для показа следующего экрана
function showFrame(frameId) {
    const frames = document.querySelectorAll(".frame");
    frames.forEach((frame) => frame.classList.add("hidden")); // Скрыть все экраны
    const targetFrame = document.getElementById(frameId);
    if (targetFrame) {
        targetFrame.classList.remove("hidden"); // Показать выбранный экран
    }
}

// Функция для выпадающего меню стилистов
function toggleDropdown() {
    const dropdownMenu = document.getElementById("mardanDropdownMenu");
    if (dropdownMenu) {
        dropdownMenu.classList.toggle("hidden");
    }
}

function selectStylist(name) {
    const dropdownButton = document.querySelector(".mardan-dropdown-button"); // Исправлено!
    if (dropdownButton) {
        dropdownButton.textContent = name; // Установить имя стилиста в кнопку
        feedbackData.stylist = name;
        toggleDropdown(); // Скрыть меню после выбора
    }
}

// Закрытие выпадающего меню при клике вне него
document.addEventListener("click", (event) => {
    const dropdownMenu = document.getElementById("mardanDropdownMenu");
    const dropdownButton = document.querySelector(".mardan-dropdown-button"); // Исправлено!
    if (
        dropdownMenu &&
        !dropdownMenu.classList.contains("hidden") &&
        !dropdownMenu.contains(event.target) &&
        !dropdownButton.contains(event.target)
    ) {
        dropdownMenu.classList.add("hidden");
    }
});

// Функция для переключения видимости dropdown меню для ВТОРОГО экрана
function toggleDropdown2() {
    const dropdownMenu = document.getElementById("mardanDropdownMenu2");
    dropdownMenu.classList.toggle("hidden");
}

// Функция для выбора элемента dropdown для второго экрана
function selectMedia(source) {
    const dropdownButton = document.querySelector(".mardan-dropdown-button2");
    dropdownButton.textContent = source; // Устанавливаем текст кнопки выбранным значением
    feedbackData.aboutUs = source;

    // Скрываем меню после выбора
    const dropdownMenu = document.getElementById("mardanDropdownMenu2");
    dropdownMenu.classList.add("hidden");

    // Логируем выбранный источник (можно заменить на отправку данных на сервер)
    console.log(`Вы выбрали (второй экран): ${source}`);
}

// Функция для отображения следующего фрейма для второго экрана
function showFrame2(frameId) {
    // Скрываем все фреймы
    const frames = document.querySelectorAll(".frame");
    frames.forEach((frame) => frame.classList.add("hidden"));

    // Показываем только указанный фрейм
    const nextFrame = document.getElementById(frameId);
    if (nextFrame) {
        nextFrame.classList.remove("hidden");
    }
}
// Функция для упрощенного перехода по ID экрана
function nextFrame(frameId) {
    showFrame2(`frame-${frameId}`);

    switch (frameId) {
        case 4:
            feedbackData.ratingStylist = document.getElementById(
                "rating-stylist-value"
            ).value;
            break;
        case 5:
            feedbackData.ratingSpeed =
                document.getElementById("rating-speed-value").value;
            break;
        case 6:
            feedbackData.ratingOverall = document.getElementById(
                "rating-overall-value"
            ).value;
            break;
        case 7:
            // feedbackData.aboutUs = document.getElementById("about-us").value;
            break;
        case 8:
            // feedbackData.comments = document.getElementById("comments").value;
            break;
        case 9:
            feedbackData.name = document.getElementById("name").value;
            feedbackData.phone = document.getElementById("phone").value;
            break;
        default:
            break;
    }

    if (frameId === 9) {
        submitFeedback();
    }
}

function submitFeedback() {
    const apiUrl = "http://localhost:8000/api"; // Replace with your API endpoint

    console.log(JSON.stringify(feedbackData));

    fetch(apiUrl, {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
        },
        body: JSON.stringify(feedbackData),
    })
        .then((response) => {
            if (response.ok) {
                console.log("Feedback successfully sent");
            } else {
                throw new Error("Failed to submit feedback");
            }
        })
        .catch((error) => {
            console.error("Error:", error);
        });
}

// Логика для звездного рейтинга
document.querySelectorAll(".stars").forEach((container) => {
    const stars = container.querySelectorAll(".star");
    stars.forEach((star) => {
        star.addEventListener("click", () => {
            const value = star.getAttribute("data-value");
            // Удалить выделение со всех звезд
            stars.forEach((s) => s.classList.remove("active"));
            // Добавить выделение до выбранной звезды включительно
            for (let i = 4; i >= value - 1; i--) {
                stars[i].classList.add("active");
            }
            // Сохранить значение рейтинга в скрытое поле
            const input = container.nextElementSibling;
            if (input) input.value = value;

            alert(input.value);
        });
    });
});
