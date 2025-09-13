<?php include("include/conexion.php");?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">


    <style>
    .panel-title {
        cursor: pointer;
    }

    h4.tab-title {
        font-family: "avenirheavy", Helvetica, Arial, "sans-serif";
        font-weight: normal;
        font-size: 22px;
        color: #ffffff;
    }

    .vertab-content ul,
    .vertab-content ol {
        padding-left: 15px;
    }

    @media (min-width:768px) {
        .vertab-container {
            z-index: 10;
            background-color: #ffffff;
            padding: 0 !important;
            border: 1px solid #ddd;
            margin-top: 20px;
            background-clip: padding-box;
            opacity: 0.97;
            filter: alpha(opacity=97);
            overflow: auto;
            margin-bottom: 50px;
        }

        .vertab-menu {
            padding-right: 0;
            padding-left: 0;
            padding-bottom: 0;
            display: block;
            background-color: #e3e3e3;
        }

        .vertab-menu .list-group {
            margin-bottom: 0;
        }

        .vertab-menu .list-group>a {
            margin-bottom: 0;
            border-radius: 0;
        }

        .vertab-menu .list-group>a,
        .vertab-menu .list-group>a {
            color: #ffffff;
            background-image: none;
            background-color: #BC955C;
            border-radius: 0;
            box-sizing: border-box;
            border: none;
            border-bottom: 1px solid #fcfcfc;
            padding: 15px 10px;
        }

        .vertab-menu .list-group>a.active,
        .vertab-menu .list-group>a:hover,
        .vertab-menu .list-group>a:focus {
            position: relative;
            border: none;
            border-radius: 0;
            border-bottom: 1px solid #CACACA;
            border-left: 5px solid #911639;
            padding-left: 5px;
            background-image: none;
            background-color: #F6F6F6;
            color: #911639;
        }

        .vertab-content {
            padding-left: 20px;
            padding-top: 10px;
            color: #434b4d;
        }

        .vertab-accordion .vertab-content:not(.active) {
            display: none;
        }

        .vertab-accordion .vertab-content.active .collapse {
            display: block;
        }

        .vertab-container .panel-heading {
            display: none;
        }

        .vertab-container .panel-body {
            border-top: none !important;
        }
    }

    /* If the tc_breakpoint variable is changed, this breakpoint should be changed as well */
    @media (max-width:767px) {
        .vertab-container {
            margin-top: 20px;
            margin-bottom: 20px;
        }

        .vertab-container .vertab-menu {
            display: none;
        }

        .vertab-container .panel-heading {
            background-color: #F6F6F6;
            color: #818181;
            padding: 15px;
            border-bottom: 1px solid #F6F6F6;
            border-top-left-radius: 0;
            border-top-right-radius: 0;
            border-left: 5px solid #F6F6F6;
        }

        .vertab-container .panel-heading:hover,
        .vertab-container .panel-heading:focus,
        .vertab-container .panel-heading.active {
            border-left: 5px solid #911639;
            border-bottom: 1px solid #911639;
        }

        .vertab-content {
            border-bottom: 1px solid #CACACA;
        }

        .vertab-container .panel-title a:focus,
        .vertab-container .panel-title a:hover,
        .vertab-container .panel-title a:active {
            color: #818181;
            text-decoration: none;
        }

        .panel-collapse.collapse,
        .panel-collapse.collapsing {
            background-color: #911639 !important;
            color: #ffffff;
        }

        .vertab-container .panel-collapse .panel-body {
            border-top: none !important;
        }
    }
    </style>

    <script>
    window.console = window.console || function(t) {};
    </script>



</head>
<?php 


$contenidoI=$con->query("SELECT a.capitulo, b.contenido FROM capitulo a, contenido b where a.id_capitulo=b.id_capitulo and id_titulo=100");
$contenidoI->execute();
$resultado = $contenidoI->fetchAll(PDO::FETCH_ASSOC);
$contador=1;
foreach($resultado AS $row){ //var_export($row);

    //$id_capitulo = $row["a.id_capitulo"];
}

?>

