<?php

$characters_lc = array();
$characters_uc = array();

// Russian uppercase characters
$characters_lc['​a'] = "a";
$characters_lc['​б'] = "be";
$characters_lc['​в'] = "we";
$characters_lc['​г'] = "ge";
$characters_lc['​д'] = "de";
$characters_lc['​е'] = "je";
$characters_lc['​ё'] = "jo";
$characters_lc['​ж'] = "sche";
$characters_lc['​з'] = "se";
$characters_lc['​и'] = "i";
$characters_lc['​й'] = "j";
$characters_lc['​к'] = "ka";
$characters_lc['​л'] = "el";
$characters_lc['​м'] = "em";
$characters_lc['​н'] = "en";
$characters_lc['о'] = "o";
$characters_lc['​п'] = "pe";
$characters_lc['​р'] = "er";
$characters_lc['​с'] = "ess";
$characters_lc['​т'] = "te";
$characters_lc['​у'] = "u";
$characters_lc['ф'] = "ef";
$characters_lc['​х'] = "kh";
$characters_lc['​ц'] = "tse";
$characters_lc['​ч'] = "tscha";
$characters_lc['​ш'] = "scha";
$characters_lc['​щ'] = "schtscha";
#$characters_lc['​ъ'] = "-";
$characters_lc['​ы'] = "y";
#$characters_lc['​ь'] = "weichheitszeichen";
$characters_lc['​э'] = "ae";
$characters_lc['​ю'] = "ju";
$characters_lc['​я'] = "ja";

// Russian lowercase characters
$characters_uc['А'] = 'a';
$characters_uc['​Б'] = 'be';
$characters_uc['​В'] = 'we';
$characters_uc['​​Г'] = 'ge';
$characters_uc['​Д'] = 'de';
$characters_uc['Е'] = 'je';
$characters_uc['​Ё'] = 'jo';
$characters_uc['​Ж'] = 'sche';
$characters_uc['​З'] = '​se';
$characters_uc['​И'] = 'i';
$characters_uc['​Й'] = 'j';
$characters_uc['​К'] = 'ka';
$characters_uc['​Л'] = 'el';
$characters_uc['​М'] = 'em';
$characters_uc['​Н'] = 'en';
$characters_uc['О'] = 'o';
$characters_uc['​П'] = 'pe';
$characters_uc['​Р'] = 'er';
$characters_uc['​С'] = 'ess';
$characters_uc['Т'] = 'te';
$characters_uc['​У'] = 'u';
$characters_uc['Ф'] = 'ef';
$characters_uc['​Х'] = 'kh';
$characters_uc['​Ц'] = 'tse';
$characters_uc['​Ч'] = 'tscha';
$characters_uc['​Ш'] = 'scha';
$characters_uc['​Щ'] = 'schtscha';
#$characters_uc['​ъ'] = '-';
$characters_uc['ы'] = 'y';
#$characters_uc['​ь'] = 'weichheitszeichen';
$characters_uc['​Э'] = 'ae';
$characters_uc['​Ю'] = 'ju';
$characters_uc['Я'] = 'ja';

$gif_stack = array();
$gif_stack[] = "https://i.giphy.com/media/UxNCd08uBaFBC/giphy.webp";
$gif_stack[] = "https://i.giphy.com/media/8qpvl5lcmht1S/giphy.webp";
$gif_stack[] = "https://i.giphy.com/media/ewHXPjWTYkNngQ67Ia/giphy.webp";
$gif_stack[] = "https://i.giphy.com/media/TIyJGNK325XGciFEnI/giphy.webp";
$gif_stack[] = "https://i.giphy.com/media/S2CrRkUfDi7EQ/giphy.webp";
$gif_stack[] = "https://i.giphy.com/media/F3kD16iiCU1Wg/giphy.webp";
$gif_stack[] = "https://i.giphy.com/media/xFoV6W4tpQfqj9IV6E/giphy.webp";
$gif_stack[] = "https://i.giphy.com/media/P0RWkdsRpK7ss/giphy.webp";
$gif_stack[] = "https://i.giphy.com/media/qmdXBUg1qxbP2/giphy.webp";
$gif_stack[] = "https://i.giphy.com/media/VZvYbdVZq5Lry/giphy.webp";
$gif_stack[] = "https://media4.giphy.com/media/JwhwA8aWI64O4/giphy.gif";
$gif_stack[] = "https://i.giphy.com/media/xiN0KVg1yJd8Ln1OO8/giphy.webp";

