<?php 
    /*
     * Please put this file in the same folder with KoolControls folder
     * or you may modify path of require and scriptFolder to refer correctly
     * to koolchart.php and its folder.
     */
    require "koolchart.php";
    $chart = new KoolChart("chart");
    $chart->scriptFolder="C:\xampp\htdocs\php\try\New folder\kool\KoolPHPSuite\KoolControls\KoolChart";
    $chart->Width = 1000;
    $chart->BackgroundColor = "#ffff";
    $chart->Title->Text = "Yearly Report";
    $chart->PlotArea->XAxis->Title = "Quarter";
    $chart->PlotArea->XAxis->Set(array("Q1","Q2","Q3","Q4","Q5"));
    $chart->PlotArea->YAxis->Title = "Sales";
    $chart->PlotArea->YAxis->LabelsAppearance->DataFormatString = "$ {0}";
    $series = new LineSeries();
    $series->ArrayData(array(20,30,40,70,50));
    $chart->PlotArea->AddSeries($series);
?>
<html>
    <head>
        <title>KoolChart</title>
    </head>
    <body>
        <?php echo $chart->Render(); ?>
    </body>
</html>