<?php

    include('config/db_connect.php');

    $sql = 'SELECT content, img, created_at, id FROM articles ORDER BY created_at';

    $result = mysqli_query($conn, $sql);

    $articles = mysqli_fetch_all($result, MYSQLI_ASSOC);
    
    $titles = [];
    $contents = [];

    foreach ($articles as $article) {
        $titleStart = strpos($article['content'], '&lt;div class=&quot;title&quot; contenteditable=&quot;true&quot;&gt;');
        $titleEnd = strpos($article['content'], '&lt;/div&gt;');
        if ($titleStart && $titleEnd) {
            array_push($titles, substr($article['content'], $titleStart+68, $titleEnd-$titleStart-68));
        } else {
            $id = count($titles);
            $title = $articles[$id]['id'];
            array_push($titles, "Article $title");
        }

        $content = $article['content'];
        $content = str_replace('%~brk%', '', $content);
        $content = htmlspecialchars_decode($content);
        $content = preg_replace('#(<div class="title" contenteditable="true">).*?(</div>)#', '$1$2', $content);
        $content = strip_tags($content);

        if (strlen($content) > 200) {
            array_push($contents, substr($content, 0, 200).'...');
        } else {
            array_push($contents, $content);
        }

        
    }

    mysqli_free_result($result);

    mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">

    <?php include('templates/header.php'); ?>
    
    <div class="highlight-container container pb-4 mb-4">
        <div class="highlight-one">
            <img class="highlight-image" src="<?=$articles[count($articles)-1]['img'] ?>" height="180" style="object-fit: cover">
            <div class="mt-3 ml-3 mr-3 flex-grow-1">
                <a class="h4 article-title" href="article.php?id=<?=$articles[count($articles)-1]['id'] ?>"><?=$titles[count($articles)-1] ?></a>
                <div class="article-content mt-2"><?=$contents[count($articles)-1] ?></div>
                <div class="article-content mt-3"><?=date("M d, Y", strtotime($articles[count($articles)-1]['created_at'])) ?></div>
            </div>
        </div>
        <div class="highlight-two d-flex">
            <img src="<?=$articles[count($articles)-2]['img'] ?>" width="120" height="120" style="object-fit: cover">
            <div class="ml-3 mr-3 flex-grow-1">
                <a class="h6 article-title" href="article.php?id=<?=$articles[count($articles)-2]['id'] ?>"><?=$titles[count($articles)-2] ?></a>
                <!-- <div class="article-content"><?=$contents[count($articles)-2] ?></div> -->
                <div class="article-content mt-3"><?=date("M d, Y", strtotime($articles[count($articles)-2]['created_at'])) ?></div>
            </div>
        </div>
        <div class="highlight-three d-flex">
            <img src="<?=$articles[count($articles)-3]['img'] ?>" width="120" height="120" style="object-fit: cover">
            <div class="ml-3 mr-3 flex-grow-1">
                <a class="h6 article-title" href="article.php?id=<?=$articles[count($articles)-3]['id'] ?>"><?=$titles[count($articles)-3] ?></a>
                <!-- <div class="article-content"><?=$contents[count($articles)-3] ?></div> -->
                <div class="article-content mt-3"><?=date("M d, Y", strtotime($articles[count($articles)-3]['created_at'])) ?></div>

            </div>
        </div>
        <div class="highlight-five d-flex">
            <img src="<?=$articles[count($articles)-4]['img'] ?>" width="120" height="120" style="object-fit: cover">
            <div class="ml-3 mr-3 flex-grow-1">
                <a class="h6 article-title" href="article.php?id=<?=$articles[count($articles)-4]['id'] ?>"><?=$titles[count($articles)-4] ?></a>
                <!-- <div class="article-content"><?=$contents[count($articles)-4] ?></div> -->
                <div class="article-content mt-3"><?=date("M d, Y", strtotime($articles[count($articles)-4]['created_at'])) ?></div>

            </div>
        </div>
        <div class="highlight-four">
            <img class="highlight-image" src="<?=$articles[count($articles)-5]['img'] ?>" height="180" style="object-fit: cover">
            <div class="mt-3 ml-3 mr-3 flex-grow-1">
                <a class="h4 article-title" href="article.php?id=<?=$articles[count($articles)-5]['id'] ?>"><?=$titles[count($articles)-5] ?></a>
                <div class="article-content mt-2"><?=$contents[count($articles)-5] ?></div>
                <div class="article-content mt-3"><?=date("M d, Y", strtotime($articles[count($articles)-5]['created_at'])) ?></div>

            </div>
        </div>
    </div>
    <div class="container d-flex">
        <div class="article-display-container d-flex flex-column">
            <?php foreach($articles as $index => $article): ?>
                <div class="article-display d-flex mb-5">
                    <div class="mt-3 mr-3 flex-grow-1">
                        <a class="h4 article-title" href="article.php?id=<?=$article['id'] ?>"><?=$titles[$index] ?></a>
                        <div class="article-content mt-2"><?=$contents[$index] ?></div>
                        <div class="article-content mt-3"><?=date("M d, Y", strtotime($article['created_at'])) ?></div>
                    </div>
                    <img src="<?=$article['img'] ?>" width="240" height="180" style="object-fit: cover">
                </div>
            <?php endforeach; ?>
        </div>
        <div class="popular-container ml-auto">
            <div class="popular-inner-container d-flex flex-column">
                <h4 class="pb-3 border-bottom">Popular Articles</h4>
                <?php foreach($articles as $index => $article): ?>
                    <?php if($index >= 5): ?>
                        <?php break; ?>
                    <?php else: ?>
                        <div class="article-display d-flex mb-5">
                            <div class="popular-num mt-3 mr-3">0<?=$index+1 ?></div>
                            <div class="mr-3 flex-grow-1">
                                <a class="h5 article-title" href="article.php?id=<?=$article['id'] ?>"><?=$titles[$index] ?></a>
                                <div class="article-content mt-2"><?=date("M d, Y", strtotime($article['created_at'])) ?></div>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
            


    <?php include('templates/footer.php'); ?>

</html>