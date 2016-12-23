


<div class="createmovies">
    <h2>CREATE MOVIE</h2>
    <form class="createmovies" type="form" method="post" enctype="multipart/form-data">
        <label for="title">Title</label>
        <input type="title" name="title" >

                <label for="year">Year</label>
        <input type="year" name="year" >

                <label for="cast">Cast</label>
        <input type="cast" name="cast" >

                <label for="directors">Directors</label>
        <input type="directors" name="directors" >

                <label for="writers">Writers</label>
        <input type="writers" name="writers" >

                <label for="plot">Plot</label>
        <input type="plot" name="plot" >

                <label for="rating">Rating</label>
        <input type="rating" name="rating" >

                <label for="runtime">Runtime</label>
        <input type="runtime" name="runtime" >

                <label for="dateCreated">Date created</label>
        <input type="dateCreated" name="dateCreated" >

                        <label for="trailerUrl">Tailer URL</label>
        <input type="trailerUrl" name="trailerUrl" >
        <div>
                <label for="imdbId">Image:</label> 
                <input type="file" name="imdbId">
        </div>
        <?php
                if(!empty($movies->getValidationErrors())){
                        foreach($movies->getValidationErrors() as $error){
                        echo '<p>'. $error . '<p>';
                        }
                }
        ?>
        <input type="submit" name="validate" >        
    </form>
</div>


















