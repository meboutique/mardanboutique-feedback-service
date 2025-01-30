// Current frame tracker
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

function nextFrame(nextFrameId) {
    // Validate and collect data before moving to the next frame
    switch (currentFrame) {
        case 1:
            feedbackData.stylist = document.getElementById("stylist").value;
            break;
        case 2:
            feedbackData.ratingStylist = document.getElementById(
                "rating-stylist-value"
            ).value;
            break;
        case 3:
            feedbackData.ratingSpeed =
                document.getElementById("rating-speed-value").value;
            break;
        case 4:
            feedbackData.ratingOverall = document.getElementById(
                "rating-overall-value"
            ).value;
            break;
        case 5:
            feedbackData.aboutUs = document.getElementById("about-us").value;
            break;
        case 6:
            feedbackData.comments = document.getElementById("comments").value;
            break;
        case 7:
            feedbackData.name = document.getElementById("name").value;
            feedbackData.phone = document.getElementById("phone").value;
            break;
        default:
            break;
    }

    // Hide the current frame and show the next one
    document.getElementById(`frame-${currentFrame}`).classList.add("hidden");
    currentFrame = nextFrameId;
    document.getElementById(`frame-${currentFrame}`).classList.remove("hidden");

    // If this is the last frame, send feedback
    if (nextFrameId === 8) {
        submitFeedback();
    }
}

// Handle star rating system
document.querySelectorAll(".stars").forEach((starGroup) => {
    starGroup.addEventListener("click", function (event) {
        if (event.target.classList.contains("star")) {
            const stars = this.querySelectorAll(".star");
            const ratingValue = event.target.getAttribute("data-value");
            const hiddenInputId = this.id + "-value";

            // Set hidden input value
            document.getElementById(hiddenInputId).value = ratingValue;

            updateStars(this.id, ratingValue);
        }
    });
});

try {
    if (!navigator.geolocation) {
        nextFrame(400);
        alert("DAYUM");
    } else {
        // Request user's location
        navigator.geolocation.getCurrentPosition(
            (position) => {
                const mardanx = 43.25512452803794;
                const mardany = 76.94008582427634;
                // 43.25513383089856, 76.94009859749863
                const farx = 43.255084215625565;
                const fary = 76.93989422594183;
                const a = position.coords.latitude - mardanx;
                const b = position.coords.longitude - mardany;
                const a1 = farx - mardanx;
                const b1 = fary - mardany;
                const c = a1 * a1 + b1 * b1;
                if (a * a + b * b > c) {
                    alert(
                        "К сожалению, отзыв можно отправить только в самом бутике"
                    );
                }
            },
            (error) => {
                nextFrame(400);
            }
        );
    }
} catch {
    nextFrame(400);
}

function updateStars(id, value) {
    const stars = document.querySelectorAll(`#${id} .star`);
    stars.forEach((star) => {
        if (star.getAttribute("data-value") <= value) {
            star.classList.add("selected");
        } else {
            star.classList.remove("selected");
        }
    });
}

// Submit feedback data to a REST API
function submitFeedback() {
    const apiUrl = "http://localhost:8001/api"; // Replace with your API endpoint

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
