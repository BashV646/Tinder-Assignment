console.log("Script file loaded");
var LikeButton = document.querySelector(".like-button");
var DislikeButton = document.querySelector(".dislike-button");
var MatchButton = document.querySelector(".js-match-button");

LikeButton && LikeButton.addEventListener("click", function() {
    // ...
    window.location.href = "./liked_user_adding.php";
});

DislikeButton && DislikeButton.addEventListener("click",function(){
    window.location.href = "./disliked_user_adding.php";
});

MatchButton && MatchButton.addEventListener("click",function(){
    window.location.href = "./matches_handling.php";
});