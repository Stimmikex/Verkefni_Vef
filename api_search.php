<!DOCTYPE html>
<html>
<head>
	<?php 
		include("inc/head.php");
	 ?>
</head>
<body>
	<?php 
		include("inc/header.php");
		$imagesDir = 'img/cats/';
		$images = glob($imagesDir . '*.{jpg,jpeg,png,gif}', GLOB_BRACE);
		$randomImage = $images[array_rand($images)];
	?>
	<h1 class="page_title"><?php echo $page_name2; ?></h1>
	<p></p>
	<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
	<div class="input-field col s12">
	<p>From:</p>
	    <select name="from" class="browser-default">
	      <option value="" disabled selected>Choose your option</option>
	      <option value=""></option>
	      <option value="Akranes">Akranes</option>
	      <option value="Akureyri">Akureyri</option>
	      <option value="Bakkafjörður">Bakkafjörður</option>
	      <option value="Bíldudalur">Bíldudalur</option>
	      <option value="Búðardalur">Búðardalur</option>
	      <option value="Bifröst">Bifröst</option>
	      <option value="Blönduós">Blönduós</option>
	      <option value="Bolungarvík">Bolungarvík</option>
	      <option value="Borgarfjörður">Borgarfjörður</option>
	      <option value="Borgarnes">Borgarnes</option>
	      <option value="Breiðdalsvík">Breiðdalsvík</option>
	      <option value="Dalvík">Dalvík</option>
	      <option value="Djúpavogur">Djúpavogur</option>
	      <option value="Drangsnes">Drangsnes</option>
	      <option value="Egilsstaðir">Egilsstaðir</option>
	      <option value="Eskifjörður">Eskifjörður</option>
	      <option value="Eyrarbakki">Eyrarbakki</option>
	      <option value="Fáskrúðsfjörður">Fáskrúðsfjörður</option>
	      <option value="Flateyri">Flateyri</option>
	      <option value="Flúðir">Flúðir</option>
	      <option value="Garðabær">Garðabær</option>
	      <option value="Garður">Garður</option>
	      <option value="Grenivík">Grenivík</option>
	      <option value="Grindavík">Grindavík</option>
	      <option value="Grundarfjörður">Grundarfjörður</option>
	      <option value="Hafnarfjörður">Hafnarfjörður</option>
	      <option value="Hólar í Hjaltadal">Hólar í Hjaltadal</option>
	      <option value="Hólmavík">Hólmavík</option>
	      <option value="Höfn">Höfn</option>
	      <option value="Húsavík">Húsavík</option>
	      <option value="Hella">Hella</option>
	      <option value="Hellissandur">Hellissandur</option>
	      <option value="Hofsós">Hofsós</option>
	      <option value="Hvammstangi">Hvammstangi</option>
	      <option value="Hvanneyri">Hvanneyri</option>
	      <option value="Hveragerði">Hveragerði</option>
	      <option value="Hvolsvöllur">Hvolsvöllur</option>
	      <option value="Kárahnjúkar">Kárahnjúkar</option>
	      <option value="Kópasker">Kópasker</option>
	      <option value="Kópavogur">Kópavogur</option>
	      <option value="Keflavík">Keflavík</option>
	      <option value="Keflavík (Airport)">Keflavík (Airport)</option>
	      <option value="Keilissvæðið">Keilissvæðið</option>
	      <option value="Kirkjubæjarklaustur">Kirkjubæjarklaustur</option>
	      <option value="Landeyjahöfn">Landeyjahöfn</option>
	      <option value="Landmannalaugar">Landmannalaugar</option>
	      <option value="Laugar">Laugar</option>
	      <option value="Laugarvatn">Laugarvatn</option>
	      <option value="Mývatn">Mývatn</option>
	      <option value="Mjóifjörður">Mjóifjörður</option>
	      <option value="Mosfellsbær">Mosfellsbær</option>
	      <option value="Neskaupstaður">Neskaupstaður</option>
	      <option value="Patreksfjörður">Patreksfjörður</option>
	      <option value="Raufarhöfn">Raufarhöfn</option>
	      <option value="Reyðarfjörður">Reyðarfjörður</option>
	      <option value="Reykhólar">Reykhólar</option>
	      <option value="Reykholt">Reykholt</option>
	      <option value="Reykjanesbær">Reykjanesbær</option>
	      <option value="Reykjavík">Reykjavík</option>
	      <option value="Sandgerði">Sandgerði</option>
	      <option value="Sauðárkrókur">Sauðárkrókur</option>
	      <option value="Súðavík">Súðavík</option>
	      <option value="Selfoss">Selfoss</option>
	      <option value="Seyðisfjörður">Seyðisfjörður</option>
	      <option value="Siglufjörður">Siglufjörður</option>
	      <option value="Skagaströnd">Skagaströnd</option>
	      <option value="Staður">Staður</option>
	      <option value="Stöðvarfjörður">Stöðvarfjörður</option>
	      <option value="Stokkseyri">Stokkseyri</option>
	      <option value="Stykkishólmur">Stykkishólmur</option>
	      <option value="Suðureyri">Suðureyri</option>
	      <option value="Tálknafjörður">Tálknafjörður</option>
	      <option value="Varmahlíð">Varmahlíð</option>
	      <option value="Vík">Vík</option>
	      <option value="Vestmannaeyjar">Vestmannaeyjar</option>
	      <option value="Vogar">Vogar</option>
	      <option value="Vopnafjörður">Vopnafjörður</option>
	      <option value="Ísafjörður">Ísafjörður</option>
	      <option value="Ólafsfjörður">Ólafsfjörður</option>
	      <option value="Óladsvík">Óladsvík</option>
	      <option value="Þórshöfn">Þórshöfn</option>
	    </select>
	</div>
	<div class="input-field col s12">
	<p>To:</p>
    <select name="to" class="browser-default">
	      <option value="" disabled selected>Choose your option</option>
	      <option value=""></option>
	      <option value="Akranes">Akranes</option>
	      <option value="Akureyri">Akureyri</option>
	      <option value="Bakkafjörður">Bakkafjörður</option>
	      <option value="Bíldudalur">Bíldudalur</option>
	      <option value="Búðardalur">Búðardalur</option>
	      <option value="Bifröst">Bifröst</option>
	      <option value="Blönduós">Blönduós</option>
	      <option value="Bolungarvík">Bolungarvík</option>
	      <option value="Borgarfjörður">Borgarfjörður</option>
	      <option value="Borgarnes">Borgarnes</option>
	      <option value="Breiðdalsvík">Breiðdalsvík</option>
	      <option value="Dalvík">Dalvík</option>
	      <option value="Djúpavogur">Djúpavogur</option>
	      <option value="Drangsnes">Drangsnes</option>
	      <option value="Egilsstaðir">Egilsstaðir</option>
	      <option value="Eskifjörður">Eskifjörður</option>
	      <option value="Eyrarbakki">Eyrarbakki</option>
	      <option value="Fáskrúðsfjörður">Fáskrúðsfjörður</option>
	      <option value="Flateyri">Flateyri</option>
	      <option value="Flúðir">Flúðir</option>
	      <option value="Garðabær">Garðabær</option>
	      <option value="Garður">Garður</option>
	      <option value="Grenivík">Grenivík</option>
	      <option value="Grindavík">Grindavík</option>
	      <option value="Grundarfjörður">Grundarfjörður</option>
	      <option value="Hafnarfjörður">Hafnarfjörður</option>
	      <option value="Hólar í Hjaltadal">Hólar í Hjaltadal</option>
	      <option value="Hólmavík">Hólmavík</option>
	      <option value="Höfn">Höfn</option>
	      <option value="Húsavík">Húsavík</option>
	      <option value="Hella">Hella</option>
	      <option value="Hellissandur">Hellissandur</option>
	      <option value="Hofsós">Hofsós</option>
	      <option value="Hvammstangi">Hvammstangi</option>
	      <option value="Hvanneyri">Hvanneyri</option>
	      <option value="Hveragerði">Hveragerði</option>
	      <option value="Hvolsvöllur">Hvolsvöllur</option>
	      <option value="Kárahnjúkar">Kárahnjúkar</option>
	      <option value="Kópasker">Kópasker</option>
	      <option value="Kópavogur">Kópavogur</option>
	      <option value="Keflavík">Keflavík</option>
	      <option value="Keflavík (Airport)">Keflavík (Airport)</option>
	      <option value="Keilissvæðið">Keilissvæðið</option>
	      <option value="Kirkjubæjarklaustur">Kirkjubæjarklaustur</option>
	      <option value="Landeyjahöfn">Landeyjahöfn</option>
	      <option value="Landmannalaugar">Landmannalaugar</option>
	      <option value="Laugar">Laugar</option>
	      <option value="Laugarvatn">Laugarvatn</option>
	      <option value="Mývatn">Mývatn</option>
	      <option value="Mjóifjörður">Mjóifjörður</option>
	      <option value="Mosfellsbær">Mosfellsbær</option>
	      <option value="Neskaupstaður">Neskaupstaður</option>
	      <option value="Patreksfjörður">Patreksfjörður</option>
	      <option value="Raufarhöfn">Raufarhöfn</option>
	      <option value="Reyðarfjörður">Reyðarfjörður</option>
	      <option value="Reykhólar">Reykhólar</option>
	      <option value="Reykholt">Reykholt</option>
	      <option value="Reykjanesbær">Reykjanesbær</option>
	      <option value="Reykjavík">Reykjavík</option>
	      <option value="Sandgerði">Sandgerði</option>
	      <option value="Sauðárkrókur">Sauðárkrókur</option>
	      <option value="Súðavík">Súðavík</option>
	      <option value="Selfoss">Selfoss</option>
	      <option value="Seyðisfjörður">Seyðisfjörður</option>
	      <option value="Siglufjörður">Siglufjörður</option>
	      <option value="Skagaströnd">Skagaströnd</option>
	      <option value="Staður">Staður</option>
	      <option value="Stöðvarfjörður">Stöðvarfjörður</option>
	      <option value="Stokkseyri">Stokkseyri</option>
	      <option value="Stykkishólmur">Stykkishólmur</option>
	      <option value="Suðureyri">Suðureyri</option>
	      <option value="Tálknafjörður">Tálknafjörður</option>
	      <option value="Varmahlíð">Varmahlíð</option>
	      <option value="Vík">Vík</option>
	      <option value="Vestmannaeyjar">Vestmannaeyjar</option>
	      <option value="Vogar">Vogar</option>
	      <option value="Vopnafjörður">Vopnafjörður</option>
	      <option value="Ísafjörður">Ísafjörður</option>
	      <option value="Ólafsfjörður">Ólafsfjörður</option>
	      <option value="Óladsvík">Óladsvík</option>
	      <option value="Þórshöfn">Þórshöfn</option>
	    </select>
		<input type="submit" name="submit" class="btn waves-effect waves-light" id="search-button">
	</div>
	</form>
	<div class="pre"><?php 	
		$res = file_get_contents("http://apis.is/rides/samferda-drivers/");
		$res = json_decode($res, true);
		if (isset($_POST['submit'])) {
			if (isset($_POST['from']) || isset($_POST['to'])) {
				for ($i=0; $i < count($res['results']); $i++) {
					if (isset($_POST['from'], $_POST['to'])) {
						if ($_POST['from'] == $res['results'][$i]['from'] && $_POST['to'] == $res['results'][$i]['to']) {
							echo "<div class='datapool'>";
							echo "From: ".$res['results'][$i]['from']."<br>";
							echo "To: ".$res['results'][$i]['to']."<br>";
							echo "Date: ".$res['results'][$i]['date']."<br>";
							echo "Time: ".$res['results'][$i]['time']."<br>";
							echo "<a href='".$res['results'][$i]['link']."' target='_blank'>Link</a>";
							echo "</div><br>";
						}
					}
					else if (isset($_POST['from']) && $_POST['from'] == $res['results'][$i]['from']) {
						echo "<div class='datapool'>";
						echo "From: ".$res['results'][$i]['from']."<br>";
						echo "To: ".$res['results'][$i]['to']."<br>";
						echo "Date: ".$res['results'][$i]['date']."<br>";
						echo "Time: ".$res['results'][$i]['time']."<br>";
						echo "<a href='".$res['results'][$i]['link']."' target='_blank'>Link</a>";
						echo "</div><br>";
					}
					else if (isset($_POST['to']) && $_POST['to'] == $res['results'][$i]['to']) {
						echo "<div class='datapool'>";
						echo "From: ".$res['results'][$i]['from']."<br>";
						echo "To: ".$res['results'][$i]['to']."<br>";
						echo "Date: ".$res['results'][$i]['date']."<br>";
						echo "Time: ".$res['results'][$i]['time']."<br>";
						echo "<a href='".$res['results'][$i]['link']."' target='_blank'>Link</a>";
						echo "</div><br>";
					}
				}
			}
		}
	?></div>
	<!--<img src="<?php echo $randomImage; ?>" class="rand_image">-->
	<?php 
		include("inc/footer.php");
	?>
</body>
</html>