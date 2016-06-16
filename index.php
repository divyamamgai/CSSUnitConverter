<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1,width=device-width">
    <title>CSS Unit Converter</title>
    <link rel="stylesheet" type="text/css" media="screen" href="resources/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" media="screen" href="resources/css/main.css">
    <script type="text/javascript" src="resources/js/jquery.min.js"></script>
    <script type="text/javascript" src="resources/js/main.js"></script>
</head>
<body>
<div class="container">
    <h1 style="display: inline-block">CSS Unit Converter</h1>
    <h4 style="float: right;text-align: right">
        Created By <b>Divya Mamgai</b><br>
        1.0<br>
        2016
    </h4>
    <form method="POST">
        <div class="row">
            <div class="col-md-12">
                <label for="Code">CSS Code (or HTML Code with inline CSS)</label>
                <textarea id="Code" name="Code" rows="5" placeholder="Your Code Here" spellcheck="false"></textarea>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <label for="FromUnit">From Unit</label>
                <input id="FromUnit" name="FromUnit" type="text" placeholder="em">
            </div>
            <div class="col-sm-4">
                <label for="ToUnit">To Unit</label>
                <input id="ToUnit" name="ToUnit" type="text" placeholder="px">
            </div>
            <div class="col-sm-4">
                <label for="ConversionFactor">From To Conversion Factor</label>
                <input id="ConversionFactor" name="ConversionFactor" type="number" placeholder="16">
                <span id="ConversionMsg">1 <span id="ConversionFrom">em</span> =
                    <span id="ConversionFactorValue">16</span>
                    <span id="ConversionTo">px</span></span>
            </div>
        </div>
        <input type="submit" value="Convert">
    </form>
    <label for="ConvertedCode">Converted Code</label>
    <textarea name="ConvertedCode" id="ConvertedCode" rows="5" spellcheck="false">
<?php
$Code = isset($_POST['Code']) ? empty($_POST['Code']) ? die('No Code Given!') : $_POST['Code'] : die('No Code Given!');
$FromUnit = isset($_POST['FromUnit']) ? empty($_POST['FromUnit']) ? die('No FromUnit Given!') : $_POST['FromUnit'] :
    die('No FromUnit Given!');
$ToUnit = isset($_POST['ToUnit']) ? empty($_POST['ToUnit']) ? die('No ToUnit Given!') : $_POST['ToUnit'] :
    die('No ToUnit Given!');
$ConversionFactor = isset($_POST['ConversionFactor']) ? empty($_POST['ConversionFactor']) ?
    die('No ConversionFactor Given!') : $_POST['ConversionFactor'] : die('NoConversionFactor Given!');
preg_match_all('/(\d+(\.\d+)?)' . $FromUnit . '/', $Code, $UnitMatch);
$UnitStringArray = array_values(array_unique($UnitMatch[0]));
$UnitValueArray = array_values(array_unique($UnitMatch[1]));
$Count = count($UnitStringArray);
$Index = 0;
$UnitStringReplaceArray = array();
while ($Index < $Count) {
    array_push($UnitStringReplaceArray, ($UnitValueArray[$Index] * $ConversionFactor) . $ToUnit);
    $Index++;
}
echo str_replace($UnitStringArray, $UnitStringReplaceArray, $Code);
?>
    </textarea>
</div>
</body>
</html>
