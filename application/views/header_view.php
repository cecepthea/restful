<nav class="navbar navbar-default" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#"><i class="fa fa-hand-o-up"></i></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">            
            <?php foreach ($mainmenu as $onemenu) { ?>
                <li ng-class="{ active: $state.includes('<?= $onemenu->slug ?>') }"><a ui-sref="<?= $onemenu->slug ?>"><?= $onemenu->name ?></a></li>
            <?php } ?>
        </ul>

        <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Account <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li><a href="#">Profile</a></li>
                    <li><a href="#">Stats</a></li>
                    <li class="divider"></li>
                    <li><a href="logout">Logout</a></li>
                </ul>
            </li>
        </ul>

        <form class="navbar-form navbar-right" role="search" >
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Recherche">
            </div>
            <button type="submit" class="btn btn-default hidden">Submit</button>
        </form>
    </div><!-- /.navbar-collapse -->
</nav>