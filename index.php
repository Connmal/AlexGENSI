<?php header("Content-Type: text/html; charset=utf-8"); ?>
<!DOCTYPE html>
<html>
  <head>
    <title></title>
    <meta content="text/html;charset=utf-8" http-equiv="Content-Type">
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <!--<link rel="stylesheet" href="bootstrap.min.css">-->
    <script src="jquery.min.js"></script>
  </head>
  <body>
    <script src="d3.v3.min.js" charset="utf-8"></script>
    <script src="jquery-1.11.0.js"></script>
    <script type="text/javascript">

      // Prevent window close
      var hook = true;
      window.onbeforeunload = function() {
        if (hook) {
          return "Are you sure that you want to end this survey? All of your answers will be lost.";
        }
      }
      function unhook() {
        hook=false;
      }
      var bodyHeightone = $(document).height() - 20;
      if (bodyHeightone < 2800) bodyHeightone = 3200;
      var bodyWidth = $(document).width();
      var bodyHeight = $(document).height() - 20;
      if (bodyWidth < 800) bodyWidth = 800;
      if (bodyHeight < 750) bodyHeight = 750;
      var center = bodyWidth / 2;
      var middle = bodyHeight / 200;

      var textWidth = 800;
      var text_offset_top = 60;
      var title_offset_top = 70;
      var lineHeight = 18;
      var nodeLine = 360;

      var q_window_width = 100,
          q_window_height = 100,
          backdrop_width = 500;

      // left and top values for individual questions
      var question_lnum = center - (textWidth / 2);
      var string_l = question_lnum.toString();
      var string_t = "150px";
      var string_r_t = "45%",
          q_margin_top = 200,
          q_margin_top_str = q_margin_top.toString();

      // bar with boxes for answers
      var boxbar_margin = 10,
          boxbar_label_margin = 3,
          bar_target_height = 100,
          bar_target_width = ((bodyWidth - (boxbar_margin * 4) - 20) / 5),
          bar4_target_width = ((bodyWidth - (boxbar_margin * 3) - 20) / 4),
          bar5_target_width = ((bodyWidth - (boxbar_margin * 4) - 20) / 5),
          bar6_target_width = ((bodyWidth - (boxbar_margin * 5) - 20) / 6),
          bar_label_height = 25,
          boxbar_offset_x = 10,
          boxbar_offset_y = bodyHeight - bar_target_height - 100;

      var currSlide = 1;
      var numAlters = 0;
      var askedAbout = 0;
      var lastAskedAbout = 0;
      var numAsked = 1;
      var lastAnswered = 0;
      var numOther = 0;
      var checked = false;
      var altered = false;
      var skipped = false;
      var currNode = null;
      var nodeColor = '#9CD4D4',
          otherColor = '#faffa4',
          maleColor = '#a8a4ff',
          friendsColor = '#42f477',
          kidsColor = '#ffc1d8',
          kinderwensColor = '#ce88ae',
          kinderloosColor = '#c0d183',
          kinderhulpColor = '#c8b6db',
          kinderpraatColor = '#ef8f8f',
          answerColor = '#abff48';

///Below is the barebones HTML script for the questions and answers whether they be radio buttons or text boxes etc...
      var startTime;
      var answers = [];
    </script>
    <script src="ie.js"></script>
    <script src="nodefunctions.js"></script>
    <script src="graph.js"></script>
    <script src="elementmanipulation.js"></script>
    <script src="slides.js"></script>
    <script src="multiplechoiceelements.js"></script>
    <script src="shownext.js"></script>
    <script src="keypress.js"></script>

    <div class="goglink" id="link" method="get" display="none" onsubmit ="return false;">
   <form id="linkID">
    <p><a href="https://nupsych.qualtrics.com/jfe/form/SV_dg5d7HPvuXjObyZ"> CLICK HERE!</a></p>
  </form>
  </div>


      <div class="input-group" id="code_input" method="get" display="none" onsubmit ="return false;">
        <form id="codeID">
        <span class="slideText">Now we need to create a unique code for you. Please check the circle and enter the first two initials of your first name followed by the day you were born on. Then please enter the last two initials of your last name. And Finally the first number or letter of your postcode. A code for a person named Joe Smith born on the 24th of the month with a post code of FE2 4DE,  would be JO24THF.</span><br><br>
        <input type="radio" id="codeText" name="code" value="1"><label for="codecheckText"><span class="questionText"> Enter your code here:</span>
        <input type="text" id="codetextInput" name="code">
        </form>
        </div>


      <div class="input-group" id="prol_input" method="get" display="none" onsubmit ="return false;">
        <form id="prolID">
        <span class="slideText">Please check the circle and enter your prolific details to make sure you are reimbursed for taking part in the study.</span><br><br>
        <input type="radio" id="prolText" name="pr" value="1"><label for="prolcheckText"><span class="questionText"> Enter your prolific code here:</span>
        <input type="text" id="proltextInput" name="pr">
        </form>
        </div>

        <div class="input-group" id="age_input" method="get" display="none" onsubmit ="return false;">
          <form id="ageID">
          <span class="slideText">Please check the circle and enter your age in years. Use a numerical value. (For example : 21).</span><br><br>
          <input type="radio" id="ageText" name="age" value="1"><label for="agecheckText"><span class="questionText"> Enter your age here:</span>
          <input type="text" id="agetextInput" name="age">
          </form>
          </div>


          <div class="input-group" id="email_input" method="get" display="none" onsubmit ="return false;">
            <form id="emailID">
            <span class="slideText">Please check the circle and enter your email.</span><br><br>
            <input type="radio" id="emailText" name="email" value="1"><label for="emailcheckText"><span class="questionText"> Enter your email here:</span>
            <input type="text" id="emailtextInput" name="email">
            </form>
            </div>

  </div>
    <div class="input-group" display="none" id="gender_input" method="get">
      <form id="genderuser" display="none">
        <span class="slideText">Please select your gender.</span><br><br>
        <input type="radio" name="gender" value="Male"><span class="questionText"> Male</span><br>
        <input type="radio" name="gender" value="Female"><span class="questionText"> Female </span><br>
        <input type="radio" name="gender" value="Other"><span class="questionText"> Other</span><br>
        <input type="radio" name="gender" value="Prefer_Not_To_Say"><span class="questionText"> Prefer Not To Say</span><br>
      </form>
    </div>

  </div>
  <div class="input-group" display="none" id="education_input" method="get">
    <form id="educationuser" display="none">
      <span class="slideText">Please select the highest level of education that you have achieved.</span><br><br>
      <input type="radio" name="education" value="Primary/No education"><span class="questionText"> Primary/No education</span><br>
      <input type="radio" name="education" value="High School Degree"><span class="questionText"> High School Degree</span><br>
      <input type="radio" name="education" value="A-Level"><span class="questionText"> A-Level</span><br>
      <input type="radio" name="education" value="Bachelor Degree"><span class="questionText"> Bachelor Degree</span><br>
      <input type="radio" name="education" value="Postgraduate or Higher"><span class="questionText"> Postgraduate or Higher</span><br>
    </form>
  </div>

</div>
<div class="input-group" display="none" id="relation_input" method="get">
  <form id="relationuser" display="none">
    <span class="slideText">Which of the following terms describes you best? </span><br><br>
    <input type="radio" name="relation" value="Single"><span class="questionText"> Single</span><br>
    <input type="radio" name="relation" value="In a relationship"><span class="questionText"> In a relationship</span><br>
    <input type="radio" name="relation" value="Married"><span class="questionText"> Married</span><br>
    <input type="radio" name="relation" value="Seperated"><span class="questionText"> Seperated</span><br>
    <input type="radio" name="relation" value="Divorced"><span class="questionText"> Divorced</span><br>
    <input type="radio" name="relation" value="Widowed"><span class="questionText"> Widowed</span><br>
    <input type="radio" id="relationText" name="relation" value="7"><label for="relationcheckText"><span class="questionText"> If other, please specify:</span>
    <input type="text" id="relationtextInput" name="relation">
  </form>
