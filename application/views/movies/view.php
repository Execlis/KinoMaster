<h1><?php echo $title; ?></h1>
    <hr>
    <div class="embed-responsive embed-responsive-16by9">
    <iframe class="embed-responsive-item" src="<?php echo $player_code; ?>" frameborder="0" allowfullscreen></iframe>  
    </div>
    <div class="well info-block text-center">
    Год: <span class="badge"><?php echo $year; ?></span>
    Рейтинг: <span class="badge"><?php echo $rating; ?></span>
    Режисёр: <span class="badge"><?php echo $producer; ?></span>
    </div>

    <div class="margin-8"></div>

    <h2>Описание фильма <?php echo $title; ?></h2>
    <hr>

    <div class="well">
    <?php echo $descriptions_movie; ?>
    </div>

    <div class="margin-8"></div>

    <h2>Отзывы о фильме <?php echo $title; ?></h2>
    <hr>

    <div class="panel panel-info">
        <div class="panel-heading"><i class="glyphicon glyphicon-user"></i> <span>Сергей</span></div>
        <div class="panel-body">
        Отлично
        </div>
    </div>

    <div class="panel panel-info">
        <div class="panel-heading"><i class="glyphicon glyphicon-user"></i> <span>Артём</span></div>
        <div class="panel-body">
        Превосходный фильм
        </div>
    </div>

    <form>
        <div class="form-group">
        <input type="text" placeholder="Ваше имя" class="form-control input-lg">
        </div>
        <div class="form-group">
        <textarea class="form-control"> </textarea>
        </div>
        <button class="btn btn-lg btn-warning pull-right">Отправить</button>
    </form>