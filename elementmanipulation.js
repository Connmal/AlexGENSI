//-------------------------------------------------------------------------
// Declaration of functions for manipulating text, boxes and other elements
//-------------------------------------------------------------------------

// Wraps text to fit in a span of width 'width'
function wrap(text, width) {
  text.each(function() {
    var text = d3.select(this),
        words = text.text().split(/\s+/).reverse(),
        word,
        line = [],
        lineNumber = 0,
        lineHeight = 1.1, // ems
        y = text.attr("y"),
        x = text.attr("x")
        dy = parseFloat(text.attr("dy")),
        tspan = text.text(null).append("tspan").attr("x", x).attr("y", y);
    while (word = words.pop()) {
      line.push(word);
      tspan.text(line.join(" "));
      if (tspan.node().getComputedTextLength() > width) {
        line.pop();
        tspan.text(line.join(" "));
        line = [word];
        tspan = text.append("tspan").attr("x", x).attr("y", y).attr("dy", ++lineNumber * lineHeight + "em").text(word);
      }
    }
  });
}

function refreshRadio() {
  var gendaltr = document.getElementById("genderaltr")
  var leeftijd = document.getElementById("leeftijdAltr")
  var relatie = document.getElementById("relatieAltr")
  var long = document.getElementById("longknwn")

  for(var i=0;i<gendaltr.length;i++) {
    gendaltr[i].checked = false;
  }
  for(var i=0;i<leeftijd.length;i++) {
    leeftijd[i].checked = false;
  }

  for(var i=0;i<long.length;i++) {
    long[i].checked = false;
  }

  for(var i=0;i<relatie.length;i++) {
    relatie[i].checked = false;
  }
  relatie[relatie.length-1].value = "";
}

// If respondent has not filled in an answer, reminds them
function promptNonresponse() {
  document.getElementById("nonresponse_box").style.display = "block";
  document.getElementById("popup").style.display = "block";
}

function promptOnlyOne() {
  document.getElementById("onlyone_box").style.display = "block";
  document.getElementById("onlyOnePopup").style.display = "block";
}

function alterPromptNonresponse() {
  document.getElementById("fewAlters_box").style.display = "block";
  document.getElementById("alterPopup").style.display = "block";
}

function alterPromptReminder() {
  document.getElementById("reminderAlters_box").style.display = "block";
  document.getElementById("reminderPopup").style.display = "block";
}

function dragPromptNonresponse() {
  document.getElementById("fewDragged_box").style.display = "block";
  document.getElementById("dragPopup").style.display = "block";
}

function closePopup() {
  document.getElementById("nonresponse_box").style.display = "none";
  document.getElementById("popup").style.display = "none";
}

function closeOnlyOnePopup() {
  document.getElementById("onlyone_box").style.display = "none";
  document.getElementById("popup").style.display = "none";
}

function closeAlterPopup() {
  document.getElementById("fewAlters_box").style.display = "none";
  document.getElementById("alterPopup").style.display = "none";
}

function closeReminderPopup() {
  document.getElementById("reminderAlters_box").style.display = "none";
  document.getElementById("reminderPopup").style.display = "none";
}

function closeDragPopup() {
  document.getElementById("fewDragged_box").style.display = "none";
  document.getElementById("dragPopup").style.display = "none";
}

// Questions about individuals in the network, these are for drag boxes
function drawBox(node) {

  if (currSlide == 3) {
    var q_x = (node.x - 142 + 500 > bodyWidth) ? bodyWidth - 490 : Math.max(node.x - 142,10);
    var x = q_x.toString();

    var q_y = node.y - 310;
    var y = q_y.toString();

    var gendaltr = document.getElementById("genderalter")
    gendaltr.style.left = x + "px";
    gendaltr.style.top = y + "px";

    var next_x = (node.x + 250 + 78 > bodyWidth) ? bodyWidth - 90 : Math.max(node.x + 250,410);
    x = next_x.toString();
    var next_y = node.y - 200;
    y = next_y.toString();

    document.getElementById("Next").style.left = x + "px";
    document.getElementById("Next").style.top = y + "px";
  } else if  (currSlide == 3.5) {
    var q_x = (node.x - 142 + 500 > bodyWidth) ? bodyWidth - 490 : Math.max(node.x - 142,10);
    var x = q_x.toString();

    var q_y = node.y - 310;
    var y = q_y.toString();

    var leeftijd = document.getElementById("leeftijdAlter")
    leeftijd.style.left = x + "px";
    leeftijd.style.top = y + "px";

    var next_x = (node.x + 250 + 78 > bodyWidth) ? bodyWidth - 90 : Math.max(node.x + 250,410);
    x = next_x.toString();
    var next_y = node.y - 0;
    y = next_y.toString();

    document.getElementById("Next").style.left = x + "px";
    document.getElementById("Next").style.top = y + "px";
  } else if (currSlide == 3.6) {

        var q_x = (node.x - 142 + 500 > bodyWidth) ? bodyWidth - 490 : Math.max(node.x - 142,10);
        var x = q_x.toString();

        var q_y = node.y - 310;
        var y = q_y.toString();

        var long = document.getElementById("longknown")
        long.style.left = x + "px";
        long.style.top = y + "px";

        var next_x = (node.x + 250 + 78 > bodyWidth) ? bodyWidth - 90 : Math.max(node.x + 250,410);
        x = next_x.toString();
        var next_y = node.y - 100;
        y = next_y.toString();

        document.getElementById("Next").style.left = x + "px";
        document.getElementById("Next").style.top = y + "px";

  } else if (currSlide == 4) {

    var q_x = (node.x < center) ? node.x + 60 : node.x - 540;
    var x = q_x.toString();
    var q_y = node.y - 305;
    var y = q_y.toString();

    var relatie = document.getElementById("relatieAlter")
    relatie.style.left = x + "px";
    relatie.style.top = y + "px";

    var next_x = (node.x < center) ? node.x + 460 : node.x - 140;
    x = next_x.toString();
    var next_y = node.y + 85;
    y = next_y.toString();

    document.getElementById("Next").style.left = x + "px";
    document.getElementById("Next").style.top = y + "px";
}
}

// for disabling Show Next button when it is clicked
function pauseShowNext() {
  document.getElementById("Next").disabled = true;
  setTimeout(function() {
    document.getElementById("Next").disabled = false;
  },1000);
}
