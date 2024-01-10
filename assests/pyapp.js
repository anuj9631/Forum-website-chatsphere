

var buttons = document.querySelectorAll(".read-more-button");

buttons.forEach(function (button) {
    button.addEventListener("click", function () {
        var hiddenContent = this.parentNode.querySelector(".hidden-content");
        if (hiddenContent.style.display === "none" || hiddenContent.style.display === "") {
            hiddenContent.style.display = "block";
            this.textContent = "See Less";
            this.style.textAlign  = "center";
        } else {
            hiddenContent.style.display = "none";
            this.textContent = "Read More";
        }
    });
});

let isBold = false;
function f1() { 
    const textarea = document.getElementById("textarea1");

    if (isBold) {
        textarea.style.fontWeight = "normal";
    } else {
        textarea.style.fontWeight = "bold";
    }
    isBold = !isBold;
} 
function f2() { 
    document.getElementById("textarea1").style.fontStyle = "italic"; 
} 
function f3() { 
    document.getElementById("textarea1").style.textAlign = "left"; 
} 
function f4() { 
    document.getElementById("textarea1").style.textAlign = "center"; 
} 
function f5() { 
    document.getElementById("textarea1").style.textAlign = "right"; 
} 
function f6() { 
    document.getElementById("textarea1").style.textTransform = "uppercase"; 
} 
function f7() { 
    document.getElementById("textarea1").style.textTransform = "lowercase"; 
} 
function f8() { 
    document.getElementById("textarea1").style.textTransform = "capitalize"; 
} 
function f9() { 
    document.getElementById("textarea1").style.fontWeight = "normal"; 

    document.getElementById("textarea1").style.textAlign = "left"; 

    document.getElementById("textarea1").style.fontStyle = "normal"; 

    document.getElementById("textarea1").style.textTransform = "capitalize"; 

    document.getElementById("textarea1").value = " "; 
}



