<!-- main body -->
<div id="main" class="clearingfix">
    <div id="mainmiddle" class="floatbox withright">

        <?php if ($site_message != '') { ?>
        <div class="green-box">
            <h3><?php echo $site_message; ?></h3>
        </div>
        <?php } ?>

        <!-- right column -->
        <div id="right" class="clearingfix">

            <!-- category filters -->
            <div class="cat-filters clearingfix">
                <strong><?php echo Kohana::lang('ui_main.category_filter'); ?> <span>[<a href="javascript:toggleLayer('category_switch_link', 'category_switch')" id="category_switch_link"><?php echo Kohana::lang('ui_main.hide'); ?></a>]</span></strong>
            </div>

            <ul id="category_switch" class="category-filters">
                <li><a class="active" id="cat_0" href="#"><span class="swatch" style="background-color:<?php echo "#" . $default_map_all; ?>"></span><span class="category-title"><?php echo Kohana::lang('ui_main.all_categories'); ?></span></a></li>
                <?php
                foreach ($categories as $category => $category_info) {
                    $category_title = $category_info[0];
                    $category_color = $category_info[1];
                    $category_image = '';
                    $color_css = 'class="swatch" style="background-color:#' . $category_color . '"';
                    if ($category_info[2] != NULL && file_exists(Kohana::config('upload.relative_directory') . '/' . $category_info[2])) {
                        $category_image = html::image(array(
                                    'src' => Kohana::config('upload.relative_directory') . '/' . $category_info[2],
                                    'style' => 'float:left;padding-right:5px;'
                                ));
                        $color_css = '';
                    }
                    echo '<li><a href="#" id="cat_' . $category . '"><span ' . $color_css . '>' . $category_image . '</span><span class="category-title">' . $category_title . '</span></a>';
                    // Get Children
                    echo '<div class="hide" id="child_' . $category . '">';
                    if (sizeof($category_info[3]) != 0) {
                        echo '<ul>';
                        foreach ($category_info[3] as $child => $child_info) {
                            $child_title = $child_info[0];
                            $child_color = $child_info[1];
                            $child_image = '';
                            $color_css = 'class="swatch" style="background-color:#' . $child_color . '"';
                            if ($child_info[2] != NULL && file_exists(Kohana::config('upload.relative_directory') . '/' . $child_info[2])) {
                                $child_image = html::image(array(
                                            'src' => Kohana::config('upload.relative_directory') . '/' . $child_info[2],
                                            'style' => 'float:left;padding-right:5px;'
                                        ));
                                $color_css = '';
                            }
                            echo '<li style="padding-left:20px;"><a href="#" id="cat_' . $child . '"><span ' . $color_css . '>' . $child_image . '</span><span class="category-title">' . $child_title . '</span></a></li>';
                        }
                        echo '</ul>';
                    }
                    echo '</div></li>';
                }
                ?>
            </ul>
            <!-- / category filters -->

            <?php
            if ($layers) {
                ?>
                <!-- Layers (KML/KMZ) -->
                <div class="cat-filters clearingfix" style="margin-top:20px;">
                    <strong><?php echo Kohana::lang('ui_main.layers_filter'); ?> <span>[<a href="javascript:toggleLayer('kml_switch_link', 'kml_switch')" id="kml_switch_link"><?php echo Kohana::lang('ui_main.hide'); ?></a>]</span></strong>
                </div>
                <ul id="kml_switch" class="category-filters">
                    <?php
                    foreach ($layers as $layer => $layer_info) {
                        $layer_name = $layer_info[0];
                        $layer_color = $layer_info[1];
                        $layer_url = $layer_info[2];
                        $layer_file = $layer_info[3];
                        $layer_link = (!$layer_url) ?
                                url::base() . Kohana::config('upload.relative_directory') . '/' . $layer_file :
                                $layer_url;
                        echo '<li><a href="#" id="layer_' . $layer . '"
						onclick="switchLayer(\'' . $layer . '\',\'' . $layer_link . '\',\'' . $layer_color . '\'); return false;"><div class="swatch" style="background-color:#' . $layer_color . '"></div>
						<div>' . $layer_name . '</div></a></li>';
                    }
                    ?>
                </ul>
                <!-- /Layers -->
                <?php
            }
            ?>


            <?php
            if ($shares) {
                ?>
                <!-- Layers (Other Ushahidi Layers) -->
                <div class="cat-filters clearingfix" style="margin-top:20px;">
                    <strong><?php echo Kohana::lang('ui_main.other_ushahidi_instances'); ?> <span>[<a href="javascript:toggleLayer('sharing_switch_link', 'sharing_switch')" id="sharing_switch_link"><?php echo Kohana::lang('ui_main.hide'); ?></a>]</span></strong>
                </div>
                <ul id="sharing_switch" class="category-filters">
                    <?php
                    foreach ($shares as $share => $share_info) {
                        $sharing_name = $share_info[0];
                        $sharing_color = $share_info[1];
                        echo '<li><a href="#" id="share_' . $share . '"><div class="swatch" style="background-color:#' . $sharing_color . '"></div>
						<div>' . $sharing_name . '</div></a></li>';
                    }
                    ?>
                </ul>
                <!-- /Layers -->
                <?php
            }
            ?>


            <br />

            <!-- additional content -->
            <?php
            if (Kohana::config('settings.allow_reports')) {
                ?>
                <div class="additional-content">
                    
The TREE WATCH DOG is a system that aims at availing reliable data regarding deforestation and afforestation in a given region/country.
                    <h5><?php echo Kohana::lang('ui_main.how_to_report'); ?></h5>
                    <ol>
                        <li><a href="<?php echo url::site() . 'reports/submit/'; ?>"><?php echo Kohana::lang('ui_main.report_option_4'); ?></a></li>
                    </ol>

                </div>
            <?php } ?>
            <!-- / additional content -->

            <?php
            // Action::main_sidebar - Add Items to the Entry Page Sidebar
            Event::run('ushahidi_action.main_sidebar');
            ?>

        </div>
        <!-- / right column -->

        <!-- content column -->
        <div id="content" class="clearingfix">
            <div class="floatbox">

                <!-- filters -->
                <div class="filters clearingfix">

                    <?php
