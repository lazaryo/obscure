<!DOCTYPE html>
<html lang="en" >
    <head>
        <meta charset="utf-8" />
        <title>Obscure Sorrows Dictionary API</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
        <link href="_resources/css/global.css" rel="stylesheet" type="text/css" />
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
        
        <script src="https://code.jquery.com/jquery-3.1.0.min.js" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
        <script src="_resources/clipboardjs/clipboard.min.js"></script>
        <script src="_resources/js/global.js"></script>
    </body>
</html>