<body translate="no">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 vertab-container ">
                <div class="col-lg-3 col-md-3 col-sm-3  vertab-menu ">
                    <div class="list-group ">
                        <?php foreach($resultado AS $row){ ?>
                        <a href="#" class="list-group-item text-left "> <?php echo $row["capitulo"]; ?> </a>
                        <?php   } ?>

                    </div>
                </div>


                <?php foreach($resultado AS $row){ ?>
                <div id="accordion" class="col-lg-9 col-md-9 col-sm-9 col-xs-12 vertab-accordion panel-group  ">
                    <div class="panel-heading ">
                        <h4 class="panel-title" data-toggle="collapse" data-parent="#accordion "
                            data-target="#collapse<?php echo $contador;?>">
                            
                        </h4>
                    </div>
                    <div class="vertab-content ">
                        <div id="collapse<?php echo $contador;?>" class="panel-collapse collapse ">

                            <div class="panel-body ">
                                <p><?php echo $row["contenido"]; ?></p> 
                            </div>

                        </div>
                    </div>

                </div>
                <?php  $contador++; } ?>

            </div>

        </div>
    </div>
    </div>
    <?php $contador++; //}?>
    <!--<script src="https://cpwebassets.codepen.io/assets/common/stopExecutionOnTimeout-2c7831bb44f98c1391d6a4ffda0e1fd302503391ca806e7fcc7b9b87197aec26.js"></script>-->

    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
    <!--<script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js'></script>-->
    <script id="rendered-js">
    // Screen-width breakpoint
    var tc_breakpoint = 767;

    jQuery(document).ready(function() {
        "use strict";

        // Switch tabs and update panels classes - Adjust container height
        jQuery(".vertab-container .vertab-menu .list-group a").click(function(e) {
            var index = jQuery(this).index();
            var container = jQuery(this).parents('.vertab-container');
            var accordion = container.find('.vertab-accordion');
            var contents = accordion.find(".vertab-content");

            e.preventDefault();

            jQuery(this).addClass("active");
            jQuery(this).siblings('a.active').removeClass("active");

            contents.removeClass("active");
            contents.eq(index).addClass("active");
            container.data('current', index);

            //Adjust container height
            jQuery(this).parents('.vertab-menu').css('min-height', jQuery(container).children(
                '.vertab-accordion').height() + 20);
        });

        // Collapse accordion panels (except the one the user just opened) and add "active" class to the panel heading 
        jQuery('.vertab-accordion').on('show.bs.collapse', '.collapse', function() {
            var accordion, container, current, index;

            accordion = jQuery(this).parents('.vertab-accordion');
            container = accordion.parents('.vertab-container');

            accordion.find('.collapse.in').each(function() {
                jQuery(this).collapse('hide');
            });

            jQuery(this).siblings('.panel-heading').addClass('active');

            current = accordion.find('.panel-heading.active');
            index = accordion.find('.panel-heading').index(current);

            container.data('current', index);
        });

        // Remove "active" class from heading when collapsing the current panel 
        jQuery('.vertab-accordion .panel-collapse').on('hide.bs.collapse', function() {
            jQuery(this).siblings('.panel-heading').removeClass('active');
        });

        // Manage resize / rotation events
        jQuery(window).on("resize orientationchange", function() {
            resize_vertical_accordions();
        });

        // Scroll accordion to show the current panel
        jQuery(".vertab-accordion .panel-heading").click(function() {
            var el = this;
            setTimeout(function() {
                jQuery("html, body").animate({
                    scrollTop: jQuery(el).offset().top - 10
                }, 1000);
            }, 500);

            return true;
        });

        //Initial Panels setup
        resize_vertical_accordions();
    });

    function resize_vertical_accordions() {
        "use strict";
        jQuery('.vertab-container').each(function(i, e) {
            var index, menu, contents;
            var container = jQuery(this);

            // Setup current tab/panel (default to first tab/panel)
            index = jQuery(this).data('current');
            if (index === undefined) {
                jQuery(this).data('index', 0);
                index = 0;
            }

            // If using a desktop-size screen, manage as tabbed panels
            if (jQuery(window).width() > tc_breakpoint) {
                // Reset panels heights (Bootstrap's accordions sets heights to zero)
                jQuery(this).find('.panel-collapse.collapse').css('height', 'auto');

                // Clean tab-navigation styles
                menu = jQuery(this).find('.vertab-menu .list-group a');
                menu.removeClass("active");

                // Clean tab-panels styles
                contents = jQuery(this).find(".vertab-accordion .vertab-content");
                contents.removeClass("active");

                // Update tab navigation and panels styles
                menu.eq(index).addClass('active');
                contents.eq(index).addClass("active");

                // Update tab navigation's height to match current tab
                jQuery(this).children('.vertab-menu').css('min-height', jQuery(this).children(
                    '.vertab-accordion').height() + 20);
            } else
            // If using a mobile device (phone + tablets), manage as accordion
            {
                // Close all panels
                jQuery(this).find('.vertab-content .panel-collapse.collapse').collapse('hide');

                // Clean styles from headings
                jQuery(this).find('.vertab-content .panel-heading').removeClass('active');

                // Wait until all panels have collapsed and mark the one the user selected as active.
                setTimeout(function() {
                    jQuery(container).find('.vertab-content .panel-heading').eq(index).addClass(
                        "active");
                    jQuery(container).find('.vertab-content .panel-collapse.collapse').eq(index)
                        .collapse('show');
                }, 1000);

            }
        });
    }
    //# sourceURL=pen.js
    </script>


</body>

</html>