// Action::main_filters - Add items to the main_filters
                    Event::run('ushahidi_action.map_main_filters');
                    ?>
                </div>
                <!-- / filters -->

                <?php
                // Map and Timeline Blocks
                echo $div_map;
                echo $div_timeline;
                ?>
            </div>
        </div>
        <!-- / content column -->

    </div>
</div>
<!-- / main body -->


<!-- content graph tracking trees planted/cut in yr -->
<div class="content-blocks clearingfix">
    <br /><br />
    <center><?php blocks::title(Kohana::lang('ui_main.annual_graph')); ?></center>

    <div><canvas id="graphfff" height="400" width="950"></canvas></div>

    <script type="text/javascript">

        var optionssss = {
            "IECanvasHTC": "/plotkit/iecanvas.htc",
        //"colorScheme": PlotKit.Base.palette(PlotKit.Base.baseColors()[0]),
            "padding": {left: 0, right: 0, top: 10, bottom: 30},
            "xTicks": [ 
                {v:0, label:"JAN"}, 
                {v:1, label:"FEB"},
                {v:2, label:"MAR"},
                {v:3, label:"APR"},
                {v:4, label:"MAY"},
                {v:5, label:"JUN"},
                {v:6, label:"JUL"},
                {v:7, label:"AUG"},
                {v:8, label:"SEP"},
                {v:9, label:"OCT"},
                {v:10, label:"NOV"},
                {v:11, label:"DEC"}
            ],
            "drawYAxis": true
        };

        function drawGraph() {
            var layoutssss = new PlotKit.Layout("bar", optionssss);
            layoutssss.addDataset("sqrt", [[0, 1], [1, 1.7], [2, 1], [3, 2.5], [4, 3], [5, 2], [6, 4], [7, 1], [8, 1.7], [9, 1], [10, 2.5], [11, 3]]);
            layoutssss.evaluate();
            layoutssss.addDataset("sqrts", [[0, 9], [1, 3.0], [2, 1.414], [3, 1.73], [4, 2.7], [5, 1.73], [6, 1.9], [7, 2], [8, 1.7], [9, 8], [10, 5.5], [11, 4]]);
            layoutssss.evaluate();
            var canvassss = MochiKit.DOM.getElement("graphfff");
            var plotter = new PlotKit.SweetCanvasRenderer(canvassss, layoutssss, optionssss);
            plotter.render();
        }

        MochiKit.DOM.addLoadEvent(drawGraph);

    </script>

</div>



<!-- content -->
<div class="content-container">

    <!-- content blocks -->
    <div class="content-blocks clearingfix">
        <ul class="content-column">
            <?php blocks::render(); ?>
        </ul>
    </div>
    <!-- /content blocks -->

</div>
<!-- content -->
