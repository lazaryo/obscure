<!DOCTYPE html>
<html lang="en" >
    <head>
        <meta charset="utf-8" />
        <title>Obscure Sorrows Dictionary API</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
        <link href="_resources/css/global.css" rel="stylesheet" type="text/css" />
    </head>
    
    <body>
        <div class="wrapper container-fluid">
            <h1>Add another Obscure Sorrow</h1>
            <form id="sorrow-form" method="post" action="_resources/php/process-sorrow.php">
                <div class="form-group">
                    <label for="sorrow-title">Title</label>
                    <input type="text" class="form-control" id="sorrow-title" name="sorrow-title" placeholder="Obscure Sorrows">
                </div>
                
                <div class="form-group">
                    <label for="sorrow-author">Author</label>
                    <input type="text" class="form-control" id="sorrow-author" value="John Koenig" name="sorrow-author">
                </div>
                
                <div class="form-group">
                    <label for="sorrow-author-picture">Author Picture</label>
                    <input type="text" class="form-control" id="sorrow-author-picture" name="sorrow-author-picture" value="https://ideasofthevagabond.files.wordpress.com/2014/10/john-koenig.jpg">
                </div>
                
                <div class="form-group">
                    <label for="sorrow-definition">Definition</label>
                    <textarea class="form-control" id="sorrow-definition" rows="3" name="sorrow-definition" placeholder="A compendium of invented words written by John Koenig, that aims to fill holes in the language—to give a name to emotions we all feel but don't have a word for."></textarea>
                </div>
                
                <label class="mr-sm-2" for="sorrow-speech">Part of Speech</label>
                <select class="custom-select mb-2 mr-sm-2 mb-sm-0" id="sorrow-speech" name="sorrow-speech">
                    <option selected>Choose...</option>
                    <option value="noun">Noun</option>
                    <option value="adjective">Adjective</option>
                </select>
                
                <div class="form-group">
                    <label for="sorrow-video">Video Link</label>
                    <input type="link" class="form-control" id="sorrow-link" name="sorrow-video" placeholder="http://link-to-video.com/">
                </div>   
                             
                <div class="form-group">
                    <label for="sorrow-quotes">Has Quotes</label>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="sorrow-quotes" id="hasQuotes" value="true" checked>
                      <label class="form-check-label" for="hasQuotes">
                    Yes
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="sorrow-quotes" id="noQuotes" value="false">
                      <label class="form-check-label" for="noQuotes">
                    No
                      </label>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="sorrow-entry">Entry</label>
                    <input class="form-control" type="number" placeholder="25" id="sorrow-entry" name="sorrow-entry">
                </div>
            
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Submit Sorrow</button>
                </div>
            </form>
        </div>
        
        <script src="https://code.jquery.com/jquery-3.1.0.min.js" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <script src="_resources/libs/clipboardjs/clipboard.min.js"></script>
        <script src="_resources/js/global.js"></script>
    </body>
</html>