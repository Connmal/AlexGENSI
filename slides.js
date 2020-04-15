//--------------------------------
// Declaration of slides and boxes
//--------------------------------

// Slide 0

// Catch Internet Explorer users; incompatible browser
if (isIE()) {
  var slide0 = d3.select("svg").append("g")
    .attr("id", "slide0");
  slide0.append("rect")
    .style("fill", "white")
    .attr("x", 0)
    .attr("y", 0)
    .attr("width", bodyWidth)
    .attr("height", bodyHeight);
  slide0.append("text")
    .attr("class", "lead")
    .text("Your browser is not supported.")
    .attr("x", center - 170)
    .attr("y", title_offset_top);
  slide0.append("text")
    .attr("class", "slideText")
    .attr("x", center - textWidth / 2)
    .attr("y", text_offset_top + title_offset_top + lineHeight)
    .text("Please us a different browser for this survey.")
    .call(wrap, textWidth);

} else {
  var slide0 = d3.select("svg").append("g")
    .attr("id", "slide0");
  slide0.append("rect")
    .style("fill", "white")
    .attr("x", 0)
    .attr("y", 0)
    .attr("width", bodyWidth)
    .attr("height", bodyHeight);
  slide0.append("text")
    .attr("class", "lead")
    .text("")
    .attr("x", center - 170)
    .attr("y", title_offset_top);
  slide0.append("text")
    .attr("class", "slideText")
    .attr("x", center - textWidth / 2)
    .attr("y", text_offset_top + title_offset_top + lineHeight)
    .text("This is a survey about how one's social network affects well-being in older adults.")
    .call(wrap, textWidth);
  slide0.append("text")
    .attr("class", "slideText")
    .attr("x", center - textWidth / 2)
    .attr("y", text_offset_top + title_offset_top + lineHeight * ($('#slide0 .slideText tspan').length + $('#slide0 .slideText').length))
    .text("It is not possible to move back to an earlier question.")
    .call(wrap, textWidth);
  slide0.append("text")
    .attr("class", "slideText")
    .attr("x", center - textWidth / 2)
    .attr("y", text_offset_top + title_offset_top + lineHeight * ($('#slide0 .slideText tspan').length + $('#slide0 .slideText').length))
    .text("Completing the survey takes up to 40 minutes. Please read the questions carefully and please try not to leave the page before all questions are answered.")
    .call(wrap, textWidth);
  slide0.append("text")
    .attr("class", "slideText")
    .attr("x", center - textWidth / 2)
    .attr("y", text_offset_top + title_offset_top + lineHeight * ($('#slide0 .slideText tspan').length + $('#slide0 .slideText').length))
    .text("As already mentioned, you cannot return to your previous answers, so check your answers carefully before moving on to the next question. If you have entered a wrong answer, you can make a note of this and you can provide us with these answers at the end of the study. At the end of the questionnaire you will still have the opportunity to report what you have entered incorrectly by mistake.")
    .call(wrap, textWidth);
}
var slide_1 = d3.select("svg").append("g")
  .attr("id", "slide1")
slide_1.append("rect")
  .style("fill", "white")
  .attr("x", 0)
  .attr("y", 0)
  .attr("width", bodyWidth)
  .attr("height", bodyHeight);
slide_1.append("text")
  .attr("class", "slideText")
  .attr("x", center - textWidth / 2)
  .attr("y", text_offset_top + title_offset_top + lineHeight)
  .text("Please read the following slide before continuing. Clicking 'Continue' demonstrates you have read and understood the information below.")
  .call(wrap, textWidth);
slide_1.append("text")
  .attr("class", "slideText")
  .attr("x", center - textWidth / 2)
  .attr("y", text_offset_top + title_offset_top + lineHeight * 4)
  .text("PARTICIPANT INFORMATION.")
  .call(wrap, textWidth);
slide_1.append("text")
  .attr("class", "slideText")
  .attr("x", center - textWidth / 2)
  .attr("y", text_offset_top + title_offset_top + lineHeight * 8)
  .text("The purpose of this study is to investigate the impact of an individual’s social network on well-being in older adults. Only a small amount of research has examined this association in older adults and fewer have examined how changes in network aspects over time contribute to well-being. Determining this will allow this information to be incorporated into future interventions to improve well-being.")
  .call(wrap, textWidth);
