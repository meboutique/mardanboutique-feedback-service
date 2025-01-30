<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Отзывы</title>
    <link rel="stylesheet" href="{{ url('styles.css') }}">
    <link rel="icon" href="{{url('logo.png')}}" type="image/png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="modal fade" id="thankYouModal" tabindex="-1" aria-labelledby="thankYouLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="thankYouLabel">Thank You!</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    We appreciate your visit!
                </div>
            </div>
        </div>
    </div>

    <section class="frame hidden" id="frame-400">
        <!-- <img src="{{url("logo.png")}}" alt="Логотип IFTAR" class="logo"> -->
        <h1>ERROR! 🙏</h1>
        <p>No geolocation provided</p>
        <!-- <button class="next-btn" onclick="nextFrame(1)">Далее</button> -->
    </section>

    <!-- Frame 190 -->
    <section class="frame" id="frame-0">
        <!-- <img src="{{url("logo.png")}}" alt="Логотип IFTAR" class="logo"> -->
        <h1>Ас-саляму алейкум! 🙏</h1>
        <p>Поделитесь своим отзывом, и пусть ваш голос поможет нам стать лучше для всех наших гостей.</p>
        <button class="next-btn" onclick="nextFrame(1)">Далее</button>
    </section>

    <!-- Frame 184 -->
    <section class="frame hidden" id="frame-1">
        <label for="stylist">Your stylist</label>
        <select name="stylist" id="stylist">
            <option value="Еділ">Еділ</option>
            <option value="Еділ">Еділ</option>
            <option value="Еділ">Еділ</option>
            <option value="Еділ">Еділ</option>
        </select>
        <button class="next-btn" onclick="nextFrame(2)">Далее</button>
    </section>

    <section class="frame hidden" id="frame-2">
        <p>Оценка работы стилиста 🧵🪡</p>
        <div class="stars" id="rating-stylist">
            <span class="star" data-value="1">&#9733;</span>
            <span class="star" data-value="2">&#9733;</span>
            <span class="star" data-value="3">&#9733;</span>
            <span class="star" data-value="4">&#9733;</span>
            <span class="star" data-value="5">&#9733;</span>
        </div>
        <input type="hidden" id="rating-stylist-value" name="rating-waiter">
        <button class="next-btn" onclick="nextFrame(3)">Далее</button>
    </section>

    <!-- Frame 186 -->
    <section class="frame hidden" id="frame-3">
        <p>Скорость обслуживания ⏱️</p>
        <div class="stars" id="rating-speed">
            <span class="star" data-value="1">&#9733;</span>
            <span class="star" data-value="2">&#9733;</span>
            <span class="star" data-value="3">&#9733;</span>
            <span class="star" data-value="4">&#9733;</span>
            <span class="star" data-value="5">&#9733;</span>
        </div>
        <input type="hidden" id="rating-speed-value" name="rating-speed">
        <button class="next-btn" onclick="nextFrame(4)">Далее</button>
    </section>

    <!-- Frame 187 -->
    <section class="frame hidden" id="frame-4">
        <p>Вам понравилось у нас? 🤔 </p>
        <div class="stars" id="rating-overall">
            <span class="star" data-value="1">&#9733;</span>
            <span class="star" data-value="2">&#9733;</span>
            <span class="star" data-value="3">&#9733;</span>
            <span class="star" data-value="4">&#9733;</span>
            <span class="star" data-value="5">&#9733;</span>
        </div>
        <input type="hidden" id="rating-overall-value" name="rating-overall">
        <button class="next-btn" onclick="nextFrame(5)">Далее</button>
    </section>

    <!-- Frame 188 -->
    <section class="frame hidden" id="frame-5">
        <!-- <label for="stylist"></label> -->
        <select name="about-us" id="about-us">
            <option value="Tik-Tok">TikTok</option>
            <option value="Instagram">Instagram</option>
            <option value="Friends">Friends</option>
            <option value="Other">Other</option>
        </select>
        <button class="next-btn" onclick="nextFrame(6)">Далее</button>
    </section>

    <section class="frame hidden" id="frame-6">
        <p>Замечания и предложения 🧐</p> 
        <textarea rows="5" cols="40" id="comments">

        </textarea>
        <button class="next-btn" onclick="nextFrame(7)">Далее</button>
    </section>

    <!-- Frame 185 -->
    <section class="frame hidden" id="frame-7">
        <p>Для особых предложений и новостей, оставьте свои данные 😎</p>
        <input type="text" placeholder="Ваше Имя" id="name">
        <input type="tel" placeholder="Номер телефона" id="phone">
        <button class="submit-btn" onclick="nextFrame(8); ">Далее</button>
    </section>

    <!-- Frame 189 -->
    <section class="frame hidden" id="frame-8">
        <img src="{{url("logo.png")}}" alt="Логотип IFTAR" class="logo">
        <p>Благодарим за обратную связь! 🙌</p>
    </section>

    <script src="{{url("script.js")}}"></script>
</body>
</html>