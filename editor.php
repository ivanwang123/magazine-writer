<?php

    include('config/db_connect.php');
    if (isset($_POST['content'])) {

        $img = $_POST['img'];
        $content = '';

        foreach ($_POST['content'] as $col) {
            $content .= '%~brk%' . htmlspecialchars($col);
        }

        // $content = htmlspecialchars($_POST['content']);

        $sql = "INSERT INTO articles(content, img) VALUES('$content', '$img')";

        if (mysqli_query($conn, $sql)) {
            echo 'SUCCESS';
        } else {
            echo 'ERROR';
        }

        exit();
    }

?>

<!DOCTYPE html>
<html lang="en">
    <?php include('templates/articleHeader.php'); ?>

    <div class="container-fluid article" id="page-one">
        <div class="front-pg">
            <div class="col" id="one" contenteditable="true" spellcheck="false">
                Start writing your article!
            </div>
            <div class="col" id="two" contenteditable="true" spellcheck="false">
            </div>
            <div class="front-img-container">
                <img id="front-img" style="object-fit: contain; height: 100%" src="https://www.ajactraining.org/wp-content/uploads/2019/09/image-placeholder.jpg">
                <div id="img-src">
                    <input type="text" id="img-src-input" placeholder="Image URL" autocomplete="off">
                    <button type="button" id="img-src-btn">Link</button>
                </div>
            </div>
        </div>
        <div class="col" id="three" contenteditable="true" spellcheck="false">
        </div>
        <div class="col" id="four" contenteditable="true" spellcheck="false">
        </div>
    </div>

    <div class="modal fade" id="imbed-img-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Add Imbedded Image</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="text" id="imbed-src-input" placeholder="Image URL">
                    <button type="button" id="imbed-src-btn">Link</button>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-3 mb-5 d-flex justify-content-center">
        <button type="button" name="submit" id="submit">Publish</button>
    </div>

    <script src="scripts/resize.js" type="module"></script>
    <script src="scripts/caret.js" type="module"></script>
    <script src="scripts/editor.js" type="module"></script>
    
    <?php include('templates/footer.php'); ?>
</html>