slide_1.append("text")
  .attr("class", "slideText")
  .attr("x", center - textWidth / 2)
  .attr("y", text_offset_top + title_offset_top + lineHeight * 16)
  .text("You are eligible to take part in this study if you are over the age 65 and do not have a clinical diagnosis of anxiety or depression. These exclusions are important as the study is specifically interested in older adults and the measures of wellbeing included are not equipped to allow for previous clinical diagnoses.")
  .call(wrap, textWidth);
slide_1.append("text")
  .attr("class", "slideText")
  .attr("x", center - textWidth / 2)
  .attr("y", text_offset_top + title_offset_top + lineHeight * 24)
  .text("There is no obligation for you to take part in this study and you can stop being involved at any time by closing the survey down. This will not affect your eligibility to take part in any of our future research.")
  .call(wrap, textWidth);
slide_1.append("text")
 .attr("class", "slideText")
 .attr("x", center - textWidth / 2)
 .attr("y", text_offset_top + title_offset_top + lineHeight * 32)
 .text("It is up to you whether you would like to take part in the study.  I am giving you this information to help you make that decision. If you do decide to take part, remember that you can stop being involved in the study whenever you choose, without telling me why.  You are completely free to decide whether to take part, or to take part and then leave the study before completion.  If you no longer want to take part, simply close your browser.")
 .call(wrap, textWidth);
slide_1.append("text")
.attr("class", "slideText")
.attr("x", center - textWidth / 2)
.attr("y", text_offset_top + title_offset_top + lineHeight * 44)
.text("If you decide to take part, you will be asked to provide some demographic information such as your age, gender, marital status, education level and financial situation. You will then be asked to provide the names (you can use initials or shortened names as long as you would be able to recognise them at a later date) of family and friends and give some details about them and your relationship with them. This will be followed by the completion of some measures of well-being. This should take around 40 minutes. Upon finishing this survey and entering your email adress on the final part of the study you will be entered into winning one of four £250 prize draws!")
.call(wrap, textWidth);
slide_1.append("text")
.attr("class", "slideText")
.attr("x", center - textWidth / 2)
.attr("y", text_offset_top + title_offset_top + lineHeight * 54)
.text("Every two weeks for 12 weeks you will receive an email with a link to complete this questionnaire. This questionnaire will ask you to indicate how much contact you have had with each person. Questions about the duration and method of contact. And measures of well-being.")
.call(wrap, textWidth);
slide_1.append("text")
.attr("class", "slideText")
.attr("x", center - textWidth / 2)
.attr("y", text_offset_top + title_offset_top + lineHeight * 58)
.text("Please note: This study will require you to provide your email in order to contact you to invite you to the follow up sessions.")
.call(wrap, textWidth);
slide_1.append("text")
.attr("class", "slideText")
.attr("x", center - textWidth / 2)
.attr("y", text_offset_top + title_offset_top + lineHeight * 62)
.text("By taking part you will be adding to the literature on this topic which will help in the development of intervention to improve wellbeing in older adults.")
.call(wrap, textWidth);
slide_1.append("text")
.attr("class", "slideText")
.attr("x", center - textWidth / 2)
.attr("y", text_offset_top + title_offset_top + lineHeight * 68)
.text("Some of the questions relate to negative emotions you may have been feeling. It is possible that this could cause you some emotional discomfort. If you become upset whilst completing the survey you can stop at any point. You can request your data to be withdrawn following completion of the survey by contacting the researcher at the below email address. ")
.call(wrap, textWidth);
slide_1.append("text")
.attr("class", "slideText")
.attr("x", center - textWidth / 2)
.attr("y", text_offset_top + title_offset_top + lineHeight * 75)
.text("All data will be kept confidential. Your name will not be stored with your data, this will be identified via a participant code. Questionnaire responses will be stored on password protected computers which only the research team will have access to. All data will be stored in accordance with University guidelines and GDPR. The legal basis for processing the personal data required for the purposes of this study is that the research is necessary for scientific and historical research purposes.")
.call(wrap, textWidth);
slide_1.append("text")
.attr("class", "slideText")
.attr("x", center - textWidth / 2)
.attr("y", text_offset_top + title_offset_top + lineHeight * 80)
.text("The general findings of this study may be reported in a scientific journal or presented at a research conference. However, all data will be anonymous and your data will not personally identifiable. The anonymised data may also be published online within the data repositories of The Open Science Framework. If you do not want your anonymised data stored in this manner please do not take part.")
.call(wrap, textWidth);
slide_1.append("text")
.attr("class", "slideText")
.attr("x", center - textWidth / 2)
.attr("y", text_offset_top + title_offset_top + lineHeight * 90)
.text("The Department of Psychology Research Ethics Committee at Northumbria University have reviewed this study in order to safeguard your interests, and have granted approval to conduct the study. You have a right of access to a copy of the information comprised in your personal data (to do so individuals should submit a Subject Access Request) and a right in certain circumstances to have inaccurate personal data rectified. If you are dissatisfied with the University’s processing of personal data, you have the right to complain to the Information Commissioner’s Office. For more information, see the ICO website.")
.call(wrap, textWidth);
slide_1.append("text")
.attr("class", "slideText")
.attr("x", center - textWidth / 2)
.attr("y", text_offset_top + title_offset_top + lineHeight * 106)
.text("Contacts for further information")
.call(wrap, textWidth);
slide_1.append("text")
.attr("class", "slideText")
.attr("x", center - textWidth / 2)
.attr("y", text_offset_top + title_offset_top + lineHeight * 110)
.text("Researcher email: a.beecham@northumbria.ac.uk.")
.call(wrap, textWidth);
slide_1.append("text")
.attr("class", "slideText")
.attr("x", center - textWidth / 2)
.attr("y", text_offset_top + title_offset_top + lineHeight * 114)
.text("Supervisor email: thomas.pollet@northumbria.ac.uk.")
.call(wrap, textWidth);
slide_1.append("text")
.attr("class", "slideText")
.attr("x", center - textWidth / 2)
.attr("y", text_offset_top + title_offset_top + lineHeight * 122)
.text("Name and contact details of the Data Protection Officer at Northumbria University: Duncan James (dp.officer@northumbria.ac.uk).")
.call(wrap, textWidth);
slide_1.style("display", "none");

