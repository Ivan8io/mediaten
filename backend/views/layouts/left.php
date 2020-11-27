<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="info">
                <p><?= Yii::$app->user->identity->username ?></p>
            </div>
        </div>

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [
                    ['label' => 'Управление разделами', 'options' => ['class' => 'header']],
                    ['label' => 'Пользователи', 'url' => ['/user/index']],
                    ['label' => 'Товары', 'url' => ['/product/index']],
                    ['label' => 'Категории', 'url' => ['/category/index']],
                    ['label' => 'Теги', 'url' => ['/tag/index']],
                ],
            ]
        ) ?>

    </section>

</aside>
