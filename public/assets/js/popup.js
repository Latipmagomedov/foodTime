(() => {
    const searchAttribute = (item, attr) => {
        let attribute = item.getAttribute(attr);

        if (attribute) {
            document
                .querySelector(`.${attribute}`)
                .classList.add("popup-active");
            document.body.style.overflow = "hidden";
        }

        if (item.parentElement.classList.contains("popup-close")) {
            document
                .querySelector(`.popup-active`)
                .classList.remove("popup-active");
            document.body.style.overflow = "visible";
        }
    };

    document.body.addEventListener("click", (e) => {
        let target = e.target;
        searchAttribute(target, "data-popup");
    });

})();