var slide_2 = d3.select("svg").append("g")
  .attr("id", "slide2");
slide_2.append("rect")
  .style("fill", "white")
  .attr("x", 0)
  .attr("y", 0)
  .attr("width", bodyWidth )
  .attr("height", bodyHeight);
slide_2.append("text")
  .attr("class", "slideText")
  .attr("x", center - textWidth / 2)
  .attr("y", text_offset_top + title_offset_top + lineHeight)
  .text("If you would like to take part in this study, please read the statement below and click ‘Continue’")
  .call(wrap, textWidth);
slide_2.append("text")
  .attr("class", "slideText")
  .attr("x", center - textWidth / 2)
  .attr("y", text_offset_top + title_offset_top + lineHeight * 4)
  .text("I understand the nature of the study, and what is required from me. I understand that after I participate I will receive a debrief providing me with information about the study and contact details for the researcher.  I understand I am free to withdraw from the study at any time, without having to give a reason for withdrawing, and without prejudice. I agree to provide information to the investigator and understand that my contribution will remain confidential. I also consent to the retention of this data under the condition that any subsequent use also be restricted to research projects that have gained ethical approval from Northumbria University.")
  .call(wrap, textWidth);
  slide_2.style("display", "none");


// Slide 3


var slide3 = d3.select("svg").append("g")
  .attr("id", "slide3");
slide3.append("rect")
  .style("fill", "white")
  .attr("class", "slide")
  .attr("x", 0)
  .attr("y", 0)
  .attr("width", bodyWidth)
  .attr("height", bodyHeight);
slide3.append("text")
  .attr("class", "slideText")
  .attr("x", center - (textWidth / 2))
  .attr("y", text_offset_top)
  .text("In the following part of the study we would like to learn more about your social network. We would like you to list all people you have had contact with during the past month. Therefore, we would like you to list all of the people that you feel you have a pesonal relationship with and have had any type of contact with during the last month. This contact can have been personal, by phone, Text, email, FaceTime, Skype or any other method. As you will be asked questions about your contact with the people you list in each fortnightly questionnaire, it would be best to use their full names so that you can recognise them although you can use abbreviations if you like.")
  .call(wrap, textWidth);
slide3.append("text")
  .attr("class", "slideText")
  .attr("x", center - (textWidth / 2))
  .attr("y", text_offset_top + lineHeight * ($('#slide3 .slideText tspan').length + $('#slide3 .slideText').length-1))
  .text("All information you enter about the people in your social network will be stored securely, treated confidentially, and only be used for scientific purposes.")
  .call(wrap, textWidth);