</div>

</div>
<div class="input-group" display="none" id="covid_input" method="get">
<form id="coviduser" display="none">
  <span class="slideText">Are you currently self-isolating due to the recent COVID-19 (Coronavirus) pandemic?</span><br><br>
  <input type="radio" name="covid" value="No"><span class="questionText"> No </span><br>
  <input type="radio" id="covidText" name="covid" value="2"><label for="covidcheckText"><span class="questionText"> If yes, state here the date you began isolating: (Please answer in dd/mm/yyyy format, eg. (23/03/2020))</span>
  <input type="text" id="covidtextInput" name="covid">
</form>
</div>


  </div>
<div class="input-group" display="none" id="nation_input" method="get">
  <form id="nationuser" display="none">
    <span class="slideText">Please select your nationality.</span><br><br>
    <input type="radio" name="nation" value="1"><span class="questionText"> British</span><br>
    <input type="radio" name="nation" value="2"><span class="questionText"> American </span><br>
    <input type="radio" name="nation" value="3"><span class="questionText"> Prefer Not To Say</span><br>
    <input type="radio" id="nationText" name="nation" value="4"><label for="nationcheckText"><span class="questionText"> If other, state here:</span>
    <input type="text" id="nationtextInput" name="nation">
  </form>
</div>

</div>
<div class="input-group" display="none" id="finance_input" method="get">
<form id="financeuser" display="none">
  <span class="slideText">How strained are you financially?</span><br><br>
  <input type="radio" name="finance" value="1"><span class="questionText"> Comfortable with extra</span><br>
  <input type="radio" name="finance" value="2"><span class="questionText"> Enough but no extra </span><br>
  <input type="radio" name="finance" value="3"><span class="questionText"> Having to cut back</span><br>
  <input type="radio" name="finance" value="4"><span class="questionText"> Can't make ends meet</span><br>
