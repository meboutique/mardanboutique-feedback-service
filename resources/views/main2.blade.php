<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Отзывы</title>
    <link rel="stylesheet" href="styles.css" />
    <style>
      .hidden {
        display: none;
      }
      .frame {
        text-align: center;
        padding: 20px;
      }
      .logo {
        width: 100px;
      }
      .next-btn,
      .mardan-dropdown-button {
        margin-top: 20px;
        padding: 10px 20px;
        font-size: 1em;
        cursor: pointer;
      }
    </style>
  </head>
  <body>
    <!-- Экран приветствия -->
    <section class="frame" id="frame-1">
      <div class="background-image"></div>
      <img
        src="./assets/Mardan logo white.png"
        alt="Логотип Mardan"
        class="logo"
      />
      <h1>Добро пожаловать!</h1>
      <p>
        Спасибо за то, что вы стали частью нашего бренда! Просим вас оставить
        отзыв для улучшения работы бутика.
      </p>
      <button class="next-btn" onclick="nextFrame(2)">Далее</button>
    </section>

    <!-- Экран выбора стилиста -->
    <section class="frame hidden" id="frame-2">
      <div class="background-image-color">
        <div class="mardan-logo">
          <img
            src="./assets/Mardan logo white.png"
            alt="Логотип Mardan"
            class="logo"
          />
        </div>
        <h2>Выберите вашего стилиста</h2>
        <div class="mardan-dropdown">
          <button class="mardan-dropdown-button" onclick="toggleDropdown()">
            Выберите вашего стилиста
          </button>
          <div class="mardan-dropdown-menu hidden" id="mardanDropdownMenu">
            <div class="mardan-dropdown-item" onclick="selectStylist('Еділ')">
              Еділ
            </div>
            <div class="mardan-dropdown-item" onclick="selectStylist('Аскар')">
              Аскар
            </div>
            <div class="mardan-dropdown-item" onclick="selectStylist('Амина')">
              Амина
            </div>
          </div>
        </div>
      </div>
      <button class="next-btn" onclick="nextFrame(3)">Далее</button>
    </section>

    <!-- Оценка работы стилиста -->
    <section class="frame hidden" id="frame-3">
      <div class="background-image-color"></div>
      <img
        src="./assets/Mardan logo white.png"
        alt="Логотип Mardan"
        class="logo"
      />
      <p>Оценка работы стилиста 🧵🪡</p>
      <div class="stars" id="rating-stylist">
        <span class="star" data-value="5">&#9733;</span>
        <span class="star" data-value="4">&#9733;</span>
        <span class="star" data-value="3">&#9733;</span>
        <span class="star" data-value="2">&#9733;</span>
        <span class="star" data-value="1">&#9733;</span>
      </div>
      <input type="hidden" id="rating-stylist-value" name="rating-stylist" />
      <button class="next-btn" onclick="nextFrame(4)">Далее</button>
    </section>

    <!-- Скорость обслуживания -->
    <section class="frame hidden" id="frame-4">
      <div class="background-image-color"></div>
      <img
        src="./assets/Mardan logo white.png"
        alt="Логотип Mardan"
        class="logo"
      />
      <p>Скорость обслуживания ⏱️</p>
      <div class="stars" id="rating-speed">
        <span class="star" data-value="5">&#9733;</span>
        <span class="star" data-value="4">&#9733;</span>
        <span class="star" data-value="3">&#9733;</span>
        <span class="star" data-value="2">&#9733;</span>
        <span class="star" data-value="1">&#9733;</span>
      </div>
      <input type="hidden" id="rating-speed-value" name="rating-speed" />
      <button class="next-btn" onclick="nextFrame(5)">Далее</button>
    </section>

    <!-- Вам понравилось у нас? -->
    <section class="frame hidden" id="frame-5">
      <div class="background-image-color"></div>
      <img
        src="./assets/Mardan logo white.png"
        alt="Логотип Mardan"
        class="logo"
      />
      <p>Вам понравилось у нас? 🤔</p>
      <div class="stars" id="rating-overall">
        <span class="star" data-value="5">&#9733;</span>
        <span class="star" data-value="4">&#9733;</span>
        <span class="star" data-value="3">&#9733;</span>
        <span class="star" data-value="2">&#9733;</span>
        <span class="star" data-value="1">&#9733;</span>
      </div>
      <input type="hidden" id="rating-overall-value" name="rating-overall" />
      <button class="next-btn" onclick="nextFrame(6)">Далее</button>
    </section>

    <!-- Откуда вы о нас узнали? -->
    <section class="frame hidden" id="frame-6">
      <div class="background-image-color">
        <div class="mardan-logo">
          <img
            src="./assets/Mardan logo white.png"
            alt="Логотип Mardan"
            class="logo"
          />
        </div>
        <h2>Откуда вы о нас узнали?</h2>
        <div class="mardan-dropdown">
          <button class="mardan-dropdown-button2" onclick="toggleDropdown2()">
            Откуда вы о нас узнали?
          </button>
          <div class="mardan-dropdown-menu hidden" id="mardanDropdownMenu2">
            <div
              class="mardan-dropdown-item"
              onclick="selectMedia('Instagram')"
            >
              Instagram
            </div>
            <div
              class="mardan-dropdown-item"
              onclick="selectMedia('Tik-Tok')"
            >
              Tik-Tok
            </div>
            <div
              class="mardan-dropdown-item"
              onclick="selectMedia('Друзья/Знакомые')"
            >
              Друзья/Знакомые
            </div>
          </div>
        </div>
      </div>
      <button class="next-btn" onclick="nextFrame(7)">Далее</button>
    </section>

    <!-- Замечания и предложения -->
    <section class="frame hidden" id="frame-7">
      <div class="background-image-color"></div>
      <img
        src="./assets/Mardan logo white.png"
        alt="Логотип Mardan"
        class="logo"
      />
      <p>Замечания и предложения 🧐</p>
      <textarea id="comments" placeholder="Напишите свои предложения..."></textarea>
      <button class="next-btn" onclick="nextFrame(8)">Далее</button>
    </section>

    <!-- Для особых предложений и новостей, оставьте свои данные -->
    <section class="frame hidden" id="frame-8">
      <div class="background-image-color"></div>
      <img
        src="./assets/Mardan logo white.png"
        alt="Логотип Mardan"
        class="logo"
      />
      <p>Для особых предложений и новостей, оставьте свои данные ☺️</p>
      <input type="text" placeholder="Ваше Имя" id="name"/>
      <input type="tel" placeholder="Номер телефона" id="phone"/>
      <button class="next-btn" onclick="nextFrame(9)">Отправить</button>
    </section>

    <!-- Frame 189 -->
    <section class="frame hidden" id="frame-9">
      <div class="background-image-color"></div>
      <img
        src="./assets/Mardan logo white.png"
        alt="Логотип Mardan"
        class="logo"
      />
      <h1>Благодарим за обратную связь!</h1>
      <p>Она нам поможет стать еще лучше!</p>
    </section>

    <script src="scripts.js"></script>
  </body>
</html>
