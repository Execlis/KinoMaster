<h1><?php echo $title; ?></h1>
<hr>

<?php foreach ($movie_data as $key => $value): ?>
    <div class="row">
        <div class="well clearfix">
            <div class="col-lg-3 col-md-2 text-center">
                <a href="/movies/view/<?php echo $value['slug']; ?>/"><img class="img-thumbnail" src="<?php echo $value['poster']?>" alt="<?php echo $value['name']?>">
                <p><?php echo $value['name']?></p></a>
            </div>
            <div class="col-lg-9">
                <p><?php echo $value['descriptions'] ?></p>
            </div> 
            <div class="col-lg-12 col-md-10">
                <a href="/movies/view/<?php echo $value['slug']; ?>/" class="btn btn-lg btn-warning pull-right">Подробнее</a>
            </div>
        </div>
    </div>
<?php endforeach ?>


