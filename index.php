<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1,width=device-width">
    <?php include 'seo.php'; ?>
    <title>CSS Unit Converter</title>
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
    <link rel="icon" href="/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" type="text/css" media="screen" href="resources/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" media="screen" href="resources/css/main.css">
    <script type="text/javascript" src="resources/js/jquery.min.js"></script>
    <script type="text/javascript" src="resources/js/main.js"></script>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-sm-6">
            <h1><img src="icon.png">CSS Unit Converter</h1>
        </div>
        <div class="col-sm-6">
            <h4>
                Created By <b>Divya Mamgai</b><br>
                1.0<br>
                <a href="https://github.com/divyamamgai/CSSUnitConverter">GitHub Repo</a>
            </h4>
        </div>
    </div>
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
$EndingHTML = "\r\n\t</textarea>\r\n</div>\r\n</body><script type=\"text/javascript\">\r\n\t$('#Code', document).focus();\r\n</script>\r\n</html>";
$Code = isset($_POST['Code']) ? empty($_POST['Code']) ?
    die('No Code Given!' . $EndingHTML) : $_POST['Code'] : die('No Code Given!' . $EndingHTML);
$FromUnit = isset($_POST['FromUnit']) ? empty($_POST['FromUnit']) ?
    die('No FromUnit Given!' . $EndingHTML) : strtolower($_POST['FromUnit']) : die('No FromUnit Given!' . $EndingHTML);
$ToUnit = isset($_POST['ToUnit']) ? empty($_POST['ToUnit']) ?
    die('No ToUnit Given!' . $EndingHTML) : strtolower($_POST['ToUnit']) : die('No ToUnit Given!' . $EndingHTML);
$ConversionFactor = isset($_POST['ConversionFactor']) ? empty($_POST['ConversionFactor']) ?
    die('No ConversionFactor Given!' . $EndingHTML) : $_POST['ConversionFactor'] :
    die('NoConversionFactor Given!' . $EndingHTML);
preg_match_all('/(\d+(\.\d+)?)' . $FromUnit . '/', $Code, $UnitMatch);
$UnitStringArray = array_values(array_unique($UnitMatch[0]));
$UnitValueArray = array_values(array_unique($UnitMatch[1]));
$Count = count($UnitStringArray);
$Index = 0;
$UnitStringReplaceArray = array();
if ($ToUnit === 'px') {
    while ($Index < $Count) {
        // For pixels there is no such thing as 0.25px!
        array_push($UnitStringReplaceArray, round($UnitValueArray[$Index] * $ConversionFactor) . $ToUnit);
        $Index++;
    }
} else {
    while ($Index < $Count) {
        array_push($UnitStringReplaceArray, ($UnitValueArray[$Index] * $ConversionFactor) . $ToUnit);
        $Index++;
    }
}
echo str_replace($UnitStringArray, $UnitStringReplaceArray, $Code);
?>
    </textarea>
</div>
</body>
<script type="text/javascript">
    $('#ConvertedCode', document).select();
</script>
</html>