$answers_color[0] = "white";
$answers_color[1] = "white";
$answers_color[2] = "white";

$next_button = "";
$putin_image = "";

// Choose random character
$char = null;

$points = 0;

if(isset($_COOKIE['points']) == false) {
	setcookie("points", base64_encode(0));
	echo "Punkte: 0";
}else{
	$points = base64_decode($_COOKIE['points']);
	echo "Punkte: " . $points;
}

if(isset($_POST['answer']) == true && isset($_POST['question']) == true) {
	$char = $_POST['question'];
	$answers[0] = $_POST['answer_1'];
	$answers[1] = $_POST['answer_2'];
	$answers[2] = $_POST['answer_3'];
	
	$marker_color = "#fc7c7c";
	
	// color the right element depending on the answer
	
	if($characters_lc[$char] == $_POST['answer'] || $characters_uc[$char] == $_POST['answer']) {
		$marker_color = "#93fc7c";
	}
	
	foreach($answers as $key => $answer) {
		if($characters_lc[$char] == $answer || $characters_uc[$char] == $answer) {
			$answers_color[$key] = $marker_color;
		}
	}
	
	if($marker_color == "#93fc7c") {
		$points++;
		
		$putin_image = "
		<br>
		<br>
		<img src='" . $gif_stack[array_rand($gif_stack, 1)] . "'></img>";
	}else{
		$points--;
	}
	
	echo "<script>document.cookie='points=" . base64_encode($points) . "';</script>";
	
	$next_button = "
	<script>
	function next_question() {
		window.location = './play.php';
	}
	
	document.querySelectorAll('.answer_button').forEach(button => {
		button.setAttribute('disabled', 'disabled');
	});
	</script>
	
	<button id='next_button' onclick='next_question();'>Weiter</button>";
}else{
	if(random_int(1, 2) == 1) {
		$char = array_rand($characters_lc, 1);
		$answers[0] = $characters_lc[$char];
	}else{
		$char = array_rand($characters_uc, 1);
		$answers[0] = $characters_uc[$char];
	}

	// Set and randomize answers

	$answers[1] = $characters_uc[array_rand($characters_uc, 1)];
	$answers[2] = $characters_lc[array_rand($characters_lc, 1)];

	shuffle($answers);
}

// On-Page Stylesheet

echo "
<style>

@import url('./media/fonts/roboto_mono.css');

* {
    font-family: 'Roboto Mono', monospace;
}

#question {

}

#question_character {
	font-size: 2vw;
}

.answer_button {
	border: 1px solid black;
	background-color: white;
	font-size: 2vw;
	margin-top: 6%;
	margin-left: 1%;
	margin-right: 1%;
}

#next_button {
	border: 1px solid black;
	background-color: white;
	font-size: 2vw;
	margin-top: 6%;
	margin-left: 1%;
	margin-right: 1%;
}

#spacer {
	padding-top 55%;
}

#author_info {
	position: fixed;
	bottom: 0.5%;
	right: 0.5%;
}

</style>
";

echo "
<meta charset='utf-8'>

<title>Alfavit - Russisches Alphabet lernen</title>

<body>
	<center>
		<h1>Russisches Alphabet lernen</h1>
		
		<br>
		<div id='spacer'></div>
		
		<text id='question'>Wie wird <text id='question_character'>" . $char . "</text> ausgesprochen?</text>
		
		<br>
		
		<form method='POST'>
			<button class='answer_button' name='answer' value='" . $answers[0] . "' style='background-color: " . $answers_color[0] . ";'>" . $answers[0] . "</button>
			<button class='answer_button' name='answer' value='" . $answers[1] . "' style='background-color: " . $answers_color[1] . ";'>" . $answers[1] . "</button>
			<button class='answer_button' name='answer' value='" . $answers[2] . "' style='background-color: " . $answers_color[2] . ";'>" . $answers[2] . "</button>
			
			<input type='hidden' name='question' value='" . $char . "' />
			<input type='hidden' name='answer_1' value='" . $answers[0] . "' />
			<input type='hidden' name='answer_2' value='" . $answers[1] . "' />
			<input type='hidden' name='answer_3' value='" . $answers[2] . "' />
		</form>
		
		<text id='author_info'>Made with ❤ by LxonWWW</text>
		
		" . $next_button . "
		" . $putin_image . "
	</center>
</body>";

?>