function magnify(zoom) {
    if (document.querySelector(".moreinfo-tovar-info-image-sliderbig-slide__image>img") && document.documentElement.classList.contains("_pc")) {
        let imageItems = document.querySelectorAll(".moreinfo-tovar-info-image-sliderbig-slide__image>img");
        for (var index = 0; index < imageItems.length; index++) {
            let imageItem = imageItems[index];
            let glass = document.createElement("DIV");
            glass.setAttribute("class", "img-magnifier-glass");
            imageItem.parentElement.insertBefore(glass, imageItem);
            glass.style.backgroundImage = "url('" + imageItem.src + "')";
            glass.style.backgroundRepeat = "no-repeat";
            glass.style.backgroundSize = imageItem.width * zoom + "px " + imageItem.height * zoom + "px";
            let bw = 3;
            let w = glass.offsetWidth / 2;
            let h = glass.offsetHeight / 2;
            glass.addEventListener("mousemove", moveMagnifier);
            imageItem.addEventListener("mousemove", moveMagnifier);
            glass.addEventListener("mouseout", mouseOutImg);
            function moveMagnifier(e) {
                var pos, x, y;
                e.preventDefault();
                pos = getCursorPos(e);
                x = pos.x;
                y = pos.y;
                if (x > imageItem.width - w / zoom) x = imageItem.width - w / zoom;
                if (x < w / zoom) x = w / zoom;
                if (y > imageItem.height - h / zoom) y = imageItem.height - h / zoom;
                if (y < h / zoom) y = h / zoom;
                glass.classList.add("_cursor");
                glass.style.left = x - w + "px";
                glass.style.top = y - h + "px";
                glass.style.backgroundPosition = "-" + (x * zoom - w + bw) + "px -" + (y * zoom - h + bw) + "px";
            }
            function getCursorPos(e) {
                var a, x = 0, y = 0;
                e = e || window.event;
                a = imageItem.getBoundingClientRect();
                x = e.pageX - a.left;
                y = e.pageY - a.top;
                x -= window.pageXOffset;
                y -= window.pageYOffset;
                return { x, y };
            }
            function mouseOutImg() {
                glass.classList.remove("_cursor");
            }
        }
    }
}
magnify(1.3);