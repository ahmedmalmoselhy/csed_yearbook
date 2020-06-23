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

// Search in members list
const searchInput = document.querySelector("input#search");
const members = Array.from(document.querySelectorAll(".members-list p"));
let timeout;

function debounce(func, wait) {
    return function() {
        let context = this,
            args = arguments;
        let later = function() {
            timeout = null;
            func.apply(context, args);
        };
        clearTimeout(timeout);
        timeout = setTimeout(later, wait);
    };
}

searchInput.addEventListener("input", () => {
    debounce(() => {
        const searchRes = members.filter(member =>
            member.textContent.toLocaleLowerCase().includes(searchInput.value.toLocaleLowerCase())
        );
        let content = "";
        if(searchRes.length) {
            let char = "";
            content = "<div class='line'></div>";
            for (let { textContent } of searchRes) {
                let name = textContent;
                if (char === name[0])
                    content += `
                <span></span>
                <p><a href="/profile.html" class="name">${name}</a></p>
                `;
                else {
                    content += `
                <span class="char">${name[0]}</span>
                <p><a href="/profile.html" class="name">${name}</a></p>
                `;
                    char = name[0];
                }
            }
        }
        
        const searchList = document.createElement("div");
        searchList.classList.add("members-list");
        searchList.innerHTML = content;
        document
            .querySelector("aside")
            .replaceChild(searchList, document.querySelector(".members-list"));
    }, 1000)();
});
