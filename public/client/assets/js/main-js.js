let body = document.querySelector("body");
let btnShare = document.querySelector(".btn-share");
let btnFullscreen = document.querySelector(".btn-fullscreen");

window.fbAsyncInit = function() {
    FB.init({
        appId: "974637342665033",
        autoLogAppEvents: true,
        xfbml: true,
        version: "v2.7"
    });
};

btnShare.onclick = function() {
    FB.ui({
            display: "popup",
            method: "share",
            href: "http://holomia.com/Gallery/Real360_celadoncity_b5a.html"
        },
        function(response) {
            // if (response && !response.error_message) {
            //     alert("Posting completed.");
            // } else {
            //     alert("Error while posting.");
            // }
            console.log(response)
        }
    );
};

btnFullscreen.onclick = function() {
    openFullscreen();
};

function openFullscreen() {
    if (body.requestFullscreen) {
        body.requestFullscreen();
    } else if (body.webkitRequestFullscreen) {
        /* Safari */
        body.webkitRequestFullscreen();
    } else if (body.msRequestFullscreen) {
        /* IE11 */
        body.msRequestFullscreen();
    }
}