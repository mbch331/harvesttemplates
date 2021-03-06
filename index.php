<!doctype html>
<!--
 * To the extent possible under law, the author(s) have dedicated all copyright
 * and related and neighboring rights to this software to the public domain
 * worldwide. This software is distributed without any warranty.
 *
 * See <http://creativecommons.org/publicdomain/zero/1.0/> for a copy of the
 * CC0 Public Domain Dedication.
//-->
<html>

<head>
    <title>PLtools: Harvest Templates</title>
    <meta charset="utf-8">

    <link href="main.css" rel="stylesheet">
    <link href="../common.css" rel="stylesheet">

    <script src="//tools-static.wmflabs.org/static/jquery/1.11.0/jquery.min.js"></script>
    <?php
$commit = trim(file_get_contents( '../harvesttemplates/.git/refs/heads/master' ));
?>
        <script src="main.js?version=<?php echo $commit; ?>"></script>
        <script src="../common.js"></script>

</head>

<body>



    <div id="headline"><a href="//tools.wmflabs.org/pltools" target="_blank">PLtools</a>: Harvest Templates | <a href="https://github.com/Pascalco/harvesttemplates" target="_blank">source</a> | </div>

    <div id="main">

        <div id="inst">Copy data from a Wikimedia template to Wikidata
            <ul>
                <li><i>Property:</i> destination property in Wikidata</li>
                <li><i>Wiki:</i> language and project name</li>
                <li><i>Template:</i> source template</li>
                <li><i>Parameter:</i> parameter name in the template. Use numbers for nameless parameters</li>
                <li><i>Category:</i> non-mandatory option to filter pages on wiki</li>
            </ul>
            By clicking <i>get pages</i> a list with articles gets created. After it, when clicking <i>add values</i> the articles get parsed and claims get added to Wikidata. Alternatively, with <i>demo</i> only parsing is done without any edit action.
        </div>

        <form id="spec">
            <div class="div-table">
                <h3>Load pages from</h3>
                <div class="div-table-row">
                    <div class="div-table-col1">Wiki</div>
                    <div class="div-table-col2">
                        <input type="text" name="siteid" style="width:50px;" value="en"> .
                        <input type="text" name="project" style="width:150px;" value="wikipedia">.org</div>
                </div>
                <div class="div-table-row">
                    <div class="div-table-col1">Namespace</div>
                    <div class="div-table-col2">
                        <input type="number" name="namespace" style="width:50px;" min="0" value=0>
                    </div>
                </div>
                <div class="div-table-row">
                    <div class="div-table-col1">Category</div>
                    <div class="div-table-col2">
                        <input type="text" name="category" value="">
                    </div>
                </div>
                <h3>Import data</h3>
                <div class="div-table-row">
                    <div class="div-table-col1">Property</div>
                    <div class="div-table-col2">P
                        <input type="number" name="property" style="width:50px;" min="1" value=1>
                    </div>
                </div>
                <div class="div-table-row">
                    <div class="div-table-col1">Template</div>
                    <div class="div-table-col2">
                        <input type="text" name="template" value="">
                    </div>
                </div>
                <div class="div-table-row">
                    <div class="div-table-col1">Parameter</div>
                    <div class="div-table-col2">
                        <input type="text" name="parameter" value="">
                        <div class="timeparameters" style="display:none;">
                            <br /><i>or</i><br />
                            <input type="text" name="aparameter1" value="" class="shorter"> year<br />
                            <input type="text" name="aparameter2" value="" class="shorter"> month<br />
                            <input type="text" name="aparameter3" value="" class="shorter"> day
                        </div>
                    </div>
                </div>
                <div class="div-table-row" id="wikisyntax" style="display:none;">
                    <div class="div-table-col1"></div>
                    <div class="div-table-col2">
                        <input type="checkbox" name="wikisyntax" value="wikisyntax">try to match target page even without wikisyntax</div>
                </div>
                <div class="div-table-row" id="prefix" style="display:none;">
                    <div class="div-table-col1">Value prefix</div>
                    <div class="div-table-col2">
                        <input type="text" name="prefix" value="">
                    </div>
                </div>
                <div class="div-table-row timeparameters" style="display:none;">
                    <div class="div-table-col1">Calendar</div>
                    <div class="div-table-col2">
                        <select name="calendar" size="1">
                            <option value="http://www.wikidata.org/entity/Q1985727">Gregorian</option>
                            <option value="http://www.wikidata.org/entity/Q1985786">Julian</option>
                        </select> if year
                        <select name="rel" size="1">
                            <option>=></option>
                            <option>
                                <=</option>
                        </select>
                        <input type="number" name="limityear" style="width:60px" min="1" value="1926">
                    </div>
                </div>
                <div class="div-table-row">
                    <div class="div-table-col1"></div>
                    <div class="div-table-col2">
                        <input type="submit" value="get pages" id="getpages" class="run">
                    </div>
                </div>
                <div class="div-table-row">
                    <div class="div-table-col1"></div>
                    <div class="div-table-col2">
                        <div id="status"></div>
                    </div>
                </div>
                <div class="div-table-row">
                    <div class="div-table-col1">
                        <input type="submit" value="demo" class="run" id="demo" style="display:none;">
                    </div>
                    <div class="div-table-col2">
                        <input type="submit" value="add values" class="run" id="addvalues" style="display:none;">
                    </div>
                </div>
            </div>
        </form>
        <div class="rightbox" style="display:none;"><a class="permalink" href="#">Permalink</a> | download <a class="download" href="#">CSV</a> | <a class="download" href="#">TSV</a></div>
        <div id="result"></div>
    </div>

</body>

</html>
