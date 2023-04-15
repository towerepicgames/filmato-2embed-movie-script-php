<?php
include_once 'files/apikey.php';
include_once 'files/datafile.php';
$json = file_get_contents($datafile);
$data = json_decode($json, true);
$loop = $data[0]['data'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta name="robots" content="index, follow">
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Filmato – Stream Full HD Movies</title>
<meta name="description" content="">
<link rel="stylesheet" href="/css/bootstrap-reboot.min.css">
<link rel="stylesheet" href="/css/bootstrap-grid.min.css">
<link rel="stylesheet" href="/css/owl.carousel.min.css">
<link rel="stylesheet" href="/css/jquery.mCustomScrollbar.min.css">
<link rel="stylesheet" href="/css/nouislider.min.css">
<link rel="stylesheet" href="/css/ionicons.min.css">
<link rel="stylesheet" href="/css/plyr.css">
<link rel="stylesheet" href="/css/photoswipe.css">
<link rel="stylesheet" href="/css/default-skin.css">
<link rel="stylesheet" href="/css/main.css">
</head>
<body class="body">
<?php include 'files/header.php';?>
<!-- home -->
<section class="home">
<!-- home bg -->
<div class="owl-carousel home__bg">
	<div class="item home__cover" data-bg="/img/home/home__bg.jpg"></div>
	<div class="item home__cover" data-bg="/img/home/home__bg2.jpg"></div>
	<div class="item home__cover" data-bg="/img/home/home__bg3.jpg"></div>
	<div class="item home__cover" data-bg="/img/home/home__bg4.jpg"></div>
	<div class="item home__cover" data-bg="/img/home/home__bg5.jpg"></div>
</div>
<!-- end home bg -->

<div class="container">
	<div class="row">
		<div class="col-12">
			<h1 class="home__title"><b>Latest Movies</b></h1>

			<button class="home__nav home__nav--prev" type="button">
				<i class="icon ion-ios-arrow-round-back"></i>
			</button>
			<button class="home__nav home__nav--next" type="button">
				<i class="icon ion-ios-arrow-round-forward"></i>
			</button>
		</div>

		<div class="col-12">
			<div class="owl-carousel home__carousel">
				<?php
					$counter = 0;
					
					foreach($loop as $jsonArrayKeyz => $jsonArrayValue){
						$years = $jsonArrayValue['year'];
					if($years == '2023'){
							if ($counter >= 10) {
							   break;
							}	
						
						$title = $jsonArrayValue['title'];
						$imdbid = $jsonArrayValue['imdb'];
						$rating = $jsonArrayValue['rating'];
						$language = $jsonArrayValue['language'];
						$year = $jsonArrayValue['year'];
						
						$imdbid = basename($imdbid);
						
						if(empty($rating)) $rating = '0';

						$json = file_get_contents('http://api.themoviedb.org/3/movie/'.$imdbid.'?api_key='.$apikey);	
						$obj = json_decode($json, true);
						$tmdbid = $obj["id"];
						$duration = $obj["runtime"];
						$genres = $obj["genres"];
						$year = $obj["release_date"];
						$poster = '//image.tmdb.org/t/p/original'.$obj["poster_path"];
						
						$country = $obj["production_countries"][0]["name"];
						
						$genres1 = $genres[0]['name'];
						$genres2 = $genres[1]['name'];
						
						$year = substr($year, 0, strpos($year, "-"));
				?>
				<div class="card card--big" title="<?php echo $title;?> (<?php echo $year;?>)">
					<div class="card__cover">
						<img src="/imdbthumbs/<?php echo $imdbid;?>.jpg" onerror="this.src='/img/noposter.jpg';" alt="Watch <?php echo $title;?>">
						<a href="/watch/<?php echo $imdbid;?>" class="card__play">
							<i class="icon ion-ios-play"></i>
						</a>
						<span class="card__rate card__rate--green"><?php echo $rating;?></span>
					</div>
					<div class="card__content">
						<h3 class="card__title"><a href="/watch/<?php echo $imdbid;?>"><?php echo $title;?></a></h3>
						<span class="card__category" style="color:#48ee3b;">
							<?php echo $genres1;?>
						</span>
					</div>
				</div>
				<?php 
					$counter++;						
				}}
				?>
			</div>
		</div>
	</div>
</div>
</section>
<!-- end home -->

<!-- content -->
<section class="content">
<div class="content__head">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<!-- content tabs nav -->
				<ul class="nav nav-tabs content__tabs" id="content__tabs" role="tablist" style="display:block;">
					<li class="nav-item">
						<a class="nav-link active" data-toggle="tab" href="#tab-1" role="tab" aria-controls="tab-1" aria-selected="true">Newly Added</a>
					</li>
				</ul>
				<!-- end content tabs nav -->
			</div>
		</div>
	</div>
</div>

<div class="container">
	<!-- content tabs -->
	<div class="tab-content">
		<div class="tab-pane fade show active" id="tab-1" role="tabpanel" aria-labelledby="1-tab">
			<div class="row">
				<?php
					$counter = 0;
					
					foreach($loop as $jsonArrayKeyz => $jsonArrayValue){
						$years = $jsonArrayValue['year'];
							if ($counter >= 36) {
							   break;
							}	
						
						$title = $jsonArrayValue['title'];
						$imdbid = $jsonArrayValue['imdb'];
						$rating = $jsonArrayValue['rating'];
						$language = $jsonArrayValue['language'];
						$year = $jsonArrayValue['year'];
						
						$imdbid = basename($imdbid);
						
						if(empty($rating)) $rating = '0';

						$json = file_get_contents('http://api.themoviedb.org/3/movie/'.$imdbid.'?api_key='.$apikey);	
						$obj = json_decode($json, true);
						$tmdbid = $obj["id"];
						$duration = $obj["runtime"];
						$genres = $obj["genres"];
						$year = $obj["release_date"];
						$poster = '//image.tmdb.org/t/p/original'.$obj["poster_path"];
						
						$country = $obj["production_countries"][0]["name"];
						
						$genres1 = $genres[0]['name'];
						$genres2 = $genres[1]['name'];
						
						$year = substr($year, 0, strpos($year, "-"));
				?>					
				<!-- card -->
				<div class="col-6 col-sm-4 col-md-3 col-xl-2" title="<?php echo $title;?> (<?php echo $year;?>)">
					<div class="card">
						<div class="card__cover">
							<img src="/imdbthumbs/<?php echo $imdbid;?>.jpg" alt="Watch <?php echo $title;?>" onerror="this.src='/img/noposter.jpg';">
							<a href="/watch/<?php echo $imdbid;?>" class="card__play">
								<i class="icon ion-ios-play"></i>
							</a>
							<span class="card__rate card__rate--green"><?php echo $rating;?></span>
						</div>
						<div class="card__content">
							<h3 class="card__title"><a href="/watch/<?php echo $imdbid;?>"><?php echo $title;?></a></h3>
							<span class="card__category">
								<a><?php echo $genres1;?></a>
								<a><?php echo $genres2;?></a>
							</span>
						</div>
					</div>
				</div>
				<!-- end card -->
				<?php 
					$counter++;						
				}
				?>						
			</div>
		</div>
</section>
<!-- end content -->
<?php include_once('files/footer.php');?>
</body>
</html>