slide3.append("text")
  .attr("class", "slideText")
  .attr("id", "one_at_a_time")
  .attr("x", center - (textWidth / 2))
  .attr("y", text_offset_top + lineHeight * ($('#slide3 .slideText tspan').length + $('#slide3 .slideText').length-1))
  .text("You can decide how many people you want to list, but you will not be able to list more than 25 people. Please use add button (or enter on your keyboard) to add listings. We would like you to list those people that you have had any type of contact with during the last month that you feel you have a personal relationship with .")
  .call(wrap, textWidth);
var textheight = $('#slide3 .slideText tspan').length + $('#slide3 .slideText').length;
slide3.append("text")
  .attr("class", "slideText")
  .attr("id", "first_friend_text")
  .attr("x", center - (textWidth / 2))
  .attr("y", text_offset_top + lineHeight * textheight)
  .text("You can choose to view the contact list of your (mobile) phone, email, or Facebook if this helps.")
  .call(wrap, textWidth)
  .attr("display", "none");
slide3.append("text")
  .attr("class", "slideText")
  .attr("id", "final_friend_text")
  .attr("x", center - (textWidth / 2))
  .attr("y", text_offset_top + lineHeight * textheight)
  .style("stroke", "none")
  .style("fill", "red")
  .text("Thank you for entering these names. click on \"Continue\".")
  .call(wrap, textWidth)
  .attr("display", "none");
slide3.style("display", "none");

// Slide 4
// Slide 5

var slide5 = d3.select("svg").append("g")
  .attr("id", "slide5");
slide5.append("rect")
  .style("fill", "white")
  .attr("class", "slide")
  .attr("x", 0)
  .attr("y", 0)
  .attr("width", bodyWidth)
  .attr("height", bodyHeight);
slide5.append("text")
  .attr("class", "slideText")
  .attr("x", center - (textWidth / 2))
  .attr("y", text_offset_top)
  .text("How close is your relationship to each person?")
  .call(wrap, textWidth);
slide5.append("text")
  .attr("class", "slideText")
  .attr("x", center - (textWidth / 2))
  .attr("y", text_offset_top + lineHeight * ($('#slide5 .slideText tspan').length + $('#slide5 .slideText').length-1))
  .text("Drag the circles with your mouse to the different answers at the bottom on the screen, the circles will change colour when they are placed in a box.")
  .call(wrap, textWidth);
slide5.style("display", "none");

// Slide 6

var slide6 = d3.select("svg").append("g")
  .attr("id", "slide6");
slide6.append("rect")
  .style("fill", "white")
  .attr("class", "slide")
  .attr("x", 0)
  .attr("y", 0)
  .attr("width", bodyWidth)
  .attr("height", bodyHeight);
slide6.append("text")
  .attr("class", "slideText")
  .attr("x", center - (textWidth / 2))
  .attr("y", text_offset_top)
  .text("To the best of your knowledge, over the past two weeks what was the most frequent kind of contact you had with each person?")
  .call(wrap, textWidth);
slide6.append("text")
  .attr("class", "slideText")
  .attr("x", center - (textWidth / 2))
  .attr("y", text_offset_top + lineHeight * ($('#slide6 .slideText tspan').length + $('#slide6 .slideText').length-1))
  .text("It's not a problem if you don't know exactly - please provide your best estimate. If you really don't know about some people, you don't have to drag that person to a box. The circles will change color when they end up in a box.")
  .call(wrap, textWidth);
slide6.style("display", "none");

// Slide 7

var slide7 = d3.select("svg").append("g")
  .attr("id", "slide7")
slide7.append("rect")
  .style("fill", "white")
  .attr("class", "slide")
  .attr("x", 0)
  .attr("y", 0)
  .attr("width", bodyWidth)
  .attr("height", bodyHeight);
slide7.append("text")
  .attr("class", "slideText")
  .attr("x", center - (textWidth / 2))
  .attr("y", text_offset_top)
  .text("How often have you had personal contact with these people during the past two weeks?")
  .call(wrap, textWidth);
slide7.append("text")
  .attr("class", "slideText")
  .attr("x", center - (textWidth / 2))
  .attr("y", text_offset_top + lineHeight * ($('#slide7 .slideText tspan').length + $('#slide7 .slideText').length-1))
  .text("By personal contact we mean contact in real life, so in person. We do NOT mean contact here via, for example, the telephone or social media.")
  .call(wrap, textWidth);