</form>
</div>


    <div class="input-group" id="name_input" method="get" onsubmit="addAlter()">
      <input type="text" id="alterName" class="form-control" placeholder="Name" size="10">
      <button type="submit" id="alterSubmit" class="btn btn-default" position="inline" value="Enter" onclick="addAlter()">Add</button>
    </div>

    <div class="input-group" id="genderalter" method="get">
      <form id="genderaltr">
        <input type="radio" name="gA" value="Male" id="gAm"><label for="gAm"><span class="questionText">  Male</span></label><br>
        <input type="radio" name="gA" value="Female" id="gAf"><label for="gAf"><span class="questionText">  Female</span></label><br>
        <input type="radio" name="gA" value="Other" id="gAo"><label for="gAo"><span class="questionText">  Other</span></label><br>
        <input type="radio" name="gA" value="Prefer not to say" id="gAp"><label for="gAp"><span class="questionText">  Prefer not to say</span></label>
        </form>
    </div>

    <div class="input-group" id="leeftijdAlter" method="get">
      <form id="leeftijdAltr">
        <input type="radio" name="lA" value="18" id="lA18<"><label for="lA18<"><span class="questionText">  18 or under</span></label><br>
        <input type="radio" name="lA" value="19" id="lA19"><label for="lA19"><span class="questionText">  19</span></label><br>
        <input type="radio" name="lA" value="20" id="lA20"><label for="lA20"><span class="questionText">  20</span></label><br>
        <input type="radio" name="lA" value="21" id="lA21"><label for="lA21"><span class="questionText">  21</span></label><br>
        <input type="radio" name="lA" value="22" id="lA22"><label for="lA22"><span class="questionText">  22</span></label><br>
        <input type="radio" name="lA" value="23" id="lA23"><label for="lA23"><span class="questionText">  23</span></label><br>
        <input type="radio" name="lA" value="24" id="lA24"><label for="lA24"><span class="questionText">  24</span></label><br>
        <input type="radio" name="lA" value="25" id="lA25"><label for="lA25"><span class="questionText">  25</span></label><br>
        <input type="radio" name="lA" value="26" id="lA26"><label for="lA26"><span class="questionText">  26</span></label><br>
        <input type="radio" name="lA" value="27" id="lA27"><label for="lA27"><span class="questionText">  27</span></label><br>
        <input type="radio" name="lA" value="28" id="lA28"><label for="lA28"><span class="questionText">  28</span></label><br>
        <input type="radio" name="lA" value="29" id="lA29"><label for="lA29"><span class="questionText">  29</span></label><br>
        <input type="radio" name="lA" value="30" id="lA30"><label for="lA30"><span class="questionText">  30</span></label><br>
        <input type="radio" name="lA" value="31" id="lA31"><label for="lA31"><span class="questionText">  31</span></label><br>
        <input type="radio" name="lA" value="32" id="lA32"><label for="lA32"><span class="questionText">  32</span></label><br>
        <input type="radio" name="lA" value="33" id="lA33"><label for="lA33"><span class="questionText">  33</span></label><br>
        <input type="radio" name="lA" value="34" id="lA34"><label for="lA34"><span class="questionText">  34</span></label><br>
        <input type="radio" name="lA" value="35" id="lA35"><label for="lA35"><span class="questionText">  35</span></label><br>
        <input type="radio" name="lA" value="36" id="lA36"><label for="lA36"><span class="questionText">  36</span></label><br>
        <input type="radio" name="lA" value="37" id="lA37"><label for="lA37"><span class="questionText">  37</span></label><br>
        <input type="radio" name="lA" value="38" id="lA38"><label for="lA38"><span class="questionText">  38</span></label><br>
        <input type="radio" name="lA" value="39" id="lA39"><label for="lA39"><span class="questionText">  39</span></label><br>
        <input type="radio" name="lA" value="40" id="lA40"><label for="lA40"><span class="questionText">  40</span></label><br>
        <input type="radio" name="lA" value="41" id="lA41"><label for="lA41"><span class="questionText">  41</span></label><br>
        <input type="radio" name="lA" value="42" id="lA42"><label for="lA42"><span class="questionText">  42</span></label><br>
        <input type="radio" name="lA" value="43" id="lA43"><label for="lA43"><span class="questionText">  43</span></label><br>
        <input type="radio" name="lA" value="44" id="lA44"><label for="lA44"><span class="questionText">  44</span></label><br>
        <input type="radio" name="lA" value="45" id="lA45"><label for="lA45"><span class="questionText">  45</span></label><br>
        <input type="radio" name="lA" value="46" id="lA46"><label for="lA46"><span class="questionText">  46</span></label><br>
        <input type="radio" name="lA" value="47" id="lA47"><label for="lA47"><span class="questionText">  47</span></label><br>
        <input type="radio" name="lA" value="48" id="lA48"><label for="lA48"><span class="questionText">  48</span></label><br>
        <input type="radio" name="lA" value="49" id="lA49"><label for="lA49"><span class="questionText">  49</span></label><br>
        <input type="radio" name="lA" value="50" id="lA50"><label for="lA50"><span class="questionText">  50</span></label><br>
        <input type="radio" name="lA" value="51" id="lA51"><label for="lA51"><span class="questionText">  51</span></label><br>
        <input type="radio" name="lA" value="52" id="lA52"><label for="lA52"><span class="questionText">  52</span></label><br>
        <input type="radio" name="lA" value="53" id="lA53"><label for="lA53"><span class="questionText">  53</span></label><br>
        <input type="radio" name="lA" value="54" id="lA54"><label for="lA54"><span class="questionText">  54</span></label><br>
        <input type="radio" name="lA" value="55" id="lA55"><label for="lA55"><span class="questionText">  55</span></label><br>
        <input type="radio" name="lA" value="56" id="lA56"><label for="lA56"><span class="questionText">  56</span></label><br>
        <input type="radio" name="lA" value="57" id="lA57"><label for="lA57"><span class="questionText">  57</span></label><br>
        <input type="radio" name="lA" value="58" id="lA58"><label for="lA58"><span class="questionText">  58</span></label><br>
        <input type="radio" name="lA" value="59" id="lA59"><label for="lA59"><span class="questionText">  59</span></label><br>
        <input type="radio" name="lA" value="60" id="lA60"><label for="lA60"><span class="questionText">  60</span></label><br>
        <input type="radio" name="lA" value="61" id="lA61"><label for="lA61"><span class="questionText">  61</span></label><br>
        <input type="radio" name="lA" value="62" id="lA62"><label for="lA62"><span class="questionText">  62</span></label><br>
        <input type="radio" name="lA" value="63" id="lA63"><label for="lA63"><span class="questionText">  63</span></label><br>
        <input type="radio" name="lA" value="64" id="lA64"><label for="lA64"><span class="questionText">  64</span></label><br>
        <input type="radio" name="lA" value="65" id="lA65"><label for="lA65"><span class="questionText">  65</span></label><br>
        <input type="radio" name="lA" value="66" id="lA66"><label for="lA66"><span class="questionText">  66</span></label><br>
        <input type="radio" name="lA" value="67" id="lA67"><label for="lA67"><span class="questionText">  67</span></label><br>
        <input type="radio" name="lA" value="68" id="lA68"><label for="lA68"><span class="questionText">  68</span></label><br>
        <input type="radio" name="lA" value="69" id="lA69"><label for="lA69"><span class="questionText">  69</span></label><br>
        <input type="radio" name="lA" value="70" id="lA70"><label for="lA70"><span class="questionText">  70</span></label><br>
        <input type="radio" name="lA" value="71" id="lA71"><label for="lA71"><span class="questionText">  71</span></label><br>
        <input type="radio" name="lA" value="72" id="lA72"><label for="lA72"><span class="questionText">  72</span></label><br>
        <input type="radio" name="lA" value="73" id="lA73"><label for="lA73"><span class="questionText">  73</span></label><br>
        <input type="radio" name="lA" value="74" id="lA74"><label for="lA74"><span class="questionText">  74</span></label><br>
        <input type="radio" name="lA" value="75" id="lA75"><label for="lA75"><span class="questionText">  75</span></label><br>
        <input type="radio" name="lA" value="76" id="lA76"><label for="lA76"><span class="questionText">  76</span></label><br>
        <input type="radio" name="lA" value="77" id="lA77"><label for="lA77"><span class="questionText">  77</span></label><br>
        <input type="radio" name="lA" value="78" id="lA78"><label for="lA78"><span class="questionText">  78</span></label><br>
        <input type="radio" name="lA" value="79" id="lA79"><label for="lA79"><span class="questionText">  79</span></label><br>
        <input type="radio" name="lA" value="80" id="lA80"><label for="lA80"><span class="questionText">  80</span></label><br>
        <input type="radio" name="lA" value="81" id="lA81"><label for="lA81"><span class="questionText">  81</span></label><br>
        <input type="radio" name="lA" value="82" id="lA82"><label for="lA82"><span class="questionText">  82</span></label><br>
        <input type="radio" name="lA" value="83" id="lA83"><label for="lA83"><span class="questionText">  83</span></label><br>
        <input type="radio" name="lA" value="84" id="lA84"><label for="lA84"><span class="questionText">  84</span></label><br>
        <input type="radio" name="lA" value="85" id="lA85"><label for="lA85"><span class="questionText">  85</span></label><br>
        <input type="radio" name="lA" value="86" id="lA86"><label for="lA86"><span class="questionText">  86</span></label><br>
        <input type="radio" name="lA" value="87" id="lA87"><label for="lA87"><span class="questionText">  87</span></label><br>
        <input type="radio" name="lA" value="88" id="lA88"><label for="lA88"><span class="questionText">  88</span></label><br>
        <input type="radio" name="lA" value="64" id="lA89"><label for="lA89"><span class="questionText">  89</span></label><br>
        <input type="radio" name="lA" value="64" id="lA90"><label for="lA90"><span class="questionText">  90</span></label><br>
        <input type="radio" name="lA" value="64" id="lA91"><label for="lA91"><span class="questionText">  91</span></label><br>
        <input type="radio" name="lA" value="64" id="lA92"><label for="lA92"><span class="questionText">  92</span></label><br>
        <input type="radio" name="lA" value="64" id="lA93"><label for="lA93"><span class="questionText">  93</span></label><br>
        <input type="radio" name="lA" value="64" id="lA94"><label for="lA94"><span class="questionText">  94</span></label><br>
        <input type="radio" name="lA" value="95+" id="lA95"><label for="lA95+"><span class="questionText"> 95 or over</span></label>
      </form>
    </div>



    <div class="input-group" id="relatieAlter" method="get" onsubmit="return false;">
      <form id="relatieAltr">
        <input type="checkbox" name="rA" value="1" id="rA1"><label for="rA1"><span class="questionText">  Romantic partner</span></label><br>
        <input type="checkbox" name="rA" value="2" id="rA2"><label for="rA2"><span class="questionText">  Father/Mother</span></label><br>
        <input type="checkbox" name="rA" value="3" id="rA3"><label for="rA3"><span class="questionText">  Brother/Sister</span></label><br>
        <input type="checkbox" name="rA" value="4" id="rA4"><label for="rA4"><span class="questionText">  Another family member (for example, uncle/aunt, nephew/niece)</span></label><br>
        <input type="checkbox" name="rA" value="5" id="rA5"><label for="rA5"><span class="questionText">  Child</span></label><br>
        <input type="checkbox" name="rA" value="6" id="rA6"><label for="rA6"><span class="questionText">  Grandchild</span></label><br>
        <input type="checkbox" name="rA" value="7" id="rA7"><label for="rA7"><span class="questionText">  From primary/secondary school</span></label><br>
        <input type="checkbox" name="rA" value="8" id="rA8"><label for="rA8"><span class="questionText">  From studying</span></label><br>
        <input type="checkbox" name="rA" value="9" id="rA9"><label for="rA9"><span class="questionText">  Via work</span></label><br>
        <input type="checkbox" name="rA" value="10" id="rA10"><label for="rA10"><span class="questionText">  Via social activity (sport, hobby)</span></label><br>
        <input type="checkbox" name="rA" value="11" id="rA11"><label for="rA11"><span class="questionText">  Via a common friend</span></label><br>
        <input type="checkbox" name="rA" value="12" id="rA12"><label for="rA12"><span class="questionText">  Neighbour</span></label><br>
        <input type="checkbox" name="rA" value="13" id="rA13"><label for="rA13"><span class="questionText">  Romantic partner's family member</span></label><br>
        <input type="checkbox" name="rA" value="14" id="rA14"><label for="rA14"><span class="questionText">  Friend of romantic partner</span></label><br>
        <input type="checkbox" id="rAcheckText" name="rA" value="15"><label for="rAcheckText"><span class="questionText">  In a different way, namely:</span></label><br>
        <input type="text" id="rAtextInput" name="rA">
      </form>
    </div>

    <div class="input-group" id="longknown" method="get">
      <form id="longknwn">
        <input type="radio" name="lk" value=">1" id="lk1"><label for="lk1"><span class="questionText">  Less than a year</span></label><br>
        <input type="radio" name="lk" value="1" id="lk2"><label for="lk2"><span class="questionText">  1</span></label><br>
        <input type="radio" name="lk" value="2" id="lk3"><label for="lk3"><span class="questionText">  2</span></label><br>
        <input type="radio" name="lk" value="3" id="lk4"><label for="lk4"><span class="questionText">  3</span></label><br>
        <input type="radio" name="lk" value="4" id="lk5"><label for="lk5"><span class="questionText">  4</span></label><br>
        <input type="radio" name="lk" value="5" id="lk6"><label for="lk6"><span class="questionText">  5</span></label><br>
        <input type="radio" name="lk" value="6" id="lk7"><label for="lk7"><span class="questionText">  6</span></label><br>
        <input type="radio" name="lk" value="7" id="lk8"><label for="lk8"><span class="questionText">  7</span></label><br>
        <input type="radio" name="lk" value="8" id="lk9"><label for="lk9"><span class="questionText">  8</span></label><br>
        <input type="radio" name="lk" value="9" id="lk11"><label for="lk11"><span class="questionText">  9</span></label><br>
        <input type="radio" name="lk" value="10" id="lk12"><label for="lk12"><span class="questionText">  10</span></label><br>
        <input type="radio" name="lk" value="11" id="lk13"><label for="lk13"><span class="questionText">  11</span></label><br>
        <input type="radio" name="lk" value="12" id="lk14"><label for="lk14"><span class="questionText">  12</span></label><br>
        <input type="radio" name="lk" value="13" id="lk15"><label for="lk15"><span class="questionText">  13</span></label><br>
        <input type="radio" name="lk" value="14" id="lk16"><label for="lk16"><span class="questionText">  14</span></label><br>
        <input type="radio" name="lk" value="15" id="lk17"><label for="lk17"><span class="questionText">  15</span></label><br>
        <input type="radio" name="lk" value="16" id="lk18"><label for="lk18"><span class="questionText">  16</span></label><br>
        <input type="radio" name="lk" value="17" id="lk19"><label for="lk19"><span class="questionText">  17</span></label><br>
        <input type="radio" name="lk" value="18" id="lk20"><label for="lk20"><span class="questionText">  18</span></label><br>
        <input type="radio" name="lk" value="19" id="lk21"><label for="lk21"><span class="questionText">  19</span></label><br>
        <input type="radio" name="lk" value="20" id="lk22"><label for="lk22"><span class="questionText">  20</span></label><br>
        <input type="radio" name="lk" value="21" id="lk23"><label for="lk23"><span class="questionText">  21</span></label><br>
        <input type="radio" name="lk" value="22" id="lk24"><label for="lk24"><span class="questionText">  22</span></label><br>
        <input type="radio" name="lk" value="23" id="lk25"><label for="lk25"><span class="questionText">  23</span></label><br>
        <input type="radio" name="lk" value="24" id="lk26"><label for="lk26"><span class="questionText">  24</span></label><br>
        <input type="radio" name="lk" value="25" id="lk27"><label for="lk27"><span class="questionText">  25</span></label><br>
        <input type="radio" name="lk" value="26" id="lk28"><label for="lk28"><span class="questionText">  26</span></label><br>
        <input type="radio" name="lk" value="27" id="lk29"><label for="lk29"><span class="questionText">  27</span></label><br>
        <input type="radio" name="lk" value="28" id="lk30"><label for="lk30"><span class="questionText">  28</span></label><br>
        <input type="radio" name="lk" value="29" id="lk31"><label for="lk31"><span class="questionText">  29</span></label><br>
        <input type="radio" name="lk" value="30" id="lk32"><label for="lk32"><span class="questionText">  30</span></label><br>
        <input type="radio" name="lk" value="31" id="lk33"><label for="lk33"><span class="questionText">  31</span></label><br>
        <input type="radio" name="lk" value="32" id="lk34"><label for="lk34"><span class="questionText">  32</span></label><br>
        <input type="radio" name="lk" value="33" id="lk35"><label for="lk35"><span class="questionText">  33</span></label><br>
        <input type="radio" name="lk" value="34" id="lk36"><label for="lk36"><span class="questionText">  34</span></label><br>
        <input type="radio" name="lk" value="35+" id="lk37"><label for="lk37"><span class="questionText">  35+</span></label>
      </form>
    </div>


    <div class="input-group" id="levensplezierAlter" method="get">
      <form id="levensplezierAltr">
        <input type="radio" name="lpA" value="1" id="lpA1"><label for="lpA1"><span class="questionText">  More than once a day</span></label><br>
        <input type="radio" name="lpA" value="2" id="lpA2"><label for="lpA2"><span class="questionText">  Atleast once a day</span></label><br>
        <input type="radio" name="lpA" value="3" id="lpA4"><label for="lpA4"><span class="questionText">  A few times a week</span></label><br>
        <input type="radio" name="lpA" value="4" id="lpA3"><label for="lpA3"><span class="questionText">  At least once a week</span></label><br>
        <input type="radio" name="lpA" value="5" id="lpA5"><label for="lpA5"><span class="questionText">  Less than once a week</span></label>
      </form>
    </div>


    <div class="input-group" id="loneliness1" method="get">
      <span class="slideText">The following questions are concerning yourself:</span><br><br>
      <form id="lo1user" >
        <span class="slideText">How often do you feel that you are "in tune" with the people around you?</span><br><br>
        <input type="radio" name="lo1" value="Always"><span class="questionText">  Always</span><br>
        <input type="radio" name="lo1" value="Sometimes"><span class="questionText">  Sometimes </span><br>
        <input type="radio" name="lo1" value="Rarely"><span class="questionText">  Rarely</span><br>
        <input type="radio" name="lo1" value="Never"><span class="questionText">  Never</span><br>
      </form>
      <form id="lo2user">
        <span class="slideText">How often do you feel that you lack companionship?</span><br><br>
        <input type="radio" name="lo2" value="Always"><span class="questionText">  Always</span><br>
        <input type="radio" name="lo2" value="Sometimes"><span class="questionText">  Sometimes </span><br>
        <input type="radio" name="lo2" value="Rarely"><span class="questionText">  Rarely</span><br>
        <input type="radio" name="lo2" value="Never"><span class="questionText">  Never</span><br>
      </form>
    </div>

    <div class="input-group" id="loneliness3" method="get">
      <span class="slideText">The following questions are concerning yourself:</span><br><br>
      <form id="lo3user" >
        <span class="slideText">How often do you feel that there is no one you can turn to?</span><br><br>
        <input type="radio" name="lo3" value="Always"><span class="questionText">  Always</span><br>
        <input type="radio" name="lo3" value="Sometimes"><span class="questionText">  Sometimes </span><br>
        <input type="radio" name="lo3" value="Rarely"><span class="questionText">  Rarely</span><br>
        <input type="radio" name="lo3" value="Never"><span class="questionText">  Never</span><br>
      </form>
      <form id="lo4user">
        <span class="slideText">How often do you feel alone?</span><br><br>
        <input type="radio" name="lo4" value="Always"><span class="questionText">  Always</span><br>
        <input type="radio" name="lo4" value="Sometimes"><span class="questionText">  Sometimes </span><br>
        <input type="radio" name="lo4" value="Rarely"><span class="questionText">  Rarely</span><br>
        <input type="radio" name="lo4" value="Never"><span class="questionText">  Never</span><br>
      </form>
    </div>

    <div class="input-group" id="loneliness5" method="get">
      <span class="slideText">The following questions are concerning yourself:</span><br><br>
      <form id="lo5user" >
        <span class="slideText">How often do you feel part of a group of friends?</span><br><br>
        <input type="radio" name="lo5" value="Always"><span class="questionText">  Always</span><br>
        <input type="radio" name="lo5" value="Sometimes"><span class="questionText">  Sometimes </span><br>
        <input type="radio" name="lo5" value="Rarely"><span class="questionText">  Rarely</span><br>
        <input type="radio" name="lo5" value="Never"><span class="questionText">  Never</span><br>
      </form>
      <form id="lo6user">
        <span class="slideText">How often do you feel that you have a lot in common with people around you?</span><br><br>
        <input type="radio" name="lo6" value="Always"><span class="questionText">  Always</span><br>
        <input type="radio" name="lo6" value="Sometimes"><span class="questionText">  Sometimes </span><br>
        <input type="radio" name="lo6" value="Rarely"><span class="questionText">  Rarely</span><br>
        <input type="radio" name="lo6" value="Never"><span class="questionText">  Never</span><br>
      </form>
    </div>

    <div class="input-group" id="loneliness7" method="get">
      <span class="slideText">The following questions are concerning yourself:</span><br><br>
      <form id="lo7user" >
        <span class="slideText">How often do you feel that you are no longer closer to anyone?</span><br><br>
        <input type="radio" name="lo7" value="Always"><span class="questionText">  Always</span><br>
        <input type="radio" name="lo7" value="Sometimes"><span class="questionText">  Sometimes </span><br>
        <input type="radio" name="lo7" value="Rarely"><span class="questionText">  Rarely</span><br>
        <input type="radio" name="lo7" value="Never"><span class="questionText">  Never</span><br>
      </form>
      <form id="lo8user">
        <span class="slideText">How often do you feel that your interests and ideas are not shared by those around you?</span><br><br>
        <input type="radio" name="lo8" value="Always"><span class="questionText">  Always</span><br>
        <input type="radio" name="lo8" value="Sometimes"><span class="questionText">  Sometimes </span><br>
        <input type="radio" name="lo8" value="Rarely"><span class="questionText">  Rarely</span><br>
        <input type="radio" name="lo8" value="Never"><span class="questionText">  Never</span><br>
      </form>
    </div>

    <div class="input-group" id="loneliness9" method="get">
      <span class="slideText">The following questions are concerning yourself:</span><br><br>
      <form id="lo9user" >
        <span class="slideText">How often do you feel outgoing and friendly?</span><br><br>
        <input type="radio" name="lo9" value="Always"><span class="questionText">  Always</span><br>
        <input type="radio" name="lo9" value="Sometimes"><span class="questionText">  Sometimes </span><br>
        <input type="radio" name="lo9" value="Rarely"><span class="questionText">  Rarely</span><br>
        <input type="radio" name="lo9" value="Never"><span class="questionText">  Never</span><br>
      </form>
      <form id="lo10user">
        <span class="slideText">How often do you feel close to people?</span><br><br>
        <input type="radio" name="lo10" value="Always"><span class="questionText">  Always</span><br>
        <input type="radio" name="lo10" value="Sometimes"><span class="questionText">  Sometimes </span><br>
        <input type="radio" name="lo10" value="Rarely"><span class="questionText">  Rarely</span><br>
        <input type="radio" name="lo10" value="Never"><span class="questionText">  Never</span><br>
      </form>
    </div>

    <div class="input-group" id="loneliness11" method="get">
      <span class="slideText">The following questions are concerning yourself:</span><br><br>
      <form id="lo11user" >
        <span class="slideText">How often do you feel left out?</span><br><br>
        <input type="radio" name="lo11" value="Always"><span class="questionText">  Always</span><br>
        <input type="radio" name="lo11" value="Sometimes"><span class="questionText">  Sometimes </span><br>
        <input type="radio" name="lo11" value="Rarely"><span class="questionText">  Rarely</span><br>
        <input type="radio" name="lo11" value="Never"><span class="questionText">  Never</span><br>
      </form>
      <form id="lo12user">
        <span class="slideText">How often do you feel that your relationships with others are not meaningful?</span><br><br>
        <input type="radio" name="lo12" value="Always"><span class="questionText">  Always</span><br>
        <input type="radio" name="lo12" value="Sometimes"><span class="questionText">  Sometimes </span><br>
        <input type="radio" name="lo12" value="Rarely"><span class="questionText">  Rarely</span><br>
        <input type="radio" name="lo12" value="Never"><span class="questionText">  Never</span><br>
      </form>
    </div>

    <div class="input-group" id="loneliness13" method="get">
      <span class="slideText">The following questions are concerning yourself:</span><br><br>
      <form id="lo13user" >
        <span class="slideText">How often do you feel that no one really knows you well?</span><br><br>
        <input type="radio" name="lo13" value="Always"><span class="questionText">  Always</span><br>
        <input type="radio" name="lo13" value="Sometimes"><span class="questionText">  Sometimes </span><br>
        <input type="radio" name="lo13" value="Rarely"><span class="questionText">  Rarely</span><br>
        <input type="radio" name="lo13" value="Never"><span class="questionText">  Never</span><br>
      </form>
      <form id="lo14user">
        <span class="slideText">How often do you feel isolated from others?</span><br><br>
        <input type="radio" name="lo14" value="Always"><span class="questionText">  Always</span><br>
        <input type="radio" name="lo14" value="Sometimes"><span class="questionText">  Sometimes </span><br>
        <input type="radio" name="lo14" value="Rarely"><span class="questionText">  Rarely</span><br>
        <input type="radio" name="lo14" value="Never"><span class="questionText">  Never</span><br>
      </form>
    </div>

    <div class="input-group" id="loneliness15" method="get">
      <span class="slideText">The following questions are concerning yourself:</span><br><br>
      <form id="lo15user" >
        <span class="slideText">How often do you feel that you can find companionship when you want it?</span><br><br>
        <input type="radio" name="lo15" value="Always"><span class="questionText">  Always</span><br>
        <input type="radio" name="lo15" value="Sometimes"><span class="questionText">  Sometimes </span><br>
        <input type="radio" name="lo15" value="Rarely"><span class="questionText">  Rarely</span><br>
        <input type="radio" name="lo15" value="Never"><span class="questionText">  Never</span><br>
      </form>
      <form id="lo16user">
        <span class="slideText">How often do you feel that there are people who really understand you?</span><br><br>
        <input type="radio" name="lo16" value="Always"><span class="questionText">  Always</span><br>
        <input type="radio" name="lo16" value="Sometimes"><span class="questionText">  Sometimes </span><br>
        <input type="radio" name="lo16" value="Rarely"><span class="questionText">  Rarely</span><br>
        <input type="radio" name="lo16" value="Never"><span class="questionText">  Never</span><br>
      </form>
    </div>

    <div class="input-group" id="loneliness17" method="get">
      <span class="slideText">The following questions are concerning yourself:</span><br><br>
      <form id="lo17user" >
        <span class="slideText">How often do you feel shy?</span><br><br>
        <input type="radio" name="lo17" value="Always"><span class="questionText">  Always</span><br>
        <input type="radio" name="lo17" value="Sometimes"><span class="questionText">  Sometimes </span><br>
        <input type="radio" name="lo17" value="Rarely"><span class="questionText">  Rarely</span><br>
        <input type="radio" name="lo17" value="Never"><span class="questionText">  Never</span><br>
      </form>
      <form id="lo18user">
        <span class="slideText">How often do you feel that people are around you but not with you?</span><br><br>
        <input type="radio" name="lo18" value="Always"><span class="questionText">  Always</span><br>
        <input type="radio" name="lo18" value="Sometimes"><span class="questionText">  Sometimes </span><br>
        <input type="radio" name="lo18" value="Rarely"><span class="questionText">  Rarely</span><br>
        <input type="radio" name="lo18" value="Never"><span class="questionText">  Never</span><br>
      </form>
    </div>

    <div class="input-group" id="loneliness19" method="get">
      <span class="slideText">The following questions are concerning yourself:</span><br><br>
      <form id="lo19user" >
        <span class="slideText">How often do you feel that there are people you can talk to?</span><br><br>
        <input type="radio" name="lo19" value="Always"><span class="questionText">  Always</span><br>
        <input type="radio" name="lo19" value="Sometimes"><span class="questionText">  Sometimes </span><br>
        <input type="radio" name="lo19" value="Rarely"><span class="questionText">  Rarely</span><br>
        <input type="radio" name="lo19" value="Never"><span class="questionText">  Never</span><br>
      </form>
      <form id="lo20user">
        <span class="slideText">How often do you feel that there are people you can turn to?</span><br><br>
        <input type="radio" name="lo20" value="Always"><span class="questionText">  Always</span><br>
        <input type="radio" name="lo20" value="Sometimes"><span class="questionText">  Sometimes </span><br>
        <input type="radio" name="lo20" value="Rarely"><span class="questionText">  Rarely</span><br>
        <input type="radio" name="lo20" value="Never"><span class="questionText">  Never</span><br>
      </form>
    </div>

    <div class="input-group" id="WBS1" method="get">
      <span class="slideText">Below are some statements about feelings and thoughts. Please tick the box that best describes your experience of each over the last 2 weeks.</span><br><br>
      <form id="WBS1user" >
        <span class="slideText">I’ve been feeling optimistic about the future. </span><br><br>
        <input type="radio" name="wb1" value="1"><span class="questionText">  None of the time</span><br>
        <input type="radio" name="wb1" value="2"><span class="questionText"> Rarely</span><br>
        <input type="radio" name="wb1" value="3"><span class="questionText">  Some of the time</span><br>
        <input type="radio" name="wb1" value="4"><span class="questionText"> Often </span><br>
        <input type="radio" name="wb1" value="5"><span class="questionText"> All of the time </span><br>
      </form>
      <form id="WBS2user">
        <span class="slideText">I've been feeling useful.</span><br><br>
        <input type="radio" name="wb2" value="1"><span class="questionText">  None of the time</span><br>
        <input type="radio" name="wb2" value="2"><span class="questionText"> Rarely</span><br>
        <input type="radio" name="wb2" value="3"><span class="questionText">  Some of the time</span><br>
        <input type="radio" name="wb2" value="4"><span class="questionText"> Often </span><br>
        <input type="radio" name="wb2" value="5"><span class="questionText"> All of the time </span><br>
      </form>
    </div>

    <div class="input-group" id="WBS3" method="get">
      <span class="slideText">Below are some statements about feelings and thoughts. Please tick the box that best describes your experience of each over the last 2 weeks.</span><br><br>
      <form id="WBS3user" >
        <span class="slideText">I’ve been feeling relaxed.</span><br><br>
        <input type="radio" name="wb3" value="1"><span class="questionText">  None of the time</span><br>
        <input type="radio" name="wb3" value="2"><span class="questionText"> Rarely</span><br>
        <input type="radio" name="wb3" value="3"><span class="questionText">  Some of the time</span><br>
        <input type="radio" name="wb3" value="4"><span class="questionText"> Often </span><br>
        <input type="radio" name="wb3" value="5"><span class="questionText"> All of the time </span><br>
      </form>
      <form id="WB42user">
        <span class="slideText">I've been feeling interested in other people.</span><br><br>
        <input type="radio" name="wb4" value="1"><span class="questionText">  None of the time</span><br>
        <input type="radio" name="wb4" value="2"><span class="questionText"> Rarely</span><br>
        <input type="radio" name="wb4" value="3"><span class="questionText">  Some of the time</span><br>
        <input type="radio" name="wb4" value="4"><span class="questionText"> Often </span><br>
        <input type="radio" name="wb4" value="5"><span class="questionText"> All of the time </span><br>
      </form>
    </div>

    <div class="input-group" id="WBS5" method="get">
      <span class="slideText">Below are some statements about feelings and thoughts. Please tick the box that best describes your experience of each over the last 2 weeks.</span><br><br>
      <form id="WBS5user" >
        <span class="slideText">I’ve had energy to spare.</span><br><br>
        <input type="radio" name="wb5" value="1"><span class="questionText">  None of the time</span><br>
        <input type="radio" name="wb5" value="2"><span class="questionText"> Rarely</span><br>
        <input type="radio" name="wb5" value="3"><span class="questionText">  Some of the time</span><br>
        <input type="radio" name="wb5" value="4"><span class="questionText"> Often </span><br>
        <input type="radio" name="wb5" value="5"><span class="questionText"> All of the time </span><br>
      </form>
      <form id="WBS6user">
        <span class="slideText">I've been dealing with problems well.</span><br><br>
        <input type="radio" name="wb6" value="1"><span class="questionText">  None of the time</span><br>
        <input type="radio" name="wb6" value="2"><span class="questionText"> Rarely</span><br>
        <input type="radio" name="wb6" value="3"><span class="questionText">  Some of the time</span><br>
        <input type="radio" name="wb6" value="4"><span class="questionText"> Often </span><br>
        <input type="radio" name="wb6" value="5"><span class="questionText"> All of the time </span><br>
      </form>
    </div>

    <div class="input-group" id="WBS7" method="get">
      <span class="slideText">Below are some statements about feelings and thoughts. Please tick the box that best describes your experience of each over the last 2 weeks.</span><br><br>
      <form id="WBS7user" >
        <span class="slideText">I’ve been thinking clearly.</span><br><br>
        <input type="radio" name="wb7" value="1"><span class="questionText">  None of the time</span><br>
        <input type="radio" name="wb7" value="2"><span class="questionText"> Rarely</span><br>
        <input type="radio" name="wb7" value="3"><span class="questionText">  Some of the time</span><br>
        <input type="radio" name="wb7" value="4"><span class="questionText"> Often </span><br>
        <input type="radio" name="wb7" value="5"><span class="questionText"> All of the time </span><br>
      </form>
      <form id="WBS8user">
        <span class="slideText">I've been feeling good about myself.</span><br><br>
        <input type="radio" name="wb8" value="1"><span class="questionText">  None of the time</span><br>
        <input type="radio" name="wb8" value="2"><span class="questionText"> Rarely</span><br>
        <input type="radio" name="wb8" value="3"><span class="questionText">  Some of the time</span><br>
        <input type="radio" name="wb8" value="4"><span class="questionText"> Often </span><br>
        <input type="radio" name="wb8" value="5"><span class="questionText"> All of the time </span><br>
      </form>
    </div>

    <div class="input-group" id="WBS9" method="get">
      <span class="slideText">Below are some statements about feelings and thoughts. Please tick the box that best describes your experience of each over the last 2 weeks.</span><br><br>
      <form id="WBS9user" >
        <span class="slideText">I’ve been feeling close to other people.</span><br><br>
        <input type="radio" name="wb9" value="1"><span class="questionText">  None of the time</span><br>
        <input type="radio" name="wb9" value="2"><span class="questionText"> Rarely</span><br>
        <input type="radio" name="wb9" value="3"><span class="questionText">  Some of the time</span><br>
        <input type="radio" name="wb9" value="4"><span class="questionText"> Often </span><br>
        <input type="radio" name="wb9" value="5"><span class="questionText"> All of the time </span><br>
      </form>
      <form id="WBS10user">
        <span class="slideText">I've been feeling confident.</span><br><br>
        <input type="radio" name="wb10" value="1"><span class="questionText">  None of the time</span><br>
        <input type="radio" name="wb10" value="2"><span class="questionText"> Rarely</span><br>
        <input type="radio" name="wb10" value="3"><span class="questionText">  Some of the time</span><br>
        <input type="radio" name="wb10" value="4"><span class="questionText"> Often </span><br>
        <input type="radio" name="wb10" value="5"><span class="questionText"> All of the time </span><br>
      </form>
    </div>

    <div class="input-group" id="WBS11" method="get">
      <span class="slideText">Below are some statements about feelings and thoughts. Please tick the box that best describes your experience of each over the last 2 weeks.</span><br><br>
      <form id="WBS11user" >
        <span class="slideText">I’ve been able to make my own mind up anout things.</span><br><br>
        <input type="radio" name="wb11" value="1"><span class="questionText">  None of the time</span><br>
        <input type="radio" name="wb11" value="2"><span class="questionText"> Rarely</span><br>
        <input type="radio" name="wb11" value="3"><span class="questionText">  Some of the time</span><br>
        <input type="radio" name="wb11" value="4"><span class="questionText"> Often </span><br>
        <input type="radio" name="wb11" value="5"><span class="questionText"> All of the time </span><br>
      </form>
      <form id="WBS12user">
        <span class="slideText">I've been feeling loved.</span><br><br>
        <input type="radio" name="wb12" value="1"><span class="questionText">  None of the time</span><br>
        <input type="radio" name="wb12" value="2"><span class="questionText"> Rarely</span><br>
        <input type="radio" name="wb12" value="3"><span class="questionText">  Some of the time</span><br>
        <input type="radio" name="wb12" value="4"><span class="questionText"> Often </span><br>
        <input type="radio" name="wb12" value="5"><span class="questionText"> All of the time </span><br>
      </form>
    </div>

    <div class="input-group" id="WBS13" method="get">
      <span class="slideText">Below are some statements about feelings and thoughts. Please tick the box that best describes your experience of each over the last 2 weeks.</span><br><br>
      <form id="WBS13user" >
        <span class="slideText">I’ve been interested in new things.</span><br><br>
        <input type="radio" name="wb13" value="1"><span class="questionText">  None of the time</span><br>
        <input type="radio" name="wb13" value="2"><span class="questionText"> Rarely</span><br>
        <input type="radio" name="wb13" value="3"><span class="questionText">  Some of the time</span><br>
        <input type="radio" name="wb13" value="4"><span class="questionText"> Often </span><br>
        <input type="radio" name="wb13" value="5"><span class="questionText"> All of the time </span><br>
      </form>
      <form id="WBS14user">
        <span class="slideText">I've been feeling cheerful.</span><br><br>
        <input type="radio" name="wb14" value="1"><span class="questionText">  None of the time</span><br>
        <input type="radio" name="wb14" value="2"><span class="questionText"> Rarely</span><br>
        <input type="radio" name="wb14" value="3"><span class="questionText">  Some of the time</span><br>
        <input type="radio" name="wb14" value="4"><span class="questionText"> Often </span><br>
        <input type="radio" name="wb14" value="5"><span class="questionText"> All of the time </span><br>
      </form>
    </div>

    <div class="input-group" id="HADS1" method="get">
      <span class="slideText">Click the circle beside the reply that is closest to how you have been feeling in the past week. Don’t take too long over you replies: your immediate is best.</span><br><br>
      <form id="had1user" >
        <span class="slideText">I feel tense or 'wound up'</span><br><br>
        <input type="radio" name="ha1" value="3"><span class="questionText">  Most of the time</span><br>
        <input type="radio" name="ha1" value="2"><span class="questionText">  A lot of the time</span><br>
        <input type="radio" name="ha1" value="1"><span class="questionText">  From time to time, occasionally</span><br>
        <input type="radio" name="ha1" value="0"><span class="questionText"> Not at all </span><br>
      </form>
      <form id="had2user">
        <span class="slideText">I still enjoy the things I used to enjoy.</span><br><br>
        <input type="radio" name="ha2" value="0"><span class="questionText">  Definitely as much</span><br>
        <input type="radio" name="ha2" value="1"><span class="questionText">  Not quite so much</span><br>
        <input type="radio" name="ha2" value="2"><span class="questionText">  Only a little</span><br>
        <input type="radio" name="ha2" value="3"><span class="questionText">  Hardly at all</span><br>
      </form>
    </div>

    <div class="input-group" id="HADS3" method="get">
      <span class="slideText">Click the circle beside the reply that is closest to how you have been feeling in the past week. Don’t take too long over you replies: your immediate is best.</span><br><br>
      <form id="had3user" >
        <span class="slideText">I get a sort of frightened feeling as if something awful is about to happen</span><br><br>
        <input type="radio" name="ha3" value="3"><span class="questionText">  Very definitely and quite badly</span><br>
        <input type="radio" name="ha3" value="2"><span class="questionText">  Yes, but not too badly</span><br>
        <input type="radio" name="ha3" value="1"><span class="questionText">  A little, but it doesn't worry me</span><br>
        <input type="radio" name="ha3" value="0"><span class="questionText"> Not at all </span><br>
      </form>
      <form id="had4user">
        <span class="slideText">I can laugh and see the funny side of things.</span><br><br>
        <input type="radio" name="ha4" value="0"><span class="questionText">  As much as I always could</span><br>
        <input type="radio" name="ha4" value="1"><span class="questionText">  Not quite so much now</span><br>
        <input type="radio" name="ha4" value="2"><span class="questionText">  Definitely not so much now</span><br>
        <input type="radio" name="ha4" value="3"><span class="questionText">  Not at all</span><br>
      </form>
    </div>

    <div class="input-group" id="HADS5" method="get">
      <span class="slideText">Click the circle beside the reply that is closest to how you have been feeling in the past week. Don’t take too long over you replies: your immediate is best.</span><br><br>
      <form id="had5user" >
        <span class="slideText">Worrying thoughts go through my mind</span><br><br>
        <input type="radio" name="ha5" value="3"><span class="questionText">  A great deal of the time</span><br>
        <input type="radio" name="ha5" value="2"><span class="questionText">  A lot of the time</span><br>
        <input type="radio" name="ha5" value="1"><span class="questionText">  From time to time, but not too often</span><br>
        <input type="radio" name="ha5" value="0"><span class="questionText">  Only occasionally</span><br>
      </form>
      <form id="had6user">
        <span class="slideText">I feel cheerful.</span><br><br>
        <input type="radio" name="ha6" value="3"><span class="questionText">  Not at all</span><br>
        <input type="radio" name="ha6" value="2"><span class="questionText">  Not often</span><br>
        <input type="radio" name="ha6" value="1"><span class="questionText">  Sometimes</span><br>
        <input type="radio" name="ha6" value="0"><span class="questionText">  Most of the time</span><br>
      </form>
    </div>

    <div class="input-group" id="HADS7" method="get">
      <span class="slideText">Click the circle beside the reply that is closest to how you have been feeling in the past week. Don’t take too long over you replies: your immediate is best.</span><br><br>
      <form id="had7user" >
        <span class="slideText">I can sit at ease and feel relaxed</span><br><br>
        <input type="radio" name="ha7" value="0"><span class="questionText">  Definitely</span><br>
        <input type="radio" name="ha7" value="1"><span class="questionText">  Usually</span><br>
        <input type="radio" name="ha7" value="2"><span class="questionText">  Not Often</span><br>
        <input type="radio" name="ha7" value="3"><span class="questionText">  Not at all</span><br>
      </form>
      <form id="had8user">
        <span class="slideText">I feel as if I am slowed down.</span><br><br>
        <input type="radio" name="ha8" value="3"><span class="questionText">  Nearly all the time</span><br>
        <input type="radio" name="ha8" value="2"><span class="questionText">  Very often</span><br>
        <input type="radio" name="ha8" value="1"><span class="questionText">  Sometimes</span><br>
        <input type="radio" name="ha8" value="0"><span class="questionText">  Not at all</span><br>
      </form>
    </div>

    <div class="input-group" id="HADS9" method="get">
      <span class="slideText">Click the circle beside the reply that is closest to how you have been feeling in the past week. Don’t take too long over you replies: your immediate is best.</span><br><br>
      <form id="had9user" >
        <span class="slideText">I get a sort of frightened feeling like 'butterflies' in the stomach</span><br><br>
        <input type="radio" name="ha9" value="0"><span class="questionText">  Not at all</span><br>
        <input type="radio" name="ha9" value="1"><span class="questionText">  Occasionally</span><br>
        <input type="radio" name="ha9" value="2"><span class="questionText">  Quite Often</span><br>
        <input type="radio" name="ha9" value="3"><span class="questionText">  Very Often</span><br>
      </form>
      <form id="had10user">
        <span class="slideText">I have lost interest in my appearance.</span><br><br>
        <input type="radio" name="ha10" value="3"><span class="questionText">  Definitely</span><br>
        <input type="radio" name="ha10" value="2"><span class="questionText">  I don't take as much care as I should</span><br>
        <input type="radio" name="ha10" value="1"><span class="questionText">  I may not take quite as much care</span><br>
        <input type="radio" name="ha10" value="0"><span class="questionText">  I take just as much care as ever</span><br>
      </form>
    </div>

    <div class="input-group" id="HADS11" method="get">
      <span class="slideText">Click the circle beside the reply that is closest to how you have been feeling in the past week. Don’t take too long over you replies: your immediate is best.</span><br><br>
      <form id="had11user" >
        <span class="slideText">I feel restless as I have to be on the move</span><br><br>
        <input type="radio" name="ha11" value="3"><span class="questionText">  Very much indeed</span><br>
        <input type="radio" name="ha11" value="2"><span class="questionText">  Quite a lot</span><br>
        <input type="radio" name="ha11" value="1"><span class="questionText">  Not very much</span><br>
        <input type="radio" name="ha11" value="0"><span class="questionText">  Not at all</span><br>
      </form>
      <form id="had12user">
        <span class="slideText">I look forward with enjoyment to things.</span><br><br>
        <input type="radio" name="ha12" value="0"><span class="questionText">  As much as I ever did</span><br>
        <input type="radio" name="ha12" value="1"><span class="questionText">  Rather less than I used to</span><br>
        <input type="radio" name="ha12" value="2"><span class="questionText">  Definitely less than I used to</span><br>
        <input type="radio" name="ha12" value="3"><span class="questionText">  Hardly at all</span><br>
      </form>
    </div>

    <div class="input-group" id="HADS13" method="get">
      <span class="slideText">Click the circle beside the reply that is closest to how you have been feeling in the past week. Don’t take too long over you replies: your immediate is best.</span><br><br>
      <form id="had13user" >
        <span class="slideText">I get sudden feelings of panic</span><br><br>
        <input type="radio" name="ha13" value="3"><span class="questionText">  Very often indeed</span><br>
        <input type="radio" name="ha13" value="2"><span class="questionText">  Quite often</span><br>
        <input type="radio" name="ha13" value="1"><span class="questionText">  Not very often</span><br>
        <input type="radio" name="ha13" value="0"><span class="questionText">  Not at all</span><br>
      </form>
      <form id="had14user">
        <span class="slideText">I can enjoy a good book or radio or TV program.</span><br><br>
        <input type="radio" name="ha14" value="0"><span class="questionText">  Often</span><br>
        <input type="radio" name="ha14" value="1"><span class="questionText">  Sometimes</span><br>
        <input type="radio" name="ha14" value="2"><span class="questionText">  Not often</span><br>
        <input type="radio" name="ha14" value="3"><span class="questionText">  Very seldom</span><br>
      </form>
    </div>


    <div class="input-group" id="bronnen" method="get" onsubmit="return false;">
      <form id="brnnn">
        <span class="slideText">When naming the 25 names: do all names come from “your memory”, or have you used a saved list of contacts (for example via your mobile phone, your email, or Facebook)?</span><br><br>
        <input type="radio" name="br" value="1"><span class="questionText">  All names come from memory, and I did not use a contact list.</span><br>
        <input type="radio" name="br" value="2"><span class="questionText">  I used my mobile phone</span><br>
        <input type="radio" name="br" value="3"><span class="questionText">  I used my email</span><br>
        <input type="radio" name="br" value="4"><span class="questionText">  I used Facebook</span><br>
        <input type="radio" id="brcheckText" name="br" value="5"><span class="questionText">  I used something else, namely:</span>
        <input type="text" id="brtextInput" name="br">
      </form>
    </div>

    <div class="input-group" id="opmerkingen" method="get" onsubmit="return false;">
      <form id="opmrkngn">
        <span class="slideText">Do you have any comments about the questionnaire? If you have entered something by mistake, you can also report it here..</span><br><br>
        <textarea rows="10" cols="50" id="opmtextArea" name="opm"></textarea>
      </form>
    </div>

    <div class="input-group" id="afsluiting" method="get">
      <form id="afsltng">
        <span class="slideText">Thank you for completing the questionnaire</span><br><br>
        <span class="slideText">Click on the "LISS" button to return to your personal page. PLEASE DO NOT FORGET THIS: only then will your answers be saved and your reimbursement of £5 added.</span><br><br>
        <span class="slideText">You can also make a comment about the questionnaire there. You can also comment there if you have entered something wrong by mistake or you wish to specify individuals in your network who identify as a gender other than male or female.</span><br><br>
      </form>
    </div>

    <div class="popop_box" id="nonresponse_box">
      <div class="popup_box" id="popup">
            <p class="popup_text">You have not yet fully answered the question! It would be nice for the research if you answer the question completely. If you do want to go to the next question, you can click "Continue" again.</p>
            <button class="btn btn-default" onclick="closePopup()">Close</button>
      </div>
    </div>

    <div class="popop_box" id="onlyone_box">
      <div class="popup_box" id="onlyOnePopup">
            <p class="popup_text">Enter a name.</p>
            <button class="btn btn-default" onclick="closeOnlyOnePopup()">Close</button>
      </div>
    </div>

    <div class="popop_box" id="fewAlters_box">
      <div class="popup_box" id="alterPopup">
            <p class="popup_text">Have you finished listing people? Please also list anyone who is especially close to you who you have not yet listed and may not have been in contact with in the last month, before proceeding to the next question. If you can no longer come up with names, you can continue with the questionnaire, simply close this prompt and press 'continue' once more.</p>
            <button class="btn btn-default" onclick="closeAlterPopup()">Close</button>
      </div>
    </div>

    <div class="popop_box" id="reminderAlters_box">
      <div class="popup_box" id="reminderPopup">
            <p class="popup_text">If you have trouble naming names, you may be able to consult your contact book from your phone, or your email, or via Facebook or a similar website.</p>
            <button class="btn btn-default" onclick="closeReminderPopup()">Close</button>
      </div>
    </div>

    <div class="popop_box" id="fewDragged_box">
      <div class="popup_box" id="dragPopup">
            <p class="popup_text">You have not answered this question for every person in your network. It would very helpful for our research if you did. Please feel free to either give an answer or to go to the next question by clicking ‘Next’ again.”.</p>
            <button class="btn btn-default" onclick="closeDragPopup()">Close</button>
      </div>
    </div>

    <div id="NextDiv">
      <input type="button"
        class="btn btn-default"
        value="Continue"
        id="Next"
        onclick="showNext();pauseShowNext();" />
    </div>

    <div id="submitForm">
      <form method="POST" action="<?php echo $_POST['returnpage']; ?>">
        <input type="hidden" name="nomem" value="<?php echo $_POST['nomem']; ?>">
        <input type="hidden" name="sh" value="<?php echo $_POST['sh']; ?>">
        <input type="hidden" name="lsi" value="<?php echo $_POST['lsi']; ?>">
        <input type="hidden" name="pli" value="<?php echo $_POST['pli']; ?>">
        <input type="hidden" name="spi" value="<?php echo $_POST['spi']; ?>">
        <input type="hidden" name="aqi" value="<?php echo $_POST['aqi']; ?>">
        <input type="hidden" name="cqi" value="<?php echo $_POST['cqi']; ?>">
        <input type="hidden" name="<?php echo $_POST['varname1']; ?>" value=""> <!-- Value leeg laten. -->
        <input type="hidden" name="<?php echo $_POST['statusvarname1']; ?>" value="<?php echo $_POST['statusvarvalue1']; ?>">

        <input type="submit" name="<?php echo $_POST['nextvarname']; ?>" value="LISS" class="btn btn-default" /><!-- Value kan ook Volgende zijn, net wat past in jouw vragenlijst. -->
      </form>
    </div>

    <script type="text/javascript">
        $("#Next").css("left",window.innerWidth * .8);
        $("#submitButton").css("left",window.innerWidth * .8);
    </script>
  </body>
</html>
