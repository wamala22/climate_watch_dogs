<?php blocks::open(); ?>
<?php blocks::title(Kohana::lang('ui_main.personsGraph')); ?>
<div><canvas id="graphPersons" height="250" width="427"></canvas></div>

<script type="text/javascript">

    var optionPersons = {
        "IECanvasHTC": "/plotkit/iecanvas.htc",
        //"colorScheme": PlotKit.Base.palette(PlotKit.Base.baseColors()[2]),
        "padding": {left: 0, right: 0, top: 10, bottom: 30},
        "xTicks": [ 
            {v:0, label:"Peter"}, 
            {v:1, label:"Mary"},
            {v:2, label:"John"},
            {v:3, label:"Dan"},
            {v:4, label:"Jack"},
            {v:5, label:"Joyce"},
            {v:6, label:"Rita"}
        ],
        "drawYAxis": true
    };

    function drawGraphPersons() {
        var layoutssss = new PlotKit.Layout("bar", optionPersons);
        layoutssss.addDataset("persons", [[0, 1], [1, 1.7], [2, 1], [3, 2.5], [4, 3], [5, 2], [6, 4]]);
        layoutssss.evaluate();
        var canvassss = MochiKit.DOM.getElement("graphPersons");
        var plotter = new PlotKit.SweetCanvasRenderer(canvassss, layoutssss, optionPersons);
        plotter.render();
    }
    
    var optionMostDeforestaion = {
        "IECanvasHTC": "/plotkit/iecanvas.htc",

        "padding": {left: 0, right: 0, top: 10, bottom: 30},
        "pieRadius": 0.5,
        "xTicks": [ 
            {v:0, label:"Nakawa"}, 
            {v:1, label:"Nagongera"},
            {v:2, label:"Amuria"},
            {v:3, label:"Sudan"},
            {v:4, label:"Yumbe"},
            {v:5, label:"Masaka"},
            {v:6, label:"Bwaise"}
        ],
        "drawYAxis": true
    };

    function drawGraphMostDeforestaion() {
        var layoutssss = new PlotKit.Layout("pie", optionMostDeforestaion);
        layoutssss.addDataset("deforestation", [[0, 1], [1, 1.7], [2, 1], [3, 2.5], [4, 3], [5, 2], [6, 4]]);
        layoutssss.evaluate();
        var canvassss = MochiKit.DOM.getElement("graphMostDeforested");
        var plotter = new PlotKit.SweetCanvasRenderer(canvassss, layoutssss, optionMostDeforestaion);
        plotter.render();
    }

    MochiKit.DOM.addLoadEvent(drawGraphPersons);
    MochiKit.DOM.addLoadEvent(drawGraphMostDeforestaion);

</script>

<br /><br />
<?php blocks::title(Kohana::lang('ui_main.mostDeforested')); ?>
<div><canvas id="graphMostDeforested" height="250" width="427"></canvas></div>

<a class="more" href="<?php echo url::site() . 'feeds' ?>"><?php echo Kohana::lang('ui_main.view_more'); ?></a>
<div style="clear:both;"></div>
<?php blocks::close(); ?>