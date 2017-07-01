<?php

use common\models\Quotes;

$data = Quotes::find()->where(['draft'=>'published'])->orderBy('id DESC')->one();
?>

<section class="module-quote">
    <!-- start:header -->
    <header>
        <h2>Weekly quote</h2>
        <span class="borderline"></span>
    </header>
    <!-- end:header -->
    <!-- start:blockquote-quote -->
    <blockquote>
        <p><?=$data->quote?></p>
        <footer><?=$data->person?></footer>
    </blockquote><!-- end:blockquote-quote -->
</section>