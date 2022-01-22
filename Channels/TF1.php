<!DOCTYPE html>
<html data-cast-api-enabled="true">
<head>
	<title>MyTelevision</title>
	<link rel="icon" type="image/png" href="assets/img/logo.png" />
	<link rel="stylesheet" type="text/css" href="assets/style/reset.css" />
	<link rel="stylesheet" type="text/css" href="assets/style/style.css" />
	<link href="assets/style/bootstrap/css/bootstrap.css" rel="stylesheet">

	<meta property="og:site_name" content="MyTelevision" />
    <meta property="og:locale" content="fr_FR" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="MyTelevision" />
    <meta property="og:description" content="Regardez vos cha&icirc; nes pr&eacute;f&eacute;r&eacute;es avec l'application MyTelevision" />
    <meta property="og:image" content="assets/img/logo.png" />
    <meta property="og:image:width" content="1200" />
    <meta property="og:image:height" content="630" />
    
	<meta name="viewport" content="initial-scale=1.0, width=device-width" />
	<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
	<script src="https://vjs.zencdn.net/7.8.2/video.js"></script>

	<!-- <link href="assets/style/video-js.css" rel="stylesheet" /> -->
	<link href="https://vjs.zencdn.net/7.8.2/video-js.css" rel="stylesheet" />
