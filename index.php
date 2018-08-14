<!DOCTYPE html>
<html lang="en" >
    <head>
        <meta charset="utf-8" />
        <title>Obscure Sorrows Dictionary API</title>
        <link rel="stylesheet" href="_resources/libs/bootstrap/bootstrap-4.0.0-alpha.6.min.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="_resources/css/global.css" type="text/css">
    </head>
    
    <body>
        <div class="container-fluid wrapper">
            <header>
                <h1>Obscure Sorrows Dictionary API</h1>
                <p><small>Use the search form below to find a specific word and copy its link.</small></p>
            </header>
            
            <div class="explore">
                <p>Navigate to the custom query form to yield specific values from the API below.</p>
                <a class="custom-query btn btn-primary" href="api/">Generate Custom Query</a>
                
                <div class="form-group row">
                    <label for="sorrow-search-input" class="col-2 col-form-label">Search</label>
                    <div class="col-10">
                        <input class="form-control" name="keyword" type="search" placeholder="obscure sorrow" id="keyword">
                    </div>
                </div>
            </div>
            
            <div id="results">
                <h2>Results:</h2>
                <ul class="search-results list-group"></ul>
            </div>
        </div>
        
        <script src="_resources/libs/jquery/jquery-3.1.0.min.js"></script>
        <script src="_resources/libs/tether/tether-1.4.0.min.js"></script>
        <script src="_resources/libs/bootstrap/bootstrap-4.0.0-alpha.6.min.js"></script>
        <script src="_resources/libs/clipboardjs/clipboard.min.js"></script>
        <script src="_resources/js/global.js"></script>
    </body>
</html>