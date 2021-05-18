$(function () {
    $(".btn-detail").click(function () {
        $content = $(".js-content-pro");
        $content.toggleClass('hide')
        $(this).toggleClass('hide')

        if (!$content.hasClass('hide')) {
            $(".bg-article").remove()
            console.log("index")
            $(".description").addClass('show')
            $(this).remove()
        }
    })

    // Hover icon thay đổi số sao dánh giá
    let $item = $("#ratings i");
    let arrTextRating = {
        1: "Không thích",
        2: "Tạm được",
        3: "Bình thường",
        4: "Rất tốt",
        5: "Tuyệt vời"
    }

    $item.mouseover(function () {
        let $this = $(this);
        let $i = $this.attr('data-i');
        $("#review_value").val($i);
        $item.removeClass('active');
        $item.each(function (key, value) {
            if (key + 1 <= $i) {
                $(this).addClass('active')
            }
        })
        $("#reviews-text").text(arrTextRating[$i]);
    })
})
