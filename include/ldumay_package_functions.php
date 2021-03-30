<?php
	/*!
	 * PHP
	 * Edited by Loïc DUMAY alias Mectrankil78
	 */

	/* = = [ Packages Functions ] = = */

		/* = = [ Informations Systèmes ] = = */
		function versions($nbType){
			switch($nbType) {
				case 1:
					// Version Du Pack Web
					$version = '2.0.0.6';
					break;
				case 2:
					// Version du CV & LM
					$version = '2.0';
					break;
				default:
					$version = 'Erreur dans le type';
					break;
			}
			return $version;
		}
		/* = = [ Informations Personnelles ] = = */
		function title(){
			$title = 'LDumay.io | Loïc Dumay';
			return $title;
		}
		function footer(){
			$title = title();
			$anneeActuel = date('Y');
			$footer = '© Copyright 2017-'.$anneeActuel.' - '.$title;
			return $footer;
		}
		function copyrightProject($date_start_project, $title_project){
			$anneeActuel = date('Y');
			$footer = '© Copyright '.$date_start_project.'-'.$anneeActuel.' - '.$title_project;
			return $footer;
		}
		function monAge(){
			$age = '22/10/1993';
			return $age;
		}
		/* = = [ Mini Functions ] = = */
		function upAncor($MobileAndTablet){
			if($MobileAndTablet==true){
				echo '<br /><br /><br />';
			}
			else{
				echo '<br /><br />';
			}
		}
		function mobileSautDeLigne($MobileAndTablet){
			if($MobileAndTablet==true){
				$up = '<br />';
			}
			else{
				$up = '';
			}
			return $up;
		}
		function PaireOuImpaire($value){
			if ($value % 2 == 1) {
				$message = "impair";
			}
			elseif ($value % 2 == 0) {
				$message = "pair";
			}
			return $message;
		}
		function tabulationHTML($nombre){
			$x = 0;
			while($x<$nombre){
				echo '&nbsp';
				$x++;
			}
		}
		/* = = [ Vérification de données ] = = */
		function verifSkillsLevel($value){
			if($value<=20)
				$value = '20';
			return $value;
		}
		/* = = [ Vérification de la platforme ] = = */
		function getplatform(){
			// Appel du plugin "Mobile_Detect"
			include('includes/Mobile_Detect.php');
			$detect = new Mobile_Detect;
			// Repérage de la plateform
			if( $detect->isTablet() ){
				$MobileSupport = 'Tablet';
			}
			else if( $detect->isMobile() ){
				$MobileSupport = 'Mobile';
			}
			else{
				$MobileSupport = '';
			}
			return $MobileSupport;
		}
		/* = = [ Vérification des données de connxeion ] = = */
		function verifConnect(){
			if($_SESSION['user_statut']=='connecter'){}
				// header('Location: admin-mtl-connexion.php');
			else{
				$_SESSION['user_login']=='';
				$_SESSION['user_mdp']=='';
			}
		}
		/* = = [ Génération de text ] = = */
		function textGenerate($numberLine,$numberColumn){
			/* Max Line 21 & Max Column 6 */
			$x = 1;
			$y = 1;
			$text = '';
			$text_br_1 = '<br />';
			$text_br_2 = '<br /><br />';
			$textLine = '';
			$textColumn = '';
			if(empty($numberLine))
				$numberLine = 1;
			if(empty($numberColumn))
				$numberColumn = 1;
			while($x<=$numberLine){
				if($x==1)
					$textLine .= 'Some default panel content here. Nulla vitae elit libero, a pharetra augue. Aenean lacinia bibendum nulla sed consectetur. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Nullam id dolor id nibh ultricies vehicula ut id elit. Inediae dispelleret metum, quae per multas difficilisque causas adfore.';
				if($x==2)
					$textLine .= $text_br_1.'Huic Arabia est conserta, ex alio latere Nabataeis contigua; opima varietate conmerciorum castrisque oppleta validis et castellis, quae ad repellendos gentium vicinarum excursus sollicitudo pervigil veterum per oportunos saltus erexit et cautos. haec quoque civitates habet inter oppida quaedam ingentes Bostram et Gerasam atque Philadelphiam murorum firmitate cautissimas. hanc provinciae inposito nomine rectoreque adtributo obtemperare legibus nostris Traianus conpulit imperator incolarum tumore saepe contunso cum glorioso marte Mediam urgeret et Parthos.';
				if($x==3)
					$textLine .= $text_br_1.'Post haec Gallus Hierapolim profecturus ut expeditioni specie tenus adesset, Antiochensi plebi suppliciter obsecranti ut inediae dispelleret metum, quae per multas difficilisque causas adfore iam sperabatur, non ut mos est principibus, quorum diffusa potestas localibus subinde medetur aerumnis, disponi quicquam statuit vel ex provinciis alimenta transferri conterminis, sed consularem Syriae Theophilum prope adstantem ultima metuenti multitudini dedit id adsidue replicando quod invito rectore nullus egere poterit victu.';
				if($x==4)
					$textLine .= $text_br_1.'Quod si rectum statuerimus vel concedere amicis, quidquid velint, vel impetrare ab iis, quidquid velimus, perfecta quidem sapientia si simus, nihil habeat res vitii; sed loquimur de iis amicis qui ante oculos sunt, quos vidimus aut de quibus memoriam accepimus, quos novit vita communis. Ex hoc numero nobis exempla sumenda sunt, et eorum quidem maxime qui ad sapientiam proxime accedunt.';
				if($x==5)
					$textLine .= $text_br_1.'Latius iam disseminata licentia onerosus bonis omnibus Caesar nullum post haec adhibens modum orientis latera cuncta vexabat nec honoratis parcens nec urbium primatibus nec plebeiis.';
				if($x==6)
					$textLine .= $text_br_1.'Cum haec taliaque sollicitas eius aures everberarent expositas semper eius modi rumoribus et patentes, varia animo tum miscente consilia, tandem id ut optimum factu elegit: et Vrsicinum primum ad se venire summo cum honore mandavit ea specie ut pro rerum tunc urgentium captu disponeretur concordi consilio, quibus virium incrementis Parthicarum gentium a arma minantium impetus frangerentur.';
				if($x==7)
					$textLine .= $text_br_1.'Illud tamen clausos vehementer angebat quod captis navigiis, quae frumenta vehebant per flumen, Isauri quidem alimentorum copiis adfluebant, ipsi vero solitarum rerum cibos iam consumendo inediae propinquantis aerumnas exitialis horrebant.';
				if($x==8)
					$textLine .= $text_br_1.'Nec minus feminae quoque calamitatum participes fuere similium. nam ex hoc quoque sexu peremptae sunt originis altae conplures, adulteriorum flagitiis obnoxiae vel stuprorum. inter quas notiores fuere Claritas et Flaviana, quarum altera cum duceretur ad mortem, indumento, quo vestita erat, abrepto, ne velemen quidem secreto membrorum sufficiens retinere permissa est. ideoque carnifex nefas admisisse convictus inmane, vivus exustus est.';
				if($x==9)
					$textLine .= $text_br_1.'Constituendi autem sunt qui sint in amicitia fines et quasi termini diligendi. De quibus tres video sententias ferri, quarum nullam probo, unam, ut eodem modo erga amicum adfecti simus, quo erga nosmet ipsos, alteram, ut nostra in amicos benevolentia illorum erga nos benevolentiae pariter aequaliterque respondeat, tertiam, ut, quanti quisque se ipse facit, tanti fiat ab amicis.';
				if($x==10)
					$textLine .= $text_br_1.'Illud tamen clausos vehementer angebat quod captis navigiis, quae frumenta vehebant per flumen, Isauri quidem alimentorum copiis adfluebant, ipsi vero solitarum rerum cibos iam consumendo inediae propinquantis aerumnas exitialis horrebant.';
				if($x==11)
					$textLine .= $text_br_1.'Paphius quin etiam et Cornelius senatores, ambo venenorum artibus pravis se polluisse confessi, eodem pronuntiante Maximino sunt interfecti. pari sorte etiam procurator monetae extinctus est. Sericum enim et Asbolium supra dictos, quoniam cum hortaretur passim nominare, quos vellent, adiecta religione firmarat, nullum igni vel ferro se puniri iussurum, plumbi validis ictibus interemit. et post hoe flammis Campensem aruspicem dedit, in negotio eius nullo sacramento constrictus.';
				if($x==12)
					$textLine .= $text_br_1.'Sed maximum est in amicitia parem esse inferiori. Saepe enim excellentiae quaedam sunt, qualis erat Scipionis in nostro, ut ita dicam, grege. Numquam se ille Philo, numquam Rupilio, numquam Mummio anteposuit, numquam inferioris ordinis amicis, Q. vero Maximum fratrem, egregium virum omnino, sibi nequaquam parem, quod is anteibat aetate, tamquam superiorem colebat suosque omnes per se posse esse ampliores volebat.';
				if($x==13)
					$textLine .= $text_br_1.'Hac ex causa conlaticia stipe Valerius humatur ille Publicola et subsidiis amicorum mariti inops cum liberis uxor alitur Reguli et dotatur ex aerario filia Scipionis, cum nobilitas florem adultae virginis diuturnum absentia pauperis erubesceret patris.';
				if($x==14)
					$textLine .= $text_br_1.'Et olim licet otiosae sint tribus pacataeque centuriae et nulla suffragiorum certamina set Pompiliani redierit securitas temporis, per omnes tamen quotquot sunt partes terrarum, ut domina suscipitur et regina et ubique patrum reverenda cum auctoritate canities populique Romani nomen circumspectum et verecundum.';
				if($x==15)
					$textLine .= $text_br_1.'Accedat huc suavitas quaedam oportet sermonum atque morum, haudquaquam mediocre condimentum amicitiae. Tristitia autem et in omni re severitas habet illa quidem gravitatem, sed amicitia remissior esse debet et liberior et dulcior et ad omnem comitatem facilitatemque proclivior.';
				if($x==16)
					$textLine .= $text_br_1.'Omitto iuris dictionem in libera civitate contra leges senatusque consulta; caedes relinquo; libidines praetereo, quarum acerbissimum extat indicium et ad insignem memoriam turpitudinis et paene ad iustum odium imperii nostri, quod constat nobilissimas virgines se in puteos abiecisse et morte voluntaria necessariam turpitudinem depulisse. Nec haec idcirco omitto, quod non gravissima sint, sed quia nunc sine teste dico.';
				if($x==17)
					$textLine .= $text_br_1.'Oportunum est, ut arbitror, explanare nunc causam, quae ad exitium praecipitem Aginatium inpulit iam inde a priscis maioribus nobilem, ut locuta est pertinacior fama. nec enim super hoc ulla documentorum rata est fides.';
				if($x==18)
					$textLine .= $text_br_1.'Et quia Mesopotamiae tractus omnes crebro inquietari sueti praetenturis et stationibus servabantur agrariis, laevorsum flexo itinere Osdroenae subsederat extimas partes, novum parumque aliquando temptatum commentum adgressus. quod si impetrasset, fulminis modo cuncta vastarat. erat autem quod cogitabat huius modi.';
				if($x==19)
					$textLine .= $text_br_1.'Haec subinde Constantius audiens et quaedam referente Thalassio doctus, quem eum odisse iam conpererat lege communi, scribens ad Caesarem blandius adiumenta paulatim illi subtraxit, sollicitari se simulans ne, uti est militare otium fere tumultuosum, in eius perniciem conspiraret, solisque scholis iussit esse contentum palatinis et protectorum cum Scutariis et Gentilibus, et mandabat Domitiano, ex comite largitionum, praefecto ut cum in Syriam venerit, Gallum, quem crebro acciverat, ad Italiam properare blande hortaretur et verecunde.';
				if($x==20)
					$textLine .= $text_br_1.'Nihil est enim virtute amabilius, nihil quod magis adliciat ad diligendum, quippe cum propter virtutem et probitatem etiam eos, quos numquam vidimus, quodam modo diligamus. Quis est qui C. Fabrici, M\'. Curi non cum caritate aliqua benevola memoriam usurpet, quos numquam viderit? quis autem est, qui Tarquinium Superbum, qui Sp. Cassium, Sp. Maelium non oderit? Cum duobus ducibus de imperio in Italia est decertatum, Pyrrho et Hannibale; ab altero propter probitatem eius non nimis alienos animos habemus, alterum propter crudelitatem semper haec civitas oderit.';
				if($x==21)
					$textLine .= $text_br_1.'Siquis enim militarium vel honoratorum aut nobilis inter suos rumore tenus esset insimulatus fovisse partes hostiles, iniecto onere catenarum in modum beluae trahebatur et inimico urgente vel nullo, quasi sufficiente hoc solo, quod nominatus esset aut delatus aut postulatus, capite vel multatione bonorum aut insulari solitudine damnabatur.';
				$x++;
			}
			while($y<=$numberColumn) {
				if($y==1)
					$textColumn .= $textLine;
				if($y==2)
					$textColumn .= $text_br_2.$textLine;
				if($y==3)
					$textColumn .= $text_br_2.$textLine;
				if($y==4)
					$textColumn .= $text_br_2.$textLine;
				if($y==5)
					$textColumn .= $text_br_2.$textLine;
				if($y==6)
					$textColumn .= $text_br_2.$textLine;
				$y++;
			}
			$text = $textColumn.$text_br_2.'<i style="color:orange;">Texte de présentation. Merci de ne pas en tenir compte.</i>';
			echo $text;
		}
		/* = = [ Inversion d'une chaine de caractère ] = = */
		function inverseCaractere($text){
			$text = strrev($text);
			return $text;
		}
		/* = = [ Loader ] = = */
		function phpLoader($loaderID,$type,$id){
			/* Données :
			 * $loaderID => id du loader
			 * $type => type du loader (seulement 2)
			 * $id => modèle du loader
			 */
			$bg_type = '';
			if($type==1){
				$bg_type = 'transparent';
			}
			elseif($type==2){
				$bg_type = 'white';
			}
			echo '<div id="'.$loaderID.'_Loader" class="well textCenter">
				<img id="Loader_img" src="../img/loader/bg_'.$bg_type.'/loader_'.$id.'.gif"/>
				<p>Chargement en cours ...</p>
			</div>';
		}
		/* = = [ Récupération de l'IP Client ] = = */
		function getIP() {
			$ip = '';
			// IP si internet partagé
			if (isset($_SERVER['HTTP_CLIENT_IP'])) {
				$ip = $_SERVER['HTTP_CLIENT_IP'];
			}
			// IP derrière un proxy
			elseif (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
				$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
			}
			// Sinon : IP normale
			else {
				if (isset($_SERVER['REMOTE_ADDR'])) {
					$ip = $_SERVER['REMOTE_ADDR'];
				}
				else{
					$ip = '';
				}
			}
			// IP Local si $ip = ::1
			if($ip=='::1'){
				$ip = '<i>Adresse Local</i>';
			}
			return $ip;
		}
		/* = = [ Vérificaiton de l'IP avant affichage ] = = */
		function verifIP($ip){
			$text = '';
			if( ($ip=='NULL') || ($ip=='')){
				$text = '<i style="color:orange;">Aucune IP auparavant.</i>';
			}
			else{
				$text = $ip;
			}
			return $text;
		}
		/* = = [ Vérification de mon IP ] = = */
		function myIP($ipEnter,$myIPActuel){
			if($ipEnter==$myIPActuel)
				$myIP = '<strong>Moi - '.$myIPActuel.'</strong>';
			else{
				$myIP = $ipEnter;
			}
			return $myIP;
		}
		/**/
		function verifPercentLvl($percent){
			$message = '';
			if($percent<=30){
				$message = '<i>En apprentissage</i>';
			}
			elseif($percent<=40){
				$message = '<i>Bonnes bases</i>';
			}
			elseif($percent<=65){
				$message = '<i>Bon</i>';
			}
			elseif($percent<=90){
				$message = '<i>Pro</i>';
			}
			return $message;
		}
		/* = = [ Conversion de date ] = = */
		function dateFormat($type,$date){
			// Exemple de type : d/m/Y
			$date = date_create($date);
			$date = date_format($date, $type);
			// $date = date($type, strtotime($date));
			return $date;
			// Si dateFormat retourne "-0001" en Y
			// 		-> vérifier la date dans entrée ou directement dans la BDD
		}
		/* = = [ Date du jour ] = = */
		function ToDay($type){
			// Exemple de type : d/m/Y
			$date = date_create();
			$date = date_format($date, $type);
			return $date;
		}
		/* = = = [ Formatage de l'année et du mois pour SQL ] = = = */
		function monthFormat($month,$year){
			if( (empty($month)) || (empty($year)) )
				return 'Error : Lost value !';
			else{
				$monthFormat = $year.'-'.$month;
				return $monthFormat;
			}
		}
		/* = = = [ Transformation d'un mois en Chaîne vers un Entier ] = = */
		function afficheMonthNumber($numberMonth){
			if($numberMonth==0){
				$numberMonth = 12;
			}
			switch ($numberMonth) {
				case 1: $monthSelect = "Janvier"; break;
				case 2: $monthSelect = "Février"; break;
				case 3: $monthSelect = "Mars"; break;
				case 4: $monthSelect = "Avril"; break;
				case 5: $monthSelect = "Mai"; break;
				case 6: $monthSelect = "Juin"; break;
				case 7: $monthSelect = "Juillet"; break;
				case 8: $monthSelect = "Août"; break;
				case 9: $monthSelect = "Septembre"; break;
				case 10: $monthSelect = "Octobre"; break;
				case 11: $monthSelect = "Novembre"; break;
				case 12: $monthSelect = "Décembre"; break;
				default: $monthSelect = "Error : The data used isn't a integer !"; break;
			}
			return $monthSelect;
		}
		/* = = = [ Transformation d'un mois en Entier vers un Chaîne ] = = */
		function afficheMonthString($stringMonth){
			switch ($stringMonth) {
				case "Janvier": $monthSelect = 1; break;
				case "Février": $monthSelect = 2; break;
				case "Mars": $monthSelect = 3; break;
				case "Avril": $monthSelect = 4; break;
				case "Mai": $monthSelect = 5; break;
				case "Juin": $monthSelect = 6; break;
				case "Juillet": $monthSelect = 7; break;
				case "Août": $monthSelect = 8; break;
				case "Septembre": $monthSelect = 9; break;
				case "Octobre": $monthSelect = 10; break;
				case "Novembre": $monthSelect = 11; break;
				case "Décembre": $monthSelect = 12; break;
				default: $monthSelect = "Error : The data used isn't a string !"; break;
			}
			return $monthSelect;
		}
		/* = = = [ Conversion d'un mois en Entier ou en Chaîne ] = = = */
		function monthConversion($month){
			$monthType = gettype($month);
			if( ($monthType=='int') || ($monthType=='integer'))
				$monthConversion = afficheMonthNumber($month);
			else if($monthType=='string')
				$monthConversion = afficheMonthString($month);
			else
				$monthConversion = 'Error : The data used isn\'t a string or a integer !';
			return $monthConversion;
		}
		/* = = = [ Calcul d'une année Bissextile] = = = */
		function anneeBissextile($annee) {
			if( (($annee & 3) == 0) && (($annee % 100 != 0) || ($annee % 400 == 0)) )
				return 29;
			else
				return 28;
		}
		/* = = = [Recherche du nombre de jour dans un mois] = = = */
		function numberMonthSearch($month){
			// 31jours : Janvier | Mars | Mai | Juillet | Août | Octobre | Décembre
			// 30jours : Avril | Juin | Septembre | Novembre
			// 28-29jours : Février
			if( ($month==1) || ($month==3) || ($month==5) || ($month==7) || ($month==8) || ($month==12) )
				$nbJourParMois = 31;
			else if( ($month==4) || ($month==6) || ($month==9) || ($month==10) )
				$nbJourParMois = 30;
			else if( $month==2 ) {
				$anneeDuJour = ToDay('Y');
				$nbJourParMois  = anneeBissextile($anneeDuJour);
			}
			else
				$nbJourParMois = 'Error in numbreMonthSearch Function !';
			return $nbJourParMois;
		}
		/* = = [ Calcule de l'âge ] = = */
		function getAge($dateOfBirth) {
			/**
			 * Méthode permettant de calculer l'âge en PHP
			 * à partir d'une date au format JJ/MM/AAAA (à la française)
			 */
			// On split la date de naissance au caractère "/"
			$segments = explode('/', $dateOfBirth);

			// On calcule le timestamp UNIX correspondant à cette date
			$timestampDoB = strtotime($segments[2]."-".$segments[1]."-".$segments[0]);

			// On calcule le nombre de secondes se sont écoulées entre
			// ce timestamp et maintenant
			$deltaSec = time() - $timestampDoB;

			// Combien de secondes y a-t-il dans une année ? Réponse ci-dessous...
			// (d'après Google...)
			$secPerYear = 31556926;

			// On fait un peu de maths...
			return floor($deltaSec / $secPerYear);
		}
		// - - [ Limiteur de caractères pour de petites description ] - - //
		function descLimit($lg_max,$text){
			// $lg_max - Limite maximal de caractères par paragraphe pour un text de support.
			$text = substr($text, 0, $lg_max) ;
			$last_space = strrpos($text, " ") ;
			$text= substr($text, 0, $last_space)." ..." ;
			return $text;
		}
		// - - [ Créer un court paragraphe de présentation ] - - //
		function shortPresentationParagraph($text,$limitNumberWordSelected,$showTotalWord){
			// Paramètres :
			// - un paragraphe
			// - un nombre limite de mots dans le paragraphe

			// Calcule du nombre de mots dans une chaîne de caractère
	            $wordNumberText = str_word_count($text);
	            //-debug- echo '$wordNumberText = '.$wordNumberText.'<br>---<br>';

			// Vérification de la limite de mot choisie
			if($limitNumberWordSelected<=1){
				$wordText = 'Erreur, la limite est inférieur ou égale à 1 (limite min. de votre texte).';
	        }
	        else if($limitNumberWordSelected>$wordNumberText){
				$wordText = 'Erreur, la limite est supérieur ou égale à '.$wordNumberText.' (limite max. de votre texte).';
	        }
	        else{
	        	// Découpage du texte
	            /*
	            $ponctuation = array(' ',',','.','?','!','(',')');
	            $wordListeText = multiexplode($ponctuation,$ld_description);
	            echo '$wordListeText = '.var_dump($wordListeText);
	            */
	            $wordListeText = explode(' ',$text);

	            // Remplacement du dernier élément du texte
	            $wordListeTextLastWord = $wordNumberText-1;
	            $wordListeText[$wordListeTextLastWord] = '[...].';
	            //-debug- echo 'Last Word N°'.$wordListeTextLastWord.' (n-1) : '.$wordListeText[$wordListeTextLastWord].'<br>---<br>';

	            // Reconstruction du texte.
	            $wordText = '';
	            $x=1;
	            while($x<$limitNumberWordSelected){
	                $wordText .= ''.$wordListeText[$x].' ';
	                $x++;
	            }

	            $wordText .= ' '.$wordListeText[$wordListeTextLastWord];
	            //-debug- echo '<br>'.$wordText;

	            // Afficher le nombre total de mots du text
	            if($showTotalWord==true)
	            	$wordText .= '<br><i>Totals words: '.$wordNumberText.'</i>';
	        }
			return $wordText;
		}
		// - - [ Nombre caractères d'une chaîne de caractère ] - - //
		function lengthText($text){
			// Calcule de la longueur d'une chaîne de caractère
			$lengthText = strlen($text);
			// Condition
			$lengthTextNumber = 'Le nombre de caractères du texte est de '.$lengthText.'';
			return $lengthTextNumber;
		}
		// - - [ Limiteur de caractères d'une chaîne de caractère ] - - //
		function lengthTextLimitMax($text){
			// Calcule de la longueur d'une chaîne de caractère
			$lengthText = strlen($text);
			// Condition
			if($lengthText>=820){
				$text = 'Le nombre maximum de caractères du texte est supérieur à 820. Il est de '.$lengthText.'';
			}
			return $text;
		}
		/* = = [ Cryptage des mots de passe ] = = */
		function cryptMdp($mdp){
			$mdp = hash('sha512',$mdp);
			return $mdp;
		}
		/* = = [ Formatage de nombres ] = = */
		function number($number){
			$number = number_format($number, 0, ',', ' ');
			return $number;
		}
		function numberFormat($number,$decimal,$separate){
			$number = number_format($number, $decimal, $separate, ' ');
			return $number;
		}
		/* = = [ Nettoyage des numéros de téléphone ] = = */
		function cleanPhone($recupMobile){
			// Suppression => "+"
			$supp = str_replace('+', '', $recupMobile);
			// Suppression => "."
			$supp = str_replace('.', '', $supp);
			// Suppression => " "
			$supp = str_replace(' ', '', $supp);
			//Division
			$recupStart = substr($supp, 0, 3);
			$recupEnd = substr($supp, 3);
			$verif = $recupStart;
			// Vérification et changement
			if($verif=='331'){
				$change = str_replace('331', '01', $recupStart);
				$final = $change.$recupEnd;
			}
			else if($verif=='332'){
				$change = str_replace('332', '02', $recupStart);
				$final = $change.$recupEnd;
			}
			else if($verif=='333'){
				$change = str_replace('333', '03', $recupStart);
				$final = $change.$recupEnd;
			}
			else if($verif=='334'){
				$change = str_replace('334', '04', $recupStart);
				$final = $change.$recupEnd;
			}
			else if($verif=='335'){
				$change = str_replace('335', '05', $recupStart);
				$final = $change.$recupEnd;
			}
			else if($verif=='336'){
				$change = str_replace('336', '06', $recupStart);
				$final = $change.$recupEnd;
			}
			else if($verif=='337'){
				$change = str_replace('337', '07', $recupStart);
				$final = $change.$recupEnd;
			}
			else if($verif=='338'){
				$change = str_replace('338', '08', $recupStart);
				$final = $change.$recupEnd;
			}
			else if($verif=='339'){
				$change = str_replace('339', '09', $recupStart);
				$final = $change.$recupEnd;
			}
			else{
				$final = $supp;
			}
			// Préparation final
			$pref = '.';
			$final_struc_1 = substr($final, 0, 2);
			$final_struc_2 = substr($final, 2, 2);
			$final_struc_3 = substr($final, 4, 2);
			$final_struc_4 = substr($final, 6, 2);
			$final_struc_5 = substr($final, 8, 2);
			// Restructuration final
			$final = $final_struc_1.$pref.$final_struc_2.$pref.$final_struc_3.$pref.$final_struc_4.$pref.$final_struc_5;
			return $final;
		}
		/* = = [ Boostrap - Functions - Modal ] = = */
		function bootstrapModal($type){
			$Modal_header = ' pas disponible pour le moment.';
			$Modal_signature = '<br />Merci de contact Loïc DUMAY en bas de page, pour plus d\'informations.';
			// - -
			if($type=='CV')
				$Modal_message = 'Le CV n\'est'.$Modal_header;
			elseif($type=='LM')
				$Modal_message = 'La Lettre de motivation n\'est'.$Modal_header;
			elseif($type=='BOOK')
				$Modal_message = 'Le Book n\'est'.$Modal_header;
			elseif($type=='CONFIGURATION')
				$Modal_message = 'Ma configuration n\'est'.$Modal_header;
			elseif($type=='PROJETS')
				$Modal_message = 'Les projets ne sont'.$Modal_header;
			elseif($type=='CREATIONS')
				$Modal_message = 'La galerie de mes créations n\'est'.$Modal_header;
			elseif($type=='BLOG')
				$Modal_message = 'Le blog n\'est'.$Modal_header;
			// - -
			echo ' <div class="modal fade modal-'.$type.'" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
				<div class="modal-dialog modal-sm">
					<div class="modal-content modalPerso">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title">Information</h4>
						</div>
						<div class="modal-body">
							<p>'.$Modal_message.''.$Modal_signature.'</p>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
						</div>
					</div>
				</div>
			</div>';
		}
		
		/* = = [ Véhicules & Consomation ] = = *
		*
		* Src : http://economies.calcule-tout.com/calculer-essence-consommation.html
		* 
		* Données
		* --
		* a : consommation moyenne du véhicule
		* b : distance parcourue du véhicule
		* c : prix du litre de carburant
		* --
		* d : consommation du jour du véhicule
		* e : prix du trajet du jour
		*
		* Formules
		* --
		* ( a / 100 ) * b = d
		* ( d / b ) * 100 = a
		* ( d / 100 ) / a = b
		* --
		* d * c = e
		* e / d = c
		* e / c = d
		*
		*/
		//--> Formule de a
		function consoMoyVehicule($consoJourVehicule,$distanceParcouVehicule){
			$consoMoyVehicule = ( $consoJourVehicule / $distanceParcouVehicule ) * 100;
			return $consoMoyVehicule;
		}
		//--> Formule de b
		function distanceParcouVehicule($consoJourVehicule,$consoMoyVehicule){
			$distanceParcouVehicule = ( $consoJourVehicule * 100 ) / $consoMoyVehicule;
			return $distanceParcouVehicule;
		}
		//--> Formule de c
		function prixDuLitreCarburant($prixTrajetJour,$consoJourVehicule){
			$prixDuLitreCarburant = $prixTrajetJour / $consoJourVehicule;
			return $prixDuLitreCarburant;
		}
		//--> Formule de d -- Méthode A
		function consoJourVehicule_A($consoMoyVehicule,$distanceParcouVehicule){
			$consoJourVehicule = ( $consoMoyVehicule / 100 ) * $distanceParcouVehicule;
			return $consoJourVehicule;
		}
		//--> Formule de d -- Méthode B
		function consoJourVehicule_B($prixTrajetJour,$prixDuLitreCarburant){
			$consoJourVehicule = ( $prixTrajetJour / $prixDuLitreCarburant );
			return $consoJourVehicule;
		}
		//--> Formule de e
		function prixTrajetJour($consoJourVehicule,$prixDuLitreCarburant){
			$prixTrajetJour = $consoJourVehicule * $prixDuLitreCarburant;
			return $prixTrajetJour;
		}
		//--> Estimation de la distance disponible
		function estimationKilometreDisponible($litreActuel,$tailleDunLitreDuReservoir,$consoMoyenne){

            $kmDispo = ( ( $litreActuel * $tailleDunLitreDuReservoir ) / $consoMoyenne ) * 10;

            return $kmDispo;
		}

		// Vérification si un mail est valide
		function mailValid($email)
		{
			$email = filter_var( strtolower( trim($email) ), FILTER_SANITIZE_STRING,FILTER_FLAG_NO_ENCODE_QUOTES);
			if ( !empty($email) )
			{
				preg_match( '/[a-z0-9._-]+@[a-z0-9._-]+/u', utf8_encode($email), $emailReturn );
				if( isset($emailReturn[0]) ){
					if((filter_var($emailReturn[0], FILTER_VALIDATE_EMAIL)) !== false){
						return $emailReturn[0];
					}
					return false;
				}
			}
			return null;
		}

		// Retirer HTTP:// ou HTTPS:// d'un URL
		function cleanHTTP($url){
			$newURL = '';
			// grâce à "str_replace" ("elementRecherché","elementDeRemplacement","chaineAModifié");
			//Verification HTTP://
			$newURL = str_replace('http://','',$url);
			//Verification HTTPS://
			$newURL = str_replace('https://','',$url);
			return $newURL;
		}
?>
