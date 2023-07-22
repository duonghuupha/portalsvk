<div id="sidebar" class="sidebar responsive ace-save-state sidebar-fixed">
    <div class="sidebar-shortcuts" id="sidebar-shortcuts">
        <div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
            <button class="btn btn-success" onclick="window.location.href='<?php echo URL ?>'">
                <i class="ace-icon fa fa-signal"></i>
            </button>
            <button class="btn btn-info" onclick="window.location.href='<?php echo URL ?>'">
                <i class="ace-icon fa fa-pencil"></i>
            </button>
            <button class="btn btn-warning" onclick="window.location.href='<?php echo URL ?>'">
                <i class="ace-icon fa fa-users"></i>
            </button>
            <button class="btn btn-danger" onclick="window.location.href='<?php echo URL ?>'">
                <i class="ace-icon fa fa-cogs"></i>
            </button>
        </div>
        <div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
            <span class="btn btn-success"></span>
            <span class="btn btn-info"></span>
            <span class="btn btn-warning"></span>
            <span class="btn btn-danger"></span>
        </div>
    </div><!-- /.sidebar-shortcuts -->
    <ul class="nav nav-list">
        <li class="hover">
            <a href="<?php echo URL.'/index' ?>">
                <i class="menu-icon fa fa-tachometer"></i>
                <span class="menu-text"> Bàn làm việc </span>
            </a>
            <b class="arrow"></b>
        </li>
        <li class="hover">
            <a href="<?php echo URL.'/category' ?>">
                <i class="menu-icon fa fa-list"></i>
                <span class="menu-text"> Danh mục </span>
            </a>
            <b class="arrow"></b>
        </li>
        <li class="hover">
            <a href="<?php echo URL.'/menu' ?>">
                <i class="menu-icon fa fa-tasks"></i>
                <span class="menu-text"> Menu </span>
            </a>
            <b class="arrow"></b>
        </li>
        <li class="hover">
            <a href="<?php echo URL.'/blogs' ?>">
                <i class="menu-icon fa fa-copy"></i>
                <span class="menu-text"> Blogs </span>
            </a>
            <b class="arrow"></b>
        </li>
        <li class="hover">
            <a href="<?php echo URL.'/decoration' ?>">
                <i class="menu-icon fa fa-crop"></i>
                <span class="menu-text"> Giao diện </span>
            </a>
            <b class="arrow"></b>
        </li>
        <li class="hover">
            <a href="<?php echo URL.'/setting' ?>">
                <i class="menu-icon fa fa-gear"></i>
                <span class="menu-text"> Cài đặt </span>
            </a>
            <b class="arrow"></b>
        </li>
        <?php
        if($this->_Info[0]['id'] == 1){
        ?>
        <li class="hover">
            <a href="<?php echo URL.'/users' ?>">
                <i class="menu-icon fa fa-users"></i>
                <span class="menu-text"> Người dùng </span>
            </a>
            <b class="arrow"></b>
        </li>
        <?php
        }
        ?>
    </ul><!-- /.nav-list -->

    <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
        <i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
    </div>
</div>