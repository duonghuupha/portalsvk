<?php
if(!isset($_SESSION['data'])){
    header("Location: ".URL.'/index/logout');
}
?>
<div id="navbar" class="navbar navbar-default ace-save-state navbar-fixed-top">
    <div class="navbar-container ace-save-state" id="navbar-container">
        <button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
            <span class="sr-only">Toggle sidebar</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <div class="navbar-header pull-left">
            <a href="<?php echo URL.'/index' ?>" class="navbar-brand">
                <small>
                    <i class="fa fa-leaf"></i>
                    Naturem Manager
                </small>
            </a>
        </div>
        <div class="navbar-buttons navbar-header pull-right" role="navigation">
            <ul class="nav ace-nav">
                <!--<li class="purple dropdown-modal">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="javascript:void(0)"
                    onclick="load_list_notify()">
                        <i class="ace-icon fa fa-bell icon-animated-bell"></i>
                        <span class="badge badge-important" id="total_notify">0</span>
                    </a>
                    <ul class="dropdown-menu-right dropdown-navbar navbar-pink dropdown-menu dropdown-caret dropdown-close"
                    id="list_notify_modal">

                    </ul>
                </li>-->
                <li class="light-blue dropdown-modal">
                    <a data-toggle="dropdown" href="#" class="dropdown-toggle">
                        <img class="nav-user-photo" src="<?php echo URL.'/' ?>styles/images/default.png" alt="Jason's Photo" />
                        <span class="user-info">
                            <small>Xin chào,</small>
                            <?php
                                echo $_SESSION['data'][0]['fullname'];
                            ?>
                        </span>
                        <i class="ace-icon fa fa-caret-down"></i>
                    </a>
                    <ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
                        <li>
                            <a href="<?php echo URL.'/profile' ?>">
                                <i class="ace-icon fa fa-user"></i>
                                Tài khoản
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="<?php echo URL.'/index/logout' ?>">
                                <i class="ace-icon fa fa-power-off"></i>
                                Đăng xuất
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div><!-- /.navbar-container -->
</div>