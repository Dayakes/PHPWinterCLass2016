<form action="#" method="get">
    <fieldset>
        <?php


        $radiosel = "";
        $dropsel = "";


        if (isGetRequest()) {
            $radiosel = filter_input(INPUT_GET, 'sorting');
            $dropsel = filter_input(INPUT_GET, 'columns');
        }
        ?>
        <legend>Sort by Group</legend>

        <label>Ascending</label>  
        <input type="radio" name="sorting" value="ASC"  <?php if ($radiosel == "ASC"): ?>checked="checked"<?php endif ?>/>
        <input type="radio" name="sorting" value="DESC" <?php if ($radiosel == "DESC"): ?>checked="checked"<?php endif ?>/>
        <label>Descending</label>  
        <br><br>
        <label>Group by</label>
        <select name="columns">
            <option value="corp"       <?php if ($dropsel == "corps"): ?>selected="selected"<?php endif ?>      >Corporations</option>
            <option value="incorp_dt"   <?php if ($dropsel == "incorp_dt"): ?>selected="selected"<?php endif ?>  >Incorp Date</option>
            <option value="zipcode"     <?php if ($dropsel == "zipcode"): ?>selected="selected"<?php endif ?>    >Zip code</option>
            <option value="owner"       <?php if ($dropsel == "owner"): ?>selected="selected"<?php endif ?>      >Owner</option>
        </select>
        <br><br>
        <input type="hidden" name="action" value="sort" />
        <input type="submit" value="Submit" />
        <input type="reset" value="Reset" />
    </fieldset>    
</form>