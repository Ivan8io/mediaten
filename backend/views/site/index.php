<?php

/* @var $this yii\web\View */
/* @var $mainSections array */

$this->title = 'Mediaten';
?>
<div class="site-index">

    <div class="row">

        <?php foreach($mainSections as $section): ?>

            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box <?= $section['class']; ?>">
                    <div class="inner">
                        <h3><?= $section['count']; ?></h3>

                        <p><?= $section['label']; ?></p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="<?= $section['url']; ?>" class="small-box-footer">Просмотреть <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>

        <?php endforeach; ?>

    </div>

</div>
