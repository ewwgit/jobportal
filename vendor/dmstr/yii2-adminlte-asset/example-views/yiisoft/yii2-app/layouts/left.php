<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p>Alexander Pierce</p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu'],
                'items' => [
                  //  ['label' => 'Menu Yii2', 'options' => ['class' => 'header']],
                    ['label' => 'Employees', 'icon' => 'fa fa-users', 'url' => ['/employees/employees/']],
                    ['label' => 'Employers', 'icon' => 'fa fa-user-circle-o', 'url' => ['/employers/employers/']],
                	['label' => 'Degrees', 'icon' => 'fa fa-book', 'url' => ['/degrees/degrees/']],
                	['label' => 'Designation', 'icon' => 'fa fa-bookmark', 'url' => ['/designation/designation/']],
                	['label' => 'Specializations', 'icon' => 'fa fa-sun-o', 'url' => ['/specializations/specializations/']],
                   
                   
                ],
            ]
        ) ?>

    </section>

</aside>
