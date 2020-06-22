require("./bootstrap");

const messages = document.querySelectorAll(".content");

messages.forEach(message => {
    const scrollHeight = message.querySelector("p").scrollHeight;
    const btn = message.querySelector("button");
    if (document.body.offsetWidth > 740) {
        if (scrollHeight > 120) btn.classList.remove("hidden");
    } else {
        if (scrollHeight > 210) btn.classList.remove("hidden");
    }

    btn.addEventListener("click", () => {
        btn.textContent =
            btn.textContent === "See more" ? "See less" : "See more";
        message.querySelector("p").classList.toggle("clamp");
    });
});

window.addEventListener("keyup", function(e) {
    if (
        (e.target.nodeName === "INPUT" || e.target.nodeName === "TEXTAREA") &&
        e.target.id
    ) {
        const input = document.getElementById(e.target.id);
        if (!input.value) input.classList.remove("label-hidden");
        else input.classList.add("label-hidden");
    }
});
