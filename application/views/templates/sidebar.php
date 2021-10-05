<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <?php
                $role_id = $this->session->userdata('role_id');
                $queryMenu = "SELECT `user_menu` . `id`, `menu`
                FROM `user_menu`
                JOIN  `user_access_menu`
                ON `user_menu` . `id` = `user_access_menu`.  `menu_id`
                WHERE `user_access_menu` . `role_id` = $role_id
                ORDER BY `user_access_menu` . `menu_id` ASC

                ";
                $menu = $this->db->query($queryMenu)->result_array();
                ?>

                <!-- loop menu -->
                <?php foreach ($menu as $m) : ?>
                    <div class="sb-sidenav-menu-heading"><?= $m['menu'] ?></div>

                    <!-- sub menu sesuai menu -->
                    <?php
                    $menuId = $m['id'];
                    $querySubMenu = "SELECT *
                                FROM `user_sub_menu`
                                JOIN `user_menu`
                                ON `user_sub_menu`.`menu_id` = `user_menu`.`id`
                                WHERE  `user_sub_menu`.`menu_id` = $menuId
                            ";
                    $subMenu = $this->db->query($querySubMenu)->result_array();

                    ?>
                    <?php foreach ($subMenu as $sM) : ?>
                        <a class="nav-link collapsed" href="<?= base_url() ?><?= $sM['url'] ?>">
                            <div class="sb-nav-link-icon"><i class="<?= $sM['icon'] ?>"></i></div>
                            <?= $sM['title'] ?>
                        </a>
                    <?php endforeach; ?>
                <?php endforeach ?>

                <!-- query sub menu -->


            </div>
        </div>
        <div class="sb-sidenav-footer">
        </div>
    </nav>
</div>