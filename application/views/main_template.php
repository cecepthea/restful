<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="fr" ng-app="restfulApp"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="fr" ng-app="restfulApp"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="fr" ng-app="restfulApp"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="fr" ng-app="restfulApp"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <title><?php echo $title; ?></title>
        <meta name="description" content="">
        <meta name="author" content="">

        <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

        <?php
        $this->carabiner->css('bootstrap.min.css');
        $this->carabiner->css('font-awesome.min.css');
        $this->carabiner->css('summernote.css');
        $this->carabiner->css('app.less');

        $this->carabiner->display('css');
        ?>

        <?php
        $this->carabiner->js('lib/angular.min.js');
        $this->carabiner->js('lib/angular-animate.min.js');
        $this->carabiner->js('lib/angular-ui-router.js');
        $this->carabiner->js('lib/ui-bootstrap-custom-0.7.0.min.js');
        $this->carabiner->js('non-amd.js');

//        $this->carabiner->display('js');
        ?>
        <!--[if IE]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->	
    </head>

    <body>
        <div id="site">
            <div class="container-fluid">
                <div class="row-fluid">  
                    <header id="header">
                        <?= $header ?>
                    </header>    
                </div>
                
                <div class="row-fluid">             
                    <div class="col-md-10" ui-view ng-animate="{enter:'fade-enter'}">
                        <?php echo $content ?>
                    </div> 

                    <div class="col-md-2">
                        <aside>
                            <?php echo $sidebar ?>
                        </aside>
                    </div>
                </div>
                
                <div class="row-fluid"> 
                    <footer id="footer">
                        <?= $footer ?>
                    </footer>
                </div>
            </div>
        </div><!-- /site -->    

<script data-main="assets/js/require-main.js" src="assets/js/lib/require.js"></script>
    </body>
</html>