<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?= base_url('setting'); ?>" class="brand-link">
        <img src="<?= base_url('assets/img/padi.png'); ?>" alt="Padi" width="70 ">
        <span class="brand-text font-weight-bold">SIPERAN APP</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <!-- QUERY MENU -->
                <?php
                $role_id = $this->session->userdata('role_id');
                $queryMenu = "SELECT `user_menu`.`id`, `menu`
                            FROM `user_menu` JOIN `user_access_menu`
                              ON `user_menu`.`id` = `user_access_menu`.`menu_id`
                           WHERE `user_access_menu`.`role_id` = $role_id
                        ORDER BY `user_access_menu`.`menu_id` ASC
                        ";
                $menu = $this->db->query($queryMenu)->result_array();
                ?>

                <!-- LOOPING MENU -->
                <?php foreach ($menu as $m) : ?>
                    <div class="user-panel">
                        <li class="nav-header text-uppercase"><?= $m['menu']; ?></li>

                        <!-- SIAPKAN SUB-MENU SESUAI MENU -->
                        <?php
                        $menuId = $m['id'];
                        $querySubMenu = "SELECT *
                                        FROM `user_sub_menu` JOIN `user_menu` 
                                            ON `user_sub_menu`.`menu_id` = `user_menu`.`id`
                                        WHERE `user_sub_menu`.`menu_id` = $menuId
                                            AND `user_sub_menu`.`is_active` = 1
                                                ";
                        $subMenu = $this->db->query($querySubMenu)->result_array();
                        ?>

                        <?php foreach ($subMenu as $sm) : ?>

                            <li class="nav-item">
                                <?php if ($title == $sm['title']) : ?>
                                    <a href="<?= base_url($sm['url']); ?>" class="nav-link active">
                                    <?php else : ?>
                                        <a href="<?= base_url($sm['url']); ?>" class="nav-link">
                                        <?php endif; ?>
                                        <i class="<?= $sm['icon']; ?>"></i>
                                        <p>
                                            <?= $sm['title']; ?>
                                        </p>
                                        </a>
                            </li>
                        <?php endforeach; ?>

                        <!-- <hr class="sidebar-divider mt-3"> -->
                    </div>

                <?php endforeach; ?>
                <li class="nav-item mb-5">
                    <a class="nav-link" href="<?= base_url('auth/logout'); ?>" data-toggle="modal" data-target="#logoutModal">
                        <i class="fas fa-fw fa-sign-out-alt"></i>
                        <span>Logout</span></a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>