</head>
<body>
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/fr_FR/sdk.js#xfbml=1&version=v7.0" nonce="20ew1NQd"></script>
		<header>
		<div id="header-gauche">
			<a href="index.php">
				<img src="assets/img/logo.png" alt="ERROR" id="logo-header" />
			</a>
			<ul>
				<li><a href="https://mytelevision.tv/index.php" class="first-child-a">accueil</a></li>
				<li><a href="https://mytelevision.tv/chaines.php">cha&icirc;nes tv</a></li>
				<li><a href="https://mytelevision.tv/grilletv.php">guide tv</a></li>
				<li><a href="https://mytelevision.tv/radio.php">radios</a></li>
				<li><a href="https://mytelevision.tv/news.php">news</a></li>
				<li><a href="https://mytelevision.tv/prochainement.php">VOD</a></li>
				<li><a href="https://mytelevision.tv/votrechaine.php">votre cha&icirc;ne</a></li>
				<li><a href="https://mytelevision.tv/contact.php" class="last-child-a">contact</a></li>
			</ul>
		</div>
		<div id="header-droite-droite">
				<div id="div-search-bar">
					<img src="assets/img/loupe.png" alt="ERROR" />
					<input type="search" name="search-bar" placeholder="Rechercher...">
					<button onclick="document.location.href = 'pageRecherche.php?q='+document.getElementById('div-search-bar').getElementsByTagName('input')[0].value">RECHERCHER</button>
				</div>
				<div id="header-droite-dessous">
					<div id="liens-application">
						<a href="https://play.google.com/store/apps/details?id=tv.MyTelevision.apps.android"><img src="assets/img/playstore.png" alt="ERROR" /></a>
						<a href="https://itunes.apple.com/gb/app/mytelevision/id1441034218"><img src="assets/img/applestore.png" alt="ERROR" /></a>
					</div>
					<div id="rs-div">
						<a href="https://www.facebook.com/MyTelevision.tv/" target="blank"><img src="assets/img/fb.png"></a>
						<a href="https://www.instagram.com/mytelevision.tv/" target="blank"><img src="assets/img/instagram.png"></a>
						<a href="https://twitter.com/MyTelevisiontv" target="blank"><img src="assets/img/twitter.png"></a>
					</div>
				</div>
				
			</div>
	</header>
	<main id="main-chaines-tv">
		<script type="text/javascript">
					
			var doc = new DOMParser().parseFromString(String(''), 'text/html');
			var listechaineTNT = [['nom_chaine','0']];
			var k = 0;
			for (var i = 2; i < 55; i = i+2) {
				listechaineTNT[i] = [doc.getElementsByClassName('broadcastItem-link')[k].innerHTML,doc.getElementsByTagName('picture')[i].getElementsByTagName('source')[2].outerHTML.split('1x')[1].split(' ')[1]];
				k++;
			}

			function InitChaine(nom, lien, chaineactuelle, categorie, TNT, vues){
				document.getElementById('my-video').style.display = 'none';
				document.getElementById('my-video-source').src = 'none';
				document.getElementById('video').style.display = 'block';
				document.getElementsByClassName('responsive-iframe')[0].src = lien;
				document.getElementById('NomChaine').innerHTML = '<img id="ImgLogo" src="assets/img/chaines/'+chaineactuelle+'.png"></img>';
				let liste_chaines = document.getElementsByClassName('lien-chaines');
				for (var i = 0; i < liste_chaines.length; i++) {
					liste_chaines[i].style.backgroundColor = '#cccccc';
				}
				document.getElementById(chaineactuelle).style.backgroundColor = '#ffffff';
				document.getElementById('infos-lecteur').getElementsByTagName('h6')[0].innerHTML = categorie;

				if (TNT != '0') {
					document.getElementById('image-prog').style.display = 'block';
					document.getElementById('image-prog').src = listechaineTNT[TNT][1];
					/*document.getElementById('NomChaine').innerHTML = '<img id="ImgLogo" src="assets/img/chaines/'+chaineactuelle+'.png"></img>';*/
					document.getElementById('Actuellement-titre').style.display = 'block';
				} else {
					document.getElementById('image-prog').style.display = 'none';
					document.getElementById('Actuellement-titre').style.display = 'none';
				}
				if (document.getElementById('my-video').style.display == 'none') {
					var myPlayer = videojs('my-video');
					myPlayer.muted(true);
				}
				$('#chargement').load('compteur.php?chaine='+chaineactuelle);
				document.getElementById('compteur-vues').innerHTML = vues;
				document.getElementsByClassName('twitter-share-button')[0].href = 'https://twitter.com/intent/tweet?text='+encodeURIComponent('https://www.mytelevision.tv/chaines.php?chaine='+chaineactuelle);
				document.getElementsByClassName('fb-share-button')[0].href = 'https://www.facebook.com/sharer/sharer.php?u='+encodeURIComponent('https://www.mytelevision.tv/chaines.php?chaine='+chaineactuelle);
			}

			function ChangerChaine(nom, lien, chaineactuelle, categorie, TNT, vues){

				/*VERIFICATION DE L'ADRESSE SECURISE*/
				if (lien.substr(0,5) != 'https' && document.location.href.substr(0,5) == 'https') {
					document.location.href = 'http://mytelevision.tv/chaines.php?chaine=' + chaineactuelle;
					return false;
				}
				if (document.location.href.substr(0,5) != 'https' && lien.substr(0,5) == 'https') {
					document.location.href = 'https://mytelevision.tv/chaines.php?chaine=' + chaineactuelle;
					return false;
				}
				document.getElementById('my-video').style.display = 'none';
				document.getElementById('my-video-source').src = 'none';
				document.getElementById('video').style.display = 'block';
				document.getElementsByClassName('responsive-iframe')[0].src = lien;
				document.getElementById('NomChaine').innerHTML = '<img id="ImgLogo" src="assets/img/chaines/'+chaineactuelle+'.png"></img>';
				let liste_chaines = document.getElementsByClassName('lien-chaines');
				for (var i = 0; i < liste_chaines.length; i++) {
					liste_chaines[i].style.backgroundColor = '#cccccc';
				}
				document.getElementById(chaineactuelle).style.backgroundColor = '#ffffff';
				document.getElementById('infos-lecteur').getElementsByTagName('h6')[0].innerHTML = categorie;

				if (TNT != '0') {
					document.getElementById('image-prog').style.display = 'block';
					document.getElementById('image-prog').src = listechaineTNT[TNT][1];
					document.getElementById('NomChaine').innerHTML = listechaineTNT[TNT][0];
					document.getElementById('Actuellement-titre').style.display = 'block';
				} else {
					document.getElementById('image-prog').style.display = 'none';
					document.getElementById('Actuellement-titre').style.display = 'none';
				}
				if (document.getElementById('my-video').style.display == 'none') {
					var myPlayer = videojs('my-video');
					myPlayer.muted(true);
				}
				$('#chargement').load('compteur.php?chaine='+chaineactuelle);
				document.getElementById('compteur-vues').innerHTML = vues;
				document.getElementsByClassName('twitter-share-button')[0].href = 'https://twitter.com/intent/tweet?text='+encodeURIComponent('https://www.mytelevision.tv/chaines.php?chaine='+chaineactuelle);
				document.getElementsByClassName('fb-share-button')[0].href = 'https://www.facebook.com/sharer/sharer.php?u='+encodeURIComponent('https://www.mytelevision.tv/chaines.php?chaine='+chaineactuelle);
			}

			function ChangerChaineM3U8(nom, lien, chaineactuelle, categorie, TNT, vues){
				document.getElementById('nom-m3u8').value = nom;
				document.getElementById('lien-m3u8').value = lien;
				document.getElementById('chaineactuelle-m3u8').value = chaineactuelle;
				document.getElementById('categorie-m3u8').value = categorie;
				document.getElementById('tnt-m3u8').value = TNT;
				document.getElementById('vues-m3u8').value = vues;
				document.getElementById('form-M3U8').action = 'chaines.php?chaineM='+chaineactuelle;
				document.getElementById('form-M3U8').submit();
			}

			function AfficherM3U8(chaineactuelle, TNT, vues){
				document.getElementById('my-video').style.display = 'block';
				document.getElementById('video').style.display = 'none';
				document.getElementsByClassName('responsive-iframe')[0].src = 'about:blank';
				let liste_chaines = document.getElementsByClassName('lien-chaines');
				for (var i = 0; i < liste_chaines.length; i++) {
					liste_chaines[i].style.backgroundColor = '#cccccc';
				}
				document.getElementById(chaineactuelle).style.backgroundColor = '#ffffff';
				if (TNT != '0') {
					document.getElementById('image-prog').style.display = 'block';
					document.getElementById('image-prog').src = listechaineTNT[TNT][1];
					document.getElementById('NomChaine').innerHTML = listechaineTNT[TNT][0];
					document.getElementById('Actuellement-titre').style.display = 'block';
				} else {
					document.getElementById('image-prog').style.display = 'none';
					document.getElementById('Actuellement-titre').style.display = 'none';
				}
				document.getElementById('my-video').poster = 'assets/img/chaines/'+chaineactuelle+'.png';
				$('#chargement').load('compteur.php?chaine='+chaineactuelle);
				document.getElementById('compteur-vues').innerHTML = vues;
				document.getElementsByClassName('twitter-share-button')[0].href = 'https://twitter.com/intent/tweet?text='+encodeURIComponent('https://www.mytelevision.tv/chaines.php?chaine='+chaineactuelle);
				document.getElementsByClassName('fb-share-button')[0].href = 'https://www.facebook.com/sharer/sharer.php?u='+encodeURIComponent('https://www.mytelevision.tv/chaines.php?chaine='+chaineactuelle);
			}

			function initFleche(){
				var listeFleche = document.getElementsByClassName('fleche-select-chaines');
				for (var i = 0; i < listeFleche.length; i++) {
					listeFleche[i].style.transform = 'rotate(90deg)';
				}
			}
			function CacherGroupe(id){
				console.log(document.getElementById(id).getElementsByClassName('fleche-select-chaines')[0].style.transform);
				if (document.getElementById(id).getElementsByClassName('fleche-select-chaines')[0].style.transform == 'rotate(90deg)') {
					document.getElementById(id).getElementsByClassName('display-chaines-tv')[0].style.display = 'none';
					document.getElementById(id).getElementsByClassName('fleche-select-chaines')[0].style.transform = 'rotate(0deg)';
				} else {
					document.getElementById(id).getElementsByClassName('display-chaines-tv')[0].style.display = 'flex';
					document.getElementById(id).getElementsByClassName('fleche-select-chaines')[0].style.transform = 'rotate(90deg)';
				}
				
			}
		</script>
		<form id="form-M3U8" action="chaines.php" method="POST" style="display: none;">
			<input type="text" name="nom-m3u8" value="lenom" id="nom-m3u8" />
			<input type="text" name="lien-m3u8" value="lelien" id="lien-m3u8" />
			<input type="text" name="chaineactuelle-m3u8" value="lachaine" id="chaineactuelle-m3u8" />
			<input type="text" name="categorie-m3u8" value="lacategorie" id="categorie-m3u8" />
			<input type="text" name="tnt-m3u8" value="tnt" id="tnt-m3u8" />
			<input type="text" name="vues-m3u8" value="vues" id="vues-m3u8" />
		</form>
				<div id="select-chaines">
			<div id="chaines-europe" class="selection-chaines-tv">
				<div class="head-select-chaines">
					<div class="text-selection-chaines">
						<img src="assets/img/europe.png" alt="ERROR" />
						<h3>Europe</h3>
					</div>
					<img src="assets/img/flecheBlanc.png" class="fleche-select-chaines" onclick="CacherGroupe('chaines-europe')" alt="ERROR" />
				</div>
				<div class="display-chaines-tv">
					<a title="D5TV" href="#lecteur" id="d5tv" class="lien-chaines" onclick="ChangerChaine('D5TV','https://www.dailymotion.com/embed/video/x7zw38l?autoplay=1','d5tv','Europe','0','65766')"><img src="assets/img/chaines/d5tv.png"></a><a title="D5Music" href="#lecteur" id="d5music" class="lien-chaines" onclick="ChangerChaine('D5Music','https://www.dailymotion.com/embed/video/x7zw8q9?autoplay=1','d5music','Musique, Europe','0','2240')"><img src="assets/img/chaines/d5music.png"></a><a title="MyComedy" href="#lecteur" id="mycomedy" class="lien-chaines" onclick="ChangerChaine('MyComedy','https://www.dailymotion.com/embed/video/x7zw8t0?autoplay=1','mycomedy','Europe, Comedy','0','5353')"><img src="assets/img/chaines/mycomedy.png"></a><a title="TF1" href="#lecteur" id="tf1" class="lien-chaines" onclick="ChangerChaine('TF1','https://mytelevision.tv/TV/live.php?chaine=tf1','tf1','Europe','0','13446')"><img src="assets/img/chaines/tf1.png"></a><a title="TF1 Séries & Films" href="#lecteur" id="tf1series" class="lien-chaines" onclick="ChangerChaine('TF1 Séries & Films','https://mytelevision.tv/TV/live.php?chaine=tf1-series-films','tf1series','Europe','0','4577')"><img src="assets/img/chaines/tf1series.png"></a><a title="TFX" href="#lecteur" id="tfx" class="lien-chaines" onclick="ChangerChaine('TFX','https://mytelevision.tv/TV/live.php?chaine=tfx','tfx','Europe','0','5004')"><img src="assets/img/chaines/tfx.png"></a><a title="France 2" href="#lecteur" id="france2" class="lien-chaines" onclick="ChangerChaine('France 2','https://mytelevision.tv/TV/live.php?chaine=france-2','france2','Europe','0','10862')"><img src="assets/img/chaines/france2.png"></a><a title="France 3" href="#lecteur" id="france3" class="lien-chaines" onclick="ChangerChaine('France 3','https://mytelevision.tv/TV/live.php?chaine=france-3','france3','Europe','0','7119')"><img src="assets/img/chaines/france3.png"></a><a title="France 4" href="#lecteur" id="france4" class="lien-chaines" onclick="ChangerChaine('France 4','https://mytelevision.tv/TV/live.php?chaine=france-4','france4','Europe','0','3537')"><img src="assets/img/chaines/france4.png"></a><a title="France 5" href="#lecteur" id="france5" class="lien-chaines" onclick="ChangerChaine('France 5','https://mytelevision.tv/TV/live.php?chaine=france-5','france5','Europe','0','5019')"><img src="assets/img/chaines/france5.png"></a><a title="France 24" href="#lecteur" id="france24" class="lien-chaines" onclick="ChangerChaine('France 24','http://mytelevision.tv/TV/live.php?chaine=france-24','france24','Infos, Europe','0','2033')"><img src="assets/img/chaines/france24.png"></a><a title="France Info" href="#lecteur" id="franceinfo" class="lien-chaines" onclick="ChangerChaine('France Info','http://mytelevision.tv/TV/live.php?chaine=france-info','franceinfo','Europe','0','')"><img src="assets/img/chaines/franceinfo.png"></a><a title="Canal Plus" href="#lecteur" id="canalplus" class="lien-chaines" onclick="ChangerChaine('Canal Plus','https://mytelevision.tv/TV/live.php?chaine=canal-plus','canalplus','Europe','0','2089')"><img src="assets/img/chaines/canalplus.png"></a><a title="C8" href="#lecteur" id="c8" class="lien-chaines" onclick="ChangerChaine('C8','https://mytelevision.tv/TV/live.php?chaine=c8','c8','Europe','0','5454')"><img src="assets/img/chaines/c8.png"></a><a title="TMC" href="#lecteur" id="tmc" class="lien-chaines" onclick="ChangerChaine('TMC','https://mytelevision.tv/TV/live.php?chaine=tmc','tmc','Europe','0','5191')"><img src="assets/img/chaines/tmc.png"></a><a title="NRJ12" href="#lecteur" id="nrj12" class="lien-chaines" onclick="ChangerChaine('NRJ12','https://mytelevision.tv/TV/lienm3u8?lien=https://nrj12hls-lh.akamaihd.net/i/nrj12hls_1@579113/master.m3u8','nrj12','Europe','0','2422')"><img src="assets/img/chaines/nrj12.png"></a><a title="Gulli" href="#lecteur" id="gulli" class="lien-chaines" onclick="ChangerChaine('Gulli','https://mytelevision.tv/TV/live.php?chaine=gulli','gulli','Europe, Kids','0','2006')"><img src="assets/img/chaines/gulli.png"></a><a title="CSTAR" href="#lecteur" id="cstar" class="lien-chaines" onclick="ChangerChaine('CSTAR','http://mytelevision.tv/TV/live.php?chaine=cstar','cstar','Europe','0','2062')"><img src="assets/img/chaines/cstar.png"></a><a title="CNEWS" href="#lecteur" id="cnews" class="lien-chaines" onclick="ChangerChaine('CNEWS','https://www.dailymotion.com/embed/video/x3b68jn?autoplay=1','cnews','Infos, Europe','0','2750')"><img src="assets/img/chaines/cnews.png"></a><a title="WEO" href="#lecteur" id="weo" class="lien-chaines" onclick="ChangerChaine('WEO','https://mytelevision.tv/TV/live.php?chaine=weo','weo','Europe','0','864')"><img src="assets/img/chaines/weo.png"></a><a title="Arte" href="#lecteur" id="arte" class="lien-chaines" onclick="ChangerChaine('Arte','https://mytelevision.tv/TV/live.php?chaine=arte-fr&lang=fr','arte','Europe','0','2677')"><img src="assets/img/chaines/arte.png"></a><a title="Euronews" href="#lecteur" id="euronews" class="lien-chaines" onclick="ChangerChaine('Euronews','https://www.youtube.com/embed/MsN0_WNXvh8','euronews','Europe, Infos','0','674')"><img src="assets/img/chaines/euronews.png"></a><a title="BFM TV" href="#lecteur" id="bfmtv" class="lien-chaines" onclick="ChangerChaine('BFM TV','https://mytelevision.tv/TV/live.php?chaine=bfmtv','bfmtv','Infos, Europe','0','3350')"><img src="assets/img/chaines/bfmtv.png"></a><a title="BX1" href="#lecteur" id="bx1" class="lien-chaines" onclick="ChangerChaine('BX1','https://mytelevision.tv/TV/lienm3u8?lien=https://59959724487e3.streamlock.net/stream/live/.m3u8','bx1','Europe','0','1115')"><img src="assets/img/chaines/bx1.png"></a><a title="Cherie 25" href="#lecteur" id="cherie25" class="lien-chaines" onclick="ChangerChaine('Cherie 25','https://mytelevision.tv/TV/lienm3u8?lien=https://cherie25hls-lh.akamaihd.net/i/cherie25hls_1@579096/index_720_av-b.m3u8?sd=10&rebase=on','cherie25','Europe','0','1570')"><img src="assets/img/chaines/cherie25.png"></a><a title="L équipe" href="#lecteur" id="lequipe" class="lien-chaines" onclick="ChangerChaine('L équipe','https://www.dailymotion.com/embed/video/x2lefik?autoplay=1','lequipe','Sport, Europe','0','1787')"><img src="assets/img/chaines/lequipe.png"></a><a title="KTO" href="#lecteur" id="kto" class="lien-chaines" onclick="ChangerChaine('KTO','https://mytelevision.tv/TV/live.php?chaine=kto','kto','Europe','0','408')"><img src="assets/img/chaines/kto.png"></a><a title="LCP" href="#lecteur" id="lcp" class="lien-chaines" onclick="ChangerChaine('LCP','https://mytelevision.tv/TV/live.php?chaine=lcp','lcp','Infos, Europe','0','537')"><img src="assets/img/chaines/lcp.png"></a><a title="Mouv TV" href="#lecteur" id="mouvtv" class="lien-chaines" onclick="ChangerChaine('Mouv TV','https://www.dailymotion.com/embed/video/x590cb7?autoplay=1','mouvtv','Musique, Europe','0','970')"><img src="assets/img/chaines/mouvtv.png"></a><a title="TLC" href="#lecteur" id="tlc" class="lien-chaines" onclick="ChangerChaine('TLC','https://mytelevision.tv/TV/live.php?chaine=tlc','tlc','Europe','0','732')"><img src="assets/img/chaines/tlc.png"></a><a title="TV5 Monde" href="#lecteur" id="tv5monde" class="lien-chaines" onclick="ChangerChaine('TV5 Monde','http://mytelevision.tv/TV/lienm3u8?lien=http://v3fbs247hls-i.akamaihd.net/hls/live/219079/v3fbs247hls/v3fbs247hls_1_1.m3u8','tv5monde','Europe','0','1923')"><img src="assets/img/chaines/tv5monde.png"></a><a title="TVR" href="#lecteur" id="tvr" class="lien-chaines" onclick="ChangerChaine('TVR','https://mytelevision.tv/TV/live.php?chaine=tvr','tvr','Europe','0','602')"><img src="assets/img/chaines/tvr.png"></a><a title="Public Sénat" href="#lecteur" id="publicsenat" class="lien-chaines" onclick="ChangerChaine('Public Sénat','https://mytelevision.tv/TV/live.php?chaine=public-senat','publicsenat','Infos, Europe','0','417')"><img src="assets/img/chaines/publicsenat.png"></a><a title="RMC Story" href="#lecteur" id="rmcstory" class="lien-chaines" onclick="ChangerChaine('RMC Story','https://www.dailymotion.com/embed/video/x13p3qi?autoplay=1','rmcstory','Europe','0','1477')"><img src="assets/img/chaines/rmcstory.png"></a><a title="RT France" href="#lecteur" id="rtfrance" class="lien-chaines" onclick="ChangerChaine('RT France','https://www.youtube.com/embed/Gxv3XQpAHCM?autoplay=1?autoplay=1&autopause=1&enablejsapi=1','rtfrance','Infos, Europe','0','1119')"><img src="assets/img/chaines/rtfrance.png"></a>					<!-- <a href="#lecteur"><img src="assets/img/chaines/tf1.png"></a> -->
				</div>
			</div>
			<div id="chaines-afrique" class="selection-chaines-tv">
				<div class="head-select-chaines">
					<div class="text-selection-chaines">
						<img src="assets/img/afrique.png" alt="ERROR" />
						<h3>Afrique</h3>
					</div>
					<img src="assets/img/flecheBlanc.png" class="fleche-select-chaines" onclick="CacherGroupe('chaines-afrique')" alt="ERROR" />
				</div>
				<div class="display-chaines-tv">
					<a title="2STV" href="#lecteur" id="2stv" class="lien-chaines" onclick="ChangerChaine('2STV','https://www.dailymotion.com/embed/video/x7vidbb','2stv','Afrique','0','808')"><img src="assets/img/chaines/2stv.png"></a><a title="TFM" href="#lecteur" id="tfm" class="lien-chaines" onclick="ChangerChaine('TFM','https://www.dailymotion.com/embed/video/x7wcr45','tfm','Afrique','0','564')"><img src="assets/img/chaines/tfm.png"></a><a title="Walf TV" href="#lecteur" id="walftv" class="lien-chaines" onclick="ChangerChaine('Walf TV','https://www.dailymotion.com/embed/video/x5s5vw3?autoplay=1','walftv','Afrique','0','452')"><img src="assets/img/chaines/walftv.png"></a><a title="SIKKA TV" href="#lecteur" id="sikkatv" class="lien-chaines" onclick="ChangerChaine('SIKKA TV','https://www.youtube.com/embed/_zEUTa4n2n8','sikkatv','Afrique','0','331')"><img src="assets/img/chaines/sikkatv.png"></a><a title="Africa 24" href="#lecteur" id="africa24" class="lien-chaines" onclick="ChangerChaine('Africa 24','https://www.youtube.com/embed/L5Ppr0JvPws?autoplay=1','africa24','Afrique','0','404')"><img src="assets/img/chaines/africa24.png"></a><a title="Afrique Media" href="#lecteur" id="afriquemedia" class="lien-chaines" onclick="ChangerChaine('Afrique Media','https://www.dailymotion.com/embed/video/x5dk3kj?autoplay=1','afriquemedia','Afrique','0','317')"><img src="assets/img/chaines/afriquemedia.png"></a><a title="Afro Culture TV" href="#lecteur" id="afroculturetv" class="lien-chaines" onclick="ChangerChaine('Afro Culture TV','https://www.dailymotion.com/embed/video/x7t09ft?autoplay=1','afroculturetv','Afrique','0','446')"><img src="assets/img/chaines/afroculturetv.png"></a><a title="West Africa TV" href="#lecteur" id="westafricatv" class="lien-chaines" onclick="ChangerChaine('West Africa TV','https://www.dailymotion.com/embed/video/x6vbjdp?autoplay=1','westafricatv','Afrique','0','401')"><img src="assets/img/chaines/westafricatv.png"></a><a title="Vision4" href="#lecteur" id="vision4" class="lien-chaines" onclick="ChangerChaine('Vision4','https://mytelevision.tv/TV/lienm3u8?lien=https://cdnamd-hls-globecast.akamaized.net/live/ramdisk/vision4/hls_video/vision4-avc1_1500000=5-mp4a_65200_qad=1.m3u8','vision4','Afrique','0','360')"><img src="assets/img/chaines/vision4.png"></a><a title="CRTV" href="#lecteur" id="crtv" class="lien-chaines" onclick="ChangerChaine('CRTV','https://www.dailymotion.com/embed/video/x7o9p4a?autoplay=1','crtv','Afrique','0','411')"><img src="assets/img/chaines/crtv.png"></a><a title="CRTV News" href="#lecteur" id="crtvnews" class="lien-chaines" onclick="ChangerChaine('CRTV News','https://www.dailymotion.com/embed/video/x7wtr2k?autoplay=1','crtvnews','Afrique','0','199')"><img src="assets/img/chaines/crtvnews.png"></a><a title="NCI" href="#lecteur" id="nci" class="lien-chaines" onclick="ChangerChaine('NCI','https://mytelevision.tv/TV/lienm3u8?lien=https://nci.cdn.easybroadcast.fr/NCI_ABR/ncipix/NCI_PIXPLAY/1500K/chunks.m3u8','nci','Afrique','0','')"><img src="assets/img/chaines/nci.png"></a><a title="Kalac TV" href="#lecteur" id="kalactv" class="lien-chaines" onclick="ChangerChaine('Kalac TV','https://mytelevision.tv/TV/lienm3u8?lien=https://edge9.vedge.infomaniak.com/livecast/ik:kalactv/chunklist_w1453337943.m3u8?spark=562bdc58-dde1-4b4e-b72f-e26cca52adc7&token=','kalactv','Afrique','0','332')"><img src="assets/img/chaines/kalactv.png"></a><a title="Obosso TV" href="#lecteur" id="obossotv" class="lien-chaines" onclick="ChangerChaine('Obosso TV','https://player.infomaniak.com?channel=70150&amp;player=10505','obossotv','Afrique, Musique','0','680')"><img src="assets/img/chaines/obossotv.png"></a><a title="Ortb" href="#lecteur" id="ortb" class="lien-chaines" onclick="ChangerChaine('Ortb','https://mytelevision.tv/TV/lienm3u8?lien=https://edge7.vedge.infomaniak.com/livecast/ik:ortb/chunklist_w17711494.m3u8?spark=cbdeda0b-10fc-4b51-8b7d-65e394d0afaf&token=','ortb','Afrique','0','385')"><img src="assets/img/chaines/ortb.png"></a><a title="2M Monde" href="#lecteur" id="2mmonde" class="lien-chaines" onclick="ChangerChaine('2M Monde','https://mytelevision.tv/TV/lienm3u8?lien=https://cdnamd-hls-globecast.akamaized.net/live/ramdisk/2m_monde/hls_video_ts/2m_monde.m3u8','2mmonde','Afrique','0','1268')"><img src="assets/img/chaines/2mmonde.png"></a><a title="Laayoune" href="#lecteur" id="laayoune" class="lien-chaines" onclick="ChangerChaine('Laayoune','https://mytelevision.tv/TV/lienm3u8?lien=https://cdnamd-hls-globecast.akamaized.net/live/ramdisk/al_aoula_laayoune/hls_snrt/index.m3u8','laayoune','Afrique','0','620')"><img src="assets/img/chaines/laayoune.png"></a><a title="Al Aoula" href="#lecteur" id="snrt1" class="lien-chaines" onclick="ChangerChaine('Al Aoula','https://mytelevision.tv/TV/lienm3u8?lien=https://cdnamd-hls-globecast.akamaized.net/live/ramdisk/al_aoula_inter/hls_snrt/al_aoula_inter-avc1_1500000=4-mp4a_130400_qad=1.m3u8','snrt1','Afrique','0','594')"><img src="assets/img/chaines/snrt1.png"></a><a title="Arryadia" href="#lecteur" id="arryadia" class="lien-chaines" onclick="ChangerChaine('Arryadia','http://mytelevision.tv/TV/lienm3u8?lien=http://cdnamd-hls-globecast.akamaized.net/live/ramdisk/arriadia/hls_snrt/arriadia.m3u8','arryadia','Afrique','0','451')"><img src="assets/img/chaines/arryadia.png"></a><a title="Arrabiaa" href="#lecteur" id="arrabiaa" class="lien-chaines" onclick="ChangerChaine('Arrabiaa','https://mytelevision.tv/TV/lienm3u8?lien=https://cdnamd-hls-globecast.akamaized.net/live/ramdisk/arrabiaa/hls_snrt/index.m3u8','arrabiaa','Afrique','0','403')"><img src="assets/img/chaines/arrabiaa.png"></a><a title="Assadissa" href="#lecteur" id="assadissa" class="lien-chaines" onclick="ChangerChaine('Assadissa','https://mytelevision.tv/TV/lienm3u8?lien=https://cdnamd-hls-globecast.akamaized.net/live/ramdisk/assadissa/hls_snrt/assadissa-avc1_1500000=4-mp4a_130400_qad=1.m3u8','assadissa','Afrique','0','279')"><img src="assets/img/chaines/assadissa.png"></a><a title="Tamazight" href="#lecteur" id="tamazight" class="lien-chaines" onclick="ChangerChaine('Tamazight','https://mytelevision.tv/TV/lienm3u8?lien=https://cdnamd-hls-globecast.akamaized.net/live/ramdisk/tamazight_tv8_snrt/hls_snrt/tamazight_tv8_snrt-avc1_400000=2-mp4a_130400_qad=1.m3u8','tamazight','Afrique','0','368')"><img src="assets/img/chaines/tamazight.png"></a><a title="M24" href="#lecteur" id="m24" class="lien-chaines" onclick="ChangerChaine('M24','https://mytelevision.tv/TV/lienm3u8?lien=https://www.m24tv.ma/live/smil:OutStream1.smil/chunklist_w1549267366_b4500000_sleng.m3u8','m24','Afrique','0','379')"><img src="assets/img/chaines/m24.png"></a><a title="Medi1 Maghreb" href="#lecteur" id="medi1maghreb" class="lien-chaines" onclick="ChangerChaine('Medi1 Maghreb','https://mytelevision.tv/TV/lienm3u8?lien=https://streaming.medi1tv.com/live/Medi1tvmaghreb.sdp/.m3u8','medi1maghreb','Afrique','0','357')"><img src="assets/img/chaines/medi1maghreb.png"></a><a title="Medi1 Africa" href="#lecteur" id="medi1africa" class="lien-chaines" onclick="ChangerChaine('Medi1 Africa','https://mytelevision.tv/TV/lienm3u8?lien=https://streaming.medi1tv.com/live/Medi1tvAfrique.sdp/chunklist_w378127871.m3u8','medi1africa','Afrique','0','315')"><img src="assets/img/chaines/medi1africa.png"></a><a title="Télé Maroc" href="#lecteur" id="telemaroc" class="lien-chaines" onclick="ChangerChaine('Télé Maroc','https://livestream.com/accounts/27130247/events/8196478/player?autoPlay=true','telemaroc','Afrique','0','466')"><img src="assets/img/chaines/telemaroc.png"></a><a title="Ennahar TV" href="#lecteur" id="ennahartv" class="lien-chaines" onclick="ChangerChaine('Ennahar TV','http://mytelevision.tv/TV/lienm3u8?lien=http://numidiatv-live.dzsecurity.net:8081/entv/EnnaharTV_SD/playlist.m3u8','ennahartv','Afrique','0','204')"><img src="assets/img/chaines/ennahartv.png"></a><a title="QTV Gambia" href="#lecteur" id="qtv" class="lien-chaines" onclick="ChangerChaine('QTV Gambia','https://mytelevision.tv/TV/lienm3u8?lien=https://player.qtv.gm/hls/live.stream.m3u8','qtv','Afrique','0','236')"><img src="assets/img/chaines/qtv.png"></a><a title="AfricaNews" href="#lecteur" id="africanews" class="lien-chaines" onclick="ChangerChaine('AfricaNews','https://www.dailymotion.com/embed/video/x6i37o5?autoplay=1','africanews','Afrique','0','160')"><img src="assets/img/chaines/africanews.png"></a><a title="Boss Brother TV" href="#lecteur" id="bossbrothertv" class="lien-chaines" onclick="ChangerChaine('Boss Brother TV','http://mytelevision.tv/TV/lienm3u8?lien=http://51.254.199.122:8080/bossbrothersTV/index.m3u8','bossbrothertv','Afrique','0','265')"><img src="assets/img/chaines/bossbrothertv.png"></a><a title="K24" href="#lecteur" id="k24" class="lien-chaines" onclick="ChangerChaine('K24','https://www.dailymotion.com/embed/video/x6lvncs?autoplay=1','k24','Afrique','0','274')"><img src="assets/img/chaines/k24.png"></a><a title="GuineeBuzz" href="#lecteur" id="guineebuzz" class="lien-chaines" onclick="ChangerChaine('GuineeBuzz','https://www.dailymotion.com/embed/video/x655zsl?autoplay=1','guineebuzz','Afrique','0','1132')"><img src="assets/img/chaines/guineebuzz.png"></a><a title="NTV" href="#lecteur" id="ntv" class="lien-chaines" onclick="ChangerChaine('NTV','https://mytelevision.tv/TV/lienm3u8?lien=https://strhlslb01.streamakaci.tv/str_ntv_ntv/str_ntv_ntv_multi/playlist.m3u8','ntv','Afrique','0','730')"><img src="assets/img/chaines/ntv.png"></a><a title="Telesud" href="#lecteur" id="telesud" class="lien-chaines" onclick="ChangerChaine('Telesud','https://www.dailymotion.com/embed/video/x7wrxqb?autoplay=1','telesud','Afrique','0','223')"><img src="assets/img/chaines/telesud.png"></a><a title="Ubiz News" href="#lecteur" id="ubiznews" class="lien-chaines" onclick="ChangerChaine('Ubiz News','https://www.dailymotion.com/embed/video/x74ucfd?autoplay=1','ubiznews','Afrique, Domtom','0','395')"><img src="assets/img/chaines/ubiznews.png"></a><a title="DBM" href="#lecteur" id="dbm" class="lien-chaines" onclick="ChangerChaine('DBM','https://mytelevision.tv/TV/lienm3u8?lien=https://edge3.vedge.infomaniak.com/livecast/smil:dbmtv.smil/chunklist_w1453118385_b1800000.m3u8','dbm','Afrique, Musique','0','441')"><img src="assets/img/chaines/dbm.png"></a><a title="Surnaturel TV" href="#lecteur" id="surnatureltv" class="lien-chaines" onclick="ChangerChaine('Surnaturel TV','https://www.dailymotion.com/embed/video/x7t0ln7?autoplay=1','surnatureltv','Afrique','0','354')"><img src="assets/img/chaines/surnatureltv.png"></a><a title="AYV Entertainment" href="#lecteur" id="ayventertainment" class="lien-chaines" onclick="ChangerChaine('AYV Entertainment','https://mytelevision.tv/TV/lienm3u8?lien=https://1423954428.rsc.cdn77.org/live/ngrp:stream-1_all/playlist.m3u8','ayventertainment','Afrique','0','264')"><img src="assets/img/chaines/ayventertainment.png"></a><a title="MyTv" href="#lecteur" id="mytv" class="lien-chaines" onclick="ChangerChaine('MyTv','http://mytelevision.tv/TV/lienm3u8?lien=http://connectiktv.ddns.me:8080/mytv/tracks-v1a1/mono.m3u8','mytv','Afrique','0','1571')"><img src="assets/img/chaines/mytv.png"></a><a title="Televisão de Moçambique" href="#lecteur" id="tvmosambic" class="lien-chaines" onclick="ChangerChaine('Televisão de Moçambique','http://mytelevision.tv/TV/lienm3u8?lien=http://online.tvm.co.mz:1935/live/smil:Channel1.smil/chunklist_w1195469067_b214000_slpor.m3u8','tvmosambic','Afrique','0','278')"><img src="assets/img/chaines/tvmosambic.png"></a>				</div>
			</div>
			<!-- <div id="chaines-maghreb" class="selection-chaines-tv">
				<div class="head-select-chaines">
					<div class="text-selection-chaines">
						<img src="assets/img/maghreb.png" alt="ERROR" />
						<h3>Maghreb</h3>
					</div>
					<img src="assets/img/flecheBlanc.png" class="fleche-select-chaines" onclick="CacherGroupe('chaines-maghreb')" alt="ERROR" />
				</div>
				<div class="display-chaines-tv">
									</div>
			</div> -->
			<div id="chaines-international" class="selection-chaines-tv">
				<div class="head-select-chaines">
					<div class="text-selection-chaines">
						<img src="assets/img/international.png" alt="ERROR" />
						<h3>International</h3>
					</div>
					<img src="assets/img/flecheBlanc.png" class="fleche-select-chaines" onclick="CacherGroupe('chaines-international')" alt="ERROR" />
				</div>
				<div class="display-chaines-tv">
					<a title="Al Jazeera" href="#lecteur" id="aljazeera" class="lien-chaines" onclick="ChangerChaine('Al Jazeera','https://mytelevision.tv/TV/lienm3u8?lien=https://live-hls-web-aja.getaj.net/AJA/index.m3u8','aljazeera','International','0','234')"><img src="assets/img/chaines/aljazeera.png"></a><a title="Alarabiya" href="#lecteur" id="alarabiya" class="lien-chaines" onclick="ChangerChaine('Alarabiya','https://mytelevision.tv/TV/lienm3u8?lien=https://live.alarabiya.net/alarabiapublish/alhadath.smil/alarabiapublish/alhadath_720p/chunks.m3u8','alarabiya','International','0','169')"><img src="assets/img/chaines/alarabiya.png"></a><a title="Arise News" href="#lecteur" id="arisenews" class="lien-chaines" onclick="ChangerChaine('Arise News','https://mytelevision.tv/TV/lienm3u8?lien=https://contributionstreams.sechls01.visionip.tv/live/visiontv-contributionstreams-arise-tv-25f-16x9-SD/chunklist.m3u8','arisenews','International','0','203')"><img src="assets/img/chaines/arisenews.png"></a><a title="DW" href="#lecteur" id="dw" class="lien-chaines" onclick="ChangerChaine('DW','https://mytelevision.tv/TV/lienm3u8?lien=https://dwstream6-lh.akamaihd.net/i/dwstream6_live@123962/master.m3u8','dw','International','0','270')"><img src="assets/img/chaines/dw.png"></a><a title="FoxNews" href="#lecteur" id="foxnews" class="lien-chaines" onclick="ChangerChaine('FoxNews','https://mytelevision.tv/TV/lienm3u8?lien=https://gma2.blab.email/espn2.m3u8','foxnews','International','0','378')"><img src="assets/img/chaines/foxnews.png"></a><a title="ICI television" href="#lecteur" id="icitelevision" class="lien-chaines" onclick="ChangerChaine('ICI television','https://mytelevision.tv/TV/lienm3u8?lien=https://ici-i.akamaihd.net/hls/live/873426/ICI-Live-Stream/master.m3u8','icitelevision','International','0','356')"><img src="assets/img/chaines/icitelevision.png"></a><a title="LN24" href="#lecteur" id="ln24" class="lien-chaines" onclick="ChangerChaine('LN24','https://mytelevision.tv/TV/lienm3u8?lien=https://live.cdn.ln24.be/out/v1/b191621c8b9a436cad37bb36a82d2e1c/index.m3u8','ln24','International','0','270')"><img src="assets/img/chaines/ln24.png"></a><a title="Matélé" href="#lecteur" id="matele" class="lien-chaines" onclick="ChangerChaine('Matélé','https://mytelevision.tv/TV/lienm3u8?lien=https://594a365b4a1b2.streamlock.net/matele/live/.m3u8','matele','International','0','346')"><img src="assets/img/chaines/matele.png"></a><a title="Mih TV" href="#lecteur" id="mihtv" class="lien-chaines" onclick="ChangerChaine('Mih TV','https://mytelevision.tv/TV/lienm3u8?lien=https://connection3-ent.sinclair.wurl.com/manifest/playlist.m3u8','mihtv','International','0','282')"><img src="assets/img/chaines/mihtv.png"></a><a title="Nasa TV" href="#lecteur" id="nasalive" class="lien-chaines" onclick="ChangerChaine('Nasa TV','http://mytelevision.tv/TV/lienm3u8?lien=http://iphone-streaming.ustream.tv/uhls/6540154/streams/live/iphone/playlist.m3u8','nasalive','International','0','343')"><img src="assets/img/chaines/nasalive.png"></a><a title="News Max" href="#lecteur" id="newsmax" class="lien-chaines" onclick="ChangerChaine('News Max','https://mytelevision.tv/TV/lienm3u8?lien=https://nmxlive.akamaized.net/hls/live/529965/Live_1/index_1080.m3u8','newsmax','International','0','217')"><img src="assets/img/chaines/newsmax.png"></a><a title="Porto Canal" href="#lecteur" id="portocanal" class="lien-chaines" onclick="ChangerChaine('Porto Canal','https://mytelevision.tv/TV/lienm3u8?lien=https://streamer-a03.videos.sapo.pt/live/portocanal/playlist.m3u8','portocanal','International','0','308')"><img src="assets/img/chaines/portocanal.png"></a><a title="Rouge TV" href="#lecteur" id="rougetv" class="lien-chaines" onclick="ChangerChaine('Rouge TV','https://mytelevision.tv/TV/lienm3u8?lien=https://rougetv.vedge.infomaniak.com/livecast/rougetv/.m3u8','rougetv','International','0','1808')"><img src="assets/img/chaines/rougetv.png"></a><a title="Times Now" href="#lecteur" id="timesnow" class="lien-chaines" onclick="ChangerChaine('Times Now','https://mytelevision.tv/TV/lienm3u8?lien=https://timesnow-lh.akamaihd.net/i/TNHD_1@129288/master.m3u8','timesnow','International','0','216')"><img src="assets/img/chaines/timesnow.png"></a>				</div>
			</div>
			<div id="chaines-infos" class="selection-chaines-tv">
				<div class="head-select-chaines">
					<div class="text-selection-chaines">
						<img src="assets/img/infos.png" alt="ERROR" />
						<h3>Infos</h3>
					</div>
					<img src="assets/img/flecheBlanc.png" class="fleche-select-chaines" onclick="CacherGroupe('chaines-infos')" alt="ERROR" />
				</div>
				<div class="display-chaines-tv">
					<a title="France 24" href="#lecteur" id="france24" class="lien-chaines" onclick="ChangerChaine('France 24','http://mytelevision.tv/TV/live.php?chaine=france-24','france24','Infos, Europe','0','2033')"><img src="assets/img/chaines/france24.png"></a><a title="CNEWS" href="#lecteur" id="cnews" class="lien-chaines" onclick="ChangerChaine('CNEWS','https://www.dailymotion.com/embed/video/x3b68jn?autoplay=1','cnews','Infos, Europe','0','2750')"><img src="assets/img/chaines/cnews.png"></a><a title="Euronews" href="#lecteur" id="euronews" class="lien-chaines" onclick="ChangerChaine('Euronews','https://www.youtube.com/embed/MsN0_WNXvh8','euronews','Europe, Infos','0','674')"><img src="assets/img/chaines/euronews.png"></a><a title="BFM TV" href="#lecteur" id="bfmtv" class="lien-chaines" onclick="ChangerChaine('BFM TV','https://mytelevision.tv/TV/live.php?chaine=bfmtv','bfmtv','Infos, Europe','0','3350')"><img src="assets/img/chaines/bfmtv.png"></a><a title="BFM Paris" href="#lecteur" id="bfmparis" class="lien-chaines" onclick="ChangerChaine('BFM Paris','https://mytelevision.tv/TV/live.php?chaine=bfm-paris','bfmparis','Infos','0','187')"><img src="assets/img/chaines/bfmparis.png"></a><a title="BFM Business" href="#lecteur" id="bfmbusiness" class="lien-chaines" onclick="ChangerChaine('BFM Business','https://mytelevision.tv/TV/live.php?chaine=bfm-business','bfmbusiness','Infos','0','126')"><img src="assets/img/chaines/bfmbusiness.png"></a><a title="BFM Grand Littoral" href="#lecteur" id="bfmgrandlittoral" class="lien-chaines" onclick="ChangerChaine('BFM Grand Littoral','https://mytelevision.tv/TV/live.php?chaine=bfm-grand-littoral','bfmgrandlittoral','Infos','0','108')"><img src="assets/img/chaines/bfmgrandlittoral.png"></a><a title="BFM Lille" href="#lecteur" id="bfmlille" class="lien-chaines" onclick="ChangerChaine('BFM Lille','https://mytelevision.tv/TV/live.php?chaine=bfm-lille','bfmlille','Infos','0','108')"><img src="assets/img/chaines/bfmlille.png"></a><a title="BFM Lyon" href="#lecteur" id="bfmlyon" class="lien-chaines" onclick="ChangerChaine('BFM Lyon','https://mytelevision.tv/TV/live.php?chaine=bfm-lyon','bfmlyon','Infos','0','83')"><img src="assets/img/chaines/bfmlyon.png"></a><a title="LCP" href="#lecteur" id="lcp" class="lien-chaines" onclick="ChangerChaine('LCP','https://mytelevision.tv/TV/live.php?chaine=lcp','lcp','Infos, Europe','0','537')"><img src="assets/img/chaines/lcp.png"></a><a title="SKYNEWS" href="#lecteur" id="skynews" class="lien-chaines" onclick="ChangerChaine('SKYNEWS','http://mytelevision.tv/TV/lienm3u8?lien=http://skydvn-sn-mobile-prod.skydvn.com/skynews/1404/latest.m3u8','skynews','Infos','0','195')"><img src="assets/img/chaines/skynews.png"></a><a title="Public Sénat" href="#lecteur" id="publicsenat" class="lien-chaines" onclick="ChangerChaine('Public Sénat','https://mytelevision.tv/TV/live.php?chaine=public-senat','publicsenat','Infos, Europe','0','417')"><img src="assets/img/chaines/publicsenat.png"></a><a title="RT France" href="#lecteur" id="rtfrance" class="lien-chaines" onclick="ChangerChaine('RT France','https://www.youtube.com/embed/Gxv3XQpAHCM?autoplay=1?autoplay=1&autopause=1&enablejsapi=1','rtfrance','Infos, Europe','0','1119')"><img src="assets/img/chaines/rtfrance.png"></a>				</div>
			</div>
			<div id="chaines-musique" class="selection-chaines-tv">
				<div class="head-select-chaines">
					<div class="text-selection-chaines">
						<img src="assets/img/musique.png" alt="ERROR" />
						<h3>Musique</h3>
					</div>
					<img src="assets/img/flecheBlanc.png" class="fleche-select-chaines" onclick="CacherGroupe('chaines-musique')" alt="ERROR" />
				</div>
				<div class="display-chaines-tv">
					<a title="D5Music" href="#lecteur" id="d5music" class="lien-chaines" onclick="ChangerChaine('D5Music','https://www.dailymotion.com/embed/video/x7zw8q9?autoplay=1','d5music','Musique, Europe','0','2240')"><img src="assets/img/chaines/d5music.png"></a><a title="Obosso TV" href="#lecteur" id="obossotv" class="lien-chaines" onclick="ChangerChaine('Obosso TV','https://player.infomaniak.com?channel=70150&amp;player=10505','obossotv','Afrique, Musique','0','680')"><img src="assets/img/chaines/obossotv.png"></a><a title="Mouv TV" href="#lecteur" id="mouvtv" class="lien-chaines" onclick="ChangerChaine('Mouv TV','https://www.dailymotion.com/embed/video/x590cb7?autoplay=1','mouvtv','Musique, Europe','0','970')"><img src="assets/img/chaines/mouvtv.png"></a><a title="NRJ HITS" href="#lecteur" id="nrjhits" class="lien-chaines" onclick="ChangerChaine('NRJ HITS','https://mytelevision.tv/TV/lienm3u8?lien=https://tv.ngroup.be/nrj/ngrp:NRJHitsTV_all/chunklist_w1437689219_b1431072.m3u8','nrjhits','Musique','0','558')"><img src="assets/img/chaines/nrjhits.png"></a><a title=" Top Latino" href="#lecteur" id="toplatino" class="lien-chaines" onclick="ChangerChaine(' Top Latino','https://mytelevision.tv/TV/lienm3u8?lien=https://5cefcbf58ba2e.streamlock.net/tltvweb/tltvweb.stream/playlist.m3u8','toplatino','Musique','0','368')"><img src="assets/img/chaines/toplatino.png"></a><a title="DBM" href="#lecteur" id="dbm" class="lien-chaines" onclick="ChangerChaine('DBM','https://mytelevision.tv/TV/lienm3u8?lien=https://edge3.vedge.infomaniak.com/livecast/smil:dbmtv.smil/chunklist_w1453118385_b1800000.m3u8','dbm','Afrique, Musique','0','441')"><img src="assets/img/chaines/dbm.png"></a><a title="LFM Tv" href="#lecteur" id="lfmtv" class="lien-chaines" onclick="ChangerChaine('LFM Tv','https://player.infomaniak.com/?channel=5240&player=3391','lfmtv','Musique','0','771')"><img src="assets/img/chaines/lfmtv.png"></a>				</div>
			</div>
			<div id="chaines-locale" class="selection-chaines-tv">
				<div class="head-select-chaines">
					<div class="text-selection-chaines">
						<img src="assets/img/locale.png" alt="ERROR" />
						<h3>Locale</h3>
					</div>
					<img src="assets/img/flecheBlanc.png" class="fleche-select-chaines" onclick="CacherGroupe('chaines-locale')" alt="ERROR" />
				</div>
				<div class="display-chaines-tv">
					<a title="Alsace 20" href="#lecteur" id="alsace20" class="lien-chaines" onclick="ChangerChaine('Alsace 20','https://mytelevision.tv/TV/live.php?chaine=alsace-20','alsace20','Local','0','193')"><img src="assets/img/chaines/alsace20.png"></a><a title="Bip TV" href="#lecteur" id="biptv" class="lien-chaines" onclick="ChangerChaine('Bip TV','https://mytelevision.tv/TV/live.php?chaine=bip-tv','biptv','Local','0','248')"><img src="assets/img/chaines/biptv.png"></a><a title="DICI TV" href="#lecteur" id="dicitv" class="lien-chaines" onclick="ChangerChaine('DICI TV','https://mytelevision.tv/TV/lienm3u8?lien=https://strhlslb01.streamakaci.tv/str_dicitv_dicitv/str_dicitv_multi/playlist.m3u8','dicitv','Local','0','190')"><img src="assets/img/chaines/dicitv.png"></a><a title="IDF1 Direct" href="#lecteur" id="idf1" class="lien-chaines" onclick="ChangerChaine('IDF1 Direct','https://mytelevision.tv/TV/live.php?chaine=idf1','idf1','Local','0','814')"><img src="assets/img/chaines/idf1.png"></a><a title="La chaîne normande" href="#lecteur" id="lachainenormande" class="lien-chaines" onclick="ChangerChaine('La chaîne normande','https://mytelevision.tv/TV/live.php?chaine=la-chaine-normande','lachainenormande','Local','0','167')"><img src="assets/img/chaines/lachainenormande.png"></a><a title="Monaco Channel" href="#lecteur" id="monacochannel" class="lien-chaines" onclick="ChangerChaine('Monaco Channel','https://mytelevision.tv/TV/lienm3u8?lien=https://webtvmonacoinfo.mc/live/prod_240/index.m3u8','monacochannel','Local','0','165')"><img src="assets/img/chaines/monacochannel.png"></a><a title="Tebesud" href="#lecteur" id="tebesud" class="lien-chaines" onclick="ChangerChaine('Tebesud','https://mytelevision.tv/TV/live.php?chaine=tebesud','tebesud','Local','0','175')"><img src="assets/img/chaines/tebesud.png"></a><a title="Télégrenoble" href="#lecteur" id="telegrenoble" class="lien-chaines" onclick="ChangerChaine('Télégrenoble','https://mytelevision.tv/TV/live.php?chaine=tele-grenoble','telegrenoble','Local','0','226')"><img src="assets/img/chaines/telegrenoble.png"></a><a title="Télénantes" href="#lecteur" id="telenantes" class="lien-chaines" onclick="ChangerChaine('Télénantes','https://mytelevision.tv/TV/live.php?chaine=tele-nantes','telenantes','Local','0','140')"><img src="assets/img/chaines/telenantes.png"></a><a title="TL7" href="#lecteur" id="tl7" class="lien-chaines" onclick="ChangerChaine('TL7','https://mytelevision.tv/TV/live.php?chaine=tl7','tl7','Local','0','183')"><img src="assets/img/chaines/tl7.png"></a><a title="TV7" href="#lecteur" id="tv7" class="lien-chaines" onclick="ChangerChaine('TV7','http://mytelevision.tv/TV/lienm3u8?lien=http://tv7.hdr-tv.com:1935/live/tv7/livestream/playlist.m3u8','tv7','Local','0','212')"><img src="assets/img/chaines/tv7.png"></a><a title="TV8 Mont Blanc" href="#lecteur" id="tv8montblanc" class="lien-chaines" onclick="ChangerChaine('TV8 Mont Blanc','https://mytelevision.tv/TV/live.php?chaine=tv8-mont-blanc','tv8montblanc','Local','0','258')"><img src="assets/img/chaines/tv8montblanc.png"></a><a title="TVPI" href="#lecteur" id="tvpi" class="lien-chaines" onclick="ChangerChaine('TVPI','http://mytelevision.tv/TV/lienm3u8?lien=http://streamcast.oc3n.net:1935/TVPI/myStream700.sdp/chunklist_w1227056744.m3u8','tvpi','Local','0','176')"><img src="assets/img/chaines/tvpi.png"></a><a title="TVT" href="#lecteur" id="tvt" class="lien-chaines" onclick="ChangerChaine('TVT','https://www.dailymotion.com/embed/video/x7z8qwp?autoplay=1','tvt','Local','0','199')"><img src="assets/img/chaines/tvt.png"></a><a title="TV Vendée" href="#lecteur" id="tvvendee" class="lien-chaines" onclick="ChangerChaine('TV Vendée','https://mytelevision.tv/TV/live.php?chaine=tv-vendee','tvvendee','Local','0','167')"><img src="assets/img/chaines/tvvendee.png"></a><a title="viaLMtv Sarthe" href="#lecteur" id="vialmtv" class="lien-chaines" onclick="ChangerChaine('viaLMtv Sarthe','https://mytelevision.tv/TV/live.php?chaine=vialmtv','vialmtv','Local','0','147')"><img src="assets/img/chaines/vialmtv.png"></a><a title="viaOccitanie" href="#lecteur" id="viaoccitanie" class="lien-chaines" onclick="ChangerChaine('viaOccitanie','https://mytelevision.tv/TV/live.php?chaine=viaoccitanie','viaoccitanie','Local','0','183')"><img src="assets/img/chaines/viaoccitanie.png"></a><a title="Var Azur" href="#lecteur" id="varazur" class="lien-chaines" onclick="ChangerChaine('Var Azur','https://www.dailymotion.com/embed/video/x630wrb?autoplay=1','varazur','Local','0','175')"><img src="assets/img/chaines/varazur.png"></a><a title="Var Azur Marseille" href="#lecteur" id="varazurmarseille" class="lien-chaines" onclick="ChangerChaine('Var Azur Marseille','https://www.dailymotion.com/embed/video/x13x1q2?autoplay=1','varazurmarseille','Local','0','188')"><img src="assets/img/chaines/varazurmarseille.png"></a>				</div>
			</div>
			<div id="chaines-domtom" class="selection-chaines-tv">
				<div class="head-select-chaines">
					<div class="text-selection-chaines">
						<img src="assets/img/domtom.png" alt="ERROR" />
						<h3>Dom-Tom</h3>
					</div>
					<img src="assets/img/flecheBlanc.png" class="fleche-select-chaines" onclick="CacherGroupe('chaines-domtom')" alt="ERROR" />
				</div>
				<div class="display-chaines-tv">
					<a title="Nago TV" href="#lecteur" id="nagotv" class="lien-chaines" onclick="ChangerChaine('Nago TV','http://mytelevision.tv/TV/lienm3u8?lien=http://haititivi.com:8088/haititv/tele6NY/tracks-v1a1/index.m3u8','nagotv','Domtom','0','310')"><img src="assets/img/chaines/nagotv.png"></a><a title="Ubiz News" href="#lecteur" id="ubiznews" class="lien-chaines" onclick="ChangerChaine('Ubiz News','https://www.dailymotion.com/embed/video/x74ucfd?autoplay=1','ubiznews','Afrique, Domtom','0','395')"><img src="assets/img/chaines/ubiznews.png"></a><a title="TMA Caraibes" href="#lecteur" id="tmacaraibes" class="lien-chaines" onclick="ChangerChaine('TMA Caraibes','http://mytelevision.tv/TV/lienm3u8?lien=http://hls.tmacaraibes.com/live/index.m3u8','tmacaraibes','Domtom','0','629')"><img src="assets/img/chaines/tmacaraibes.png"></a>				</div>
			</div>
			<div id="chaines-sport" class="selection-chaines-tv">
				<div class="head-select-chaines">
					<div class="text-selection-chaines">
						<img src="assets/img/sport.png" alt="ERROR" />
						<h3>Sport</h3>
					</div>
					<img src="assets/img/flecheBlanc.png" class="fleche-select-chaines" onclick="CacherGroupe('chaines-sport')" alt="ERROR" />
				</div>
				<div class="display-chaines-tv">
					<a title="AdSport1" href="#lecteur" id="adsport1" class="lien-chaines" onclick="ChangerChaine('AdSport1','https://mytelevision.tv/TV/lienm3u8?lien=https://admdn1.cdn.mangomolo.com/adsports1/adsports1.stream.smil/.m3u8','adsport1','Sport','0','535')"><img src="assets/img/chaines/adsport1.png"></a><a title="L équipe" href="#lecteur" id="lequipe" class="lien-chaines" onclick="ChangerChaine('L équipe','https://www.dailymotion.com/embed/video/x2lefik?autoplay=1','lequipe','Sport, Europe','0','1787')"><img src="assets/img/chaines/lequipe.png"></a>				</div>
			</div>
			<div id="chaines-kids" class="selection-chaines-tv">
				<div class="head-select-chaines">
					<div class="text-selection-chaines">
						<img src="assets/img/kids.png" alt="ERROR" />
						<h3>Kids</h3>
					</div>
					<img src="assets/img/flecheBlanc.png" class="fleche-select-chaines" onclick="CacherGroupe('chaines-kids')" alt="ERROR" />
				</div>
				<div class="display-chaines-tv">
					<a title="Gulli" href="#lecteur" id="gulli" class="lien-chaines" onclick="ChangerChaine('Gulli','https://mytelevision.tv/TV/live.php?chaine=gulli','gulli','Europe, Kids','0','2006')"><img src="assets/img/chaines/gulli.png"></a>				</div>
			</div>
			<div id="chaines-comedy" class="selection-chaines-tv">
				<div class="head-select-chaines">
					<div class="text-selection-chaines">
						<img src="assets/img/comedy.png" alt="ERROR" />
						<h3>Comedy</h3>
					</div>
					<img src="assets/img/flecheBlanc.png" class="fleche-select-chaines" onclick="CacherGroupe('chaines-comedy')" alt="ERROR" />
				</div>
				<div class="display-chaines-tv">
					<a title="MyComedy" href="#lecteur" id="mycomedy" class="lien-chaines" onclick="ChangerChaine('MyComedy','https://www.dailymotion.com/embed/video/x7zw8t0?autoplay=1','mycomedy','Europe, Comedy','0','5353')"><img src="assets/img/chaines/mycomedy.png"></a>				</div>
			</div>

		</div>
		<div id="lecteur">

			<video
		    id="my-video"
		    class="video-js"
		    controls
		    autoplay
		    playsinline
		    preload="auto"
		    width="640"
		    height="264"
		    poster=""
		    data-setup='{"controls": true, "autoplay": true, "preload": "auto"}'
		  >
		    <source id="my-video-source" 
     src="none"
     type="application/x-mpegURL">
		    <p class="vjs-no-js">
		      To view this video please enable JavaScript, and consider upgrading to a
		      web browser that
		      <a href="https://videojs.com/html5-video-support/" target="_blank"
		        >supports HTML5 video</a
		      >
		    </p>
		  </video>

			<div id="video" class="container"><iframe class="responsive-iframe" src="about:blank" allow="autoplay" controls allowfullscreen="allowfullscreen"></iframe>
			</div>
			<div id="infos-lecteur">
				<div>
					<div id="NomChaine"><img id="ImgLogo" src="assets/img/chaines/d5tv.png"></img></div>
					<h3 id="Actuellement-titre">Actuellement :</h3>
					<img src="assets/img/pasdinformations.png" alt="ERROR" id="image-prog" />
				</div>
				<div id="infos-droite">
					<h6>Europe</h6>
					<img src="assets/img/viewers.png" alt="ERROR" id="viewer-img" />
					<h6 id="compteur-vues">65766</h6>
					<!-- <button id="bouton-partager" onclick="affPartager()"><img src="assets/img/partager.png" alt="ERROR" /> PARTAGER</button> -->
					<div id="div-partager">
						<div class="fb-share-button" data-href="https://www.mytelevision.tv/chaines.php?chaine=" data-layout="button" data-size="small"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Partager</a></div>

						<a class="twitter-share-button"
						  href="https://twitter.com/intent/tweet?text=letextenencodecomponent"
						  data-size="large" target="_blank"><img src="assets/img/logotwitter.png" alt="ERROR" />
						Tweet</a>
					</div>
				</div>
			</div>
			<div id="pub-div">
				<a href="https://www.mytelevision.tv/" target="_blank">
					<img src="assets/img/pub.gif" alt="ERROR" />
				</a>
			</div>
		</div>
		<div id="chargement"></div>
		<div id="liens-application-mobile">
			<h3>Téléchargez notre application sur Google Play Store ou sur l'Apple Store :</h3>
			<div id="liens-application-mobile-main">
				<a href="https://play.google.com/store/apps/details?id=tv.MyTelevision.apps.android" target="blank"><img src="assets/img/playstore.png" alt="ERROR" /></a>
				<a href="https://itunes.apple.com/gb/app/mytelevision/id1441034218" target="blank"><img src="assets/img/applestore.png" alt="ERROR" /></a>
			</div>
		</div>
	</main>
	<script type="text/javascript">
		initFleche();
		document.getElementsByClassName('lien-chaines')[0].style.backgroundColor = '#ffffff';
		/*document.getElementById('div-partager').style.display = 'none';*/

		
					document.getElementById("my-video").style.display = "none";
					InitChaine("D5tv","https://www.dailymotion.com/embed/video/x7zw38l?autoplay=1","d5tv","europe","0","65766");
					
						if (document.getElementById('tf1')) {
							document.getElementById('tf1').onclick();
						} else {
							alert('Aucune chaine trouvée'); 
							document.getElementById('d5tv').onclick();
						}
						
		function affPartager(){
			let div = document.getElementById('div-partager');
			if (div.style.display == 'none') {
				div.style.display = 'flex';
			} else {
				div.style.display = 'none';
			}
		}

		function partagerLien(chaine){
			if (document.location.href.substr(0,5) != 'https') {
				alert("Vous n'êtes pas sur la version sécurisée du site, vous allez être redirigé dans 5 secondes.");
				setTimeout(function(){ document.location.href = 'https://mytelevision.tv/chaines.php?chaine=' + chaine; }, 5000);
				return false;
			}
			var text = "https://www.mytelevision.tv/chaines.php?chaine="+chaine;
			navigator.clipboard.writeText(text).then(function() {
			  console.log('Async: Copying to clipboard was successful!');
			  alert('Le lien a été copié dans le presse-papier !');
			}, function(err) {
			  console.error('Async: Could not copy text: ', err);
			});
		}
	</script>
	<footer>
		<div id="footer-haut">
			<ul>
				<li><a href="https://mytelevision.tv/cgu.php">Conditions G&eacute;n&eacute;rales d'Utilisation</a></li>
				<li><a href="https://mytelevision.tv/quisommesnous.html">Qui sommes-nous ?</a></li>
				<li><a href="https://mytelevision.tv/contact.php">Contact</a></li>
			</ul>
		</div>
		 <div id="menu-partenaires">
          <ul>
            <li><a href="https://xksgroup.com/" target="_blank">XKSGroup</a></li>
            <li><a href="https://xksprod.com/" target="_blank">XKSProd</a></li>
            <li><a href="https://xksmusic.com/" target="_blank">XKSMusic</a></li>
            <li><a href="https://www.d5tv.fr/" target="_blank">D5tv</a></li>
            <li><a href="https://d5music.tv/" target="_blank">D5music</a></li>
            <li><a href="https://d5news.fr/" target="_blank">D5news</a></li>
            <li><a href="https://xksdigital.com/" target="_blank">XKSDigital</a></li>
            <li><a href="https://www.xksapps.com/" target="_blank">XKSApps</a></li>
            <li><a href="https://mycomedy.fr/" target="_blank">MyComedy</a></li>
            <li><a href="https://www.lesambashow.com/" target="_blank">Le Samba Show</a></li>
            <li><a href="https://www.dakarfaitsacomedy.com/" target="_blank">Dakar Fait Sa Comedy</a></li>
            <li><a href="https://www.mycomedyjam.com/" target="_blank">MyComedyJam</a></li>
            <li><a href="https://www.galsen.com/" target="_blank">Galsen</a></li>
          </ul>
        </div>
		<div id="footer-bas">
			<p>All copyrights reserved &copy; 2020 - MyTelevision.tv Created by <a href="https://xksgroup.com/" target="blank">XKSDigital</a></p>
		</div>
	</footer>
</body>
</html>