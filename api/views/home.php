<!DOCTYPE html>
<html lang="en" >
    <head>
        <meta charset="utf-8" />
        <title>Obscure Sorrows Dictionary API</title>
        <link rel="stylesheet" href="../_resources/libs/bootstrap/bootstrap-4.0.0-alpha.6.min.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="../_resources/css/global.css" type="text/css">
    </head>
    <body>
        <div class="container-fluid wrapper">
            <header>
                <h1>Obscure Sorrows Dictionary API</h1>
                <p><small>Customize the options below for your query.</small></p>
            </header>
            
            <div class="form-group">
                <a href="dictionary" class="btn btn-primary">Full List of Obscure Sorrows</a>
            </div>
            <div class="form-group">
                <a href="random" class="btn btn-primary">Random Obscure Sorrow</a>
            </div>
            <div class="form-group">
                <label class="mr-sm-2" for="by-sorrow">Specific Obscure Sorrow</label>
                <select class="custom-select form-control mb-2 mr-sm-2 mb-sm-0" id="by-sorrow">
                    
                </select>
                <a id="sorrow" href="#" class="btn btn-primary">Get Sorrow</a>
            </div>

            <div class="form-group">
                <label class="mr-sm-2" for="rn-quote">Random Quote from an Obscure Sorrow</label>
                <select class="custom-select form-control mb-2 mr-sm-2 mb-sm-0" id="rn-quote">
                    
                </select>
                <a id="quote" href="#" class="btn btn-primary">Get Quote</a>
            </div>
            
            <div class="form-group">
                <label class="mr-sm-2" for="sorrow-speech">By Letter</label>
                <select class="custom-select mb-2 mr-sm-2 mb-sm-0" id="by-letter">
                    <option value="a" selected>A</option>
                    <option value="b">B</option>
                    <option value="c">C</option>
                    <option value="d">D</option>
                    <option value="e">E</option>
                    <option value="f">F</option>
                    <option value="g">G</option>
                    <option value="h">H</option>
                    <option value="i">I</option>
                    <option value="j">J</option>
                    <option value="k">K</option>
                    <option value="l">L</option>
                    <option value="m">M</option>
                    <option value="n">N</option>
                    <option value="o">O</option>
                    <option value="p">P</option>
                    <option value="q">Q</option>
                    <option value="r">R</option>
                    <option value="s">S</option>
                    <option value="t">T</option>
                    <option value="u">U</option>
                    <option value="v">V</option>
                    <option value="w">W</option>
                    <option value="x">X</option>
                    <option value="y">Y</option>
                    <option value="z">Z</option>
                </select>
                <a id="letter" class="btn btn-primary">Get List</a>
            </div>
            
            <div class="form-group">
                <label for="by-entry">By Entry</label>
                <input id="by-entry" class="form-control" type="number" placeholder="entry" value="1" min="1">
                <a id="entry" class="btn btn-primary">Get Entry</a>
            </div>
            
            <div class="form-group" id="entry-range-container">
                <h4>Range of Words</h4>
                
                <div>
                    <label for="entry-range-min">Min Value</label>
                    <input id="entry-range-min" class="form-control" type="number" placeholder="entry" value="1" min="1">
                </div>
                <div>
                    <label for="entry-range-max">Max Value</label>
                    <input id="entry-range-max" class="form-control" type="number" placeholder="entry" value="2" min="2">
                </div>
                
                <div><a id="entry-range" class="btn btn-primary">Get List</a></div>
            </div>
            
            <div class="form-group">
                <label for="by-speech">By Part of Speech</label>
                <select class="custom-select mb-2 mr-sm-2 mb-sm-0" id="by-speech">
                    <option value="noun" selected>Noun</option>
                    <option value="adjective">Adjective</option>
                </select>
                <a id="speech" class="btn btn-primary">Get List</a>
            </div>
            
            <div class="form-group">
                <label for="by-video">Has Video</label>
                <select class="custom-select mb-2 mr-sm-2 mb-sm-0" id="by-video">
                    <option value="true" selected>True</option>
                    <option value="false">False</option>
                </select>
                <a id="video" class="btn btn-primary">Get List</a>
            </div>
        </div>
        
        <script src="../_resources/libs/jquery/jquery-3.1.0.min.js"></script>
        <script src="../_resources/libs/tether/tether-1.4.0.min.js"></script>
        <script src="../_resources/libs/bootstrap/bootstrap-4.0.0-alpha.6.min.js"></script>
        <script src="../_resources/libs/clipboardjs/clipboard.min.js"></script>
        <script src="../_resources/js/global.js"></script>
    </body>
</html>