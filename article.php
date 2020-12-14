<?php

    include('config/db_connect.php');

    if (isset($_GET['id'])) {
        $id = mysqli_real_escape_string($conn, $_GET['id']);

        $sql = "SELECT * FROM articles WHERE id = $id";

        $result = mysqli_query($conn, $sql);

        $article = mysqli_fetch_assoc($result);

        // $cols = explode('%~brk%', $article);

        mysqli_free_result($result);
        mysqli_close($conn);
    }

?>

<!DOCTYPE html>
<html lang="en">
    <?php include('templates/articleHeader.php'); ?>

    <?php if ($article): ?>
        <div id="content"><?=$article['content'] ?></div>
    <?php else: ?>
        <h5>No such article exists</h5>
    <?php endif; ?>

    <div class="container-fluid article" id="page-one">
        <div class="front-pg" id="front-pg">
            <div class="col" id="one" spellcheck="false">
            
            </div>
            <div class="col" id="two" spellcheck="false">
            
            </div>
            <div class="front-img-container">
                <img style="object-fit: contain; height: 100%" src="<?=$article['img'] ?>">
            </div>
        </div>
        <!-- <div class="col" id="three" spellcheck="false">
        
        </div>
        <div class="col" id="four" spellcheck="false">
        
        </div> -->
    </div>

    <script src="scripts/article.js" type="module"></script>
    <script src="scripts/resize.js" type="module"></script>

    <?php include('templates/footer.php'); ?>
</html>


    <!-- <div class="container-fluid article" id="page-one">
        <div class="front-pg">
            <div class="col" id="one" spellcheck="false">
                <h1 class="title">Day 85</h1>
                
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse sit amet magna feugiat, vestibulum neque sed, accumsan quam. Fusce nec convallis ante. Morbi rutrum cursus mi, non venenatis sem mollis eget. Quisque accumsan ligula ipsum. Nulla feugiat magna nulla, vitae fermentum felis volutpat in. Duis nisl nulla, dictum et velit eget, maximus molestie nunc. Praesent blandit orci non             
            </div>
            <div class="col" id="two" spellcheck="false">
                
                imperdiet semper. Sed vulputate bibendum leo et varius. Integer dolor nulla, rhoncus in tristique eu, pulvinar et mauris. Aenean erat velit, molestie ac hendrerit ac, vehicula at odio. Nam aliquet malesuada pharetra. Duis feugiat lorem eu nibh lacinia rutrum. Pellentesque at risus nec metus placerat tristique a quis velit. Duis nec rhoncus nibh. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec quis sagittis purus. Maecenas blandit dui non mollis vehicula. Nulla eleifend dolor in neque             
            </div>
            <div class="front-img">
                <img style="object-fit: contain; height: 100%" src="https://static-2.gumroad.com/res/gumroad/1211634803146/asset_previews/6e0831e58d3188a98e732a89507ef326/retina/food-delivery-colour-thumbnail.png">
            </div>
        </div>
        <div class="col" id="three" spellcheck="false">
            quam. Duis sed turpis sapien. Ut a metus lacus. Sed lobortis risus metus, vitae cursus augue malesuada in. Curabitur a ex quam. Donec justo ipsum, cursus eu dictum id, mollis vel nulla. Maecenas non nisl luctus, ornare justo non, sodales velit. Curabitur in maximus lectus. Nullam pulvinar nibh ut lectus congue pulvinar. Pellentesque ac porta massa. 
            <div class="quote">Pellentesque at rises nec metus placerat tristique a quis velit.</div>
            
            Sed interdum vestibulum mauris ut vulputate. Nunc pharetra ornare nisl, nec mattis risus finibus eu. Nam ex felis, vehicula et elit vel, rutrum blandit sapien. Pellentesque viverra rhoncus rutrum. Vestibulum id augue ullamcorper, finibus augue ac, suscipit quam. In convallis a nisl in consectetur. Etiam quis justo neque. Proin ac nisi et neque feugiat ultrices. Cras eu arcu lacinia, pulvinar odio at, rutrum elit. Mauris at tellus a erat iaculis vulputate ac sagittis nisl. Aenean blandit gravida cursus. Vivamus sollicitudin ornare ipsum, eu porta est dignissim eu. Praesent gravida eros et lectus placerat, vel congue augue maximus. Quisque eu orci efficitur nulla interdum consectetur eu vel orci. pulvinar, quis dapibus nulla sodales. Vestibulum nec lorem non libero pharetra rhoncus id vel lacus. Proin sed magna purus.
        </div>
        <div class="col" id="four" spellcheck="false">
            Quisque ornare varius blandit. Nam imperdiet quam et luctus eleifend. Ut auctor augue elit, id condimentum elit varius vel. Maecenas varius, sapien et porta gravida, mi risus feugiat turpis, eget venenatis velit arcu a tellus. Ut accumsan lacinia molestie. Aliquam sed laoreet dolor, in consequat dui. Sed dui tortor, mattis eu faucibus vel, iaculis id nulla.            
            <div style="overflow: hidden; margin: auto -14px">
                <img style="object-fit: cover; width: 100%" src="https://static-2.gumroad.com/res/gumroad/1211634803146/asset_previews/3fc4cabe36e7950089ea04c57edb3362/retina/headphones-monochrome-thumbnail.png">
            </div>
            Donec tincidunt ante sollicitudin ex aliquet faucibus. Mauris tincidunt ipsum lectus, sed pharetra sapien ornare et. Suspendisse potenti. Quisque a pulvinar est. Nunc eget auctor nunc. Curabitur id erat at dui iaculis faucibus in at 
        </div>
    </div> -->

