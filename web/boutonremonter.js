$(function() {
    $(".retour_haut_page").click(function() {
        $("html, body").animate({ scrollTop: 0 }, "slow");
    });
});