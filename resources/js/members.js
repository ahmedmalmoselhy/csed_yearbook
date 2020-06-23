// Search in members list
const searchInput = document.querySelector("input#search");
const members = Array.from(document.querySelectorAll(".members-list p"));
let timeout;

window.addEventListener("load", () => {
    if (searchInput.value) {
        searchInput.classList.add("label-hidden");
    }
})

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
            member.textContent
                .toLocaleLowerCase()
                .includes(searchInput.value.toLocaleLowerCase())
        );
        let content = "";
        if (searchRes.length) {
            let char = "";
            content = "<div class='line'></div>";
            for (let parElm of searchRes) {
                const name = parElm.textContent;
                if (char === name[0])
                    content += `<span></span>`;
                else {
                    content += `<span class="char">${name[0]}</span>`;
                    char = name[0];
                }
                content += parElm.outerHTML;
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
