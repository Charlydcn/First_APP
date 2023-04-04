var modals = document.querySelectorAll(".modal")
var btns = document.querySelectorAll(".modal_btn")
var spans = document.querySelectorAll(".close")

console.log(btns)

btns.forEach(function(btn, index) {
    btn.addEventListener("click", function() {
        console.log("test")
        modals[index].style.display = "block"
    })
})

spans.forEach(function(span, index) {
    span.addEventListener("click", function() {

        modals[index].style.display = "none"
    })
})

window.addEventListener("click", function(event) {
    modals.forEach(function(modal) {
    if (event.target == modal) {
        modal.style.display = "none"
    }
    })
})