slide7.append("text")
  .attr("class", "slideText")
  .attr("x", center - (textWidth / 2))
  .attr("y", text_offset_top + lineHeight * ($('#slide7 .slideText tspan').length + $('#slide7 .slideText').length-1))
  .text("Drag the circles with your mouse to the different answers at the bottom on the screen, the circles will change colour when they are placed in a box.")
  .call(wrap, textWidth);
slide7.style("display", "none");

// Slide 8

var slide8 = d3.select("svg").append("g")
  .attr("id", "slide8")
slide8.append("rect")
  .style("fill", "white")
  .attr("class", "slide")
  .attr("x", 0)
  .attr("y", 0)
  .attr("width", bodyWidth)
  .attr("height", bodyHeight);
slide8.append("text")
  .attr("class", "slideText")
  .attr("x", center - (textWidth / 2))
  .attr("y", text_offset_top)
  .text("How often in the past two weeks, have you had non-personal contact with these people?  For example via (mobile) telephone, mail, email, chat, sms, and other ways of online and offline communication.")
  .call(wrap, textWidth);
slide8.append("text")
  .attr("class", "slideText")
  .attr("x", center - (textWidth / 2))
  .attr("y", text_offset_top + lineHeight * ($('#slide8 .slideText tspan').length + $('#slide8 .slideText').length-1))
  .text("Drag the circles with your mouse to the different answers at the bottom on the screen, the circles will change colour when they are placed in a box.")
  .call(wrap, textWidth);
slide8.style("display", "none");

// Slide 9

var slide9 = d3.select("svg").append("g")
  .attr("id", "slide9")
slide9.append("rect")
  .style("fill", "white")
  .attr("class", "slide")
  .attr("x", 0)
  .attr("y", 0)
  .attr("width", bodyWidth)
  .attr("height", bodyHeight);
slide9.append("text")
  .attr("class", "slideText")
  .attr("x", center - (textWidth / 2))
  .attr("y", text_offset_top)
  .text("Which of these individuals use Instagram?")
  .call(wrap, textWidth);
slide9.append("text")
  .attr("class", "slideText")
  .attr("x", center - (textWidth / 2))
  .attr("y", text_offset_top + lineHeight * ($('#slide9 .slideText tspan').length + $('#slide9 .slideText').length-1))
  .text("Click on the person's name if they use Instagram, the circle will change color. If you have clicked the wrong person by mistake, you can restore this choice by clicking the name of this person again.")
  .call(wrap, textWidth);
slide9.style("display", "none");



var slide14 = d3.select("svg").append("g")
  .attr("id", "slide14")
slide14.append("rect")
  .style("fill", "white")
  .attr("class", "slide")
  .attr("x", 0)
  .attr("y", 0)
  .attr("width", bodyWidth)
  .attr("height", bodyHeight);
slide14.append("text")
  .attr("class", "slideText")
  .attr("x", center - (textWidth / 2))
  .attr("y", text_offset_top)
  .text("Now we ask you about the mutual contact of the people you just mentioned. These are quite a few questions, but you will see that you go through them quickly. You are almost at the end of the questionnaire.")
  .call(wrap, textWidth);
slide14.append("text")
  .attr("class", "slideText")
  .attr("id", "contactMet1")
  .attr("x", center - (textWidth / 2))
  .attr("y", text_offset_top + lineHeight * ($('#slide14 .slideText tspan').length + $('#slide14 .slideText').length-1))
  .text("When it comes too...")
  .call(wrap, textWidth);
slide14.append("text")
  .attr("class", "slideText")
  .attr("id", "contactMet2")
  .attr("x", center - (textWidth / 2))
  .attr("y", text_offset_top + lineHeight * ($('#slide14 .slideText tspan').length + $('#slide14 .slideText').length-1))
  .text("Who is in contact with, by contact we mean all forms of contact, such as personal contact, contact via (mobile) telephone, mail, email, sms, and other ways of online and offline communication.")
  .call(wrap, textWidth);
slide14.append("text")
  .attr("class", "slideText")
  .attr("id", "contactMet3")
  .attr("x", center - (textWidth / 2))
  .attr("y", text_offset_top + lineHeight * ($('#slide14 .slideText tspan').length + $('#slide14 .slideText').length-1))
  .text("Select the people who are in contact with each other by clicking on the circle with the mouse. A line will be created that indicates that the people are in contact with each other. Press the circle again to make the line disappear again, if the people are not in contact with each other.")
  .call(wrap, textWidth);
