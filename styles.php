<?php    
    header("Content-type: text/css; charset: UTF-8");
    
    $main_color = "#ff5470";
    $article_area = 
    '"img img"
    "one two"
    "one two"
    "one two"';
?>

:root {
    --main-color: <?=$main_color ?>;
    --headline-color: #292929;
    --text-color: #292929;
    --text-muted-color: #757575;
}

body {
    <!-- font-family: 'Source Serif Pro', serif; -->
    font-family: 'Roboto', sans-serif;
    overflow-x: hidden;
}

.article {
    color: #000;
    width: 100vw;
    min-height: 100vh;
    display: flex;
    flex-wrap: wrap;
    <!-- font-family: 'DM Serif Display', serif; -->
    <!-- font-family: 'Source Serif Pro', serif; -->
}

.front-pg {
    height: 100vh;
    width: 100px;
    max-width: 100px;
    min-width: 100px;
    display: grid;
    grid-template-areas:
        "img img"
        "one two";
    grid-template-columns: 1fr 1fr;
    grid-template-rows: 1fr; 
    padding: 0;
    margin: 0;
}

#one {
    grid-area: one;
}
#two {
    grid-area: two;
}

.front-img-container {
    position: relative;
    grid-area: img;
    max-height: 100vh;
    min-height: 0px;
    overflow: hidden;
    display: flex;
    justify-content: center;
    align-items: center;
}
.front-img-container:hover #img-src {
    display: block;
}

#img-src {
    display: none;
    position: absolute;
    left: 0;
    bottom: 0;
}

.col {
    width: 100px;
    max-width: 100px;
    min-width: 100px;
    min-height: 100px;
    <!-- border-bottom: 1px solid #000; -->
    outline: none;
    padding: 14px;
    word-wrap: anywhere;
    overflow-wrap: anywhere;
    color: var(--text-color);
}

.imbed-img-container {
    overflow: hidden;
    margin: auto -14px;
}
.imbed-img {
    object-fit: contain;
    width: 100%;
}



.quote {
    padding-left: 10px;
    border-left: 2px solid var(--main-color);
    font-size: 28px;
    margin: auto -14px;
}
.quote::before {
    content: "\"";
}
.quote::after {
    content: "\"";
}

.subtitle {
    font-size: 24px;
}
.subtitle:empty:before {
    content: "Subtitle";
    color: #aaa;
}

.title {
    font-size: 36px;
    font-family: 'DM Serif Display', serif;
    color: var(--headline-color);
}
.title:empty:before {
    content: "Title";
    color: #aaa;
}

.article-navbar {
    opacity: 0;
    transition: opacity 0.2s;
}

.article-navbar-container:hover .article-navbar {
    opacity: 1;
}

.navbar {
    border-bottom: 1px solid #00214d11;
    background: #fffffe;
}

.article-display-container {
    width: 50vw;
}

.article-title {
    color: var(--headline-color);
}

.article-title:hover {
    color: var(--headline-color);
    text-decoration: none;
}

.article-content {
    color: var(--text-muted-color);
    font-size: 14px;
}

@media only screen and (max-width: 50vw) {
    .article-display-container {
        width: 100vw;
    }
}

button, .create-btn {
    color: #00214d;
    border: none;
    outline: none;
    padding: 10px 20px;
    border-radius: 0.2rem;
    border: 1px solid #00ebc7; 
    background: #ffffff; 
}


button:hover, .create-btn:hover {
    border: 1px solid #000;
    text-decoration: none;
    color: #00214d;
}

.highlight-container {
    margin-top: 90px;
    width: 100%;
    display: grid;
    grid-template-areas: 
        "one two four"
        "one three four"
        "one five four";
    grid-template-columns: 1fr 1fr 1fr;
    grid-gap: 20px;
    border-bottom: 1px solid #ddd;
}

.highlight-one {
    grid-area: one;
    <!-- margin-left: 40px; -->
}

.highlight-two {
    grid-area: two;
}

.highlight-three {
    grid-area: three;
}

.highlight-five {
    grid-area: five;
}


.highlight-four {
    grid-area: four;
    <!-- margin-right: 40px; -->
}

.highlight-image {
    width: 100%;
}

.popular-container {
    position: sticky;
    top: 0;
    height: 100px;
    width: 250px;
}

.popular-inner-container {
    margin-top: 100px;
}

.popular-num {
    color: var(--text-muted-color);
    opacity: 0.5;
    font-size: 32px;
    line-height: 0;
}

.brand-title {
    font-weight: bold;  
    font-family: 'DM Serif Display', serif;
    color: var(--headline-color);
}

.brand-title-lg {
    font-size: 28px;
}

.brand-title:hover {
    color: var(--headline-color);
}

#img-src-btn, #imbed-src-btn {
    padding: 3px 10px;
}