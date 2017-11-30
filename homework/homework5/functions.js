function checkAnswers() {
    var a1 = $("input[name=Q1]:checked").val();
    var a2 = $("#Q2 option:selected").text();
    var a3 = $("#Q3 option:selected").text();
    var a4 = document.getElementById("q4").value;
    var a5 = document.getElementById("q5").value;
    var a6 = document.getElementById("q6").value;

    var totalPoint = 0;

    if (a1 == "No") {
        document.getElementById("Q1Answer").innerHTML = "Right!";
        document.getElementById("Q1Answer").style.color = "green";
        document.getElementById("img1").src = "img/1.png"
        totalPoint++;
    }
    else {
        document.getElementById("Q1Answer").innerHTML = "Wrong!";
        document.getElementById("Q1Answer").style.color = "red";
        document.getElementById("Q1RightAnswer").innerHTML = "Right answer is: No";
        document.getElementById("img1").src = "img/2.png"


    }

    if (a2 == "Yes") {
        document.getElementById("Q2Answer").innerHTML = "Right!";
        document.getElementById("Q2Answer").style.color = "green";
        document.getElementById("img2").src = "img/1.png"
        totalPoint++;
    }
    else {
        document.getElementById("Q2Answer").innerHTML = "Wrong!";
        document.getElementById("Q2Answer").style.color = "red";
        document.getElementById("Q2RightAnswer").innerHTML = "Right answer is: No";
        document.getElementById("img2").src = "img/2.png"

    }

    if (a3 == "The <ul> tag defines an unordered list") {
        document.getElementById("Q3Answer").innerHTML = "Right!";
        document.getElementById("Q3Answer").style.color = "green";
        document.getElementById("img3").src = "img/1.png"
        totalPoint++;
    }
    else {
        document.getElementById("Q3Answer").innerHTML = "Wrong!";
        document.getElementById("Q3Answer").style.color = "red";
        document.getElementById("Q3RightAnswer").innerHTML = "Right answer is: The tag defines an unordered list";
        document.getElementById("img3").src = "img/2.png"

    }

    if (a4.toLowerCase() == "client-side") {
        document.getElementById("Q4Answer").innerHTML = "Right!";
        document.getElementById("Q4Answer").style.color = "green";
        document.getElementById("img4").src = "img/1.png"
        totalPoint++;
    }
    else {
        document.getElementById("Q4Answer").innerHTML = "Wrong!";
        document.getElementById("Q4Answer").style.color = "red";
        document.getElementById("Q4RightAnswer").innerHTML = "Right answer is: Client-side";
        document.getElementById("img4").src = "img/2.png"

    }

    if (a5.toLowerCase() == "hyper text markup language") {
        document.getElementById("Q5Answer").innerHTML = "Right!";
        document.getElementById("Q5Answer").style.color = "green";
        document.getElementById("img5").src = "img/1.png"
        totalPoint++;
    }
    else {
        document.getElementById("Q5Answer").innerHTML = "Wrong!";
        document.getElementById("Q5Answer").style.color = "red";
        document.getElementById("Q5RightAnswer").innerHTML = "Right answer is: Hyper Text Markup Language";
        document.getElementById("img5").src = "img/2.png"

    }

    if (a6.toLowerCase() == "hiof") {
        document.getElementById("Q6Answer").innerHTML = "Right!";
        document.getElementById("Q6Answer").style.color = "green";
        document.getElementById("img6").src = "img/1.png"
        totalPoint++;
    }
    else if (a6.toLowerCase() == "ostfold university college") {
        document.getElementById("Q6Answer").innerHTML = "Right!";
        document.getElementById("Q6Answer").style.color = "green";
        document.getElementById("img6").src = "img/1.png"
        totalPoint++;
    }
    else {
        document.getElementById("Q6Answer").innerHTML = "Wrong!";
        document.getElementById("Q6Answer").style.color = "red";
        document.getElementById("Q6RightAnswer").innerHTML = "Right answer is: HIOF or ostfold university college";
        document.getElementById("img6").src = "img/2.png"

    }
    totalPoint = ((totalPoint / 6) * 100).toFixed(2);
    if (totalPoint > 80) {
        document.getElementById("txtTotalPoints").innerHTML = "Congratulation! Your score is: " + totalPoint + "%";
    }
    else {
        document.getElementById("txtTotalPoints").innerHTML = "Your score is: " + totalPoint + "%";
    }
    submitScore(totalPoint);
    totalPoint = 0;
}

function submitScore(points) {
    $.ajax({
        type: "GET",
        url: "submitScore.php",
        dataType: "json",
        data: { "score":points},
    });
    getHighscore();
}

function getHighscore() {
    $.ajax({
        type: "GET",
        url: "getHighscoresAPI.php",
        dataType: "json",
        success: function(data, status) {
            if (data) {
                console.log(data.userCount);
                $( "#scoreboard" ).addClass( "content" );
                $("#scoreboard > p:eq(0)").remove();
                var para = document.createElement("p");
                var node = document.createTextNode("You have taken this quiz " + data.userCount + " times, and your average is " + data.averageScore + "%");
                para.appendChild(node);
                var element = document.getElementById("scoreboard");
                element.appendChild(para);



            }
        }
    });

}

document.getElementById("btnSubmit").addEventListener("click", checkAnswers);
