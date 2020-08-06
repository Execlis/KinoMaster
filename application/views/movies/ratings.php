<h1><?php echo $title;?></h1>
    <hr>

    <?php echo $pagination; ?>

    <table class="table table-striped">
        <thead>
            <tr>
                <th></th>
                <th>Фильм</th>
                <th class="text-center">Год</th>
                <th class="text-center">Рейтинг</th>
            </tr>
        </thead>
    
<?php foreach ($movie_data as $key => $value): ?> 
    
        <tbody>
            <tr>
                <td class="col-lg-1 col-md-1 col-xs-2">
                <a href="/movies/view/<?php echo $value['slug']; ?>/"> <img class="img-responsive img-thumbnail img-ratings" src="<?php echo $value['poster']?>" alt="<?php echo $value['name']?>"></a>
                </td>
                <td class="vert-align coll"><a href="/movies/view/<?php echo $value['slug']; ?>/"><?php echo $value['name']?></a></td>
                <td class="text-center vert-align"><?php echo $value['year']?></td>
                <td class="text-center vert-align"><span class="badge"><?php echo $value['rating']?></span></td>
            </tr>
        </tbody>
<?php endforeach ?>        
    </table>

    <?php echo $pagination; ?>