slide14.style("display", "none");

// Slide 15

var slide15 = d3.select("svg").append("g")
  .attr("id", "slide15")
slide15.append("rect")
  .style("fill", "white")
  .attr("class", "slide")
  .attr("x", 0)
  .attr("y", 0)
  .attr("width", bodyWidth)
  .attr("height", bodyHeight);
slide15.append("text")
  .attr("class", "slideText")
  .attr("x", center - (textWidth / 2))
  .attr("y", text_offset_top)
  .text("Which of these people do you consider to be a friend?")
  .call(wrap, textWidth);
slide15.append("text")
  .attr("class", "slideText")
  .attr("x", center - (textWidth / 2))
  .attr("y", text_offset_top + lineHeight * ($('#slide15 .slideText tspan').length + $('#slide15 .slideText').length-1))
  .text("Click on the person's name if you consider them to be a friend - the circle will change color. If you have clicked the wrong person by mistake, you can restore this choice by clicking the name of this person again.")
  .call(wrap, textWidth);
slide15.style("display", "none");

//Slide 16

var slide16 = d3.select("svg").append("g")
  .attr("id", "slide16");
slide16.append("rect")
  .style("fill", "white")
  .attr("class", "slide")
  .attr("x", 0)
  .attr("y", 0)
  .attr("width", bodyWidth)
  .attr("height", bodyHeight);
slide16.append("text")
  .attr("class", "slideText")
  .attr("x", center - textWidth / 2)
  .attr("y", text_offset_top + title_offset_top + lineHeight * 1)
  .text("Thank you for participating in this survey.")
  .call(wrap, textWidth);
slide16.append("text")
  .attr("class", "slideText")
  .attr("x", center - textWidth / 2)
  .attr("y", text_offset_top + title_offset_top + lineHeight * 4)
  .text("After reading the information below please click the 'CLICK HERE' above to carry on to the last part of the survey where you will provide your email address and close the browser, If you have already provided this information in a previous survey then please do not click the link.")
  .call(wrap, textWidth);
slide16.append("text")
  .attr("class", "slideText")
  .attr("x", center - textWidth / 2)
  .attr("y", text_offset_top + title_offset_top + lineHeight * 11)
  .text("You will receive an email every two weeks from today for the next 12 weeks containing a link to complete the questionnaire again (a further 6 questionnaires). If you chose not to complete the later stages of this study, the information that you provided during the earlier questionnaires will still be analysed and included in reports of this study.")
  .call(wrap, textWidth);
slide16.append("text")
  .attr("class", "slideText")
  .attr("x", center - textWidth / 2)
  .attr("y", text_offset_top + title_offset_top + lineHeight * 16)
  .text("If you felt affected by any of the well-being questions and wish to discuss your concerns, please contact The Samaritans on 116 123. Please also refer to the following NHS webpages for further advice on these topics https://www.nhs.uk/conditions/stress-anxiety-depression/ and https://www.nhs.uk/conditions/stress-anxiety-depression/loneliness-in-older-people/ .")
  .call(wrap, textWidth);
slide16.append("text")
  .attr("class", "slideText")
  .attr("x", center - textWidth / 2)
  .attr("y", text_offset_top + title_offset_top + lineHeight * 20)
  .text("If you are concerned about the COVID-19 (Coronavirus) pandemic, please access the most up to date NHS guidance here https://www.nhs.uk/conditions/coronavirus-covid-19/ and government guidance here https://www.gov.uk/government/topical-events/coronavirus-covid-19-uk-government-response.")
  .call(wrap, textWidth);
slide16.append("text")
  .attr("class", "slideText")
  .attr("x", center - textWidth / 2)
  .attr("y", text_offset_top + title_offset_top + lineHeight * 25)
  .text("If you have any concerns or questions about the study please contact a.beecham@northumbria.ac.uk.")
  .call(wrap, textWidth);
slide16.append("text")
  .attr("class", "slideText")
  .attr("x", center - textWidth / 2)
  .attr("y", text_offset_top + title_offset_top + lineHeight * 28)
  .text("Thank you again for your time, please only click the 'CLICK HERE' link above if this is your first survey and you have not already done so.")
  .call(wrap, textWidth);
slide16.style("display", "none");
