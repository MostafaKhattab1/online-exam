particlesJS.load('particles-js', 'particles.json', function () {
});


let boxWidth = $(".box").outerWidth();

$("#sideBar").animate({ left: `-${boxWidth}` }, 700)

$("#sideBar i").click(function () {

    if ($("#sideBar").css(`left`) == '0px') {

        $("#sideBar").animate({ left: `-${boxWidth}` }, 500)
    }
    else {
        $("#sideBar").animate({ left: `0px` }, 500)
    }

})